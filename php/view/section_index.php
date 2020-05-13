<div id="accueil">
    <section>
        <div class="section_body">
            <h2>Dernières visites</h2>
                <?php
                    require "php/model/liste_dernieres_visites.php";
                ?>

        </div>
        <div class="section_footer">
            <a href="./visites.php">Toutes les visites >></a>
        </div>
    </section>

    <section>
        <div class="section_body">
            <h2>Impayés</h2>

            <?php
                require "php/model/liste_impayes.php";
            ?>
            
        </div>

        <div class="section_footer">
            <a href="gestion_visites.php">Tous les impayés >></a>
        </div>
    </section>
</div>