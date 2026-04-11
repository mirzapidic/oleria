<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= htmlspecialchars($pageTitle ?? 'Oleria') ?></title>
    <meta name="description" content="<?= htmlspecialchars($pageDescription ?? '') ?>">
    <meta name="robots" content="<?= htmlspecialchars($pageRobots ?? 'index, follow') ?>">
    <link rel="canonical" href="<?= htmlspecialchars($pageCanonical ?? 'https://oleria.at/') ?>">

    <meta property="og:url" content="<?= htmlspecialchars($pageCanonical ?? 'https://oleria.at/') ?>">
    <meta property="og:site_name" content="Oleria">
    <meta property="og:locale" content="de_AT">
    <meta property="og:type" content="<?= htmlspecialchars($pageOgType ?? 'article') ?>">
    <meta property="og:title" content="<?= htmlspecialchars($pageTitle ?? 'Oleria') ?>">
    <meta property="og:description" content="<?= htmlspecialchars($pageDescription ?? '') ?>">
    <meta property="og:image" content="<?= htmlspecialchars($pageOgImage ?? 'https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.webp') ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= htmlspecialchars($pageTitle ?? 'Oleria') ?>">
    <meta name="twitter:description" content="<?= htmlspecialchars($pageDescription ?? '') ?>">
    <meta name="twitter:image" content="<?= htmlspecialchars($pageOgImage ?? 'https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.webp') ?>">

    <link rel="icon" href="/assets/images/favicon.ico" sizes="any">
    <link rel="icon" type="image/png" sizes="192x192" href="/assets/images/android-chrome-192x192.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/favicon-16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/assets/images/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/assets/images/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">

    <?php
    $schemaPageTitle = $pageTitle ?? 'Oleria';
    $schemaDescription = $pageDescription ?? '';
    $schemaCanonical = $pageCanonical ?? 'https://oleria.at/';
    $schemaOgImage = $pageOgImage ?? 'https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.webp';
    $schemaHeadline = $articleHeadline ?? $schemaPageTitle;

    $schemaDatePublished = $articleDatePublished ?? null;
    $schemaDateModified = $articleDateModified ?? $schemaDatePublished;

    $graph = array_values(array_filter([
            [
                    '@type' => 'WebPage',
                    '@id' => $schemaCanonical . '#webpage',
                    'url' => $schemaCanonical,
                    'name' => $schemaPageTitle,
                    'description' => $schemaDescription,
                    'isPartOf' => [
                            '@id' => 'https://oleria.at/#website'
                    ],
                    'about' => [
                            '@id' => 'https://oleria.at/#localbusiness'
                    ],
                    'primaryImageOfPage' => [
                            '@type' => 'ImageObject',
                            '@id' => $schemaCanonical . '#primaryimage',
                            'url' => $schemaOgImage
                    ],
                    'inLanguage' => 'de-AT'
            ],
            [
                    '@type' => 'BlogPosting',
                    '@id' => $schemaCanonical . '#blogposting',
                    'mainEntityOfPage' => [
                            '@id' => $schemaCanonical . '#webpage'
                    ],
                    'headline' => $schemaHeadline,
                    'description' => $schemaDescription,
                    'image' => [
                            '@id' => $schemaCanonical . '#primaryimage'
                    ],
                    'author' => [
                            '@type' => 'Organization',
                            '@id' => 'https://oleria.at/#localbusiness',
                            'name' => 'Oleria'
                    ],
                    'publisher' => [
                            '@type' => 'Organization',
                            '@id' => 'https://oleria.at/#localbusiness',
                            'name' => 'Oleria',
                            'logo' => [
                                    '@type' => 'ImageObject',
                                    '@id' => 'https://oleria.at/#logo',
                                    'url' => 'https://oleria.at/assets/images/oleria-logo-bueroreinigung-graz.webp'
                            ]
                    ],
                    'inLanguage' => 'de-AT',
                    'about' => [
                            [
                                    '@type' => 'Thing',
                                    'name' => 'Büroreinigung'
                            ],
                            [
                                    '@type' => 'Thing',
                                    'name' => 'Graz'
                            ]
                    ],
                    'articleSection' => $articleSection ?? 'Büroreinigung',
                    'keywords' => $articleKeywords ?? null,
                    'datePublished' => $schemaDatePublished,
                    'dateModified' => $schemaDateModified
            ]
    ]));
    ?>

    <script type="application/ld+json">
    <?= json_encode([
                    '@context' => 'https://schema.org',
                    '@graph' => $graph
            ], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) ?>
    </script>

    <link rel="stylesheet" href="/assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
    <script src="/assets/js/main.js" defer></script>
</head>
