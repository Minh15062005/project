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
    margin-right: auto; /* Đảm bảo logo căn trái */
}

.navbar-nav {
    flex-grow: 1; /* Để các liên kết trải rộng và căn phải */
    justify-content: flex-end; /* Các liên kết sẽ căn phải */
}

/* Search bar */
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

/* Các biểu tượng và tài khoản người dùng */
.icon-link {
    color: white;
    font-size: 1.5rem;
    margin-left: 15px;
}

.icon-link:hover {
    color: #e3e3e3;
}

/* Đảm bảo navbar chiếm hết chiều rộng màn hình */
.navbar {
    width: 100%;
}

.container {
    max-width: 1200px; /* Giới hạn chiều rộng của container */
}
.navbar-brand {
    font-size: 2rem; /* Tăng kích thước văn bản */
    font-weight: bold; /* Làm đậm văn bản */
}

.navbar-brand i {
    font-size: 2.5rem; /* Tăng kích thước biểu tượng */
    margin-right: 0.5rem; /* Điều chỉnh khoảng cách giữa biểu tượng và văn bản */
}

.navbar-brand span {
    font-size: 2rem; /* Tăng kích thước văn bản để nó tương thích với biểu tượng */
    color: white; /* Đảm bảo màu chữ là trắng để nổi bật trên nền tối */
}
.nav-item .nav-link {

    font-size: 15px; /* Kích thước chữ */
    font-weight: 500; /* Độ đậm của chữ */
    color: #ffffff; /* Màu chữ */
    text-transform: uppercase; /* Chữ hoa */
    letter-spacing: 1px; /* Khoảng cách giữa các chữ cái */
    transition: color 0.3s ease; /* Hiệu ứng khi hover */
}

.nav-item .nav-link:hover {
    color: #007bff; /* Đổi màu khi hover */
    text-decoration: none; /* Bỏ gạch chân */
}
.navbar-brand {
    font-family: 'Poppins', sans-serif; /* Chọn font đẹp */
    font-size: 1.8rem; /* Kích thước chữ lớn */
    font-weight: bold; /* Chữ đậm */
    color: #ffffff; /* Màu chủ đạo */
    text-decoration: none; /* Bỏ gạch chân */
    display: flex;
    align-items: center;
    transition: color 0.3s ease; /* Hiệu ứng hover */
}

.navbar-brand i {
    font-size: 2rem; /* Kích thước icon lớn hơn chữ */
    color: #007bff; /* Màu xanh nhấn mạnh */
    transition: transform 0.3s ease; /* Hiệu ứng khi hover icon */
}

.navbar-brand span {
    margin-left: 0.5rem; /* Khoảng cách giữa icon và text */
    color: #ffffff; /* Màu chữ đen */
}

.navbar-brand:hover i {
    transform: rotate(20deg); /* Xoay icon khi hover */
    color: #0056b3; /* Thay đổi màu icon khi hover */
}

.navbar-brand:hover {
    color: #0056b3; /* Thay đổi màu text khi hover */
}

   </style>
</head>
<body>
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-custom py-2">
        <div class="container-fluid"> <!-- Thay container bằng container-fluid để chiếm toàn bộ chiều rộng màn hình -->
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <i class="fa-brands fa-apple me-2"></i>
                <span>MacBoock Store </span>
            </a>

            <!-- Toggle Button for Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-white"><i class="fas fa-bars"></i></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Trang Chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=hoidap">Hỏi Đáp</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=gioithieu">Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=lienhe">Liên Hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?act=nhanxet">Nhận Xét</a>
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
                    <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
                        <a href="index.php?act=getuserinfo" class="icon-link me-3">
                            <?php echo $_SESSION['user']['name']; ?>
                        </a>
                    <?php } else { ?>
                        <a href="index.php?act=dangnhapuser" class="icon-link"><i class="fas fa-user"></i></a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</body>
