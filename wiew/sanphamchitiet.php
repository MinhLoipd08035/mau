<?php
extract($chitietsp);
$gia = number_format((int)$con_hh, 0, '.', '.');
$giagiam = number_format((int)$don_gia, 0, '.', '.');
$ma_hh2 = $ma_hh;
?>
<div class="chitietsp">
  <div class="hinhsp">
    <?php foreach ($lay_hinh as $hinh_slide) {
      extract($hinh_slide);
      if (is_file("upload/" . $hinh_chi_tiet)) {
        $hinhxuat_slide = "<img src='upload/" . $hinh_chi_tiet . "' width='60%'>";
      } else {
        $hinhxuat_slide = "no photo";
      }
    ?>
      <div class="slide">
        <div class="image-container">
          <?php echo $hinhxuat_slide; ?>
        </div>
      </div>

    <?php } ?>

    <a class="prev" onclick="plusSlides(-1)">❮</a>
    <a class="next" onclick="plusSlides(1)">❯</a>


    <div style="margin-top: 20px;" class="row">
      <?php
      $slideIndex = 1; // Biến để lưu trạng thái hiện tại của slide
      foreach ($lay_hinh as $hinh_slide) {
        extract($hinh_slide);
        if (is_file("upload/" . $hinh_chi_tiet)) {
          $hinhxuat_slide1 = "<img class='demo cursor' src='upload/" . $hinh_chi_tiet . "' style='width:100%' onclick='currentSlide(" . $slideIndex . ")' alt='The Woods'>";
        } else {
          $hinhxuat_slide1 = "no photo";
        }
      ?>
        <div class="column">
          <?php echo $hinhxuat_slide1; ?>
        </div>
      <?php
        $slideIndex++; // Tăng giá trị của biến slideIndex sau mỗi lần chạy
      }
      ?>

    </div>
  </div>
  <div class="dathang">
    <h4><?php if (isset($ten_hh) && ($ten_hh != '')) echo $ten_hh; ?></h4>
    <hr>
    <p><span style="color: red; font-weight: bold;"><?php if (isset($gia) && ($gia != '')) echo $gia; ?>đ</span>
      <del><?php if (isset($giagiam) && ($giagiam != '')) echo $giagiam; ?>đ</del>
    </p>
    <div class="cauhinh">
      <!-- cau hinh may -->
      <?php if (isset($thong_tin_hh) && ($thong_tin_hh != '')) echo $thong_tin_hh; ?>
    </div>
    <form action="index.php?act=muahang" method="post">
      <div class="soluong">
        <span class="decrement">-</span>
        <input type="number" name="soluong" value="1" min="1">
        <span class="increment">+</span>
      </div>
      <?php
      if (isset($_SESSION['khach_hang'])) {
        $ma_kh = $_SESSION['khach_hang']['ma_kh'];
      } else {
        $ma_kh = "nguoi_ngoai";
      }
      ?>
      <input type="hidden" name="ma_kh" value="<?php echo $ma_kh; ?>">
      <input type="hidden" name="ma_hh" value="<?php echo $ma_hh2; ?>">
      <input type="hidden" name="ten_hh" value="<?php echo $ten_hh; ?>">
      <input type="hidden" name="hinh" value="<?php echo $hinh; ?>">
      <input type="hidden" name="gia" value="<?php echo $con_hh; ?>">
      <input type="submit" value="ĐẶT HÀNG" name="mua_hang" class="submit-button">
    </form>
  </div>
</div>
<div class="motasp">
  <!-- mo ta sp -->
  <?php if (isset($mo_ta) && ($mo_ta != '')) echo $mo_ta; ?>
</div>
<h3 style="width: 1300px;margin:0 auto;color:black;">SẢN PHẨM LIÊN QUAN</h3>
<div class="splienquan">
  <!-- sp cùng lien quan -->
  <?php
  foreach ($sp_cungloai as $cungloai) {
    extract($cungloai);
    # code...
    $gia = number_format((int)$con_hh, 0, '.', '.');
    $giagiam = number_format((int)$don_gia, 0, '.', '.');
    $link_sp = "index.php?act=sanphamchitiet&ma_hh=" . $ma_hh;
    if (is_file("upload/" . $hinh)) {
      $hinhxuat = "<img src='upload/" . $hinh . " '>";
    } else {
      $hinhxuat = "no photo";
    }
  ?>
    <div class="boxsp">
      <a href="<?php echo $link_sp; ?>">
        <div style="margin-bottom: 10px;"><?php echo $hinhxuat; ?></div>
      </a>
      <a href="<?php echo $link_sp; ?>"><?php echo $ten_hh; ?></a>
      <p style="margin-top: 10px;"><span style="color: red; font-weight: bold;"><?php echo $gia; ?>đ</span><del><?php echo $giagiam; ?>đ</del></p>

    </div>

  <?php } ?>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $("#binh_luan").load("wiew/binhluan/binhluan.php", {
      idpro: <?= $ma_hh2 ?>
    });
  });
</script>
<div class="binhluan">
  <h3 style="width: 1300px;margin:0 auto;color:black;">Bình luận</h3>
  <div id="binh_luan">

  </div>
</div>
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
    let slides = document.getElementsByClassName("slide");
    let dots = document.getElementsByClassName("demo");

    if (n > slides.length) {
      slideIndex = 1;
    }

    if (n < 1) {
      slideIndex = slides.length;
    }

    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
  }

  // Tự động chuyển đổi slide sau một khoảng thời gian
  let autoSlideInterval;

  function startAutoSlide() {
    autoSlideInterval = setInterval(function() {
      plusSlides(1); // Chuyển đến slide tiếp theo sau một khoảng thời gian
    }, 4000); // Đổi 4000 thành khoảng thời gian bạn muốn giữa các slide (đơn vị là mili giây)
  }

  // Bắt đầu tự động chuyển đổi slide khi trang web được tải
  window.addEventListener('load', function() {
    startAutoSlide();
  });

  // Dừng tự động chuyển đổi slide khi người dùng tương tác với các nút prev và next
  document.querySelector('.prev').addEventListener('click', function() {
    clearInterval(autoSlideInterval);
  });

  document.querySelector('.next').addEventListener('click', function() {
    clearInterval(autoSlideInterval);
  });
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    const decrementBtn = document.querySelector(".decrement");
    const incrementBtn = document.querySelector(".increment");
    const input = document.querySelector("input[type='number']");

    decrementBtn.addEventListener("click", function() {
      if (input.value > 1) {
        input.value = parseInt(input.value) - 1;
      }
    });

    incrementBtn.addEventListener("click", function() {
      input.value = parseInt(input.value) + 1;
    });
  });
</script>