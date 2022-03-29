<header class="header bg-white shadow my-4 px-4">
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
                />
            </div>
            <div class="flex md:hidden">
                <a href="#" class="flex items-center justify-center h-10 w-10 border-transparent">
                </a>
            </div>
        </form>
    </div>
    <div class="my-2 container mx-auto flex items-center">
        <!-- menu -->
        <nav class="">
            <a href="./items">test link</a>
            <ul class="flex space-x-8 justify-between items-baseline text-sm font-bold">
                <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(0, 'cat_name'); ?>>
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(0, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
                <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(1, 'cat_name'); ?>>
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(1, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
                <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(2, 'cat_name'); ?>>
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(2, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
                    <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(3, 'cat_name'); ?> onclick="location.href='./items'">
                            
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(3, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
                <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(4, 'cat_name'); ?>>
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(4, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
                <li class="">
                    <span>
                        <form method='POST'>
                            <input type='submit' name='cat_name' value=<?php SessionMgmt::echoCatDataElement(5, 'cat_name'); ?>>
                            <input type='hidden' name='cat_id' value=<?php SessionMgmt::echoCatDataElement(5, 'cat_id'); ?>>
                        </form>
                    </span>
                </li>
            </ul>
        </nav>
        <a href="" class="ml-auto flex-shrink-0 flex items-center">
            <span class="hidden sm:inline ml-1 font-bold">
                Profile
            </span>
        </a>
    </div>
</header>