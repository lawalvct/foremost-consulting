<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$outputDirectory = $root.'/public/brand/leadership';

if (! is_dir($outputDirectory) && ! mkdir($outputDirectory, 0755, true)) {
    throw new RuntimeException('Unable to create the leadership image directory.');
}

$portraits = [
    [
        'source' => $root.'/docs/design/benjamin.jpeg',
        'output' => $outputDirectory.'/benjamin-omonayajo.webp',
        'loader' => 'imagecreatefromjpeg',
    ],
    [
        'source' => $root.'/docs/design/jubril.jpeg',
        'output' => $outputDirectory.'/jubril-lawal.webp',
        'loader' => 'imagecreatefromjpeg',
    ],
    [
        'source' => $root.'/docs/design/moshood.png',
        'output' => $outputDirectory.'/moshood-sadiq.webp',
        'loader' => 'imagecreatefrompng',
    ],
];

foreach ($portraits as $portrait) {
    if (! is_file($portrait['source'])) {
        throw new RuntimeException("Portrait is missing: {$portrait['source']}");
    }

    $loader = $portrait['loader'];
    $source = $loader($portrait['source']);

    if ($source === false) {
        throw new RuntimeException("Unable to open portrait: {$portrait['source']}");
    }

    $sourceWidth = imagesx($source);
    $sourceHeight = imagesy($source);
    $targetWidth = min(800, $sourceWidth);
    $targetHeight = (int) round($sourceHeight * ($targetWidth / $sourceWidth));
    $resized = imagecreatetruecolor($targetWidth, $targetHeight);

    if ($resized === false) {
        imagedestroy($source);
        throw new RuntimeException('Unable to create the resized portrait.');
    }

    imagealphablending($resized, false);
    imagesavealpha($resized, true);
    $transparent = imagecolorallocatealpha($resized, 0, 0, 0, 127);
    imagefilledrectangle($resized, 0, 0, $targetWidth, $targetHeight, $transparent);
    imagecopyresampled(
        $resized,
        $source,
        0,
        0,
        0,
        0,
        $targetWidth,
        $targetHeight,
        $sourceWidth,
        $sourceHeight,
    );

    if (! imagewebp($resized, $portrait['output'], 84)) {
        imagedestroy($resized);
        imagedestroy($source);
        throw new RuntimeException("Unable to write portrait: {$portrait['output']}");
    }

    imagedestroy($resized);
    imagedestroy($source);

    echo "Prepared {$portrait['output']}".PHP_EOL;
}
