document.querySelectorAll('.container').forEach((objectEl) => {;
    const btnElements = objectEl.querySelectorAll('.change');

    const cardEl = objectEl.querySelector('.card');
    
    btnElements.forEach((btnEl) => {
        btnEl.addEventListener('click', () => {
            
            if(btnEl.classList.contains('change')) {
               cardEl.style.transform = "rotateY(180deg)";
            }
        });
    }
)});