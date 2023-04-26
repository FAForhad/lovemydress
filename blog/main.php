
    <!-- info start -->
    <div class="container mx-auto px-0 my-6 lg:my-10 lg:px-8">
        <h1 class="lg:text-4xl text-2xl lg:mb-6 mb-0 mt-0 lg:mt-2 font-semibold px-6">Aorem ipsum dolor sit amet ame elit.
            </h1>
    
            <p class="my-4 px-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. Cumque tenetur, necessitatibus
                illum, quos animi
                accusamus facilis architecto explicabo modi dolor et quidem magni adipisci voluptates aliquid eum
                quaerat praesentium dignissimos sapiente minima, inventore fugiat fuga!</p>
    </div>
    <div class="grid lg:grid-cols-3 gap-4 container mx-auto px-6 lg:px-14 mt-8">
        <?php
        $display = 9;
        $pg = (isset($_REQUEST['pg']) && ctype_digit($_REQUEST['pg'])) ?
        $_REQUEST['pg'] : 1;
        $start = $display * $pg - $display;

        $query = "SELECT * FROM articles WHERE feature = 0 ORDER BY id ASC LIMIT $start, $display";
        $result = mysqli_query ($conn, $query);
        $query2 = "SELECT * FROM articles WHERE feature = 0";
        $result2 = mysqli_query ($conn, $query2);
        $total = mysqli_num_rows($result2);

        while ($a4 = mysqli_fetch_assoc($result))
        {
        ?>
        <article class="group shadow-xl rounded-lg">
            <img src="/article_images/<?php echo $a4['image']; ?>" title="<?php echo $a4['title']?>" alt="<?php echo $a4['title']?>"
                class="h-56 w-full rounded-t-xl object-cover transition group-hover:grayscale-[50%]" />
            <div class="p-4">
                <a href="/blog/<?php echo $a4['id']?>/<?php echo str_replace(' ', '-', strtolower($a4['slug'])); ?>/">
                    <h2 class="text-[24px] font-medium text-gray-900 hover:text-pink-800"><?php echo $a4['title']?></h2>
                </a>
                <h3 class="text-[12px] my-1 italic">Wedding Dresses</h3>
                <p class="mt-2 text-sm leading-relaxed text-gray-500 line-clamp-3"><?php echo $a4['introduction']?></p>
            </div>
        </article>
            <?php
        }
        ?>
    </div>
    <?php
        blog_paginate($display, $pg, $total);
        ?>
    <!-- info end -->
<!--    <div class="mb-10">-->
<!--        <ol class="flex justify-center gap-1 text-xs font-medium">-->
<!--            <li>-->
<!--                <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100">-->
<!--                    <span class="sr-only">Prev Page</span>-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">-->
<!--                        <path fill-rule="evenodd"-->
<!--                            d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"-->
<!--                            clip-rule="evenodd" />-->
<!--                    </svg>-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="#" class="block h-8 w-8 rounded border border-gray-100 text-center leading-8">-->
<!--                    1-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--            <li class="block h-8 w-8 rounded border-teal-900 bg-green-900 text-center leading-8 text-white">-->
<!--                2-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="#" class="block h-8 w-8 rounded border border-gray-100 text-center leading-8">-->
<!--                    3-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="#" class="block h-8 w-8 rounded border border-gray-100 text-center leading-8">-->
<!--                    4-->
<!--                </a>-->
<!--            </li>-->
<!---->
<!--            <li>-->
<!--                <a href="#" class="inline-flex h-8 w-8 items-center justify-center rounded border border-gray-100">-->
<!--                    <span class="sr-only">Next Page</span>-->
<!--                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor">-->
<!--                        <path fill-rule="evenodd"-->
<!--                            d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"-->
<!--                            clip-rule="evenodd" />-->
<!--                    </svg>-->
<!--                </a>-->
<!--            </li>-->
<!--        </ol>-->
<!--    </div>-->
