
    <style>
        /* Thêm phong cách cho phần câu hỏi và trả lời */
        .question-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #f9f9f9;
        }
        .question-card .question {
            font-weight: bold;
        }
        .answer {
            margin-left: 20px;
            margin-top: 10px;
            padding: 10px;
            background-color: #e9f7fd;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
 
    <!-- Hỏi Đáp Content -->
    <div class="container my-5">
        <h2 class="mb-4">Hỏi Đáp</h2>

        <!-- Câu hỏi 1 -->
        <div class="question-card">
            <div class="question">MacBook Pro có thể nâng cấp RAM không?</div>
            <div class="answer">
                Câu trả lời: MacBook Pro không thể nâng cấp RAM sau khi mua. RAM là một phần của bo mạch chủ và được soldered vào. Hãy chọn cấu hình phù hợp ngay từ đầu.
            </div>
        </div>

        <!-- Câu hỏi 2 -->
        <div class="question-card">
            <div class="question">MacBook Air có thể chạy phần mềm Windows không?</div>
            <div class="answer">
                Câu trả lời: Có, bạn có thể cài Windows trên MacBook Air bằng Boot Camp hoặc phần mềm ảo hóa như Parallels Desktop.
            </div>
        </div>

        <!-- Form hỏi -->
        <div class="card mt-4">
            <div class="card-header">Gửi Câu Hỏi Của Bạn</div>
            <div class="card-body">
                <form action="index.php?act=hoidap" method="POST">
                    <div class="mb-3">
                        <label for="question" class="form-label">Câu hỏi</label>
                        <textarea class="form-control" id="question" name="question" rows="4" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Gửi Câu Hỏi</button>
                </form>
            </div>
        </div>
    </div>