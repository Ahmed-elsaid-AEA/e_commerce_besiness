<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#app-nav" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="dashboard.php"><?php echo lang("HOME_ADMIN") ?></a>
        </div>
        <div class="collapse navbar-collapse" id="app-nav">
            <ul class="nav navbar-nav">
                <li><a href="categories.php"><?php echo lang("CATOGRIES") ?></a></li>
                <li><a href="items.php"><?php echo lang("ITEMS") ?></a></li>
                <li><a href="memebers.php?do=manage&userid=<?php echo $_SESSION['ID'] ?>"><?php echo lang("MEMBERS") ?></a></li>
                <li><a href="#"><?php echo lang("STATISTICS") ?></a></li>
                <li><a href="#"><?php echo lang("LOGS") ?></a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a href=" #" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Ahmed <span class="caret"></span> </a>
                    <ul class="dropdown-menu">
                        <li><a href="memebers.php?do=Edit&userid=<?php echo $_SESSION['ID'] ?>">Edit Profile</a></li>
                        <li><a href="#">Settings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="#">A.E.A</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>