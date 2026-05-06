<?php
/*
 * Fichier : inscription.php
 * Page : Secure Your Spot — Formulaire d'inscription avec insertion en BDD
 */

$titre_page = 'Inscription — Kick Start Stadiums';

include 'includes/connexion.php';

$message_succes = '';
$message_erreur = '';

// -------------------------------------------------------
// Traitement du formulaire quand il est soumis (POST)
// -------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // 1. Récupérer et nettoyer les données envoyées
    $nom        = trim($_POST['nom'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $telephone  = trim($_POST['telephone'] ?? '');
    $groupe_age = trim($_POST['groupe_age'] ?? '');
    $session    = trim($_POST['session'] ?? '');
    $commentaire = trim($_POST['commentaire'] ?? '');

    // 2. Vérifier les champs obligatoires
    if (empty($nom) || empty($email) || empty($telephone) || empty($groupe_age)) {
        $message_erreur = "Veuillez remplir tous les champs obligatoires.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message_erreur = "L'adresse email n'est pas valide.";

    } else {
        // 3. Insérer l'inscription dans la base de données
        try {
            $stmt = $pdo->prepare("
                INSERT INTO inscriptions (nom, email, telephone, groupe_age, session, commentaire)
                VALUES (:nom, :email, :telephone, :groupe_age, :session, :commentaire)
            ");

            $stmt->execute([
                ':nom'        => $nom,
                ':email'      => $email,
                ':telephone'  => $telephone,
                ':groupe_age' => $groupe_age,
                ':session'    => $session,
                ':commentaire' => $commentaire ?: null,
            ]);

            $message_succes = "✅ Votre inscription a bien été enregistrée ! On vous contacte bientôt.";

        } catch (PDOException $e) {
            $message_erreur = "Une erreur est survenue lors de l'enregistrement. Réessayez.";
        }
    }
}

// -------------------------------------------------------
// Charger les sessions disponibles pour le menu déroulant
// -------------------------------------------------------
$requete_sessions = $pdo->query("
    SELECT id, date_debut, date_fin, groupe_age
    FROM sessions
    WHERE actif = 1
    ORDER BY date_debut ASC
");
$sessions_dispo = $requete_sessions->fetchAll();

// Si on vient du calendrier avec un session_id en paramètre URL
$session_preselect = $_GET['session_id'] ?? null;

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== BANNIÈRE ===================== -->
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

        <!-- Colonne gauche : image + texte -->
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

                    <!-- Nom -->
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom complet (Parent/Tuteur ou Joueur)</label>
                        <input type="text" class="form-control" id="nom" name="nom"
                               value="<?= htmlspecialchars($_POST['nom'] ?? '') ?>"
                               placeholder="Ex : Ahmed Ben Ali" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Adresse Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                               placeholder="exemple@email.com" required>
                    </div>

                    <!-- Téléphone -->
                    <div class="mb-3">
                        <label for="telephone" class="form-label">Numéro de téléphone</label>
                        <input type="tel" class="form-control" id="telephone" name="telephone"
                               value="<?= htmlspecialchars($_POST['telephone'] ?? '') ?>"
                               placeholder="+216 XX XXX XXX" required>
                    </div>

                    <!-- Groupe d'âge -->
                    <div class="mb-3">
                        <label class="form-label">Groupe d'âge</label>

                        <?php
                        $groupes = ['Juniors (6-9)', 'Teens (10-14)', 'All Ages'];
                        foreach ($groupes as $groupe):
                            $selectionne = (($_POST['groupe_age'] ?? '') === $groupe) ? 'checked' : '';
                        ?>
                            <label class="age-option">
                                <input type="radio" name="groupe_age"
                                       value="<?= htmlspecialchars($groupe) ?>" <?= $selectionne ?> required>
                                <?= htmlspecialchars($groupe) ?>
                            </label>
                        <?php endforeach; ?>
                    </div>

                    <!-- Session (chargée depuis la BDD) -->
                    <div class="mb-3">
                        <label for="session" class="form-label">Session souhaitée</label>
                        <select class="form-select" id="session" name="session">
                            <option value="">-- Choisir un créneau --</option>
                            <?php foreach ($sessions_dispo as $s):
                                $libelle = date('d/m/Y', strtotime($s['date_debut']))
                                         . ' — ' . date('H\hi', strtotime($s['date_debut']))
                                         . ' → ' . date('H\hi', strtotime($s['date_fin']))
                                         . ' (' . $s['groupe_age'] . ')';
                                $selectionne = ($session_preselect == $s['id']) ? 'selected' : '';
                            ?>
                                <option value="Session du <?= date('d/m/Y', strtotime($s['date_debut'])) ?>"
                                        <?= $selectionne ?>>
                                    <?= htmlspecialchars($libelle) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Commentaire -->
                    <div class="mb-4">
                        <label for="commentaire" class="form-label">
                            Commentaires / Demandes spéciales (Optionnel)
                        </label>
                        <textarea class="form-control" id="commentaire" name="commentaire"
                                  rows="3" placeholder="Ex : allergie, besoin particulier…"><?= htmlspecialchars($_POST['commentaire'] ?? '') ?></textarea>
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
