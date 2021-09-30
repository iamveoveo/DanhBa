<?php include("../config/constants.php")?>
<?php include("particals/log-check.php")?>

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
    <header class="d-flex justify-content-center py-3" style="background-color:rgb(0 0 0 / 25%);">
        <ul class="nav nav-pills">
            <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/index.php" class="nav-link active" aria-current="page"><i class="fas fa-home pe-1"></i>Nhân Viên</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Đơn Vị</a></li>
            <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/manager-user.php" class="nav-link">Người dùng</a></li>
            <li class="nav-item"><a href="<?php echo SITEURL; ?>admin/logout.php" class="nav-link">Đăng xuất</a></li>
        </ul>
    </header>