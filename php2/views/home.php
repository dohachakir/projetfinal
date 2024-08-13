<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #e9ecef;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            text-align: center;
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .header {
            background-color: #343a40;
            color: white;
            padding: 20px 0;
            border-radius: 10px 10px 0 0;
            margin: -40px -40px 30px -40px;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .auth-options {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
        .auth-options a {
            padding: 15px 30px;
            text-decoration: none;
            color: #343a40;
            border: 2px solid #343a40;
            border-radius: 5px;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        .auth-options a:hover {
            background-color: #343a40;
            color: white;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Bienvenue sur notre site de vente de films</h1>
        </div>
        <div class="auth-options">
            <a href="index.php?action=login">Se connecter</a>
            <a href="index.php?action=register">S'inscrire</a>
        </div>
    </div>
</body>
</html>
