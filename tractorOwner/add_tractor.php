<?php
session_start();
include "../connection.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['owner_id'])) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $year = $_POST['year'];
    $horsepower = $_POST['horsepower'];
    $description = $_POST['description'];
    $conditions = $_POST['conditions']; 
    $availability = $_POST['availability'];
    $utilization = $_POST['utilization']; 
    $ownerId = $_SESSION['owner_id'];

    $target_dir = "../handles/images/";
    $target_file = $target_dir . basename($_FILES["tractor_image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES["tractor_image"]["tmp_name"], $target_file)) {
        $imageURL = $target_file;

        $sql = "INSERT INTO tractors (brand, model, year, horsepower, description, image_url, conditions, availability, utilization, owner_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        // Bind parameters to the prepared statement
        $stmt->bind_param("sssssssssi", $brand, $model, $year, $horsepower, $description, $imageURL, $conditions, $availability, $utilization, $ownerId);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Error uploading image.";
    }
    $conn->close();
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tractors</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="#">
    <meta name="keywords" content="Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="#">
    <!-- Favicon icon -->
    <link rel="icon" href="../libraries\assets\images\favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="../libraries\bower_components\bootstrap\css\bootstrap.min.css">
    <!-- feather Awesome -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\feather\css\feather.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\font-awesome\css\font-awesome.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\jquery.mCustomScrollbar.css">
     <!-- Material Icon -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\material-design\css\material-design-iconic-font.min.css">

     <style>
    /* Basic form styling */
    form {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 300px;
        max-width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    label {
        margin-top: 10px;
        display: block;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    textarea,
    input[type="file"],
    input[type="submit"] {
        width: calc(100% - 24px);
        margin-bottom: 10px;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        font-size: 14px;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    input[type="submit"] {
        background-color: #4caf50;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }
</style>
</head>
<body>
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Begining of navbar-->
                    <?php include "tractor-owner-nav.php"; ?>
            <!-- End of navbar-->
              <!-- Sidebar chat start -->
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="card card_main p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-inner-header">
                                <div class="back_chatBox">
                                    <div class="right-icon-control">
                                        <input type="text" class="form-control  search-text" placeholder="Search Friend" id="search-friends">
                                        <div class="form-icon">
                                            <i class="icofont icofont-search"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box" data-id="1" data-status="online" data-username="Josephin Doe" data-toggle="tooltip" data-placement="left" title="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="2" data-status="online" data-username="Lary Doe" data-toggle="tooltip" data-placement="left" title="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="3" data-status="online" data-username="Alice" data-toggle="tooltip" data-placement="left" title="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="4" data-status="online" data-username="Alia" data-toggle="tooltip" data-placement="left" title="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia</div>
                                    </div>
                                </div>
                                <div class="media userlist-box" data-id="5" data-status="online" data-username="Suzen" data-toggle="tooltip" data-placement="left" title="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius" src="../libraries\assets\images\avatar-2.jpg" alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat start-->
            <div class="showChat_inner">
                <div class="media chat-inner-header">
                    <a class="back_chatBox">
                        <i class="feather icon-chevron-left"></i> Josephin Doe
                    </a>
                </div>
                <div class="media chat-messages">
                    <a class="media-left photo-table" href="#!">
                        <img class="media-object img-radius img-radius m-t-5" src="../libraries\assets\images\avatar-3.jpg" alt="Generic placeholder image">
                    </a>
                    <div class="media-body chat-menu-content">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                </div>
                <div class="media chat-messages">
                    <div class="media-body chat-menu-reply">
                        <div class="">
                            <p class="chat-cont">I'm just looking around. Will you tell me something about yourself?</p>
                            <p class="chat-time">8:20 a.m.</p>
                        </div>
                    </div>
                    <div class="media-right photo-table">
                        <a href="#!">
                            <img class="media-object img-radius img-radius m-t-5" src="../libraries\assets\images\avatar-4.jpg" alt="Generic placeholder image">
                        </a>
                    </div>
                </div>
                <div class="chat-reply-box p-b-20">
                    <div class="right-icon-control">
                        <input type="text" class="form-control search-text" placeholder="Share Your Thoughts">
                        <div class="form-icon">
                            <i class="feather icon-navigation"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sidebar inner chat end-->
         <div class="pcoded-main-container">
             <div class="pcoded-wrapper">
                   <!-- Sidebar Starts -->
                        <?php include "tractor-owner-sidebar.php"; ?>
                   <!-- Sidebar Ends -->  
   
             <div class="pcoded-content mainContent">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                    <div class="card">
                            <div class="card-header">
                                <h5>Add Tractor</h5>
                            </div>

      
    <form action="add_tractor.php" method="POST" enctype="multipart/form-data">
     
    <label for="brand">Brand:</label><br>
    <input type="text" id="brand" name="brand" required><br>
    
    <label for="model">Model:</label><br>
    <input type="text" id="model" name="model" required><br>
    
    <label for="year">Year:</label><br>
    <input type="number" id="year" name="year"><br>
    
    <label for="horsepower">Horsepower:</label><br>
    <input type="number" id="horsepower" name="horsepower"><br>
    
    <label for="description">Description:</label><br>
    <textarea id="description" name="description" rows="4"></textarea><br>
    
    <label for="image">Image:</label><br>
    <input type="file" id="tractor_image" name="tractor_image" accept="image/*"><br>
    
    <!-- New fields for tractor details -->
    <label for="conditions">Condition:</label><br>
    <input type="text" id="condition" name="conditions"><br>
    
    <label for="availability">Availability:</label><br>
    <input type="text" id="availability" name="availability"><br>
    
    <label for="utilization">Utilization:</label><br>
    <input type="text" id="utilization" name="utilization"><br>
    
    <input type="submit" value="Add Tractor">
</form>



                        </div>
                                     </div>
                            </div>
                        </div>
                    </div>
         </div>

        


<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <!-- Main-body start -->
        <div class="main-body">
            <div class="card-header">
                <h5>List of Tractors</h5>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-styling table-hover table-striped table-primary">
                        <thead>
                            <tr>
                  
                            <th>Brand</th>
                            <th>Model</th>
                            <th>Year</th>
                            <th>Horsepower</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Condition</th>
                            <th>Availability</th>
                            <th>Utilization</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "../connection.php"; // Establish the database connection

                            if(isset($_SESSION['owner_id'])){
                                $ownerId = $_SESSION['owner_id'];

                                $sql = "SELECT * FROM tractors WHERE owner_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $ownerId); // Assuming owner_id is an integer
                                $stmt->execute();
                                $result = $stmt->get_result();
                            
                            if ($result && $result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                   
                                    echo "<td>" . $row['brand'] . "</td>";
                                    echo "<td>" . $row['model'] . "</td>";
                                    echo "<td>" . $row['year'] . "</td>";
                                    echo "<td>" . $row['horsepower'] . "</td>";
                                    echo "<td>" . $row['description'] . "</td>";
                                    echo "<td><img src='" . $row['image_url'] . "' alt='Tractor Image' width='100' height='100'></td>";
                                    echo "<td>" .$row['conditions'] . "</td>"; // Condition: You can replace this with actual condition data
                                    echo "<td>" .$row['availability'] . "</td>"; // Availability: You can replace this with actual availability data
                                    echo "<td>" .$row['utilization'] . "</td>"; // Utilization: You can replace this with actual utilization data
                                   
                                    echo "<td>
                                            <a href='edit_tractors.php?tractor_id=" . $row['tractor_id'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                            <button onclick='deletetractor(".$row['tractor_id'].")' class='btn btn-danger btn-sm'>Delete</button>
                                          </td>";
                                   
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='8'>No records found</td></tr>";
                            }

                        $conn->close();
                            }else{
                                echo "tractor woner not logged in";
                            }
                         ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

    
                    </div>  
            </div>                  
     </div>
 </div>
          <!-- task, page, download counter  end -->


          <script>

function deletetractor(tractor_id) {
    if (confirm("Are you sure you want to delete this tractor?")) {
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    try {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            alert(response.message);
                            window.location.reload();
                        } else {
                            alert(response.message);
                        }
                    } catch (error) {
                        console.error("Error parsing JSON:", error);
                        console.error(xhr.responseText); // Log the response for debugging
                    }
                } else {
                    console.error("XHR request failed:", xhr.status);
                    console.error(xhr.responseText); // Log the response for debugging
                }
            }
        };
        xhr.open("GET", "delete_tractor.php?tractor_id=" + tractor_id, true);
        xhr.send();
    }
}

</script>

      
    <script data-cfasync="false" src="..\..\..\cdn-cgi\scripts\5c5dd728\cloudflare-static\email-decode.min.js"></script><script type="text/javascript" src="../libraries\bower_components\jquery\js\jquery.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\jquery-ui\js\jquery-ui.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\popper.js\js\popper.min.js"></script>
    <script type="text/javascript" src="../libraries\bower_components\bootstrap\js\bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="../libraries\bower_components\jquery-slimscroll\js\jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="../libraries\bower_components\modernizr\js\modernizr.js"></script>
    <!-- Chart js -->
    <script type="text/javascript" src="../libraries\bower_components\chart.js\js\Chart.js"></script>
    <!-- amchart js -->
    <script src="../libraries\assets\pages\widget\amchart\amcharts.js"></script>
    <script src="../libraries\assets\pages\widget\amchart\serial.js"></script>
    <script src="../libraries\assets\pages\widget\amchart\light.js"></script>
    <script src="../libraries\assets\js\jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="../libraries\assets\js\SmoothScroll.js"></script>
    <script src="../libraries\assets\js\pcoded.min.js"></script>
    <!-- custom js -->
    <script src="../libraries\assets\js\vartical-layout.min.js"></script>
    <script type="text/javascript" src="../libraries\assets\pages\dashboard\custom-dashboard.js"></script>
    <script type="text/javascript" src="../libraries\assets\js\script.min.js"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-23581568-13');
</script>

    
</body>
</html>