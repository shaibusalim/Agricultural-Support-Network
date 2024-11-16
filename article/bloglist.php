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
  <title>ASN : Blogs</title>


</head>

<body style="background:beige">
  <div id="slideout-menu">
      <ul>
          <li>
              <a href="../farmers-dash.php" style="font-family: 'Akaya Telivigala', cursive;">Home</a>
          </li>
          <li>
              <a href="bloglist.php" style="font-family: 'Akaya Telivigala', cursive;" >Blog</a>
          </li>
          <li>
              <a href="news.php" style="font-family: 'Akaya Telivigala', cursive;">News</a>
          </li>
		  <li>
              <a href="Login/logout.php" style="font-family: 'Akaya Telivigala', cursive;">Logout</a>
          </li>
          <li>
              <input type="text" placeholder="Search Here">
          </li>
      </ul>
  </div>

  <nav>
      <div id="logo-img">
      <img src="../nimages/asn.png" alt="AgZone-Logo" title="AgZone" width="120" height="75">
      </div>
      <div id="menu-icon">
          <i class="fas fa-bars"></i>
      </div>
      <ul>
          <li>
              <a href="articles-index.php" style="font-family: 'Akaya Telivigala', cursive;">Home</a>
          </li>
          <li>
              <a class="active" href="bloglist.php" style="font-family: 'Akaya Telivigala', cursive;">Blog</a>
          </li>
          <li>
              <a href="news.php" style="font-family: 'Akaya Telivigala', cursive;">News</a>
          </li>
		  <li>
              <a href="Login/logout.php" style="font-family: 'Akaya Telivigala', cursive;">Logout</a>
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

  <main>
    <h2 class="page-heading" style="font-family: 'Akaya Telivigala', cursive;">Blogs Spot</h2>

        <section>
        <?php
// Establish a database connection (use your database credentials)
include "../connection.php";

// Fetch data from the 'blog_posts' table
$sql = "SELECT * FROM blog_posts";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($post = $result->fetch_assoc()) {
        ?>
        <div class="card">
            <div class="card-image">
                <a href="blogpost.php?id=<?php echo $post['id']; ?>">
                    <img src="<?php echo $post['image']; ?>" alt="Onions">
                </a>
            </div>

            <div class="card-description">
                <h3><?php echo $post['title']; ?></h3>
                <p>
                    <?php echo substr($post['content'], 0, 200); ?> <!-- Display only a portion of the content -->
                </p>
                <a href="blogpost.php?id=<?php echo $post['id']; ?>" class="btn-readmore">Read more</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "No posts found.";
}
?>

          
			
			
	
        </section>


    <div class="pagination">
      <a href="#">Prev</a>
      <a href="#">4</a>
      <a href="#">5</a>
      <a href="#">6</a>
      <a href="#">Next</a>
    </div>


  </main>

  <script src="main.js"></script>
</body>

</html>