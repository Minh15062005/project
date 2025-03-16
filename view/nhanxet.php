
    <style>
        /* Cách hiển thị nhận xét */
        .review-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .review-card .reviewer-name {
            font-weight: bold;
        }
        .review-card .review-content {
            margin-top: 10px;
            padding: 10px;
            background-color: #e9f7fd;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>

    <!-- Nhận Xét Content -->
    <div class="container my-5">
        <h2 class="mb-4">Nhận Xét</h2>

        <!-- Nhận xét 1 -->
        <div class="review-card">
            <div class="reviewer-name">Nguyễn Minh Tuấn</div>
            <div class="review-content">Sản phẩm tuyệt vời! MacBook Pro cực kỳ mạnh mẽ, tôi rất hài lòng về hiệu suất.</div>
        </div>

        <!-- Nhận xét 2 -->
        <div class="review-card">
            <div class="reviewer-name">Phương Anh</div>
            <div class="review-content">MacBook Air rất nhẹ và dễ dàng mang theo. Tuy nhiên, tôi mong đợi pin lâu hơn một chút.</div>
        </div>

        <!-- Form nhận xét -->
        <div class="card mt-4">
            <div class="card-header">Gửi Nhận Xét Của Bạn</div>
            <div class="card-body">
                <form action="index.php?act=nhanxet" method="POST">
                    <div class="mb-3">
                        <label for="review" class="form-label">Nhận xét của bạn</label>
                        <textarea class="form-control" id="review" name="review" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi Nhận Xét</button>
                </form>
            </div>
        </div>
    </div>