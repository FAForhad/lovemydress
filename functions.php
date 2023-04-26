<?php

function seoFriendly($text)
{
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    if (empty($text)) {
        return 'n-a';
    }
    return $text;
}

function accessURL($id , $url){
    global $conn;
    $sql = "SELECT * FROM pageurl WHERE pageid = '$id'";
    $qql = mysqli_query($conn, $sql);
    $rql= mysqli_fetch_array($qql,MYSQLI_ASSOC);

    return $rql['url'];
}

function createThumbnail($f,$x,$y,$tloc)
{
$x++; $y++;
$p = 0.99;
$info = getimagesize($f);
list($w, $h) = getimagesize($f);
$a = $w; $b = $h;
while($a >= $x)
{ $p = $p - .001; $a = $w * $p; $b = $h * $p; }
while($b >= $y)
{ $p = $p - .001; $a = $w * $p; $b = $h * $p; }

$t = @imagecreatetruecolor($a, $b);
switch($info['mime']) 
{
case 'image/png' : 
 
   $x = @imagecreatefrompng($tloc);

  break;
case 'image/jpeg': 

 $x = @imagecreatefromjpeg($tloc);

  break;
case 'image/gif' : 

  $x= @imagecreatefromgif($tloc);

  break;
default: break;
}
 move_uploaded_file ($f, $tloc);
} 

function curPageURL() {
    $pageURL = 'http';
    $_SERVER["HTTPS"] = isset( $_SERVER["HTTPS"] )? $_SERVER["HTTPS"]: false;
    if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
    $pageURL .= "://";
    if ($_SERVER["SERVER_PORT"] != "80") {
        $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
    } else {
        $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
    }
    return $pageURL;
}
$url = curPageURL();

function generateTemporaryPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function itemsCount($conn,$table,$field,$dayz)
{
    $dateDays = date('Y-m-d', strtotime("-$dayz days"));
    $x = "SELECT $field AS fieldz FROM $table";
    $result = mysqli_query($conn,$x) or die(mysqli_error());
    $cnt = 0;
    while($row = mysqli_fetch_array($result))
    {
        $dateS = $row['fieldz'];
        if(strtotime($dateS) >= strtotime($dateDays))
        {
            $cnt++;
        }
    }
    return $cnt;
}

function getFileExtension($str)
{
    $i = strrpos($str,".");
    if (!$i) { return ""; }
    $l = strlen($str) - $i;
    $ext = substr($str,$i+1,$l);
    return $ext;
}

function dateFormat($date) {
    $date = date_create($date);
    $date = date_format($date, 'd/m/y');
    return $date;
}

function time_ago_in_php($timestamp)
{
    date_default_timezone_set("Europe/London");
    $time_ago        = strtotime($timestamp);
    $current_time    = time();
    $time_difference = $current_time - $time_ago;
    $seconds         = $time_difference;

    $minutes = round($seconds / 60); // value 60 is seconds
    $hours   = round($seconds / 3600); //value 3600 is 60 minutes * 60 sec
    $days    = round($seconds / 86400); //86400 = 24 * 60 * 60;
    $weeks   = round($seconds / 604800); // 7*24*60*60;
    $months  = round($seconds / 2629440); //((365+365+365+365+366)/5/12)*24*60*60
    $years   = round($seconds / 31553280); //(365+365+365+365+366)/5 * 24 * 60 * 60

    if ($seconds <= 60){
        return "Just Now";
    } else if ($minutes <= 60){
        if ($minutes == 1){
            return "One Minute Ago";
        } else {
            return "$minutes Minutes Ago";
        }
    } else if ($hours <= 24){
        if ($hours == 1){
            return "1 Hour Ago";
        } else {
            return "Today";
        }
    } else if ($days <= 7){
        if ($days == 1){
            return "Yesterday";
        } else {
            return "$days Days Ago";
        }
    } else if ($weeks <= 4.3){
        if ($weeks == 1){
            return "A Week Ago";
        } else {
            return "$weeks Weeks Ago";
        }
    } else if ($months <= 12){
        if ($months == 1){
            return "A Month Ago";
        } else {
            return "$months Months Ago";
        }
    } else {
        if ($years == 1){
            return "One Year Ago";
        } else {
            return "$years Years Ago";
        }
    }
}

function mail_attachment($filename, $path, $mailto, $from_mail, $from_name, $replyto, $subject, $message) {
    $file = $path.$filename;
    $file_size = filesize($file);
    $handle = fopen($file, "r");
    $content = fread($handle, $file_size);
    fclose($handle);
    $content = chunk_split(base64_encode($content));
    $uid = md5(uniqid(time()));
    $header = "From: ".$from_name." <".$from_mail.">\r\n";
    $header .= "Reply-To: ".$replyto."\r\n";
    $header .= "MIME-Version: 1.0\r\n";
    $header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";
    $header .= "This is a multi-part message in MIME format.\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-type:text/plain; charset=iso-8859-1\r\n";
    $header .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
    $header .= $message."\r\n\r\n";
    $header .= "--".$uid."\r\n";
    $header .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n"; // use different content types here
    $header .= "Content-Transfer-Encoding: base64\r\n";
    $header .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
    $header .= $content."\r\n\r\n";
    $header .= "--".$uid."--";
    if (mail($mailto, $subject, "", $header)) {
        echo "mail send ... OK"; // or use booleans here
    } else {
        echo "mail send ... ERROR!";
    }
}

function hightlight($str, $keywords = '')
{
    $keywords = preg_replace('/\s\s+/', ' ', strip_tags(trim($keywords)));
    $style = 'highlight';
    $style_i = 'highlight_important';
    $var = '';
    foreach(explode(', ', $keywords) as $keyword)
    {
        $replacement = "<span class='".$style."'>".$keyword."</span>";
        $var .= $replacement." ";
        $str = str_ireplace($keyword, $replacement, $str);
    }
    $str = str_ireplace(rtrim($var), "<span class='".$style_i."'>".$keywords."</span>", $str);
    return $str;
}

function displayQuery($table, $tablequery){
    global $conn;
    $query = "SELECT * FROM $table $tablequery";
    $result = mysqli_query($conn, $query);
    $resultArray = mysqli_fetch_array($result,MYSQLI_ASSOC);
    return $resultArray;
}

function suppliers_paginate($display, $pg, $total) {
    /* make sure pagination doesn't interfere with other query
  string variables */

    if(isset($_SERVER['QUERY_STRING']) && trim(
            $_SERVER['QUERY_STRING']) != '') {
        if(stristr($_SERVER['QUERY_STRING'], 'pg='))
            $query_str = '?'.preg_replace('/pg=\d+/', 'pg=',
                    $_SERVER['QUERY_STRING']);
        else
            $query_str = '?'.$_SERVER['QUERY_STRING'].'&pg=';
    } else
        $query_str = '?pg=';

    /* find out how many pages we have */
    $pages = ($total <= $display) ? 1 : ceil($total / $display);

    /* create the links */
    $first = '<a href="/suppliers/1/">First</a>';
    $prev = '<a href="/suppliers/'.($pg - 1).'/">Previous</a>';
    $next = '<a href="/suppliers/'.($pg + 1).'/">Next</a>';
    $last = '<a href="/suppliers/'.$pages.'/">Last</a>';

    /* display opening navigation */
    echo '<div class="my-12"><p align="center">';
    echo ($pg > 1) ? "$first : $prev :" : '&#171; : &#139; :';

    /* limit the number of page links displayed */
    $begin = $pg - 4;
    while($begin < 1)
        $begin++;
    $end = $pg + 4;
    while($end > $pages)
        $end--;
    for($i=$begin; $i<=$end; $i++)
        echo ($i == $pg) ? ' ['.$i.'] ' : ' <a href="/suppliers/'.$i.'/">'.$i.'</a> ';

    /* display ending navigation */
    echo ($pg < $pages) ? ": $next : $last" : ': &#155; : &#187;';
    echo '</p></div>';
}

function blog_paginate($display, $pg, $total) {
    /* make sure pagination doesn't interfere with other query
    string variables */

    if(isset($_SERVER['QUERY_STRING']) && trim(
            $_SERVER['QUERY_STRING']) != '') {
        if(stristr($_SERVER['QUERY_STRING'], 'pg='))
            $query_str = preg_replace('/pg=\d+/', 'pg=', $_SERVER['QUERY_STRING']);
        else
            $query_str = $_SERVER['QUERY_STRING'].'&pg=';
    } else
        $query_str = 'pg=';

    /* find out how many pages we have */
    $pages = ($total <= $display) ? 1 : ceil($total / $display);

    /* create the links */
    $first = '<a href="/blog/1/">First</a>';
    $prev = '<a href="/blog/'.($pg - 1).'/">Previous</a>';
    $next = '<a href="/blog/'.($pg + 1).'/">Next</a>';
    $last = '<a href="/blog/'.$pages.'/">Last</a>';

    /* display opening navigation */
    echo '<div id="pagination" class="my-12"><p align="center">';
    echo ($pg > 1) ? "$first : $prev :" : '&#171; : &#139; :';

    /* limit the number of page links displayed */
    $begin = $pg - 4;
    while($begin < 1)
        $begin++;
    $end = $pg + 4;
    while($end > $pages)
        $end--;
    for($i=$begin; $i<=$end; $i++)
        echo ($i == $pg) ? ' ['.$i.'] ' : ' <a href="/blog/'.$i.'/">'.$i.'</a> ';

    /* display ending navigation */
    echo ($pg < $pages) ? ": $next : $last" : ': &#155; : &#187;';
    echo '</p></div>';
}



function mysqli_result($res,$row=0,$col=0){
    $numrows = mysqli_num_rows($res);
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}

function selectQry($conn, $sql, $return_type = '')
{
    $retResultSelect = array();
    $rs	= mysqli_query($conn,$sql) or die("MySQL Error: " .mysqli_error());
    $retun_type = isset( $retun_type )? $retun_type: false;
    if($retun_type == "")
    {
        while( ($row = mysqli_fetch_assoc($rs)))
        {
            $retResultSelect[] = $row;
        }
        return $retResultSelect;
    }
    else if($retun_type == "resource") return $rs;
}

function zipRadiusSQL($varZip, $varLatitude, $varLongitude, $varMiles)
{
    $varLatRange = $varMiles / ((6076 / 5280) * 60) + ($varMiles / 1000);
    $varLonRange = $varMiles / (((cos($varLatitude * 3.141592653589 / 180) * 6076.) / 5280.) * 60) + ($varMiles / 1000);

    $zipRadiusSQL_str = "SELECT latitude, longitude, district , postcode";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " FROM ukpostcodes WHERE postcode != ''";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND (";
    $zipRadiusSQL_str = $zipRadiusSQL_str . "longitude <= (" . $varLongitude . " + " . $varLonRange . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND ";
    $zipRadiusSQL_str = $zipRadiusSQL_str . "longitude >= (" . $varLongitude . " - " . $varLonRange . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND (";
    $zipRadiusSQL_str = $zipRadiusSQL_str . "latitude <= (" . $varLatitude . " + " . $varLatRange . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND ";
    $zipRadiusSQL_str = $zipRadiusSQL_str . "latitude >= (" . $varLatitude . " - " . $varLatRange . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . ")";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND longitude <> 0";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " AND latitude <> 0";
    $zipRadiusSQL_str = $zipRadiusSQL_str . " ORDER BY postcode ASC";
    $zipRadiusSQL = $zipRadiusSQL_str;

    return $zipRadiusSQL;
}

function zipDistCalc($Lat1, $Lon1, $Lat2, $Lon2, $UnitFlag)
{
    $PI = 3.141592654;
    if (is_null($Lat1)) {
        return;
    }

    if($Lat1 == 0 or $Lon1 == 0 or $Lat2 == 0 or $Lon2 == 0) {
        $DistCalc = -1;
        return $DistCalc;
    } elseif ($Lat1 == $Lat2 and $Lon1 == $Lon2) {
        $DistCalc = 0;
        return $DistCalc;
    }

    $LatRad1 = $Lat1 * $PI / 180;
    $LonRad1 = $Lon1 * $PI / 180;
    $LatRad2 = $Lat2 * $PI / 180;
    $LonRad2 = $Lon2 * $PI / 180;
    $LonRadDif = Abs($LonRad1 - $LonRad2);
    $X = Sin($LatRad1) * Sin($LatRad2) + Cos($LatRad1) * Cos($LatRad2) * Cos($LonRadDif);
    $RadDist = atan(-$X / sqrt(-$X * $X + 1)) + 2 * atan(1);
    $DistMI = $RadDist * 3958.754;
    $DistKM = $DistMI * 1.609344;
    If (strtoupper($UnitFlag) == "M") {
        $zipDistCalc = $DistMI;
    } else {
        $zipDistCalc = $DistKM;
    }
    return $zipDistCalc;
}

function getZipCodes($conn,$zip_code,$radiusRangeLow,$radiusRangeHeigh)
{
//	Uncomment these if you want fixed values for the high and low range
//	$radiusRangeLow = 0;
//	$radiusRangeHeigh = 10;

    $zipCodesArray=array();
    $fetchZipInfoQry="SELECT postcode,latitude,longitude FROM ukpostcodes WHERE postcode = '".addslashes($zip_code)."'";
    $zipInfo=selectQry($conn,$fetchZipInfoQry);
    if(sizeof($zipInfo)>0)
    {
        $fetchZipsInRangeSql = zipRadiusSQL($zipInfo[0]['postcode'], $zipInfo[0]['latitude'], $zipInfo[0]['longitude'], $radiusRangeHeigh);
        $zipRangeInfo=selectQry($conn,$fetchZipsInRangeSql);
        $zipRangeInfoSize=sizeof($zipRangeInfo);
        if($zipRangeInfoSize>0)
        {
            for($i=0;$i<$zipRangeInfoSize;$i++)
            {
                $zipLatitude = $zipRangeInfo[$i]["latitude"];
                $zipLongitude = $zipRangeInfo[$i]["longitude"];
                $zipZipCode = $zipRangeInfo[$i]["postcode"];
                $zipDistance = zipDistCalc($zipInfo[0]['latitude'], $zipInfo[0]['longitude'], $zipLatitude, $zipLongitude, "M");
                //	if(($zipDistance > $radiusRangeLow) and ($zipDistance < $radiusRangeHeigh))
                //	{
                $zipCodesArray[]="'".$zipZipCode."'";
                //	}
            }
            // rturn the $zipCodesArray
            unset($zipcodeClass);
            return $zipCodesArray;

        }else
        {
            ## no matching zip codes found
            return $zipCodesArray;
        }
    }else
    {
        ## zip code is invalid ( not exist in the zipcode db)
        return $zipCodesArray;
    }

}

function calc_postcode_seperation($conn, $pcodeA, $pcodeB)
{
    $result = mysqli_query($conn,"SELECT * FROM ukpostcodes WHERE postcode = '$pcodeA' LIMIT 1");
    $row = mysqli_fetch_array($result);
    $gridn[0] = $row['x'];
    $gride[0] = $row['y'];
    $result = mysqli_query($conn,"SELECT * FROM ukpostcodes WHERE postcode = '$pcodeB' LIMIT 1");
    $row = mysqli_fetch_array($result);
    $gridn[1] = $row['x'];
    $gride[1] = $row['y'];
    $distance_n = $gridn[0] - $gridn[1];
    $distance_e = $gride[0] - $gride[1];
    $hypot = sqrt(($distance_n*$distance_n)+($distance_e*$distance_e));
    $text.=''.round($hypot/1609,1).'';
    return $text;
}

function calc_latlong_distance($conn, $pcodeA, $pcodeB)
{
    $unit = 'M';
    $result = mysqli_query($conn,"SELECT * FROM ukpostcodes WHERE postcode = '$pcodeA' LIMIT 1");
    $row = mysqli_fetch_array($result);
    $lat1 = $row['latitude'];
    $lon1 = $row['longitude'];
    $result = mysqli_query($conn,"SELECT * FROM ukpostcodes WHERE postcode = '$pcodeB' LIMIT 1");
    $row = mysqli_fetch_array($result);
    $lat2 = $row['latitude'];
    $lon2 = $row['longitude'];

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $miles = $dist * 60 * 1.1515;
    $unit = strtoupper($unit);

    if ($unit == "K") {
        return round(($miles * 1.609344),1);
    } else if ($unit == "N") {
        return round(($miles * 0.8684),1);
    } else {
        return round($miles,1);
    }
}

function numRows($table, $tablequery){
global $conn;
$numRowsQuery = "SELECT * FROM $table $tablequery";
$numRowsResult = mysqli_query($conn, $numRowsQuery);
$numRowsTotal = mysqli_num_rows($numRowsResult); 
return $numRowsTotal;
}

function candidateOptions(){
    global $conn;
    $candidateOptionQuery = "SELECT * FROM menus WHERE section = 'Candidates' ORDER BY position ASC";
    $candidateOptionResult = mysqli_query ($conn, $candidateOptionQuery);
    while ($row = mysqli_fetch_assoc($candidateOptionResult))
    {
        $link = htmlspecialchars(stripslashes($row['link']));
        $title = htmlspecialchars(stripslashes($row['title']));
        echo "<li><a href='$link'>$title</a></li>";
    }
}

function recruiterOptions(){
    global $conn;
    $recruiterOptionQuery = "SELECT * FROM menus WHERE section = 'Recruiters' ORDER BY position ASC";
    $recruiterOptionResult = mysqli_query ($conn, $recruiterOptionQuery);
    while ($row = mysqli_fetch_assoc($recruiterOptionResult))
    {
        $link = htmlspecialchars(stripslashes($row['link']));
        $title = htmlspecialchars(stripslashes($row['title']));
        echo "<li><a href='$link'>$title</a></li>";
    }
}

function displayPlan($recruiterid){
global $conn;
$displayPlanQuery = "SELECT * FROM recruiters WHERE recruiterid = '$recruiterid'";
$displayPlanResult = mysqli_query($conn, $displayPlanQuery);
$displayPlanArray= mysqli_fetch_array($displayPlanResult,MYSQLI_ASSOC);

if(empty($displayPlanArray['plan']))
{
    echo "<p>You cannot access the CV database or post any jobs until you select a recruiter plan.<br><a href='plans.php'><span style='color: #ff0000'>Click here to select your recruiter plan</span></a></br>";
}
if(!empty($displayPlanArray['plan']))
{
    echo "<p>Your current recruiter plan: <span style='color: #ff0000'>$displayPlanArray[plan]</span></br>";
}
if($displayPlanArray['posting'] == "No" or $displayPlanArray['posts'] == 0)
{
    echo "You do not have any credits to post jobs</br>";
} else {
    echo "You have <span style='color: #ff0000'>$displayPlanArray[posts]</span> job posting credits</br>";
}
$settingsQuery = "SELECT * FROM settings WHERE settingid = 1";
$settingsResult = mysqli_query($conn, $settingsQuery);
$settingsArray = mysqli_fetch_array($settingsResult,MYSQLI_ASSOC);

if ($settingsArray['resumes'] == "On")
{
    if($displayPlanArray['resume'] == "No")
    {
        echo "You do not have access to the CV database</br>";
    } else {
        echo "You have access to the CV database</br>";
    }
    if($displayPlanArray['resumenum'] == 0)
    {
        echo "You do not have any credits to access candidate CVs</br>";
    } else {
        echo "You can access <span style='color: #ff0000'>$displayPlanArray[resumenum]</span> candidate CVs</br>";
    }
}
if(!empty($displayPlanArray['expiry']))
{
    echo "Your current recruiter plan expires on: <span style='color: #ff0000'>$displayPlanArray[expiry]</span></p>";
}

}

function displayLogo($recruiterid, $width)
{
    global $conn;
    $displayLogoQuery = "SELECT * FROM recruiters WHERE recruiterid = '$recruiterid'";
    $displayLogoResult = mysqli_query($conn, $displayLogoQuery);
    $displayLogoArray= mysqli_fetch_array($displayLogoResult,MYSQLI_ASSOC);

    if (!empty($displayLogoArray['image']))
    {
        echo "<div style='text-align:center'><img src='thumbnail.php?gd=2&src=logo/big/$displayLogoArray[image]&maxw=$width' border='0'></div>";
    }
}

function displayCompanyDetails($recruiterid)
{
    global $conn;
    $displayCompanyDetailsQuery = "SELECT * FROM recruiters WHERE recruiterid = '$recruiterid'";
    $displayCompanyDetailsResult = mysqli_query($conn, $displayCompanyDetailsQuery);
    $displayCompanyDetailsArray= mysqli_fetch_array($displayCompanyDetailsResult,MYSQLI_ASSOC);

    echo "<b>Company Details</b><br>";
    echo "Company Name: $displayCompanyDetailsArray[companyname]<br>";
    echo "Address: $displayCompanyDetailsArray[address], $displayCompanyDetailsArray[zip], $displayCompanyDetailsArray[country]<br>";
    if(!empty($displayCompanyDetailsArray['phoneext']))
    {
        echo "Phone: $displayCompanyDetailsArray[phone]<br>";
    }
    echo "Email: $displayCompanyDetailsArray[ename]<br>";
    if(!empty($displayCompanyDetailsArray['companywww']))
    {
        echo "Website: $displayCompanyDetailsArray[companywww]<br>";
    }
}

function displayCategories(){
global $conn;
$i = -1;
$categoriesQuery = "select * from categories order by category asc";
$categoriesResult = mysqli_query($conn, $categoriesQuery);
while($categoriesResultArray = mysqli_fetch_assoc($categoriesResult)){
$i++;
if($i/1 == intval($i/1)){
}
$string1 = "$categoriesResultArray[category]";
$string1 = str_replace (" ", "-", $string1);
$string1 = strtolower($string1);
?>
<a href="<?=$fullurl?>/wedding-<?=$string1?>.html"><?=$categoriesResultArray[category]?></a></br>
<?
if(($i+1)/1 == intval(($i+1)/1)){
}
}

}

?>