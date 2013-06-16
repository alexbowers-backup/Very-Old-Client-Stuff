<?php
  require('user.class.php');
  if($user::is_logged_in() == true){
    if($user::is_admin($_SESSION['uid']) == false){
      header('Location: index.php');
    }
  } else {
    header('Location: index.php');
  }
  if(!isset($_GET['view'])){
    $page = 'all';
  } else {
    if(!in_array($_GET['view'],array('all','products','users'))){
      $page = 'products';
    } else {
      $page = $_GET['view'];
    }
  }

  if(isset($_GET['process'])){
    if(isset($_GET['view']) && $_GET['view'] == 'users'){
        if(isset($_GET['action'])){
          if($_GET['action'] == 'add'){
            $username = mysql_real_escape_string($_POST['username']);
             $firstname = mysql_real_escape_string($_POST['firstname']);
             $lastname = mysql_real_escape_string($_POST['lastname']);
             $dob = mysql_real_escape_string($_POST['dob']);
             $graduation = mysql_real_escape_String($_POST['graduation']);
             $capoeira = mysql_real_escape_String($_POST['capoeira']);
             $master = mysql_real_escape_string($_POST['master']);
             $file ="";
             if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
             }
             mysql_query('INSERT INTO `members` (`username`,`first_name`,`last_name`,`dob`,`graduation`,`group_name`,`master_name`) VALUES ("'.$username.'","'.$firstname.'","'.$lastname.'","'.$dob.'","'.$graduation.'","'.$capoeira.'","'.$master.'")');
             header('Location: admin.php?view=users');
          } elseif($_GET['action'] == 'edit'){
             $username = mysql_real_escape_string($_POST['username']);
             $firstname = mysql_real_escape_string($_POST['firstname']);
             $lastname = mysql_real_escape_string($_POST['lastname']);
             $dob = mysql_real_escape_string($_POST['dob']);
             $graduation = mysql_real_escape_String($_POST['graduation']);
             $capoeira = mysql_real_escape_String($_POST['capoeira']);
             $master = mysql_real_escape_string($_POST['master']);
             $file ="";
             if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
             }
             
             mysql_query('UPDATE `members` SET `username`= "'.$username.'",`first_name` = "'.$firstname.'",`last_name` = "'.$lastname.'",`dob` = "'.$dob.'", `graduation` = "'.$graduation.'",`group_name` = "'.$capoeira.'",`master_name` = "'.$master.'"  WHERE `id` = '.mysql_real_escape_string($_GET['id']));
             header('Location: admin.php?view=users');
          } elseif($_GET['action'] == 'delete'){
$id = mysql_real_escape_string($_GET['id']);
        mysql_query('DELETE FROM `members` WHERE `id` = '.$id);
        header('Location: admin.php?view=all');
          }
        }
    }


    if(isset($_GET['view']) && $_GET['view'] == 'products'){
      if(isset($_GET['action']) && $_GET['action'] == 'add'){
        $name = mysql_real_escape_string($_POST['name']);
        $desc = mysql_real_escape_string($_POST['desc']);
        $cate = mysql_real_escape_string($_POST['cate']);
        $price = mysql_real_escape_string($_POST['price']);
        $file ="";
if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
                  }
        mysql_query('INSERT INTO `store` (`name`,`description`,`category`,`price`,`pic`) VALUES ("'.$name.'","'.$desc.'","'.$cate.'","'.$price.'","'.$file.'")');
        header('Location: admin.php?view=products');
      } elseif(isset($_GET['action']) && $_GET['action'] == 'edit'){
        $name = mysql_real_escape_string($_POST['name']);
        $desc = mysql_real_escape_string($_POST['desc']);
        $cate = mysql_real_escape_string($_POST['cate']);
        $price = mysql_real_escape_string($_POST['price']);
        $id = mysql_real_escape_string($_GET['id']);
        if(isset($_FILES['pic']['name']) && $_FILES['pic']['name']){
                    $contents = file_get_contents($_FILES['pic']['tmp_name']);
                    $file = base64_encode($contents);
                  }
        mysql_query('UPDATE `store` SET `name`= "'.$name.'",`description` = "'.$desc.'",`category` = "'.$cate.'",`price` = "'.$price.'", `pic`= "'.mysql_real_escape_string($file).'" WHERE `id_products` = '.$id);
        header('Location: admin.php?view=products');
      } elseif(isset($_GET['action']) && $_GET['action'] == 'delete'){ 
        $id = mysql_real_escape_string($_GET['id']);
        mysql_query('DELETE FROM `store` WHERE `id_products` = '.$id);
        header('Location: admin.php?view=all');
      } else {
        header('Location: admin.php');
      }
    }
  }
?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->                                         
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">

  <!-- Use the .htaccess and remove these lines to avoid edge case issues.
       More info: h5bp.com/b/378 -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>home</title>
 <meta name="description" content="Capoeria is a Brazilian martial art, which give any person a huger benefits " />
 <meta name="keywords" content="capoeria, brazil, sport, martial, art, culture, language, support, " />
 <meta name="author" content="master carlos" />


  <!-- Mobile viewport optimized: j.mp/bplateviewport -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Place favicon.ico and apple-touch-icon.png in the root directory: mathiasbynens.be/notes/touch-icons -->

  <!-- CSS: implied media="all" -->
  <link rel="stylesheet" href="css/960.css"/>
  <link rel="stylesheet" href="css/menu.css"/>
  <link rel="stylesheet" href="css/style.css">


  <!-- More ideas for your <head> here: h5bp.com/docs/#head-Tips -->

  <!-- All JavaScript at the bottom, except for Modernizr and Respond.
       Modernizr enables HTML5 elements & feature detects; Respond is a polyfill for min/max-width CSS3 Media Queries
       For optimal performance, use a custom Modernizr build: www.modernizr.com/download/ -->
  <script src="js/libs/modernizr-2.0.min.js"></script>
  <script src="js/libs/respond.min.js"></script>


</head>

<body>

       <div id="container" class="container_12">
    <header class="grid_12">
      <div id="logo">
         <h1>Associacao de Capoeira Lapinha</h1>
      </div>
      <div class="lavalamp dark">
            <ul>
               <li><a class="active" href="home.php">HOME</a></li>
               <li><a href="classes.php">CLASSES</a></li>
               <li><a href="gallery.php">GALLERY</a></li>
               <li><a href="store.php">STORE</a></li>
               <li><a href="about.php">ABOUT US</a></li>
               <li><a href="contact.php">CONTACT</a></li>
               <?php
                  if($user::is_logged_in() === true){
                  	?>
                  	<li><a href="profile.php">PROFILE</a><li>
                  	<li><a href="logout.php">LOGOUT</a><li>
                  	<?php
                  } else {
                  	?>
                  	<li><a href="login.php">LOGIN</a></li>
              		<li><a href="register.php">REGISTER</a><li>
                  	<?php
                  }
                ?>
            </ul>
         </div>
         <div class="grid_3">
            &nbsp
         </div>
         <div id="banner" class="grid_9"></div>
    </header>
    <div id="main" role="main" >
       <div id="sidebar" class="grid_3">

             <ul class="sidemenu">

                <li><a href="news.php">News</a></li>
                <li><a href="graduation.php">Graduation</a></li>
                <li><a href="history.php">History</a></li>
             </ul>

       </div> <!--! end of #side-menu -->

       <div id="content" class="grid_9" >
         <?php
          if($page == 'all'){
            echo '<h2>What do you want to administrate?</h2>';
            echo '<a href="admin.php?view=products">Products</a><br />';
            echo '<a href="admin.php?view=users">Users</a>';
          } elseif($page == 'products'){
            if(isset($_GET['action']) && $_GET['action'] == 'edit'){
?>
<form action="admin.php?view=products&action=edit&id=<?=$_GET['id'];?>&process" method="post" enctype="multipart/form-data">
<table width="600">
  <tr>
    <th>Image</th>
      <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
     <tr>
      <?php
    $sql = "SELECT * FROM store WHERE `id_products` = ".mysql_real_escape_string($_GET['id'])." ORDER BY name ASC";
    $query = mysql_query($sql);
    $row = mysql_fetch_assoc($query);
    ?>
          <td><input type="file" name="pic"/> 100x100</td>
          <td><input type="text" required name="name" value="<?php echo $row['name']; ?>"/></td>
            <td><input type="text" required name="desc" value="<?php echo $row['description']; ?>"/></td>
            <td><input type="text" required name="cate" value="<?php echo $row['category'];?>"/></td>
            <td>$<input type="text" required name="price" value="<?php echo $row['price']; ?>"/></td>
            <td><input type="submit" value="Update Item" /></td>
            </tr>
</table>
<br /><a href="admin.php?view=products&process&action=delete&id=<?=$_GET['id'];?>">Delete Item</a>
</form>
<?php
            } elseif(isset($_GET['action']) && $_GET['action'] == 'add') {
?>
<form action="admin.php?view=products&action=add&process" method="post" enctype="multipart/form-data">
<table>
  <tr>
      <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
     <tr><td><input type="file" name="pic"/> 100x100</td>
           <td><input type="text" required name="name" /></td>
            <td><input type="text"required  name="desc" /></td>
            <td><input type="text" required name="cate" /></td>
            <td>$<input type="text" required name="price" /></td>
            <td><input type="submit" value="Add Item" /></td>
          </tr>
</table>
</form>
<?php
            } else {
            ?>
            <a href="admin.php?view=products&action=add">Add New Item</a><br />
            <table>
  <tr>
    <th>Image</th>
      <th>Name</th>
        <th>Description</th>
        <th>Category</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
  <?php
    $sql = "SELECT * FROM store ORDER BY name ASC";
    $query = mysql_query($sql);
  
    while($row = mysql_fetch_assoc($query)) {
  ?>
      <tr>
        <td><div style="width:100px;height:100px;overflow:hidden"><img src="data:image/png;base64, <?=$row['pic'];?>"/></div></td>
          <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['category'];?></td>
            <td>$<?php echo $row['price']; ?></td>
            <td><a href="admin.php?view=products&action=edit&id=<?php echo $row['id_products']; ?>">Edit Item</a></td>
            </tr>
      <?php
      }
    ?>
</table>
<?php
}
          } elseif($page == 'users'){ 
         
          if(isset($_GET['action']) && $_GET['action'] == 'add'){
            ?>
            <form action="admin.php?view=users&action=add&process" method="post" enctype="multipart/form-data">
<table>
  <tr>
    <th>Image</th>
      <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
      </tr>
      <tr>

           <td><input type="file" name="pic"/> 100x100</td>
           <td><input type="text" required name="username"/></td>
            <td><input type="text"required  name="firstname"/></td>
            <td><input type="text" required name="lastname"/></td>
      </tr>
      <tr>
        <th>Dob</th>
        <th>Graduation</th>
        <th>Capoeira</th>
        <th>Master</th>
        <th>Action</th>
    </tr>
     <tr>
            <td><input type="date" required name="dob" /></td>
            <td><input type="text" required name="graduation" /></td>
            <td><input type="text" required name="capoeira" /></td>
            <td><input type="text" required name="master" /></td>
            <td><input type="submit" value="Add User" /></td>
          </tr>
</table>
</form>
<?php
          }elseif(isset($_GET['action']) && $_GET['action'] == 'edit'){
?>

<form action="admin.php?view=users&action=edit&process&id=<?=$_GET['id'];?>" method="post" enctype="multipart/form-data">
<table>
  <?php
    $sql = "SELECT * FROM members WHERE `id` = ".mysql_real_escape_string($_GET['id']);
    $query = mysql_query($sql);
    $row = mysql_fetch_assoc($query);
    ?>
  <tr>
    <th>Image</th>
      <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
      </tr>
      <tr>
<td><input type="file" name="pic"/> 100x100</td>
           <td><input type="text" required name="username" value="<?php echo $row['username']; ?>"/></td>
            <td><input type="text"required  name="firstname" value="<?php echo $row['first_name']; ?>"/></td>
            <td><input type="text" required name="lastname" value="<?php echo $row['last_name']; ?>"/></td>
      </tr>

      <tr>
        <th>Dob</th>
        <th>Graduation</th>
        <th>Capoeira</th>
        <th>Master</th>
        <th>Action</th>
    </tr>
    
     <tr>
           
            <td><input type="date" required name="dob" value="<?php echo $row['dob']; ?>"/></td>
            <td><input type="text" required name="graduation" value="<?php echo $row['graduation']; ?>"/></td>
            <td><input type="text" required name="capoeira" value="<?php echo $row['group_name']; ?>"/></td>
            <td><input type="text" required name="master" value="<?php echo $row['master_name']; ?>"/></td>
            <td><input type="submit" value="Edit User" /></td>
          </tr>
</table>
</form>
<br /><a href="admin.php?view=users&process&action=delete&id=<?=$_GET['id'];?>">Delete Users</a>&nbsp;
<?php 
            } else {



         ?>
           <a href="admin.php?view=users&action=add">Add New Users</a><br />
            <table>
  <tr>
    <th>Image</th>
      <th>Username</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Dob</th>
        <th>Graduation</th>
        <th>Capoeira</th>
        <th>Master</th>
        <th>Action</th>
    </tr>
  <?php
    $sql = "SELECT * FROM members";
    $query = mysql_query($sql);
  
    while($row = mysql_fetch_assoc($query)) {
  ?>
      <tr>
        <td><div style="width:100px;height:100px;overflow:hidden"><img src="data:image/png;base64, <?=$row['profile_pic'];?>"/></div></td>
          <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['first_name']; ?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['dob']; ?></td>
            <td><?php echo $row['graduation']; ?></td>
            <td><?php echo $row['group_name']; ?></td>
            <td><?php echo $row['master_name']; ?></td>
            <td><a href="admin.php?view=users&action=edit&id=<?php echo $row['id']; ?>">Edit User</a></td>
            </tr>

      <?php
      }
    ?>
</table>
<?php
          }
        }
          ?>
       </div> <!--! end of #content -->

    </div><!--! end of #main  -->
    <footer class="grid_12">
      <div class="grid_6 alpha"><p>© 2011 Associacao de Capoeira Lapinha/ Website
design by T.Matias</p></div>
    <div id="footer-menu" class="grid_6 omega">
    <ul>
      <li><a href="termsandconditions.php">Terms
&amp; Conditions</a></li>
      <li><a href="about.php">About Us</a></li>
    </ul>
    </div>
    </footer>
  </div> <!--! end of #container -->


  <!-- JavaScript at the bottom for fast page loading -->

  <!-- Grab Google CDN's jQuery, with a protocol relative URL; fall back to local if offline -->
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.6.2.min.js"><\/script>')</script>


  <!-- scripts concatenated and minified via ant build script-->
  <script src="js/plugins.js"></script>
  <script src="js/script.js"></script>
   <!-- end scripts-->


  <!-- mathiasbynens.be/notes/async-analytics-snippet Change UA-XXXXX-X to be your site's ID -->
  <script>
    var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview'],['_trackPageLoadTime']];
    (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
    g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
    s.parentNode.insertBefore(g,s)}(document,'script'));
  </script>


  <!-- Prompt IE 6 users to install Chrome Frame. Remove this if you want to support IE 6.
       chromium.org/developers/how-tos/chrome-frame-getting-started -->
  <!--[if lt IE 7 ]>
    <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
    <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
  <![endif]-->

</body>
</html>