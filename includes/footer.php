<?php
/*
 * Fichier : includes/footer.php
 * Description : Pied de page réutilisable sur toutes les pages
 */
?>

<footer class="footer">
    <div class="container">

        <!-- Nom de la marque en grand -->
        <h2>Kick Start Stadiums</h2>

        <div class="row">

            <!-- Colonne adresse -->
            <div class="col-md-4 footer-info mb-3">
                <strong>Adresse</strong><br>
                Cité Pasteur,<br>
                Dar Chaabane Plage, 8070
            </div>

            <!-- Colonne coordonnées -->
            <div class="col-md-4 footer-info mb-3">
                <strong>Contact</strong><br>
                Tel : <a href="tel:+21696466855">+216 96 466 855</a><br>
                Email : <a href="mailto:kickstartstadiums@gmail.com">kickstartstadiums@gmail.com</a>
            </div>

            <!-- Colonne liens rapides -->
            <div class="col-md-4 footer-info mb-3">
                <strong>Navigation</strong><br>
                <a href="index.php">Accueil</a> |
                <a href="calendrier.php">Calendrier</a> |
                <a href="inscription.php">Inscription</a><br>
                <a href="faq.php">FAQ</a> |
                <a href="contact.php">Contact</a>
            </div>

        </div>

        <!-- Réseaux sociaux -->
        <div class="d-flex justify-content-end footer-socials mt-2">
            <a href="#" aria-label="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="#" aria-label="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="#" aria-label="X (Twitter)">
                <i class="bi bi-twitter-x"></i>
            </a>
        </div>

        <!-- Ligne de copyright -->
        <div class="footer-bottom">
            &copy; <?= date('Y') ?> Kick Start Stadiums. Tous droits réservés.
        </div>

    </div>
</footer>
