session_start();

<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <!-- Barre de navigation-top -->
    <div class="navbar-header">
        <a class="navbar-brand" href="index.php">Kuro - <?php echo $_SESSION['user'];?></a>
    </div>

    <ul class="nav navbar-top-links navbar-right">

        <!-- Gestion du compte / Déconnexion -->

        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
                <li><a href="compte.php"><i class="fa fa-user fa-fw"></i> Compte</a>
                </li>
                <li class="divider"></li>
                <li><a href="deconnexion.php"><i class="fa fa-sign-out fa-fw"></i> Déconnexion</a>
                </li>
            </ul>
        </li>
    </ul>

    <!-- Barre de navigation-left -->

    <div class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">

                <li>
                    <a href="images.php"> Liste des images</a>
                </li>
                <li>
                    <a href="videos.php"> Liste des vidéos</a>
                </li>
                <li>
                    <a href="#"> Héberger un média<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="uploadImage.php">Images</a>
                        </li>
                        <li>
                            <a href="uploadVideo.php">Vidéos</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>