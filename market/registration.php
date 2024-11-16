<?php
// Connection to the MySQL database
$servername = "localhost";
$usernames = "root";
$passwords = "";
$database = "techie";

$conn = new mysqli($servername, $usernames, $passwords, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['submit'])) {
    //Fetch from html
    $UserName = $_POST['UserName'];
    $Email = $_POST['Email'];
    $MobileNo = $_POST['MobileNo'];
    $Npassword = $_POST['Npassword'];
    $Cpassword = $_POST['Cpassword'];
    $query1 = "SELECT * FROM `membership` WHERE UserName= '$UserName'";
    $duplicate = mysqli_query($con, $query1);


//validation
    if(preg_match("/^({0-9}{10})$/",$MobileNo))
    {
        echo "<script>alert('MobileNo is invalid');</script>";

    }


    if (mysqli_num_rows($duplicate) > 0) {
        //Duplication check
        echo "<script>alert('UserName has been already taken');</script>";
        //header("location:registration.html");
    } else {
        if ($Npassword == $Cpassword) {
            //Insert into database
            $query = "INSERT INTO `membership`(`UserName`, `MobileNo`, `Email`, `Password`) 
    VALUES ('$UserName','$MobileNo','$Email','$Cpassword')";
            $result = mysqli_query($con, $query);
            if ($result) 
            {
                echo "<script>alert('Registration Sucessful')</script>";
                header("location:login.html");
            }
        } 
        else 
        {
            echo "<script>alert('Password doesnt match')</script>";
        }

    }
}



?>

