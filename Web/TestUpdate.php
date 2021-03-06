<?php
///////**********************Variables*******************************/////////////
$dir = getcwd();    
$dir2 = '../BackUpFolder/';

$files1 = array();
$files2 = array();

$host='127.0.0.1';
$user='root';
$password='';
$dbname = 'academycity';

$var = true; 
$var2 = true; 
$date1 = date("Y-m-d H:i:s");
$file_status1 = 'blue';
$file_status2 = 'red';
$file_more = 'file/user/';
$id_file = '';
///////**********************Variables*******************************/////////////

///////**********************Rerun script function********************************/////////////
function reRun()
{
echo date('Y-m-d H:i:s') . "\n";

// sleep for 10 seconds
sleep(20);

// wake up !
echo "Executing \r\n";//date('Y-m-d H:i:s') . "\n";
exec('php -q TestUpdate.php');

// sleep for 10 seconds
sleep(20);
}
///////**********************Rerun script function********************************/////////////


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

///////**********************Check data in database function*******************************/////////////
function checkIfExists()
{
global $name;
   if($GLOBALS['var']){    
   @$con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";
   mysql_select_db($GLOBALS['dbname'],$con3);
   $sql = "SELECT COUNT(userFileId) FROM files;";
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
   $sql = "SELECT * FROM files WHERE userFileName ="."'$file_name'";
   $result = mysql_query($sql, $con3) or die("Error in $sql:" . mysql_error($con3));    

   while($row = mysql_fetch_object($result)) {
         $GLOBALS['userFileId'] = $row->userFileId;
   }
       
   mysql_close($con3);

   return $GLOBALS['userFileId'];    
   
   }
}
///////**********************Check data in database function*******************************/////////////



///////**********************Send to database function*******************************/////////////
function sendToDB($file_name,$last_date,$replaced_date,$file_status,$file_more)
{ 
  if($GLOBALS['var']){
  $con3 = mysql_connect($GLOBALS['host'],$GLOBALS['user'],$GLOBALS['password'], $GLOBALS['dbname']) or die ('Error connecting to MySQL server.')."\r\n";  
  $mysql='INSERT INTO files'.'(userFileName, userLastChecked,	userLastReplaced,userFileStatus, userMoreInfo)'.'VALUES ("'.$file_name.'","'.$last_date.'","'.$replaced_date.'","'.$file_status.'","'.$file_more.'")';
  mysql_select_db("academycity");
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
 $mysql = "UPDATE files SET userFileStatus ='".$file_status."', userLastReplaced ='".$replaced_date."' WHERE userFileId ='".$file_id."' AND userFileName='".basename($file_name)."'";
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
function recopy_file($the_dir,$the_dir2,$the_file1,$the_file2,$the_date,$the_colour){

   if(basename($the_file1) == basename($the_file2))
   {
      $f1 = file_get_contents(realpath($the_file1));
      $f2 = file_get_contents(realpath($the_file2));

      if($f1 != $f2){             
        error_reporting(0);
       $fs=fopen(realpath($the_file1), "r");
       $ft=fopen(realpath($the_file2), "w");

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

           echo basename($the_file1)." copied and updated successfully ...\n";
           updateDB($the_file1,$the_date,$the_colour);
       }
         else{
           echo basename($the_file1)." already up to date...\n";
         }
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
   if(basename($file_name)!= '.' && basename($file_name)!= '..' ){
          //sendToDB(basename($file_name),$GLOBALS['date1'],$GLOBALS['date1'],$GLOBALS['file_status1'],$GLOBALS['file_more']);
    }
   } 
  else{
   continue;
  }
  
}
///////**********************Calling send to database function*******************************/////////////


///////**********************Checking md5 hash****************************/////////////
if($GLOBALS['var2']){
foreach($files1 as $f_name)
{         
   foreach($files2 as $file_2)
   {     
           if(@md5_file(realpath($f_name)) != @md5_file(realpath($file_2)) && basename($f_name)!= '.' && basename($f_name)!= '..' && basename($file_2)!= '.' && basename($file_2)!= '..'){ 
           recopy_file($dir,$dir2,$f_name,$file_2,$GLOBALS['date1'],$GLOBALS['file_status1']);      
       }
           else{ 
            continue;         
           }
          
    }
}
}
print "*****************************************************************************************\r\n";
///////**********************Checking md5 hash********************************/////////////

///////**********************Calling rerun function********************************/////////////
reRun();
///////**********************Calling rerun function********************************/////////////


?>