<?php
///////**********************Session Data*******************************/////////////
session_start();   
if(!$_SESSION['csir']){
echo "access denied";							//get user_id from the created session_cache_expire
					} 
else{					
echo $_SESSION['csir'];
echo "Im in!"; 
$logged_in_person=$_SESSION['csir'];
echo $logged_in_person;
///////**********************Session Data*******************************/////////////


///////**********************Variables*******************************/////////////
$dir = getcwd();	
$dir2 = '../WebServerBackUp/';

$files1 = array();
$files2 = array();
$files3 = array();

$host='127.0.0.1';
$user='root';
$password='';
$dbname = 'academycity';

$var = true; 
$var2 = true; 
$date1 = date("Y-m-d");
$file_status1 = 'orange';
$file_status2 = 'red';
$file_more = 'file/user/';
$id_file = '';
///////**********************Variables*******************************/////////////


///////**********************Rerun script function********************************/////////////
function reRun()
{
echo date('h:i:s') . "\n";

// sleep for 10 seconds
sleep(10);

// wake up !
echo "Executing \r\n";
exec('php -q Test6.php');

// sleep for 10 seconds
sleep(10);
}
///////**********************Rerun script function********************************/////////////


///////**********************Database connection function*******************************/////////////

function dbConnection()
{
  $con=mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']);
                     
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

///////**********************Check data in database function*******************************/////////////
function checkIfExists()
{
    global $name;
    if($GLOBALS['var']){	
	$con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";
	mysql_select_db($GLOBALS['dbname'],$con3);
	 $sql = "SELECT COUNT(userfile_id) FROM USERFILE WHERE user_ipaddress ='".$GLOBALS['logged_in_person']."'";
	$result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3));	
	
	if(mysql_result($result,0) > 0)
	{
           $GLOBALS['name'] = true;
	}	
	else
	{
	  $GLOBALS['name'] = false;
	}
	mysql_close($con3);
	
	return $GLOBALS['name'];	
    }
	
}

function checkBeforeUpdate($file_name)
{
   if($GLOBALS['var']){	
	$con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";
	mysql_select_db($GLOBALS['dbname'],$con3);
	$sql = "SELECT * FROM USERFILE WHERE file_name ="."'$file_name' AND user_ipaddress ='".$GLOBALS['logged_in_person']."'";
	$result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3));	

	while($row = mysql_fetch_object($result)) {
	      $GLOBALS['id_file'] = $row->FileID;
	}
		
	mysql_close($con3);

	return $GLOBALS['id_file'];	
	
    }
}
///////**********************Check data in database function*******************************/////////////



///////**********************Send to database function*******************************/////////////
function sendToDB($file_name,$hash,$last_date,$replaced_date,$file_status,$file_more)
{ 
   if($GLOBALS['var']){
   $con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";  
   $sql = "SELECT * FROM USERS WHERE user_email ='".$GLOBALS['logged_in_person']."'";
   mysql_select_db($GLOBALS['dbname'],$con3);
   $result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3)); 
   while($row = mysql_fetch_object($result)) {
		   $usernum = $row->user_id;   
   }
   $mysql='INSERT INTO USERFILE'.'(file_name,user_id,user_ipaddress,userFileStatus,userLastChecked,userLastReplaced,userMoreInfo)'.'VALUES ("'.$file_name.'","'.$usernum.'","'.$GLOBALS['logged_in_person'].'","'.$file_status.'","'.$GLOBALS['date1'].'","'.$GLOBALS['date1'].'","'.$file_more.'")';
   mysql_select_db($GLOBALS['dbname'],$con3);
   executeStatement($mysql, $con3);
   mysql_close($con3);
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
  mysql_select_db($GLOBALS['dbname'],$con3);
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
	    //echo "Data entered successfully\n";
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






///////**********************Recopy function*******************************/////////////
function recopy_file($the_file1,$the_date,$the_colour){

	 foreach($GLOBALS['files2'] as $the_value){
	   if(basename($the_value) == basename($the_file1) && $the_value != '.' && $the_value != '..'  ){	
		$f1 = file_get_contents(realpath($the_file1));
	        $f2 = file_get_contents(realpath($the_value));
		
		if($f1 != $f2){ 
		   error_reporting(0);
		   $fs=fopen(realpath($the_value), "r");
		   $ft=fopen(realpath($the_file1), "w");


			if ($fs==NULL)
			{
			    echo "Can't Open Source File ...\n";
			    exit(0);
			}

			if ($ft==NULL)
			{  
			    echo "Can't Open Destination File ...\n";
			    fclose ($fs);
			    exit(1);
			}

			else
			{
			    while ($ch=fgets($fs))
				fputs($ft, $ch);

			    fclose ($fs);
			    fclose ($ft);
			}

				echo basename($the_file1)." updated successfully ...\n";
				updateDB($the_file1,$the_date,$the_colour);
      	}
	     	else{
			echo basename($the_file1)." already up to date...\n";
	     	}	
	    }
	 
	   //sleep(1);
	 }	
}
///////**********************Recopy function*******************************/////////////


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


///////*********************Calling database connection function*******************************/////////////
$var2 = checkIfExists();
///////**********************Calling database connection function*******************************/////////////


///////**********************Calling send to database function*******************************/////////////
foreach($files1 as $file_name)
{ 
  if(!$GLOBALS['var2']){
    if(basename($file_name) != '.' && basename($file_name) != '..'){
    //echo basename($file_name)."   ".md5_file(realpath($file_name))."\r\n";
      sendToDB(basename($file_name),md5_file(realpath($file_name)),$GLOBALS['date1'],$GLOBALS['date1'],$GLOBALS['file_status1'],$GLOBALS['file_more']);
    }
   }
}
///////**********************Calling send to database function*******************************/////////////


///////**********************Get hashes*******************************/////////////
function getFilehashes($file_name,$hash)
{
 if($GLOBALS['var']){	
	$con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";
	mysql_select_db($GLOBALS['dbname'],$con3);
	$sql = "SELECT * FROM files";// WHERE File_name ='".basename($file_name)."'"; 
	$result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3));	
	
	while($row = mysql_fetch_object($result)) {
	      $GLOBALS['id_file'] = $row->file_hash;
	      $GLOBALS['id_name'] = $row->File_name;
 
	      if(basename($file_name) == $GLOBALS['id_name'] && $hash != $GLOBALS['id_file'] )
		{
		   //echo $file_name."     ".$hash."   ".$GLOBALS['id_name']."         ".$GLOBALS['id_file']."     They Are The Same!!\r\n";
		   recopy_file($file_name,$GLOBALS['date1'],$GLOBALS['file_status2']);
		}
	}

	mysql_close($con3);
    }
}
///////**********************Get hashes*******************************/////////////



///////**********************Checking md5 hash****************************/////////////
if($GLOBALS['var2']){
   foreach($files1 as $file_name)
	{ 
	 if(basename($file_name) != '.' && basename($file_name) != '..'){
	     getFilehashes($file_name,md5_file(realpath($file_name)));
	  }  
	}
}
print "*****************************************************************************************\r\n";
///////**********************Checking md5 hash********************************/////////////

///////**********************Calling rerun function********************************/////////////
//reRun();
///////**********************Calling rerun function********************************/////////////
}
?>

