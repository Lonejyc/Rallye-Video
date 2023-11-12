document.querySelectorAll('.tempsRestant').forEach((objectEl) => {;
    let titleEL = objectEl.querySelector('.title');
    let countdownEl = objectEl.querySelector('.countdown');
    let joursEL = objectEl.querySelector('.days');
    let heuresEL = objectEl.querySelector('.hours');
    let minutesEL = objectEl.querySelector('.minutes');

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

        joursEL.textContent = nbJours;
        heuresEL.textContent = nbHeures;
        minutesEL.textContent = nbMinutes;

        if(tempsRestant <= 0) {
            clearInterval(countdownInterval);
            joursEL.textContent = 0;
            heuresEL.textContent = 0;
            minutesEL.textContent = 0;
            titleEL.textContent = "Le Rallye vidéo a commencé !";
        }
    };
    let countdownInterval = setInterval(getCountdown, 1000);

    getCountdown();
});