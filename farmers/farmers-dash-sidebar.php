
<nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">
                                <?php 
                                        // Check if the user is logged in and their name is set in the session
if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['username'])) {
    // Display the logged-in user's name
    
    echo '<span>'. '<p style="font-size: 20px">' . 'Welcome' . ' ' . $_SESSION['username'] . '</p>' . '</span>';
} elseif (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // Display "Admin" when the admin is logged in
    echo '<span>Admin</span>';
} else {
    // Display a default name or handle cases when the user is not logged in
    echo '<span>Guest</span>'; // Change "Guest" to any default name you prefer
}
                                ?>
                        </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active pcoded-trigger">
                                    <a href="farmers-dash.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded">
                                    <a href="add_farmer.php">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Farmers</span>
                                    </a>
                                </li>
                                <li class="pcoded">
                                    <a href="add_farms.php">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-landscape"></i></span>
                                        <span class="pcoded-mtext">Farms</span>
                                    </a>
                                    
                                </li>

                                <li class="pcoded">
                                    <a href="../bookings/view_bookings.php">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-landscape"></i></span>
                                        <span class="pcoded-mtext">Bookings</span>
                                    </a>
                                    
                                </li>
                               
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-local-florist"></i></span>
                                        <span class="pcoded-mtext">Crops</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="add_crops.php">
                                                <span class="pcoded-mtext">Add Crops</span>
                                            </a>
                                            
                                        </li>
                                        
                                        <li class=" ">
                                            <a href="view_crops.php">
                                                <span class="pcoded-mtext">Crop Mangement</span>
                                            </a>
                                        </li>

                                    
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                                        <span class="pcoded-mtext">Market Place</span>
                                        <span class="pcoded-badge label label-danger">100+</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="widget-statistic.htm">
                                                <span class="pcoded-mtext">List Products</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="widget-data.htm">
                                                <span class="pcoded-mtext">All Products</span>
                                            </a>
                                        </li>
                                        

                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
    
      
  