<?php
    if(!(isset($_GET["ingame"])&&isset($_GET["operateable"]))){
        die("Invalid Arguments.".isset($_GET["ingame"]).isset($_GET["operateable"]));
    }
    if($_GET["ingame"]!=1){
        die();
    }
    if($_GET["operateable"]!=1){
        die();
    }
?>
<?php
$link="./main.php?";
$i = count($_GET);
foreach ($_GET as $key => $value) {
    if ($i == 1) {
        $link .= $key . "=" . $value;
    } else {
        $link .= $key . "=" . $value . "&";
    }
    $i --;
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>quit</title>
<style>
	a{text-decoration:none}
	a:hover{text-decoration:none}
</style>
</head>

<body>
<?php
    if($_GET["ingame"]==1){
        echo '<center><a href="'.$link.'" target="win-main"><img align="center" style="max-height:35vh; max-width:75vw;" src="images/quit-0.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img align="center" style="max-height:35vh; max-width:75vw;" src="images/quit-1.png" /></a></center>';
    }else{
        echo '<center><img align="center" style="max-height:60vh; max-width:75vw;" src="images/rose.png" /></center>';
    }
?>
</body>
</html>
