#! /usr/bin/env php
<?php
require_once 'vendor/autoload.php' ;
use App\classes\User ;
use App\classes\RefGen ;


$todaydate = date("Y-m-d");

if (empty($loggedIn)) {
$loggedIn = false;
}






while(true){
	
if(empty($mainid)){
	
	echo "
--------------LIST--------------
What do you want to do?
1. Login
2. Registration
3. Exit

";
	
	
$mainid=(int)readline(prompt:"Enter a number from list...");
}


if($mainid==1){
	
	if (!$loggedIn) {
	
	$email=readline(prompt:"Email:");
	
	
		
	$password=readline(prompt:"Password:");
		
		
			if((!empty($email))&&(!empty($password))){
				
				
	if ($userInfo = User::checkLogin($email, $password)) {
    $loggedIn = true;

   
    
		 
		echo "Welcome:";
		
		 // Access user_name and address from the returned array
    echo $user_name = $userInfo['user_name'];
		
		  echo "\n";
	 }
	
		}
		

	
}
		
	

if ($loggedIn) {
	
echo "
--------------MENU--------------
What do you want to do?
1. Deposit money
2. Withdraw money
3. Transfer Money
4. Transaction List
5. Logout

";
	
$loggedUserCommand=readline(prompt:"Write a number from menu:");


if($loggedUserCommand==1){
	

	$depositAmount=(int)readline(prompt:"Enter Deposit Amount:");
			
$details=readline(prompt:"Enter Some Details:");




if(!empty($depositAmount)){
    // Transaction::deposite($depositAmount, $details, $user_name);

    // Step 1: JSON file path
    $jsonFilePath = 'transaction.json';

    // Step 2: Open the file with an exclusive lock
    $fileHandle = fopen($jsonFilePath, 'c+');
    if ($fileHandle === false) {
        die('Unable to open the file.');
    }

    if (flock($fileHandle, LOCK_EX)) {
        // Step 3: Read existing data and append or modify data
        $fileSize = filesize($jsonFilePath);

        // Check if the file is empty
        if ($fileSize > 0) {
            $existingData = json_decode(fread($fileHandle, $fileSize), true);
            if ($existingData === null) {
                $existingData = [];
            }
        } else {
            $existingData = [];
        }

        // Extract refID values
        $refIDs = array_column($existingData, 'refID');

        // Find the maximum refID
        $lastRefID = !empty($refIDs) ? max($refIDs) : 0;

        $newref_id = RefGen::generateRefNumber($lastRefID);

        $newData = [
            'date' => date('Y-m-d'),
            'refID' => $newref_id,
            'amount' => $depositAmount,
            'customerName' => $user_name,
            'details' => $details,
        ];

        $existingData[] = $newData;

    // Step 4: Write the updated data back to the file
fseek($fileHandle, 0, SEEK_END);

fwrite($fileHandle, json_encode($existingData, JSON_PRETTY_PRINT));

// Step 5: Release the lock and close the file
flock($fileHandle, LOCK_UN);
fclose($fileHandle);

echo "Data saved to JSON file successfully.\n";
    } else {
        die('Unable to acquire an exclusive lock.');
    }
}


}

if($loggedUserCommand==5){
	
	$loggedIn = false;
	$mainid=null;
}

else{
	//readline(prompt:"Write a number from menu2:");
}

}
	
   

				
				
		
		
	
	}
	
	
	//break;

if($mainid==2){
	
	$registration_name=readline(prompt:"Name:");
	
	if(!empty($registration_name)){
		
	
		
		$registration_email=readline(prompt:"Email:");
		
		
		
		
	if(!empty($registration_email)){
		
	
		
		$registration_password=readline(prompt:"Password:");
		
		
		
			
$file = 'users.txt';
$searchfor = $registration_name . ' | ' . $registration_email;




// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, '/');

// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";

// search, and store all matching occurences in $matches
if (preg_match_all($pattern, $contents, $matches))
{
echo "This User Already Exist!\n";
   
   
}
else
{
   
   
   
   		$users_list_file = fopen("users.txt", "a") or die("Unable to open file!");
				
$txt = "\n$registration_name |";
fwrite($users_list_file, $txt);
$txt = " $registration_email |";
fwrite($users_list_file, $txt);
$txt = " $registration_password";
fwrite($users_list_file, $txt);
fclose($users_list_file)	;		
printf(format:"Data Entered Successfully!\n");	
}	
				
		
		
		
		
		
		
		
		
	
	
		
		
	}
		

		 
		
	}
	
	
	//break;
}	



elseif($mainid==3){
	break;

}
else{
	
	//printf(format:"Congress! u are right..\n");
	
	
}	
	
	
}


?>