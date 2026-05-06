<?php
/*
 * Fichier : includes/navbar.php
 * Description : Barre de navigation réutilisable sur toutes les pages
 * Usage : <?php include 'includes/navbar.php'; ?> (depuis la racine)
 *         <?php include '../includes/navbar.php'; ?> (depuis un sous-dossier)
 */

// Récupère la page actuelle pour marquer le lien actif
$page_actuelle = basename($_SERVER['PHP_SELF']);
?>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <!-- Nom du site / Logo -->
        <a class="navbar-brand" href="index.php">
            ⚽ Kick Start Stadiums
        </a>

        <!-- Bouton mobile (hamburger) -->
        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navMenu"
                aria-controls="navMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Liens de navigation -->
        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= ($page_actuelle == 'index.php') ? 'active' : '' ?>"
                       href="index.php">
                        Accueil
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page_actuelle == 'calendrier.php') ? 'active' : '' ?>"
                       href="calendrier.php">
                        Calendrier
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page_actuelle == 'inscription.php') ? 'active' : '' ?>"
                       href="inscription.php">
                        Inscription
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page_actuelle == 'faq.php') ? 'active' : '' ?>"
                       href="faq.php">
                        FAQ
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= ($page_actuelle == 'contact.php') ? 'active' : '' ?>"
                       href="contact.php">
                        Contact
                    </a>
                </li>

                <!-- TODO: Ajouter le lien de connexion quand l'authentification sera prête -->
                <!--
                <li class="nav-item">
                    <a class="nav-link" href="connexion.php">Connexion</a>
                </li>
                -->

            </ul>
        </div>

    </div>
</nav>
