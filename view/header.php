
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Macbook Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        /* Cập nhật thanh navbar */
        .navbar-custom {
            background-color: #666f79;
        }
        .navbar-brand {
            margin-right: auto;
        }
        .navbar-nav {
            flex-grow: 1;
            justify-content: flex-end;
        }
        .search-bar input {
            border-radius: 20px;
            padding: 0.5rem;
        }
        .search-bar button {
            border-radius: 20px;
            padding: 0.5rem 1rem;
            background-color: #666f79;
            border: none;
            color: white;
        }
        .icon-link {
            color: white;
            font-size: 1.5rem;
            margin-left: 15px;
        }
        .icon-link:hover {
            color: #e3e3e3;
        }
        .navbar {
            width: 100%;
        }
        .container {
            max-width: 1200px;
        }
        .navbar-brand {
            font-family: 'Poppins', sans-serif;
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff;
            text-decoration: none;
            display: flex;
            align-items: center;
            transition: color 0.3s ease;
        }
        .navbar-brand i {
            font-size: 2rem;
            color: #007bff;
            transition: transform 0.3s ease;
        }
        .navbar-brand span {
            margin-left: 0.5rem;
            color: #ffffff;
        }
        .navbar-brand:hover i {
            transform: rotate(20deg);
            color: #0056b3;
        }
        .navbar-brand:hover {
            color: #0056b3;
        }
        .form-select {
    width: 100%;
    padding: 10px;
    font-size: 1rem;
    border-radius: 5px;
    border: 1px solid #ccc;
    background-color: #fff;
    cursor: pointer;
}

.form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
}

    </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-custom py-2">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="fa-brands fa-apple me-2"></i>
                <span>MacBook Store</span>
            </a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
    <li class="nav-item"><a class="nav-link" href="index.php">Trang Chủ</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php?act=hoidap">Hỏi Đáp</a></li>
    <li class="nav-item"><a class="nav-link" href="index.php?act=gioithieu">Giới Thiệu</a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="index.php?act=lienhe">Liên Hệ</a></li> -->
    <!-- <li class="nav-item"><a class="nav-link" href="index.php?act=nhanxet">Nhận Xét</a></li> -->
    <li class="nav-item"><a class="nav-link" href="index.php?act=mybill">Đơn Hàng Của Tôi</a></li>
    
    <!-- Dropdown Danh Mục -->
    <li class="nav-item">
    <select class="form-select ms-3" id="categorySelect" onchange="navigateToCategory()">
        <option value="">🔽 Chọn danh mục</option>
        <?php if (!empty($dsdm)): ?>
            <?php foreach ($dsdm as $dm): ?>
                <option value="index.php?act=sanpham&iddm=<?= $dm['id'] ?>">
                    <?= htmlspecialchars($dm['name']) ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="" disabled>Không có danh mục</option>
        <?php endif; ?>
    </select>
</li>

</ul>

                <!-- Search Bar -->
                <form action="index.php?act=timkiem" method="post" class="d-flex ms-3 search-bar">
                    <input class="form-control me-2" type="search" placeholder="Tìm kiếm..." name="search" required>
                    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                </form>

                <!-- Icons -->
                <div class="d-flex align-items-center ms-3">
                    <a href="index.php?act=addtocart" class="icon-link me-3"><i class="fas fa-shopping-cart"></i></a>
                    
                    <?php if (isset($_SESSION['user']) && is_array($_SESSION['user']) && isset($_SESSION['user']['name'])) { ?>
                        <a href="index.php?act=getuserinfo" class="icon-link me-3">
                            <?php echo htmlspecialchars($_SESSION['user']['name']); ?>
                        </a>
                    <?php } else { ?>
                        <a href="index.php?act=dangnhapuser" class="icon-link"><i class="fas fa-user"></i></a>
                    <?php } ?>
                    <li class="list-group-item">
                    <a class="text-decoration-none text-dark" href="index.php?act=logout">Đăng xuất</a>
                </li>
                </div>
            </div>
        </div>
    </nav>
    <script>
function navigateToCategory() {
    var select = document.getElementById("categorySelect");
    var selectedValue = select.value;
    if (selectedValue) {
        window.location.href = selectedValue;
    }
}
</script>
</body>
</html>
