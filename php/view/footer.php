        </main>

        <script type="text/javascript" src="assets/js/menu.js"></script>

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