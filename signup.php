<?php
session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>inventory </title>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css"/>
    <link rel="stylesheet" href="css/matrix-login.css"/>
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

</head>
<body>
<div id="loginbox">
    <form name="form1" class="form-vertical" action="" method="post">
        <div class="control-group normal_text"><h3>Signup</h3></div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="First Name"
                                                                                       name="firstname" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Last Name"
                                                                                       name="lastname" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_lg"><i class="icon-user"> </i></span><input type="text"
                                                                                       placeholder="Username"
                                                                                       name="username" required/>
                </div>
            </div>
        </div>
        <div class="control-group">
            <div class="controls">
                <div class="main_input_box">
                    <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password"
                                                                                      placeholder="Password"
                                                                                      name="password" required/>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <center>
                <input type="submit" name="submit1" value="Signup" class="btn btn-success"/>
            </center>
        </div>
    </form>
    <div type = text> Already having an Account? <a href="index.php" style = "color : red">Login</a></div>

    <?php
if (isset($_POST["submit1"])) {

    $count = 0;
    $res = mysqli_query($link, "select * from registration where  username='$_POST[username]' && password='$_POST[password]' && firstname='$_POST[firstname]' && lastname='$_POST[lastname]'");
    $count = mysqli_num_rows($res);

    if ($count > 0) {
        ?>
        <div class="alert alert-danger">
                User with this credential already exists...
        </div>
        <?php
    } else {
        mysqli_query($link, "insert into `registration` values('$_POST[firstname]','$_POST[lastname]','$_POST[username]','$_POST[password]',NULL)");
        ?>
        
        <script type="text/javascript">
                window.location = "index.php";
        </script>
        <?php
    }


}

?>
</div>