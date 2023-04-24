<?php
include "../connect.php";

$id = addslashes($_GET['id']);
$dm = displayQuery("articles", "WHERE id = '$id'");

$page_header = $dm['metatitle'];
$page_description = $dm['metadescription'];
$page_keywords = $dm['metakeywords'];

$filename2 = $dm['image'];
$facebook = "https://www.greatweddingideas.co.uk/article_images/$filename2";

include "../header.php";
include "main.php";
include "../footer.php";