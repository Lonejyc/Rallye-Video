<header>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php"><img src="images/logo_cam.svg"><p>Rallye video</p></a>
        </div>
        <ul class="mid">
            <li class="nav_link"><a href="evenement.php">Événement</a></li>
            <li class="nav_link"><a href="equipes.php">Équipe</a></li>
            <li class="nav_link"><a href="depot.php">Dépot</a></li>
            <li class="nav_link"><a href="vote.php">Vote</a></li>
        </ul>
        <ul class="right">
            <a href="live.php" class="nav_link"><li id="live">Live</li></a>
            <?php if (isset($_SESSION['user_id'])) {
                echo "<a href='dashboard.php' class='nav_link'><li class='registration'>Dashboard</li></a>";
            } else {
                echo "<a href='se_connecter.php' class='nav_link'><li class='registration'>Connexion</li></a>";
            } ?>
        </ul>
        <div class="burger">
            <span class="line"></span>
        </div>
        <script src="js/burger.min.js"></script>
    </nav>
</header>