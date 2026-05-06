<?php
/*
 * Fichier : includes/connexion.php
 * Description : Connexion à la base de données MariaDB via PDO
 * Utilisé dans : calendrier.php, inscription.php, contact.php
 *
 * ⚠️ Change "kickstart_db" par le vrai nom de ta base si différent
 */

$hote     = 'localhost';
$base     = 'kickstart_db';   // ← Changer si ton nom de BDD est différent
$utilisateur = 'root';        // ← Par défaut sur WAMP
$mot_passe   = '';            // ← Par défaut sur WAMP (vide)

try {
    $pdo = new PDO(
        "mysql:host=$hote;dbname=$base;charset=utf8",
        $utilisateur,
        $mot_passe
    );
    // Afficher les erreurs SQL clairement pendant le développement
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Retourner les résultats sous forme de tableaux associatifs par défaut
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Afficher un message clair si la connexion échoue
    die("
        <div style='font-family: sans-serif; background: #fee; border: 2px solid red;
                    padding: 20px; margin: 20px; border-radius: 8px;'>
            <h2>❌ Erreur de connexion à la base de données</h2>
            <p><strong>Message :</strong> " . htmlspecialchars($e->getMessage()) . "</p>
            <p>Vérifie que :</p>
            <ul>
                <li>WAMP est bien démarré (icône verte)</li>
                <li>Le nom de la base est correct dans <code>includes/connexion.php</code></li>
                <li>La base de données existe dans phpMyAdmin</li>
            </ul>
        </div>
    ");
}
