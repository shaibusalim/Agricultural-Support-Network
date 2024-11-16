
                    <nav class="pcoded-navbar">
                        <div class="pcoded-inner-navbar main-menu">
                            <div class="pcoded-navigatio-lavel">
                            <?php 
                                        // Check if the user is logged in and their name is set in the session
if (isset($_SESSION['login']) && $_SESSION['login'] === true && isset($_SESSION['UserName'])) {
    // Display the logged-in user's name
    
    echo '<span>'. '<p style="font-size: 20px">' . 'Welcome' . ' ' . $_SESSION['UserName'] . '</p>' . '</span>';
} elseif (isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // Display "Admin" when the admin is logged in
    echo '<span style="font-size: 16px">Welcome Gh0sT</span>';
} else {
    // Display a default name or handle cases when the user is not logged in
    echo '<span>Guest</span>'; // Change "Guest" to any default name you prefer
}
?>
                            </div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li class="active pcoded-trigger">
                                    <a href="dashboard.php">
                                        <span class="pcoded-micon"><i class="feather icon-home"></i></span>
                                        <span class="pcoded-mtext">Dashboard</span>
                                    </a>
                                </li>
                                <li class="pcoded">
                                    <a href="../handles/add_farmer.php">
                                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                                        <span class="pcoded-mtext">Farmers</span>
                                    </a>
                                   
                                </li>
                                <li class="pcoded">
                                    <a href="../handles/add_farms.php">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-landscape"></i></span>
                                        <span class="pcoded-mtext">Farms</span>
                                    </a>
                                   
                                </li>
                                <li class="pcoded">
                                    <a href="../handles/add_mover.php">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-truck"></i></span>
                                        <span class="pcoded-mtext">Movers</span>
                                    </a>
                                   
                                </li>
                                <li class="pcoded">
                                    <a href="../handles/add_mover_machine.php">
                                        <span class="pcoded-micon"><i class="zmdi zmdi-truck"></i></span>
                                        <span class="pcoded-mtext">Mover Machines</span>
                                    </a>
                                </li>

                                <li class="pcoded">
                                    <a href="../handles/add_tractorOwner.php">
                                    <span class="pcoded-micon"><i class="feather icon-gitlab"></i></span>
                                        <span class="pcoded-mtext">Tractor Owners</span>
                                    </a>
                                    
                                </li>
                                <li class="pcoded">
                                    <a href="../handles/add_tractor.php">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Tractors</span>
                                    </a>
                                    
                                </li>
                                <li class="">
                                    <a href="navbar-light.htm">
                                        <span class="pcoded-micon"><i class="feather icon-menu"></i></span>
                                        <span class="pcoded-mtext">Investors</span>
                                    </a>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                        <span class="pcoded-micon"><i class="feather icon-sidebar"></i></span>
                                        <span class="pcoded-mtext">Article</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="../handles/blogpost.php">
                                                <span class="pcoded-mtext">Blog Post</span>
                                            </a>
                                            
                                        </li>
                                        
                                        <li class=" ">
                                            <a href="../handles/newspost.php">
                                                <span class="pcoded-mtext">News</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="pcoded-hasmenu">
                                    <a href="javascript:void(0)">
                                    <span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span>
                                        <span class="pcoded-mtext">Market Place</span>
                                        <span class="pcoded-badge label label-danger">100+</span>
                                    </a>
                                    <ul class="pcoded-submenu">
                                        <li class=" ">
                                            <a href="widget-statistic.htm">
                                                <span class="pcoded-mtext">Crop</span>
                                            </a>
                                        </li>
                                        <li class=" ">
                                            <a href="widget-data.htm">
                                                <span class="pcoded-mtext">Machinery</span>
                                            </a>
                                        </li>
                                        

                                    </ul>
                                </li>
                            </ul>
                            
                        </div>
                    </nav>
    
      
  