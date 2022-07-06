<?php

    require_once "core/base.php";
    require_once "core/functions.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/fontawesomepro/css/all.min.css">
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/DataTables-1.11.3/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/css/style.css">
  <style>
      body {
          background-color: var(--primary-soft);
      }
  </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-12 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="text-center text-primary fw-bold"><i class="far fa-users me-2"></i>User Register</h4>
                        <hr>
                        <!--register check-->
                        <?php
                            if(isset($_POST['register'])) {
                                echo register();
                            }
                        ?>
                        <form action="" method="post" class="">
                            <div class="form-group my-3">
                                <label for="name">
                                    <i class="text-primary far fa-user"></i>
                                    Your Name
                                </label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="email">
                                <i class="text-primary far fa-envelope"></i>
                                    Your Email
                                </label>
                                <input type="text" name="email" class="form-control" id="email" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="password">
                                    <i class="text-primary far fa-lock"></i>
                                    Password
                                </label>
                                <input type="password" name="password" class="form-control" id="password" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="cfpassword">
                                    <i class="text-primary far fa-lock"></i>
                                    Confirm Password
                                </label>
                                <input type="password" name="cfpassword" class="form-control" id="cfpassword" required>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" name="register">Register</button>
                                <a href="login.php" class="btn btn-link">Sign In</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?php echo "$url"; ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/jquery/js/jquery-3.6.0.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/waypoint/jquery.waypoints.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/counterup/counterup.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/chartjs/chart.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/vendor/DataTables-1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo "$url"; ?>assets/js/app.js"></script>
    <script>

        $(document).ready(function() {
            $('#example').DataTable({
                "order" : [[ 0, 'desc']]
            });
        } );

        $(".full-screen-btn").click(function() {
            $(this).closest(".card").toggleClass("full-screen");
            let current = $(this).closest(".card");
            if(current.hasClass("full-screen")) {
                $(this).html(`<i class="fad fa-compress-alt text-pri me-3"></i>`);
            }else{
                $(this).html(`<i class="fas fa-expand-alt text-pri me-3"></i>`);
            }
        });






        let category = ["Phone","TV","Computer"];
        let subCategory = [
            {name: "iphone",categoryId: 0},
            {name: "mi",categoryId: 0},
            {name: "sony",categoryId: 1},
            {name: "hp",categoryId: 1},
            {name: "dell",categoryId: 2},
            {name: "mac",categoryId: 2}
        ];

        category.map(function(el,index) {
            $("#main").append(`<option value="${index}">${el}</option>`);
        });

        subCategory.map(function(el,index) {
            $("#sub").append(`<option value="${index}" data-category="${el.categoryId}">${el.name}</option>`);
        });

        $("#main").on("change",function() {
            let currentCategoryId = $(this).val();
            $("#sub option").hide();
            $(`[data-category=${currentCategoryId}]`).show();
        });

    </script>

</body>
</html>