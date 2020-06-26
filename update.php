<!doctype html>

<html lang="en">

  <head>

    <!-- Required meta tags -->

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">



    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">



    <title>Web Appication Implementation</title>

  </head>

  <body class="container">

   

    <h1>php backend assignment</h1>

        <p><a href="index.php" class="btn btn-primary">Back to index page</a></p>

        <h2>Utilize the structure to refresh a page record</h2>



        <?php

        

            include 'Webapp/connection.php';

            $id = $_GET['update'];

            $record = $connection->query("select * from pages where id=$id") or die($connection->error());

            $row = $record->fetch_assoc();



        ?>



        <form class="form-group bg-dark text-light p-5" method="post" action="process.php">

        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

        <label>Page Name</label>

        <br>

        <input type="text" class="form-control" name="pg"  value="<?php echo $row['pg']; ?>" >

        <br><br>



        <label>Object Class</label>

        <br>

        <input type="text" class="form-control" name="class"  value="<?php echo $row['class']; ?>">

        <br><br>



        <label>Image</label>

        <br>

        <input type="text" class="form-control" name="image"  value="<?php echo $row['image']; ?>">

        <br><br>



        <label>Special Containment Procedure</label>

        <br>

        <textarea class="form-control" name="process" rows="5" placeholder="<?php echo $row['process']?>"><?php echo $row['process']?></textarea>

        <br><br>



        <label>Description</label>

        <br>

        <textarea class="form-control" name="description" rows="5" placeholder="<?php echo $row['description']?>"><?php echo $row['description']?></textarea>

        <br><br>



        <label>Reference</label>

        <br>

        <textarea class="form-control" name="reference" rows="5" placeholder="<?php echo $row['reference']?>"><?php echo $row['reference']?></textarea>

        <br><br>



        <label>Addittional Notes</label>

        <br>

        <textarea class="form-control" name="addittional_notes" rows="6" placeholder="<?php echo $row['addittional_notes']?>"><?php echo $row['addittional_notes']?></textarea>

        <br><br>



        <label>Extra One</label>

        <br>

        <textarea class="form-control" name="extra_one" rows="5" placeholder="<?php echo $row['extra one']?>"><?php echo $row['extra_one']?></textarea>

        <br><br>




       


        <input type="submit" class="btn btn-warning" name="update" value="Update SCP Page Data">

        

        </form>



    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  </body>

</html>