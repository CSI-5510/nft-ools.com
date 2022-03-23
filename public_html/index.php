<?php
  include("../loader.php");
  include ('../config.php');   
  if(isset($BACKEND)){
    include('../backend/'.$BACKEND.'.php');	
  }
?>
<!doctype html>
<html>
  <?php include_once('head.php');?>
  <head>
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body class="w-full max-w-8xl mx-auto">
      <div class="grid grid-rows-5 grid-cols-7 gap-2">
        <div class="row-span-5 col-span-1">
          <?php 
            if(isset($ASIDE)){
              include_once("../frontend/".$ASIDE.".php");
            } 
          ?>
        </div>
        <div class="row-span-1 col-span-6">
          <?php 
            if(isset($HEADER)){ 
              include_once("../frontend/".$HEADER.".php");
            } 
          ?>
        </div>
        <div class="row-span-3 col-span-6">
          <?php 
            if(isset($FRONTEND)){	 	  
              include_once('../frontend/'.$FRONTEND.'.php');
            }
          ?>
        </div>
        <div class="row-span-1 col-span-6">	  
          <?php 
            if(isset($FOOTER)){
              include_once('../frontend/'.$FOOTER.'.php');
            } 
          ?>
        </div>
      </div>		  
    </div>
  </body>
</html>
