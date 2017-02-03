<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="MyCSS.css" rel="stylesheet">
        <title>Login</title>
    </head>
    <body>
        <div class ="container">
            <div class ="row main">
                <div class ="main-login main-center">
                    <h2>Sign In</h2>
                    <form name="login" action="http://127.0.0.1/projects/web/API/login" method="POST">
                        <div class ="form-group">
                            <label for="user_email" class="cols-sm-2 control-label">E-mail</label>
                            <div class ="cols-sm-10">
                                <div class ="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="text" id ="user_email" name="user_email" value="" class ="form-control" placeholder="Enter your email" /> <!--- Email input box--->
                                </div>
                            </div>
                        </div>
                        <div class ="form-group">
                            <label for="user_password" class="cols-sm-2 control-label">Password</label> 
                            <div class="cols-sm-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                    <input type="password" name="user_password" value="" id="user_password" class ="form-control" placeholder ="Enter yor password" />  <!--- password input box--->
                                </div>
                            </div>
                        </div>
                        <div class ="form-group">
                            <input type="submit" value="Login" name="login" id="button" class="btn btn-primary btn-lg btn-block login-button"/>
                        </div>
                       <label class="cols-sm-2 control-label">Not yet a memeber? <a href="http://127.0.0.1/projects/web/Register.php">Sign Up Now</a> </label>
                    </form>
                    <?php
                    // put your code here
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>