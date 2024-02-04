<?php
namespace App\classes;
require_once 'RefGen.php';

class Transaction {
	
    public static function depositeOrWithdraw($amount, $details, $user_email, $type) {
		
		
// Step 1: JSON file path
$jsonFilePath = "files/transaction.json";

// Step 2: Read existing data (if applicable)
$existingData = [];

if (file_exists($jsonFilePath)) {
    $jsonData = file_get_contents($jsonFilePath);
    if ($jsonData !== false) {
        $existingData = json_decode($jsonData, true);
        // If json_decode fails, set $existingData to an empty array
        $existingData = is_array($existingData) ? $existingData : [];
    } else {
        die('Unable to read the file.');
    }
}

// Extract refID values
$refIDs = array_column($existingData, 'refID');

// Find the maximum refID
$lastRefID = !empty($refIDs) ? max($refIDs) : 0;

$newref_id = RefGen::generateRefNumber($lastRefID);

$newData = [
    'date' => date('Y-m-d'),
    'refID' => $newref_id,
    $type => $amount,
    'userEmail' => $user_email,
    'details' => $details,
];

$existingData[] = $newData;

// Step 4: Encode data to JSON
$jsonData = json_encode($existingData, JSON_PRETTY_PRINT);

// Step 5: Write to JSON file
if (file_put_contents($jsonFilePath, $jsonData) === false) {
    die('Unable to write to the file.');
}

// Optionally, you can print a success message
echo "Data saved to JSON file successfully.\n";

    }
	
	
	
	
	

    public static function transfer($amount, $details, $user_email, $receiverEmail) {
		
		
// Step 1: JSON file path
$jsonFilePath = "files/transaction.json";

// Step 2: Read existing data (if applicable)
$existingData = [];

if (file_exists($jsonFilePath)) {
    $jsonData = file_get_contents($jsonFilePath);
    if ($jsonData !== false) {
        $existingData = json_decode($jsonData, true);
        // If json_decode fails, set $existingData to an empty array
        $existingData = is_array($existingData) ? $existingData : [];
    } else {
        die('Unable to read the file.');
    }
}

// Extract refID values
$refIDs = array_column($existingData, 'refID');

// Find the maximum refID
$lastRefID = !empty($refIDs) ? max($refIDs) : 0;

$newref_id = RefGen::generateRefNumber($lastRefID);

$newData = [
    'date' => date('Y-m-d'),
    'refID' => $newref_id,
    'withdraw' => $amount,
    'userEmail' => $user_email,
    'details' => $details,
];
$existingData[] = $newData;

$newData = [
    'date' => date('Y-m-d'),
    'refID' => $newref_id,
    'deposite' => $amount,
    'userEmail' => $receiverEmail,
    'details' => $details,
];

$existingData[] = $newData;

// Step 4: Encode data to JSON
$jsonData = json_encode($existingData, JSON_PRETTY_PRINT);

// Step 5: Write to JSON file
if (file_put_contents($jsonFilePath, $jsonData) === false) {
    die('Unable to write to the file.');
}

// Optionally, you can print a success message
echo "Data saved to JSON file successfully.\n";

    }
	
	
	
	
	
	
	
	
	
	
	
    // Add the new public function to fetch and render the HTML table
    public static function lists($emailFilter=null)
    {
        // Step 1: JSON file path
        $jsonFilePath = "files/transaction.json";
		$getUserEmail="";

     if (file_exists($jsonFilePath)) {
            $transactions = json_decode(file_get_contents($jsonFilePath), true);

            // Filter transactions by email if provided
            if ($emailFilter !== null) {
                $transactions = array_filter($transactions, function ($transaction) use ($emailFilter) {
                    return isset($transaction['userEmail']) && $transaction['userEmail'] === $emailFilter;
                });
            }
        } else {
            $transactions = [];
        }






        // Step 2: Read existing data (if applicable)
  /*       if (file_exists($jsonFilePath)) {
            $transactions = json_decode(file_get_contents($jsonFilePath), true);
        } else {
            $transactions = [];
        } */

        // Fetch the HTML table
        //$htmlTable = self::generateTransactionsTable($transactions);

        // Return or echo the HTML table
        //echo $htmlTable;
		
		
	
		      // Build the HTML table
        $transactionTable = "<<<<<<<<<<Transations>>>>>>>>>>>\n";
		 if ($emailFilter !== null) {
        $transactionTable = "No. | Date | RefNo | Deposite |  Withdraw |  Balance | Details \n";
		 }
		
else{
	$transactionTable = "No. | AccountEmail | Date | RefNo | Deposite |  Withdraw |  Balance | Details \n";
	
}


		
$i=0;
$balance=0;
        foreach ($transactions as $transaction) {
			
			
			
			
			$i++;
			
			
            $transactionTable .= "$i";
			
			 if ($emailFilter == null) {
				 
				 $transactionTable .= " | " . $transaction['userEmail']; 
				 
			 }
			
			
            $transactionTable .= " | " . $transaction['date'];
            $transactionTable .= " | " . $transaction['refID'];
			if(!empty($transaction['deposite'])){
				$balance=$balance+$transaction['deposite'];
            $transactionTable .= " | " . $transaction['deposite'];
            $transactionTable .= " | 0";
			}
			elseif(!empty($transaction['withdraw'])){
				$balance=$balance-$transaction['withdraw'];
            $transactionTable .= " | 0";
            $transactionTable .= " | " . $transaction['withdraw'];
			}
            //$transactionTable .= '' . $transaction['userEmail'] . '';
            $transactionTable .= " | $balance";
            $transactionTable .= " | " . $transaction['details'];
            $transactionTable .= "\n";
	
	
		
	
        }

        $transactionTable .= "\n";

        echo $transactionTable;
		
		
		
		
    }


   
	
	
	
	
	
	
	
	
	
}






































?>
