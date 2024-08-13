
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .container {
            max-width: 1200px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .nav {
            margin-bottom: 20px;
            display: flex;
            justify-content: space-around;
        }
        .nav a {
            color: #007bff;
            text-decoration: none;
            padding: 10px 20px;
            border: 2px solid #007bff;
            border-radius: 5px;
        }
        .nav a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Tableau de Bord Administrateur</h1>
    </div>
    <div class="container">
        <div class="nav">
            <a href="index.php?action=manage_films">Gérer les Films</a>
            <a href="index.php?action=films">Voir le Site</a>
        </div>
        <h2>Bienvenue dans la section administrateur</h2>
        <p>Utilisez les liens ci-dessus pour gérer les films ou revenir à la page principale.</p>
    </div>
