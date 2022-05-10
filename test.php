<?php
$link="https://game.gcg.moe/bw21/main.php?";
$i = count($_GET);
foreach ($_GET as $key => $value) {
    if ($i == 1) {
        $link .= $key . "=" . $value;
    } else {
        $link .= $key . "=" . $value . "&";
    }
    $i --;
}
echo $link;
?>