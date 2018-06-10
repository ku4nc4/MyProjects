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
    <div class="card mt-4">
      <div class="card-header">
        Premium Features
      </div>
      <div class="card-body">
        <h4 class="card-title">Get you api, for just Rp. 10 per use</h4>
        <p class="card-text">Lots of great specific features</p>
          <ul>
            <li>Article Plagiarism Check</li>
            <li>Coding Plagiarism Check</li>
            <li>Custom Stregth of Check</li>
            <li>Get Article Topic</li>
          </ul>
        <a href="payment.php" class="btn btn-primary">Get you API key now!</a>
      </div>
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
