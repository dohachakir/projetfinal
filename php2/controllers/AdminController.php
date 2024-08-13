<?php
require_once 'models/Film.php';

class AdminController {
    private $userModel;
    private $filmModel;

    public function __construct($userModel, $filmModel) {
        $this->userModel = $userModel;
        $this->filmModel = $filmModel;
    }

    public function showAdminDashboard() {
        if (!$this->userModel->isAdmin($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        include_once 'views/admin_dashboard.php';
    }

    public function showManageFilmsPage() {
        if (!$this->userModel->isAdmin($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $films = $this->filmModel->getAllFilms();
        include_once 'views/manage_films.php';
    }

    public function addFilm() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $imagePath = $_POST['image_path'];
            $this->filmModel->addFilm($title, $description, $price, $imagePath);
            header('Location: index.php?action=manage_films');
            exit();
        } else {
            include_once 'views/add_film.php';
        }
    }

    public function deleteFilm() {
        if (!$this->userModel->isAdmin($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $filmId = $_GET['id'];
        $this->filmModel->deleteFilm($filmId);
        header('Location: index.php?action=manage_films');
        exit();
    }

    public function showEditFilmPage() {
        if (!$this->userModel->isAdmin($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }
        $filmId = $_GET['id'];
        $film = $this->filmModel->getFilmById($filmId);
        include_once 'views/edit_film.php';
    }

    public function updateFilm() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $description = $_POST['description'];
            $price = $_POST['price'];
            $imagePath = $_POST['image_path'];
            $this->filmModel->updateFilm($id, $title, $description, $price, $imagePath);
            header('Location: index.php?action=manage_films');
            exit();
        }
    }
}
?>
