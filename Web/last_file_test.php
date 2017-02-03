<?php
/*
session_start();   //starting the session
if(!$_SESSION['csir']){
echo "access denied";							//get user_id from the created session_cache_expire
					} 
else{					
echo $_SESSION['csir'];
echo "Im in!"; 
$logged_in_person=$_SESSION['csir'];
echo $logged_in_person;
}*/
	$host='127.0.0.1';
	$user='root';
	$password='';
	$dbname = 'wdmtf';

   $con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n"; 
   $sql = 'SELECT * FROM USERS';
   $result = mysqli_query($con3,$sql);
   var_dump($result)."\r\n";
   while (@$row = mysqli_fetch_row($result)){		
		
   }

?>