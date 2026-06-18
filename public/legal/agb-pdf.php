<?php

declare(strict_types=1);

$showAgbPdfDownload = false;

ob_start();
include __DIR__ . '/partials/agb-content.php';
$content = ob_get_clean();

$content = preg_replace(
    '~(<h2>.*?</h2>\s*<div class="legal-subsection">\s*<h3>.*?</h3>\s*<div class="legal-subsection-body">\s*<p>.*?</p>\s*</div>\s*</div>)~s',
    '<div class="legal-section-start">$1</div>',
    $content
);

$html = <<<HTML
<!DOCTYPE html>
<html lang="de-AT">
<head>
    <meta charset="UTF-8">
    <title>AGB | Oleria</title>
    <style>
        body {
            padding-top: 0;
            color: #0a2540;
            background: #ffffff;
            font-family: Arial, sans-serif;
            margin: 0;
        }
        .legal-page { margin: 0; }
        .container,
        .legal-container {
            display: block;
            max-width: none;
            width: auto;
            margin: 0;
            align-items: stretch;
        }
        .legal-header {
            text-align: center;
            margin-bottom: 18pt;
        }
        .legal-header h1 {
            font-size: 22pt;
            line-height: 1.15;
            margin: 0 0 7pt;
            font-weight: 700;
        }
        .legal-subtitle {
            font-size: 10.5pt;
            line-height: 1.35;
            margin: 0 auto;
            color: #0a2540;
        }
        .legal-content {
            border: 0;
            box-shadow: none;
            border-radius: 0;
            padding: 0;
            background: #ffffff;
            line-height: 1.35;
            color: #0a2540;
        }
        .legal-content p,
        .legal-content li {
            font-size: 9.5pt;
            line-height: 1.35;
        }
        .legal-content > p { margin: 0 0 10pt; }
        .legal-content h2 {
            font-size: 12.5pt;
            line-height: 1.25;
            margin: 15pt 0 6pt;
            page-break-after: avoid;
        }
        .legal-content > h2:first-child { margin-top: 0; }
        .legal-section-start {
            page-break-inside: avoid;
        }
        .legal-subsection {
            display: table;
            width: 100%;
            margin: 0 0 7pt;
            page-break-inside: avoid;
        }
        .legal-subsection h3 {
            display: table-cell;
            width: 30pt;
            margin: 0;
            padding: 0 8pt 0 0;
            font-size: 9.5pt;
            line-height: 1.35;
            color: #0a2540;
            font-weight: 700;
            text-align: left;
            vertical-align: top;
        }
        .legal-subsection-body {
            display: table-cell;
            min-width: 0;
            vertical-align: top;
        }
        .legal-subsection-body p {
            margin: 0;
            text-align: justify;
            text-justify: inter-word;
        }
    </style>
</head>
<body>
<section class="legal-page">
    <div class="container legal-container">
        {$content}
    </div>
</section>
</body>
</html>
HTML;

$htmlTemp = tempnam(sys_get_temp_dir(), 'oleria-agb-html-');
$htmlFile = $htmlTemp . '.html';
$pdfFile = tempnam(sys_get_temp_dir(), 'oleria-agb-pdf-');

if (is_file($htmlTemp)) {
    unlink($htmlTemp);
}

file_put_contents($htmlFile, $html);

register_shutdown_function(static function () use ($htmlFile, $pdfFile): void {
    if (is_file($htmlFile)) {
        unlink($htmlFile);
    }

    if (is_file($pdfFile)) {
        unlink($pdfFile);
    }
});

$binary = getenv('WKHTMLTOPDF_BINARY') ?: '/usr/local/bin/wkhtmltopdf';
if (!is_executable($binary)) {
    $binary = 'wkhtmltopdf';
}

$command = sprintf(
    '%s --quiet --encoding utf-8 --page-size A4 --margin-top 25mm --margin-right 23mm --margin-bottom 25mm --margin-left 23mm %s %s 2>&1',
    escapeshellarg($binary),
    escapeshellarg($htmlFile),
    escapeshellarg($pdfFile)
);

exec($command, $output, $exitCode);

if ($exitCode !== 0 || !is_file($pdfFile)) {
    http_response_code(500);
    header('Content-Type: text/plain; charset=UTF-8');
    echo "Die PDF-Datei konnte nicht erzeugt werden.\n";
    echo implode("\n", $output);
    exit;
}

header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="agb-oleria-bueroreinigung-graz.pdf"');
header('Content-Length: ' . filesize($pdfFile));
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');

readfile($pdfFile);
