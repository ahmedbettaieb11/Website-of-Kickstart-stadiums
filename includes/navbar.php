<?php $page = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg">
    <div class="container">

        <a class="navbar-brand" href="index.php">⚽ Kick Start Stadiums</a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navMenu">
            <ul class="navbar-nav ms-auto">

                <li class="nav-item">
                    <a class="nav-link <?= $page == 'index.php' ? 'active' : '' ?>" href="index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'calendrier.php' ? 'active' : '' ?>" href="calendrier.php">Calendrier</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'inscription.php' ? 'active' : '' ?>" href="inscription.php">Inscription</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'faq.php' ? 'active' : '' ?>" href="faq.php">FAQ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $page == 'contact.php' ? 'active' : '' ?>" href="contact.php">Contact</a>
                </li>

            </ul>
        </div>

    </div>
</nav>
