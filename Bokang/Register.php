<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>

    <?php
        session_start();
    ?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="MyCSS.css" rel="stylesheet">
        <title>Register</title>
    </head>
    <body>
        <div class ="container">
            <div class ="row main">
                <div class ="main-login main-center">
                    <h2>Sign Up</h2>
                    <form name="login" action="http://146.64.204.58/Bokang/API/insertUser" method="POST">
                        <div class ="form-group">
                            <label for="user_fullname" class="cols-sm-2 control-label">Full Names</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" id ="user_fullname" required name="user_fullname" value="" class ="form-control" placeholder="Enter your full names" /> <!--- Email input box--->
                                </div>
                            </div>
                        </div>

                        <div class ="form-group">
                            <label for="user_email" class="cols-sm-2 control-label">E-mail</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" id ="user_email" required name="user_email" value="" class ="form-control" placeholder="Enter your email" /> <!--- Email input box--->
                                    <!--<label for="user_fullname" class="cols-sm-2 control-label"></label>-->
                                </div>
                            </div>
                        </div>

                        <div class ="form-group">
                            <label for="user_password" class="cols-sm-2 control-label">Password</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="password" id ="user_password" required name="user_password" value="" class ="form-control" placeholder="Enter your password" /> <!--- Email input box--->
                                </div>
                            </div>
                        </div>

                        <div class ="form-group">
                            <label for="user_passwordconf" class="cols-sm-2 control-label">Confirm Password</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="password" id ="user_passwordconf" required name="user_passwordconf" value="" class ="form-control" placeholder="confirm your password" /> <!--- Email input box--->
                                </div>
                            </div>
                        </div>

                        <div class ="form-group">
                            <label for="user_ipaddress" class="cols-sm-2 control-label">IP Address/URL</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" id ="user_ipaddress" required name="user_ipaddress" value="" class ="form-control" placeholder="Enter IP Addres" /> <!--- Email input box--->
                                </div>
                            </div>
                        </div>

                        


                        <div class ="form-group">
                            <input type="submit" value="Register" name="register" id="button" class="btn btn-primary btn-lg btn-block login-button" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
        // put your code here

        
        ?>
    </body>
</html>
