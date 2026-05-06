# Kick Start Stadiums — Documentation du projet

## Structure du projet

```
kickstart/
│
├── index.php              → Page d'accueil (About)
├── calendrier.php         → Calendrier des sessions
├── inscription.php        → Formulaire d'inscription
├── faq.php                → Foire aux questions
├── contact.php            → Page de contact
│
├── css/
│   └── style.css          → Feuille de style principale
│
├── js/
│   └── (vide pour l'instant — ajouter scripts ici)
│
├── images/
│   └── (placer toutes les images ici)
│       Noms recommandés :
│       - placeholder-purpose.jpg      (card Purpose)
│       - placeholder-approach.jpg     (card Approach)
│       - placeholder-community.jpg    (card Community)
│       - placeholder-calendar.jpg     (hero Calendar)
│       - placeholder-registration.jpg (hero Registration)
│       - placeholder-faq.jpg          (hero FAQ — ballon en l'air)
│       - placeholder-contact1.jpg     (joueuse avec ballon)
│       - placeholder-contact2.jpg     (vue terrain/sol)
│
└── includes/
    ├── head.php            → Balises <head> communes (Bootstrap, fonts, CSS)
    ├── navbar.php          → Barre de navigation responsive
    └── footer.php          → Pied de page avec coordonnées et réseaux sociaux
```

## Palette de couleurs

| Nom             | Valeur CSS          |
|-----------------|---------------------|
| Bleu principal  | `#1a8fdc`           |
| Bleu foncé      | `#0d6aaa`           |
| Jaune accent    | `#d4f542`           |
| Jaune clair     | `#eef9a8`           |
| Texte sombre    | `#1a1a2e`           |
| Blanc           | `#ffffff`           |

## Polices utilisées

- **Barlow Condensed** (700, 800, 900) — titres et headings
- **Barlow** (400, 600, 700) — texte courant

Chargées via Google Fonts (dans `includes/head.php`).

## Technologies

- PHP 8+ (serveur)
- Bootstrap 5.3 (via CDN)
- Bootstrap Icons 1.11 (icônes réseaux sociaux)
- CSS personnalisé (`css/style.css`)

## Étapes pour ajouter le PHP

### 1. Connexion à la base de données
Créer un fichier `includes/connexion.php` :
```php
<?php
$hote  = 'localhost';
$bdd   = 'kickstart_db';
$user  = 'root';
$mdp   = '';

try {
    $pdo = new PDO("mysql:host=$hote;dbname=$bdd;charset=utf8", $user, $mdp);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}
```

### 2. Tables suggérées (MySQL)

```sql
-- Table des inscriptions
CREATE TABLE inscriptions (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    nom         VARCHAR(100) NOT NULL,
    email       VARCHAR(150) NOT NULL,
    telephone   VARCHAR(20)  NOT NULL,
    groupe_age  VARCHAR(20)  NOT NULL,
    session     VARCHAR(50),
    commentaire TEXT,
    date_inscription DATETIME DEFAULT NOW()
);

-- Table des sessions/créneaux
CREATE TABLE sessions (
    id          INT AUTO_INCREMENT PRIMARY KEY,
    date_debut  DATETIME NOT NULL,
    date_fin    DATETIME NOT NULL,
    groupe_age  VARCHAR(30),
    prix        DECIMAL(8,2),
    notes       VARCHAR(200),
    places_max  INT DEFAULT 20,
    actif       TINYINT DEFAULT 1
);

-- Table des messages de contact
CREATE TABLE messages_contact (
    id      INT AUTO_INCREMENT PRIMARY KEY,
    nom     VARCHAR(100),
    email   VARCHAR(150),
    sujet   VARCHAR(100),
    message TEXT,
    date_envoi DATETIME DEFAULT NOW(),
    lu      TINYINT DEFAULT 0
);
```

### 3. Authentification (connexion admin)
Prévoir un fichier `admin/connexion.php` avec :
- Formulaire login/mot de passe
- Session PHP (`$_SESSION['admin'] = true`)
- Vérification `session_start()` sur toutes les pages admin

## Notes pour le déploiement

- Hébergement : Apache ou Nginx avec PHP 8+
- BDD : MySQL ou MariaDB
- Configurer `.htaccess` pour masquer les `.php` si souhaité
- Activer HTTPS (Let's Encrypt)
- Ne jamais committer `includes/connexion.php` avec les vrais identifiants (utiliser `.env`)
