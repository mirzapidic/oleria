<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($pageTitle ?? 'Oleria') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription ?? '') ?>">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?= htmlspecialchars($pageCanonical ?? 'https://oleria.at/') ?>">

    <meta name="geo.region" content="AT-6">
    <meta name="geo.placename" content="Graz">

    <meta property="og:url" content="<?= htmlspecialchars($pageCanonical ?? 'https://oleria.at/') ?>">
    <meta property="og:site_name" content="Oleria">
    <meta property="og:locale" content="de_AT">
    <meta property="og:type" content="<?= htmlspecialchars($pageOgType ?? 'article') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? 'Oleria') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription ?? '') ?>">
    <meta property="og:image" content="<?= htmlspecialchars($pageOgImage ?? 'https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.png') ?>">

    <link rel="icon" href="../assets/images/oleria-favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="../assets/images/oleria-apple-touch-icon.png">

    <script type="application/ld+json">
        {
          "@context": "https://schema.org",
          "@type": "Article",
          "headline": "<?= json_encode($articleHeadline ?? '') ?>",
          "description": "<?= json_encode($pageDescription ?? '') ?>",
          "inLanguage": "de-AT",
          "mainEntityOfPage": {
            "@type": "WebPage",
            "@id": "<?= json_encode($pageCanonical ?? 'https://oleria.at/') ?>"
            },
            "author": {
              "@type": "Organization",
              "name": "Oleria"
            },
            "publisher": {
              "@type": "Organization",
              "name": "Oleria",
              "logo": {
                "@type": "ImageObject",
                "url": "https://oleria.at/assets/images/oleria-logo-bueroreinigung-graz.png"
              }
            },
            "image": "<?= json_encode($pageOgImage ?? 'https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.png') ?>"
        }
    </script>

    <link rel="stylesheet" href="../assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
    <script src="../assets/js/main.js" defer></script>
</head>