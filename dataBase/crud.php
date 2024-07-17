<?php
session_start();
include('dbConnect.php');

// CREATE operation
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sqlInsert = "INSERT INTO livre(titre, auteur, type, description) VALUES ('$title','$author','$type', '$description')";
    
    if(mysqli_query($conn, $sqlInsert)){
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location: ../index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// UPDATE operation
if (isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $auteur = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sqlUpdate = "UPDATE livre SET titre = '$title', type = '$type', auteur = '$auteur', description = '$description' WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlUpdate)){
        $_SESSION["update"] = "livre modifier!";
        header("Location: ../index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// DELETE operation
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlDelete = "DELETE FROM livre WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlDelete)){
        $_SESSION["delete"] = "Book Deleted Successfully!";
        header("Location: ../index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    echo "Invalid operation.";
}
?>