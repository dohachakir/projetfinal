<?php
class Film {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllFilms() {
        $stmt = $this->db->prepare("SELECT * FROM films");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmById($id) {
        $stmt = $this->db->prepare("SELECT * FROM films WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getFilmsByIds($ids) {
        $in  = str_repeat('?,', count($ids) - 1) . '?';
        $sql = "SELECT * FROM films WHERE id IN ($in)";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($ids);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addFilm($title, $description, $price, $imagePath) {
        $stmt = $this->db->prepare("INSERT INTO films (title, description, price, image_path) VALUES (:title, :description, :price, :image_path)");
        $stmt->execute(['title' => $title, 'description' => $description, 'price' => $price, 'image_path' => $imagePath]);
    }

    public function deleteFilm($filmId) {
        $stmt = $this->db->prepare("DELETE FROM films WHERE id = :id");
        $stmt->execute(['id' => $filmId]);
    }

    public function updateFilm($id, $title, $description, $price, $imagePath) {
        $stmt = $this->db->prepare("UPDATE films SET title = :title, description = :description, price = :price, image_path = :image_path WHERE id = :id");
        $stmt->execute(['id' => $id, 'title' => $title, 'description' => $description, 'price' => $price, 'image_path' => $imagePath]);
    }
}
?>
