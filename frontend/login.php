<script src="https://cdn.jsdelivr.net/gh/mattkingshott/iodine/dist/iodine.min.umd.js" defer></script>

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
  <p>You have logged in.</p>
  <p>Loading...<?php header('Refresh: 0;');?></p>
</div>
</div>
<?php endif; ?>
            <div class="mb-4" x-data="{ email: '<?php echo $emailoruser ? $emailoruser: ""?>' }">
              <label
                class="block text-gray-700 text-sm font-normal mb-2"
                for="email"
              >
                Email
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
				x-model="email"
                type="text" id="emailoruser" name="login_emailoruser" value="<?php echo $emailoruser ? $emailoruser: ""?>" 
                <?php echo $emailoruser ? "": "autofocus"?>
                placeholder="Email"
              />
			<span x-show="email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/) == null && email !== ''" class="text-xs text-red-700" id="emailHelp" x-transition.opacity>
			Not a valid email.
			</span>
			<span x-show="email.match(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/)" class="text-xs text-green-700" id="emailHelp" x-transition.opacity>
			Email is valid.
			</span>			
            </div>
            <div class="mb-6">
              <label
                class="block text-gray-700 text-sm font-normal mb-2"
                for="password"
              >
                Password
              </label>
              <input
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                type="password" id="password" name="login_password" value="" 
                placeholder="Password"
                name="password"
                required
                <?php echo $emailoruser ? "autofocus": ""?>				
                autocomplete="current-password"
              />
              <input type="hidden" name="form_type" value="user_login">
            </div>
            <div class="flex flex-row-reverse items-center justify-between">
              
              <button class="px-4 py-2 rounded text-white inline-block shadow-lg bg-gray-800 hover:bg-gray-900 focus:bg-gray-700" type="submit" name="login">Sign In</button>
              <a
                class="inline-block align-baseline font-normal text-sm text-gray-500 hover:text-blue-800"
                href="./reset"
              >
                Forgot Password?
              </a>
            </div>
          </form>
		  <div class="text-center text-gray-500">
		  Don't have an account? <a href="./register" class="hover:text-gray-800 font-bold">Sign up</a>
        </div>
      </div>