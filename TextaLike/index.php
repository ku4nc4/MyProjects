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
  <form action="p.php" method="post">
    <div class="container">
      <div class="row">
        <p style="font-size:50px; color: white; width:100%;">
          <h1 class="text-center" style="font-size:50px; color: white; width:100%;">Text-A-Like</h1>
        </p>
      </div>
      <div class="row">
        <div class="col-md-6">
          <textarea name="text1" id="text1" rows="28"></textarea>
        </div>
        <div class="col-md-6">
          <textarea name="text2" id="text2" rows="28"></textarea>
        </div>

      </div>
      <div class="d-flex p-2 justify-content-center">
        <div class="card" id="loading">
          <h4>Loading</h4>
        </div>
      </div>
      <div class="d-flex p-2 justify-content-center">
        <div class="card" id="result">

        </div>
      </div>

      <div class="d-flex p-2 justify-content-center">
        <button type="button" class="btn btn-danger" id="btnsub">Text-A-Like?</button>
      </div>


    </div>

  </form>


  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  <script type="text/javascript">
    $("#btnsub").on('click',function(){
      $.ajax({
            url: 'p.php',
            method: 'post',
            data: {
                text1: $("#text1").val(),
                text2: $("#text2").val()
            },
            dataType : 'html',
            success : function(data){
              $("#result").html(data);
            }
        });
    })

    $( "#loading" ).hide();

    $( document ).ajaxStart(function() {
      $( "#loading" ).show();
    });
    $( document ).ajaxStop(function() {
      $( "#loading" ).hide();
    });
  </script>
<?php include 'track.php' ?>

</body>

</html>
