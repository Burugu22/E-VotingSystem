<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap, a sleek, intuitive, and powerful mobile first front-end framework for faster and easier web development.">
    <meta name="keywords" content="HTML, CSS, JS, JavaScript, framework, bootstrap, front-end, frontend, web development">
    <meta name="author" content="Moses Maina, L. Mwangi, Benson Ochieng, Rolyings Ochieng, Bona Gisemba">

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
                document.write("The Passwords You've Entered Do Not Match");
            }
        }
    </script>

</head>

<body>

    <div class="whole">



                <div class="content" style='height:250px;padding-top:70px;text-align:center'>

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
    
    $id=$_POST["idd"];
    $ps=$_POST["ps"];
    $gs=$_POST["gs"];
    $ss=$_POST["ss"];
    $ms=$_POST["ms"];

    $sql = "SELECT * FROM `user` WHERE id_no=$id ";

    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $ct=$row["county"];
            $cs=$row["constituency"];
            $user=$row["name"];
            $flag1=$row["flag"];

            if($flag1==true){
                echo "<span style='font-size:30px;font-weight:700;text-align:center'><b style='color:red'>Error!!!</b><br>  You Have Already Voted.</span>";
                echo "<div class='footer' style='position:relative;top:100px'>
                Copyright @ G.O.K All Rights Reserved<br> Designed By Martin Njoroge </div>";
                exit();
                            }
       
        }
        
    }


    $pn=$_POST["attend"];
    $gn=$_POST["attend1"];
    $sn=$_POST["attend2"];
    $mn=$_POST["attend3"];
    if($pn.value == true and $gn.value == true and $sn.value == true and $mn.value == true){
        $sql="UPDATE `user` SET `president` ='$pn', `governor`='$gn', `senator`='$sn', `mp`='$mn', `flag`='true' WHERE `id_no` =$id";
        if(mysqli_query($con,$sql)){
        }

        

$sql = "SELECT * FROM `pres` WHERE `name` ='$pn' ";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $ct=$row["vote"];
        $pnew=$ct+1;
        $sql="UPDATE `pres` SET `vote` = '$pnew' WHERE `name` = '$pn'";
if(mysqli_query($con,$sql)){
}

      
    }
    
}


$sql = "SELECT * FROM `mp` WHERE `name` ='$mn' ";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $ct=$row["votes"];
        $pnew=$ct+1;
        $sql="UPDATE `mp` SET `votes` = '$pnew' WHERE `name` = '$mn'";
if(mysqli_query($con,$sql)){
}

      
    }
    
}




$sql = "SELECT * FROM `governor` WHERE `name` ='$gn' ";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $ct=$row["votes"];
        $pnew=$ct+1;
        $sql="UPDATE `governor` SET `votes` = '$pnew' WHERE `name` = '$gn'";
if(mysqli_query($con,$sql)){
}

      
    }
    
}



$sql = "SELECT * FROM `senator` WHERE `name` ='$sn' ";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $ct=$row["votes"];
        $pnew=$ct+1;
        $sql="UPDATE `senator` SET `votes` = '$pnew' WHERE `name` = '$sn'";
if(mysqli_query($con,$sql)){
}

      
    }
    
}




}




    
    echo "<span style='font-size:30px;font-weight:700;text-align:center'>$user,<br> <b style='color:green'>You have voted Succesfully.</b></span>"; 


    ?> </div>
        <div class="footer">
            Copyright @ G.O.K All Rights Reserved<br> Designed By MCS 4.1 GROUP </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="evote.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>


</body>

</html>