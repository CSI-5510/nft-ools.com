<div class=" md:block body-bg min-h-screen pt-12 md:pt-20 pb-6 ox-2 md:px-0" style="font-family:'Lato', sans-serif;">

    <header class="max-w-lg mx-auto">
        <div class="text-6xl">
            <h1 class="font-semibold text-yellow-500 text-center">NFT-ools Login</h1>
        </div>

    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg lg:shadow-2xl md:shadow-lg sm:shadow-sm">
        <section>
            <h3 class="font-bold text-2xl pb-8 text-center">Please enter your Username and Password to continue.</h3>

        </section>
        <section class="">
            <form class="flex flex-col" method="POST" action="../backend/login.php">
                <div class="w-full h-screen flex">
                    <div class="bg-white flex flex-col justify-center items-center w-5/12 shadow-lg">
                        <h1 class="text-3xl font-bold text-orange-500 mb-2">LOGIN</h1>
                        <div class="w-1/2 text-center">
                            <input type="text" name="username" placeholder="username" autocomplete="off"
                                   class="shadow-md border w-full h-10 px-3 py-2 text-orange-500 focus:outline-none focus:border-orange-500 mb-3 rounded">
                            <input type="password" name="password" placeholder="password" autocomplete="off"
                                   class="shadow-md border w-full h-10 px-3 py-2 text-orange-500 focus:outline-none focus:border-orange-500 mb-3 rounded">
                            <button class="bg-orange-500 hover:bg-orange-600 text-white px-3 py-1 rounded text-lg focus:outline-none shadow">Sign In</button>
                        </div>
                    </div>
                </div>
            </form>
                <br />
                <hr />
                <div class="flex flex-col max-w-lg mx-auto text-center mt-12">
                    <a href="./signup" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 focus:outline-none rounded shadow-lg hover:shadow-xl transition duration-200">Create An Account</a>
                </div>

        </section>
    </main>


</div>