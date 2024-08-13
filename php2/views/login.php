<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Se Connecter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .form-container h1 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }
        .form-container label {
            font-weight: bold;
            color: #555;
            margin-bottom: 5px;
            display: block;
        }
        .form-container input[type="text"],
        .form-container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
            color: #333;
        }
        .form-container input[type="text"]:focus,
        .form-container input[type="password"]:focus {
            border-color: #50b3a2;
            outline: none;
        }
        .form-container input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #50b3a2;
            border: none;
            border-radius: 5px;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #3a8573;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h1>Se Connecter</h1>
        <form action="index.php?action=login" method="POST">
            <label for="username">Nom d'utilisateur :</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Se connecter">
        </form>
    </div>
</body>
</html>
