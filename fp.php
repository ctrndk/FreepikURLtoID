<?php
session_start();
$_SESSION['token'] = md5(uniqid(rand(), true));
$token = $_SESSION['token'];
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.4/examples/floating-labels/">
    <link href="https://getbootstrap.com/docs/4.4/examples/floating-labels/floating-labels.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <link rel="icon" type="image/png" href="https://developer.mozilla.org/static/img/opengraph-logo.72382e605ce3.png"/>
    <title>Freepik URL to ID Converter</title>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  </head>
  <body>

    <form class="form-signin" action="" method="POST">
      <input type="hidden" name="token" value="<?= $token;?>" >
        <div class="text-center mb-4">
          <h1 class="h3 mb-3 font-weight-normal">Freepik URL to ID!</h1>
        </div>
        <div class="card border-info mb-3">
          <div class="card-body text-info">
            <h5 class="card-title">Example URL:</h5>
            <p class="card-text">
              https://www.freepik.com/premium-psd/smartphone-mockup_6898720.htm
            </p>
          </div>
        </div>

<?PHP
          if (isset($_POST['execute']))
          {
            if ($_SESSION['token'] == $token) {
              $url = $_POST['url'];
              $stepOne = explode("_", $url);
              
             if(!empty($stepOne[1])){
              $stepTwo = explode(".htm", $stepOne[1]);
                if(!empty($stepTwo[0])){
                    $id = $stepTwo[0];
                    $status = "success";
                    $msg = "ID: ".$id;
                }
                else {
                   $status = "warning";
                   $msg = "Cannot Parse URL";
                }
              }
             else {
                $status = "warning";
                $msg = "Cannot Parse URL";
              }
                  
              if ($status == "success") {
                    echo '<div class="alert alert-'.$status.'">
                          <strong>Success!</strong> '.$msg.'
                        </div>';
              } else if($status == "warning") {
                    echo '<div class="alert alert-'.$status.'">
                          <strong>Failed!</strong> '.$msg.'
                        </div>';
              } else {
                echo '<div class="alert alert-danger">
                          <strong>Error!</strong> UNKNOWN
                        </div>';
              }
                  
            } else {
                    echo '<div class="alert alert-danger">
                          <strong>Invalid Token!</strong> ^_^.
                        </div>';
            }
          }

?>

        <div class="form-group mb-3">
          <input type="url" id="url" name="url" class="form-control" placeholder="URL" required>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="execute">Execute</button>
        <p class="mt-5 mb-3 text-muted text-center">Coded with <ion-icon md="md-heart"></ion-icon> From <a href="https://github.com/ctrndk">Indonesia</a> &copy; <?= date('Y');?></p>
    </form>
    
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons/ionicons.esm.js"></script>
  </body>
</html>