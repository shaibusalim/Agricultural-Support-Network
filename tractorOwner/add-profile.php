<?php
 session_start();

            include "../connection.php"; 

                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['owner_id'])){
                        $firstName = $_POST['firstname'];
                        $lastName = $_POST['lastname'];
                        $address = $_POST['address'];
                        $location = $_POST['location'];
                        $no =$_POST['No'];
                        $type =$_POST['type'];
                        $ownerId = $_SESSION['owner_id'];

                        $sql = "UPDATE tractor_owners SET firstName=?, lastName=?, address=?, location=?, No=?, type=? WHERE owner_id =?";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssisi", $firstName, $lastName, $address, $location, $no, $type, $ownerId);

                        if($stmt->execute()){
                            echo "record update successfully";
                        }else{
                            echo "Error: " . $stmt->error;
                        }

                }
        ?>

        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Add Profile</title>
            <style>
                /* Basic styling */
                form {
        max-width: 400px;
        margin: 0 auto;
        font-family: Arial, sans-serif;
        padding: 20px;
        background-color: #f7f7f7;
        border-radius: 8px;
        box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.1);
    }
    input[type='text'] {
        width: 100%;
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        border: 1px solid #ccc;
        box-sizing: border-box;
    }
    input[type='text']:focus {
        outline: none;
        border-color: #4CAF50;
        box-shadow: 0 0 5px #4CAF50;
    }
    button[type='submit'] {
        padding: 12px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
        width: 100%;
        border-radius: 5px;
    }
    button[type='submit']:hover {
        background-color: #45a049;
    }
    p{
        display: flex;
        justify-content: center;
        align-items: center;
    }
            </style>
        </head>
        <body>
        <form action='add-profile.php' method='POST'>
            <input type='text' name='firstname' placeholder='Enter First Name'><br>
            <input type='text' name='lastname' placeholder='Enter Last Name'><br>
            <input type='text' name='address' placeholder='Enter Address'><br>
            <input type='text' name='location' placeholder='Enter Location'><br>
            <input type='text' name='No' placeholder='Number of Tractors'><br>
            <input type='text' name='type' placeholder='Type of Tractors'><br>
            <button type='submit' name='add_details'>Add Details</button>
        </form>
        <p>Please click &nbsp; <a href="profile.php">Here</a> &nbsp; to go back to your profile</p>
        </body>
        </html>
     
  
        
