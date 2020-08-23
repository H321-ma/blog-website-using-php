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
 
  <title>TOI Coding</title>
</head>

<body>
    <?php include 'Partials/_dbconnect.php'; ?>

    <?php
      $id = $_GET['catid'];
      $sql = "SELECT * FROM `categories` WHERE category_id=$id";
      $result = mysqli_query($conn,$sql);
      while($row = mysqli_fetch_assoc($result)){
          $catname = $row['category_name'];
          $catdesc = $row['category_description']; 
          $catimg = $row['image'];
      }

    ?>

    <?php
           $showAlert = false;
           $method = $_SERVER['REQUEST_METHOD'];
           if($method=='POST'){
               //Insert into comment db
               $comment = $_POST['comment'];
               $comment = str_replace("<","&lt;",$comment);
               $comment = str_replace(">","&gt;",$comment);
                
     
               $sno = $_POST['sno'];
               $sql = "INSERT INTO `comments` ( `comment_content`, `thread_id`, `comment_by`, `comment_time`)
                          VALUES ( '$comment','$id' , '$sno', current_timestamp())";
               $result = mysqli_query($conn,$sql); 
               $showAlert = true;
               if($showAlert){
                  
               }
           }
    ?>
  <div id="slideout-menu">
      <ul>
          <li>
              <a href="index.php">Home</a>
          </li>
          <li>
              <a  href="blogslist.php">Blog</a>
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

    <h2 class="page-heading"><?php echo $catname ;?></h2>
    <div id="post-container">
      <section id="blogpost">
        <div class="card">
          <div class="card-meta-blogpost">
            Posted by Admin on <?php echo "" . date("Y/m/d") . "<br>";  ?>in
            <a href="#">Web Dev</a>
          </div>
          <div class="card-image">
          <img src=<?php echo $catimg ?> alt="Card Image">
          </div>
          <div class="card-description">
            <h3>The Introduction</h3>
            <p><?php echo $catdesc; ?></p>
          </div>
        </div>

        <?php
    echo
    '<div class="container">
           <h1 class="py-2">Post a comment</h1>
        <form action="' .$_SERVER["REQUEST_URI"]. ' " method="post">
            <div class="form-group">
                <label for="exampleInputEmail1">Type your comment</label>
                
                        <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
           
                <input type="hidden" name="sno" value= "sno.">
                </div>
                <div class="form-group">
                <label for="exampleInputEmail1"> your name</label>
                
                        <textarea class="form-control" id="name" name="name" rows="3"></textarea>
           
                <input type="hidden" name="sno" value= "sno.">
                </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
        </div>';
   ?>
      <div class="container mb-5" id="Ques">
        <h1 class="py-2">Comments</h1>

       <?php
       $id = $_GET['catid'];
      $sql = "SELECT * FROM `comments` WHERE thread_id=$id LIMIT 0,6";
      $result = mysqli_query($conn,$sql);
      $noresult = true;
      while($row = mysqli_fetch_assoc($result)){
          $noresult = false;
          $id = $row['comment_id'];
          $content = $row['comment_content'];
          $comment_time =  $row['comment_time'];
          $thread_user_id = $row['comment_by'];

          $sql2 = "SELECT user_email FROM `users` WHERE sno='$thread_user_id '";
          $result2 = mysqli_query($conn,$sql2);
         $row2= mysqli_fetch_assoc($result2);
         
     

     echo '  <div class="media my-3">
            <img src="assets/default-user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body">'.
            '<h5 class="mt-0"><a class="text-dark" href="thread.php?threadid=' .$id. '">'  .$thread_user_id . '</a></h5>
               <p class = "font-weight-bold my-0">Commented by:'.' at ' .$comment_time. '</p>
               ' .$content. '
            </div>
        </div>';
        }

        if($noresult){
            echo  '<div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">No comments found</h1>
              <p class="lead"> Please enter</p>
            </div>
          </div>';
        }

        ?>  
       </div>
      </section>

      <aside id="sidebar">
        <h3>Sidebar Heading</h3>
        <p>Sidebar 1</p>
      </aside>
    </div>

    <footer>
        <div id="left-footer">
            <h3>Quick Links</h3>
            <p>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a href="about.html">About</a>
                    </li>
                    <li>
                        <a href="#">Privacy Policy</a>
                    </li>
                    <li>
                        <a href="blogslist.html">Blogs</a>
                    </li>
                    <li>
                        <a href="blogslist.html">Projects</a>
                    </li>
                    <li>
                        <a href="contactus.php">Contact</a>
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
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
  <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#Ques').DataTable();
    });
  </script>
    <script src="main.js"></script>
  <script src="main.js"></script>
</body>

</html>