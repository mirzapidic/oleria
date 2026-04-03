<?php
http_response_code(404);
$isHomePage = false;
?>
<!DOCTYPE html>
<html lang="de-AT">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Büroreinigung Graz | Oleria - Diskret & Nachvollziehbar</title>
    <meta name="description" content="Büroreinigung in Graz für Unternehmen. Diskret, nachvollziehbar und zuverlässig – mit klaren Abläufen, dokumentierten Einsätzen und vollständiger Betreuung.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://oleria.at/">

    <meta name="geo.region" content="AT-6">
    <meta name="geo.placename" content="Graz">

    <meta property="og:url" content="https://oleria.at/">
    <meta property="og:site_name" content="Oleria">
    <meta property="og:locale" content="de_AT">
    <meta property="og:type" content="website">
    <meta property="og:title" content="Oleria – Büroreinigung in Graz">
    <meta property="og:description" content="Diskret. Nachvollziehbar. Verlässlich.">
    <meta property="og:image" content="https://oleria.at/assets/images/group_photo_desktop.png">

    <link rel="icon" href="assets/images/oleria-favicon-32x32.png" sizes="32x32">
    <link rel="apple-touch-icon" href="assets/images/oleria-apple-touch-icon.png">

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@id": "https://oleria.at/#organization",
            "@type": "LocalBusiness",
            "name": "Oleria",
            "legalName": "Pidic Facility Management GmbH",
            "url": "https://oleria.at/",
            "description": "Büroreinigung in Graz für Unternehmen. Diskret, nachvollziehbar und zuverlässig.",
            "telephone": "+436765320111",
            "email": "office@oleria.at",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Neubaugasse 45",
                "addressLocality": "Graz",
                "postalCode": "8020",
                "addressCountry": "AT"
            },
            "geo": {
                "@type": "GeoCoordinates",
                "latitude": 47.0707,
                "longitude": 15.4395
            },
            "image": "https://oleria.at/assets/images/buero-reinigung-graz-team-oleria-desktop.png",
            "logo": "https://oleria.at/assets/images/oleria-logo-bueroreinigung-graz.png",
            "areaServed": {
                "@type": "City",
                "name": "Graz"
            },
            "openingHoursSpecification": [{
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": [
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday"
                ],
                "opens": "08:00",
                "closes": "18:30"
            }],
            "hasOfferCatalog": {
                "@type": "OfferCatalog",
                "name": "Reinigungsservices",
                "itemListElement": [
                    {
                        "@type": "Offer",
                        "itemOffered": {
                            "@type": "Service",
                            "name": "Büroreinigung",
                            "serviceType": "Gewerbliche Büroreinigung"
                        }
                    },
                    {
                        "@type": "Offer",
                        "itemOffered": {
                            "@type": "Service",
                            "name": "Unterhaltsreinigung",
                            "serviceType": "Regelmäßige Reinigung von Büros"
                        }
                    },
                    {
                        "@type": "Offer",
                        "itemOffered": {
                            "@type": "Service",
                            "name": "Tiefreinigung",
                            "serviceType": "Geplante Grund- und Tiefreinigung"
                        }
                    }
                ]
            }
        }
    </script>

    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "FAQPage",
            "mainEntity": [
                {
                    "@type": "Question",
                    "name": "Was ist im Service genau enthalten?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Unser Service umfasst die laufende Büroreinigung im Alltag sowie alle strukturierten Abläufe rundherum: dokumentierte Einsätze, Qualitätskontrollen, transparente Berichte und – je nach Vereinbarung – zusätzliche Leistungen wie eingeplante Tiefreinigung und diskrete Aktenvernichtung."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Muss ich die Reinigung laufend koordinieren?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Nein. Genau dafür ist unser System gedacht. Wir übernehmen Planung, Durchführung, Kontrolle und Dokumentation, sodass Sie sich nicht laufend um Nachfragen, Zusatzaufträge oder Erinnerungen kümmern müssen."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Wie schnell kann die Betreuung starten?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "In der Regel innerhalb weniger Tage. Nach einem kurzen Abstimmungsgespräch richten wir die Abläufe für Ihr Büro ein und starten direkt mit einem strukturierten Beginn – auf Wunsch inklusive initialer Tiefreinigung."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Gibt es eine langfristige vertragliche Bindung?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Im ersten Monat arbeiten wir ohne langfristige Bindung. So können Sie unseren Service im laufenden Betrieb erleben und prüfen, ob er zu Ihrem Büro passt. Erst danach entscheiden wir gemeinsam über die weitere Zusammenarbeit."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Wie stelle ich sicher, dass die Qualität konstant bleibt?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Jeder Einsatz wird dokumentiert, kontrolliert und ausgewertet. Zusätzlich arbeiten wir mit klaren Standards, festen Verantwortlichkeiten und internen Leistungsbewertungen, sodass Qualität nicht dem Zufall überlassen wird."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Wer hat Zugang zu unseren Räumlichkeiten?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Ihr Büro wird von sorgfältig ausgewählten und geschulten Fachkräften betreut, die in Diskretion, Auftreten und Verhalten im Büroalltag trainiert sind. Durch konstante Teams bleibt der Zugang überschaubar und nachvollziehbar."
                    }
                },
                {
                    "@type": "Question",
                    "name": "Was kostet die Büroreinigung?",
                    "acceptedAnswer": {
                        "@type": "Answer",
                        "text": "Das hängt von Größe, Nutzung und Anforderungen Ihres Büros ab. Unser Ansatz ist nicht nur auf einzelne Reinigungseinsätze ausgelegt, sondern auf eine vollständige Betreuung mit klaren Abläufen und geringem Koordinationsaufwand. Gerne erstellen wir dafür eine individuelle Einschätzung."
                    }
                }
            ]
        }
    </script>

    <link rel="stylesheet" href="assets/css/main.css">

    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js" defer></script>
    <script src="assets/js/main.js" defer></script>
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
            <a href="index.php" class="btn header-btn">Zur Startseite</a>
            <a href="index.php#contact" class="btn header-btn">Beratung vereinbaren</a>
        </div>
    </div>
</section>

<?php include __DIR__ . '/components/footer.php'; ?>

</body>
</html>
