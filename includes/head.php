<?php
/*
 * Fichier : includes/head.php
 * Description : Balises <head> communes à toutes les pages
 * Paramètre : $titre_page (string) — défini avant l'include dans chaque page
 */

// Valeur par défaut si la variable n'est pas définie
$titre_page = $titre_page ?? 'Kick Start Stadiums';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Kick Start Stadiums - Location de terrains de football et services d'entraînement à Dar Chaabane Plage.">

    <title><?= htmlspecialchars($titre_page) ?></title>

    <!-- Bootstrap 5 CSS (CDN) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts : Barlow + Barlow Condensed -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;600;700&family=Barlow+Condensed:wght@700;800;900&display=swap" rel="stylesheet">

    <!-- CSS personnalisé -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
