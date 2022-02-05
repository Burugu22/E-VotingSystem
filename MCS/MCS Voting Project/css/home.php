<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">

    <title>E-Voting</title>
    <link rel="stylesheet" href="TLogin.css">
    <link rel="stylesheet" href="evote.css">

    <!-- Bootstrap core CSS -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Optional Bootstrap Theme -->
    <link href="data:text/css;charset=utf-8," data-href="../dist/css/bootstrap-theme.min.css" rel="stylesheet" id="bs-theme-stylesheet">


    <!-- Documentation extras -->
    <link href="../assets/css/docs.min.css" rel="stylesheet">
    <script src="../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script src="../assets/js/ie-emulation-modes-warning.js"></script>

    <link rel="apple-touch-icon-precomposed" href="../apple-touch-icon-precomposed.png">
    <link rel="icon" href="./logo1.jpg">

    <script>
        function check() {
            const p1 = document.getElementById("p1").value;
            const p2 = document.getElementById("p2").value;
            if (p1 != p2) {
                document.write("The Passwords You've Entered Are Incorrect.");
            }
        }
    </script>

</head>

<body>

   
<?php
    $server= "localhost:3307";
    $user="root";
    $password ="root";
    $dbname="e-voting";
    
    
    $con=mysqli_connect($server,$user,$password,$dbname);
    if(mysqli_connect_error()){
        echo"failed to connect";
        exit();
    }

    $user=$_POST["user"];
    $ps=$_POST["ps"];

    $sql = "SELECT * FROM `user` WHERE id_no=$user ";

    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $pp=$row["pswrd"];
            $j=$row["Emp_ID"];
            if($pp==$ps)
            {
                echo "
                <script>
                alert('Login Succesfully...');
                </script>
                ";
                header("refresh:0; url=home.php");
            }else{
                echo "
        <script>
        alert('The Password Entered is Incorrect.');
        </script>
        ";
        header("refresh:0; url=e-vote.html");
            }
       
        }
        
    }else{
        echo "
        <script>
        alert('The ID_No Does Not Exist.');
        </script>
        ";
        header("refresh:0; url=e-vote.html");
    }
    ?>

    <div class="whole">
        <div class="header1">
            <div class="h">
                <marquee behavior="" direction="">
                    <div class="hl">
                        <img src="logo1.jpg" height="50px" alt="">
                        <span class="hd"> GOVERNMENT OF KENYA</span>
                        <img src="logo1.jpg" height="50px" alt="">

                    </div>
                </marquee>
            </div>
            <div class="navbar">
                <nav class="navbar navbar-inverse" role="navigation">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                          <span class="sr-only">Toggle navigation</span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                          <span class="icon-bar"></span>
                        </button>

                            <ul class="nav navbar-nav">

                                <li class="home">
                                    <a href="MutuiniWeb.html" class="navbar-brand" style="font-size: 17px;">Home<span class="glyphicon glyphicon-home"></span></a>
                                </li>
                            </ul>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vote <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    </ul>
                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">View Contestants <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                    </ul>
                                </li>



                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Help <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">

                                    </ul>
                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logout <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Sign Out</a></li>
                                    </ul>
                                </li>



                            </ul>

                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <div class="content">
                    <span style="font-weight: 700;font-size: 18px;color:green;word-spacing:4px">E-voting System.ke</span> <span class="glyphicon glyphicon-userr"></span>
                    <hr style="border: 1px solid rgb(51, 46, 46);"></hr>

                    <div class="boox">
                        <div class="box1">
                            <div class="content1">

                                <div class="log">
                                    <h3 style="font-weight: bold;">E-voting System.ke
                                        <sup><span class="glyphicon glyphicon-asterisk" style="color: red;font-size: 10px;"></span></sup></h2>

                                </div>

                                <div class="create">
                                    <h3 style="font-weight: bold;">Sign In
                                        <sup><span class="glyphicon glyphicon-asterisk" style="color: red;font-size: 10px;"></span></sup></h2>

                                </div>



                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
        <div class="footer">
            Copyright @ G.O.K All Rights Reserved<br> Designed By Martin Njoroge </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="evote.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>


</body>

</html>

</html>

