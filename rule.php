<?php
    if(!isset($_GET["ingame"])){
        die("Invalid Arguments.");
    }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>rules</title>
</head>

<body>
<?php
    if($_GET["ingame"]==0){
        echo '<center><a href="details.html" target="win-main"><img align="center" style="max-height:45vh; max-width:75vw;" src="images/rule-0.png" /><img align="center" style="max-height:45vh; max-width:75vw;" src="images/rule-1.png" /></a></center>';
    }else{
        echo '<center><img align="center" style="max-height:60vh; max-width:75vw;" src="images/rose.png" /></center>';
    }
?>
	
</body>
</html>
