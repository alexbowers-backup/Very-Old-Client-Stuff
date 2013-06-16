<?php require('assets/php/header.php'); ?>
<!--/#front-->
<div id="main">
  <div class="container">
    
  
<?php
if(isset($_GET['add_id'])){
  $query = mysql_query("INSERT INTO `enrolled` (`user_id`,`assignment_id`) VALUES ($user_id, ".mysql_real_escape_string($_GET['add_id']).")") or die(mysql_error()) ;
}
  $query = mysql_query("SELECT `assignments`.`id`,`assignments`.`title`,`assignments`.`desc`,`assignments`.`difficulty` FROM `assignments`,`enrolled` WHERE `enrolled`.`grade` = '-1' AND `enrolled`.`user_id` = $user_id AND `assignments`.`id` = `enrolled`.`assignment_id` ORDER BY `assignments`.`difficulty`");
          if(mysql_num_rows($query) != 0) {
            $x = 1;
            while($row = mysql_fetch_assoc($query)){
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
            ?>
              <div class="row">
      <div class="span12">
        <div class="border-solid box-padding step-container"><span class="step"><?=$x;?></span>
          <h3><?=$row['title'];?> <small> - (<?=$difficulty;?>)</small></h3>
          <p><?=$row['desc'];?></p>
          <form class="form-horizontal" method="post" action="my-current-assignment.php?ass_id=<?=$row['id'];?>">
            <div class="form-actions-in">
              <button type="submit" class="btn btn-large btn-info">Submit Code</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="space"></div>
        <?php
        $x++;
            }
          } else {
           ?>
           <div class="alert alert-error"><a href="#" class="close" data-dismiss="alert">&times;</a>
              <p>It appears you haven't entered yourself for any assignments yet.</p>
           </div>
        <?php
          }
          ?>
          </div>
</div>
<!--/#main-->
</body>
</html>