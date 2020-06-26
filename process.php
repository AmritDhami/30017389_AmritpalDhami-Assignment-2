<?php

include "Webapp/connection.php";


//first check if form has been submitted with data
if(isset($_POST['submit']))
{
    //create variables from our posted form values
    $pg = mysqli_real_escape_string($connection, $_POST['pg']);
    $class = mysqli_real_escape_string($connection, $_POST['class']);
    $image = mysqli_real_escape_string($connection, $_POST['image']);
    $process = mysqli_real_escape_string($connection,  $_POST['process']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $reference = mysqli_real_escape_string($connection, $_POST['reference']);
    $addittional_notes= mysqli_real_escape_string($connection, $_POST['addittional_notes']);
    $extra_one = mysqli_real_escape_string($connection, $_POST['extra_one']);
   
    //create an insert command
    $sql = "INSERT into pages(pg, class, image, process, description, reference, addittional_notes, extra_one)
    values('$pg', '$class', '$image', '$process', '$description', '$reference', '$addittional_notes', '$extra_one')
    ";

    //display success or error message on screen
    if($connection->query($sql) ===TRUE)
    {
        echo "
            <h1>Record added successfully</h1>
            <p><a href='index.php'>Back to index page</p>
        ";
    }
    else
    {
        echo "
        <h1>Error submitting data</h1>
        <p>{$connection->error()}</p>
        <p><a href='index.php'>Back to index page</p>
    ";
    }

}

if(isset($_GET['delete']))
{
    $id =$_GET['delete'];

    //create delete sql command
    $del = "delete from pages where id=$id";

    //Run the command and then display the appropriate success or error messages
    if($connection->query($del) === TRUE)
    {
        echo "<p>Record was deleted. <a href='index.php'>Return to Index Page</a></p>" ;
    }
    else
    {
        echo "
            <p>There was an error deleting this record.</p>
            <p{$connection->error()}></p>
            <p><a href='index.php'>Back to index page</a></p>
        ";
    }
}

//update form checks if the update button has been clicked
if(isset($_POST['update']))
{
    //create variables from our posted form values
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $pg = mysqli_real_escape_string($connection, $_POST['pg']);
    $class = mysqli_real_escape_string($connection, $_POST['class']);
    $image = mysqli_real_escape_string($connection, $_POST['image']);
    $process = mysqli_real_escape_string($connection, $_POST['process']);
    $description = mysqli_real_escape_string($connection, $_POST['description']);
    $reference = mysqli_real_escape_string($connection, $_POST['reference']);
    $addittional_notes = mysqli_real_escape_string($connection, $_POST['addittional_notes']);
    $extra_one = mysqli_real_escape_string($connection, $_POST['extra_one']);
   

    //create an update command
    $update = "
                update pages set pg='$pg', class='$class', image='$image', process='$process', description='$description', 
                reference='$reference', addittional_notes ='$addittional_notes', extra_one='$extra_one' 
                where id='$id'
    
    ";
    mysqli_query($connection, $update) or die(mysqli_error($connection));
    //display success or error message on screen
    if($connection->query($update) ===TRUE)
    {
        echo "
            <h1>Record updated successfully</h1>
            <p><a href='index.php'>Return to index page</p>
        ";
    }
    else
    {
        echo "
        <h1>Error updating data</h1>
        <p>{$connection->error()}</p>
        <p><a href='index.php'>Return to index page</p>
    ";
    }

}



?>