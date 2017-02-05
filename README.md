# PHP : CSV converter to HTML
I have coded with PHP a very simple converter of CSV files to HTML :
``` PHP
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
```