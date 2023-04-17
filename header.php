<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="./MobileMenu/mobilemenu.css">
    <link rel="stylesheet" href="./Footer/Footer.css">
    <link rel="shortcut icon" href="./fav.jpg" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/6f3268409a.js" crossorigin="anonymous"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.2/dist/css/splide.min.css">
    <title>Great wedding ideas</title>
</head>

<body class="mx-auto">
    <header>
        <div class=" text-gray-900 container mx-auto">
            <div class="px-5 py-3 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8">
                <div class="relative flex items-center justify-between">
                    <a href="/" aria-label="Great Wedding Ideas" title="Great Wedding Ideas" class="inline-flex items-center">
                        <img src="/img/logo1.jpg"
                            class="text-3xl lg:my-0 w-64 my-2 pl-0 lg:pl-4 pr-4 font-extrabold tracking-wide text-gray-900 ">
                        </img>
                    </a>
                    <ul class="flex items-center hidden lg:flex">
                        <li class="px-6 mr-0 ml-0">
                            <a href="#" aria-label="Ideas" title="Ideas"
                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Ideas
                            </a>
                        </li>
                        <li class="px-6">
                            <a href="#" aria-label="Venues" title="Venues"
                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Venues
                            </a>
                        </li>
                        <li class="px-6">
                            <a href="/businesses.html" aria-label="Suppliers" title="Suppliers"
                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Suppliers
                            </a>
                        </li>
                        <li class="px-6">
                            <a href="#" aria-label="Dresses" title="Dresses"
                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Dresses
                            </a>
                        </li>
                        <li class="px-6">
                            <a href="#" aria-label="Wedding Website" title="Wedding Website"
                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Wedding Website
                            </a>
                        </li>
<!--                        <li class="flex items-center gap-5">-->
<!--                            <a href="/signup.html"-->
<!--                                class="inline-flex hover:bg-black hover:text-white border border-gray-500 items-center justify-center h-10 px-4 font-medium tracking-wide transition  rounded-full">-->
<!--                                Plan My Wedding-->
<!--                            </a>-->
<!--                        </li>-->
                    </ul>
                    <div class="lg:hidden">
                        <button aria-label="Open Menu" title="Open Menu"
                            class="p-2 -mr-1 transition duration-200 rounded focus:outline-none focus:shadow-outline"
                            onclick="openNavigation()">
                            <svg class="w-5 text-gray-600" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M23,13H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,13,23,13z" />
                                <path fill="currentColor"
                                    d="M23,6H1C0.4,6,0,5.6,0,5s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,6,23,6z" />
                                <path fill="currentColor"
                                    d="M23,20H1c-0.6,0-1-0.4-1-1s0.4-1,1-1h22c0.6,0,1,0.4,1,1S23.6,20,23,20z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </header>