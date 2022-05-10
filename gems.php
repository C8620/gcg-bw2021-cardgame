<?php
if($_GET["ingame"]!=1){
    die();
}
if(!(isset($_GET["ingame"])&&isset($_GET["gem"]))){
    die("Incorrect Arguments");
}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>gems</title>
</head>

<?php
    $gems=$_GET["gem"];
    $gem_dig1=$gems%10;
    $gems-=$gem_dig1;
    $gem_dig2=$gems/10;
?>

<body>
	<center>
		<img align="center" style="max-height:45vh; max-width:75vw;" src="images/privatePool.png" /><br/>
		<img align="center" style="max-height:45vh; max-width:75vw;" src="images/curr.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<img align="center" style="max-height:45vh; max-width:75vw;" src="images/num (<?php echo $gem_dig2;?>).png" />
		<img align="center" style="max-height:45vh; max-width:75vw;" src="images/num (<?php echo $gem_dig1;?>).png" />
	</center>
</body>
</html>
