<?php
$titre_page = 'Calendrier — Kick Start Stadiums';

include 'includes/connexion.php';

$result = mysqli_query($conn, "SELECT * FROM sessions WHERE actif = 1 ORDER BY date_debut ASC");

include 'includes/head.php';
?>

<?php include 'includes/navbar.php'; ?>

<img src="images/image4.png"
     alt="Joueurs sur le terrain"
     style="width: 100%; height: 320px; object-fit: cover; object-position: center; display: block;">

<section class="calendar-intro">
    <div class="container">
        <h1>Camp Calendar</h1>
        <p>Choose your session, show up, and play your best game.</p>
    </div>
</section>

<section style="background-color: #eef9a8; padding: 20px 0 60px 0;">
    <div class="container">

        <?php if (mysqli_num_rows($result) == 0): ?>
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
                        <?php while ($session = mysqli_fetch_assoc($result)): ?>
                            <tr>
                                <td><?= date('d/m/Y', strtotime($session['date_debut'])) ?></td>
                                <td><?= date('H\hi', strtotime($session['date_debut'])) ?> → <?= date('H\hi', strtotime($session['date_fin'])) ?></td>
                                <td><?= $session['groupe_age'] ?></td>
                                <td><?= number_format($session['prix'], 2) ?> $</td>
                                <td><?= $session['places_max'] ?> places</td>
                                <td><?= $session['notes'] ?></td>
                                <td>
                                    <a href="inscription.php?session_id=<?= $session['id'] ?>" class="btn btn-bleu btn-sm">
                                        S'inscrire
                                    </a>
                                </td>
                            </tr>
                        <?php endwhile; ?>
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
