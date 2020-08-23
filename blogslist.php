<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
    crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto|Roboto+Condensed|Roboto+Slab" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>GTCoding</title>
</head>

<body>
  <?php include 'Partials/_dbconnect.php';?>
  <div id="slideout-menu">
      <ul>
          <li>
              <a href="index.php">Home</a>
          </li>
          <li>
              <a href="blogslist.php">Blog</a>
          </li>
          <li>
              <a href="blogslist.php">Projects</a>
          </li>
          <li>
              <a href="about.php">About</a>
          </li>
          <li>
              <input type="text" placeholder="Search Here">
          </li>
      </ul>
  </div>

  <nav>
      <div id="logo-img">
          <a href="#">
              <img src="assets/Free_Sample_By_Wix (4).jpg" alt="GTCoding Logo">
          </a>
      </div>
      <div id="menu-icon">
          <i class="fas fa-bars"></i>
      </div>
      <ul>
          <li>
              <a href="index.php">Home</a>
          </li>
          <li>
              <a class="active" href="blogslist.php">Blog</a>
          </li>
          <li>
              <a href="blogslist.php">Projects</a>
          </li>
          <li>
              <a href="about.php">About</a>
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
    <h2 class="page-heading">Blogs</h2>

    <section>
    <?php  
     $results_per_page = 10;
      $sql = "SELECT * FROM `categories`";
      $result = mysqli_query($conn,$sql);
      $number_of_results = mysqli_num_rows($result);
      $number_of_pages = ceil($number_of_results/$results_per_page);
      if (!isset($_GET['page'])) {
        $page = 1;
      } else {
        $page = $_GET['page'];
      }
      
      // determine the sql LIMIT starting number for the results on the displaying page
      $this_page_first_result = ($page-1)*$results_per_page;
      $sql='SELECT * FROM categories LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
       $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($result)){
     //   echo $row['category_id'];
     //   echo $row['category_name'];
        $id = $row['category_id'];
        $cat = $row['category_name'];
        $desc = $row['category_description'];
        $img = $row['image'];

      echo '<div class="card">
        <div class="card-image">
          <a href="blogpost.html">
          <img src='.$img.' alt="Card Image">
          </a>
        </div>

        <div class="card-description">
          <a href="blogpost.php?catid='.$id.'">
            <h3>'.$cat.'</h3>
          </a>
          <div class="card-meta">
            Posted by Admin on '.date("d,Y,m").' in
            <a href="#">Web Dev</a>
          </div>
          <p>
           '.substr($desc,0,90).'......
          </p>
          <a href="blogpost.php?catid='.$id.'" class="btn-readmore">Read more</a>
        </div>
      </div>';
      }
      ?>

    </section>
    <?php  
  
  for ($page=1;$page<=$number_of_pages;$page++) {
    echo '<div class="pagination">
    <a href="blogslist.php?page=' . $page . '">'. $page .'</a></div> ';
  }
  
      ?>


    <footer>
        <div id="left-footer">
            <h3>Quick Links</h3>
            <p>
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="blogslist.php">Blogs</a>
                    </li>
                    <li>
                        <a href="blogslist.php">Projects</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </p>
        </div>

        <div id="right-footer">
            <h3>Follow us on</h3>
            <div id="social-media-footer">
                <ul>
                    <li>
                        <a href="#">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fab fa-github"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <p>This website is developed by Himanshu singh</p>
        </div>
    </footer>

  </main>

  <script src="main.js"></script>
</body>

</html>