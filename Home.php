<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="MyCSS.css" rel="stylesheet">
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
        <?php
        // put your code here


echo "<table style  = 'border: solid 1px black;' class = 'form-group'>";
echo "<tr class ='form-control'><th>ID</th><th>Email </th><th>Name</th><th>More Info</th></tr>";




echo "</table>";
echo "<br/>";
echo "<br/>";
echo "<br/>";



        ?>
    </body>
</html>
