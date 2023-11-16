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
        <link href="css/style.css" rel="stylesheet">
        <link href="css/header.css" rel="stylesheet">
        <link href="css/footer.css" rel="stylesheet">
        <link href="css/evenement.css" rel="stylesheet">
        <!-- Encodage en UTF-8 -->
        <meta charset="UTF-8">
        <meta name="author" content="Rallye Video">
        <!-- Titre de la page web -->
        <title>Rallye Video - Événement</title>
    </head>
    <!-- Section Body de la page HTML -->
    <body>
        <?php include("global/header.php") ?>
        <main>
            <div class="wrap">
                <section>
                    <h1>Présentation de l'événement</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada. Donec quis hendrerit turpis. Vivamus magna urna, mattis quis massa sit amet, commodo venenatis ligula. Phasellus eget est ac tortor pulvinar vestibulum. Maecenas est elit, euismod finibus pulvinar in, blandit in lectus. Vivamus eu nisl sit amet erat rhoncus blandit. Nam ac magna eros. Aenean placerat ligula nec elit fermentum, vitae lobortis sapien aliquam. Cras semper blandit diam, eget porta ex rhoncus eu. Ut convallis est in luctus venenatis. Phasellus magna erat, hendrerit sit amet augue nec, efficitur pulvinar lacus. Ut suscipit lectus dui, nec sollicitudin turpis maximus ut. Integer convallis neque augue, a luctus eros ultrices sed. Nullam eleifend facilisis laoreet. Cras vel augue at odio tempus ultrices. Nam ut diam nisl. Curabitur sagittis, enim non tincidunt viverra, velit elit iaculis enim, a malesuada quam augue ut tortor. Morbi eget velit fermentum, laoreet nisi vitae, pulvinar dui. Donec consequat finibus volutpat. Vestibulum efficitur augue quis est tincidunt efficitur. Morbi sagittis efficitur lorem, sit amet gravida augue ultricies in. Sed sit amet ornare mauris. Pellentesque quam nisl, aliquet eu viverra sit amet, elementum eget dui. Sed imperdiet aliquam orci, eu fermentum purus elementum sit amet. In hac habitasse platea dictumst. Vestibulum auctor mi eu sapien sollicitudin iaculis at et sapien. Integer tempor efficitur eros at posuere. In sed tincidunt dolor. Fusce aliquet mi nibh, eget auctor libero elementum imperdiet.</p>
                    <img src="images/logo_montre.svg">
                </section>
                <section>
                    <h2>Prix et récompenses</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                </section>
                <section>
                    <h2>Anciens gagnants</h2>
                    <img src="">
                    <img src="">
                    <img src="">
                </section>
                <section>
                    <h2>Le Réglement</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean et ex congue, rhoncus magna at, faucibus leo. Vivamus nec justo sapien. Sed ac magna eu orci vulputate aliquet non non mauris. Ut pulvinar vehicula pretium. Etiam at quam eget leo imperdiet dictum. Aenean pretium mi lobortis, dictum nunc nec, lacinia eros. Nulla lobortis eget odio a elementum. Curabitur id augue laoreet, vulputate neque a, sollicitudin magna. Ut feugiat urna libero, nec accumsan neque hendrerit ac. In laoreet eu nibh et elementum. Vivamus et vulputate dolor. Fusce sed vehicula sem, ut pretium felis. Phasellus placerat dolor in risus pretium, non placerat nulla malesuada.</p>
                </section>
            </div>
        </main>
        <?php include("global/footer.php") ?>
    </body>
</html>