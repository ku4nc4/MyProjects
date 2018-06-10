<?php
$apiKey = '5926179457ba3f715e54a9ba00b00cb0'; // Your api key
$merchantCode = isset($_POST['merchantCode']) ? $_POST['merchantCode'] : null;
$amount = isset($_POST['amount']) ? $_POST['amount'] : null;
$merchantOrderId = isset($_POST['merchantOrderId']) ? $_POST['merchantOrderId'] : null;
$productDetail = isset($_POST['productDetail']) ? $_POST['productDetail'] : null;
$additionalParam = isset($_POST['additionalParam']) ? $_POST['additionalParam'] : null;
$paymentMethod = isset($_POST['paymentCode']) ? $_POST['paymentCode'] : null;
$resultCode = isset($_POST['resultCode']) ? $_POST['resultCode'] : null;
$merchantUserId = isset($_POST['merchantUserId']) ? $_POST['merchantUserId'] : null;
$reference = isset($_POST['reference']) ? $_POST['reference'] : null;
$signature = isset($_POST['signature']) ? $_POST['signature'] : null;

if(!empty($merchantCode) && !empty($amount) && !empty($merchantOrderId) && !empty($signature))
{
    $params = $merchantCode . $amount . $merchantOrderId . $apiKey;
    $calcSignature = md5($params);

    if($signature == $calcSignature)
    {
        //Your code here

	if($resultCode == "00")
	{
    require 'connection.php';
    $conn->query("insert into user(apikey,email,phone,credit) values('$api','$email','$phoneNumber',10000)");
   	}
	else
        {
            echo "FAILED"; // Please update the status to FAILED in database
        }
    }
    else
    {
        throw new Exception('Bad Signature');
    }
}
else
{
    throw new Exception('Bad Parameter');
}
?>
<!doctype html>
<html lang="en">

<head>
  <title>Text a Like - Anti-Plagiarism</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Text-A-Like is an API to detect Plagiarism on article. It can gives percentage of chance if an article is plagiarated by another article or another way around" />
  <meta name="keywords" content="HTML, PHP, plagiarism, text, compare, api">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <style>
    body {
      background: #103e55;
    }

    textarea {
      width: 100%;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-dark main-nav">
    <div class="container">
      <ul class="nav navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="#">Text-A-Like</a></li>
      </ul>
    </div>
      <a href="premium.php" style="position: fixed; right:2rem"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Get Premium</button></a>
  </nav>
  <h1>Terimakasih Sudah Membeli API kami, apikey dan dokumentasinya sudah kami kirimkan ke email anda!</h1>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>

<?php include 'track.php' ?>

</body>

</html>
