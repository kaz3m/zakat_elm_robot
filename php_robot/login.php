<?php 
include 'init.php';

if ( isset($_POST['password']) && !empty($_POST['password']) ) 
{
  if ( md5(sha1($_POST['password'])) == $admin_password) 
  {
    setcookie("admin", $admin_password, time()+3600*3600, '/');
    header("Location: " . 'https://' . $app_name . '.herokuapp.com/ZAKAT_ELM_ADMIN');  
  }
  else 
  {
    header("Location: " . 'https://' . $app_name . '.herokuapp.com/?wrong_password');
  }
  
} 
else 
{
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>آموزش ساخت 🤖 ربات تلگرام </title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script type="text/javascript">
      $(document).ready(function() {

      });
    </script>
    <style>
      html,
      body {
        height: 100%;
      }

      body {
        display: -ms-flexbox;
        display: -webkit-box;
        display: flex;
        -ms-flex-align: center;
        -ms-flex-pack: center;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

      .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .checkbox {
        font-weight: 400;
      }
      .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
    </style>
  </head>
  <body>
    <form class="form-signin" id="timeForm" method="POST" action="<?php echo 'https://' . $app_name . '.herokuapp.com/login.php'; ?>">
      <p style="text-align: center">
      آموزش ساخت 🤖 ربات تلگرام 
      <br>
      </p>
      <hr>
      <br>

      <p style="text-align: center">Password: </p>
      <?php 
      if ( isset($_GET['wrong_password']) ) 
      {

        echo '
<div class="alert alert-info" role="alert" style="text-align:center;">
  پسورد صحیح نیست
</div>
        ';
      }
      ?>
      <input type="password" name="password" id="password" class="form-control" placeholder="" required autofocus >
      <br>

      <button class="btn btn-lg btn-primary btn-block" type="submit" id="btn_telegram">Log In</button>

      <div class="info" style="display:none">

      </div>
  </form>


  </body>
</html>

<?php


}
?>
