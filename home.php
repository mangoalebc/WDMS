
<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<src href="../jquery-3.1.0.min.js" type="text/javascript" />
<Style>
#playground-container {
    height: 500px;
    overflow: hidden !important;
    -webkit-overflow-scrolling: touch;
}
body, html{
     height: 100%;
 	background-repeat: no-repeat;
 	background:url(https://i.ytimg.com/vi/4kfXjatgeEU/maxresdefault.jpg);
 	font-family: 'Oxygen', sans-serif;
	background-size: cover;
}

.main{
 	margin:50px 15px;
}

h1.title {
	font-size: 50px;
	font-family: 'Passion One', cursive;
	font-weight: 400;
}

hr{
	width: 10%;
	color: #fff;
}

.form-group{
	margin-bottom: 15px;
}

label{
	margin-bottom: 15px;
}

input,
input:-webkit-input-placeholder {
    font-size: 11px;
    padding-top: 3px;
}

.main-login{
 	background-color: #fff;
    /* shadows and rounded borders */
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px;
    -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);

}
.form-control {
    height: auto!important;
padding: 8px 12px !important;
}
.input-group {
    -webkit-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    -moz-box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
    box-shadow: 0px 2px 5px 0px rgba(0,0,0,0.21)!important;
}
#button {
    border: 1px solid #ccc;
    margin-top: 28px;
    padding: 6px 12px;
    color: #666;
    text-shadow: 0 1px #fff;
    cursor: pointer;
    -moz-border-radius: 3px 3px;
    -webkit-border-radius: 3px 3px;
    border-radius: 3px 3px;
    -moz-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    -webkit-box-shadow: 0 1px #fff inset, 0 1px #ddd;
    box-shadow: 0 1px #fff inset, 0 1px #ddd;
    background: #f5f5f5;
    background: -moz-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f5f5f5), color-stop(100%, #eeeeee));
    background: -webkit-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -o-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: -ms-linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
    background: linear-gradient(top, #f5f5f5 0%, #eeeeee 100%);
   filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f5f5f5', endColorstr='#eeeeee', GradientType=0);
}
.main-center{
 	margin-top: 30px;
 	margin: 0 auto;
 	max-width: 400px;
    padding: 10px 40px;
	background:#009edf;
	    color: #FFF;
    text-shadow: none;
	-webkit-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
-moz-box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);
box-shadow: 0px 3px 5px 0px rgba(0,0,0,0.31);

}
span.input-group-addon i {
    color: #009edf;
    font-size: 17px;
}

.login-button{
	margin-top: 5px;
}

.login-register{
	font-size: 11px;
	text-align: center;
}


root { 
    display: block;
}
</style>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
        <title> Home</title>
    </head>
    <body>
        <div class ="container">
            <div class ="row main">
                <div class ="main-login main-center">
                    <h2>Activities</h2>
                    <form name="login" action="http://146.64.213.194/Bokang/Test6.php" method="POST">


                     <div class ="form-group">
                         <input type="submit" value="Check" name="Check" id="button" class="btn btn-primary btn-lg btn-block login-button" onclick="<a href='http://146.64.213.194/Bokang/API/Test6.php'>Check</a>" />
                    </div>

                    </form>

                    <form name="login" action="http://146.64.213.194/Bokang/API/Logout" method="POST">

                    <div class ="form-group">
                          <input type="submit" value="Logout" name="Logout" id="button" class="btn btn-primary btn-lg btn-block login-button" />
                    </div>
                    </form>

                </div>
            </div>
        </div>


  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<div class="container">
  <h2>User Status</h2>                                                                       
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>FileName</th>
        <th>LastChecked</th>
        <th>FileLastReplaced</th>
        <th>UserFileStatues</th>
	<th>Action</th>
      </tr>

<?php
$FileID= "";
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "files";
	
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//$sql = "INSERT INTO Files (UserFileID,UserFileName,UserLastChecked,UserLastReplaced,UserFileStatus,UserMoreInfo)
//VALUES ('001', 'www.kpro.co.za', '2017-01-14 15:30:01', '2017-01-15 14:30:01','green','needs impovement' )";

//if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
//} else {
    //echo "Error: " . $sql . "<br>" . $conn->error;
//}

echo '
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

	function helloWorld(){
		document.write(1 + 3);
				}

//var table = $(".table");
	//var $tr = $("tr").append(

		//$("<td>").html(getColour("green"))
	//);
	//$tr.appendTo(".table > tbody");

	 


</script>

';
$conn2 = new mysqli($servername, $username, $password, $dbname);

$query2 ="SELECT * FROM Files";
$result = mysqli_query($conn2,$query2);
while ($row = mysqli_fetch_row($result)){
                             //var_dump($row[2])."\r\n";
                               //taking data from database to views the form table                              
                              $FileID=$row[0];    
                              $colour=$row[4];
                              echo "<tr>";                                                
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
</div>
 


</body>
</html>


    </body>
</html>
