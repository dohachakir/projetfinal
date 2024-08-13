<!-- views/manage_films.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Gérer les Films</title>
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
        .film-list {
            list-style-type: none;
            padding: 0;
        }
        .film-item {
            background-color: white;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .film-title {
            font-size: 1.5em;
            margin: 0;
        }
        .film-actions {
            display: flex;
            gap: 10px;
        }
        .film-actions a {
            padding: 10px 20px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .film-actions a:hover {
            background-color: #c0392b;
        }
        .add-film {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        .add-film:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Gérer les Films</h1>
    </div>
    <div class="container">
        <a href="index.php?action=add_film" class="add-film">Ajouter un Film</a>
        <ul class="film-list">
            <?php foreach ($films as $film): ?>
                <li class="film-item">
                    <span class="film-title"><?php echo htmlspecialchars($film['title']); ?></span>
                    <div class="film-actions">
                        <a href="index.php?action=edit_film&id=<?php echo $film['id']; ?>">Modifier</a>
                        <a href="index.php?action=delete_film&id=<?php echo $film['id']; ?>">Supprimer</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
