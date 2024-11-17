<?php
   //nhúng vào các trang bán hàng
   if(isset($message)){ // hiển thị thông báo sau khi thao tác với biến message được gán giá trị
      foreach($message as $msg){
         echo '
         <div class=" alert alert-info alert-dismissible fade show" role="alert">
            <span style="font-size: 16px;">'.$msg.'</span>
            <i style="font-size: 20px; cursor: pointer" class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
      }
   }
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="./css/new_style.css">

<style>
   .changepw-btn {
    border-radius: 4px;
    font-size: 20px;
    background: blue;
    color: #fff;
    padding: 7px 12px;
 }
 .changepw-btn:hover {
    opacity: 0.7;
 }
 .header .header-2 .flex .navbar a:hover,
 .header .header-2 .flex .icons > *:hover,
 .header .header-2 .flex .user-box p span {
    color: #0D6EFD !important;
}
</style>

<header class="header">
   <div class="header-2">
      <div class="flex">
         <a href="doctor_profile.php" class="logo"><img width="80px" height="80px" src="./image/logo-hospital.png"></a>

         <nav class="navbar">
            <a href="doctor_profile.php">Hồ sơ cá nhân</a>
            <a href="doctor_schedule.php">Quản lý lịch</a>
            <a href="doctor_view_profile.php">Quản lý bệnh nhân</a>
         </nav>

         <div class="icons">
            <div id="menu-btn" class="fas fa-bars"></div>
            <div id="user-btn" class="fas fa-user"></div>
         </div>

         <div class="user-box" style="z-index: 100;">
            <p>Email : <span><?php echo $_SESSION['doctor_email']; ?></span></p>
            <a href="change_password_doctor.php" class="changepw-btn">Đổi mật khẩu</a>
            <a style="margin-top: 13px;" href="logout.php" class="delete-btn">Đăng xuất</a>
         </div>
      </div>
   </div>

</header>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>