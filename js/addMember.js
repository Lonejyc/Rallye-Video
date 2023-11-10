document.addEventListener("DOMContentLoaded", function () {
    const ajouterMembresButton = document.getElementById("ajouterMembres");
    const membresContainer = document.querySelector(".membre");

    ajouterMembresButton.addEventListener("click", function (e) {
        e.preventDefault();
        
        // Compter le nombre de champs de membre actuels
        const existingMembreInputs = membresContainer.querySelectorAll("input[type='text'][name^='membre']");

        // Vérifier s'il y a déjà 4 membres
        if (existingMembreInputs.length >= 8) {
            alert("Vous avez atteint la limite de membre.");
            return; // Ne pas ajouter de membre supplémentaire
        }

        // Si la limite n'est pas atteinte, ajouter un nouveau membre
        const newMembreIndex = existingMembreInputs.length + 1;

        // Cloner le premier champ de membre (ou un modèle)
        const clonedMembreInput = existingMembreInputs[0].cloneNode(true);

        // Mettre à jour le nom du champ cloné pour le nouveau membre
        clonedMembreInput.name = `membre${newMembreIndex}`;
        clonedMembreInput.placeholder = `Exemple : Jean${newMembreIndex}@gmail.com`;

        // Ajouter le champ cloné au formulaire
        membresContainer.appendChild(clonedMembreInput);
    });
});