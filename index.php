<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Gestion Bib</title>
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
        table td, table th {
            vertical-align: middle;
            text-align: center;
            padding: 20px!important;
        }
        table thead {
            background-color: #343a40;
            color: white;
        }
        table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table tbody tr:hover {
            background-color: #e9ecef;
        }
        .table-bordered {
            border: 1px solid #dee2e6;
        }
        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }
    </style>
</head>
<body>
    <?php include('interface/sidebar.php'); ?>
    <div class="content">
        <div class="container my-4">
            <header class="d-flex justify-content-between my-4">
                <h1>Book List</h1>
                <div>
                    <a href="interface/ajouter.php" class="btn btn-primary">Add New Book</a>
                </div>
            </header>
            <?php
            session_start();
            if (isset($_SESSION["create"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["create"];
                ?>
            </div>
            <?php
            unset($_SESSION["create"]);
            }
            ?>
            <?php
            if (isset($_SESSION["update"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["update"];
                ?>
            </div>
            <?php
            unset($_SESSION["update"]);
            }
            ?>
            <?php
            if (isset($_SESSION["delete"])) {
            ?>
            <div class="alert alert-success">
                <?php 
                echo $_SESSION["delete"];
                ?>
            </div>
            <?php
            unset($_SESSION["delete"]);
            }
            ?>
            
            <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Type</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            
            <?php
            include('database/dbConnect.php');
            $sqlSelect = "SELECT * FROM livre";
            $result = mysqli_query($conn,$sqlSelect);
            while($data = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><?php echo $data['titre']; ?></td>
                    <td><?php echo $data['auteur']; ?></td>
                    <td><?php echo $data['type']; ?></td>
                    <td>
                        <a href="interface/details.php?id=<?php echo $data['id']; ?>" class="btn btn-info">Read More</a>
                        <a href="interface/modifier.php?id=<?php echo $data['id']; ?>" class="btn btn-warning">Edit</a>
                        <a href="database/crud.php?id=<?php echo $data['id']; ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            </table>
        </div>
    </div>
</body>
</html>
