document.querySelectorAll('.tempsRestant').forEach((objectEl) => {;
    let titleEL = objectEl.querySelector('.title');
    let countdownEl = objectEl.querySelector('.countdown');
    let joursDizEL = objectEl.querySelector('.days1');
    let joursUniEL = objectEl.querySelector('.days2');
    let heuresDizEL = objectEl.querySelector('.hours1');
    let heuresUniEL = objectEl.querySelector('.hours2');
    let minutesDizEL = objectEl.querySelector('.minutes1');
    let minutesUniEL = objectEl.querySelector('.minutes2');

    let now = new Date();
    const dateOffset = now.getTimezoneOffset();

    const unJours = 24 * 60 * 60 * 1000;
    const uneHeure = 60 * 60 * 1000;
    const uneMinute = 60 * 1000;

    const newYear = new Date('2024-01-26T16:00:00');

    const getCountdown = () => {
        let nowDate = Date.now();

        let tempsRestant = newYear - nowDate + dateOffset * uneMinute;

        let nbJours = Math.floor(tempsRestant / unJours);

        let tempsRestantSansJours = tempsRestant - nbJours * unJours;
        let nbHeures = Math.floor(tempsRestantSansJours / uneHeure);

        let tempsRestantSansHeures = tempsRestantSansJours - nbHeures * uneHeure;
        let nbMinutes = Math.floor(tempsRestantSansHeures / uneMinute);

        let joursUnite = nbJours % 10;
        let joursDizaine = Math.floor(nbJours / 10);
        let heuresUnite = nbHeures % 10;
        let heuresDizaine = Math.floor(nbHeures / 10);
        let minutesUnite = nbMinutes % 10;
        let minutesDizaine = Math.floor(nbMinutes / 10);

        joursDizEL.textContent = joursDizaine;
        joursUniEL.textContent = joursUnite;
        heuresDizEL.textContent = heuresDizaine;
        heuresUniEL.textContent = heuresUnite;
        minutesDizEL.textContent = minutesDizaine;
        minutesUniEL.textContent = minutesUnite;

        if(tempsRestant <= 0) {
            clearInterval(countdownInterval);
            joursDizEL.textContent = "0";
            joursUniEL.textContent = "0";
            heuresDizEL.textContent = "0";
            heuresUniEL.textContent = "0";
            minutesDizEL.textContent = "0";
            minutesUniEL.textContent = "0";
            titleEL.textContent = "Le Rallye vidéo a commencé !";
        }
    };
    let countdownInterval = setInterval(getCountdown, 1000);

    getCountdown();
});