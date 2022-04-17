<div class="flex items-center justify-center">
        <div class="w-full max-w-md">
		<div class="my-4">
		          <?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
</div>		
          <form class="bg-white  rounded px-12 pt-6 pb-8 mb-4" method="POST">
<?php if(isset($success)): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>Your account has been registered.</p>
    <p>Loading...<?php header("Refresh:1; url=./login", true, 303);?></p>
</div>
</div>
<?php endif; ?>
<div x-data="{username: '',password: '',password_confirm:''}">
            <div class="mb-4">
              <label
                class="block text-gray-700 text-sm font-normal mb-2"
                for="username"
              >
                Email
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				x-model="username"
 name="signup_email" aria-describedby="emailHelp"  value="<?php echo htmlspecialchars($_POST['signup_email'], ENT_QUOTES); ?>"
                autofocus
                placeholder="Email"
              />				  
            </div>	
            <div class="">
              <label
                class="block text-gray-700 text-sm font-normal mb-2"
                for="password"
              >
                Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.password"
				x-model="password"				
                placeholder="Password"
				type="password" id="password" autocomplete="off" name="signup_password" 
                autocomplete="current-password"
              />
            </div>
            <div class="mb-6">
              <label
                class="block text-gray-700 text-sm font-normal mb-2"
                for="password"
              >
                Confirm password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                v-model="form.password_confirm"
				x-model="password_confirm"				
				placeholder="Confirm Password"
				type="password" id="password" autocomplete="off" name="password_confirm" 
 
              />
            </div>				
			                            <div class="flex justify-start mt-3 ml-4 p-1">
                                <ul>
<li class="flex items-center py-1">
                                        <div :class="{'bg-green-200 text-green-700': username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/), 'bg-red-200 text-red-700':username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null && username !== '' || username.length == 0 }" class="rounded-full p-1 fill-current bg-red-200 text-red-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path x-show="username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" style="display: none;"></path>
                                                <path x-show="username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null && username !== '' || username.length <1" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

                                            </svg>
                                        </div>
                                        <span :class="{'text-green-700': username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/), 'text-red-700':username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null && username !== '' || username.length <1}" class="font-medium text-sm ml-3 text-red-700" x-text="username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) ? 'Email is valid' : 'Not a valid email' ">Not a valid email</span>
                                    </li>
<li class="flex items-center py-1">
                                        <div :class="{'bg-green-200 text-green-700': password.length > 7, 'bg-red-200 text-red-700':password.length <= 7 }" class="rounded-full p-1 fill-current bg-red-200 text-red-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path x-show="password.length > 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" style="display: none;"></path>
                                                <path x-show="password.length <= 7" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

                                            </svg>
                                        </div>
                                        <span :class="{'text-green-700': password.length > 7, 'text-red-700':password.length < 7 }" class="font-medium text-sm ml-3 text-red-700" x-text="password.length > 7 ? 'The minimum length is reached' : 'At least 8 characters required' ">At least 8 characters required</span>
                                    </li>
									
<li class="flex items-center py-1">
                                        <div :class="{'bg-green-200 text-green-700': password == password_confirm &amp;&amp; password.length > 0, 'bg-red-200 text-red-700':password != password_confirm || password.length == 0}" class="rounded-full p-1 fill-current bg-red-200 text-red-700">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path x-show="password == password_confirm &amp;&amp; password.length > 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" style="display: none;"></path>
                                                <path x-show="password != password_confirm || password.length == 0" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>

                                            </svg>
                                        </div>
                                        <span :class="{'text-green-700': password == password_confirm &amp;&amp; password.length > 0, 'text-red-700':password != password_confirm || password.length == 0}" class="font-medium text-sm ml-3 text-red-700" x-text="password == password_confirm &amp;&amp; password.length > 0 ? 'Passwords match' : 'Passwords do not match' ">Passwords do not match</span>
                                    </li>								
                                </ul>
                            </div>
							
            <div class="flex flex-row-reverse items-center justify-between">
              <button name="createaccount" :class="{'bg-gray-800': password == password_confirm && password.length > 7}" class="px-4 py-2 rounded text-white inline-block shadow-lg bg-gray-300 hover:bg-gray-900 focus:bg-gray-700" type="submit">Sign Up</button>
 
            </div>
			
			</div>
			

          </form>
		  <div class="text-center text-gray-500">
		  Already have an account? <a href="./login" class="hover:text-gray-800 font-bold">Sign In</a>
        </div>
      </div>