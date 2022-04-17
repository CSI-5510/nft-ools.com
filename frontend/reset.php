<div class="bg-white max-w-md mx-auto p-8 md:p-12 md:my-10 ">
        <section>
		<div class="pb-8">
            <h3 class="font-bold text-2xl text-center">Reset your password</h3>
<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
<?php if(isset($success)): ?>
			<div class="pt-8">	
           <div class="bg-gray-200 border-l-4 border-gray-300 text-gray-800 p-4">
  <p class="font-bold">Email sent!</p>
  <p>Please follow the instructions to finish recovery.</p>
  <a href="./redeem"><p>Redeem PAGE HERE.</p></a>
  <p class="break-words"> <?php echo $token; ?></p>
</div>
</div>
<?php endif; ?>
</div>
        </section>
        <section>
            <form class="flex flex-col" name="resetpassword" method="POST">
                <div class="mb-6 rounded">
                    <label class="block text-gray-400 text-small font-bold mb-2 ml-3" for="signup_email">Email</label>
                    <input type="email" name="email" aria-describedby="emailReset"  value="<?php echo htmlspecialchars($_POST['signup_email'], ENT_QUOTES); ?>"
                           class="w-full text-gray-700 focus:outline-none border-b-4 border-gray-200 focus:border-gray-600 transition duration-500 px-3 pb-3" />
                </div>
                <input type="hidden" name="form_type" value="new_user"/>	
				<div class="g-recaptcha mb-6 mx-auto " data-sitekey="" 
                        data-callback='onSubmit' 
                        data-action='submit'></div>	        
                <button type="submit" name="resetpassword" value="Reset Password" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 focus:outline-none rounded shadow-md hover:shadow-xl transition duration-200">Send Email</button>
            </form>
        </section>			
                <br>
                <hr>
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
                    <p class="text-gray-600 mb-6 font-bold">Already have a token?<a href="./redeem" class="font-normal text-gray-500 pl-2 hover:text-gray-700 hover:underline underline-none ml-1">Redeem</a></p>
                <a href="./login" class="border border-gray-600 bg-white hover:bg-gray-100 hover:border-gray-300 hover:text-gray-200 text-gray-500 font-bold py-2 focus:outline-none rounded shadow-sm  transition duration-200">Go back</a>
                </div>
			</section>
    </div>	
