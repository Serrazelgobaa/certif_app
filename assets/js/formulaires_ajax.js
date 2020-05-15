let listeFormAjax = document.querySelectorAll("form.ajax");

listeFormAjax.forEach((balise) => {
    balise.addEventListener('submit', (event) => {
        event.preventDefault();

        let formData = new FormData(balise);

        fetch("api_json.php", {
            method: "POST",
            body: formData
        })
        .then((reponseServeur) => {
            return reponseServeur.json();
        })
        .then((objetJS) => {

            if(objetJS.confirmation) {
                document.getElementById('confirm_text').innerHTML = objetJS.confirmation;
            }

            if(objetJS.tabPresta) {
                construireCartePresta(objetJS.tabPresta);
            }
        });
    });
});

const construireCartePresta = (tabPresta) => {
    let baliseListePrestas = document.querySelector(".liste_prestas");

    if(baliseListePrestas == null) {
        return;
    }

    baliseListePrestas.innerHTML = "";

    tabPresta.forEach((presta) => {
        const codeHTML = `
        <div class="art_card">
            <div class="card_header">
                <h2 class="titre_client">${presta.nom}</h2>
                <div class="icon_card">
                    <img src="./assets/images/edit.png" id="" class="icon_edit">
                    <img src="./assets/images/delete.png" class="delete prestation" data-id="${presta.id}">
                </div>
            </div>
            <div class="body_card">
                <p>${presta.description}</p>
                <h3>Tarif : ${presta.prix} €</h3>
            </div>
        </div>
        `;

        baliseListePrestas.insertAdjacentHTML('beforeend', codeHTML);

    });

    verifierIcones();
};