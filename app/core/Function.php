<?php
// Hàm format tiền Việt Nam
function currency_format($number, $suffix = 'đ')
{
    if (!empty($number)) {
        return number_format($number, 0, ',', '.') . "{$suffix}";
    }
}

function checkLogin()
{
    if (!isset($_SESSION['authentication']) || $_SESSION['authentication'] != "yes") {
        // Nếu người dùng chưa đăng nhập, chuyển hướng họ đến trang đăng nhập
        header('Location: /login');
    }
}
