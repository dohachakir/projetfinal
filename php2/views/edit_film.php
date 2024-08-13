<!-- views/edit_film.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un Film</title>
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
            max-width: 600px;
            margin: 20px auto;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
            font-weight: bold;
        }
        input, textarea {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            width: 100%;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Modifier un Film</h1>
    </div>
    <div class="container">
        <form action="index.php?action=update_film" method="POST">
            <input type="hidden" name="id" value="<?php echo $film['id']; ?>">

            <label for="title">Titre du Film</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($film['title']); ?>" required>

            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" required><?php echo htmlspecialchars($film['description']); ?></textarea>

            <label for="price">Prix</label>
            <input type="number" id="price" name="price" step="0.01" value="<?php echo htmlspecialchars($film['price']); ?>" required>

            <label for="image_path">Chemin de l'Image</label>
            <input type="text" id="image_path" name="image_path" value="<?php echo htmlspecialchars($film['image_path']); ?>" required>

            <button type="submit">Mettre à jour le Film</button>
        </form>
    </div>
</body>
</html>
