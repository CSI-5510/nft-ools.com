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
    <p>Loading...<?php header("location:./login");?></p>
</div>
</div>
<?php endif; ?>
            <div class="mb-4" x-data="{ username: '' }">
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
			<span x-show="username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null && username !== ''" class="text-xs text-red-700" id="emailHelp" x-transition.opacity>
			Not a valid email.
			</span>
			<span x-show="username.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)" class="text-xs text-green-700" id="emailHelp"  x-transition.opacity>
			Email is valid.
			</span>					  
            </div>
            <div class="mb-6" x-data="{ password: '' }">
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
                type="password"
                placeholder="Password"
				type="password" id="password" autocomplete="off" name="signup_password" 
                autocomplete="current-password"
              />
			<span x-show="password !== '' && password.length < 6 || password.length > 60" class="text-xs text-red-700" id="passwordHelp" x-transition.opacity>
			Password is either too short or too long!
			</span>
			<span x-show="password.length >= 6 && password.length <= 60" class="text-xs text-green-700" id="passwordHelp" x-transition.opacity>
			Password is valid
			</span>  
            </div>
            <div class="flex flex-row-reverse items-center justify-between">
              <button name="createaccount" class="px-4 py-2 rounded text-white inline-block shadow-lg bg-gray-800 hover:bg-gray-900 focus:bg-gray-700" type="submit">Sign Up</button>
 
            </div>
          </form>
		  <div class="text-center text-gray-500">
		  Already have an account? <a href="./login" class="hover:text-gray-800 font-bold">Sign In</a>
        </div>
      </div>