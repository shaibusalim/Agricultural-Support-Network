<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
    <link rel="stylesheet" href="article.css">
    <title>ASN : Articles</title>
        <style>
   
        </style>
</head>

<body>
    <div id="slideout-menu">
        <ul>
            <li>
                <a href="../farmers-dash.php">Home</a>
            </li>
            <li>
                <a href="bloglist.php">Blog</a>
            </li>
            <li>
                <a href="news.php">News</a>
            </li>
			<li>
                <a href="homepg.php">Logout</a>
            </li>
            <li>
                <input type="text" placeholder="Search Here">
            </li>
        </ul>
    </div>

    <nav>
        <div id="logo-img">
        <img src="../nimages/asn.png" alt="ASN-Logo"  width="120" height="80">
        </div>
        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>
        <ul>
            <li>
                <a class="active" href="../farmers/farmers-dash.php" style="font-family: 'Akaya Telivigala', cursive;">Home</a>
            </li>
            <li>
                <a href="bloglist.php" style="font-family: 'Akaya Telivigala', cursive;">Blog</a>
            </li>
            <li>
                <a href="news.php" style="font-family: 'Akaya Telivigala', cursive;">News</a>
            </li>
			<li>
                <a href="homepg.php" style="font-family: 'Akaya Telivigala', cursive;">Logout</a>
            </li>
            <li>
                <div id="search-icon">
                    <i class="fas fa-search"></i>
                </div>
            </li>
        </ul>
    </nav>

    <div id="searchbox">
        <input type="text" placeholder="Search Here">
    </div>

    <div id="banner">
        <h1 style="font-family: 'Akaya Telivigala', cursive;">We bring you the latest news about agriculture.</h1>
		
		<a href="bloglist.php">
        	<h2 class="section-heading" style="color:#fff; font-family: 'Akaya Telivigala', cursive;">Blogs Spot</h2>
    	</a>

		<a href="news.php">
        	<h2 class="section-heading" style="color:#fff; font-family: 'Akaya Telivigala', cursive;">News Spot</h2>
    	</a>
    </div>

    <main>

    </main>

    <script src="main.js"></script>
</body>

</html>