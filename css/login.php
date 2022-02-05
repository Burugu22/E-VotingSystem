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
    <link rel="stylesheet" href="TLogin1.css">
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
        };

        function checkpwd() {
            const ps1 = document.getElementById("new").value;
            const ps2 = document.getElementById("confirm").value;
            if (ps1 != ps2) {
                alert("The Passwords Entered Do Not Match.");
                document.getElementById("new").value='';
                document.getElementById("confirm").value='';
                
            }else{
                const p=document.querySelector(".oldpwd");
                const w=document.getElementById("verify");

                p.style.display='initial';
                w.style.display='none';
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

    session_start();

    $user=$_POST["user"];
    $ps=$_POST["ps"];
    $_SESSION['user']=$user;

    $user1=$_SESSION['user'];

    $sql = "SELECT * FROM `user` WHERE id_no=$user1";

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
                                    <form action="login.php" method="post">

                                                          
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
            $nm=$row["name"];
            $id=$row["id_no"];
            $psw=$row["pswrd"];
       
        }
        
    }

                                   echo" <input type='text' name='name' value=$nm id='' hidden>";
                                   echo" <input type='text' name='user' value=$id id='' hidden>";
                                   echo" <input type='text' name='ps' value=$psw id='' hidden>";

                                   echo" <span onclick='homee()' class='navbar-brand' style='font-size: 17px;'><input type='button' style='font-size: 17px; background-color: rgba(39, 38, 38, 0.884);border-style: none;' value='Home'><span class='glyphicon glyphicon-home'></span></span>";
                                ?>
                                    </form>
                                </li>
                            </ul>

                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="voter()">Vote <span class="caret"></span></a>
                                   
                                </li>


                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="viewcont()">Votes Casted <span class="caret"></span></a>
                                  
                                </li>



                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="helpp()">Help <span class="caret"></span></a>
            
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" onclick="changep()">Change Password <span class="caret"></span></a>
                                    
                                </li>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Logout <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="e-vote.html">Sign Out</a></li>
                                    </ul>
                                </li>



                            </ul>

                        </div>
                        <!-- /.navbar-collapse -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
                <div class="content">
                       
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
            $nm=$row["name"];
       
        }
        
    }
    echo "
    
<input type='text' name='namew' id='' value='$nm' hidden>
    <span class='use' style=' position: absolute;right: 1%;'>$nm <span class='glyphicon glyphicon-user' style='color: green;font-size: 15px;'></span></span>";

    ?>
    
    <span class='headd' style="font-weight: 700;font-size: 18px;color:green;word-spacing:4px">Home</span> 
    <hr style='border: 1px solid rgb(51, 46, 46);top:-13px;position:relative;'></hr>
                    <div class="boox">
                        <div class="box1">
                            <div class="content1">
            <!-- Home -->
                                <div class="log">
                                    <h3 style='text-align:center'>
                                        <p>Welcome to the E-voting system.</p>
                                        <p>Head to the Navigation menu to vote or view votes casted.</p>
                                        <p>Your Vote Counts.</p>
                                        <p>Kura Yako Sauti Yako.</p>
                                    </h3>

                                </div>


             <!-- Vote -->
                               <div class="votee">
                                    <h3 style="font-weight: bold;"> Click the radio button to vote for your desired Candidate
                                          <form action="vote.php" method="post">                                                    
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
            $ct=$row["county"];
            $cs=$row["constituency"];
       
        }
        
    }

echo "<br><br></b><span><caption>1. President</caption></span><br>
<input type='text' name='idd' id='' value='$user' hidden>
<input type='text' name='nameww' id='' value='$nmp' hidden>

<table>
<tr>
<th>Candidate</th>
<th>Party</th>
<th>Vote</th>
</tr>
";
    $sql = "SELECT * FROM `pres`";
$p=1;
    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $pn=$row["name"];
            $pp=$row["party"];
        echo "
        <tr>
<td>$pn </td>
<td>$pp</td>
<td><input type='radio' name='attend' value='$pn' id='pp$p'> <input type='text' name='' id='ppp$p' value='$pp' hidden></td>
        </tr>
       ";
       $p++;
        }
        
    }
echo "</table><br>";

echo "<span><caption>2. Governor</caption></span><br><table>
<tr>
<th>Candidate</th>
<th>Party</th>
<th>Vote</th>
</tr>
";
    $sql = "SELECT * FROM `governor` WHERE `county`='$ct' ";
$p=1;
    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $gn=$row["name"];
            $gp=$row["party"];
            echo "
            <tr>
    <td>$gn </td>
    <td>$gp</td>
    <td><input type='radio' name='attend1' value='$gn' id='gg$p' > <input type='text' name='' id='ggp$p' value='$gp' hidden></td>
            </tr>
           ";
       $p++;
        }
        
    }

    echo "</table><br>";

    echo "<span><caption>3. Senator</caption></span><br><table>
    <tr>
    <th>Candidate</th>
    <th>Party</th>
    <th>Vote</th>
    </tr>
    ";
    $sql = "SELECT * FROM `senator` WHERE `county`='$ct' ";
$p=1;
    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $sn=$row["name"];
            $sp=$row["party"];
            echo "
            <tr>
    <td>$sn </td>
    <td>$sp</td>
    <td><input type='radio' name='attend2' value='$sn' id='ss$p'> <input type='text' name='' id='ssp$p' value='$sp' hidden></td>
            </tr>
           ";
       
       $p++;
        }
        
    }
    echo "</table><br>";

    echo "<span><caption>4. MP</caption></span><br><table>
    <tr>
    <th>Candidate</th>
    <th>Party</th>
    <th>Vote</th>
    </tr>
    ";
    $sql = "SELECT * FROM `mp` WHERE `constituency`='$cs'";
$p=1;
    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $mn=$row["name"];
            $mp=$row["party"];
            echo "
            <tr>
    <td>$mn </td>
    <td>$mp</td>
    <td><input type='radio' name='attend3' value='$mn' id='mp$p' > <input type='text' name='' id='mpp$p' value='$mp' hidden> </td>
            </tr>
           ";
       
       $p++;
        }
        
    }
    echo "</table>";


    ?>
    <br>
    <input type="button" value="Submit" class="btnn" onclick="checkvote()">
    <input type="button" value="Back" class="btnn" onclick="backn()">

    
    
                                </div>


                                                  
             <!-- Check Votes -->
                               <div class="contestantvote">
                                    <h3 style="font-weight: bold;">Confirm Votes
                                        <sup><span class="glyphicon glyphicon-asterisk" style="color: red;font-size: 10px;"></span></sup></h2>
<table>
    <tr>
        <th>Seat</th>
        <th>Candidate Name</th>
        <th>Party</th>
    </tr>

    <tr>
        <td>President</td>
        <td class="pname"></td>
        <td class="pparty"></td>
    </tr>
    
    <tr>
        <td>Governor</td>
        <td class="gname"></td>
        <td class="gparty"></td>
    </tr>
    
    <tr>
        <td>Senator</td>
        <td class="sname"></td>
        <td class="sparty"></td>
    </tr>
    
    <tr>
        <td>M.P</td>
        <td class="mname"></td>
        <td class="mparty"></td>
    </tr>
</table>
<br>
    <input type="submit" value="VOTE" class="btnn vot">
<input type="button" value="Back" class="btnn" onclick="back1()">
                                </div>

                                </form>
                                
             <!-- Contestants -->
                               <div class="contestant">

                                    <?php
 $id=$_POST["user"];
 
$sql = "SELECT * FROM `user` WHERE id_no=$id ";

$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $ps=$row["president"];
        $gv=$row["governor"];
        $st=$row["senator"];
        $mp=$row["mp"];
        $ctt=$row["county"];
        $cti=$row["constituency"];
   
    }
    
    
}

echo "<h3 style='text-align:center'>Showing Results For $ctt County $cti Constituency</h3>";

echo "<h4 style='font-weight: bold;'>You have voted for:</h4>";
if($ps==''){
    echo "<h3>You Have Not Voted Yet</h3><br>";
}else{
    echo "<table>";
    echo "
    <tr>
    <th>Seat</th>
    <th>Candidate's Name</th>
    </tr>
    
    <tr>
    <td>President</td>
    <td>$ps</td>
    </tr>
    
    <tr>
    <td>Governor</td>
    <td>$gv</td>
    </tr>
    
    <tr>
    <td>Senator</td>
    <td>$st</td>
    </tr>
    
    <tr>
    <td>M.P</td>
    <td>$mp</td>
    </tr>
    </table>
    ";
    
}


echo "<br><h4>Presidential Results</h4><table>";
echo "
<tr>
<th>Candidate's Name</th>
<th>Political Party</th>
<th>No. Votes</th>
</tr>";

$sql = "SELECT * FROM `pres`";
$count=0;
$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $nm=$row["name"];
        $vts=$row["vote"];
        $count=$vts+$count;
        if($vts==null){
            $vts=0;
        }
        $pr=$row["party"];
        
        echo "
<tr>
<td style='text-align:center'>$nm</td>
<td style='text-align:center'>$pr</td>
<td style='text-align:center'>$vts</td>
</tr>
";

    }

    echo "
    <tr>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    </tr>
    <tr>
    <td style='text-align:center' colspan=2><b>Total Votes Casted</b></td>
    <td style='text-align:center'>$count</td>
    </tr>
    </table>";
    
}

echo "<br><h4>Governor Results</h4><table>";
echo "
<tr>
<th>Candidate's Name</th>
<th>Political Party</th>
<th>No. Votes</th>
</tr>";

$sql = "SELECT * FROM `governor` where `county`='$ctt'";
$count=0;
$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $nm=$row["name"];
        $vts=$row["votes"];
        $count=$vts+$count;
        if($vts==null){
            $vts=0;
        }
        $pr=$row["party"];
        
        echo "
<tr>
<td style='text-align:center'>$nm</td>
<td style='text-align:center'>$pr</td>
<td style='text-align:center'>$vts</td>
</tr>
";

    }

    echo "
    <tr>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    </tr>
    <tr>
    <td style='text-align:center' colspan=2><b>Total Votes Casted</b></td>
    <td style='text-align:center'>$count</td>
    </tr>
    </table>";
    
}

echo "<br><h4>Senator Results</h4><table>";
echo "
<tr>
<th>Candidate's Name</th>
<th>Political Party</th>
<th>No. Votes</th>
</tr>";

$sql = "SELECT * FROM `senator` where `county`='$ctt'";
$count=0;
$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $nm=$row["name"];
        $vts=$row["votes"];
        $count=$vts+$count;
        if($vts==null){
            $vts=0;
        }
        $pr=$row["party"];
        
        echo "
<tr>
<td style='text-align:center'>$nm</td>
<td style='text-align:center'>$pr</td>
<td style='text-align:center'>$vts</td>
</tr>
";

    }

    echo "
    <tr>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    </tr>
    <tr>
    <td style='text-align:center' colspan=2><b>Total Votes Casted</b></td>
    <td style='text-align:center'>$count</td>
    </tr>
    </table>";
    
}


echo "<br><h4>Member Of Parliament Results</h4><table>";
echo "
<tr>
<th>Candidate's Name</th>
<th>Political Party</th>
<th>No. Votes</th>
</tr>";

$sql = "SELECT * FROM `mp` where `constituency`='$cti'";
$count=0;
$result=$con-> query($sql);
if($result-> num_rows > 0)
{
    while($row=$result-> fetch_assoc())
    {
        $nm=$row["name"];
        $vts=$row["votes"];
        $count=$vts+$count;
        if($vts==null){
            $vts=0;
        }
        $pr=$row["party"];
        
        echo "
<tr>
<td style='text-align:center'>$nm</td>
<td style='text-align:center'>$pr</td>
<td style='text-align:center'>$vts</td>
</tr>
";

    }

    echo "
    <tr>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    <td style='text-align:center'>-</td>
    </tr>
    <tr>
    <td style='text-align:center' colspan=2><b>Total Votes Casted</b></td>
    <td style='text-align:center'>$count</td>
    </tr>
    </table>";
    
}
                                    ?>

                                </div>


             <!-- Help -->
             <div class="help">
             <h3 style='text-align:center'>
             <p>Head to the Navigation menu to vote or view votes casted.</p>
                   <p>If you have any Query please contact <span style='color:blue'>078929749273</span></p> 
                   <p>or email <span style='color:green'>rollins@gmail.com</span></p> 
             </h3>                    
                                </div>

                

             <!-- CHANGE PASSWORD FOR LOGIN -->
             <div class="changepwd">
                <h3 style="font-weight: bold;">Change Password
                    <sup><span class="glyphicon glyphicon-asterisk" style="color: red;font-size: 10px;"></span></sup></h2>

                  

                    <form action="changepwd.php" method="POST" onsubmit="ppch()">
                    <?php
                    session_start();
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
    $_SESSION['ps']=$ps;
    $sql = "SELECT * FROM `user` WHERE id_no=$user ";

    $result=$con-> query($sql);
    if($result-> num_rows > 0)
    {
        while($row=$result-> fetch_assoc())
        {
            $pp=$row["id_no"];
            $j=$row["Emp_ID"];
            $isAlive=$row["isAlive"];
           
            echo "<input type='text' name='user' value='$pp' id='ppc' hidden>";
       
        }
        
    }
                          
                    ?>
                         <label for="paswrd">New Password</label><br>
                        <input type="password" autocomplete="off" required="required" name="new" id="new" placeholder="New Password">
                        <br><label for="paswrd">Confirm Password</label><br>
                        <input type="password" autocomplete="off" required="required" name="confirm" id="confirm" placeholder="Confirm Password">
                        <br>

                        <br><input class="btn1" id="verify" type="button" value="Verify" onclick="checkpwd()">
<br>
                        <span class="oldpwd" style="display:none">
                        <label for="paswrd">Old Password</label><br>
                        <input type="password" autocomplete="off" required="required" name="old" id="old" placeholder="Old Password">
                        <br>
                        
                        <br><input class="btn1" type="submit" value="Submit" onclick="">
                        </span>
                    </form>
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
            Copyright @ G.O.K All Rights Reserved<br> Designed By MCS 4.1 GROUP </div>
    </div>


    <!-- Bootstrap core JavaScript-->
    <script src="evote.js"></script>
    <script src="../js/jquery.min.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>
    <script src="../assets/js/docs.min.js"></script>


</body>

</html>

</html>

