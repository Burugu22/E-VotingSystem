   
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
            $isAlive=$row["isAlive"];
           
            if($isAlive=='false'){
                echo "
                <script>
                    alert('The owner of this Id is not alive');
                </script>
                ";
                header("refresh:0; url=e-vote.html");
            }
            if($pp!=$ps){
                echo "
        <script>
        alert('The Password Entered is Incorrect. $pp');
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
    header("refresh:0; url=login.php");
    ?>
