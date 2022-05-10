<?php
require_once("./func.php");
if(isset($_GET["init"])){
	$ingame=0;
	$noticeline='status.php';
	$players=array(0,0,0,0);
	$present=array(1,1,1,1,1);
	$cards=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$gem=array(2,2,2,2,0);
	$quitargs=0;
	goto await;
}
if(isset($_GET["start"])){
	$ingame=1;
	$present=array(1,1,1,1,1);
	$cards=array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);
	$players=array(0);
	array_push($players, rand($players[0]+1, 6));
	array_push($players, rand($players[1]+1, 10));
	array_push($players, rand($players[2]+1, 13));
	$gem=array(2,2,2,2,0);
}else{
    if(!(isset($_GET["present"])&&isset($_GET["cards"])&&isset($_GET["players"])&&isset($_GET["gem"]))){
		die("Insufficent Info.");
	}
    $ingame=1;
    //$present_encoded=$_GET["present"];
	$present=decode($_GET["present"], 2, 5);
    //$cards_encoded=$_GET["cards"];
	$cards=decode($_GET["cards"], 2, 16);
    //$players_encoded=$_GET["players"];
	$players=decode($_GET["players"], 14, 4);
    //$gem_encoded=$_GET["gem"];
	$gem=decode($_GET["gem"], 37, 5);
}

$count0=1;
for($i=0; $i<4; $i++){
	if($cards[$i]==1){
		$count0++;
	}
}

$temp=rand(1,3);
if($present[$temp]==1){
	if(rand(0,40+10*$gem[4]*$count0)>40){
		$gem[$temp]+=$gem[4];
		$gem[4]=0;
		$present[$temp]=0;
	}
}

$count2=0;
for($i=0; $i<4; $i++){
	if($present[$i]==0){
		$count2++;
	}
}
if($count2>=4){
	goto finish;
}

//Dispatch a new card
$temp=rand(0,1599)%15;
while($cards[$temp]==1){
	$temp=rand(0,1599)%15;
}
$cards[$temp]=1;
if($temp>=4&&$temp<10){
	for($i=0; $i<=4; $i++){
		if($present[$i]) $gem[$i]+=1;
	}
}
if($temp>=10&&$temp<16){
	for($i=0; $i<=4; $i++){
		if($present[$i]) $gem[$i]+=2;
	}
}
$count1=0;
for($i=0; $i<4; $i++){
	if($cards[$i]==1){
		$count1++;
	}
}
finish:
if($count1>=2||$count2>=4){
	if($present[0]==0){
		$isWin=1;
		for($i=1; $i<=3; $i++){
			if($present[$i]==0){
				if($gem[$i]>$gem[0]){
					$isWin=0;
					$maxg=$gem[$i];
					$maxp=$i;
				}
			}
		}
	}else{
		$isWin=0;
		$maxg=0;
		$maxp=0;
	}
	$noticeline='status.php?result='.$isWin.'&max='.$maxp.$maxg;
	$quitargs=0;
	$present[0]=0;
}else{
	if($present[0]==0){
		$noticeline='refresh-auto.php?present='.encode($present, 2).'&cards='.encode($cards, 2).'&players='.encode($players, 14).'&gem='.encode($gem, 37);
	}else{
		$noticeline='refresh.php?present='.encode($present, 2).'&cards='.encode($cards, 2).'&players='.encode($players, 14).'&gem='.encode($gem, 37);
	}
	$gem_sup=$gem;
	$gem_sup[0]+=$gem_sup[4];
	$gem_sup[4]=0;
	$present_sup=$present;
	$present_sup[0]=0;
	$quitargs='present='.encode($present_sup, 2).'&cards='.encode($cards, 2).'&players='.encode($players, 14).'&gem='.encode($gem_sup, 37);
}
await:
?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>main</title>
<style type="text/css">
  html,body{ width:100%; height:100%;}
  body {
    margin-left: 0px;
    margin-top: 0px;
    margin-right: 0px;
    margin-bottom: 0px;
  }
</style>
</head>

<body>
	<iframe width="25%" height="15%" src="restart.php?ingame=<?php echo $ingame;?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="50%" height="15%" src="player-hor.php?ingame=<?php echo $ingame;?>&player=<?php echo $players[2];?>&present=<?php echo $present[2];?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="25%" height="15%" src="rule.php?ingame=<?php echo $ingame;?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>

	<iframe width="25%" height="50%" src="player.php?ingame=<?php echo $ingame;?>&player=<?php echo $players[1];?>&present=<?php echo $present[1];?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="50%" height="50%" src="primary.php?ingame=<?php echo $ingame;?>&pool=<?php echo $gem[4];?>&cards=<?php echo encode($cards, 2);?>" frameborder="0" scrolling="yes" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;" name="win-prime"></iframe>
	<iframe width="25%" height="50%" src="player.php?ingame=<?php echo $ingame;?>&player=<?php echo $players[3];?>&present=<?php echo $present[3];?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>

	<iframe width="25%" height="25%" src="gems.php?ingame=<?php echo $ingame;?>&gem=<?php echo $gem[0];?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="50%" height="25%" src="<?php echo $noticeline;?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="25%" height="25%" src="quit.php?ingame=<?php echo $ingame;?>&operateable=<?php echo $present[0];?>&<?php echo $quitargs;?>" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
	<iframe width="100%" height="10%" src="GCG.html" frameborder="0" scrolling="no" style="margin-bottom:-4px; margin-right:-2px; margin-left:-2px;"></iframe>
</body>
</html>
