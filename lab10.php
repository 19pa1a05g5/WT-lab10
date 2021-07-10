<html>
<body>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$database="mydb";
$conn=mysqli_connect($servername,$username,$password,$database);
if ($conn){
    echo ("connected to the database");
}else{
    echo ("Couldnot connect to the database".mysqli_connect_error());
}
//$sql1="CREATE TABLE register_tbl(
  //  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
   // Name VARCHAR(50) NOT NULL,
   // Email VARCHAR(100) NOT NULL,
   // PassWord VARCHAR(10) NOT NULL,
    //PhoneNumber VARCHAR(10) NOT NULL,
    //Date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    //)";
//if(mysqli_query($conn,$sql1)){
  //  echo("table created successfully");
//}else{
  //   echo ("table is not created");
 //}
?>
    <form method="POST" action="">
        Name : <input type="text" name="name"><br>
        Email : <input type="email" name="email"><br>
        Password :  <input type="password" name="password"><br>
        PhoneNumber: <input type="text" name="phonenumber"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD']=="POST") {
   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];
$phonenumber=$_POST['phonenumber'];
    
$qry1 = "INSERT INTO register_tbl (`Name`, `Email`, `Password`,`PhoneNumber`) VALUES
    ('$name','$email','$password','$phonenumber')";
    
$res1 = mysqli_query($conn, $qry1);
if($res1){
    echo ("Information is inserted in table"."<br>");
}else{
    echo ("Not added to table.Try again");
}
}
$qry2="SELECT * FROM `register_tbl`";
$res2=mysqli_query($conn,$qry2);
if (mysqli_num_rows($res2) > 0) {
    while($row = mysqli_fetch_assoc($res2)) {
             ?>
         <tr>
            <td>
                <?php 
                    echo "Name : ". $row['Name']."<br>";
                    echo "Email : ".$row['Email']."<br>";
                    echo "PhoneNumber : ".$row['PhoneNumber']."<br>";
                ?>
    
            </td>
            </tr>
            <?php
            }
        }
            ?>
