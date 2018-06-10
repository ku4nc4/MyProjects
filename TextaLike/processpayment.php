<?php
    $merchantCode = 'D0569'; // from duitku
    $merchantKey = '5926179457ba3f715e54a9ba00b00cb0'; // from duitku
    $paymentAmount = '100000';
    $paymentMethod = $_POST['type']; // WW = duitku wallet, VC = Credit Card, MY = Mandiri Clickpay, BK = BCA KlikPay
    $merchantOrderId = time(); // from merchant, unique
    $productDetails = 'API Access TextALike';
    $email = $_POST['email']; // your customer email
    $phoneNumber = $_POST['phone']; // your customer phone number (optional)
    $additionalParam = ''; // optional
    $merchantUserInfo = ''; // optional
    $callbackUrl = 'http://textalike.com/success.php'; // url for callback
    $returnUrl = 'http://textalike.com/index.php'; // url for redirect



    $api = md5($email.$phoneNumber);
    $url = "http://textalike.com/documentation";
    $to = $email;
    $subject = "Text A Like API key : ";
    $txt = "Your api key is $api, this is you documentation";
    $headers = "From: admin@textalike.com";

    mail($to,$subject,$txt,$headers);

    $signature = md5($merchantCode . $merchantOrderId . $paymentAmount . $merchantKey);

    $item1 = array(
        'name' => 'Text A Like API Access',
        'price' => 100000,
        'quantity' => 1);

    $itemDetails = array(
        $item1
    );

    $params = array(
        'merchantCode' => $merchantCode,
        'paymentAmount' => $paymentAmount,
        'paymentMethod' => $paymentMethod,
        'merchantOrderId' => $merchantOrderId,
        'productDetails' => $productDetails,
        'additionalParam' => $additionalParam,
        'merchantUserInfo' => $merchantUserInfo,
        'email' => $email,
        'phoneNumber' => $phoneNumber,
        'itemDetails' => $itemDetails,
        'callbackUrl' => $callbackUrl,
        'returnUrl' => $returnUrl,
        'signature' => $signature
    );

    $params_string = json_encode($params);
    // $url = 'http://sandbox.duitku.com/webapi/api/merchant/inquiry'; // Sandbox
    $url = 'https://passport.duitku.com/webapi/api/merchant/inquiry'; // Production
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $params_string);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($params_string))
    );
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

    //execute post
    $request = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    if($httpCode == 200)
    {
        $result = json_decode($request, true);
        header('location: '. $result['paymentUrl']);
        echo "paymentUrl :". $result['paymentUrl'] . "<br />";
        echo "merchantCode :". $result['merchantCode'] . "<br />";
        echo "reference :". $result['reference'] . "<br />";
    }
    else
        echo $httpCode;
?>
