<?php
$titre_page = 'Contact — Kick Start Stadiums';

$message_envoye = false;
$erreur_contact = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // TODO : Validation + envoi email ici
    $message_envoye = true;
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

        <!-- Partie droite : image joueuse (image5) -->
        <div style="height: 380px; overflow: hidden;">
            <img src="images/image5.png"
                 alt="Joueuse avec ballon"
                 style="width: 100%; height: 100%;
                        object-fit: cover; object-position: top; display: block;">
        </div>

    </div>
</section>

<!-- ===================== IMAGE BANNIÈRE BAS (image8) ===================== -->
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
                        ✅ Votre message a bien été envoyé ! Nous vous répondrons rapidement.
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
                                   name="nom_contact" placeholder="Ahmed Ben Ali" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email_contact" class="form-label">Votre email</label>
<input type="email" class="form-control" id="email_contact"
                                   name="email_contact" placeholder="exemple@email.com" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="sujet" class="form-label">Sujet</label>
                        <select class="form-select" id="sujet" name="sujet">
                            <option value="">-- Choisir un sujet --</option>
                            <option value="reservation">Réservation de terrain</option>
                            <option value="inscription">Inscription aux entraînements</option>
                            <option value="tarifs">Informations sur les tarifs</option>
                            <option value="autre">Autre</option>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label for="message" class="form-label">Votre message</label>
                        <textarea class="form-control" id="message" name="message"
                                  rows="5" placeholder="Décrivez votre demande…" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-bleu btn-lg w-100">
                        Envoyer le message
                    </button>

                </form>
            </div>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
