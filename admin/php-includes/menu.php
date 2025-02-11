<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <style>
        .sidebar-nav #side-menu li a{
            margin-left: 10px;
            font-size: 17px;
            justify-content: center;
            
        }
        .sidebar-nav #side-menu li a i{
            margin-right: 10px;
            
        }

    </style>
</head>




<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Welcome Admin</a>
    </div>
    <!-- /.navbar-header -->

    <ul class="nav navbar-top-links navbar-right">

        <!-- /.dropdown -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-message">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                </li>
                <li class="divider"></li>
                <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                </li>
            </ul>
            <!-- /.dropdown-user -->
        </li>
        <!-- /.dropdown -->
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li>
                    <a href="home.php"><i class="material-icons material-icons-outlined">dashboard</i> Dashboard</a>
                </li>
                <li>
                    <a href="distributors.php"><i class="material-icons material-icons-outlined">groups_2</i>All Distributors</a>
                </li>
                <li>
                    <a href="join.php"><i class="material-icons material-icons-outlined">person_add</i>Add New Distributor</a>
                </li>
                <li>
                    <a href="addsales.php"><i class="material-icons material-icons-outlined">add_shopping_cart</i>New Sale</a>
                </li>
                <li>
                    <a href="sales.php"><i class="material-icons material-icons-outlined">real_estate_agent</i>Cash Sales</a>
                </li>

                <li>
                    <a href="new_products.php"><i class="material-icons material-icons-outlined">exposure_plus_1</i>New Product</a>
                </li>

                <li>
                    <a href="products.php"><i class="material-icons material-icons-outlined">inventory</i>Products</a>
                </li>

                <li>
                    <a href="wto_rules.php"><i class="material-icons material-icons-outlined">calculate</i>WTO Rules</a>
                </li>
                <li>
                    <a href="update_status.php"><i class="material-icons material-icons-outlined">update</i>Update Status</a>
                </li>
                <li>
                    <a href="cms_rules.php"><i class="material-icons material-icons-outlined">paid</i>Comission Rules</a>
                </li>
                <li>
                    <a href="tree.php"><i class="material-icons material-icons-outlined">account_tree</i>Tree Structure</a>
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>