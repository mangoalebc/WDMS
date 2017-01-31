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

                <form name="login" action="http://146.64.204.58/Bokang/API/Logout" method="POST">

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
                            $FileID= "";
                            $servername = "127.0.0.1";
                            $username = "root";
                            $password = "";
                            $dbname = "academycity";

                            // Create connection
                            $conn = new mysqli($servername, $username, $password, $dbname);
                            // Check connection
                            if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                            }
                            
  
                            $conn2 = new mysqli($servername, $username, $password, $dbname);
                            $query2 ="SELECT * FROM Files";
                            $result = mysqli_query($conn2,$query2);
                            while ($row = mysqli_fetch_row($result)){
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
                            $conn->close();
                            ?>

                    <script>
                    // put your code here
                    /********************************************************
                       *    Utility functions for datatable column display     *
                       ********************************************************/
                       function getColour(val)
                       {
                                    // Do not draw the rectangle if indicator does not have a tlp marking/tag
                                    if(val != "red" && val != "green" && val != "white" && val != "amber") return "";
                                    var svg1 = "<svg width=\"20\" height=\"20\"><circle cx=\"10\" cy=\"10\" r=\"9\" width=\"35\" height=\"26\" style=\'fill:";
                                    var svg2 = ";\stroke:black;stroke-width:1.2;opacity:0.6\'></circle></svg>"
                                    if(val.toLowerCase() == "amber") return svg1 + "yellow" + svg2;
                                    else
                                            return svg1 + val + svg2;
                       }
                    var table = $(".table");
                            var $tr = $("tr").append(
                                    $("<td>").html(getColour("green"))
                            );
                            $tr.appendTo(".table > tbody");

                    </script>

               </thead>
             </tbody>
            </table> 

          </div>

          <div class ="form-group">
                <input type="submit" value="Logout" name="Logout" id="button" class="btn btn-primary btn-lg btn-block login-button" />
          </div>
       </form>

      </div>
    </div>
          
    </body>
</html>