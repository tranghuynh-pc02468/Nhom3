<?php

$id = $_GET['id'];
$db = new category();
$del = $db->getDeLeTe($id);

header('location:index.php?page=listcategory');

