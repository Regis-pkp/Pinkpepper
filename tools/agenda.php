<?php

if (!empty($_FILES) && !empty($_POST)) {
    include('SG_iCal.php');
    $dateFilterStart = $_POST["dateStart"];
    $dateFilterEnd = $_POST["dateEnd"];
    $timeStampStartFilter = strtotime($dateFilterStart . "00:00:00");
    $timeStampEndFilter = strtotime($dateFilterEnd . "23:59:59");

    $array = array();
    $total = 0;

    foreach ($_FILES['inputFile']['tmp_name'] as $fichiersTmp) {
        $urlCalendar = $fichiersTmp;

        $ical = new SG_iCalReader($urlCalendar);


        foreach ($ical->getEvents() As $event) {

            $summary = $event->getSummary();
            $timeStart = $event->getStart();
            $timeEnd = $event->getEnd();

            $dayStart = date("d-m-Y", $timeStart);

            $timeTacheTstamp = $timeEnd - $timeStart;
            if ($timeStart >= $timeStampStartFilter && $timeEnd <= $timeStampEndFilter) {

                // Séparer summary pour obtenir le client + la tache.
                // Detecter si - présent dans summary
                if (strpos($summary, ' - ')) {
                    // Si oui alors explode
                    list($client, $tache) = explode(" - ", $summary, 2);
                } else {
                    // Si non alors tache autre
                    $client = "Autre";
                    $tache = $summary;
                }


                // Detection si clé déjà présente dans tableau
                if (isset($array[$client][$tache])) {
                    // Si oui valeur + 1
                    // Obtenir un tableau de forme $array[$client][$tache] = $nbFois
                    $array[$client][$tache]['heures'] += $timeTacheTstamp;

                    if (strpos($array[$client][$tache]['jours'], $dayStart) === false) {
                        $array[$client][$tache]['jours'] .= ", " . $dayStart;
                    }
                } else {
                    // Si non valeur à 1
                    $array[$client][$tache]['heures'] = $timeTacheTstamp;
                    $array[$client][$tache]['jours'] = $dayStart;

                }
            }
        }

    }
    foreach ($array as $client => $taches) {
        $array[$client]["Total"]['heures'] = 0;
        $array[$client]["Total"]['jours'] = "";
        foreach ($taches as $tache => $timeTacheTstamp) {
            $total += $timeTacheTstamp['heures'] / 3600;
            $array[$client][$tache]['heures'] = $timeTacheTstamp['heures'] / 3600;
            $array[$client]["Total"]['heures'] += $timeTacheTstamp['heures'] / 3600;
        }
    }


    if ($_POST["choix"] === "csv") {
        header("Content-Type: text/csv");
        header("Content-Disposition: attachment; filename=temps " . $dateFilterStart . "_" . $dateFilterEnd . ".csv");
        echo "\xEF\xBB\xBF";

        $fp = fopen('PHP://output', 'w');
        fputs($fp, $bom = (chr(0xEF) . chr(0xBB) . chr(0xBF)));
        $ligne = array("Clients", "Tâches", "Temps H", "Temps J", "Jours");
        fputcsv($fp, $ligne, $delimiter = ";");
        foreach ($array as $client => $taches) {
            foreach ($taches as $tache => $timeTacheTstamp) {
                $ligne = array($client, $tache, $timeTacheTstamp['heures'], number_format($timeTacheTstamp['heures'] / 7, 2), $array[$client][$tache]['jours']);
                fputcsv($fp, $ligne, $delimiter = ";");
            }
        }
        $ligne = array("TOTAL", "", $total, number_format($total / 7, 2));
        fputcsv($fp, $ligne, $delimiter = ";");
        fclose($fp);
        die();

    } elseif ($_POST["choix"] === "affichage") {
        ?>
        <head>
            <meta charset="utf-8"/>
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <title>PkpAgenda</title>
            <link rel="stylesheet" type="text/css" href="style.css">
        </head>

        <table>
            <thead>
            <tr>
                <th>Clients</th>
                <th>Tâches</th>
                <th>Temps H</th>
                <th>Temps J</th>
                <th>Jours</th>
            </tr>
            </thead>
            <tbody>
            <?php

            foreach ($array as $client => $taches) {
                foreach ($taches as $tache => $timeTacheTstamp) {
                    ?>
                    <tr>
                    <td><?php echo $client ?></td>
                    <td><?php echo $tache ?></td>
                    <td><?php echo $timeTacheTstamp['heures'] ?></td>
                    <td><?php echo number_format($timeTacheTstamp['heures'] / 7, 2) ?></td>
                    <td><?php if ($tache !== 'Total') {
                            echo $array[$client][$tache]['jours'];
                        } ?></td>
                    </tr><?php
                }
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="2">TOTAL</td>
                <td>
                    <?php
                    echo $total;
                    ?>
                </td>
                <td>
                    <?php
                    echo number_format($total / 7, 2);
                    ?>
                </td>
            </tr>
            </tfoot>
        </table>
        <?php
    }
}
?>

<?php
if (empty($_POST['choix']) || $_POST['choix'] != 'affichage') {
    ?>
    <head>
        <meta charset="utf-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>PkpAgenda</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <?php
}
?>

<form method="post" enctype="multipart/form-data">
    <input type="file" id="inputFile" name="inputFile[]" multiple/>
    <br/>
    <label for=dateStart">date de début</label>
    <input type="date" id="dateStart" name="dateStart"/>
    <label for=dateEnd">date de fin</label>
    <input type="date" id="dateEnd" name="dateEnd"/>
    <br/>
    <label for="csv">export CSV</label>
    <input type="radio" name="choix" value="csv">
    <label for="affichage">affichage du tableau</label>
    <input type="radio" name="choix" value="affichage">
    <br/>
    <input type="submit" value="envoyer">
</form>
