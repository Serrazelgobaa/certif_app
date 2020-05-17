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

const verifierIconesEdit = () => {
    let iconEdit = document.querySelectorAll('.icon_edit');

    iconEdit.forEach((icone) => {
        icone.addEventListener('click', () => {

            let idToEdit = icone.getAttribute('data-id');

            console.log(idToEdit);

            if(icone.classList.contains('prestations')) {
                fetch("json_edit.php?edit=prestations&id="+idToEdit+"")
                .then((response) => {
                    return response.json();

                })
                .then((objetJSEdit) => {
                    if(objetJSEdit.reponse) {
                        remplirModale(objetJSEdit.reponse,"prestations");
                    }
                })
            }
        
            ouvrirModale('modal_modif_presta');
        });
    });
    
}

document.addEventListener('DOMContentLoaded', () =>{

	verifierIconesEdit();
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
                    <img src="./assets/images/edit.png" id="" class="icon_edit prestations" data-id="${presta.id}">
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
    verifierIconesEdit();
};

const remplirModale = (infosEdit,editWhat) => {
    if (editWhat == "prestations") {
        const modaleEdit = document.getElementById('form_ajax_edit');

        if(modaleEdit == null) {
            return;
        }

        modaleEdit.innerHTML = "";

        infosEdit.forEach((info) => {
            const codeHTML= `
            <div class="modal_header">
		        <h2>Modifier la prestation</h2>
		        <label for="edit_presta_nom" name="edit_presta_nom">Nom : </label><br><input type="text" name="edit_presta_nom" id="edit_presta_nom" value="${info.nom}"><br>
            </div>

            <div class="modal_body">
		        <label for="edit_presta_desc" name="edit_presta_desc">Description : </label><br><textarea name="edit_presta_desc" id="edit_presta_desc">${info.description}</textarea><br>

		        <label for="edit_presta_prix" name="edit_presta_prix">Tarif : </label><br><input type="text" name="edit_presta_prix" id="edit_presta_prix" value="${info.prix}"> €<br>

		        <input type="hidden" name="idFormulaire" value="edit">
		        <input type="hidden" name="editWhat" value="prestations" id="editWhat">
                <input type="hidden" name="idToEdit" value="${info.id}" id="idToEdit">
                <div class="modal_footer">
                    <input type="submit" value="Modifier la prestation" class="submit_modal" name="submit">
                </div>
            </div>
            `;

            modaleEdit.insertAdjacentHTML('beforeend', codeHTML);
        });

    }
};