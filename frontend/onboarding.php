
<main class="bg-white p-2">
        <section>
		<div class="pb-8">


<?php if($userwarning == 0): ?>
			<div class="pt-8">	
           <div class="bg-yellow-200 border-l-4 border-yellow-300 text-yellow-800 p-4">
  <p class="font-bold">Welcome...</p>
  <p>Please setup your profile.</p>
</div>
</div>
<?php endif; ?>

<?php if($success === true): ?>
			<div class="pt-8">	
           <div class="bg-green-200 border-l-4 border-green-300 text-green-800 p-4">
  <p class="font-bold">Success!</p>
  <p>You have set your details.</p>
  <p>Loading...<?php header('Refresh: 1; URL=./home');?></p>
</div>
</div>				
<?php endif; ?>
        </section>
		<?php if($success == 0): ?>		
        <section>	
		<?php
/*Call our notification handling*/ include("../frontend/sitenotif.php");
?>
<form method="POST" class="p-2">
                <div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">First name</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="fname" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="John" value="<?php echo $fname;?>">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Last name</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-account-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="lname" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Smith" value="<?php echo $lname;?>">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Username</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-email-outline text-gray-400 text-lg"></i></div>
                                <input type="username" name="username" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="joemama123" value="<?php echo $username;?>">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Address</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-location-enter text-gray-400 text-lg"></i></div>
                                <input type="text" name="address" id="pac-input" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="123 Seseme Street" value="<?php echo $address;?>">
                            </div>
                        </div>
                    </div>					
                    <div class="flex -mx-3">
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">City</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-school-outline text-gray-400 text-lg"></i></div>
                                <input type="text" name="city" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="Rochester" value="<?php echo $city;?>">
                            </div>
                        </div>
                        <div class="w-1/2 px-3 mb-5">
                            <label for="" class="text-xs font-semibold px-1">Zip Code</label>
                            <div class="flex">
                                <div class="w-10 z-10 pl-1 text-center pointer-events-none flex items-center justify-center"><i class="mdi mdi-gender-male-female-variant text-gray-400 text-lg"></i></div>
                                <input type="text" name="zipcode" id="pac-input" class="w-full -ml-10 pl-10 pr-3 py-2 rounded-lg border-2 border-gray-200 outline-none focus:border-indigo-500" placeholder="41238" value="<?php echo $zipcode;?>">
                            </div>
                        </div>
                    </div>
                    <div class="flex -mx-3  pb-20">
                        <div class="w-full px-3 mb-2">
						
                            <input type="submit" class="cursor-pointer block w-full max-w-xs mx-auto bg-indigo-500 hover:bg-indigo-700 transition focus:bg-indigo-700 text-white rounded-lg px-3 py-3 font-semibold">
							</input>

</div>							
                        </div>
                    </div>
                </form>
			<br>
			<hr>			
			<section>
                <div class="flex flex-col max-w-lg mx-auto text-center my-4">

                <a href="./logout" class="border border-gray-600 bg-white hover:bg-gray-100 hover:border-gray-300 hover:text-gray-400 text-gray-500 font-bold py-2 focus:outline-none rounded shadow-sm hover:shadow-md transition duration-200">Log Out</a>
                </div>
			</section>		
        </section>
			<?php endif; ?>	
    </main>
