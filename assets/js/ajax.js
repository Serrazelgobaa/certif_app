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

            if(objetJS.tabLigne) {

                if(objetJS.typeElement == "prestation") {
                    construireCartePresta(objetJS.tabLigne);
                }

                if(objetJS.typeElement == "client") {
                    console.log(objetJS.tabLigne);
                    construireListeClients(objetJS.tabLigne);
                }
            }
        });
    });
});

const verifierIconesEdit = () => {
    let iconEdit = document.querySelectorAll('.icon_edit');

    iconEdit.forEach((icone) => {
        icone.addEventListener('click', () => {

            let idToEdit = icone.getAttribute('data-id');

            if(icone.classList.contains('prestations')) {
                fetch("api_json.php?edit=prestations&id="+idToEdit+"")
                .then((response) => {
                    return response.json();

                })
                .then((objetJSEdit) => {
                    if(objetJSEdit.reponse) {
                        remplirModale(objetJSEdit.reponse,"prestations");
                    }
                })

                ouvrirModale('modal_modif_presta');
            }

            if(icone.classList.contains('clients')) {
                fetch("api_json.php?edit=clients&id="+idToEdit+"")
                .then((response) => {
                    return response.json();

                })
                .then((objetJSEdit) => {
                    if(objetJSEdit.reponse) {
                        remplirModale(objetJSEdit.reponse,"clients");
                    }
                })

                ouvrirModale('modal_modif_client');
            }
        
        });
    });
    
}

const verifierTitresClients = () => {

    let titresClients = document.querySelectorAll('.client_titre');
    
    titresClients.forEach((titreClient) => {
        titreClient.addEventListener('click', () => {
            let idClient = titreClient.getAttribute('data-id');

            fetch("api_json.php?profilclient=true&id="+idClient+"")
            .then((response) => {
                return response.json();
            })
            .then((objetJSProfil) => {
                if(objetJSProfil.reponse) {
                    remplirProfil(objetJSProfil.reponse);
                }
            })

            glisserGauche();
        });
    });
    
};

document.addEventListener('DOMContentLoaded', () =>{

    verifierIconesEdit();
    verifierTitresClients();
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


const construireListeClients = (tabClients) => {
    let baliseListeClients = document.querySelector(".liste_clients");

    if(baliseListeClients == null) {
        return;
    }

    baliseListeClients.innerHTML = "";

    tabClients.forEach((client) => {
        const codeHTML= `
        <div class="client">
        <h4 class="client_titre" data-id="${client.id}">${client.prenom} ${client.nom}</h4>
            <div class="client_icons">
            <img src="./assets/images/edit.png" class="icon_edit clients" data-id="${client.id}">
            <img src="./assets/images/delete.png" height="30px" width="30px" class="delete clients"  data-id="${client.id}">
            </div> 
        </div>
        <hr class="client_separateur">
        `;

        baliseListeClients.insertAdjacentHTML('beforeend', codeHTML);
    });

    verifierIcones();
    verifierIconesEdit();
    verifierTitresClients();
};

const remplirProfil = (infosProfil) => {
    const profilContainer = document.getElementById('profil_client');

    if(profilContainer == null) {
        return;
    }

    profilContainer.innerHTML = "";

    infosProfil.forEach((info) => {
        const codeHTML = `
            <h2>${info.prenom} ${info.nom}</h2>
            <div class="info_client" >
                <img src ="./assets/images/phone.png" width="40px" height="40px">
                <p>${info.telephone}</p>
            </div>
            <div class="info_client">
                <img src ="./assets/images/mail.png" width="40px" height="40px">
                <p>${info.mail}</p>
            </div>
            <div class="info_client">
                <img src ="./assets/images/home.png" width="40px" height="40px">
                <p>${info.adresse}
                <br>${info.code_postal} ${info.ville}</p>
            </div>
        `;

        profilContainer.insertAdjacentHTML('beforeend', codeHTML);
    });
};


const remplirModale = (infosEdit,editWhat) => {
    if (editWhat == "prestations") {
        const modaleEdit = document.getElementById('ajax_edit_presta');

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

		        <input type="hidden" name="typeElement" value="prestation" id="editWhat">
			    <input type="hidden" name="typeAction" value="update">
                <input type="hidden" name="idToEdit" value="${info.id}" id="idToEdit">
                <div class="modal_footer">
                    <input type="submit" value="Modifier la prestation" class="submit_modal" name="submit">
                </div>
            </div>
            `;

            modaleEdit.insertAdjacentHTML('beforeend', codeHTML);
        });

    }

    if(editWhat == "clients") {

        const modaleEdit = document.getElementById('ajax_edit_clients');

        if(modaleEdit == null) {
            return;
        }

        modaleEdit.innerHTML = "";

        infosEdit.forEach((info) => {
            const codeHTML= `
            <h2>Modifier un client</h2>
            <label for="nv_client_nom" name="nv_client_nom">Nom : </label><br><input type="text" name="nv_client_nom" id="nv_client_nom" value="${info.nom}"><br>
            <label for="nv_client_prenom" name="nv_client_prenom">Prénom : </label><br><input type="text" name="nv_client_prenom" id="nv_client_prenom" value="${info.prenom}"><br>
            <label for="nv_client_adresse" name="nv_client_adresse">Adresse : </label><br><input type="text" name="nv_client_adresse" id="nv_client_adresse"  value="${info.adresse}"><br>
            <label for="nv_client_cp" name="nv_client_cp">Code postal : </label><br><input type="text" name="nv_client_cp" id="nv_client_cp"  value="${info.code_postal}"><br>
            <label for="nv_client_ville" name="nv_client_ville">Ville : </label><br><input type="text" name="nv_client_ville" id="nv_client_ville" value="${info.ville}"><br>
            <label for="nv_client_tel" name="nv_client_tel">Numéro de téléphone : </label><br><input type="text" name="nv_client_tel" id="nv_client_tel"  value="${info.telephone}"><br>
            <label for="nv_client_mail" name="nv_client_mail">Adresse email : </label><br><input type="text" name="nv_client_mail" id="nv_client_mail" value="${info.mail}"><br>
            
            <input type="hidden" name="typeElement" value="client">
            <input type="hidden" name="typeAction" value="update">
            <input type="hidden" name="idToEdit" value="${info.id}" id="idToEdit">
            
            <input type="submit" value="Modifier le client" class="submit_modal">
            `;

            modaleEdit.insertAdjacentHTML('beforeend', codeHTML);

        });
            

    }
};