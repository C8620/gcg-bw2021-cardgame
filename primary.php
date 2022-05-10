<?php
require_once("./func.php");
if(!(isset($_GET["cards"])&&isset($_GET["pool"])&&isset($_GET["ingame"]))){
    die("Incorrect Arguments");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>empty</title>
</head>

<body>
    <center>
<?php
    if($_GET["ingame"]==0){
        echo '<img align="center" style="max-height:50vh; max-width:80vw;" src="images/empty.png" />';
    }else{
        //echo $_GET["cards"];
        $cards=decode($_GET["cards"], 2, 16);
        for ($i=0; $i<4; $i++) {
            if($cards[$i]){
                echo '<img align="center" style="max-height:23vh; max-width:16vw; border:4px solid #1f5e56 ;border-radius:5px;" src="images/card ('.($i+1).').png" />';
            }
        }
        echo "<br />";
        for ($i=4; $i<10; $i++) {
            if($cards[$i]){
                echo '<img align="center" style="max-height:23vh; max-width:16vw; border:4px solid #8923bb ;border-radius:5px;" src="images/card ('.($i+1).').png" />';
            }
        }
        echo "<br />";
        for ($i=10; $i<=15; $i++) {
            if($cards[$i]){
                echo '<img align="center" style="max-height:23vh; max-width:16vw; border:4px solid #ffc930 ;border-radius:5px;" src="images/card ('.($i+1).').png" />';
            }
        }
        echo "<br />";
        //echo '<img align="center" style="max-height:25vh;" src="images/publicPool.png" />';
        $gems=$_GET["pool"];
        $gem_dig1=$gems%10;
        $gems-=$gem_dig1;
        $gem_dig2=$gems/10;
        echo '<img align="center" style="height:150px; max-height:20vh;" src="images/curr.png" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
        echo '<img align="center" style="height:100px; max-height:20vh;" src="images/num ('.$gem_dig2.').png" />';
        echo '<img align="center" style="height:100px; max-height:20vh;" src="images/num ('.$gem_dig1.').png" />';
    } 
?>
	</center>

</body>
</html>
