<?php
$titre_page = 'Calendrier — Kick Start Stadiums';
include 'includes/head.php';

$sessions = [
    [
        'date'    => 'Dimanche 8h → 9h30',
        'groupes' => [
            ['age' => '6–8 ans',   'prix' => '195$', 'note' => 'Core Skills + Mini Games'],
            ['age' => '9–11 ans',  'prix' => '215$', 'note' => 'Skill & Match Play'],
        ]
    ],
    [
        'date'    => 'Samedi 17h → 18h30',
        'groupes' => [
            ['age' => '12–14 ans', 'prix' => '235$', 'note' => 'Positional + Team Tactics'],
        ]
    ],
    [
        'date'    => 'Samedi 18h30 → 20h',
        'groupes' => [
            ['age' => '6–8 ans',   'prix' => '195$', 'note' => 'First Touch & Dribbling'],
            ['age' => '9–12 ans',  'prix' => '215$', 'note' => 'Shooting & Match Play'],
        ]
    ],
];
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== IMAGE HERO ===================== -->
<img src="images/image4.png"
     alt="Joueurs sur le terrain"
     style="width: 100%; height: 320px; object-fit: cover; object-position: center; display: block;">

<!-- ===================== INTRO + TITRE ===================== -->
<section class="calendar-intro">
    <div class="container">
        <h1>Camp Calendar</h1>
        <p>Choose your session, show up, and play your best game.</p>
    </div>
</section>

<!-- ===================== TABLEAU DES SESSIONS ===================== -->
<section style="background-color: #eef9a8; padding: 20px 0 60px 0;">
    <div class="container">
        <div class="table-responsive">
            <table class="table-calendar">
                <thead>
                    <tr>
                        <th>Dates</th>
                        <th>Groupe d'âge</th>
                        <th>Prix</th>
                        <th>Notes</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sessions as $session): ?>
                        <?php $nb_groupes = count($session['groupes']); ?>
                        <?php foreach ($session['groupes'] as $index => $groupe): ?>
                            <tr>
                                <?php if ($index === 0): ?>
                                    <td rowspan="<?= $nb_groupes ?>">
                                        <?= htmlspecialchars($session['date']) ?>
                                    </td>
                                <?php endif; ?>
                                <td><?= htmlspecialchars($groupe['age']) ?></td>
                                <td><?= htmlspecialchars($groupe['prix']) ?></td>
                                <td><?= htmlspecialchars($groupe['note']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="inscription.php" class="btn btn-bleu btn-lg">
                S'inscrire à une session
            </a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
