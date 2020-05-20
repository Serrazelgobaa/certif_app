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
                    construireListeClients(objetJS.tabLigne);
                }

                if(objetJS.typeElement == "visite") {
                    construireListeVisites(objetJS.tabLigne,objetJS.listePrestas);
                    console.log(objetJS.infoPrestas);
                }
            }
        });
    });
});

/* FONCTIONS DE VERIFICATION */

    /* Ces fonctions resélectionnent les cliquables provoquant des actions AJAX et remettent un listener dessus après
    le renouvellement du contenu */

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

            if(icone.classList.contains('visites')) {
                fetch("api_json.php?edit=visites&id="+idToEdit+"")
                .then((response) => {
                    return response.json();

                })
                .then((objetJSEdit) => {
                    if(objetJSEdit.reponse) {
                        remplirModale(objetJSEdit.reponse,"visites");

                        let selectClients = document.getElementById("select_clients");
                        let selectPrestas = document.getElementById("select_prestas");

                        selectClients.insertAdjacentHTML('beforeend', objetJSEdit.listeOptions);
                        selectPrestas.insertAdjacentHTML('beforeend', objetJSEdit.selectPrestas);

                        listerFormPrestas(objetJSEdit.listePrestas);

                        document.getElementById('valider_presta').addEventListener('click', (event) => {
                            event.preventDefault();
                            ajouterPresta();
                        });

                    }
                })

                ouvrirModale('modal_modif_visite');
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


/* FONCTIONS DE CONSTRUCTION */

    /* Ces fonctions reconstruisent la liste des éléments après la validation d'un formulaire */

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

const construireListeVisites = (tabVisites, listePrestas) => {
    let baliseListeVisites = document.querySelector(".liste_visites");

    if(baliseListeVisites == null) {
        return;
    }

    baliseListeVisites.innerHTML = "";

    tabVisites.forEach((visite) => {

        let mois = "";
        let minute = "";
        let effectuee = "";
        let payee= "";
        let id = visite.id;
        let prestas = listePrestas[id];
        let codeHTMLMilieu = "";

        if(visite.mois <= 9) {
            mois = "0"+visite.mois;
        }

        else {
            mois = visite.mois;
        }

        if(visite.minute <= 9) {
            minute = "0"+visite.minute;
        }

        else{
            minute = visite.minute;
        }

        if(visite.effectuee == 1) {
            effectuee = `<img src="./assets/images/check.png" width="30px" height="30px"><p>Terminée</p>`;
        }

        else {
            effectuee = `<img src="./assets/images/uncheck.png" width="30px" height="30px"><p>En cours</p>`;
        }

        if(visite.payee == 1) {
            payee = `<img src="./assets/images/paid.png" width="30px" height="30px"><p>Payée</p>`;
        }

        else {
            payee = `<img src="./assets/images/unpaid.png" width="30px" height="30px"><p>Non-payée</p>`;
        }

        let codeHTML = `
        <div class=carte_visite>
            <div class="card_header">
                <div class="check_icons">
                    ${effectuee} ${payee}
                </div>
                <div class="icon_card">
                    <img src="./assets/images/edit.png" id="" class="icon_edit visites" data-id="${id}">
                    <img src="./assets/images/delete.png" class="delete visite" data-id="${id}">
                </div>
            </div>
            <div class="carte_body card_body">
                <h2>Chez ${visite.client_prenom} ${visite.client_nom}</h2>
                <p>Le ${visite.jour}/${mois}/${visite.annee} à ${visite.heure} h ${minute}</p>
                <p><span class="bold">Prestations : `;

            prestas.forEach((presta) => {
                codeHTMLMilieu+= ' '+presta+' |';
            });


        let codeHTMLFin = `
                </span></p>
                <h3>Prix total: ${visite.prix_total} €</h3>
                </div>
            </div>
        `;

        codeHTML+= codeHTMLMilieu;
        codeHTML += codeHTMLFin;

        baliseListeVisites.insertAdjacentHTML('beforeend', codeHTML);
    });

    verifierIcones();
    verifierIconesEdit();
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
			    <h2>Modifier une prestation</h2>
			    <label for="edit_presta_nom" name="edit_presta_nom"><h3>Nom : </h3></label>
			    <input type="text" name="edit_presta_nom" id="edit_presta_nom" class="champ" value="${info.nom}">
		    </div>
		    <div class="modal_body">
                <label for="edit_presta_desc" name="edit_presta_desc"><h3>Description : </h3></label>
                <textarea name="edit_presta_desc" id="edit_presta_desc" class="champ">${info.description}</textarea>

                <label for="edit_presta_prix" name="edit_presta_prix"><h3>Tarif : </h3></label>
                <input type="text" name="edit_presta_prix" id="edit_presta_prix" class="presta_prix champ" value="${info.prix}"> €
            
                <input type="hidden" name="typeElement" value="prestation" id="editWhat">
			    <input type="hidden" name="typeAction" value="update">
                <input type="hidden" name="idToEdit" value="${info.id}" id="idToEdit">
            </div>

            <div class="modal_footer">
                <input type="submit" value="Modifier la prestation" class="submit_modal" name="submit">
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

            const codeHTML = `
            <div class="modal_grid">
			<div class="modal_header">
				<h2>Modifier un client</h2>

				<div class="row">
					<div class="column">
						<label for="nv_client_nom" name="nv_client_nom"><h3>Nom : </h3></label>
						<input type="text" name="nv_client_nom" id="nv_client_nom" value="${info.nom}">
					</div>
					
					<div class="column">
						<label for="nv_client_prenom" name="nv_client_prenom"><h3>Prénom : </h3></label>
						<input type="text" name="nv_client_prenom" id="nv_client_prenom" value="${info.prenom}">
					</div>
				</div>
			</div>

			<div class="modal_body body_clients">
			
				<label for="nv_client_adresse" name="nv_client_adresse"><h4>Adresse : </h3></label>
				<input type="text" name="nv_client_adresse" id="nv_client_adresse" class="champ_adresse" value="${info.adresse}">

				<div class="row">
					<div class="column">
						<label for="nv_client_cp" name="nv_client_cp"><h4>Code postal : </h3></label>
						<input type="text" name="nv_client_cp" id="nv_client_cp" value="${info.code_postal}">
					</div>
					<div class="column">
						<label for="nv_client_ville" name="nv_client_ville"><h4>Ville : </h3></label>
						<input type="text" name="nv_client_ville" id="nv_client_ville" value="${info.ville}">
					</div>
				</div>

				<label for="nv_client_tel" name="nv_client_tel"><h4>Numéro de téléphone : </h3></label>
				<input type="text" name="nv_client_tel" id="nv_client_tel" value="${info.telephone}">

				<label for="nv_client_mail" name="nv_client_mail"><h4>Adresse email : </h3></label>
				<input type="text" name="nv_client_mail" id="nv_client_mail" class="champ_mail" value="${info.mail}">
				
				<input type="hidden" name="typeElement" value="client">
                <input type="hidden" name="typeAction" value="update">
                <input type="hidden" name="idToEdit" value="${info.id}" id="idToEdit">

			</div>

			<div class="modal_footer">
				<input type="submit" value="Modifier le client" class="submit_modal">
			</div>
		</div>
            `;

            modaleEdit.insertAdjacentHTML('beforeend', codeHTML);

        });
            
    }

    if (editWhat == "visites") {
        const modaleEdit = document.getElementById('ajax_edit_visite');

        if(modaleEdit == null) {
            return;
        }

        modaleEdit.innerHTML = "";

        infosEdit.forEach((info) => {

            let payee = "";
            let effectuee = "";

            if(info.effectuee == 1) {
                effectuee = `<input type="checkbox" name="effectuee" checked>`;
            }

            else {
                effectuee = `<input type="checkbox" name="effectuee">`;
            }

            if(info.payee == 1) {
                payee = `<input type="checkbox" name="payee" checked>`;
            }

            else {
                payee = `<input type="checkbox" name="payee">`;
            }

            const codeHTML = `
            <div class="modal_header">
			    <h2>Modifier la visite</h2>
		    </div>
		    <div class="modal_body">
			    <div id="onglet_modifier">
				    <h3>Statut de la visite</h3>
				    <label><p>${effectuee} Cette visite est terminée</p></label>
				    <label><p>${payee} Cette visite a été payée</p></label>

				    <h3>Modifier les détails</h3>
				    <label for="edit_visite_date" name="edit_visite_date">Date  </label><br>
				    <input type="date" name="edit_visite_date" id="edit_visite_date" value="${info.date}"><br>
				    <label for ="edit_visite_heure" name="edit_visite_heure">et heure :</label><br>
				    <input type="time" name="edit_visite_heure" id="edit_visite_heure" value="${info.heure}"><br>
		
                    <select name="quel_client" id="select_clients">
                        <option value="${info.clients_id}">${info.client_prenom} ${info.client_nom}</option>
                        <?php
                            require "php/model/liste_deroulante_clients.php";
                        ?>
                    </select>

                    <input type="hidden" name="typeElement" value="visite">
                    <input type="hidden" name="typeAction" value="update">
                    <input type="hidden" name="idToEdit" value="${info.id}">

			    </div>

                <div id="onglet_prestas">
                    <h3>Ajouter des prestations</h3>
                    <select name="quelles_prestas" id="select_prestas">
                    </select>
                    <button id="valider_presta">Ajouter</button>

                    <div id="liste_prestas_ajoutees">
                    </div>
                    <div id="total">
                        <p>Prix total : <span id="prix_total">0</span> €</p>
                        <input type="hidden" name="prix_total" value="0" id="champPrix">
                    </div>
			    </div>
		    </div>
            <div class="modal_footer">
                <input type="submit" value="Modifier la visite" class="submit_modal">
            </div>
            `;

            modaleEdit.insertAdjacentHTML('beforeend', codeHTML);
        });

    }
};