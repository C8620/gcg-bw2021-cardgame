<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>status</title>
</head>

<body>
<?php
    if(isset($_GET["result"])){
        echo '<center><img align="center" style="height:50vh; max-width:75vw;" src="images/result-'.$_GET["result"].'.png" /></center>';
    }else{
        echo '<center><a href="main.php?start" target="win-main"><img align="center" style="max-height:50vh; max-width:75vw;" src="images/begin.png" /></a></center>';
    }
?>
</body>
</html>
