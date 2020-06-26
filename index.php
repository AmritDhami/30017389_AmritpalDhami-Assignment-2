

<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <!--bootstrap template copied from startbootstrap heroic features template

    Start Bootstrap - Heroic Features (https://startbootstrap.com/template-overviews/heroic-features)-->

    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">



    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sticky-footer/">



    <!--google fonts-->

    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet'>

    <title>Web Application Implementation</title>

    <style>

    /*for background color */

    body,html{

      height: 100%;

      width: 100%;

      font-family: 'Lato', sans-serif;

   

    }
    img {
      
      
            border-radius: 12px;
            display: block;
            margin-left: auto;
            margin-right: auto;
            
        }


      .container, body{

        background-color: #1F2833;
     
         color: #66FCF1;

       /* opacity:100%;*/

      }

      /*for background image */

       /* body{

         background: url('') no-repeat center center fixed;

          -webkit-background-size: cover;

         -moz-background-size: cover;

         background-size: cover;

         -o-background-size: cover;

         color: white;

         



       } */

      



      /*navbar styling */

      .navbar{padding: .10rem;
      }
          
.navbar-nav li{padding-right: 40px;
            font-size: 22px;
            padding:20px 22px;
}

.nav-link{font-size: 1.1em !important;}



       /*sticky footer */

       .footer{
       
         /* position:fixed; */
        
         width: 100%;
         background-color:  #66FCF1;
         bottom: 0;}

    </style>

  </head>

  <body>

    

    <?php
     include "Webapp/connection.php" ?>



    <!--navigation bar row-->

    <div class="row">



      <div class="col">



     <!--new navigation -->

        <nav class="navbar navbar-expand-md navbar-dark bg-dark sticky-top">

       <!--trial for logo -->

       <div class="container-fluid">

          <a class="navbar-brand" href="index.php" ><img src="image/Logo.jpg" width="250" height="160"></a>

          <button class="navbar-toggler" type="button" data-toggle="collapse"

          data-target="#navbarResponsive">

          <span class="navbar-toggler-icon"></span>

          </button>

          <div class="collapse navbar-collapse" id="navbarResponsive">

              <!--added navbar-expand-md and sticky-top -->

       <ul class="navbar-nav ml-auto">

        

        <!--run php loop through the database and display page names here-->

        <?php foreach($result as $page):?>
            <li class="nav-item active">
            <a href="index.php?page='<?php echo $page['pg'];?>'" class="nav-link"><?php echo $page['pg'];?></a>
            </li>


            <?php endforeach;?>
          <li class="nav-item active">
          <a href="form.php" class="nav-link">Enter New SCP file </a>
          </li>
          <li class="nav-item active toggler">
          <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <button class="navbar-toggler" type="button" >
            <span class="navbar-toggler-icon"></span>
          </button>
          </a>
          </li>
     </ul>
       




          </div>

          </div>

          <!--trial ended -->

      

          </div>
    </div>
    <div class="row">
    <div class="col">
      <?php
      if(isset($_GET['page']))
      {
          //REMOVE SINGLE QUOTE FROM PAGE GET VALUE
       
        $pg=trim($_GET['page'],"'"); // TO REMOVE '  ' FROM scp-2 FILE IN ABOVE www SITE te

        //run sql command to select record based on get value
        $record=$connection->query("SELECT * from  pages where pg='$pg'") or die($connection->error());

        //convert $record into an array for us to echo out the individual fields on screen
        $row=$record->fetch_assoc();


                 //CREATE VARIABLES THAT HOLD DATA FROM ALL TABLE FIELDS

              
                $pg=$row['pg'];
                $class = $row['class'];

                $image = $row['image'];
                $update = $row['id'];
                $delete = $row['id'];
                $process = $row['process'];

                $description = $row['description'];

                $reference = $row['reference'];

                $addittional_notes = $row['addittional_notes'];

                $extra_one = $row['extra_one'];
               
                
         

                //Display information on screen

                echo "

                

                    <h1> {$pg}</h1>";

                    echo "<h2>{$class}</h2>";

                    if ($row['image']) { echo "<br><p><img src='image/{$image}' class='img-fluid shadow p-3 mb-5 mx-auto d-block' ></p>";}

                    echo "<p><h3 >Special Containment Procedures:</h3>{$process}</p>";

                    echo "<p><h3>Description:</h3>{$description}</p>";

                  if ($row['reference'])  {echo "<p><h3>Reference:</h3>{$row['reference']}</p>"; }

                  if ($row['addittional_notes']) {echo "<p><h3>Addittional Notes:</h3>{$addittional_notes}</p> ";}

                  echo "<p> {$extra_one} </p> ";

                  if ($row['extra_one']);{ echo "<p> {$extra_one}</p> ";}

                

                



                //Display update and delete buttons

                echo "

                <p>

    

                <a href='update.php?update={$update}' class='btn btn-warning'>Update</a>

                <a href='process.php?delete={$delete}' class='btn btn-danger'>Delete</a>

            

                </p>

                

                ";

              } 

              else

              {

                    //if this is the first time this page has been accessed, display content below

                    echo "

                      <h1>Welcome to Database Driven Website of SCP-Foundation</h1>

                      <p class='text-center'>Utilize the connections baove to see pages put away in Database</p>

                      <p class='text-center'><img src='image/download.jpg'></p>

                    ";

              }

           

           ?>

        </div>



    </div>

</div>

    <!-- Footer -->

  <footer class="footer mt-auto py-3">

    <div class="bg-dark">

      <p class="m-0 text-center text-white">All Right Reserved,Copyright: Website of SCP-Foundation,2020.<br>

     Designed by Amritpal Dhami</p>

    </div>

    <!-- /.container -->

  </footer>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   
   
  </body>

</html>