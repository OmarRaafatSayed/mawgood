<?php
$html = file_get_contents('http://127.0.0.1:8000/jobs');
echo strpos($html,'rounded-md bg-navyBlue')!==false?"mobile-shop-present\n":"mobile-shop-missing\n";
echo strpos($html,'rounded-md bg-emerald-700')!==false?"mobile-jobs-present\n":"mobile-jobs-missing\n";
preg_match_all('/<a[^>]*>\s*Mawgood Shop\s*<\/a>/s',$html,$ms); echo 'shop-occurrences:'.count($ms[0])."\n";
preg_match_all('/<a[^>]*>\s*Mawgood Jobs\s*<\/a>/s',$html,$mj); echo 'jobs-occurrences:'.count($mj[0])."\n";
if (!empty($ms[0])) { foreach ($ms[0] as $i => $s) { echo "--- Shop Occurrence #".($i+1)." ---\n".trim($s)."\n\n"; } }
if (!empty($mj[0])) { foreach ($mj[0] as $i => $s) { echo "--- Jobs Occurrence #".($i+1)." ---\n".trim($s)."\n\n"; } }
