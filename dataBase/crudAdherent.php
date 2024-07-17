<?php
session_start();
include('dbConnect.php');

// CREATE operation
if (isset($_POST["create"])) {
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $mobile = (int)$mobile;

    $sqlInsert = "INSERT INTO adherent(nom, email, mobile) VALUES ('$nom','$email','$mobile')";
    
    if(mysqli_query($conn, $sqlInsert)){
        $_SESSION["create"] = "Adherent ajouter!";
        header("Location: ../listeAdherent.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}

// UPDATE operation
// UPDATE operation
if (isset($_POST["edit"])) {
    $id = mysqli_real_escape_string($conn, $_POST["id"]);
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);

    // Retrieve and validate the mobile number from the POST request
    $mobile = $_POST["mobile"];
    if (is_numeric($mobile) && (int)$mobile > 0) {
        // Cast the mobile number to an integer
        $mobile = (int)$mobile;
    } else {
        die("Invalid mobile number");
    }

    $sqlUpdate = "UPDATE adherent SET nom = '$nom', email = '$email', mobile = '$mobile' WHERE id='$id'";

    if (mysqli_query($conn, $sqlUpdate)) {
        $_SESSION["update"] = "Adherent modified!";
        header("Location: ../listeAdherent.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
}


// DELETE operation
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sqlDelete = "DELETE FROM adherent WHERE id='$id'";
    
    if(mysqli_query($conn, $sqlDelete)){
        $_SESSION["delete"] = "suppression Adherent!";
        header("Location: ../listeAdherent.php");
        exit();
    } else {
        die("Error: " . mysqli_error($conn));
    }
} else {
    echo "Invalid operation.";
}
?>