<?php
// require the website config file.
require_once('includes/config.php');

// set the website title & description.
$type = (isset($_GET['type']) && in_array($_GET['type'], array('string', 'hash')) ? $_GET['type'] : false);
if ( $type ) {
   $website['title']       = ucfirst($type) . ' Algorithms';
   $website['description'] = 'Use our ' . $type . ' algorithms on your strings.';
}
else {
   $website['title']       = 'Home';
   $website['description'] = $website['name'] . ' is a free online service providing ' . $website['count'] . ' hash and string algorithms.';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>

      <!-- website meta tags -->
      <meta http-equiv="content-type" content="text/html; charset=utf-8" />
      <title><?php echo $website['title'];?></title>
      <meta name="description" content="<?php echo $website['description'];?>" />

      <!-- website favicons -->
      <link href="<?php echo $website['url'];?>assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
      <link href="<?php echo $website['url'];?>assets/img/favicon.ico" rel="icon" type="image/x-icon" />

      <!-- website stylesheets -->
      <link href="<?php echo $website['url'];?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo $website['url'];?>assets/css/styles.css?t=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
      <link href="https://fonts.googleapis.com/css?family=Lato:400,300,700" rel="stylesheet" type="text/css">
      <!-- website javascript -->
      <script src="<?php echo $website['url'];?>assets/js/javascript.js" type="text/javascript"></script>

   </head>
   <body>

      <?php // include the website header and hero files. ?>
      <?php include_once('includes/html/header.php');?>
      <?php include_once('includes/html/hero.php');?>

      <!-- website main -->
      <div id="main">
         <?php if ( !$type || ($type && $type == 'string') ):?>
            <div id="string" class="section">
               <div class="container">
                  <div class="section-information">
                     <h2>String algorithms</h2>
                  </div>
                  <div class="row">
                     <?php foreach ( $website['algorithms'] as $algorithm ):?>
                        <?php if ( $algorithm['type'] == 'string' ):?>
                           <div class="col-md-4">
                              <a href="<?php echo $algorithm['url'];?>" title="<?php echo $algorithm['name'];?>">
<div class="panel panel-default panel-tool">
  <div class="panel-body">

<?php echo $algorithm['name'];?>
</div></div>
</a>
                           </div>
                        <?php endif;?>
                     <?php endforeach;?>
                  </div>
               </div>
            </div>
         <?php endif;?>
         <?php if ( !$type || ($type && $type == 'hash') ):?>
            <div id="hash" class="section">
               <div class="container">
                  <div class="section-information">
                     <h2>Hash algorithms</h2>
                  </div>
                  <div class="row">
                     <?php foreach ( $website['algorithms'] as $algorithm ):?>
                        <?php if ( $algorithm['type'] == 'hash' ):?>
                           <div class="col-md-4">
                              <a href="<?php echo $algorithm['url'];?>" title="<?php echo $algorithm['name'];?>"><div class="panel panel-default panel-tool">
  <div class="panel-body">

<?php echo $algorithm['name'];?>
</div></div></a>
                           </div>
                        <?php endif;?>
                     <?php endforeach;?>
                  </div>
               </div>
            </div>
         <?php endif;?>
      </div>

      <?php // include the website footer file. ?>
      <?php include_once('includes/html/footer.php');?>

   </body>
</html>