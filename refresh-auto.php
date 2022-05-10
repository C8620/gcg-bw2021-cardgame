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
<!doctype HTML>
<html>
<head>
<meta http-equiv="Content-Language" content="zh-cn">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
<title>cd</title>
</head>
<body>
<center>
<form name=loading>
<P align=center><b><FONT  style='FONT-FAMILY: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: xx-large;' color=#FFFFFF>请等待其他玩家结束游戏</FONT></b>
<BR />
<font style='FONT-FAMILY: -apple-system, system-ui, BlinkMacSystemFont, "Segoe UI", "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif; font-size: xx-large'>
<INPUT style="BORDER-RIGHT: medium none; BORDER-TOP: medium none; BORDER-LEFT: medium none; COLOR: #000000; BORDER-BOTTOM: medium none; TEXT-ALIGN: center; font-size: large;" size=2 name=percent>
</font>
</center>
<script language="javascript">
var bar=0
count()
function count(){
    bar=bar+1
    document.loading.percent.value=4-bar+"s"
    if (bar<3){
        setTimeout("count()",1000);
    }else{
        parent.location = "<?php echo $link;?>";
    }
}
</script>
</P>
</form>
</body>
</html>