<aside class="sidebar">
    <div class="sidebar-start">
        <div class="sidebar-head">
            <a href="index1.php" class="logo-wrapper" title="Home">
                <span class="sr-only">Home</span>
                <span class="icon logo" aria-hidden="true"></span>
                <div class="logo-text">
                    <span class="logo-title">Elegant</span>
                    <span class="logo-subtitle">Dashboard</span>
                </div>

            </a>
            <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                <span class="sr-only">Toggle menu</span>
                <span class="icon menu-toggle" aria-hidden="true"></span>
            </button>
        </div>
        <div class="sidebar-body">
            <ul class="sidebar-body-menu">
                <?php
                $role = $_SESSION["role"];
                if ($role == "Admin") {
                ?>
                    <li>
                        <a href="index1.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="category.php"><span class="icon document" aria-hidden="true"></span>Category</a>
                    </li>
                    <li>
                        <a href="sub_category.php"><span class="icon folder" aria-hidden="true"></span>Sub Category</a>
                    </li>
                    <li>
                        <a href="product.php"><span class="icon image" aria-hidden="true"></span>Product</a>
                    </li>
                <?php
                }
                ?>

                <?php
                $role = $_SESSION["role"];
                if ($role == "Super-Admin") {
                ?>
                    <li>
                        <a href="index1.php"><span class="icon home" aria-hidden="true"></span>Dashboard</a>
                    </li>
                    <li>
                        <a href="category.php"><span class="icon document" aria-hidden="true"></span>Category</a>
                    </li>
                    <li>
                        <a href="sub_category.php"><span class="icon folder" aria-hidden="true"></span>Sub Category</a>
                    </li>
                    <li>
                        <a href="product.php"><span class="icon image" aria-hidden="true"></span>Product</a>
                    </li>
                    <li>
                        <a href="seo.php"><span class="icon paper" aria-hidden="true"></span>SEO Tools</a>
                    </li>
                    <li>
                        <a href="slider.php"><span class="icon message" aria-hidden="true"></span>Slider</a>
                    </li>

            </ul>
            <span class="system-menu__title">system</span>
            <ul class="sidebar-body-menu">
                <li>
                    <a class="show-cat-btn" href="#">
                        <span class="icon category" aria-hidden="true"></span>Page Settings
                        <span class="category__btn transparent-btn" title="Open list">
                            <span class="sr-only">Open list</span>
                            <span class="icon arrow-down" aria-hidden="true"></span>
                        </span>
                    </a>
                    <ul class="cat-sub-menu">
                        <li>
                            <a href="logo.php">Logo</a>
                        </li>
                        <li>
                            <a href="contact.php">Contact</a>
                        </li>
                        <li>
                            <a href="social.php">Social</a>
                        </li>
                        <li>
                            <a href="brochure.php">Brochure</a>
                        </li>
                        <li>
                            <a href="other.php">Others</a>
                        </li>
                    </ul>
                </li>
            </ul>
        <?php } ?>
        </div>
    </div>

</aside>