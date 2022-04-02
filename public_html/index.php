<?php
  include("../loader.php");
  include ('../config.php');   
  if(isset($BACKEND)){
    include('../backend/'.$BACKEND.'.php');	
  }
  if(isset($HEADER_BACKEND)){
    include('../backend/'.$HEADER_BACKEND.'.php');
  }
  if(isset($ASIDE_BACKEND)){
    include('../backend/'.$ASIDE_BACKEND.'.php');
  }
  if(isset($FOOTER_BACKEND)){
    include('../backend/'.$FOOTER_BACKEND.'.php');
  }
?>
<!doctype html>
<html>
  <?php include_once('head.php');?>
  <head>
    <link rel="stylesheet" href="./css/main.css">
  </head>
  <body class=" ">
  <!--container-->   
  <div class="flex h-screen">
        <div class="bg-gray-800">
          <?php 
            if(isset($ASIDE)){
              include_once("../frontend/".$ASIDE.".php");
            } 
          ?>
        </div>
        <div class="mx-auto md:w-4/5 w-11/12">
        <div class="">
          <?php 
            if(isset($HEADER)){ 
              include_once("../frontend/".$HEADER.".php");
            } 
          ?>
        </div>
        <div class="rounded border-dashed border-2 border-gray-300">
          <?php 
            if(isset($FRONTEND)){	 	  
              include_once('../frontend/'.$FRONTEND.'.php');
            }
          ?>
        </div>
        <div class="bg-gray-800 absolute inset-x-0 bottom-0 ">	  
          <?php 
            if(isset($FOOTER)){
              include_once('../frontend/'.$FOOTER.'.php');
            } 
          ?>
        </div>        
          </div>
      </div>		  
    </div>
  </body>
</html>
