<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Modifier Adherent</title>
    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }
        .container {
            flex: 1;
        }
        .sidebar {
            background-color: #343a40;
            padding: 20px;
            color: white;
            height: 100%;
            position: fixed;
            top: 0;
            bottom: 0;
            width: 250px;
        }
        .content {
            margin-left: 260px;
            padding: 20px;
        }
        .nav-link {
            color: white;
            font-size: 1.2rem;
            margin: 10px 0;
        }
        .nav-link:hover {
            color: #ffc107;
        }
        .form-element {
            margin-bottom: 20px;
        }
        .form-control {
            padding: 10px;
            font-size: 1rem;
        }
        .textarea-control {
            height: 150px;
        }
        .btn-custom {
            background-color: #007bff;
            border-color: #007bff;
            padding: 10px;
            font-size: 1.2rem;
            color: white;
        }
        .btn-custom:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-5">
            <header class="d-flex justify-content-between my-4">
                <h1>Modifier Adherent</h1>
                <div>
                    <a href="../listeAdherent.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="../database/crudAdherent.php" method="post">
                <?php 
                if (isset($_GET['id'])) {
                    include("../database/dbConnect.php");
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM adherent WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="nom" placeholder="Nom:" value="<?php echo $row["nom"]; ?>">
                    </div>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="email" placeholder="Email:" value="<?php echo $row["email"]; ?>">
                    </div>
                    <div class="form-element my-4">
                        <input type="number" class="form-control" name="mobile" placeholder="Mobile:" value="<?php echo $row["mobile"]; ?>">
                    </div>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="form-element my-4">
                        <input type="submit" name="edit" value="Modifier Adherent" class="btn btn-primary">
                    </div>
                    <?php
                } else {
                    echo "<h3>Adherent n'est pas trouver</h3>";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
