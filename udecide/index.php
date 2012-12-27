<?php
require_once 'config.php';
@session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>UDecide</title>

        <link href="css/bootstrap.css" rel="stylesheet" media="screen"/>
        <link href="css/bootstrap-responsive.css" rel="stylesheet"/>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>

        <style type="text/css">
            .logo {
                float: left;
                margin: 25px;
                display: inline;
            }
            .nav {
                position: relative;
                float: right;
                display: inline;
                right: 100px;
            }
            .nav li {
                float:left;
                margin-right: 15px;
                margin-left: 15px;
                font-size: 18px;
                margin-top: 45px;
            }
            .nav li a {
                color: #666;
            }
            .nav li a:hover {
                color: #000;
                background-color: #EEE;
            }
            .signup {
                position: relative;
                margin-top: 30px;
                background-image: url(img/marketing.png);
                height: 450px;
                width: 450px;
                float: right;
                display: inline;
                border-radius:25px;
                -moz-border-radius:25px; /* Old Firefox */
            }
            .intro {
                position: relative;
                float: left;
                top: 20px;
                left: 30px;
                margin-top: 30px;
                height: 450px;
                display: inline;
            }
            .intro a {
                color: #333;
            }
            .intro a:hover {
                color: #000;
            }
            .short {
                width: 540px;
            }
        </style>
    </head>

    <body>

        <div class="container" style="background-color: #EEE; width: 1160px;">
            <!--Side bar-->
            <a href="index.html"><img src="img/udecide_logo6.png" class="logo"/></a>
            <!--Survey menu-->
            <ul class="nav">
                <li><a href="index.html">Home</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="examples.html">Examples</a></li>
                <li><a href="contact.html">Contact us</a></li>
            </ul>
        </div>
        <div class="container" style="width: 1160px;">
            <!--Side bar-->
            <div class="intro">
                <h3 class="short" style="color: #333;">Surveys made accurate</h3>
                <p class="lead short" style="position: relative; top: 10px; color: #666; text-align: justify;">Subconscious mind has great impact in decision making. The Neurosense technology helps find out choices that subconcious mind makes, which is closer to real choices.</p>
                <p class="lead short" style="position: relative; top: 10px; color: #666; text-align: justify;">Surveys are available over multiple platforms. You can send surveys to targeted audiance and get response instantly.</p>
                <p class="lead short" style="position: relative; top: 10px; color: #666; text-align: justify;">To find out more features. See <a href="examples.html">Examples</a>.</p>
            </div>
            <!--Survey menu-->
            <div class="signup">
                <div class="alert alert-error fade in">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>Warning!</strong> Best check yourself, you're not looking too good.
                </div>
                <form action="cLogin.php" method="post" top="10%"  position="absolute">
                    <input name="email" type="text" placeholder="Email" style="position: relative; top: 65px; left: 50px; display: block;">
                    <input name="password" type="password" placeholder="Password" style="position: relative; top: 80px; left: 50px; display: block;">
                    <button type="submit" class="btn btn-large btn-primary" style="position: relative; top: 100px; left: 50px;">Log in</button>
                    <button class="btn btn-large btn-primary" type="button" style="position: relative; top: 100px; left: 75px;">Sign up</button>
                </form>
                <div id="alert">
                    <?php
                    if (isset($_SESSION['error_login']))
                        echo $_SESSION['error_login'] . '<br />';
                    unset($_SESSION['error_login']);
                    ?>
                </div>
            </div>
        </div>


        <script src="js/bootstrap.js"></script>
    </body>
</html>


</body>
</html>
