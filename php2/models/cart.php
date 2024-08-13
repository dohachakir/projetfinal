<?php
class Cart {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function addToCart($userId, $filmId) {
        $stmt = $this->db->prepare("INSERT INTO cart (user_id, film_id) VALUES (:user_id, :film_id)");
        $stmt->execute(['user_id' => $userId, 'film_id' => $filmId]);
    }

    public function getCartItems($userId) {
        $stmt = $this->db->prepare("SELECT films.*, cart.quantity FROM cart JOIN films ON cart.film_id = films.id WHERE cart.user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function removeFromCart($userId, $filmId) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = :user_id AND film_id = :film_id");
        $stmt->execute(['user_id' => $userId, 'film_id' => $filmId]);
    }

    public function clearCart($userId) {
        $stmt = $this->db->prepare("DELETE FROM cart WHERE user_id = :user_id");
        $stmt->execute(['user_id' => $userId]);
    }
}
?>
