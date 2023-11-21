

<?php
$id = $_GET['id'];
// echo $id;
$data = new comments();
$restart = $data->getDeLeTe($id);
header('location: index.php?page=listcomment');
?>