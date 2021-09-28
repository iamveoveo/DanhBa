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
                <div class="col-md-7 col-lg-5 col-xl-5">
                    <form>
                    <!-- Email input -->
                    <div class="form-outline mb-4">
                        <input type="email" id="form1Example13" class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example13">Tên đăng nhập</label>
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" id="form1Example23" class="form-control form-control-lg" />
                        <label class="form-label" for="form1Example23">Mật khẩu</label>
                    </div>
                    <!-- Submit button -->
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
</html>