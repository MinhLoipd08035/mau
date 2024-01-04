  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
  <link rel="stylesheet" href="wiew/css/footer.css">
  <footer id="dk-footer" class="dk-footer">
      <div class="container">
          <div class="row">
              <div class="col-md-12 col-lg-4">
                  <div class="dk-footer-box-info">
                      <a href="index.html" class="footer-logo">
                          <img src="wiew/img/logo_duan.png" alt="footer_logo" class="img-fluid">
                      </a>
                      <p class="footer-info-text">
                          "Thời gian luôn chạy, hãy bắt đầu từ chiếc Apple Watch của bạn!"
                      </p>
                      <div class="footer-social-link">
                          <h3>Follow us</h3>
                          <ul>
                              <li>
                                  <a href="#">
                                      <i class="fa fa-facebook"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <i class="fa fa-twitter"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <i class="fa fa-google-plus"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <i class="fa fa-linkedin"></i>
                                  </a>
                              </li>
                              <li>
                                  <a href="#">
                                      <i class="fa fa-instagram"></i>
                                  </a>
                              </li>
                          </ul>
                      </div>
                      <!-- End Social link -->
                  </div>
                  <!-- End Footer info -->
                  <div class="footer-awarad">
                      <img src="images/icon/best.png" alt="">

                  </div>
              </div>
              <!-- End Col -->
              <div class="col-md-12 col-lg-8">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="contact-us">
                              <div class="contact-icon">
                                  <i class="fa fa-map-o" aria-hidden="true"></i>
                              </div>
                              <!-- End contact Icon -->
                              <div class="contact-info">
                                  <h3>Đà Nẵng</h3>
                                  <p>137 Nguyễn Thị Thập</p>
                              </div>
                              <!-- End Contact Info -->
                          </div>
                          <!-- End Contact Us -->
                      </div>
                      <!-- End Col -->
                      <div class="col-md-6">
                          <div class="contact-us contact-us-last">
                              <div class="contact-icon">
                                  <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                              </div>
                              <!-- End contact Icon -->
                              <div class="contact-info">
                                  <h3>037 8566 916</h3>
                                  <p>Gọi cho chúng tôi</p>
                              </div>
                              <!-- End Contact Info -->
                          </div>
                          <!-- End Contact Us -->
                      </div>
                      <!-- End Col -->
                  </div>
                  <!-- End Contact Row -->
                  <div class="row">
                      <div class="col-md-12 col-lg-6">
                          <div class="footer-widget footer-left-widget">
                              <div class="section-heading">
                                  <h3>Liên Kết</h3>
                                  <span class="animate-border border-black"></span>
                              </div>
                              <ul>
                                  <li>
                                      <a href="#">Giới Thiệu</a>
                                  </li>
                                  <li>
                                      <a href="#">Dịch vụ</a>
                                  </li>
                              </ul>
                              <ul>
                                  <li>
                                      <a href="#">Blog</a>
                                  </li>
                              </ul>
                          </div>
                          <!-- End Footer Widget -->
                      </div>
                      <!-- End col -->
                      <div class="col-md-12 col-lg-6">
                          <div class="footer-widget">
                              <div class="section-heading">
                                  <h3>Đặt mua</h3>
                                  <span class="animate-border border-black"></span>
                              </div>
                              <p>
                                  Đừng bỏ lỡ các sản phẩm mới của chúng tôi, vui lòng điền vào mẫu bên dưới.</p>
                              <form action="#">
                                  <div class="form-row">
                                      <div class="col dk-footer-form">
                                          <input type="email" class="form-control" placeholder="Địa chỉ email">
                                          <button type="submit">
                                              <i class="fa fa-send"></i>
                                          </button>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="copyright">
          <div class="container">
              <div class="row">
                  <div class="col-md-6">
                      <span>Nguyễn Tấn Minh Lợi PD08035</span>
                  </div>
                  <!-- End Col -->
                  <div class="col-md-6">
                      <div class="copyright-menu">
                          <ul>
                              <li>
                                  <a href="#">Trang chủ</a>
                              </li>
                              <li>
                                  <a href="#">Chính sách bảo mật</a>
                              </li>
                              <li>
                                  <a href="#">Liên hệ</a>
                              </li>
                          </ul>
                      </div>
                  </div>
                  <!-- End col -->
              </div>
              <!-- End Row -->
          </div>
          <!-- End Copyright Container -->
      </div>
      <!-- Back to top -->
      <div id="back-to-top" class="back-to-top">
          <button class="btn btn-dark" title="Back to Top" style="display: block;">
              <i class="fa fa-angle-up"></i>
          </button>
      </div>
      <!-- End Back to top -->
  </footer>
  <script>
      let slideIndex = 1;
      showSlides(slideIndex);

      function plusSlides(n) {
          showSlides(slideIndex += n);
      }

      function currentSlide(n) {
          showSlides(slideIndex = n);
      }

      function showSlides(n) {
          let i;
          let slides = document.getElementsByClassName("mySlides");
          let dots = document.getElementsByClassName("demo");
          let captionText = document.getElementById("caption");
          if (n > slides.length) {
              slideIndex = 1
          }
          if (n < 1) {
              slideIndex = slides.length
          }
          for (i = 0; i < slides.length; i++) {
              slides[i].style.display = "none";
          }
          for (i = 0; i < dots.length; i++) {
              dots[i].className = dots[i].className.replace(" active", "");
          }
          slides[slideIndex - 1].style.display = "block";
          dots[slideIndex - 1].className += " active";
          captionText.innerHTML = dots[slideIndex - 1].alt;
      }

      // Tự động chuyển đổi slide sau một khoảng thời gian
      let autoSlideInterval;

      function startAutoSlide() {
          autoSlideInterval = setInterval(function() {
              plusSlides(1); // Chuyển đến slide tiếp theo sau một khoảng thời gian
          }, 5000); // Đổi 5000 thành khoảng thời gian bạn muốn giữa các slide (đơn vị là mili giây)
      }

      // Bắt đầu tự động chuyển đổi slide khi trang web được tải
      startAutoSlide();

      // Dừng tự động chuyển đổi slide khi người dùng tương tác với các nút prev và next
      document.querySelector('.prev').addEventListener('click', function() {
          clearInterval(autoSlideInterval);
      });
      document.querySelector('.next').addEventListener('click', function() {
          clearInterval(autoSlideInterval);
      });
  </script>

  </body>

  </html>