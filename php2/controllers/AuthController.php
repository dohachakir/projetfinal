<?php
require_once 'models/Cart.php';

class AuthController {
    private $userModel;
    private $filmModel;
    private $cartModel;

    public function __construct($userModel, $filmModel, $cartModel) {
        $this->userModel = $userModel;
        $this->filmModel = $filmModel;
        $this->cartModel = $cartModel;
    }

    public function showHomePage() {
        $userModel = $this->userModel;
        include_once 'views/home.php';
    }

    public function showLoginPage() {
        include_once 'views/login.php';
    }

    public function showRegisterPage() {
        include_once 'views/register.php';
    }

    public function showFilmsPage() {
        $films = $this->filmModel->getAllFilms();
        include_once 'views/films.php';
    }

    public function addToCart() {
        $filmId = $_GET['id'];
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $this->cartModel->addToCart($userId, $filmId);
            header('Location: index.php?action=view_cart');
        } else {
            header('Location: index.php?action=login');
        }
        exit();
    }

    public function viewCart() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $filmsInCart = $this->cartModel->getCartItems($userId);
            include_once 'views/cart.php';
        } else {
            header('Location: index.php?action=login');
        }
    }

    public function removeFromCart() {
        $filmId = $_GET['id'];
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $this->cartModel->removeFromCart($userId, $filmId);
            header('Location: index.php?action=view_cart');
        } else {
            header('Location: index.php?action=login');
        }
        exit();
    }

    public function showPaymentPage() {
        include_once 'views/payment.php';
    }

    public function processPayment() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $this->cartModel->clearCart($userId);
        }
        header('Location: index.php?action=payment_success');
        exit();
    }

    public function showPaymentSuccessPage() {
        echo "<h1>Paiement réussi ! Merci pour votre achat.</h1>";
        echo "<a href='index.php?action=films'>Retour à la liste des films</a>";
    }

    public function logout() {
        session_destroy();
        header('Location: index.php?action=login');
        exit();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);

            if ($user) {
                if ($user['role'] === 'admin') {
                    header('Location: index.php?action=admin_dashboard');
                } else {
                    $this->showFilmsPage();
                }
            } else {
                echo 'Nom d’utilisateur ou mot de passe incorrect.';
            }
        } else {
            $this->showLoginPage();
        }
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            if ($this->userModel->register($username, $password)) {
                header('Location: index.php?action=login');
                exit();
            } else {
                echo 'Erreur lors de l’inscription.';
            }
        } else {
            $this->showRegisterPage();
        }
    }
}
?>
