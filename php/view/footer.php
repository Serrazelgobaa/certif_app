
        </main>
        <div id="espace_confirmation" class="hidden">
            <p id="confirm_text"></p>
            <img src="assets/images/croix.png" id="croix_confirm" height="25px" width="25px">
        </div>

        <script type="text/javascript" src="assets/js/menu.js"></script>
        <script type="text/javascript" src="assets/js/ajax.js"></script>

        <?php
        
            switch ($page) {
                case "index":
                    break;
                case "clients":
                    echo "<script type=\"text/javascript\" src=\"assets/js/clients.js\"></script>";
                    echo "<script type=\"text/javascript\" src=\"assets/js/modals.js\"></script>";
                    break;
                case "visites":
                    echo "<script type=\"text/javascript\" src=\"assets/js/visites.js\"></script>";
                    echo "<script type=\"text/javascript\" src=\"assets/js/modals.js\"></script>";
                    break;
                case "prestations":
                    echo "<script type=\"text/javascript\" src=\"assets/js/modals.js\"></script>";
                    break;
            }

        ?>
    </body>
</html>