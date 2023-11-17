<header>
    <nav class="navbar" aria-label="Menu de navigation principal">
        <div class="logo">
            <a href="index.php" aria-label="Accueil de Rallye Video">
                <img src="images/logo_cam.svg" alt="Logo de Rallye Video">
                <p>Rallye vidéo</p>
            </a>
        </div>
        <ul class="mid" aria-label="Liens vers différentes sections du site">
            <li class="nav_link"><a href="evenement.php">Événement</a></li>
            <li class="nav_link"><a href="equipes.php">Équipe</a></li>
            <li class="nav_link"><a href="depot.php">Dépôt</a></li>
            <li class="nav_link"><a href="vote.php">Vote</a></li>
        </ul>
        <ul class="right" aria-label="Liens supplémentaires du site">
            <a href="live.php" class="nav_link"><li id="live">Live</li></a>
            <?php if (isset($_SESSION['user_id'])) {
                echo "<a href='dashboard.php' class='nav_link'><li class='registration'>Dashboard</li></a>";
            } else {
                echo "<a href='se_connecter.php' class='nav_link'><li class='registration'>Connexion</li></a>";
            } ?>
        </ul>
        <div class="burger" aria-label="Menu de navigation mobile">
            <span class="line"></span>
        </div>
        <script src="js/burger.min.js"></script>
    </nav>
</header>
