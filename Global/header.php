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
            <a href="live.php"><li id="live">Live</li></a>
            <?php if (isset($_SESSION['user_id'])) {
                echo "<a href='dashboard.php'><li class='registration'>Dashboard</li></a>";
            } else {
                echo "<a href='se_connecter.php'><li class='registration'>Connexion</li></a>";
            } ?>
        </ul>
    </nav>
</header>