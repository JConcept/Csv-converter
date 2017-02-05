<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CSV to HTML</title>
</head>
<body>
    
<?php
function printCsv($filename, $header=false){
    $csv = fopen($filename, "r");
    echo "<table>";
    if ($header && ($csvcontents = fgetcsv($csv)) !== FALSE) {
        echo "<tr>";
        foreach ($csvcontents as $headerline) {
            $headerContent = explode(";", $headerline);
            $t = count($headerContent);
            for ($i=0; $i < $t; $i++) {
                echo "<th>" . $headerContent[$i] . "</th>";
            }
        }
        echo "</tr>";
    }
    while (($csvcontents = fgetcsv($csv)) !== FALSE) {
        echo "<tr>";
        foreach ($csvcontents as $line) {
            $linneContent = explode(";", $line);
            $t = count($linneContent);
            for ($i=0; $i < $t; $i++) {
                echo "<td>" . $linneContent[$i] . "</td>";
            }
        }
        echo "</tr>";
    }
    fclose($csv);
    echo "</table>";
}
printCsv('fichier.csv', true);
?>

</body>
</html>