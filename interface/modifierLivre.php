<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Modifier Livre</title>
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
                <h1>Modifier Livre</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="../database/crudLivre.php" method="post">
                <?php 
                if (isset($_GET['id'])) {
                    include("../database/dbConnect.php");
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM livre WHERE id=$id";
                    $result = mysqli_query($conn,$sql);
                    $row = mysqli_fetch_array($result);
                    ?>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="title" placeholder="Titre de livre:" value="<?php echo $row["titre"]; ?>">
                    </div>
                    <div class="form-element my-4">
                        <input type="text" class="form-control" name="author" placeholder="nom auteur:" value="<?php echo $row["auteur"]; ?>">
                    </div>
                    <div class="form-element my-4">
                        <select name="type" id="" class="form-control">
                            <option value="">Select Book Type:</option>
                            <option value="Adventure" <?php if($row["type"]=="Adventure"){echo "selected";} ?>>Adventure</option>
                            <option value="Crime" <?php if($row["type"]=="Crime"){echo "selected";} ?>>Crime</option>
                            <option value="Fantasy" <?php if($row["type"]=="Fantasy"){echo "selected";} ?>>Fantasy</option>
                            <option value="Horror" <?php if($row["type"]=="Horror"){echo "selected";} ?>>Horror</option>
                        </select>
                    </div>
                    <div class="form-element my-4">
                        <textarea name="description" id="" class="form-control textarea-control" placeholder="Description de livre:"><?php echo $row["description"]; ?></textarea>
                    </div>
                    <input type="hidden" value="<?php echo $id; ?>" name="id">
                    <div class="form-element my-4">
                        <input type="submit" name="edit" value="Modifier Livre" class="btn btn-primary">
                    </div>
                    <?php
                } else {
                    echo "<h3>live n'est pas trouver</h3>";
                }
                ?>
            </form>
        </div>
    </div>
</body>
</html>
