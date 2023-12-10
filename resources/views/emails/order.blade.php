<!DOCTYPE html>
<html>
<head>
    <title>New order commission notification</title>
</head>
<body>
    <p>Dear {{ $details['name'] }},</p>
    <p>You have received a commission of {{ $details['commission'] }}€ for order number <b>{{ $details['order_no'] }}</b>, which was received on <b>{{ $details['created_at'] }}</b>.</p>
    <p>Thank you</p>
</body>
</html>