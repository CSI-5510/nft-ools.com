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
  <body class="flex w-full max-w-8xl mx-auto">
  <!--container-->   
  <div class="bg-green-400">
        <div class="flex bg-blue-200">
          <?php 
            if(isset($ASIDE)){
              include_once("../frontend/".$ASIDE.".php");
            } 
          ?>
        </div>
        <div class=" ">
          <?php 
            if(isset($HEADER)){ 
              include_once("../frontend/".$HEADER.".php");
            } 
          ?>
        </div>
        <div class="bg-red-500">
          <?php 
            if(isset($FRONTEND)){	 	  
              include_once('../frontend/'.$FRONTEND.'.php');
            }
          ?>
        </div>
        <div class="">	  
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
