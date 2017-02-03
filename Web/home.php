<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="MyCSS.css" rel="stylesheet">
        <title> Home</title>
    </head>
    <body>
        <div class ="container">
            <div class ="main-center" style ="padding: 10px 50px;">
               <h2>Activities</h2>
            </div>
            
            <div class ="main-login" style = "background:#009edf; margin: 0 auto; max-width: 900px; padding: 10px 40x;color: #fff; text-shadow: none;  margin-top: 100px; ">

                <form name="login" action="http://127.0.0.1/projects/web/api/Logout" method="POST">

                    <div class ="form-group">

                        <table style = "border: hidden 3px #fff; width: 100%" class="form-control">
                            <thead>
                              <tr style = "color: blue ; width: 100%">
                                    <th >#</th>
                                    <th>FileName</th>
                                    <th>Last Checked</th>
                                    <th>Last Replaced</th>
                                    <th>FileStatus</th>
                                    <th>Action</th>
                              </tr>

                            <?php
							$loadUploads = file_get_contents("http://127.0.0.1/projects/web/scripts/Update.php");		
							
							//echo $loadUploads;
							
							session_start();   //starting the session
							if(!$_SESSION['csir']){
							header ("Location: index.php");
							
							//get user_id from the created session_cache_expire
							}    
							$logged_in_person=$_SESSION['csir'];
							
							
							
                            $FileID= "";
                            $servername = "127.0.0.1";
                            $username = "root";
                            $password = "";
                            $dbname = "wdmtf";
                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                            }
                            
  
                            $conn2 = new mysqli($servername, $username, $password, $dbname);
                            $query2 ="SELECT * FROM USERFILE WHERE user_ipaddress='".$GLOBALS['logged_in_person']."'";
                            $result = mysqli_query($conn2,$query2);
                            while (@$row = mysqli_fetch_row($result)){
                                //var_dump($row[2])."\r\n";
                               //taking data from database to views the form table
                              $FileID=$row[0];
                              $colour=$row[4];
                              echo "<tr class ='form-control' style = 'color:#fff'>";
                              echo"<th>";
                              echo $row[0];
                              echo"</th><th>";
                              echo $row[1];
                              echo"</th><th>";
                              echo $row[2];
                              echo"</th><th>";
                              echo $row[3];
                              echo"</th><th>";
                              echo $colour;
                              echo"</th><th>";
                              echo"<a href=moreinfo.php?UserFileID=$FileID>More Info</a>";
                              echo "</th></tr>";
                            //var table = $(".table");
                                    //var $tr = $("tr").append(
                                            //$("<td>").html(getColour("green"))
                                    //);
                                    //$tr.appendTo(".table > tbody");
                                                                                      }
					        function updateRefresh() {
								$loadUploads = file_get_contents("http://127.0.0.1/projects/web/scripts/Update.php");
								echo $loadUploads;
								echo "<script type='text/javascript'>
						function updateRefresh(){
							alert('Refreshed');
						}
                    </script>";
							}
                            $conn->close();
                            ?>
               </thead>
             </tbody>
            </table> 

          </div>

          <div class ="form-group">
				
                <input type="submit" value="Logout" name="Logout" id="button" class="btn btn-primary btn-lg btn-block login-button" />
				
          </div>
       </form>
	   <?php echo $GLOBALS['logged_in_person'];?>
	   
	   <a href="http://127.0.0.1/projects/web/scripts/Update.php">GGGGGGG</a>
	   

      </div>
    </div>
          
    </body>
</html>