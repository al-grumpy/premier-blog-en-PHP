<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <?= $title ?>
  <button type="button"><a href="../public/templates/login.php">Se connecter</button></a>
<button type="button"><a href="../public/index.php?route=inscription">S'inscrire</button></a>
<button type="button"><a href="../public/index.php?route=contact">Contact</button></a>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/clean-blog.min.css" rel="stylesheet">

</head>

<body>
  <!-- Page Header -->
  <header class="masthead" style="background-image: url('../public/img/bg2.jpg')">
    <div class="overlay"><img src="../public/img/logo.png"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <div style="background-color:grey">

            <h2>Alexia Seurot</h2>
            </div>
            <div class="container">
                <div class="">
                        <div class="col-lg-5 col-md-5">
                        <span>Développeuse web</span>
                        </div>
                </div>
            </div>
            
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div id="content">
        <?= $content ?>
        </div>
      </div>
    </div>
  </div>

  <hr>

  <!-- Footer -->
  <footer style="background-color:#3A3A3F">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <p class="copyright text-muted" style="color:white">Copyright &copy; blogPHP Alexia_Seurot 2019</p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/clean-blog.min.js"></script>

</body>

</html>
