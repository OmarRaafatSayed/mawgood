<?php
$html = file_get_contents('http://127.0.0.1:8000/jobs');
$labels = ['Mawgood Shop','Mawgood Jobs'];
foreach ($labels as $label) {
    $i = strpos($html, $label);
    echo "--- $label ---\n";
    if ($i === false) { echo "not found\n"; continue; }
    $start = max(0, $i - 200);
    $len = min(400, strlen($html) - $start);
    echo substr($html, $start, $len) . "\n\n";
}
