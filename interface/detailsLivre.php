<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Book Details</title>
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
        .book-details {
            background-color: #f5f5f5;
            border-radius: 5px;
            padding: 30px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .book-details h3 {
            color: #343a40;
            margin-top: 20px;
        }
        .book-details p {
            font-size: 1.1rem;
            color: #555;
        }
    </style>
</head>
<body>
    <?php include('sidebar.php'); ?>
    <div class="content">
        <div class="container my-4">
            <header class="d-flex justify-content-between my-4">
                <h1>Details Livre</h1>
                <div>
                    <a href="../index.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <div class="book-details p-5 my-4">
                <?php
                include("../database/dbConnect.php");
                $id = $_GET['id'];
                if ($id) {
                    $sql = "SELECT * FROM livre WHERE id = $id";
                    $result = mysqli_query($conn, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                     ?>
                     <h3>Title:</h3>
                     <p><?php echo $row["titre"]; ?></p>
                     <h3>Description:</h3>
                     <p><?php echo $row["description"]; ?></p>
                     <h3>Auteur:</h3>
                     <p><?php echo $row["auteur"]; ?></p>
                     <h3>Type:</h3>
                     <p><?php echo $row["type"]; ?></p>
                     <?php
                    }
                } else {
                    echo "<h3>pas de livre</h3>";
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>
