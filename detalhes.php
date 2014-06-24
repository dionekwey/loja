<script>
function fecha(){
window.close();
}
</script>

<?php
$img = isset($_GET['img'])? $_GET['img']:'';
$cat = isset($_GET['cat'])? $_GET['cat']:'';

echo "<div align=center><img src=$img width=400 height=400 onclick=fecha();></div>";

setcookie("cat",$cat, time()+3600*24); // 24h
?>