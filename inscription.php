<?php
$titre_page = 'Inscription — Kick Start Stadiums';

$message_succes = '';
$message_erreur = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO : Validation + insertion BDD ici
    $message_succes = "Votre inscription a bien été reçue ! On vous contacte bientôt.";
}

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== BANNIÈRE "SECURE YOUR SPOT" ===================== -->
<section style="background-color: var(--bleu-principal); padding: 24px 0;">
    <div class="container text-center">
        <h1 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                   font-size: clamp(2.5rem, 7vw, 5rem); color: var(--jaune-accent);
                   text-transform: uppercase; letter-spacing: 2px;">
            Secure Your Spot
        </h1>
    </div>
</section>

<!-- ===================== IMAGE + FORMULAIRE ===================== -->
<section style="background-color: var(--blanc);">
    <div class="row g-0">

        <!-- Colonne gauche : image + texte d'accroche -->
        <div class="col-lg-6" style="background-color: var(--bleu-principal);">

            <img src="images/image6.png"
                 alt="Joueurs en action"
                 style="width: 100%; height: 300px; object-fit: cover; object-position: top; display: block;">

            <div class="p-4 p-lg-5">
                <h2 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                           font-size: clamp(2rem, 5vw, 3.5rem); color: var(--jaune-accent);
                           text-transform: uppercase; line-height: 1; margin-bottom: 16px;">
                    Fill Out<br>The Form<br>To Reserve<br>Your Spot.
                </h2>
                <p style="color: var(--blanc); font-size: 1rem; line-height: 1.7;">
                    Limited slots per age group — first come, first play.
                </p>
            </div>
        </div>

        <!-- Colonne droite : formulaire -->
        <div class="col-lg-6">
            <div class="form-section">

                <?php if ($message_succes): ?>
                    <div class="alert alert-success mb-4">
                        <?= htmlspecialchars($message_succes) ?>
                    </div>
                <?php endif; ?>

                <?php if ($message_erreur): ?>
                    <div class="alert alert-danger mb-4">
                        <?= htmlspecialchars($message_erreur) ?>
                    </div>
                <?php endif; ?>

                <form action="inscription.php" method="post" novalidate>

                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom complet (Parent/Tuteur ou Joueur)</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                               placeholder="Ex : Ahmed Ben Ali" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               placeholder="exemple@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone"
                               placeholder="+216 XX XXX XXX" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Sélectionner le groupe d'âge</label>

                        <label class="age-option">
                            <input type="radio" name="groupe_age" value="6-8" required>
                            6–8 ans (Core Skills + Mini Games)
                        </label>

                        <label class="age-option">
                            <input type="radio" name="groupe_age" value="9-11">
                            9–11 ans (Skill & Match Play)
                        </label>

                        <label class="age-option">
                            <input type="radio" name="groupe_age" value="12-14">
                            12–14 ans (Positional + Team Tactics)
                        </label>
                    </div>

                    <div class="mb-3">
                        <label for="session" class="form-label">Session souhaitée</label>
                        <select class="form-select" id="session" name="session">
                            <option value="">-- Choisir un créneau --</option>
                            <option value="dim-8h">Dimanche 8h → 9h30</option>
                            <option value="sam-17h">Samedi 17h → 18h30</option>
                            <option value="sam-18h30">Samedi 18h30 → 20h</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="commentaire" class="form-label">
                            Commentaires / Demandes spéciales (Optionnel)
                        </label>
                        <textarea class="form-control" id="commentaire" name="commentaire"
                                  rows="3" placeholder="Ex : allergie, besoin particulier…"></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-jaune btn-lg">S'inscrire</button>
                    </div>

                    <p class="form-note mt-3">
                        Vos données personnelles ne seront jamais partagées.
                    </p>

                </form>
            </div>
        </div>

    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
