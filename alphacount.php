#! /usr/bin/env php
<?php



// Check if a sentence is provided as a command line argument
if ($argc < 2) {
    echo 'Usage: php alphacount.php "sentence"';
    exit(1);
}

// Set a variable
$snt = $argv[1];



// Replace non-alphabetic characters
$OnlyAlpha = preg_replace("/[^a-zA-Z]/", "", $snt);

// Count total alphabets
$TotalAlpha = strlen($OnlyAlpha);

// Output the result
echo "Total alphabets in '$snt': $TotalAlpha\n";

?>