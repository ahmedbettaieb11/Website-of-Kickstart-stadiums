<?php
$titre_page = 'Kick Start Stadiums — Accueil';
include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== SECTION HERO ===================== -->
<section class="section-hero">
    <div class="container">
        <h1>About Kick Start Stadiums</h1>
    </div>
</section>

<!-- ===================== SECTION CARDS ===================== -->
<section style="background-color: var(--bleu-principal); padding: 0 0 60px 0;">
    <div class="container">
        <div class="row g-0">

            <!-- Card 1 : Purpose -->
            <div class="col-md-4 d-flex">
                <div class="card-info w-100">
                    <img src="images/image1.png"
                         alt="Joueur de football"
                         style="width: 100%; height: 260px; object-fit: cover; object-position: top; display: block;">
                    <div class="card-body">
                        <h2 class="card-title">Purpose</h2>
                        <p class="card-text">
                            Kick Start Camp helps young players learn, play, and grow.
                            Football is more than drills; it's teamwork, confidence, and fun.
                            It also lets you have fun while renting a stadium for an hour and a half.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 2 : Approach -->
            <div class="col-md-4 d-flex">
                <div class="card-info w-100">
                    <img src="images/image2.png"
                         alt="Ballon en équilibre"
                         style="width: 100%; height: 260px; object-fit: cover; object-position: center; display: block;">
                    <div class="card-body">
                        <h2 class="card-title">Approach</h2>
                        <p class="card-text">
                            Certified coaches blend pro-level training with fun, high-energy sessions.
                            We build skills that feel natural.
                        </p>
                    </div>
                </div>
            </div>

            <!-- Card 3 : Community -->
            <div class="col-md-4 d-flex">
                <div class="card-info w-100">
                    <img src="images/image3.png"
                         alt="Communauté de joueurs"
                         style="width: 100%; height: 260px; object-fit: cover; object-position: center; display: block;">
                    <div class="card-body">
                        <h2 class="card-title">Community</h2>
                        <p class="card-text">
                            We're more than a camp — players bond, parents see growth, coaches celebrate progress.
                            Every kick counts, and everyone belongs.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ===================== SECTION CTA ===================== -->
<section style="background-color: var(--jaune-accent); padding: 50px 0; text-align: center;">
    <div class="container">
        <h2 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                   font-size: 2.2rem; color: var(--bleu-principal);
                   text-transform: uppercase; margin-bottom: 20px;">
            Prêt à réserver votre terrain ?
        </h2>
        <p style="font-size: 1.05rem; margin-bottom: 28px;
                  max-width: 500px; margin-left: auto; margin-right: auto;">
            Choisissez votre créneau, inscrivez-vous et venez jouer !
        </p>
        <a href="calendrier.php" class="btn btn-bleu me-2">Voir le calendrier</a>
        <a href="inscription.php" class="btn btn-jaune">S'inscrire maintenant</a>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
