<?php require('assets/php/header.php'); ?>
<!--/#front-->
<div id="main">
  <div class="container">
    <?php 
    $Errors = array();
    $LoginEmailRetention = "";
    $LoginPasswordRetention = "";
    $RegisterEmailRetention = "";
    $RegisterPasswordRetention = "";
    $LoginRetention = false;
    $RegisterRetention = false;

    if(isset($_GET['login'])){
        if(isset($_POST['LoginEmail']) && !empty($_POST['LoginEmail'])){
            $LoginEmail = mysql_real_escape_string(trim($_POST['LoginEmail']));
            if(filter_var(trim($_POST['LoginEmail']), FILTER_VALIDATE_EMAIL)){
                $query = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '".$LoginEmail."'");
                if(mysql_num_rows($query) == 0){
                    $Errors['Email'] = 'doesn\'t Exist';
                } else {
                    if(isset($_POST['LoginPassword']) && !empty($_POST['LoginPassword'])) {
                        $LoginPassword =  hash_hmac('whirlpool',trim($_POST['LoginPassword']),'key');
                         $query2 = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '".$LoginEmail."' AND `password` = '".$LoginPassword."'")or die(mysql_error());
                            if(mysql_num_rows($query2) == 0){
                                $Errors['Password'] = 'does not match the username';
                            } else {
                                // Login Successful.
                                $result = mysql_result($query2, 0);
                                $unique = uniqid();
                                $query3 = mysql_query("INSERT INTO `session`(`user_id`,`session_code`) VALUES ($result, '$unique') ON DUPLICATE KEY UPDATE `session_code` = '$unique'");
                                $_SESSION['id'] = $unique;
                                header('Location: assignment-current.php?normal');
                            }
                    } else {
                        $Errors['Password'] = 'has not been entered';
                    }
                }
            } else {
                $Errors['Email'] = 'not valid';
            }
        } else {
            $Errors['Email'] = 'not entered';
        }
        if(isset($_POST['LoginEmail']) && !empty($_POST['LoginEmail'])){
            if(!isset($Errors['Email'])){
                $LoginEmailRetention = trim($_POST['LoginEmail']);
                $LoginRetention = true;
            } else {
                $LoginEmailRetention = "";
            }
        } else {
            $LoginEmailRetention = "";
        }
        if(isset($_POST['LoginPassword']) && !empty($_POST['LoginPassword'])){
            if(!isset($Errors['Password'])){
                    $LoginPasswordRetention = trim($_POST['LoginPassword']);

                    $LoginRetention = true;
                } else {
                      $LoginPasswordRetention = "";
                }
        } else {
            $LoginPasswordRetention = "";
        }
    } elseif(isset($_GET['register'])){
       if(isset($_POST['RegisterEmail']) && !empty($_POST['RegisterEmail'])){
            $RegisterEmail = mysql_real_escape_string(trim($_POST['RegisterEmail']));
            if(filter_var(trim($_POST['RegisterEmail']), FILTER_VALIDATE_EMAIL)){
                $query = mysql_query("SELECT `user_id` FROM `users` WHERE `email` = '".$RegisterEmail."'") or die(mysql_error());
                if(mysql_num_rows($query) == 1){
                    $Errors['Email'] = 'already exists';
                } else {
                    if(isset($_POST['RegisterPassword']) && !empty($_POST['RegisterPassword'])) {
                        $RegisterPassword =  hash_hmac('whirlpool',trim($_POST['RegisterPassword']),'key');
                                // Register Successful.
                                $query3 = mysql_query("INSERT INTO `users`(`email`,`password`) VALUES ('$RegisterEmail', '$RegisterPassword')");
                    } else {
                        $Errors['Password'] = 'has not been entered';
                    }
                }
            } else {
                $Errors['Email'] = 'not valid';
            }
        } else {
            $Errors['Email'] = 'not entered';
        }

            if(isset($_POST['RegisterEmail']) && !empty($_POST['RegisterEmail'])){
                $RegisterEmailRetention = trim($_POST['RegisterEmail']);
                $RegisterRetention = true;
            } else {
                $RegisterEmailRetention = "";
            }
            if(isset($_POST['RegisterPassword']) && !empty($_POST['RegisterPassword'])){
                $RegisterPasswordRetention = trim($_POST['RegisterPassword']);
                $RegisterRetention = true;
            } else {
                $RegisterPasswordRetention = "";
            }
    } else {
        //
    }
    if(!empty($Errors)){
        echo '<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>';
        foreach($Errors as $key => $val){
            echo '<strong>' . $key . '</strong> ' . $val . '<br />';
        }
        echo '</div>';
    } 
    ?>
    <div class="row">
      <div class="span8">
        <div class="border-solid box-padding step-container"> <span class="step">R</span>
          <h3>Join Us and Enhance Your Learning</h3>
          <form class="form-horizontal" method="post" action="?register">
            <div class="controls-in">
              <input type="text" class="" id="email" name="RegisterEmail" placeholder="E-mail">
            </div>
            <div class="controls-in">
              <input type="password" class="" id="password" name="RegisterPassword" placeholder="Password">
            </div>
            <div class="form-actions-in">
              <button type="submit" class="btn btn-info">Register</button>
            </div>
          </form>
        </div>
        <!--/.row--> 
      </div>
      <div class="span4">
        <div class="border-solid box-padding step-container"> <span class="step">L</span>
          <h3>Login </h3>
          <form class="form-horizontal" method="post" action="?login">
            <div class="controls-in">
                <input type="text" class="error" id="email" value="<?=$LoginEmailRetention;?>" name="LoginEmail" placeholder="E-mail">
            </div>
            <div class="controls-in">
              <input type="password" value="<?=$LoginPasswordRetention;?>" id="password" name="LoginPassword" placeholder="Password">
            </div>
            <br />
            <?php
                if($LoginRetention === true) {
                    echo '<p>Any Correct login data has been retained.</p>';
                }
            ?>
            <div class="form-actions-in">
              <button type="submit" class="btn btn-info">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--/.row-->
  </div>
</div>
<!--/#main-->
</body>
</html>