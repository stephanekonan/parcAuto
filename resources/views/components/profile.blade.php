{{-- @if (auth('employe')->check())
    <div class="px-4 py-3">

        <span class="block text-sm font-semibold text-gray-900 dark:text-white">
            {{ auth('employe')->user()->employe_name }}
        </span>
        <span class="block text-sm text-gray-900 truncate dark:text-white">
            {{ auth('employe')->user()->employe_email }}
        </span>

    </div>

    <ul
        class="py-1 text-gray-700 dark:text-gray-300"
        aria-labelledby="dropdown"
    >
        <li>
        <a
            href="#"
            class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
            >{{ auth('employe')->user()->employe_phone }}</a
        >
        </li>
        <li>
        <a
            href="#"
            class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
            >{{ auth('employe')->user()->salary }} FCFA</a
        >
        </li>
    </ul>
    <ul
        class="py-1 text-gray-700 dark:text-gray-300"
        aria-labelledby="dropdown"
        >
        <li>
            <a  href="{{ route('employe.logout') }}"
                class="block px-4 py-2 text-sm text-red-800 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white"
                >Se déconnecter
            </a>
        </li>
    </ul>
@endif

@if (auth('gerant')->check())
    <div class="px-4 py-3">

        <span class="block text-sm font-semibold text-gray-900 dark:text-white">
            {{ auth()->user()->username }}
        </span>
        <span class="block text-sm text-gray-900 truncate dark:text-white">
            {{ auth()->user()->email }}
        </span>

    </div>

    <ul
        class="py-1 text-gray-700 dark:text-gray-300"
        aria-labelledby="dropdown"
    >
        <li>
        <a
            href="#"
            class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
            >{{ auth()->user()->phone }}</a
        >
        </li>
        <li>
        <a
            href="#"
            class="block px-4 py-2 text-sm hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-400 dark:hover:text-white"
            >{{ auth()->user()->cni }}</a
        >
        </li>
    </ul>
    <ul
        class="py-1 text-gray-700 dark:text-gray-300"
        aria-labelledby="dropdown"
        >
        <li>
            <a  href="{{ route('gerant.logout') }}"
                class="block px-4 py-2 text-sm text-red-800 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white"
                >Se déconnecter
            </a>
        </li>
    </ul>
@endif --}}
