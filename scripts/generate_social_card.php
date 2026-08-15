<?php

declare(strict_types=1);

$root = dirname(__DIR__);
$logoPath = $root.'/public/brand/foremost-logo-full.png';
$outputPath = $root.'/public/brand/foremost-social-card.png';
$serifFont = 'C:/Windows/Fonts/georgia.ttf';
$sansFont = 'C:/Windows/Fonts/arialbd.ttf';

foreach ([$logoPath, $serifFont, $sansFont] as $requiredFile) {
    if (! is_file($requiredFile)) {
        throw new RuntimeException("Required file is missing: {$requiredFile}");
    }
}

$width = 1200;
$height = 630;
$canvas = imagecreatetruecolor($width, $height);

if ($canvas === false) {
    throw new RuntimeException('Unable to create the social-card canvas.');
}

$forest = imagecolorallocate($canvas, 7, 56, 44);
$forestLight = imagecolorallocate($canvas, 11, 77, 59);
$burgundy = imagecolorallocate($canvas, 122, 38, 58);
$gold = imagecolorallocate($canvas, 195, 163, 90);
$warmWhite = imagecolorallocate($canvas, 250, 250, 247);
$white = imagecolorallocate($canvas, 255, 255, 255);
$mutedWhite = imagecolorallocate($canvas, 213, 224, 219);

imagefilledrectangle($canvas, 0, 0, $width, $height, $forest);
imagefilledrectangle($canvas, 0, 0, 14, $height, $burgundy);
imagefilledrectangle($canvas, 14, 0, 20, $height, $gold);

imagesetthickness($canvas, 2);
imageellipse($canvas, 1100, 44, 430, 430, $forestLight);
imageellipse($canvas, 1100, 44, 330, 330, $gold);
imageellipse($canvas, 1100, 44, 230, 230, $forestLight);

imagefilledrectangle($canvas, 68, 44, 1132, 300, $warmWhite);
imagefilledrectangle($canvas, 68, 44, 1132, 50, $gold);

$logo = imagecreatefrompng($logoPath);

if ($logo === false) {
    throw new RuntimeException('Unable to open the approved logo.');
}

$croppedLogo = imagecrop($logo, [
    'x' => 55,
    'y' => 148,
    'width' => 1852,
    'height' => 449,
]);

if ($croppedLogo === false) {
    imagedestroy($logo);
    throw new RuntimeException('Unable to crop the approved logo.');
}

imagealphablending($canvas, true);
imagecopyresampled(
    $canvas,
    $croppedLogo,
    128,
    62,
    0,
    0,
    944,
    229,
    imagesx($croppedLogo),
    imagesy($croppedLogo),
);

imagedestroy($croppedLogo);
imagedestroy($logo);

imagettftext(
    $canvas,
    38,
    0,
    72,
    372,
    $white,
    $serifFont,
    'Professional Insight for Better',
);
imagettftext(
    $canvas,
    38,
    0,
    72,
    426,
    $white,
    $serifFont,
    'Business Decisions.',
);

imagettftext(
    $canvas,
    16,
    0,
    74,
    486,
    $gold,
    $sansFont,
    'AUDIT  |  ACCOUNTING  |  TAX  |  ADVISORY',
);

imagefilledrectangle($canvas, 72, 522, 1128, 524, $burgundy);
imagefilledrectangle($canvas, 72, 524, 392, 526, $gold);

imagettftext(
    $canvas,
    14,
    0,
    74,
    578,
    $mutedWhite,
    $sansFont,
    'Abeokuta, Ogun State, Nigeria',
);

$website = 'foremostconsult.com';
$websiteBox = imagettfbbox(14, 0, $sansFont, $website);
$websiteWidth = $websiteBox === false ? 0 : $websiteBox[2] - $websiteBox[0];

imagettftext(
    $canvas,
    14,
    0,
    1128 - $websiteWidth,
    578,
    $white,
    $sansFont,
    $website,
);

if (! imagepng($canvas, $outputPath, 7)) {
    imagedestroy($canvas);
    throw new RuntimeException('Unable to write the social card.');
}

imagedestroy($canvas);

echo "Generated {$outputPath}".PHP_EOL;
