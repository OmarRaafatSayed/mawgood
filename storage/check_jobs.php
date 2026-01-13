<?php
$html = file_get_contents('http://127.0.0.1:8000/jobs');
echo strpos($html, 'Mawgood Shop') !== false ? "shop-present\n" : "shop-missing\n";
echo strpos($html, 'Mawgood Jobs') !== false ? "jobs-present\n" : "jobs-missing\n";
echo strpos($html, 'href="/jobs"') !== false ? "jobs-href-ok\n" : "jobs-href-missing\n";
echo strpos($html, 'href="/"') !== false ? "shop-href-root-ok\n" : "shop-href-root-missing\n";
