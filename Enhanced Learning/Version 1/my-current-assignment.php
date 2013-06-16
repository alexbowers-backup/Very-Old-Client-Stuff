<?php require('assets/php/header.php'); ?>
<!--/#front-->
<div id="main">
  <div class="container">
    <div class="row">
      
          <?php
          if(isset($_GET['ass_id'])){
              $query = mysql_query("SELECT `assignments`.`id`,`assignments`.`title`,`assignments`.`desc`,`assignments`.`difficulty` FROM `assignments`,`enrolled` WHERE `enrolled`.`grade` = '-1' AND `enrolled`.`user_id` = $user_id AND `assignments`.`id` = `enrolled`.`assignment_id` AND `assignments`.`id` = ".mysql_real_escape_string($_GET['ass_id']));
       if(mysql_num_rows($query)){
        if(isset($_GET['submitCode']) && isset($_POST['code'])){

          $code = mysql_real_escape_string($_POST['code']);
          $query = mysql_query("UPDATE `enrolled` SET `grade` = '-2' ,`code` = '$code' WHERE `user_id` = $user_id AND `assignment_id` = ".mysql_real_escape_string($_GET['ass_id']));
          echo '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert">&times;</a>
              <p>Code successfully sent off.</p>
           </div>';
        } else {
          $row = mysql_fetch_assoc($query);
          switch($row['difficulty']){
                case 1:
                  $difficulty = 'novice';
                  break;
                case 2:
                  $difficulty = 'easy';
                  break;
                case 3:
                  $difficulty = 'normal';
                  break;
                case 4:
                  $difficulty = 'moderate';
                  break;
                case 5:
                  $difficulty = 'hard';
                  break;
                case 6:
                  $difficulty = 'impossible';
                  break;
                default:
                  $difficulty = 'Unknown';
                  break;
              }
          ?><div class="span8">
            <div class="border-solid box-padding">
            <h3><?=$row['title'];?> <small> - (<?=$difficulty;?>)</small></h3>
              <p><?=$row['desc'];?></p>
            </div>
          </div>
          <div class="span4">
        <div class="border-solid box-padding">
          <h3>Submit Code <p>You can only submit once. </p></h3>
          <form class="form-horizontal" method="post" action="?submitCode&ass_id=<?=$_GET['ass_id'];?>">
            <div class="controls-in">
              <textarea style="width: 282px;" name="code" placeholder="Please upload your code here                                 Simply C+P the file contents into here"></textarea>
            </div><br />
            <p>By clicking submit you confirm that you are submitting this code for yourself, and that this is the only and final submission for this Assignment</p>
            <div class="form-actions-in">
              <button type="submit" class="btn btn-large btn-info">Submit</button>
            </div>
          </form>
        </div>
        <!--/.row--> 
      </div><?php
        }
        } else {
          echo '<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
              <p>You aren\'t enrolled for this assignment.</p>
           </div>';
        }
          } else {
            echo '<div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
              <p>No assignment was selected.</p>
           </div>';
          }
          ?>
    </div>
  </div>
</div>
<!--/#main-->
</body>
</html>