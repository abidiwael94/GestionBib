<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Ajouter Adherent</title>
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
                <h1>Ajouter Adherent</h1>
                <div>
                    <a href="../listeAdherent.php" class="btn btn-primary">Retour</a>
                </div>
            </header>
            <form action="../database/crudAdherent.php" method="post">
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="nom" placeholder="Nom">
                </div>
                <div class="form-element my-4">
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>
                <div class="form-element my-4">
                    <input type="number" class="form-control" name="mobile" placeholder="Mobile">
                </div>
                <div class="form-element my-4">
                    <input type="submit" name="create" value="Ajouter Adherent" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
