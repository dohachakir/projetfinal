<?php
session_start();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'models/User.php';
require_once 'models/Film.php';
require_once 'models/Cart.php';
require_once 'models/PaymentModel.php';
require_once 'controllers/AuthController.php';
require_once 'controllers/AdminController.php';
require_once 'controllers/PaymentController.php'; 

try {
    $database = new PDO('mysql:host=localhost;dbname=my_database', 'doha', 'doha');
    $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userModel = new User($database);
    $filmModel = new Film($database);
    $cartModel = new Cart($database); // Ajout du modèle de panier
    $paymentModel = new PaymentModel($database);

    $authController = new AuthController($userModel, $filmModel, $cartModel); // Passer le modèle de panier
    $adminController = new AdminController($userModel, $filmModel);
    $paymentController = new PaymentController($paymentModel);

    $action = isset($_GET['action']) ? $_GET['action'] : '';

    switch ($action) {
        case 'login':
            $authController->login();
            break;
        case 'register':
            $authController->register();
            break;
        case 'films':
            $authController->showFilmsPage();
            break;
        case 'add_to_cart':
            $authController->addToCart();
            break;
        case 'view_cart':
            $authController->viewCart();
            break;
        case 'remove_from_cart':
            $authController->removeFromCart();
            break;
        case 'payment':
            $authController->showPaymentPage();
            break;
        case 'process_payment':
            $paymentController->processPayment();
            break;
        case 'paypal_success':
            $paymentController->paypalSuccess();
            break;
        case 'logout':
            $authController->logout();
            break;
        case 'admin_dashboard':
            $adminController->showAdminDashboard();
            break;
        case 'manage_films':
            $adminController->showManageFilmsPage();
            break;
        case 'add_film':
            $adminController->addFilm();
            break;
        case 'delete_film':
            $adminController->deleteFilm();
            break;
        case 'edit_film':
            $adminController->showEditFilmPage();
            break;
        case 'update_film':
            $adminController->updateFilm();
            break;
        default:
            $authController->showHomePage();
    }
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}
?>
