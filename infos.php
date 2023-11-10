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
        <title>Rallye Video - Infos spupplémentaires</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <h1>Informations</h1>
                <section>
                    <h2 id="sponsor">Partenaire</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                    <img src="images/logo.svg">
                </section>
                <section>
                    <h2 id="legal_information">Mentions Légales</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                    <img src="images/logo.svg">
                </section>
                <section>
                    <h2 id="about">À propos</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                    <img src="images/logo.svg">
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>