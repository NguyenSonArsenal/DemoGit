<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Tin Tức</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="/gioithieu.php">Giới thiệu</a>
                </li>
                <li>
                    <a href="/lienhe.php">Liên hệ</a>
                </li>
            </ul>

            <form class="navbar-form navbar-left" role="search">
		        <div class="form-group">
		          <input type="text" id="txtSearch" class="form-control" placeholder="Search">
		        </div>
		        <button type="button" id="btnSearch" class="btn btn-default demo">Tìm kiếm</button>
		    </form>

		    <ul class="nav navbar-nav pull-right">

                <?php if (isset($_SESSION['name_user'])): ?>
                    <li>
                        <a>
                            <span class ="glyphicon glyphicon-user"></span>
                            <?php echo $_SESSION['name_user'] ?>
                        </a>
                    </li>

                    <li>
                        <a href="/dangxuat.php">Đăng xuất</a>
                    </li>
                <?php endif ?>

                <?php if (!isset($_SESSION['name_user'])): ?>
                    <li>
                        <a href="/dangki.php">Đăng ký</a>
                    </li>
                    <li>
                        <a href="/dangnhap.php">Đăng nhập</a>
                    </li>
                <?php endif ?>

            </ul>
        </div>

        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>