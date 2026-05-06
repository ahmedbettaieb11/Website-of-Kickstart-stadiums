<?php
/*
 * Fichier : calendrier.php
 * Page : Camp Calendar — Sessions chargées depuis la base de données
 */

$titre_page = 'Calendrier — Kick Start Stadiums';

// Connexion à la base de données
include 'includes/connexion.php';

// Récupération des sessions actives, triées par date
$requete = $pdo->query("
    SELECT id, date_debut, date_fin, groupe_age, prix, notes, places_max
    FROM sessions
    WHERE actif = 1
    ORDER BY date_debut ASC
");
$sessions = $requete->fetchAll();

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== IMAGE HERO ===================== -->
<img src="images/image4.png"
     alt="Joueurs sur le terrain"
     style="width: 100%; height: 320px; object-fit: cover; object-position: center; display: block;">

<!-- ===================== TITRE ===================== -->
<section class="calendar-intro">
    <div class="container">
        <h1>Camp Calendar</h1>
        <p>Choose your session, show up, and play your best game.</p>
    </div>
</section>

<!-- ===================== TABLEAU DES SESSIONS ===================== -->
<section style="background-color: #eef9a8; padding: 20px 0 60px 0;">
    <div class="container">

        <?php if (empty($sessions)): ?>
            <div class="alert alert-info text-center mt-4">
                Aucune session disponible pour le moment. Revenez bientôt !
            </div>

        <?php else: ?>
            <div class="table-responsive">
                <table class="table-calendar">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Horaire</th>
                            <th>Groupe d'âge</th>
                            <th>Prix</th>
                            <th>Places</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sessions as $session): ?>
                            <?php
                                $date        = date('d/m/Y', strtotime($session['date_debut']));
                                $heure_debut = date('H\hi', strtotime($session['date_debut']));
                                $heure_fin   = date('H\hi', strtotime($session['date_fin']));
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($date) ?></td>
                                <td><?= $heure_debut ?> → <?= $heure_fin ?></td>
                                <td><?= htmlspecialchars($session['groupe_age']) ?></td>
                                <td><?= number_format($session['prix'], 2) ?> $</td>
                                <td><?= htmlspecialchars($session['places_max']) ?> places</td>
                                <td><?= htmlspecialchars($session['notes']) ?></td>
                                <td>
                                    <a href="inscription.php?session_id=<?= $session['id'] ?>"
                                       class="btn btn-bleu btn-sm">
                                        S'inscrire
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>

    </div>
</section>

<?php include 'includes/footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
