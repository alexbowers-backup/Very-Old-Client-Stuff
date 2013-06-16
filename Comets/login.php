<?php
  require_once('includes/connect.php');
  require_once('process/login.php');
  require_once('process/user.class.php');
  $user = new User();

?>
<html>
  <head>
      <link rel="stylesheet" href="css/reset.css" />
        <link rel="stylesheet" href="css/style.css" />
        <title>The Comets</title>
    </head>
    <body>
      <div id="container">
          <div id="main">
            <h1 class="message">The comets</h1>
              <h2>Membership</h2>
              <?php
                if(!empty($errors)){
                  foreach($errors as $error){
                    echo $error.'<br />';
                  }
                }
              ?>
              <form id="register_form" method="POST" action="?process">
                <fieldset>
                    <legend>Login to access The Comets</legend>
                    <label for="email">Email Address </label><input type="email" name="email" placeholder="Ex: first.last@gmail.com" tabindex="3" value="<?=(isset($_POST['email']))?$_POST['email']:'';?>" style="width: 180px;"/><br />
                    <label for="password">Password </label><input type="password" name="password" id="password" placeholder="Password" tabindex="4"/><br />
                    <label for="submit">Click to Login </label><input type="submit" name="submit" value="Login" tabindex="8" />
                </fieldset>
              </form>
          </div>
          <div id="sidebar">
            <h1>Menu</h1>
           <?php include('sidebar.php'); ?>
          </div>
      </div>
    </body>
</html>
