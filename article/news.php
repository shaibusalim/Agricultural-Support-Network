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
  <title>ASN : News </title>
  
</head>

<body style="background:beige">
  <div id="slideout-menu">
      <ul>
          <li>
              <a href="../farmers-dash.php" style="font-family: 'Akaya Telivigala', cursive;">Home</a>
          </li>
          <li>
              <a href="bloglist.php" style="font-family: 'Akaya Telivigala', cursive;">Blog</a>
          </li>
          <li>
              <a href="news.php" style="font-family: 'Akaya Telivigala', cursive;">News</a>
          </li>
		  <li>
              <a href="Login/Logout.php" style="font-family: 'Akaya Telivigala', cursive;">Logout</a>
          </li>
          <li>
              <input type="text" placeholder="Search Here">
          </li>
      </ul>
  </div>

  <nav>
      <div id="logo-img">
          <img src="../nimages/asn.png" alt="ASN-Logo" width="120" height="75">
      </div>
      <div id="menu-icon">
          <i class="fas fa-bars"></i>
      </div>
      <ul>
          <li>
              <a href="articles-index.php" style="font-family: 'Akaya Telivigala', cursive;">Home</a>
          </li>
          <li>
              <a  href="bloglist.php" style="font-family: 'Akaya Telivigala', cursive;">Blog</a>
          </li>
          <li>
              <a class="active" href="news.php" style="font-family: 'Akaya Telivigala', cursive;">News</a>
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
    <h2 class="page-heading" style="font-family: 'Akaya Telivigala', cursive;">Latest News</h2>

    <section>
      <div class="card">
        <div class="card-image">
            <img src="img/farmer.jpg" alt="Farmer">
        </div>

        <div class="card-description">
            <h3 style="font-family: 'Akaya Telivigala', cursive;">Farming changes life for youth in Central African Republic.</h3>

          <div class="card-meta">
            Posted March 1, 2021
          </div>
          <p>
            Whilst studying for his business degree, Emmanuel had dreams of being an entrepreneur and earning...
          </p>
          <a href="https://kilimonews.co.ke/agribusiness/farming-changes-life-for-youth-in-central-african-republic/" class="btn-readmore">Read more</a>
        </div>
      </div>

      <?php
      include "../connection.php";
// Fetch data from the 'news_posts' table (assuming this is the table name for news)
$sql = "SELECT * FROM news_articles"; // Update the table name if different
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($news = $result->fetch_assoc()) {
        ?>
        <div class="card">
            <div class="card-image">
                <img src="<?php echo $news['image']; ?>" alt="<?php echo $news['alt_text']; ?>">
            </div>

            <div class="card-description">
                <h3 style="font-family: 'Akaya Telivigala', cursive;"><?php echo $news['title']; ?></h3>
                <div class="card-meta">
                    Posted <?php echo date('F j, Y', strtotime($news['posted_date'])); ?>
                </div>
                <p>
                    <?php echo substr($news['content'], 0, 200); ?> <!-- Display only a portion of the content -->
                </p>
                <a href="<?php echo $news['article_link']; ?>" class="btn-readmore">Read more</a>
            </div>
        </div>
        <?php
    }
} else {
    echo "No news articles found.";
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