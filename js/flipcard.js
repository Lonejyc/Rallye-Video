document.querySelectorAll('.container').forEach((objectEl) => {;
    const btnElements = objectEl.querySelectorAll('.change');

    const cardEl = objectEl.querySelector('.card');
    
    btnElements.forEach((btnEl) => {
        btnEl.addEventListener('click', () => {
            
            if(btnEl.classList.contains('normal')) {
                cardEl.style.transform = "rotateY(180deg)";
                console.log('change');
            }
            if(btnEl.classList.contains('reverse')) {
                cardEl.style.transform = "rotateY(0deg)";
                console.log('reverse');
             }
        });
    }
)});