<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">

        <a class="navbar-brand" href="#pablo"> Manage </a>
        <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
            <span class="navbar-toggler-bar burger-lines"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link" data-toggle="dropdown">
                        <i class="fa fa-magic"></i>
                        <span class="d-lg-none">Dashboard</span>
                    </a>

                </li>
                <style>


                    .dropdown {
                        position: relative;
                        display: inline-block;
                    }

                    .dropdown-content {
                        display: none;
                        position: absolute;
                        background-color: #f1f1f1;
                        min-width: 160px;
                        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
                        z-index: 1;
                    }

                    .dropdown-content a {
                        color: black;
                        padding: 5px 10px;
                        text-decoration: none;
                        display: block;
                    }

                    .dropdown-content a:hover {
                        background-color: #ddd;
                    }

                    .dropdown:hover .dropdown-content {
                        display: block;
                    }

                    .dropdown:hover .dropbtn {
                        background-color: #3e8e41;
                    }
                </style>
                <li class="dropdown nav-item">
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            <i class="nc-icon nc-planet"></i>
                            <span class="notification">5</span>
                            <span class="d-lg-none">Notification </span>
                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="#">Thông báo 1</a>
                            <a class="dropdown-item" href="#">Thông báo 2</a>
                            <a class="dropdown-item" href="#">Thông báo 3</a>
                            <a class="dropdown-item" href="#">Thông báo 4</a>
                        </div>
                    </div>
                </li>


            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown no-arrow">
                <li class="dropdown nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                            <img class="img-profile rounded-circle"
                                 src="../assets/img/undraw_profile.svg" width="30" height="30">

                        </a>
                        <div class="dropdown-content">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Setting
                            </a>
                            <a class="dropdown-item" href="logout.php">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Log out
                            </a>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>
</nav>