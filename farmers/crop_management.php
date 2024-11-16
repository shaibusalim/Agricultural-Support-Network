<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Crop</title>
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
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\style.css">
    <link rel="stylesheet" type="text/css" href="../libraries\assets\css\jquery.mCustomScrollbar.css">
     <!-- Material Icon -->
     <link rel="stylesheet" type="text/css" href="../libraries\assets\icon\material-design\css\material-design-iconic-font.min.css">
    <style>
  /* Apply basic styling to the table */
  table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
  }

  th, td {
    border: 1px solid #dddddd;
    padding: 8px;
    text-align: left;
  }

  th {
    background-color: #f2f2f2;
    font-weight: bold;
  }

  tr:nth-child(even) {
    background-color: #f9f9f9;
  }

  tr:hover {
    background-color: #f1f1f1;
  }

  input[type="text"],
  textarea {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
  }

  textarea {
    height: 100px;
  }

  input[type="submit"] {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  /* Style the form labels */
  label {
    font-weight: bold;
    margin-bottom: 6px;
    display: block;
  }

  .crop-details {
  margin-bottom: 10px;
  /* Other styling properties */
}




.stage-container {
  display: flex;
  align-items: center;
}

.stage {
  width: 100px;
  height: 30px;
  border: 1px solid #ccc;
  border-radius: 5px;
  text-align: center;
  line-height: 30px;
  margin: 5px;
  cursor: pointer;
}

.completed {
  background-color: #5cb85c; /* Color for completed stages */
  color: white;
}


.label {
        font-weight: bold;
        color: #777;
        margin-right: 5px; /* Adjust spacing between label and value */
    }

    .crop-name {
        font-weight: bold;
        color: #333;
    }

    .crop-variety {
        font-style: italic;
        color: #555;
    }

</style>

</head>
<body>

<div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            <!-- Begining of navbar-->
                    <?php include 'farmers-dash-nav.php'; ?>
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
                        <?php include "farmers-dash-sidebar.php"; ?>
                   <!-- Sidebar Ends -->  
   
             <div class="pcoded-content mainContent">
                    <div class="pcoded-inner-content">
                        <div class="main-body">
                                <div class="page-wrapper">
                                    <div class="page-body">
                                    <div class="card">
                            <div class="card-header">
                                <h5>Manage Your Crops Here!</h5>
                            </div>


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
                <h5>Crop Management</h5>
            </div>

            <?php
         

include "../connection.php";

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['crop_id'])) {
    $cropId = $_GET['crop_id'];
    $farmerId = $_SESSION['farmer_id']; // Assuming you need the farmer's ID

    // Fetch crop details based on the ID and farmer ID from the database
    $sql = "SELECT * FROM crops WHERE crop_id = ? AND farmer_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cropId, $farmerId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
            
        echo '<p class="crop-name">' . $row['name'] . '</p>';
        echo '<p class="crop-variety">' . $row['variety'] . '</p>';



        // Display crop details in a form for management
        echo '<form action="update_crop.php" method="post">';
        echo '<input type="hidden" name="crop_id" value="' . $cropId . '">';

        echo '<label for="growth_stage">Growth Stage:</label>';
        echo '<input type="text" id="growth_stage" name="growth_stage" value="' . htmlspecialchars($row['growth_stage']) . '"><br>';

        echo '<label for="treatments">Treatments:</label>';
        echo '<input type="text" id="treatments" name="treatments" value="' . htmlspecialchars($row['treatments']) . '"><br>';

        echo '<label for="issues">Issues:</label>';
        echo '<textarea id="issues" name="issues">' . htmlspecialchars($row['issues']) . '</textarea><br>';

        echo '<input type="submit" name="update" value="Update">';
        echo '</form>';
    } else {
        echo "Crop not found or unauthorized access.";
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Crop ID not provided or invalid request.";
}
?>









<br><br>
<br><br>



<!-- Your HTML structure representing the table -->
<table>
  <thead>
    <tr>
      <th>Crop Name</th>
      <th>Growth Stage</th>
      <th>Treatments</th>
      <th>Issues</th>
      <!-- Add more table headers as needed -->
    </tr>
  </thead>
  <tbody id="cropTableBody">
    <!-- Table body content will be populated dynamically -->
    <?php
    include "../connection.php";

    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['crop_id'])) {
        $cropId = $_GET['crop_id'];
        $farmerId = $_SESSION['farmer_id']; // Assuming you need the farmer's ID
    
        // Fetch crop details based on the ID and farmer ID from the database
        $sql = "SELECT * FROM crops WHERE crop_id = ? AND farmer_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $cropId, $farmerId);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result && $result->num_rows > 0) {
// Generate table rows with updated information
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['name']) . "</td>";
    echo "<td>" . htmlspecialchars($row['growth_stage']) . "</td>";
    echo "<td>" . htmlspecialchars($row['treatments']) . "</td>";
    echo "<td>" . htmlspecialchars($row['issues']) . "</td>";
    // Add more table cells if needed
    echo "</tr>";
}
$conn->close();
     }else {
        echo "<tr><td colspan='8'>No records found</td></tr>";
    }
     
 }else{
    echo "Farmer not logged in";
}


?>
  </tbody>
</table>

<br><br>
<br><br>
<br><br>

<div class="growth-tracker">
  <div class="stage-container">
    <div class="stage completed">Stage 1</div>
    <div class="stage completed">Stage 2</div>
    <div class="stage">Stage 3</div>
    <div class="stage">Stage 4</div>
    <div class="stage">Stage 5</div>
  </div>
</div>

        </div>
    </div>
</div>
   



   


<script src="update.js"></script>
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




