<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

    $name=$_POST["name"];
    $id=$_POST["id"];
    $phone=$_POST["phone"];
    $pswrd=$_POST["pswrd"];
    $pswrdc=$_POST["pswrdc"];
    $county=$_POST["county"];
    $constituency=$_POST["constituency"];

    $sql="INSERT INTO `user` (`id`, `name`, `id_no`, `phone`, `pswrd`, `county`, `constituency`, `flag`, `president`, `governor`, `senator`, `mp`) VALUES
     (NULL, '$name', '$id', '$phone', '$pswrd', '$county', '$constituency', NULL, NULL, NULL, NULL, NULL)";
    if(!mysqli_query($con,$sql)){
        echo "
        <script>
        alert('The Id number you entered Already exist');
        </script>
        ";
        header("refresh:0; url=e-vote.html");
         
    }else{
        echo "
        <script>
        alert('Registered succesfully, Proceed to Login');
        </script>
        ";
        header("refresh:0; url=e-vote.html");
    }
    ?>
</body>
</html>