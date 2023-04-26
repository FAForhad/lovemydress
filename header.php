<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ucwords($page_header); ?></title>
    <?php $page_description = isset( $page_description )? $page_description: false; ?>
    <meta name="description" content="<?php echo "$page_description"; ?>">
    <link rel="canonical" href="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <link rel="icon" type="image/x-icon" href="/favicon.ico">
    <?php $page_keywords = isset( $page_keywords )? $page_keywords: false; ?>
    <meta name="keywords" content="<?php echo "$page_keywords"; ?>">
    <meta property="og:type" content="website">
    <?php $page_header = isset( $page_header )? $page_header: false; ?>
    <meta property="og:title" content="<?php echo ucwords($page_header); ?>">
    <meta property="og:url" content="<?php echo "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>">
    <meta property="og:site_name" content="<?php echo $global_settings['sitename']; ?>">
    <meta property="og:description" content="<?php echo "$page_description"; ?>">
    <meta property="og:image" content="<?php echo "$facebook"; ?>">
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/MobileMenu/mobilemenu.css">
    <link rel="stylesheet" href="/Footer/Footer.css">
    <link rel="shortcut icon" href="/fav.jpg" type="image/x-icon">
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
</head>

<body class="mx-auto">
    <header class="bg-pink-100">
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
                            <a href="/" aria-label="Home" title="Home"
                               class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Home
                            </a>
                        </li>
                        <li class="px-6 mr-0 ml-0">
                            <a href="/blog/" aria-label="Blog" title="Blog"
                               class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Blog
                            </a>
                        </li>
                        <li class="px-6 mr-0 ml-0">
                            <a href="/suppliers/" aria-label="Suppliers" title="Suppliers"
                               class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">
                                Suppliers
                            </a>
                        </li>
<!--                        <li class="px-6">-->
<!--                            <a href="#" aria-label="Venues" title="Venues"-->
<!--                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">-->
<!--                                Venues-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="px-6">-->
<!--                            <a href="/businesses.html" aria-label="Suppliers" title="Suppliers"-->
<!--                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">-->
<!--                                Suppliers-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="px-6">-->
<!--                            <a href="#" aria-label="Dresses" title="Dresses"-->
<!--                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">-->
<!--                                Dresses-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="px-6">-->
<!--                            <a href="#" aria-label="Wedding Website" title="Wedding Website"-->
<!--                                class="text-md font-bold tracking-wide text-gray-900 transition-colors duration-200 hover:text-teal-accent-400">-->
<!--                                Wedding Website-->
<!--                            </a>-->
<!--                        </li>-->
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