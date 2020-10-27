<?php
session_start();
//khởi đông session



//thêm thông báo lỗi
ini_set ('display_errors', 1);  
ini_set ('display_startup_errors', 1);  
error_reporting (E_ALL);  
require_once 'function.php';

// lấy thông tin user đã đăng nhập
$currentUser = getCurentUser();