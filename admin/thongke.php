<?php
// thongke.php
$total_orders = get_total_orders(); // Hàm lấy tổng số đơn hàng từ cơ sở dữ liệu
$total_revenue = get_total_revenue(); // Hàm lấy tổng tiền đã đặt từ cơ sở dữ liệu

$total_products = get_total_products();
$total_categories = get_total_categories();
$total_users = get_total_users();
$total_comments = get_total_comments();
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống kê</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Thống kê hệ thống</h2>
        
        <ul class="list-group mb-4">
            <li class="list-group-item list-group-item-primary">
                <strong>Tổng số sản phẩm:</strong> <?php echo $total_products; ?>
            </li>
            <li class="list-group-item list-group-item-success">
                <strong>Tổng số danh mục:</strong> <?php echo $total_categories; ?>
            </li>
            <li class="list-group-item list-group-item-warning">
                <strong>Tổng số người dùng:</strong> <?php echo $total_users; ?>
            </li>
            <li class="list-group-item list-group-item-danger">
                <strong>Tổng số bình luận:</strong> <?php echo $total_comments; ?>
            </li>
            <li class="list-group-item list-group-item-info">
                <strong>Tổng số đơn hàng:</strong> <?php echo $total_orders; ?>
            </li>
            <li class="list-group-item list-group-item-secondary">
                <strong>Tổng tiền đã bán:</strong> <?php echo number_format($total_revenue, 0, ',', '.'); ?> VNĐ
            </li>
        </ul>

        <canvas id="statisticsChart" width="400" height="200"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('statisticsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar', // Loại biểu đồ: 'bar', 'line', 'pie', etc.
            data: {
                labels: ['Sản phẩm', 'Danh mục', 'Người dùng', 'Bình luận', 'Đơn hàng', 'Doanh thu'],
                datasets: [{
                    label: 'Số lượng',
                    data: [<?php echo $total_products; ?>, <?php echo $total_categories; ?>, <?php echo $total_users; ?>, <?php echo $total_comments; ?>, <?php echo $total_orders; ?>, <?php echo $total_revenue; ?>],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>