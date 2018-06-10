<!doctype html>
<html lang="en">

<head>
  <title>Hello, world!</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
  <style>
    body {
      background: #103e55;
    }

    textarea {
      width: 100%;
    }

    .imgpayment {
      height: 60px;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-md navbar-fixed-top navbar-dark bg-dark main-nav">
    <div class="container">
      <ul class="nav navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Text-A-Like</a></li>
      </ul>
    </div>
  </nav>
  <div class="container">
    <form action="processpayment.php" method="post">
      <div class="card mt-4">
        <div class="card-header">
          Your Information
        </div>
        <div class="card-body">
          <h4 class="card-title">First Name</h4>
          <input class="form-control" type="text" name="fname" value="">
          <h4 class="card-title">Last Name</h4>
          <input class="form-control" type="text" name="lname" value="">
          <h4 class="card-title">Email</h4>
          <input class="form-control" type="email" name="email" value="">
          <h4 class="card-title">Confirm Email</h4>
          <input class="form-control" type="email" name="email" value="">
          <h4 class="card-title">Phone Number</h4>
          <input class="form-control" type="text" name="phone" value="">

        </div>
      </div>
      <div class="card mt-4">
        <div class="card-header">
          Get Text-A-Like API
        </div>
        <div class="card-body">
          <h4 class="card-title">Select Payment Method</h4>
          <p class="card-text">Please select one of these method</p>
          <ul>
            <li><button type="submit" name="type" value="VC" class="btn btn-primary mb-1">Credit Card</button><img class="imgpayment" src="https://www.visa.ca/en_CA/pay-with-visa/cards/debit-cards/_jcr_content/par/drawercomponent/drawer_hidden/containeraccordion/accordionComp3/accordionPanel/image.img.jpg/1466433985798.jpg" alt=""></li>
            <li><button type="submit" name="type" value="MY" class="btn btn-primary mb-1">Mandiri KlikPay</button><img class="imgpayment" src="http://blog.tiketux.com/wp-content/uploads/2014/01/mandiri_clickpay.png" alt=""></li>
            <li><button type="submit" name="type" value="BK" class="btn btn-primary mb-1">BCA KlikPay</button><img class="imgpayment" src="http://www.logovaults.com/stock_thumb/big-bca-klikpay-2013-01-28.jpg" alt=""></li>
            <li><button type="submit" name="type" value="WW" class="btn btn-primary mb-1">Duitku Wallet</button><img class="imgpayment" src="https://www.duitku.com/wp-content/uploads/2017/03/Duitku-Logo-small.jpg" alt=""></li>
            <li><button type="submit" name="type" value="BT" class="btn btn-primary mb-1">Permata Bank Virtual Account</button><img class="imgpayment" src="http://www.kamiidea.com/img/banklogo/permatabank.png" alt=""></li>
            <li><button type="submit" name="type" value="B1" class="btn btn-primary mb-1">CIMB Niaga Virtual Account</button><img class="imgpayment" src="https://seeklogo.com/images/C/CIMB_Bank__Reversed_-logo-E92EEBA0E0-seeklogo.com.png" alt=""></li>
            <li><button type="submit" name="type" value="A1" class="btn btn-primary mb-1">ATM Bersama</button><img class="imgpayment" src="http://www.atmbersama.com/assets/atmbersama/images/logo.png" alt=""></li>
            <li><button type="submit" name="type" value="I1" class="btn btn-primary mb-1">BNI Virtual Account</button><img class="imgpayment" src="https://upload.wikimedia.org/wikipedia/id/thumb/5/55/BNI_logo.svg/800px-BNI_logo.svg.png" alt=""></li>
            <li><button type="submit" name="type" value="I2" class="btn btn-primary mb-1">Danamon Virtual Account</button><img class="imgpayment" src="https://3.bp.blogspot.com/-u1SCHv23dWk/WYFt8TUR5eI/AAAAAAAABg4/98oun4sopn8urIBZtBvik1qCFL4j5WfFACLcBGAs/s1600/danamon.png" alt=""></li>
            <li><button type="submit" name="type" value="VA" class="btn btn-primary mb-1">Maybank Virtual Account</button><img class="imgpayment" src="https://www.maybank.co.id/sites/en/about/Image%20Lib/Maybank%20logo%20for%20web.jpg" alt=""></li>
            <li><button type="submit" name="type" value="CK" class="btn btn-primary mb-1">CIMB Click</button><img class="imgpayment" src="http://2.bp.blogspot.com/-BaqvwNjCqMM/TerqtNgeAeI/AAAAAAAAFPI/48zPuxnwZvM/s1600/Cimb+Clicks.png" alt=""></li>
          </ul>
        </div>
      </div>
    </form>

    <div class="wrapper">



    </div>
  </div>




  </form>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $("#btnsub").on('click', function() {
      $.ajax({
        url: 'p.php',
        method: 'post',
        data: {
          text1: $("#text1").val(),
          text2: $("#text2").val()
        },
        dataType: 'html',
        success: function(data) {
          $("#result").html(data);
        }
      });
    })

    $("#loading").hide();

    $(document).ajaxStart(function() {
      $("#loading").show();
    });
    $(document).ajaxStop(function() {
      $("#loading").hide();
    });
  </script>
  <?php include 'track.php' ?>
</body>

</html>
