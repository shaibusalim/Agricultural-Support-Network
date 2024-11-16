<?php
 session_start();

            include "../connection.php"; 

                if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['mover_id'])){
                        $companyName = $_POST['company_name'];
                        $name = $_POST['contact_person'];
                        $address = $_POST['address'];
                        $location = $_POST['location'];
                        $moverId = $_SESSION['mover_id'];

                        $sql = "UPDATE movers SET company_name=?, contact_person=?, address=?, location=? WHERE mover_id =?";

                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("ssssi", $companyName, $name, $address, $location, $moverId);

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
            <input type='text' name='company_name' placeholder='Enter Company Name'><br>
            <input type='text' name='contact_person' placeholder='Your name'><br>
            <input type='text' name='address' placeholder='Enter Address'><br>
            <input type='text' name='location' placeholder='Enter Location'><br>
            <button type='submit' name='add_details'>Add Details</button>
        </form>
        <p>Please click &nbsp; <a href="profile.php">Here</a> &nbsp; to go back to your profile</p>
        </body>
        </html>
     
  
        
