<?php
$url = 'http://www.comparateur-de-cotes.fr/comparateur/football/France-Ligue-1-ed3';
$output = file_get_contents($url);
echo $output;
?>