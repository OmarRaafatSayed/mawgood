<?php
$html = file_get_contents('http://127.0.0.1:8000/jobs');
echo strpos($html, 'Mawgood Shop') !== false ? "shop-present\n" : "shop-missing\n";
echo strpos($html, 'Mawgood Jobs') !== false ? "jobs-present\n" : "jobs-missing\n";
if (preg_match('/<a[^>]*>\s*Mawgood Shop\s*<\/a>/s', $html, $m1)) {
    echo "shop-snippet:\n" . $m1[0] . "\n\n";
} else {
    echo "shop-snippet:N/A\n\n";
}
if (preg_match('/<a[^>]*>\s*Mawgood Jobs\s*<\/a>/s', $html, $m2)) {
    echo "jobs-snippet:\n" . $m2[0] . "\n";
} else {
    echo "jobs-snippet:N/A\n";
}
