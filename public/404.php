<?php http_response_code(404); ?>
<!DOCTYPE html>
<html lang="de-AT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Seite nicht gefunden | Oleria</title>
    <meta name="description" content="Diese Seite konnte nicht gefunden werden. Büroreinigung in Graz – Oleria.">

    <meta name="robots" content="noindex, follow">

    <meta property="og:title" content="Seite nicht gefunden | Oleria">
    <meta property="og:description" content="Diese Seite konnte nicht gefunden werden.">
    <meta property="og:type" content="website">

    <link rel="icon" href="/assets/images/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="theme-color" content="#ffffff">

    <link rel="stylesheet" href="/assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
    <script src="/assets/js/main.js" defer></script>
</head>

<body>
<?php include __DIR__ . '/components/navbar.php'; ?>
<section class="section section-white">
    <div class="container" style="text-align:center; padding: 6rem 0;">
        <h1>Diese Seite konnte nicht gefunden werden</h1>
        <p style="max-width:600px; margin: 1rem auto;">
            Möglicherweise wurde sie verschoben oder existiert nicht mehr.
            Wenn Sie nach einer zuverlässigen Büroreinigung in Graz suchen,
            sind Sie hier trotzdem richtig.
        </p>
        <div style="margin-top:2rem;">
            <a href="/" class="btn navy-btn">Zur Startseite</a>
            <a href="/#contact" class="btn navy-btn">Beratung vereinbaren</a>
        </div>
    </div>
</section>
<?php include __DIR__ . '/components/footer.php'; ?>
</body>
</html>
