#! /usr/bin/env php
<?php

$todaydate = date("Y-m-d");

echo "
----------------------------------------
What do you want to do?
1. Login
2. Registration
3. Exit

";




while(true){
	
	
$mainid=(int)readline(prompt:"Enter a number from list...");


if($mainid==1){
	
	$incomeamount=(int)readline(prompt:"Enter Income Amount..");
	
	if($incomeamount>0){
		
	
		
		$incomecat=readline(prompt:"Enter Income Category..");
			if(!empty($incomecat)){
				
				
				
		$incomefile = fopen("income.txt", "a") or die("Unable to open file!");
				
$txt = "\n$todaydate |";
fwrite($incomefile, $txt);
$txt = " $incomeamount |";
fwrite($incomefile, $txt);
$txt = " $incomecat";
fwrite($incomefile, $txt);
fclose($incomefile)	;		
printf(format:"Data Entered Successfully!\n");			
				
				
			}
		
		
	}
	
	
	//break;
}	
if($mainid==2){
	
	$expenseamount=(int)readline(prompt:"Enter Expense Amount..");
	
	if($expenseamount>0){
		
	
		
		$expensecat=readline(prompt:"Enter Expense Category..");
			if(!empty($expensecat)){
				
				
				
		$expensefile = fopen("expense.txt", "a") or die("Unable to open file!");
				
$txt = "\n$todaydate |";
fwrite($expensefile, $txt);
$txt = " $expenseamount |";
fwrite($expensefile, $txt);
$txt = " $expensecat";
fwrite($expensefile, $txt);
fclose($expensefile)	;		
printf(format:"Data Entered Successfully!\n");			
				
				
			}
		
		
	}
	
	
	//break;
}	
elseif($mainid==3){
	
	$myfile = fopen("income.txt", "r") or die("Unable to open file!");
$i=0;
// Output lines until the end of the file is reached
echo "No. | Date | Income | Category \n";
while (!feof($myfile)) {
	$i++;
	echo "$i | ";
	
    echo fgets($myfile);
	
}
fclose($myfile);
echo " \n";
}
elseif($mainid==4){
	
	$myfile = fopen("expense.txt", "r") or die("Unable to open file!");
$i=0;
echo "No. | Date | Expense | Category \n";
// Output lines until the end of the file is reached
while (!feof($myfile)) {
		$i++;
	echo "$i | ";
    echo fgets($myfile);
	//echo "<br>";
}
fclose($myfile);
echo " \n";
}
elseif($mainid==5){
	
 $Incomefile = fopen("income.txt", "r") or die("Unable to open file!");
	$i=0;
echo "<<<<<<<<<<Income>>>>>>>>>>>\n";
echo "No. | Date | Income | Category | Total \n";
// Output lines until the end of the file is reached
$incomeTotal = 0 ;
while (!feof($Incomefile)) {
	
	$GtIncomeData= fgets($Incomefile);
	
	
	$Incomefile_ex = explode(" | ",$GtIncomeData);
	$incomeTotal_ex = $Incomefile_ex[1];
	$incomeTotal = $incomeTotal+$incomeTotal_ex;
	
	$GtIncomeData = explode("\n",$GtIncomeData);
	$GtIncomeData = $GtIncomeData[0];
	
		$i++;
	echo " $i | ";
    echo $GtIncomeData;
	
	echo " | $incomeTotal \n";
	//echo "<br>";
}

fclose($Incomefile);
	
	
echo " \n";	 

	$expensefile = fopen("expense.txt", "r") or die("Unable to open file!");
	$k=0;
echo "<<<<<<<<<<Expense>>>>>>>>>>>\n";
echo "No. | Date | Expense | Category | Total \n";
// Output lines until the end of the file is reached
$expenseTotal = 0 ;
while (!feof($expensefile)) {
	
	$GtexpenseData= fgets($expensefile);
	
	
	$expensefile_ex = explode(" | ",$GtexpenseData);
	$expenseTotal_ex = $expensefile_ex[1];
	$expenseTotal = $expenseTotal+$expenseTotal_ex;
	
	$GtexpenseData = explode("\n",$GtexpenseData);
	$GtexpenseData = $GtexpenseData[0];
	
	
			$k++;
			
	printf(format:" $k | $GtexpenseData | $expenseTotal \n");
			
}

fclose($expensefile);
	
	$GrantTotal = $incomeTotal - $expenseTotal;
echo " \n";
echo "-------------------------------
Grant Total = $GrantTotal
";
}	
elseif($mainid==6){
	
	$myfile = fopen("category.txt", "r") or die("Unable to open file!");
echo "No. - Category \n";
// Output lines until the end of the file is reached
while (!feof($myfile)) {
    echo fgets($myfile);
	//echo "<br>";
}

fclose($myfile);
	
	
echo " \n";
}	
elseif($mainid==7){
	break;

}
else{
	
	//printf(format:"Congress! u are right..\n");
	
	
}	
	
	
}


?>