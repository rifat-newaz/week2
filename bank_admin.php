#! /usr/bin/env php
<?php
require_once 'vendor/autoload.php' ;
use App\classes\User ;
use App\classes\Transaction ;

$userType = "admin";
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
1. User List
2. Transaction List
3. Transaction Search By Email
4. Logout

";
		
		
		
$loggedUserCommand=readline(prompt:"Write a number from menu:");





if($loggedUserCommand==1){
	


	
	User::getList() ;
	
	



}





if($loggedUserCommand==2){

		$emailFilter = null;
	
	
	
	Transaction::lists($emailFilter);
	
	
}


if($loggedUserCommand==3){
	
	
$emailFilter=readline(prompt:"Account Email:");
		
		
		
	if(!empty($emailFilter)){
	
	
	Transaction::lists($emailFilter);
	
}
	
	
}





if($loggedUserCommand==4){
	
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
			
			echo "Admin Registered Successfully!\n";	
			}
			else {
				
				echo "This Admin Already Exist!\n";	
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