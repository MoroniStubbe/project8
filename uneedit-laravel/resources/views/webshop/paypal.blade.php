<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Sandbox Example</title>
    <script src="https://www.paypal.com/sdk/js?client-id=Ac5uidI7YJlAm5oa9gjN6WYUqw7XGdurKvb34tdwUnVxSkGlCWee6fnOAT5S5e-8dc-m4iTlfduv-5aa"></script>
</head>

<body>
    <h1>PayPal Sandbox (test) Payment</h1>
    <div id="paypal-button-container"></div>
    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: "{{ number_format($order['total_price'], 2, '.', '') }}"
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>

</html>