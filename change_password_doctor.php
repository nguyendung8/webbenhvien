<?php
   include 'config.php';

   session_start();

   // Assuming you're storing user ID in session as 'user_id' for both bệnh_nhan and bac_si
   $user_id = @$_SESSION['patient_id'] ? @$_SESSION['patient_id'] : @$_SESSION['doctor_id'];

   if(!isset($user_id)){ // Check if the session doesn't have user_id
      header('location:login.php'); // Redirect to login page if session doesn't exist
      exit;
   }

   if (isset($_POST['submit'])) {
        $old_password =  mysqli_real_escape_string($conn, md5($_POST['old_password'])); // Hash the old password using md5
        $new_password =  mysqli_real_escape_string($conn, md5($_POST['new_password'])); // Hash the new password

        // Check if the old password is correct
        $checkOldPasswordQuery = "SELECT mat_khau FROM nguoi_dung WHERE id = $user_id";
        $result = $conn->query($checkOldPasswordQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashedPassword = $row["mat_khau"];
    
            // Check if the old password matches
            if ($hashedPassword === $old_password) {
                // Old password is correct, update with the new password
                $updatePasswordQuery = "UPDATE nguoi_dung SET mat_khau = '$new_password' WHERE id = $user_id";
                
                if ($conn->query($updatePasswordQuery) === TRUE) {
                    $message[] = 'Đổi mật khẩu thành công';
                } else {
                    $message[] = 'Đổi mật khẩu không thành công';
                }
            } else {
                $message[] = 'Mật khẩu cũ không đúng, vui lòng nhập lại';
            }
        } else {
            $message[] = 'Không tìm thấy người dùng';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đổi mật khẩu</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
   <link rel="stylesheet" href="css/style.css">
   <style>
    .change-password {
        width: fit-content;
        margin: auto;
        font-size: 20px;
        border: 1px solid #ddd;
        padding: 25px;
        margin-top: 32px;
        margin-bottom: 32px;
        border-radius: 5px;
        box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
    }
    .cp-title {
        font-size: 25px;
        text-align: center;
    }
    .submit-btn {
        display: flex;
        margin: auto;
    }
    .form-control {
        height: 45px;
        font-size: 20px;
        width: 400px !important;
    }
   </style>
</head>
<body>
   
<?php include 'doctor_header.php'; ?>
<div class="change-password">
    <h1 class="cp-title">Đổi mật khẩu</h1>
    <form method="POST">
    <div class="form-group">
        <label>Mật khẩu cũ</label>
        <input type="password" name="old_password" class="form-control" placeholder="Nhập mật khẩu cũ" required>
    </div>
    <div class="form-group">
        <label>Mật khẩu mới</label>
        <input type="password" name="new_password" class="form-control" placeholder="Nhập mật khẩu mới" required>
    </div>
    <input type="submit" name="submit" style="padding: 10px 13px; text-decoration: none; font-size: 18px; margin-bottom: 7px; border-radius: 4px; display: flex; margin: auto;" class="btn-primary flex" value="Cập nhật">
    </form>
</div>

<script src="js/script.js"></script>

</body>
</html>
