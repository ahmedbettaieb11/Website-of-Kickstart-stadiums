<?php
/*
 * Fichier : contact.php
 * Page : Contact — Formulaire avec enregistrement en BDD
 */

$titre_page = 'Contact — Kick Start Stadiums';

include 'includes/connexion.php';

$message_envoye = false;
$erreur_contact = '';

// -------------------------------------------------------
// Traitement du formulaire de contact
// -------------------------------------------------------
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nom     = trim($_POST['nom_contact'] ?? '');
    $email   = trim($_POST['email_contact'] ?? '');
    $sujet   = trim($_POST['sujet'] ?? '');
    $message = trim($_POST['message'] ?? '');

    if (empty($nom) || empty($email) || empty($message)) {
        $erreur_contact = "Veuillez remplir tous les champs obligatoires.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erreur_contact = "L'adresse email n'est pas valide.";

    } else {
        try {
            $stmt = $pdo->prepare("
                INSERT INTO messages_contact (nom, email, sujet, message)
                VALUES (:nom, :email, :sujet, :message)
            ");

            $stmt->execute([
                ':nom'     => $nom,
                ':email'   => $email,
                ':sujet'   => $sujet ?: 'Sans sujet',
                ':message' => $message,
            ]);

            $message_envoye = true;

        } catch (PDOException $e) {
            $erreur_contact = "Une erreur est survenue. Réessayez ou contactez-nous directement par téléphone.";
        }
    }
}

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== SECTION CONTACT HAUT ===================== -->
<section>
    <div style="display: grid; grid-template-columns: 1fr 1fr;">

        <!-- Partie gauche : fond jaune + texte -->
        <div style="background-color: var(--jaune-accent); padding: 50px 40px;
                    display: flex; flex-direction: column; justify-content: space-between;
                    min-height: 380px;">
            <div>
                <h1 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                           font-size: clamp(2rem, 5vw, 4rem); color: var(--bleu-principal);
                           text-transform: uppercase; letter-spacing: 2px;
                           line-height: 1.05; margin-bottom: 20px;">
                    Let's Talk<br>Football
                </h1>
            </div>
            <div>
                <p style="font-size: 0.95rem; line-height: 1.7; color: var(--texte-sombre);">
                    Vous avez des questions sur nos sessions, nos tarifs ou la location de terrain ?
                    On est là pour vous aider. Envoyez-nous un message ou venez nous voir directement
                    à Dar Chaabane Plage.
                </p>
            </div>
        </div>

        <!-- Partie droite : image joueuse -->
        <div style="height: 380px; overflow: hidden;">
            <img src="images/image5.png"
                 alt="Joueuse avec ballon"
                 style="width: 100%; height: 100%;
                        object-fit: cover; object-position: top; display: block;">
        </div>

    </div>
</section>

<!-- ===================== IMAGE BANNIÈRE BAS ===================== -->
<div style="overflow: hidden; height: 280px;">
    <img src="images/image8.png"
         alt="Ballon sur le terrain"
         style="width: 100%; height: 100%;
                object-fit: cover; object-position: top; display: block;">
</div>

<!-- ===================== FORMULAIRE DE CONTACT ===================== -->
<section style="background-color: var(--gris-clair); padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7">

                <h2 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                           font-size: 2rem; color: var(--bleu-principal);
                           text-transform: uppercase; letter-spacing: 1px; margin-bottom: 30px;">
                    Envoyer un message
                </h2>

                <?php if ($message_envoye): ?>
                    <div class="alert alert-success mb-4">
                        ✅ Votre message a bien été enregistré ! Nous vous répondrons rapidement.
                    </div>
                <?php endif; ?>

                <?php if ($erreur_contact): ?>
                    <div class="alert alert-danger mb-4">
                        <?= htmlspecialchars($erreur_contact) ?>
                    </div>
                <?php endif; ?>

                <form action="contact.php" method="post" novalidate class="form-section" style="padding: 0;">

                    <div class="row g-3 mb-3">
                        <div class="col-md-6">
                            <label for="nom_contact" class="form-label">Votre nom</label>
                            <input type="text" class="form-control" id="nom_contact"
                                   name="nom_contact"
                                   value="<?= htmlspecialchars($_POST['nom_contact'] ?? '') ?>"
                                   placeholder="Ahmed Ben Ali" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email_contact" class="form-label">Votre email</label>
                            <input type="email" class="form-control" id="email_contact"
                                   name="email_contact"
                                   value="<?= htmlspecialchars($_POST['email_contact'] ?? '') ?>"
                                   placeholder="exemple@email.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sujet" class="form-label">Sujet</label>
                        <select class="form-select" id="sujet" name="sujet">
                            <option value="">-- Choisir un sujet --</option>
                            <option value="reservation"   <?= (($_POST['sujet'] ?? '') === 'reservation')   ? 'selected' : '' ?>>Réservation de terrain</option>
                            <option value="inscription"   <?= (($_POST['sujet'] ?? '') === 'inscription')   ? 'selected' : '' ?>>Inscription aux entraînements</option>
                            <option value="tarifs"        <?= (($_POST['sujet'] ?? '') === 'tarifs')        ? 'selected' : '' ?>>Informations sur les tarifs</option>
                            <option value="partenariat"   <?= (($_POST['sujet'] ?? '') === 'partenariat')   ? 'selected' : '' ?>>Partenariat</option>
                            <option value="autre"         <?= (($_POST['sujet'] ?? '') === 'autre')         ? 'selected' : '' ?>>Autre</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">Votre message</label>
                        <textarea class="form-control" id="message" name="message"
                                  rows="5" placeholder="Décrivez votre demande…" required><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-bleu btn-lg w-100">
                        Envoyer le message
                    </button>

                </form>

                <!-- Coordonnées directes -->
                <div class="mt-5 p-4" style="background-color: var(--bleu-principal); border-radius: 8px;">
                    <h3 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 800;
                               color: var(--jaune-accent); font-size: 1.4rem;
                               text-transform: uppercase; margin-bottom: 12px;">
                        Ou contactez-nous directement
                    </h3>
                    <p style="color: var(--blanc); margin: 0; line-height: 2;">
                        📍 Cité Pasteur, Dar Chaabane Plage, 8070<br>
                        📞 <a href="tel:+21696466855" style="color: var(--jaune-accent);">+216 96 466 855</a><br>
                        ✉️ <a href="mailto:kickstartstadiums@gmail.com" style="color: var(--jaune-accent);">kickstartstadiums@gmail.com</a>
                    </p>
                </div>

            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
