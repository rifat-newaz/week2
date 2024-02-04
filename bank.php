#! /usr/bin/env php
<?php
require_once 'vendor/autoload.php' ;
use App\classes\User ;
use App\classes\Transaction ;

		$userType = "user";
$todaydate = date("Y-m-d");

if (empty($loggedIn)) {
$loggedIn = false;
}






while(true){
	
if(empty($mainid)OR($mainid==2)){
	
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
							
	if ($userInfo = User::checkLogin($email, $password, $userType)) {
    $loggedIn = true;
	
		echo "Welcome:";
		
		 // Access user_name and address from the returned array
    echo $user_name = $userInfo['user_name'];
     $user_email = $userInfo['user_email'];
      $user_type = $userInfo['user_type'];
		
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

$type = "deposite" ;
	
	Transaction::depositeOrWithdraw($depositAmount, $details, $user_email, $type) ;
	
	
	
}


}

if($loggedUserCommand==2){
	

	$withdrawAmount=(int)readline(prompt:"Enter Withdraw Amount:");
			
$details=readline(prompt:"Enter Some Details:");




if(!empty($withdrawAmount)){

$type = "withdraw" ;
	
	Transaction::depositeOrWithdraw($withdrawAmount, $details, $user_email, $type) ;
	
	
	
}


}

if($loggedUserCommand==3){
	

	$transferAmount=(int)readline(prompt:"Enter Transfer Amount:");
			
$receiverEmail=readline(prompt:"Amount Receiver Email:");
			
$details=readline(prompt:"Enter Some Details:");




if(!empty($transferAmount)){


	
	Transaction::transfer($transferAmount, $details, $user_email, $receiverEmail) ;
	
	
	
}


}



if($loggedUserCommand==4){
	

	
	if($user_type=="user"){
		
		$emailFilter = $user_email;
		
	}
	else{
		$emailFilter = null;
	}
	
	
	
	Transaction::lists($emailFilter);
	
	
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
	
	if((empty($name))&&(empty($email))&&(empty($password))){
	$name=readline(prompt:"Name:");
	$email=readline(prompt:"Email:");
	$password=readline(prompt:"Password:");
	}
		
		

		
			if (User::registration($name,$email,$password,$userType)) {	
			
			echo "User Registered Successfully!\n";	
			}
			else {
				
				echo "This User Already Exist!\n";	
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