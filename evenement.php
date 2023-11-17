<!-- Lancement de la session  -->
<?php session_start(); ?>

<!DOCTYPE html>
<!-- Partie HTML de la page -->
<html lang="fr">
    <!-- Section Head de la page HTML -->
    <head>
        <?php require_once('connexion.php') ?>
        <!-- Lien Logo -->
	    <link rel="icon" type="image/x-icons" href="images/logo_cam.svg">
        <!-- Lien CSS -->
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/evenement.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"/>
        <!-- Titre de la page web -->
        <title>Rallye Video - Événement</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <section role="region" aria-labelledby="presentation-label">
                    <h1 id="presentation-label">Présentation de l'événement</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                    <img src="images/logo_montre.svg" alt="Logo Montre">
                </section>
                <section role="region" aria-labelledby="prix-label">
                    <h2 id="prix-label">Prix et récompenses</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                </section>
                <section role="region" aria-labelledby="winner-label">
                    <h2>Anciens gagnants</h2>
                    <img src="">
                    <img src="">
                    <img src="">
                </section>
                <section role="region" aria-labelledby="regle-label">>
                    <h2>Le Réglement</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>