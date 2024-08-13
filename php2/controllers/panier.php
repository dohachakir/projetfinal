<?php

require_once __DIR__ . '/../config.php';

class Panier
{
    public function index()
    {
        session_start();
        $panier = isset($_SESSION['panier']) ? $_SESSION['panier'] : [];
        include __DIR__ . '/../views/panier/index.php';
    }

    public function add($id)
    {
        session_start();

        // Récupérer les informations du film
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM films WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $film = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$film) {
            die('Film non trouvé.');
        }

        // Ajouter le film au panier
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }

        $_SESSION['panier'][$id] = [
            'titre' => $film['titre'],
            'prix' => $film['prix'],
            'quantite' => isset($_SESSION['panier'][$id]) ? $_SESSION['panier'][$id]['quantite'] + 1 : 1
        ];

        header('Location: index.php?controller=panier&action=index');
    }

    public function remove($id)
    {
        session_start();
        if (isset($_SESSION['panier'][$id])) {
            unset($_SESSION['panier'][$id]);
        }

        header('Location: index.php?controller=panier&action=index');
    }
}
?>
