<?php
require_once './library/carbon/autoload.php';

use Carbon\Carbon;

class AnalyticsModel extends Database {

    public function weeklyProductStatistics()
    {
        $sql = "SELECT name, created_at FROM products";
        try {
            // Thực hiện truy vấn
            $result = $this->conn->query($sql);

            // Kiểm tra kết quả truy vấn
            if ($result === false) {
                throw new Exception("Lỗi truy vấn: " . $mysqli->error);
            }
            // Lấy kết quả dưới dạng mảng kết hợp
            $products = $result->fetch_all(MYSQLI_ASSOC);

            // Khởi tạo mảng để lưu trữ số lượng sản phẩm theo tuần và năm
            $weeklyCounts = [];

            // Lặp qua mỗi sản phẩm để thống kê
            foreach ($products as $product) {
                $entryDate = Carbon::parse($product['created_at']);
                $weekNumber = $entryDate->weekOfYear;
                $month = $entryDate->month;
                $year = $entryDate->year;
                $day = $entryDate->day;

                // Tăng số lượng sản phẩm nhập vào trong tháng, tuần và năm tương ứng
                $weekIdentifier = "Tuần $weekNumber, Ngày $day, Tháng $month, Năm $year";
                if (!isset($weeklyCounts[$weekIdentifier])) {
                    $weeklyCounts[$weekIdentifier] = 1;
                } else {
                    $weeklyCounts[$weekIdentifier]++;
                }
            }
            return $weeklyCounts;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }


}
