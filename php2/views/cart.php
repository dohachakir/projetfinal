<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier</title>
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
        .checkout {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            margin-top: 20px;
        }
        .checkout:hover {
            background-color: #0056b3;
        }
        .total {
            text-align: right;
            font-size: 1.5em;
            margin-top: 20px;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Panier</h1>
    </div>
    <div class="container">
        <ul class="film-list">
            <?php
            $total = 0;
            foreach ($filmsInCart as $film):
                $total += $film['price'] * $film['quantity'];
            ?>
                <li class="film-item">
                    <span class="film-title"><?php echo htmlspecialchars($film['title']); ?></span>
                    <div class="film-actions">
                        <span>Quantité: <?php echo $film['quantity']; ?></span>
                        <a href="index.php?action=remove_from_cart&id=<?php echo $film['id']; ?>">Supprimer</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
        <div class="total">
            <strong>Total : <?php echo number_format($total, 2); ?> $</strong>
        </div>
        <a href="index.php?action=payment" class="checkout">Passer à la caisse</a>
    </div>
</body>
</html>
