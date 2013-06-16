<?php require('assets/php/header.php'); ?>
<!--/#front-->
<div id="main">
  <div class="container">
   
        <?php
        if(isset($_GET['novice'])){
          $difficulty = 1;
        } elseif(isset($_GET['easy'])){
          $difficulty = 2;
        } elseif(isset($_GET['normal'])){
          $difficulty = 3;
        } elseif(isset($_GET['moderate'])){
          $difficulty = 4;
        } elseif(isset($_GET['hard'])){
          $difficulty = 5;
        } elseif(isset($_GET['impossible'])){
          $difficulty = 6;
        } else {
          $difficulty = 3;
        }
          $query = mysql_query("SELECT * 
FROM  `assignments` 
WHERE NOT 
EXISTS (

SELECT * 
FROM  `enrolled` 
WHERE  `assignments`.`id` =  `enrolled`.`assignment_id` 
AND  `enrolled`.`user_id` = $user_id
) AND `difficulty` = $difficulty ")or die(mysql_error());
          if(mysql_num_rows($query) != 0) {
            $x = 1;
            while($row = mysql_fetch_assoc($query)){
            ?>
               <div class="row">
                  <div class="span12">
                   <div class="border-solid box-padding step-container"><span class="step"><?=$x;?></span>
                      <h3><?=$row['title'];?></h3>
                      <p><?=$row['desc'];?></p>
                      <form class="form-horizontal" method="post" action="assignment-entered.php?add_id=<?=$row['id'];?>">
                        <div class="form-actions-in">
                          <button type="submit" class="btn btn-large btn-info">Enter Me</button>
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
              <p>Sorry but there are no assignments for that difficulty currently!</p>
           </div>
        <?php
          }
          ?>
       </div>
</div>
<!--/#main-->
</body>
</html>