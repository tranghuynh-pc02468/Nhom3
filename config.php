<?php
$UPLOAD_URL = "../upload/";
$img_path = "../upload/";
$mgs = '';


/**
 * lưu file upload vào thư mục
 * @param string $filename là tên trường file
 * @param string $target_dir thư mục lưu file
 * @return $filename tên file upload
 */
function save_file($fieldname, $target_dir)
{
    $file_uploaded = $_FILES[$fieldname];
    $file_name = basename($file_uploaded["name"]);
    $target_path = $target_dir . $file_name;
    move_uploaded_file($file_uploaded["tmp_name"], $target_path);
    return $file_name;
}



