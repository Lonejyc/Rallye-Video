<header>
    <nav>
        <div class="logo">
            <a href="index.php"><img src="images/logo_cam.svg"><p>Rallye video</p></a>
        </div>
        <ul class="mid">
            <li><a href="evenement.php">Événement</a></li>
            <li><a href="equipes.php">Équipe</a></li>
            <li><a href="depot.php">Dépot</a></li>
            <li><a href="vote.php">Vote</a></li>
        </ul>
        <ul class="right">
            <li id="live"><a href="live.php">Live</a></li>
            <?php if (isset($_SESSION['user_id'])) {
                echo "<li class='registration'><a href='dashboard.php'>Dashboard</a></li>";
            } else {
                echo "<li class='registration'><a href='se_connecter.php'>Connexion</a></li>";
            } ?>
        </ul>
    </nav>
</header>