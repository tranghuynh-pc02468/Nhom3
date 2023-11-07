<?php
$id = $_GET['id'];
$users = new users();
$restart = $users->getDeLeTe($id);
header('location: index.php?act=listcomment')
?>
