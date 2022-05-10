<?php
if($_GET["ingame"]!=1){
    die();
}
if(!(isset($_GET["player"])&&isset($_GET["present"])&&isset($_GET["ingame"]))){
    die("Incorrect Arguments");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>player</title>
</head>

<body>
	<center>
		  <img style="max-height:95vh; max-width:50vw;" src="images/girlIcon (<?php echo $_GET["player"];?>).png" />
		  <img style="max-height:95vh; max-width:50vw;" src="images/girlText (<?php echo $_GET["player"];?>).png" /><br/>
		  <img style="max-height:95vh; max-width:50vw; margin-top:2vh;" src="images/status-<?php echo $_GET["present"];?>.png" />
	 </center>
</body>
</html>
