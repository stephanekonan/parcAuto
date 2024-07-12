<div class="flex items-center lg:order-2">

    <button type="button" data-dropdown-toggle="language-dropdown"
        class="inline-flex justify-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100">
        <svg class="h-5 w-5 rounded-full mt-0.5" xmlns="http://www.w3.org/2000/svg"
            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
            <path fill="#b22234" d="M0 0h7410v3900H0z" />
            <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff" stroke-width="300" />
            <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
            <g fill="#fff">
                <g id="d">
                    <g id="c">
                        <g id="e">
                            <g id="b">
                                <path id="a"
                                    d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                <use xlink:href="#a" y="420" />
                                <use xlink:href="#a" y="840" />
                                <use xlink:href="#a" y="1260" />
                            </g>
                            <use xlink:href="#a" y="1680" />
                        </g>
                        <use xlink:href="#b" x="247" y="210" />
                    </g>
                    <use xlink:href="#c" x="494" />
                </g>
                <use xlink:href="#d" x="988" />
                <use xlink:href="#c" x="1976" />
                <use xlink:href="#e" x="2470" />
            </g>
        </svg>
    </button>
    <!-- Notifications -->
    <button type="button" data-dropdown-toggle="notification-dropdown"
        class="p-2 mr-1 text-gray-500 rounded-lg hover:text-gray-900 hover:bg-gray-100">
        <span class="sr-only">View notifications</span>
        <!-- Bell icon -->
        <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path
                d="M10 2a6 6 0 00-6 6v3.586l-.707.707A1 1 0 004 14h12a1 1 0 00.707-1.707L16 11.586V8a6 6 0 00-6-6zM10 18a3 3 0 01-3-3h6a3 3 0 01-3 3z">
            </path>
        </svg>
    </button>
    <!-- Dropdown menu -->
    <div class="z-50 hidden max-w-sm my-4 overflow-hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow-lg"
        id="notification-dropdown">
        <div class="block px-4 py-2 text-base font-medium text-center text-gray-700 bg-gray-50">
            Notifications
        </div>
        <div>
            <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100">
                <div class="flex-shrink-0">
                    <img class="rounded-full w-11 h-11"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png"
                        alt="Bonnie Green avatar" />
                    <div
                        class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 border border-white rounded-full bg-primary-700">
                        <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
                            </path>
                            <path
                                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
                            </path>
                        </svg>
                    </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5">
                        New message from
                        <span class="font-semibold text-gray-900">Bonnie Green</span>: "Hey, what's up? All set for the
                        presentation?"
                    </div>
                    <div class="text-xs font-medium text-primary-600">
                        a few moments ago
                    </div>
                </div>
            </a>
            <a href="#" class="flex px-4 py-3 border-b hover:bg-gray-100">
                <div class="flex-shrink-0">
                    <img class="rounded-full w-11 h-11"
                        src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/joseph-mcfall.png"
                        alt="Joseph McFall avatar" />
                    <div
                        class="absolute flex items-center justify-center w-5 h-5 ml-6 -mt-5 bg-red-600 border border-white rounded-full">
                        <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                </div>
                <div class="w-full pl-3">
                    <div class="text-gray-500 font-normal text-sm mb-1.5">
                        <span class="font-semibold text-gray-900">Joseph Mcfall</span>
                        and
                        <span class="font-medium text-gray-900">141 others</span>
                        love your story. See it and view more stories.
                    </div>
                    <div class="text-xs font-medium text-primary-600">
                        44 minutes ago
                    </div>
                </div>

        </div>
        <a href="#" class="block py-2 font-medium text-center text-gray-900 text-md bg-gray-50 hover:bg-gray-100">
            <div class="inline-flex items-center">
                <svg aria-hidden="true" class="w-4 h-4 mr-2 text-gray-500" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                    <path fill-rule="evenodd"
                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                        clip-rule="evenodd"></path>
                </svg>
                View all
            </div>
        </a>
    </div>

    <!-- Apps -->
    <button type="button" data-modal-target="menu-modal" data-modal-toggle="menu-modal"
        class="p-2 text-gray-500 rounded-lg md:hidden hover:text-gray-900 hover:bg-gray-100 dark:hover:text-white dark:hover:bg-gray-700 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600">
        <span class="sr-only"></span>
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
            </path>
        </svg>
    </button>

    <button type="button"
        class="flex mx-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
        id="user-menu-button" aria-expanded="false" data-dropdown-toggle="dropdown">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full"
            src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gough.png" alt="user photo" />
    </button>
    <!-- Dropdown menu -->
    <div class="z-50 hidden w-56 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
        id="dropdown">
        <x-profile />
    </div>

</div>


<div id="menu-modal" tabindex="-1" aria-hidden="true"
    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full p-4">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                <button type="button"
                    class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto"
                    data-modal-toggle="select-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <div class="p-4 space-y-5 md:p-5">
                <x-gerantsidebar />
                <x-logout />
            </div>
        </div>
    </div>
</div>
