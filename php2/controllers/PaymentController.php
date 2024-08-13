<?php
require_once 'models/PaymentModel.php';

class PaymentController {
    private $paymentModel;

    public function __construct($paymentModel) {
        $this->paymentModel = $paymentModel;
    }

    public function processPayment() {
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $amount = 0;
            if (isset($_SESSION['cart'])) {
                // Calculer le montant total
                foreach ($_SESSION['cart'] as $filmId) {
                    $stmt = $this->paymentModel->db->prepare("SELECT price FROM films WHERE id = :id");
                    $stmt->execute(['id' => $filmId]);
                    $film = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($film) {
                        $amount += $film['price'];
                    }
                }
            }

            if ($this->paymentModel->processPayment($userId, $amount)) {
                $_SESSION['cart'] = [];
                header('Location: index.php?action=payment_success');
                exit();
            } else {
                echo "Erreur lors du traitement du paiement.";
            }
        } else {
            header('Location: index.php?action=login');
        }
    }

    public function paypalSuccess() {
        echo "<h1>Paiement PayPal réussi ! Merci pour votre achat.</h1>";
        echo "<a href='index.php?action=films'>Retour à la liste des films</a>";
    }
}
?>
