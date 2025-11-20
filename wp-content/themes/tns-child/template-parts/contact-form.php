<div class="contact-box text-center">
    <div class="support-label">HỖ TRỢ 24/7</div>
    <h3 class="fw-bold mb-4">Bạn cần tư vấn hoặc liên hệ hợp tác?</h3>

    <!-- THÔNG BÁO SAU KHI SUBMIT -->
    <?php if (isset($_GET['success'])): ?>
        <?php if ($_GET['success'] == 1): ?>
            <div class="alert alert-success">Gửi yêu cầu thành công!</div>
        <?php else: ?>
            <div class="alert alert-danger">Gửi thất bại, vui lòng thử lại.</div>
        <?php endif; ?>
    <?php endif; ?>

    <form method="post" action="">
        <div class="row g-3 mb-3">
            <div class="col-md-6">
                <input type="text" name="name" class="form-control" placeholder="Tên của bạn" required>
            </div>
            <div class="col-md-6">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại" required>
            </div>
        </div>

        <div class="mb-3">
            <input type="text" name="subject" class="form-control" placeholder="Tiêu đề" required>
        </div>

        <div class="mb-4">
            <textarea name="message" class="form-control" rows="5" placeholder="Nội dung" required></textarea>
        </div>

        <button type="submit" name="submit_contact" class="btn btn-submit">Gửi yêu cầu</button>

        <p class="mt-3" style="font-size: 13px;">(*) Chúng tôi sẽ liên hệ bạn ngay khi nhận được thông tin</p>
    </form>
</div>


  <!-- MAP -->
  <?php 
$map = get_field('location_map'); 
if ($map) : 
?>
    <div class="acf-map" style="height: 500px; width: 100%">
      <?php echo $map; ?>
        
    </div>
<?php endif; ?>

  <style>
    .contact-box {
      background: #fff;
      padding: 40px;
      border-radius: 20px;
      box-shadow: 0 4px 25px rgba(0,0,0,0.08);
      max-width: 900px;
      margin: 50px auto;
    }

    .form-control {
      padding: 12px 15px;
      font-size: 15px;
      border-radius: 10px;
    }

    .btn-submit {
      background: #6b1d2d;
      color: #fff;
      padding: 10px 40px;
      border-radius: 10px;
    }

    .map-wrapper img {
      width: 100%;
      height: 50vh;
      display: block;
      margin-top: 50px;
    }

    .support-label {
      color: #d1a426;
      font-size: 13px;
      margin-bottom: 5px;
      letter-spacing: 1px;
    }
    iframe {
      width: 100% !important
    }
  </style>