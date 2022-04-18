<html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title> Title </title>
</head>
<body>
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/styles/tailwind.css">
<link rel="stylesheet" href="https://demos.creative-tim.com/notus-js/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">


<section class="relative  bg-blueGray-50">
    <div class="relative pt-16 pb-32 flex  items-center justify-center min-h-screen-75">
        <div class="absolute top-0 w-full h-full bg-center bg-cover" style="
            background-image: url('./css/images/landing-page.jpg');
          ">
          <span id="blackOverlay" class="w-full h-full absolute opacity-75 bg-black"></span>

          <header class="flex flex-col sm:flex-row items-center justify-between py-6 relative">
            <div class="absolute left-20 top-15 h-16 w-16">
              <h2 style="text-align:left" class="text-lg text-yellow-500 font-semibold text-4xl">NFTools</h2>
            </div>
            <div class="absolute right-40 top-25 h-60 w-100">
              <nav class="hidden md:flex text-lg">
                  <a href="<?php echo URL_HOME.'/'.URL_CAROUSEL ?>" class="text-white hover:text-purple-400 py-3 px-6">Home</a>
                  <a href="<?php echo URL_HOME.'/'.URL_ABOUT_US ?>" class="text-white hover:text-purple-400 py-3 px-6">About Us</a>
                  <a href="<?php echo URL_HOME.'/'.URL_LOGIN ?>" class="text-white hover:text-purple-400 py-3 px-6 ">Login/ Register</a>
              </nav>
            </div>
              <button class="flex md:hidden flex-col absolute top-0 right-0 p-4 mt-5">
                  <span class="w-5 h-px mb-1 bg-orange-500"></span>
                  <span class="w-5 h-px mb-1 bg-orange-500"></span>
                  <span class="w-5 h-px mb-1 bg-orange-500"></span>
              </button>
            </header>
          
        </div>
        <div class="container relative mx-auto">
          <div class="items-center flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4 ml-auto mr-auto text-center">
              <div class="pr-12">
                <h1 class="text-white font-semibold text-5xl">
                  Your tools exchange starts with us.
                </h1>
                <p class="mt-4 text-lg text-blueGray-200">
                  This is a platform where users can resell tools at close to purchase price along with the ability to visualize tool lineage history
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px" style="transform: translateZ(0px)">
          <svg class="absolute bottom-0 overflow-hidden" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="none" version="1.1" viewBox="0 0 2560 100" x="0" y="0">
            <polygon class="text-blueGray-200 fill-current" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </div>
      <section class="pb-10 bg-blueGray-200 -mt-24">
        <div class="container mx-auto px-4">
          <div class="flex flex-wrap">
            <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-red-400">
                    <i class="fas fa-award"></i>
                  </div>
                  <h6 class="text-xl font-semibold">A Unique Peer-To-Peer Platform for Tool Exchange</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Get rid of your used or old tools and sell it at a price closer to original price.
                    Publish item details and necessary documentation to help you get started as a seller and purchase any available item at a much cheaper rate.
                  </p>
                </div>
              </div>
            </div>
            <div class="w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-lightBlue-400">
                    <i class="fas fa-retweet"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Tool Lineage History</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Keep you user engaged by providing meaningful information regarding the tool lineage history graph.
                    Remember that by this time, the user is curious.
                  </p>
                </div>
              </div>
            </div>
            <div class="pt-6 w-full md:w-4/12 px-4 text-center">
              <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-8 shadow-lg rounded-lg">
                <div class="px-4 py-5 flex-auto">
                  <div class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-400">
                    <i class="fas fa-fingerprint"></i>
                  </div>
                  <h6 class="text-xl font-semibold">Verified Platform</h6>
                  <p class="mt-2 mb-4 text-blueGray-500">
                    Every tool sold on this platform is verified by our admin and provide assurance of tool quality via tracking lineage.
                    Provides payment system for peer to peer payments

                  </p>
                </div>
              </div>
            </div>
          </div>
           <footer class="relative  pt-8 pb-6 mt-1">
  <div class="container mx-auto px-4">
    <div class="flex flex-wrap items-center md:justify-between justify-center">
      <div class="w-full md:w-6/12 px-4 mx-auto text-center">
        <div class="text-sm text-blueGray-500 font-semibold py-1">
          Copyright <a href="https://www.creative-tim.com/product/notus-js" class="text-blueGray-500 hover:text-gray-800" target="_blank"> NFTools</a> <a href="https://www.creative-tim.com" class="text-blueGray-500 hover:text-blueGray-800" target="_blank"> CSI 5510 @2022</a>.
        </div>
      </div>
    </div>
  </div>
</footer>
      </section>
      </section>

</body>
</html>
</html>
