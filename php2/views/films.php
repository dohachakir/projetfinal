
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Films</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f4f4f4;
            margin: 0;
        }
        .header {
            background-color: #009688;
            color: white;
            padding: 10px 0;
            text-align: center;
            position: relative;
        }
        .header h1 {
            margin: 0;
        }
        .header .logout-button,
        .header .cart-button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
        }
        .header .logout-button {
            left: 20px;
        }
        .header .cart-button {
            right: 20px;
        }
        .header .logout-button:hover,
        .header .cart-button:hover {
            background-color: #c0392b;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        .film-list {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding: 0;
            margin: 0;
            list-style: none;
        }
        .film-item {
            background-color: white;
            margin: 10px;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: calc(100% / 3 - 40px);
            box-sizing: border-box;
            text-align: center;
        }
        .film-item img {
            width: 100%;
            height: auto;
        }
        .film-title {
            font-size: 1.5em;
            margin: 10px 0;
        }
        .film-description {
            font-size: 1em;
            color: #555;
        }
        .film-price {
            font-size: 1.2em;
            color: #e74c3c;
        }
        .film-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #009688;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        .film-button:hover {
            background-color: #00796b;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Liste des films à vendre</h1>
        <a href="index.php?action=logout" class="logout-button">Déconnexion</a>
        <a href="index.php?action=view_cart" class="cart-button">Voir le Panier</a>
    </div>
    <ul class="film-list">
        <?php foreach ($films as $film): ?>
            <li class="film-item">
                <img src="images/<?php echo htmlspecialchars($film['image_path']); ?>" alt="<?php echo htmlspecialchars($film['title']); ?>">
                <h2 class="film-title"><?php echo htmlspecialchars($film['title']); ?></h2>
                <p class="film-description"><?php echo htmlspecialchars($film['description']); ?></p>
                <p class="film-price">Prix: <?php echo htmlspecialchars($film['price']); ?> €</p>
                <a href="index.php?action=add_to_cart&id=<?php echo $film['id']; ?>" class="film-button">Ajouter au panier</a>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
