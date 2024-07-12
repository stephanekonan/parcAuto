<div class="flex space-x-3 md:order-2 md:space-x-0 rtl:space-x-reverse">

    <div class="flex px-4 py-2 space-x-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg cursor-pointer focus:ring-2 focus:outline-none focus:ring-blue-300">

        <a href="{{ route('client.login') }}" class="flex items-center hover:text-gray-300">
            <span>Se connecter</span>
        </a>

        <span>/</span>

        <a href="{{ route('client.register') }}" class="flex items-center hover:text-gray-300">
            S'inscrire
        </a>

    </div>

    <button type="button" data-drawer-target="drawer-swipe" data-drawer-show="drawer-swipe" data-drawer-placement="bottom" data-drawer-edge="true" data-drawer-edge-offset="bottom-[60px]" aria-controls="drawer-swipe" class="inline-flex items-center justify-center w-10 h-10 p-2 text-sm text-gray-500 rounded-lg menu-icon md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>

</div>
