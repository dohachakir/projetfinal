<!DOCTYPE html>
<html>
<head>
    <title>Paiement - Site de Vente de Films</title>
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
        .main-content {  
            padding: 40px;
            background: #ffffff;
            border-radius: 10px;
            width: 400px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            text-align: center;
        }
        h1 {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
        }
        #paypal-button-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1>Page de Paiement</h1>
        <div id="paypal-button-container"></div>

        <script src="https://www.paypal.com/sdk/js?client-id=AeBn97n7hogUs5SP4hDTeqtw1aMVisxIzkCAizQusH6nlQm9iIqf8r729ZfnMxNcmTSktB5IbX5JyM9k"></script>

        <script>
            paypal.Buttons({
                createOrder: function (data, actions) {
                    return actions.order.create({
                        purchase_units: [{
                            amount: {
                                value: '5' // Vous pouvez rendre ce montant dynamique selon le total de l'achat
                            }
                        }]
                    });
                },
                onApprove: function (data, actions) {
                    return actions.order.capture().then(function (details) {
                        alert('Transaction complétée par ' + details.payer.name.given_name + '!');
                    });
                },
                onError: function(err){
                    console.log("erreur dans le paiement", err);
                    alert("paiement échoué");
                }
            }).render('#paypal-button-container');
        </script>
    </div>
</body>
</html>
