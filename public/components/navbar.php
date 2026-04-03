<?php
$isHomePage = $isHomePage ?? false;
$homePrefix = $isHomePage ? '' : '/index.php';
?>
<nav>
    <a href="<?= $homePrefix ?>#hero" class="logo">
        <img src="../assets/images/oleria-logo-bueroreinigung-graz.png" alt="Oleria Logo">
    </a>
    <button class="menu-toggle" aria-expanded="false" aria-controls="main-nav" title="Navigation">
        <i data-feather="menu"></i>
    </button>
    <ul id="main-nav">
        <li><a href="<?= $homePrefix ?>#problem">Problem</a></li>
        <li><a href="<?= $homePrefix ?>#offer">Leistung</a></li>
        <li><a href="<?= $homePrefix ?>#proof">Nachvollziehbarkeit</a></li>
        <li><a href="<?= $homePrefix ?>#team">Team</a></li>
        <li><a href="<?= $homePrefix ?>#faq">Fragen</a></li>
        <li><a href="<?= $homePrefix ?>#contact">Kontakt</a></li>
    </ul>
</nav>