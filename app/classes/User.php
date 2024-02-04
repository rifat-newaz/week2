<?php
namespace App\classes;

	class User {
		
		
		 public static function registration($name, $email,$password,$userType) {
			 
			 
			 
			 
			 
			 
					
		
		
		
		
			
$user_file = 'files/users.txt';
$searchfor = $email;




// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($user_file);

// escape special characters in the query
$pattern = preg_quote($searchfor, '/');

// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";

// search, and store all matching occurences in $matches
if (preg_match_all($pattern, $contents, $matches))
{

//printf(format:"This User Already Exist!\n");	

return false ;   
   
}
else
{
   
   
   
   		$users_list_file = fopen($user_file, "a") or die("Unable to open file!");
				
$txt = "\n$name |";
fwrite($users_list_file, $txt);
$txt = " $email |";
fwrite($users_list_file, $txt);
$txt = " $password |";
fwrite($users_list_file, $txt);
$txt = " $userType";
fwrite($users_list_file, $txt);
fclose($users_list_file)	;		

return true ; 
}	
				
		
		
	 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
			 
		 }
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		    public static function checkLogin($email,$password,$type) {
				
				
								
$file = 'files/users.txt';
$searchfor = $email . ' | ' . $password . ' | ' . $type;




// get the file contents, assuming the file to be readable (and exist)
$contents = file_get_contents($file);

// escape special characters in the query
$pattern = preg_quote($searchfor, '/');

// finalise the regular expression, matching the whole line
$pattern = "/^.*$pattern.*\$/m";

// search, and store all matching occurences in $matches
if (preg_match_all($pattern, $contents, $matches))
{
	 
   
   //echo implode("\n", $matches[0]);
   
   $user_full_details = implode("\n", $matches[0]);
   
   $user_full_details_exploded = explode(" | ",$user_full_details);
    $user_name = $user_full_details_exploded[0];
    $user_email = $user_full_details_exploded[1];
    $user_type = $user_full_details_exploded[3];
	
	  return [
                'user_name' => $user_name,
                'user_email' => $user_email,
                'user_type' => $user_type
            ];
	
	
	
	
	}
else
{
   echo "No matches found\n";
   
   return false;
}
				
				
				
				
				
				
				

    }
		
		
		
		
		
		
	 public static function getList() {

	
 $UserFile = fopen("files/users.txt", "r") or die("Unable to open file!");
	$i=0;
echo "<<<<<<<<<<USER LIST>>>>>>>>>>>\n";
echo "No. | Name | Email | Type \n";
while (!feof($UserFile)) {
	
	$GetUserData= fgets($UserFile);
	
	
	$UserFile_ex = explode(" | ",$GetUserData);
		$user_name = $UserFile_ex[0];
	$user_email = $UserFile_ex[1];
	$user_type = $UserFile_ex[3];
	

	
	$GetUserData = explode("\n",$GetUserData);
	$GetUserData = $GetUserData[0];
	
		$i++;
	echo " $i | ";
    echo $user_name;
	echo " | ";
    echo $user_email;
	echo " | ";
    echo $user_type;
}

fclose($UserFile);




	 }		 
		
		
		
	}
	
	
	?>