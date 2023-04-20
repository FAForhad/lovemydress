 <link rel="stylesheet" href="article(1).css">
 <style>
    section p {
	color: #252525;
	line-height: 25px;
    font-size: 16px;
    text-align:start;
}
 </style>
    <!-- banner start -->
    <div  class="box py-10 lg:py-24" >
        <section class="container mx-auto my-5 px-4 lg:px-10">
            <div class="">
                <h1 class="my-4 text-3xl lg:text-4xl text-center font-semibold my-5"><?php echo $dm['title']?></h1>
                <p class="text-center"><?php echo $dm['introduction']?></p>
            </div>
        </section>
    </div>
    <!-- banner end -->

    <!-- blogs start -->
    <main class="blogs">
        <section>
            <div class="h1-divider"></div>
            <p class="intro"><?php echo $dm['summary']?></p>

            <article>
                <div class="mb-10">
                    <img class="bg-center rounded-md bg-no-repeat bg-cover w-full mb-10 lg:object-none object-contain" src="../article_images/<?php echo $dm['image']; ?>"></img>
                    <?php echo $dm['articlecontent']?>
                </div>
            </article>
        </section>
    </main>
    <!-- blogs end -->

<script src="https://code.jquery.com/jquery-3.5.0.min.js"></script>
<script src="article.js"></script>

<script>

    $(".box").article();

</script>



<script>
    const accordionHeader = document.querySelectorAll(".accordion-header");
    accordionHeader.forEach((header) => {
        header.addEventListener("click", function () {
            const accordionContent = header.parentElement.querySelector(".accordion-content");
            let accordionMaxHeight = accordionContent.style.maxHeight;

            // Condition handling
            if (accordionMaxHeight == "0px" || accordionMaxHeight.length == 0) {
                accordionContent.style.maxHeight = `${accordionContent.scrollHeight + 32}px`;
                header.querySelector(".fas").classList.remove("fa-plus");
                header.querySelector(".fas").classList.add("fa-minus");
                header.parentElement.classList.add("bg-indigo-50");
            } else {
                accordionContent.style.maxHeight = `0px`;
                header.querySelector(".fas").classList.add("fa-plus");
                header.querySelector(".fas").classList.remove("fa-minus");
                header.parentElement.classList.remove("bg-indigo-50");
            }
        });
    });
</script>
