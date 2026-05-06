<?php
$titre_page = 'FAQ — Kick Start Stadiums';
include 'includes/head.php';

$faqs = [
    [
        'num'      => '01',
        'question' => 'What should players bring?',
        'reponse'  => 'Cleats/turf shoes, shin guards, water, and a snack. Jerseys are bought from our shop.',
    ],
    [
        'num'      => '02',
        'question' => 'What if it rains?',
        'reponse'  => 'We continue in light rain. For severe weather, we move to indoor drills or reschedule.',
    ],
    [
        'num'      => '03',
        'question' => 'Who are the coaches?',
        'reponse'  => 'Certified trainers and experienced youth coaches who focus on skill and confidence building.',
    ],
    [
        'num'      => '04',
        'question' => 'Can parents watch?',
        'reponse'  => 'Absolutely — bring your cheers!',
    ],
    [
        'num'      => '05',
        'question' => 'How are players grouped?',
        'reponse'  => 'By age first, then adjusted for skill to keep sessions balanced and fun.',
    ],
];
?>

<?php include 'includes/navbar.php'; ?>

<!-- ===================== SECTION HERO ===================== -->
<section style="background-color: var(--bleu-principal); padding: 50px 30px;
                position: relative; overflow: hidden; min-height: 380px;
                display: flex; align-items: flex-start;">

    <!-- Texte à gauche -->
    <div style="max-width: 55%; position: relative; z-index: 2;">
        <h1 style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                   font-size: clamp(3rem, 7vw, 5.5rem); color: var(--jaune-accent);
                   text-transform: uppercase; letter-spacing: 2px; line-height: 1;">
            Frequently<br>Asked<br>Questions
        </h1>
        <p style="color: var(--blanc); font-size: 1.05rem; margin-top: 16px;">
            Everything you need to know before registering.
        </p>
    </div>

    <!-- Image à droite (ballon en l'air) -->
    <img src="images/image7.png"
         alt="Ballon de football en équilibre"
         style="position: absolute; right: 0; top: 0;
                height: 100%; width: 45%;
                object-fit: cover; object-position: center;">
</section>

<!-- ===================== GRILLE DES FAQs ===================== -->
<section style="background-color: var(--jaune-accent); padding: 40px 0;">
    <div class="container">
        <div class="row g-3">

            <?php foreach ($faqs as $index => $faq): ?>
                <?php $est_bleu = ($index % 2 === 0); ?>
                <div class="col-md-4">
                    <div style="padding: 24px; height: 100%;
                                background-color: <?= $est_bleu ? 'var(--bleu-principal)' : 'var(--jaune-accent)' ?>;
                                border: <?= $est_bleu ? 'none' : '2px solid var(--bleu-principal)' ?>;">

                        <div style="font-family: 'Barlow Condensed', sans-serif; font-weight: 900;
                                    font-size: 2.5rem; line-height: 1; margin-bottom: 12px;
                                    color: <?= $est_bleu ? 'var(--blanc)' : 'var(--texte-sombre)' ?>;">
                            <?= htmlspecialchars($faq['num']) ?>
                        </div>

                        <p style="font-weight: 700; font-size: 1rem; margin-bottom: 8px;
                                  color: <?= $est_bleu ? 'var(--blanc)' : 'var(--texte-sombre)' ?>;">
                            <?= htmlspecialchars($faq['question']) ?>
                        </p>

                        <p style="font-size: 0.92rem; line-height: 1.6;
                                  color: <?= $est_bleu ? 'var(--blanc)' : 'var(--texte-sombre)' ?>;">
                            <?= htmlspecialchars($faq['reponse']) ?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>

        <div class="text-center mt-5">
            <p style="font-size: 1rem; margin-bottom: 14px;">
                Vous avez une autre question ?
            </p>
            <a href="contact.php" class="btn btn-bleu">Contactez-nous</a>
        </div>
    </div>
</section>

<?php include 'includes/footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
