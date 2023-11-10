<!-- Lancement de la session  -->
<?php session_start(); ?>

<!DOCTYPE html>
<!-- Partie HTML de la page -->
<html>
    <!-- Section Head de la page HTML -->
    <head>
        <?php require_once('connexion.php') ?>
        <!-- Lien Logo -->
	    <link rel="icon" type="image/x-icons" href="images/logo_cam.svg">
        <!-- Lien CSS -->
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/wrap.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <div>
                    <p>Le Rallye Vidéo commence dans</p>
                    <img src="images/logo_montre.svg">
                    <div id="countdown">
                        <div>
                            <span class="days"></span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span class="hours"></span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span class="minutes"></span>
                            <div class="smalltext">Minutes</div>
                        </div>
                    </div>

                    <script>
                        function getTimeRemaining(endtime) {
                            var t = Date.parse(endtime) - Date.parse(new Date());
                            var seconds = Math.floor((t / 1000) % 60);
                            var minutes = Math.floor((t / 1000 / 60) % 60);
                            var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
                            var days = Math.floor(t / (1000 * 60 * 60 * 24));
                            return {
                                'total': t,
                                'days': days,
                                'hours': hours,
                                'minutes': minutes,
                                'seconds': seconds
                            };
                        }

                        function initializeClock(id, endtime) {
                            var clock = document.getElementById(id);
                            var daysSpan = clock.querySelector('.days');
                            var hoursSpan = clock.querySelector('.hours');
                            var minutesSpan = clock.querySelector('.minutes');

                            function updateClock() {
                                var t = getTimeRemaining(endtime);

                                daysSpan.innerHTML = t.days;
                                hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
                                minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);

                                if (t.total <= 0) {
                                    clearInterval(timeinterval);
                                }
                            }

                            updateClock();
                            var timeinterval = setInterval(updateClock, 1000);
                        }

                        var deadline = new Date(Date.parse(new Date()) + 15 * 24 * 60 * 60 * 1000);
                        initializeClock('countdown', deadline);
                    </script>
                </div>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>