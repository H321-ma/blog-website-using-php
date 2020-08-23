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
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>GTCoding</title>
</head>

<body>
  <?php include 'Partials/_dbconnect.php';  ?> 
  <?php include 'header.php';  ?>
    <main>
   
    <a href="blogslist.html">
            <h2 class="section-heading">All Blogs</h2>
        </a>
        
        <section id="blogs">
        <?php
            $sql  = "SELECT * FROM `categories` LIMIT 0,6";
            $result = mysqli_query($conn,$sql);
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
                    <a href="blogpost.php?catid='. $id .'">
                        <h3> '.$cat.' </h3>
                    </a>
                    <p>
                      '.substr($desc,0,90).' 
                    </p>
                    <a  href="blogpost.php?catid='.$id.'" class="btn-readmore">Read more</a>
                </div>
            </div>        
        ';
            }
           
            ?>
             
            </section>
        



        <a href="blogslist.html">
        	<h2 class="section-heading">All Projects</h2>
        </a>
        <section>
            <div class="card">
                <div class="card-image">
                    <a href="blogpost.php">
                        <img src="assets/pexels-simon-migaj-747964.jpg" alt="Card Image">
                    </a>
                </div>

                <div class="card-description">
                    <a href="blogpost.html">
                        <h3>The Project Title Here</h3>
                    </a>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, ullam facilis consequuntur eligendi sit accusamus tempora
                        cum distinctio pariatur ipsa quod, odit dolorum non vero recusandae? Corporis voluptatem optio nulla.
                    </p>
                    <a href="blogpost.html" class="btn-readmore">Read more</a>
                </div>
            </div>

            <div class="card">
                <div class="card-image">
                    <a href="blogpost.html">
                        <img src="assets/pexels-simon-migaj-747964.jpg" alt="Card Image">
                    </a>
                </div>

                <div class="card-description">
                    <a href="blogpost.html">
                        <h3>The Project Title Here</h3>
                    </a>
                    <p>
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Blanditiis, ullam facilis consequuntur eligendi sit accusamus tempora
                        cum distinctio pariatur ipsa quod, odit dolorum non vero recusandae? Corporis voluptatem optio nulla.
                    </p>
                    <a href="blogpost.html" class="btn-readmore">Read more</a>
                </div>
            </div>
        </section>

        <h2 class="section-heading">Source Code</h2>

        <section id="section-source">
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum neque qui delectus ad dolor blanditiis perferendis praesentium
                consectetur aut sed provident obcaecati aspernatur perspiciatis, dolores nobis pariatur ipsum vel corrupti!
            </p>
            <a href="https://github.com/H321-ma" class="btn-readmore">GitHub Profile</a>
        </section>

        <?php include 'footer.php'; ?>