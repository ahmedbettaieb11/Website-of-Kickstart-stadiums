<?php
$titre_page = 'Inscription — Kick Start Stadiums';

include 'includes/connexion.php';

$message_succes = '';
$message_erreur = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom         = mysqli_real_escape_string($conn, trim($_POST['nom']));
    $email       = mysqli_real_escape_string($conn, trim($_POST['email']));
    $telephone   = mysqli_real_escape_string($conn, trim($_POST['telephone']));
    $groupe_age  = mysqli_real_escape_string($conn, trim($_POST['groupe_age']));
    $session     = mysqli_real_escape_string($conn, trim($_POST['session']));
    $commentaire = mysqli_real_escape_string($conn, trim($_POST['commentaire']));

    if (empty($nom) || empty($email) || empty($telephone) || empty($groupe_age)) {
        $message_erreur = "Veuillez remplir tous les champs obligatoires.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_erreur = "L'adresse email n'est pas valide.";

    } else {
        $sql = "INSERT INTO inscriptions (nom, email, telephone, groupe_age, session, commentaire)
                VALUES ('$nom', '$email', '$telephone', '$groupe_age', '$session', '$commentaire')";

        if (mysqli_query($conn, $sql)) {
            $message_succes = "✅ Votre inscription a bien été enregistrée ! On vous contacte bientôt.";
        } else {
            $message_erreur = "Une erreur est survenue. Réessayez.";
        }
    }
}

$result_sessions = mysqli_query($conn, "SELECT * FROM sessions WHERE actif = 1 ORDER BY date_debut ASC");
$session_preselect = $_GET['session_id'] ?? null;

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<section style="background-color: var(--bleu-principal); padding: 24px 0;">
    <div class="container text-center">
        <h1 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                   font-size: clamp(2.5rem, 7vw, 5rem); color: var(--jaune-accent);
                   text-transform: uppercase; letter-spacing: 2px;">
            Secure Your Spot
        </h1>
    </div>
</section>

<section style="background-color: var(--blanc);">
    <div class="row g-0">

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

        <div class="col-lg-6">
            <div class="form-section">

                <?php if ($message_succes): ?>
                    <div class="alert alert-success mb-4"><?= $message_succes ?></div>
                <?php endif; ?>

                <?php if ($message_erreur): ?>
                    <div class="alert alert-danger mb-4"><?= $message_erreur ?></div>
                <?php endif; ?>

                <form action="inscription.php" method="post">

                    <div class="mb-3">
                        <label class="form-label">Nom complet (Parent/Tuteur ou Joueur)</label>
                        <input type="text" class="form-control" name="nom"
                               value="<?= $_POST['nom'] ?? '' ?>"
                               placeholder="Ex : Ahmed Ben Ali">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" name="email"
                               value="<?= $_POST['email'] ?? '' ?>"
                               placeholder="exemple@email.com">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control" name="telephone"
                               value="<?= $_POST['telephone'] ?? '' ?>"
                               placeholder="+216 XX XXX XXX">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Groupe d'âge</label>
                        <?php foreach (['Juniors (6-9)', 'Teens (10-14)', 'All Ages'] as $groupe): ?>
                            <label class="age-option">
                                <input type="radio" name="groupe_age" value="<?= $groupe ?>"
                                       <?= (($_POST['groupe_age'] ?? '') == $groupe) ? 'checked' : '' ?>>
                                <?= $groupe ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Session souhaitée</label>
                        <select class="form-select" name="session">
                            <option value="">-- Choisir un créneau --</option>
                            <?php while ($s = mysqli_fetch_assoc($result_sessions)): ?>
                                <option value="Session du <?= date('d/m/Y', strtotime($s['date_debut'])) ?>"
                                        <?= ($session_preselect == $s['id']) ? 'selected' : '' ?>>
                                    <?= date('d/m/Y', strtotime($s['date_debut'])) ?>
                                    — <?= date('H\hi', strtotime($s['date_debut'])) ?>
                                    → <?= date('H\hi', strtotime($s['date_fin'])) ?>
                                    (<?= $s['groupe_age'] ?>)
                                </option>
                            <?php endwhile; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Commentaires / Demandes spéciales (Optionnel)</label>
                        <textarea class="form-control" name="commentaire" rows="3"
                                  placeholder="Ex : allergie, besoin particulier…"><?= $_POST['commentaire'] ?? '' ?></textarea>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-jaune btn-lg">S'inscrire</button>
                    </div>

                    <p class="form-note mt-3">Vos données personnelles ne seront jamais partagées.</p>

                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
