<header class="header bg-white  my-4  pt-2 ">
    <div class="header-content items-center flex-row">
        <form action="#">
            <div class="hidden md:flex relative">
                <div class="inline-flex items-center justify-center absolute left-0 top-0 h-full w-10 text-gray-400">
                    <svg
                        class="h-6 w-6"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                    <path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </div>
                <input
                    id="search"
                    type="text"
                    name="search"
                    class="text-sm sm:text-base placeholder-gray-500 pl-10 pr-4 rounded-lg border border-gray-300 w-full h-10 focus:outline-none focus:border-indigo-400"
                    placeholder="Search..."
                    onkeyup="performSearch(this, event);"
                />
            </div>
            <div class="flex md:hidden">
                <a href="#" class="flex items-center justify-center h-10 w-10 border-transparent">
                </a>
            </div>
        </form>
    </div>
    <div class="container mx-auto flex m-2  items-center">
        <!-- menu
        <nav class="">
            <ul class="flex space-x-8 justify-between items-baseline text-sm font-bold">
                php drawHeaderLinks($category_data); 
            </ul>
        </nav>-->
            <ul class="flex space-x-8 justify-between items-baseline text-sm font-bold">
            <?php echo $PAGE_TITLE;  ?>
			</ul>
		
		<?php if(User::isLoggedin()): ?>
        <a href="" class="ml-auto flex-shrink-0 flex items-center">
            <span class="hidden sm:inline ml-1 font-bold">
                Profile
            </span>
        </a>
		<?php endif;?>
    </div>
</header>