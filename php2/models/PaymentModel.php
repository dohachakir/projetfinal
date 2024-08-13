<?php

class PaymentModel {
    protected $db;

    public function __construct($dbConnection) {
        $this->db = $dbConnection;
    }

    public function processPayment($amount, $payerDetails) {
        // Exemple d'enregistrement d'une transaction dans la base de données
        $stmt = $this->db->prepare("INSERT INTO payments (amount, payer_name, transaction_date) VALUES (?, ?, NOW())");
        $stmt->bind_param("ds", $amount, $payerDetails['name']);
        $stmt->execute();
        return $stmt->insert_id;
    }

    public function getDb() {
        return $this->db;
    }
}
