<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>NOTIFICATION</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {

            font-family: "Poppins", sans-serif;
            font-size: 0.95em;
        }
    </style>
</head>

<body>


    <nav
        class="bg-sky-900 dark:bg-gray-900 fixed w-full z-20 top-0 start-0 border-b border-gray-200 dark:border-gray-600">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-4 py-2">
            <a href="{{ route('clientdashboard')}}"><img width="48" height="48" src="https://img.icons8.com/glyph-neue/64/FAB005/three-leaf-clover.png"
                alt="three-leaf-clover" /></a>
            
            <div class="flex md:order-2 space-x-3 items-start gap-6 md:space-x-0 rtl:space-x-reverse ">

                {{-- @include('partials.usernotifications') --}}
                <x-notification-menu count="5"/>

                <button id="dropdownAvatarNameButton" data-dropdown-toggle="dropdownAvatarName"
                    class="flex text-gray-200 items-center text-sm pe-1 font-medium  rounded-full hover:text-gray-200 dark:hover:text-blue-500 md:me-0 focus:ring-0 focus:ring-gray-100 dark:focus:ring-gray-700 dark:text-white"
                    type="button">
                    <span class="sr-only">Open user menu</span>
                    <img class="w-6 h-6 me-2 rounded-full" src="https://static-00.iconduck.com/assets.00/avatar-default-symbolic-icon-479x512-n8sg74wg.png"
                        alt="user photo">
                    <p class="text-sm">{{auth()->user()->firstname}} {{auth()->user()->lastname}}</p>
                    <svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownAvatarName"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                    <div class="px-4 py-3 text-sm text-gray-900 dark:text-white">
                        <div class="font-medium ">Pro User</div>
                        <div class="truncate">{{auth()->user()->email}}</div>
                    </div>
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200"
                        aria-labelledby="dropdownInformdropdownAvatarNameButtonationButton">
                        <li>
                            <a href="{{route('clientsettings')}}"
                                class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Settings</a>
                        </li>
                    </ul>
                    <div class="py-2">
                        <a href="{{route('logout')}}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Sign
                            out</a>
                    </div>
                </div>

            </div>
        </div>
    </nav>

    <div class="m-36">
        @yield('content')
    </div>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>
