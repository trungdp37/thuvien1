<nav>
    <ul>
        <li><a href="#menu"> Menu</a></li>
    </ul>
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
    <ul>
        <li>
            <a href="cart.php">
                <i class="fa fa-shopping-cart fa-6x"></i>
                <span class="notification"><?php
                    $ok = 1;
                    if (isset($_SESSION['cart'])) {
                        foreach ($_SESSION['cart'] as $k => $v) {
                            if (isset($v)) {
                                $ok = 2;
                            }
                        }
                    }
                    if ($ok != 2) {
                        echo "0";
                    } else {
                        $items = $_SESSION['cart'];
                        echo count($items);
                    }
                    ?>
                                </span>
            </a>
        </li>
    </ul>

</nav>