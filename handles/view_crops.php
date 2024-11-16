<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crop Management</title>
</head>
<body>
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <!-- Main-body start -->
            <div class="main-body">
                <div class="card-header">
                    <h5>List of Crops</h5>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-styling table-hover table-striped table-primary">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Crop Name</th>
                                    <th>Variety</th>
                                    <th>Planting Date</th>
                                    <th>Harvest Date</th>
                                    <th>acreage</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "../connection.php"; // Establish the database connection
                                if(isset($_SESSION['farmer_id'])){
                                    $farmerId = $_SESSION['farmer_id'];
    
                                
                                $sql = "SELECT * FROM crops WHERE farmer_id = ?";
                                $stmt = $conn->prepare($sql);
                                $stmt->bind_param("i", $farmerId);
                                $stmt->execute();
                                $result = $stmt->get_result();
    
                                if ($result && $result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr>";
                                        echo "<td>" . $row['crop_id'] . "</td>";
                                        echo "<td>" . $row['name'] . "</td>";
                                        echo "<td>" . $row['variety'] . "</td>";
                                        echo "<td>" . $row['planting_date'] . "</td>";
                                        echo "<td>" . $row['harvest_date'] . "</td>";
                                        echo "<td>" . $row['acreage'] . "</td>";
                                        
                                       
                                        echo "<td>
                                        <a href='crop_management.php?crop_id=" . $row['crop_id'] . "' class='btn btn-primary btn-sm'>Manage</a>
                                        <button onclick='deleteCrop(" . $row['crop_id'] . ")' class='btn btn-danger btn-sm'>Delete</button>
                                              </td>";
                                       
                                        echo "</tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='8'>No records found</td></tr>";
                                }
    
                                $conn->close(); // Close the database connection
                            }else{
                                echo "crop owner not logged in";
                            }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
</body>
</html>