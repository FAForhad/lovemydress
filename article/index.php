<?php
include "../connect.php";

$id = addslashes($_GET['id']);
$dm = displayQuery("articles", "WHERE id = '$id'");

//$page_header = "$symbol - Trading Opportunity Analysis | Candlestick Trader";
//$page_description = "$symbol Trading Opportunity. View our analysis of the $symbol chart and trade based on our analysis.";
//$page_keywords = "$symbol, RSI, Divergence, Trading, Opportunities";

//$filename2 = str_replace(".bmp", ".png", $dm['filename']);
//$facebook = "https://www.candlesticktrader.co.uk/screenshots/$filename2";

include "../header.php";
include "main.php";
include "../footer.php";