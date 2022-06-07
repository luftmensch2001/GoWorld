<?php
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');

if (isset($_POST['idBlog'])) {
    if (BlogDTO::getInstance()->DeleteBlog($_POST['idBlog']))
        echo "<script>alert('Xóa blog mới thành công')</script>";
    header("Location:blogAdmin.php");
}
