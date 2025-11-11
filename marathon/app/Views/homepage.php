<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Marathon master</title>

    <?php
    $error_styles = "";

        if(isset($load_error)){

            $load_error = null;
            $error_styles = "alert alert-danger";
            echo '<script>document.location.href = "#login"</script>';
        }


    ?>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>


<!-- Navigation -->
<nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation">
    <div class="container topnav">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand topnav" href="#">Marathon Master</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="#about">About</a>
                </li>
                <li>
                    <a href="#services">Services</a>
                </li>
                <li>
                    <a href="#login">Login</a>
                </li>
                <li>
                    <a href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>


<!-- Header -->
<a name="about"></a>
<div class="intro-header">
    <div class="container">

        <div class="row">
            <div class="col-lg-12">
                <div class="intro-message">
                    <h1>Marathon Master</h1>
                    <h3>Software that just runs!</h3>

                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.intro-header -->

<!-- Page Content -->

<a  name="services"></a>
<div class="content-section-a">

    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Doin Data and Software Stuff and Things<br>Special Thanks</h2>
                <p class="lead"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad culpa eligendi eos excepturi exercitationem fuga illum, impedit modi nam necessitatibus odio quam quis, quod saepe sequi sint sunt suscipit vel.</span></p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="img/img-data.png" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<div class="content-section-b">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Merging with the Matrix<br>by FunkycodeMaster1994</h2>
                <p class="lead"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, amet animi corporis cupiditate ducimus ea esse expedita explicabo impedit laudantium minus modi nam neque, nostrum officia, officiis quas rem unde?</span></p>
            </div>
            <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                <img class="img-responsive" src="img/img-code.png" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->

<div class="content-section-a">

    <div class="container">

        <div class="row">
            <div class="col-lg-5 col-sm-6">
                <hr class="section-heading-spacer">
                <div class="clearfix"></div>
                <h2 class="section-heading">Track Your Progress<br>Work hard... Much gains</h2>
                <p class="lead"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusamus ad, architecto, culpa distinctio dolores enim harum laboriosam nobis, quaerat quia quos rem soluta. At dignissimos eligendi laborum odio quae.</span></p>
            </div>
            <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                <img class="img-responsive" src="img/img-stonks.png" alt="">
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-a -->

<a  name="login"></a>
<div class="content-section-b">
    <div class="container">
        <div class = "row">
            <div id="col-sm-12 <?=$error_styles;?>">
                <?php

                $validation = service('validation');
                if($validation->hasError('username')){
                    echo $validation->getError('username');
                }
                else if($validation->hasError('username')) {
                    echo $validation->getError('username');
                }
                else if (isset($error_message)){
                    echo $error_message;
                }

                if($validation->hasError('email'))
                {
                    echo $validation->getError('username');
                }
                else if (isset($error_message)){
                    echo  $error_message;
                }

                if($validation->hasError('password'))
                {
                    echo $validation->getError('password');
                }
                else if (isset($error_message)){
                    echo  $error_message;
                }

                if($validation->hasError('password2'))
                {
                    echo $validation->getError('password2');
                }
                else if (isset($error_message)){
                    echo  $error_message;
                }



                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5   col-sm-6">
                <h2>Login</h2>
                <?php
                    echo form_open('http://10.7.66.26/marathon/public/login');
                    echo form_input('username', '','placeholder = "Username"');
                    echo form_password('password', '','placeholder = "Password"');
                    echo form_submit('submit', 'login');
                    echo form_close();
                ?>

            </div>
            <div class="col-lg-5  col-sm-6">
                <h2>Create Account</h2>
                <?php
                echo form_open('http://10.7.66.26/marathon/public/create');
                echo form_input('username', '','placeholder = "Username"');
                echo form_input('email', '', 'placeholder = "Email"');
                echo form_password('password', '','placeholder = "Password"');
                echo form_password('password2', '','placeholder = "Password2"');
                echo form_submit('submit', 'Create Account');
                echo form_close();
                ?>
            </div>
        </div>

    </div>
    <!-- /.container -->

</div>
<!-- /.content-section-b -->
<a  name="contact"></a>
<div class="banner">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <h2>Take the Red Pill!</h2>
            </div>
        </div>
    </div>
    <!-- /.container -->

</div>
<!-- /.banner -->

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-inline">
                    <li>
                        <a href="#">Home</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#about">About</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#services">Services</a>
                    </li>
                    <li class="footer-menu-divider">&sdot;</li>
                    <li>
                        <a href="#contact">Contact</a>
                    </li>
                </ul>
                <p class="copyright text-muted small">Copyright &copy; Your Company 2014. All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>

<!-- jQuery -->
<script src="js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>

</body>

</html>
