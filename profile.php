<?php include "./template/header.php" ?>

                <div class="row">
                    <div class="col-12 my-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb bg-white p-2 rounded">
                                <li class="breadcrumb-item"><a href="<?php echo "$url"; ?>index.php" class="text-pri text-decoration-none">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Profile</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-8 col-lg-5">
                        <div class="card shadow-sm mb-3">
                            <div class="card-body">
                                <div class="">
                                    <p class="h4"><i class="fas fa-home text-pri me-1"></i>PROFILE</p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-4">
                                        <img class="w-100 rounded-circle" src="<?php echo "$url"; ?>assets/img/boy.jpg" alt="boy">
                                    </div>
                                    <div class="col-8">
                                        <form action="" method="">
                                            <div class="form-group mt-3">
                                                <label for="file" class="mb-2">Update Photo<small class="text-black-50">[jpg,png]</small></label>
                                                <input type="file" id="file" class="form-control" />
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <form action="">
                                            <label for="name">Name</label>
                                            <input type="text" id="name" class="form-control" placeholder="Kaung Min Htet">
                                        </form>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <form action="">
                                            <label for="email">Login Email</label>
                                            <input type="email" id="email" class="form-control" placeholder="admin@gmail.com">
                                        </form>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <form action="">
                                            <label for="password" class="position-relative">Password<span class="badge bg-danger text-white ms-1 rounded-pill text-black position-absolute">New</span></label>
                                            <div class="input-group">
                                                <input type="password" id="password" class="form-control">
                                                <span class="input-group-text"><i class="fas fa-eye"></i></span>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <button class="btn bg-pri text-white">Update Profile</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

<?php include "./template/footer.php" ?>
