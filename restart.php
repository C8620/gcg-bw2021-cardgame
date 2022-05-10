<?php
    if(!isset($_GET["ingame"])){
        die("Invalid Arguments.");
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>restart</title>
</head>

<body>
<?php
    if($_GET["ingame"]==1){
        echo '<center><a href="main.php?init" target="win-main"><img align="center" style="max-height:45vh; max-width:75vw;" src="images/restart-0.png" /><img align="center" style="max-height:45vh; max-width:75vw;" src="images/restart-1.png" /></a></center>';
    }else{
        echo '<center><img align="center" style="max-height:60vh; max-width:75vw;" src="images/rose.png" /></center>';
    }
?>
</body>
</html>
