
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Agency - Start Bootstrap Theme</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <style>
    .timeline-image img {
        width: 150px; /* Điều chỉnh chiều rộng */
        height: 150px; /* Điều chỉnh chiều cao */
        object-fit: cover; /* Cắt ảnh cho vừa khung */
    }
</style>
    <body id="page-top">

    <div id="carouselExampleIndicators" class="carousel slide mb-4" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/d4/f9/d4f9d5d80a7752f6af6049ebcf673c68.png" class="d-block w-100 rounded" alt="Slide 1">
            </div>
            <div class="carousel-item">
                <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/90/7f/907fc4bc1e2e84348c8921ae1e571fcd.png" class="d-block w-100 rounded" alt="Slide 2">
            </div>
            <div class="carousel-item">
                <img src="https://cdnv2.tgdd.vn/mwg-static/topzone/Banner/c0/a5/c0a5e9e8fb94a8abacf5ba9681ef2e55.png" class="d-block w-100 rounded" alt="Slide 3">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
         
    <section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Dịch Vụ</h2>
            <h3 class="section-subheading text-muted">Chúng tôi cung cấp các dịch vụ tốt nhất về laptop.</h3>
        </div>
        <div class="row text-center">
            <div class="col-md-4">
                <!-- <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-laptop fa-stack-0x fa-inverse"></i>
                </span> -->
                <h4 class="my-3">Bán Laptop</h4>
                <p class="text-muted">Chúng tôi cung cấp các mẫu laptop chất lượng cao, phù hợp với mọi nhu cầu từ học tập, làm việc đến chơi game.</p>
            </div>
            <div class="col-md-4">
                <!-- <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-tools fa-stack-1x fa-inverse"></i>
                </span> -->
                <h4 class="my-3">Sửa Chữa & Bảo Trì</h4>
                <p class="text-muted">Dịch vụ sửa chữa, nâng cấp và bảo trì laptop chuyên nghiệp, đảm bảo hiệu suất hoạt động ổn định.</p>
            </div>
            <div class="col-md-4">
                <!-- <span class="fa-stack fa-2x">
                    <i class="fas fa-circle fa-stack-2x text-primary"></i>
                    <i class="fas fa-shield-alt fa-stack-1x fa-inverse"></i>
                </span> -->
                <h4 class="my-3">Bảo Mật & Phần Mềm</h4>
                <p class="text-muted">Cài đặt phần mềm, bảo mật dữ liệu và tối ưu hóa hệ thống giúp laptop của bạn hoạt động tốt nhất.</p>
            </div>
        </div>
    </div>
</section>


        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">SẢN PHẨM</h2>
                    <!-- <h3 class="section-subheading text-muted">Lorem ipsu</h3> -->
                </div>
                <div class="container">


    <div class="row">
        <!-- Sản phẩm -->
        <div class="col-md-9">
            <div class="row">
                <?php
                foreach ($spnew as $sp) {
                    extract($sp);
                    $linksp = "index.php?act=sanphamct&idsp=" . $id;
                    $hinh = $img_path . $img;
                ?>
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <a href="<?= $linksp ?>">
                            <img src="<?= $hinh ?>" class="card-img-top img-fluid" alt="<?= $name ?>">
                        </a>
                        <div class="card-body text-center">
                            <p class="text-danger fw-bold">$<?= number_format($price, 0, ',', '.') ?></p>
                            <a href="<?= $linksp ?>" class="mac-name text-decoration-none"><?= $name ?></a>
                        </div>
                        <div class="card-footer bg-white text-center">
                            <form action="index.php?act=addtocart" method="post">
                                <input type="hidden" name="id" value="<?= $id ?>">
                                <input type="hidden" name="name" value="<?= $name ?>">
                                <input type="hidden" name="img" value="<?= $img ?>">
                                <input type="hidden" name="price" value="<?= $price ?>">
                                <button type="submit" name="addtocart" class="btn btn-primary btn-sm">Thêm Vào Giỏ Hàng</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php } ?>
                
            </div>
              <!-- Sản phẩm hot -->
  <div class="col-12">
        <div class="boxtitle bg-danger text-white py-2 px-3 mb-3">Sản Phẩm Hot</div>
        <div class="row g-3">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $img = $img_path . $img;

                echo '
                <div class="col-md-4 col-sm-6">
                    <div class="card h-100">
                        <a href="' . $linksp . '">
                            <img src="./' . $img . '" class="card-img-top" alt="' . $name . '">
                        </a>                      
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>

        </div>
        <!-- Sidebar (Box Right) -->
        <div class="col-md-3">
            <div class="p-3 bg-light rounded shadow-sm">
                <?php include "boxright.php"; ?>
            </div>
        </div>
    </div>
</div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Về Chúng Tôi</h2>
            <h3 class="section-subheading text-muted">Hành trình phát triển của MacBook Store.</h3>
        </div>
        <ul class="timeline">
            <li>
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="https://img.lovepik.com/free-png/20210918/lovepik-vectorial-business-computer-icon-png-image_400272545_wh1200.png" alt="Khai trương cửa hàng" />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2010</h4>
                        <h4 class="subheading">Khai Trương Cửa Hàng Đầu Tiên</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            Bắt đầu với một cửa hàng nhỏ chuyên cung cấp MacBook và linh kiện máy tính chính hãng, chúng tôi đặt nền móng cho sự phát triển sau này.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="https://img.lovepik.com/free-png/20210918/lovepik-vectorial-business-computer-icon-png-image_400272545_wh1200.png" alt="Mở rộng hệ thống" />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2015</h4>
                        <h4 class="subheading">Mở Rộng Hệ Thống</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            Chúng tôi mở rộng thêm nhiều chi nhánh tại các thành phố lớn, cung cấp sản phẩm và dịch vụ bảo hành chuyên nghiệp.
                        </p>
                    </div>
                </div>
            </li>
            <li>
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="https://img.lovepik.com/free-png/20210918/lovepik-vectorial-business-computer-icon-png-image_400272545_wh1200.png" alt="Ra mắt cửa hàng trực tuyến" />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2018</h4>
                        <h4 class="subheading">Ra Mắt Cửa Hàng Trực Tuyến</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            Nhằm đáp ứng nhu cầu mua sắm thuận tiện hơn, MacBook Store chính thức ra mắt website bán hàng trực tuyến với nhiều ưu đãi hấp dẫn.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <img class="rounded-circle img-fluid" src="https://img.lovepik.com/free-png/20210918/lovepik-vectorial-business-computer-icon-png-image_400272545_wh1200.png" alt="Đổi mới và phát triển" />
                </div>
                <div class="timeline-panel">
                    <div class="timeline-heading">
                        <h4>2023</h4>
                        <h4 class="subheading">Đổi Mới Và Phát Triển</h4>
                    </div>
                    <div class="timeline-body">
                        <p class="text-muted">
                            Liên tục cập nhật các dòng sản phẩm MacBook mới nhất, cải tiến dịch vụ và nâng cao trải nghiệm khách hàng.
                        </p>
                    </div>
                </div>
            </li>
            <li class="timeline-inverted">
                <div class="timeline-image">
                    <h4>
                        Hãy Trở Thành
                        <br />
                        Một Phần
                        <br />
                        Của Chúng Tôi!
                    </h4>
                </div>
            </li>
        </ul>
    </div>
</section>
<section class="page-section bg-light" id="team">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Đội Ngũ Tuyệt Vời Của Chúng Tôi</h2>
            <h3 class="section-subheading text-muted">Những con người đầy nhiệt huyết và chuyên môn cao.</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxz7qJ9pU6Xj2EJKaRDVz-9Bd0xh2LnMklGw&s" alt="..." />
                    <h4>Parveen Anand</h4>
                    <p class="text-muted">Trưởng nhóm Thiết kế</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxz7qJ9pU6Xj2EJKaRDVz-9Bd0xh2LnMklGw&s" alt="..." />
                    <h4>Diana Petersen</h4>
                    <p class="text-muted">Trưởng nhóm Marketing</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Diana Petersen LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="team-member">
                    <img class="mx-auto rounded-circle" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTxz7qJ9pU6Xj2EJKaRDVz-9Bd0xh2LnMklGw&s" alt="..." />
                    <h4>Larry Parker</h4>
                    <p class="text-muted">Trưởng nhóm Phát triển</p>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Twitter Profile"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-dark btn-social mx-2" href="#!" aria-label="Larry Parker LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <p class="large text-muted">Chúng tôi luôn nỗ lực không ngừng để mang đến những giải pháp sáng tạo và chất lượng nhất cho khách hàng.</p>
            </div>
        </div>
    </div>
</section>

        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://upload.wikimedia.org/wikipedia/commons/a/ac/Approve_icon.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://classic.vn/wp-content/uploads/2022/07/phone-icon-800x800.png" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://inkythuatso.com/uploads/thumbnails/800/2022/01/icon-dia-chi-inkythuatso-12-14-54-27.jpg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="https://static-00.iconduck.com/assets.00/settings-icon-1024x1022-x2c1qvd9.png" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        <section class="page-section" id="contact">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Liên Hệ Với Chúng Tôi</h2>
            <h3 class="section-subheading text-muted">Chúng tôi luôn sẵn sàng hỗ trợ bạn.</h3>
        </div>
        <form id="contactForm" data-sb-form-api-token="API_TOKEN">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Họ và Tên *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="name:required">Vui lòng nhập họ và tên.</div>
                    </div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Email của bạn *" data-sb-validations="required,email" />
                        <div class="invalid-feedback" data-sb-feedback="email:required">Vui lòng nhập email.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email không hợp lệ.</div>
                    </div>
                    <div class="form-group mb-md-0">
                        <!-- Phone number input-->
                        <input class="form-control" id="phone" type="tel" placeholder="Số điện thoại *" data-sb-validations="required" />
                        <div class="invalid-feedback" data-sb-feedback="phone:required">Vui lòng nhập số điện thoại.</div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group form-group-textarea mb-md-0">
                        <!-- Message input-->
                        <textarea class="form-control" id="message" placeholder="Nội dung tin nhắn *" data-sb-validations="required"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="message:required">Vui lòng nhập nội dung tin nhắn.</div>
                    </div>
                </div>
            </div>
            <!-- Submit success message-->
            <div class="d-none" id="submitSuccessMessage">
                <div class="text-center text-white mb-3">
                    <div class="fw-bolder">Gửi tin nhắn thành công!</div>
                    Chúng tôi sẽ liên hệ lại với bạn sớm nhất có thể.
                </div>
            </div>
            <!-- Submit error message-->
            <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Lỗi khi gửi tin nhắn!</div></div>
            <!-- Submit Button-->
            <div class="text-center"><button class="btn btn-primary btn-xl text-uppercase disabled" id="submitButton" type="submit">Gửi Tin Nhắn</button></div>
        </form>
    </div>
</section>

        <!-- Portfolio item 1 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/1.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Threads
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Illustration
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 2 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/2.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Explore
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Graphic Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 3 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/3.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Finish
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Identity
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 4 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/4.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Lines
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Branding
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 5 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/5.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Southwest
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Website Design
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio item 6 modal popup-->
        <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase">Project Name</h2>
                                    <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/6.jpg" alt="..." />
                                    <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Client:</strong>
                                            Window
                                        </li>
                                        <li>
                                            <strong>Category:</strong>
                                            Photography
                                        </li>
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Close Project
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
