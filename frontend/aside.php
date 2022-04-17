<?php 
   include('../functions/functions.aside.php'); 
?>

<aside class="w-64">
   <div class="sidebar-content px-4 py-6">
   <ul class="flex flex-col relative h-screen w-full space-y-2">
      <li class="my-px">
         <a href="<?php echo $GLOBALS['config']['url_root'];echo"/";echo $GLOBALS["url_loc"][0]; ?>" class="flex flex-row items-center h-10 px-3 rounded-lg text-gray-700 hover:bg-gray-700">
            <span class="flex items-center justify-center text-lg text-gray-400">
               <svg
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  class="h-6 w-6"
                  >
                  <path d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
               </svg>
            </span>
           <div class="<?php echo $GLOBALS["url_loc"][1] ? "ml-3 text-gray-500" : "ml-3 text-gray-500 border-b-2 border-red-400";?>">
		   Home
		   </div>
         </a>
      </li>
	  

	   <ul
         x-data="{categoryCollapse: localStorage.getItem('collapseCat') === 'true'}"
         x-init="$watch('categoryCollapse', val => localStorage.setItem('collapseCat', JSON.stringify(val)))"
         x-bind:class="{ 'collapseCat': categoryCollapse }"
      >  
         <li class="flex">
            <button x-on:click="categoryCollapse = !categoryCollapse" class="flex w-full flex-row items-center h-10 pl-3 rounded-lg text-gray-600 cursor-pointer transition hover:bg-gray-700 my-2">
               <span class="text-gray-400">
                  <svg
                     fill="none"
                     stroke-linecap="round"
                     stroke-linejoin="round"
                     stroke-width="2"
                     viewBox="0 0 24 24"
                     stroke="currentColor"
                     class="h-6 w-6"
                     >
                     <path d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"/>
                  </svg>
               </span>
            <div class="<?php echo $GLOBALS["url_loc"][1] !== "category" ? "ml-3 text-gray-500" : "ml-3 text-gray-500 border-b-2 border-red-400";?>">
               Category
            </div>
               <div class="flex w-full justify-end">
                  <svg :class="{ 'rotate-180': categoryCollapse }" class=" inline-block text-gray-500 w-4 h-4 m-2 transition-transform transform rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="https://www.w3.org/2000/svg">
                     <path d="M19 9l-7 7-7-7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                  </svg> 
               </div>
            </button>
         </li>
         <div x-show="categoryCollapse" x-transition.opacity>
            <?php foreach ($category_list as $category): ?>
               <li class="my-px space-y-2">
                  <a href="<?php echo $GLOBALS['config']['url_root'];echo"/";echo $GLOBALS["url_loc"][0]; ?>/category/<?php echo $category["cat_id"]; ?>" class="<?php echo $GLOBALS["url_loc"][2] === $category["cat_id"] ? "flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 transition hover:bg-gray-300 hover:text-gray-300" : "flex flex-row items-center h-10 px-3 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition ";?>">
                     <span class="ml-3 text-gray-500">
                        <?php echo $category["cat_name"]; ?>
                     </span>
                  </a>
               </li>
            <?php endforeach; ?>
         </div>
      </ul>


      <?php 
         showAsideAddItem(USER_ID);
      ?>


	  
      <li class="my-px">
         <span class="flex font-medium text-sm text-gray-300 px-4 my-4 uppercase">Account</span>
      </li>
      <li class="my-px space-y-2">
         <a href="<?php echo $GLOBALS['config']['url_root'];echo"/";echo $GLOBALS["url_loc"][0]; ?>/<?php echo User::isLoggedin() ? "profile" : "register"; ?>" class="<?php echo $GLOBALS["url_loc"][1] !== "register" ? AC3_CLASS_OTHER : AC3_CLASS_REGISTER; ?>">
         <span class="flex items-center justify-center text-lg text-red-400">
            <svg
               fill="none"
               stroke-linecap="round"
               stroke-linejoin="round"
               stroke-width="2"
               viewBox="0 0 24 24"
               stroke="currentColor"
               class="h-6 w-6"
               >
               <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
            </svg>
         </span>
         <span class="ml-3 text-gray-500">
               <?php 
                  if (User::isLoggedin()) {
                     echo "Profile";
                  } else {
                     echo "Register";
                  } 
               ?>			
            <a href="<?php echo $GLOBALS['config']['url_root'];echo"/";echo $GLOBALS["url_loc"][0]; ?>/<?php echo User::isLoggedin() ? "logout" : "login"; ?>" class="<?php echo $GLOBALS["url_loc"][1] !== "login" ? "flex flex-row items-center h-10 px-3 rounded-lg text-gray-300 hover:bg-gray-100 hover:text-gray-700 transition" : "flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 hover:bg-gray-100 hover:text-gray-700 "; ?>">
            <span class="flex items-center justify-center text-lg text-red-400">
               <svg
                  fill="none"
                  stroke-linecap="round"
                  stroke-linejoin="round"
                  stroke-width="2"
                  viewBox="0 0 24 24"
                  stroke="currentColor"
                  class="h-6 w-6"
               >
                  <path d="M8 11V7a4 4 0 118 0m-4 8v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2z"/>
               </svg>
               </span>
               <span class="ml-3 text-gray-500">
                  <?php 
                     if(User::isLoggedin()){
                        echo "Logout";
                     }else{
                        echo "Login";
                     } 
                  ?>
               </span>
            </a>
         </span>
         </a>				
      </li>   	  
	  
	  
      <?php if (User::isLoggedin()): ?>
         <li class="my-px">
            <a href="./orders" class="<?php echo $GLOBALS["url_loc"][1] !==
            "checkout"
               ? "flex flex-row items-center h-10 px-3 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition"
               : "flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 hover:bg-gray-100 hover:text-gray-700"; ?>">
               <span class="flex items-center justify-center text-lg text-gray-400">
                  <svg 
                     xmlns="http://www.w3.org/2000/svg" 
                     class="h-6 w-6" fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor" 
                     stroke-width="2"
                     >
                     <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
               </span>
               <span class="ml-3">
               Orders
               </span>
               <span class="flex items-center justify-center text-xs text-red-500 font-semibold bg-red-100 h-6 px-2 rounded-full ml-auto">
                  <?php echo Order::getUsersOrdersCount(); ?>
               </span>
            </a>
         </li>  
     <?php endif; ?>  
	  

      <?php if (User::isLoggedin()): ?>
         <li class="absolute inset-x-0 bottom-0 h-16">
            <a href="./admin" class="<?php echo $GLOBALS["url_loc"][1] !== "admin" ? "flex flex-row items-center h-10 px-3 rounded-lg text-gray-500 hover:bg-gray-100 hover:text-gray-700 transition" : "flex flex-row items-center h-10 px-3 rounded-lg text-gray-600 bg-gray-100 hover:bg-gray-100 hover:text-gray-700"; ?>">
               <span class="flex items-center justify-center text-lg text-gray-400">
                  <svg 
                     xmlns="http://www.w3.org/2000/svg" 
                     class="h-6 w-6" fill="none" 
                     viewBox="0 0 24 24" 
                     stroke="currentColor" 
                     stroke-width="2"
                  >
                     <path stroke-linecap="round" stroke-linejoin="round" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
               </span>
               <span class="ml-3">
                  Admin
               </span>
            </a>
         </li>	
      <?php endif; ?>
   	
   </ul>


</aside>