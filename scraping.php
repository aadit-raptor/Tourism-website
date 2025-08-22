<?php

$htmlFile = 'packages.html'; 
$htmlContent = file_get_contents($htmlFile);


libxml_use_internal_errors(true);

$dom = new DOMDocument();
$dom->loadHTML($htmlContent);
libxml_clear_errors();

$xpath = new DOMXPath($dom);


$destinations = $xpath->query("//div[@class='destination']");

if ($destinations->length > 0) {
    foreach ($destinations as $destination) {
      
        $title = $destination->getElementsByTagName('h2')->item(0)->nodeValue;

        $details = [];
        foreach ($destination->getElementsByTagName('p') as $detail) {
            $details[] = $detail->nodeValue; 
        }

        
        foreach ($details as $detail) {
            if (strpos($detail, 'Approximate Cost:') !== false) {
              
                preg_match('/\$(\d+)/', $detail, $matches);
                if (isset($matches[1]) && $matches[1] > 2000) {
                   
                    echo "<h3>Destination: $title</h3>";
                    echo "<ul>";
                    foreach ($details as $d) {
                        echo "<li>$d</li>";
                    }
                    echo "</ul>";
                    break; 
                }
            }
        }
    }
} else {
    echo "No destinations found.";
}
?>
