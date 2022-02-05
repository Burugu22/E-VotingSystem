<?php
   

$con=mysqli_connect("localhost:3307","root","root","e-voting");
if(!$con){
echo "Error: ".mysqli_connect_error();
exit();
}

$old=$_POST['old'];
$new=$_POST['new'];
$confirm=$_POST['confirm'];
$user=$_POST['user'];

if($new!=$confirm){
    echo "
    <script>
        alert('Password Entered Does Not Match')
    </script>
    ";
}

 
$sql = "SELECT * FROM `user` WHERE id_no=$user";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $pp=$row["pswrd"];
        $j=$row["Emp_ID"];
        if($pp==$old)
        {
           $sql="UPDATE `user` SET `pswrd` = '$new' WHERE `id_no` = $user";
           if(!mysqli_query($con,$sql)){
               echo "Failed";
           }else{
               echo "
               <script>
                alert('Password Changed Succesfully');
               </script>
               ";
               header("refresh:0; url=e-vote.html");
           }
        }else{
            echo "
    <script>
    alert('The Old Password Entered is Incorrect.');
    </script>
    ";
    echo "Operation failed!<br> Old password entered is incorrect.<br>Redirecting to Login page.";
    header("refresh:4; url=e-vote.html");
        }
   
    }
    
}

?>