

        <!-- footert start -->
        <footer id="colophon" class="site-footer bg-pink-100">
            <div class="site-info container mx-auto">

<!--                <div class="footer-column">-->
<!--                    <div class="nav-block px-0">-->
<!--                        <img src="">-->
<!--                        <ul class="footer-social mx-auto">-->
<!--                            <li><a><i class="fab fa-twitter text-2xl"></i></a></li>-->
<!--                            <li><a><i class="fab fa-instagram text-2xl" aria-hidden="true"></i></a></li>-->
<!--                            <li><a><i class="fab fa-facebook-f text-2xl" aria-hidden="true"></i></a></li>-->
<!--                            <li><a><i class="fab fa-pinterest-p text-2xl" aria-hidden="true"></i></a></li>-->
<!--                            <li><a><i class="fab fa-youtube text-2xl" aria-hidden="true"></i></a></li>-->
<!--                        </ul>-->
<!--                    </div>-->
<!--                </div>-->
                <!-- <div class="footer-column">
                    <div class="nav-block">
                        <div class="menu-mobile-container my-4">
                            <ul id="menu-mobile "
                                class="menu text-center lg:m-auto m-1 lg:flex justify-betweewn item-center">
                            </ul>
                        </div>
                    </div>
                </div> -->


                <!-- this div will add mt-5 pt-5 -->
                <div class="w-full nav-block">
                    <div>
                        <ul class="menu flex justify-center text-gray-900 font-semibold">
                        <a href="/terms/" class="p-2">Terms of Use</a>
                        <a href="/privacy/" class="p-2">Privacy</a>
                        </ul>
                    </div>
                    <p class="text-gray-800 text-center"> 2023 Great Wedding Ideas - All Rights Reserved</p>
                </div>
            </div>

            <!-- .site-info -->
        </footer>
        <!-- footert end -->
    </main>


    <!-- mobile nav menu start -->
    <div id="mobileMenu">
        <div class="menu-mobile-container">
        <ul id="menu-mobile-1" class="menu ml-0 lg:ml-2">
                <li class="flex justify-between border-b-2 bg-pink-100">
                    <img src="../../../img/logo1.jpg" class="m-0 p-0 font-extrabold pl-0  px-4 w-64 text-3xl"></img>
                    <button class="text-2xl mx-2 " onclick="closeNavigation()"><i
                            class="fa-solid fa-xmark"></i></button>
                </li>
            <li class="font-bold">
                <a href="/">Home</a>
            </li>
                <li class="font-bold">
                    <a href="/blog/">Blog</a>
                </li>
            <li class="font-bold">
                <a href="/suppliers/">Suppliers</a>
            </li>
<!--                <li class="font-bold">-->
<!--                    <a>Venues</a>-->
<!--                </li>-->
<!--                <li class="font-bold">-->
<!--                    <a>Suppliers</a>-->
<!--                </li>-->
<!--                <li class="font-bold">-->
<!--                    <a>Dresses</a>-->
<!--                </li>-->
<!--                <li class="font-bold">-->
<!--                    <a>Wedding Website</a>-->
<!--                </li>-->

            </ul>
        </div>
    </div>
    <!-- mobile nav menu end -->

    <!-- search page start -->

    <!-- search page end  -->

</body>

<script>
    let mobileMenu = document.getElementById("mobileMenu");

    function openNavigation() {
        mobileMenu.style.display = "inline-block";
    }

    function closeNavigation() {
        mobileMenu.style.display = "none";
    }

</script>


</html>