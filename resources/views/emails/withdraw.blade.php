<!DOCTYPE html>
<html>
<head>
    <title>Withdraw Request</title>
</head>
<body>
    <p>Dear admin,</p>
    <p>You receive withdraw request from <b>{{ $details['name'] }}</b> of <b>{{ $details['amount'] }}€</b> amount. His/her IBAN number is <b>{{ $details['iban'] }}</b></p>
    <p>Thank you</p>
</body>
</html>