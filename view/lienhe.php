
    <style>
        .contact-form {
            max-width: 100%;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            border: 1px solid #ddd;
        }
        .contact-form input, .contact-form textarea {
            width: 100%;
            margin-bottom: 15px;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .contact-form button {
            padding: 10px 15px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>


    <!-- Liên Hệ Content -->
    <div class="container my-5">
        <h2 class="mb-4">Liên Hệ</h2>
        <p>Chúng tôi luôn sẵn sàng hỗ trợ bạn. Vui lòng điền thông tin dưới đây và chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.</p>

        <!-- Contact Form -->
        <div class="contact-form">
            <form action="index.php?act=lienhe" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Họ Tên</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Nội Dung</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn">Gửi Thông Tin</button>
            </form>
        </div>
    </div>