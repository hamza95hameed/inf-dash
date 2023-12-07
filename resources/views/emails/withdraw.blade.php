<!DOCTYPE html>
<html>
<head>
    <title>Withdraw Request</title>
</head>
<body>
    <p>Dear admin,</p>
    <p>You receive withdraw request from {{ $details['name'] }} of {{ $details['amount'] }} amount. His/her IBAN number is {{ $details['iban'] }}</p>
    <p>Thank you</p>
</body>
</html>