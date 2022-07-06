<?php require_once "./core/base.php" ?>
<?php require_once "./core/functions.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Dashboard</title>
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/fontawesomepro/css/all.css">
  <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/datatables.css">
    <link rel="stylesheet" href="<?php echo "$url"; ?>assets/vendor/summernote/summernote-lite.css">
    <link rel="stylesheet" href="<?php echo "$url"; ?>assets/css/style.css">
  <style>
      .list-active{
        background-color: var(--primary);
        color: #ffffff;
      }
      .list-group-item:first-child {
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
      }
      .list-group-item:last-child {
        border-bottom-right-radius: 3px;
        border-bottom-left-radius: 3px;
      }
      .list-active:hover {
        color: #ffffff;
      }
  </style>
</head>
<body>

  <section class="container-fluid">
    <div class="row">
      <?php require_once "sidebar.php"?>
      <!-- main -->
      <div class="col-12 col-lg-9 col-xl-10 vh-100 content">
        <div class="row header">
          <!-- main's nav -->
          <div class="col-12">
            <div class="p-2 rounded bg-pri d-flex justify-content-between align-items-center shadow-sm">
              <button class="btn btn-light show-navigation d-xl-none">
                <i class="fas fa-bars"></i>
              </button>
              <form action="" method="" class="d-none d-md-block">
                <div class="input-group">
                    <input type="text" class="form-control">
                    <button class="btn btn-light rounded ms-2">
                      <i class="fas fa-search"></i>
                    </button>
                </div>
              </form>
              <div class="dropdown">
                <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="<?php echo "$url"; ?>assets/img/<?php echo $_SESSION['user']['photo'] ?>" alt="kmh" class="user-img">
                  <?php echo $_SESSION['user']['name']; ?>
                  <!-- Kaung Min Htet -->
                </button>
                <ul class="dropdown-menu p-0" aria-labelledby="dropdownMenuButton1">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><a class="dropdown-item border-top border-1 bg-danger text-white" href="logout.php">Logout</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>