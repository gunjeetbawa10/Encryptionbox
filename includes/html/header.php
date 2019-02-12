<!-- website header -->
<nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo $website['url'];?>"><img src="<?php echo $website['url'];?>/assets/img/logo.png" alt="<?php echo $website['name'];?>" /></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
           <li <?php if ((isset($type) && $type =='string') || (isset($algorithm['type']) && $algorithm['type'] == 'string')) {echo 'class="active"';}?>>
            <a href="<?php echo $website['url'];?>string-algorithms">String algorithms</a>
         </li>
         <li <?php if ((isset($type) && $type =='hash') || (isset($algorithm['type']) && $algorithm['type'] == 'hash')) {echo 'class="active"';}?>>
            <a href="<?php echo $website['url'];?>hash-algorithms">Hash algorithms</a>
         </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>