<?php include("../config/constants.php")?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Quản lý Danh Bạ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
    <section class="vh-100">
        <div class="w-50 py-5 h-100 m-auto">
            <div class="row d-flex align-items-center justify-content-center h-100 border rounded border-5 flex-column">
                <span class="col-md-7 col-lg-5 col-xl-5 m-5 text-center fs-2 text fw-bold">ĐĂNG NHẬP</span>
                <?php
                    if(isset($_SESSION['login'])){
                        echo $_SESSION['login'];
                        unset($_SESSION['login']);
                    }

                    if(isset($_SESSION['no-login-message'])){
                        echo $_SESSION['no-login-message'];
                        unset($_SESSION['no-login-message']);
                    }
                ?>
                <div class="col-md-7 col-lg-5 col-xl-5">
                    <form action="" method="POST">
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form1Example13" class="form-control form-control-lg" name="username" />
                        <label class="form-label" for="form1Example13">Tên đăng nhập</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example23" class="form-control form-control-lg" name="password" />
                        <label class="form-label" for="form1Example23">Mật khẩu</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>

<?php
    if(isset($_POST['submit']))
    {

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        
        $sql = "select * from db_nguoidung where email = '$username' ";

        $res = mysqli_query($conn, $sql);
        
        if(mysqli_num_rows($res) > 0)
        {
            $row = mysqli_fetch_assoc($res);
            if($row['STATUS'] == 0) 
            {
                $_SESSION['login'] = "<div class='text-danger mb-2 text-center'>Tài khoản chưa được kích hoạt.</div>";
                header('location:'.SITEURL.'admin/login.php');   
            }
            else if(password_verify($password, $row['password']))
            {
                $_SESSION['login'] = "<div class='text-success'>Đăng nhập thành công.</div>";
                $_SESSION['user'] = $username;
                header('location:'.SITEURL.'admin/');
            }
            else
            {
                $_SESSION['login'] = "<div class='text-danger mb-2 text-center'>Mật khẩu không đúng vui lòng nhập lại.</div>";
                header('location:'.SITEURL.'admin/login.php');
            }
        }
        else
        {
            $_SESSION['login'] = "<div class='text-danger mb-2 text-center'>Người dùng không tồn tại.</div>";
            header('location:'.SITEURL.'admin/login.php');
        }
    }
    ob_end_flush();
?>