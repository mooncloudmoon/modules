<?php
header("content-type:text/html;charset=utf-8");
require_once("../src/upload_procedure_oriented.php");
$fileinfo = $_FILES;//print_r($fileinfo);exit;
upload_files($fileinfo);