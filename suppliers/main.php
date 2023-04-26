
    <!-- businesses page start -->
    <div  class="container mx-auto my-6 lg:my-10 lg:px-8 px-0" >
        <h1 class="lg:text-4xl text-2xl lg:my-6 my-0 font-semibold px-6">Asdorem ipsum dolor sit amet ame elit.
        </h1>

        <p class="my-4 px-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque tenetur, necessitatibus
            illum, quos animi
            accusamus facilis architecto explicabo modi dolor et quidem magni adipisci voluptates aliquid eum
            quaerat praesentium dignissimos sapiente minima, inventore fugiat fuga!</p>
        <?php
        $display = 10;
        $pg = (isset($_REQUEST['pg']) && ctype_digit($_REQUEST['pg'])) ?
            $_REQUEST['pg'] : 1;
        $start = $display * $pg - $display;

        $query = "SELECT * FROM businesses WHERE live = 0 ORDER BY id DESC LIMIT $start, $display";
        $result = mysqli_query ($conn, $query);
        $query2 = "SELECT * FROM businesses WHERE live = 0";
        $result2 = mysqli_query ($conn, $query2);
        $total = mysqli_num_rows($result2);

        while ($a4 = mysqli_fetch_assoc($result))
        {
        ?>
        <ul class="hover:bg-pink-50 mx-2 lg:mx-0 px-6 lg:py-2 py-0 rounded" >
            <a class="lg:flex items-center justify-between my-3">
                <div class="lg:flex w-full lg:py-0 py-3">
                    <div class="mr-3 lg:mr-8 lg:h-40 lg:w-40  rounded-md">
                        <img class="object-contain lg:h-40 lg:w-40 my-2 rounded-md " src="/img/blog_dress (12).jpg"
                            alt="">
                    </div>
                    <div class="w-full lg:mt-0 mt-3">
                        <h1 class="font-bold text-lg"><?php echo $a4['name']?></h1>
                        <h3 class="font-semibold lg:my-0 my-1"><?php echo $a4['category']?></h3>
                        <p id="description" class="paragraph text-justify lg:my-0 my-1"><?php echo strip_tags($a4['description']); ?></p>
                        <div class="lg:my-1 my-2 flex">
                            <button href="#"
                                class=" px-4 my-1 hover:bg-black hover:text-white  border border-gray-500 items-center justify-center h-8 font-md font-semibold tracking-wide transition rounded-md">
                                Call
                            </button>
                            <button href="/"
                                class="  px-4 my-1 mx-3 hover:bg-black hover:text-white  border border-gray-500 items-center justify-center h-8 font-md font-semibold tracking-wide transition rounded-md"
                                type="button" data-modal-toggle="authentication-modal">
                                Email
                            </button>
                            <button href="/"
                                class=" px-4 my-1 hover:bg-black hover:text-white  border border-gray-500 items-center justify-center h-8 font-md font-semibold tracking-wide transition rounded-md">
                                Website
                            </button>
                        </div>
                    </div>
                </div>
            </a>
        </ul>
            <?php
        }
        suppliers_paginate($display, $pg, $total);
        ?>
    </div>
    <!-- businesses page end -->
    <div class="max-w-2xl my-auto mx-auto">
            <!-- Main modal -->
            <div id="authentication-modal" aria-hidden="true"
                class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
                <div class="relative w-full max-w-md px-4 h-full md:h-auto">
                    <!-- Modal content -->
                    <div class=" rounded-lg shadow relative bg-pink-100">
                        <div class="flex justify-end p-2">
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="authentication-modal">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <form class="space-y-6 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="#">
                            <h3 class="text-2xl font-medium text-gray-900 ">Contact Supplier</h3>
                            <div>
                                <label for="Name"
                                    class="text-sm font-medium text-gray-900 block mb-2">Name  </label>
                                <input type="Name" name="Name" id="Namel" placeholder="Your name" 
                                    class="bg-gray-50 border border-gray-300 text-red-500 font-semibold sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-pink-50 dark:border-gray-500 dark:placeholder-gray-400  "
                                    required="">
                            </div>
                            <div>
                                <label for="Email"
                                    class="text-sm font-medium text-gray-900 block mb-2">Email </label>
                                <input type="email" name="Email" id="Email"placeholder="Name@gmail.com" 
                                    class="bg-gray-50 border border-gray-300 text-red-900 font-semibold sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-pink-50 dark:border-gray-500 dark:placeholder-gray-400  "
                                    required="">
                            </div>
                            <div>
                                <label for="Tel"
                                    class="text-sm font-medium text-gray-900 block mb-2">Tel </label>
                                <input type="number" name="Tel" id="Tel" placeholder="Your number" 
                                    class="bg-gray-50 border border-gray-300 text-red-900 font-semibold sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-pink-50 dark:border-gray-500 dark:placeholder-gray-400  "
                                    required="">
                            </div>
                            <div>
                                <label for="Message"
                                    class="text-sm font-medium text-gray-900 block mb-2">Message </label>
                                <textarea type="textarea" name="Message" id="Message" placeholder=" Your message"
                                    class="bg-gray-50 border border-gray-300 text-red-900 font-semibold sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-pink-50 dark:border-gray-500 dark:placeholder-gray-400  "
                                    required=""></textarea>
                            </div>
                            <button type="submit"
                                class="w-full font-medium text-pink-800 hover:bg-pink-200 rounded-lg text-sm px-5 py-2.5 text-center border border-gray-500">Contact Supplier</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <script>

function setupParagraphs() {
        const paragraphs = document.querySelectorAll('.paragraph');
        paragraphs.forEach((paragraph) => {
            const text = paragraph.textContent;
            const maxChars = 340; // maximum characters to show
            if (text.length > maxChars) {
                const truncated = text.slice(0, maxChars) + '...';
                const truncatedNode = document.createTextNode(truncated);
                paragraph.textContent = '';
                paragraph.appendChild(truncatedNode);

                const viewMoreLink = document.createElement('a');
                viewMoreLink.textContent = 'View more';
                viewMoreLink.classList.add('text-blue-500');
                viewMoreLink.classList.add('mx-2');
                viewMoreLink.href = '#';
                paragraph.appendChild(viewMoreLink);

                viewMoreLink.addEventListener('click', (event) => {
                    event.preventDefault();
                    paragraph.textContent = text;

                    const viewLessLink = document.createElement('a');
                    viewLessLink.textContent = 'View less';
                    viewLessLink.classList.add('text-blue-500');
                    viewLessLink.classList.add('mx-2');
                    viewLessLink.href = '#';
                    paragraph.appendChild(viewLessLink);

                    viewLessLink.addEventListener('click', (event) => {
                        event.preventDefault();
                        paragraph.textContent = truncated;
                        paragraph.appendChild(viewMoreLink);
                        viewLessLink.remove();
                    });
                });
            }
        });
    }

</script>

<script>
    window.addEventListener('load', setupParagraphs);
</script>

        <script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>