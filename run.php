<?php
//let me test this
session_start();   //starting the session
if(!$_SESSION['csir']){
echo "access denied";							//get user_id from the created session_cache_expire
					} 
else{					
echo $_SESSION['csir'];
echo "Im in!"; 
$logged_in_person=$_SESSION['csir'];
echo $logged_in_person;
///////**********************Variables*******************************/////////////
$dir = getcwd(); 
$dir2 = '../WebServerBackUp';
 
$files1 = array();
$files2 = array();
 
$host='127.0.0.1';
$user='root';
$password='';
$dbname = 'academycity';
 
$var = TRUE;
$date1 = date("Y-m-d");
$date2 = date("Y-m-d H:i:s");
$file_status1 = 'green';
$file_status2 = 'red';
$file_more = 'file/user/';
$id_file = "";
///////**********************Variables*******************************/////////////
 
 
///////**********************Database connection function*******************************/////////////
 
function dbConnection()
{
  @$con=mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']);
                    
if(!$con)
{
    return false;
}
else
{
            return true;
}
 
}
///////**********************Database connection function*******************************/////////////
 
///////*********************Calling database connection function*******************************/////////////
$var = dbConnection();
///////**********************Calling database connection function*******************************/////////////
 
///////**********************Send to database function*******************************/////////////
function sendToDB($file_name,$last_date,$replaced_date,$file_status,$file_more)
{
   if($GLOBALS['var']){
   @$con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n"; 
   $sql = "SELECT * FROM USERS WHERE user_email ='".$GLOBALS['logged_in_person']."'";
   mysql_select_db($GLOBALS['dbname'],$con3);
   $result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3)); 
   while($row = mysql_fetch_object($result)) {
		   $usernum = $row->user_id;   
	}
   $mysql='INSERT INTO USERFILE'.'(file_name,user_id,user_ipaddress,userFileStatus,userLastChecked,userLastReplaced,userMoreInfo)'.'VALUES ("'.$file_name.'","'.$usernum.'","'.$GLOBALS['logged_in_person'].'","'.$file_status.'","'.$GLOBALS['date1'].'","'.$GLOBALS['date1'].'","'.$file_more.'")';
   mysql_select_db("academycity");
   executeStatement($mysql, $con3);
   mysql_close( $con3);
  }
}
///////**********************Send to database function*******************************/////////////
///////**********************Update database function*******************************/////////////
function updateDB($file_name,$replaced_date,$file_status)
{
   if($GLOBALS['var']){
   $file_id = checkBeforeUpdate(basename($file_name));
   $con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";
    $mysql = "UPDATE USERFILE SET userFileStatus ='".$file_status."', userLastReplaced ='".$replaced_date."' WHERE userfile_id ='".$file_id."' AND file_name='".basename($file_name)."'";
   mysql_select_db("academycity");
   executeStatement($mysql,$con3);
   mysql_close($con3);
}
}
///////**********************Update database function*******************************/////////////
 
///////**********************Execute database function*******************************/////////////
function executeStatement($sqlstat,$sqlcon)
{
if(!mysql_query($sqlstat,$sqlcon))
{
    die('Could not enter data: ' . mysql_error())."\r\n";
}
else
{
    echo "Data is recorderd successfully\n";
}
 
 
}
 
///////**********************Execute database function*******************************/////////////
 
///////**********************Copy function*******************************/////////////
function copyr($source, $dest)
{
  if (!file_exists($dest)){  
    // Simple copy for a file
    if (is_file($source)) {
        return copy($source, $dest);
    }
 
    // Make destination directory
    if (!is_dir($dest)) {
        mkdir($dest);
    }
 
    // Loop through the folder
    $dir = dir($source);
    while (false !== $entry = $dir->read()) {
        // Skip pointers
        if ($entry == '.' || $entry == '..') {
            continue;
        }
 
        // Deep copy directories
        if ($dest !== "$source/$entry") {
            copyr("$source/$entry", "$dest/$entry");
        }
    }
 
    // Clean up
    $dir->close();
}
   
    return true;
}
 
///////**********************Copy function*******************************/////////////
 
 
///////**********************calling copy function*******************************/////////////
copyr($dir,$dir2);
///////**********************calling copy function*******************************/////////////
 
 
 
///////**********************Root Directory*******************************/////////////
$directory = $dir;
 
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
 
while($it->valid()) {
 
    $it->next();
    $files1 = $it;
}
///////**********************Root Directory*******************************/////////////
 
///////**********************Test Directory*******************************/////////////
$directory = $dir2;
 
$it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($directory));
 
while($it->valid()) {
 
    $it->next();
    $files2 = $it;
}
///////**********************Test Directory*******************************/////////////
 
 
///////**********************Calling send to database function*******************************/////////////
 
 
foreach($files1 as $file_name)
{
    if(basename($file_name)!= '.' && basename($file_name)!= '..' ){
       sendToDB(basename($file_name),$GLOBALS['date1'],$GLOBALS['date1'],$GLOBALS['file_status1'],$GLOBALS['file_more']);
    }
  
}
///////**********************Calling send to database function*******************************/////////////
 
 
}
?>