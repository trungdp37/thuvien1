<nav id="menu">
    <h2>Menu</h2>
    <ul>
        <li><a href="index.php" class="active">Home</a></li>

        <li><a href="products.php">Products</a></li>

        <li>
            <?php if (!isset($_SESSION['idstulog'])) { ?>
            <a href="logout.php" class="dropdown-toggle">Account</a>
        <li><a href="logout.php">Login</a></li>

        <?php } ?>
        <?php
        if (isset($_SESSION['idstulog'])) { ?>
            <a href="about.php" class="dropdown-toggle">Account</a>
            <ul>
                <li><a href="about.php">Profile</a></li>
                <li><a href="requestcreate.php">History Add Book</a></li>
                <li><a href="requestexchange.php">History Book Exchange</a></li>
            </ul>
            <li><a href="logout.php">Log out</a></li>
        <?php } ?>
        </li>
        <li><a href="../library/index.php">Library</a></li>

    </ul>

</nav>