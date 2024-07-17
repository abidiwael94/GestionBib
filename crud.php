<?php
session_start();
include('dbConnect.php');

// CREATE operation
if (isset($_POST["create"])) {
    $title = mysqli_real_escape_string($conn, $_POST["title"]);
    $type = mysqli_real_escape_string($conn, $_POST["type"]);
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sqlInsert = "INSERT INTO books(title, author, type, description) VALUES ('$title','$author','$type', '$description')";
    
    if(mysqli_query($conn, $sqlInsert)){
        $_SESSION["create"] = "Book Added Successfully!";
        header("Location: index.php");
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
    $author = mysqli_real_escape_string($conn, $_POST["author"]);
    $description = mysqli_real_escape_string($conn, $_POST["description"]);

    $sqlUpdate = "UPDATE books SET title = '$title', type = '$type', author = '$author', description = '$description' WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlUpdate)){
        $_SESSION["update"] = "Book Updated Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// DELETE operation
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlDelete = "DELETE FROM books WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlDelete)){
        $_SESSION["delete"] = "Book Deleted Successfully!";
        header("Location: index.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    echo "Invalid operation.";
}
?>