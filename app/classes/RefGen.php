<?php
namespace App\classes;

	class RefGen {
    public static function generateRefNumber($lastRefNumber) {
        // Extract the year from the last invoice number
        $lastYear = substr($lastRefNumber, 4, 4);
        $currentYear = date('Y');

        // Check if the last invoice was from a different year
        if ($lastYear != $currentYear) {
            // If it's a new year, reset the counter
            $counter = 1;
        } else {
            // If it's the same year, increment the counter
            $counter = (int)substr($lastRefNumber, -3) + 1;
        }

        // Format the new invoice number
        $newRefNumber = 'INV-' . $currentYear . '-' . str_pad($counter, 4, '0', STR_PAD_LEFT);

        return $newRefNumber;
    }
}


?>