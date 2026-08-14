<?php

$homepageVariant = strtolower(trim((string) env('FOREMOST_HOMEPAGE_VARIANT', 'v2')));
$whatsappNumber = preg_replace(
    '/\D+/',
    '',
    (string) env('FOREMOST_WHATSAPP_NUMBER', ''),
);

return [
    'homepage_variant' => in_array($homepageVariant, ['v1', 'v2'], true)
        ? $homepageVariant
        : 'v2',
    'whatsapp_number' => $whatsappNumber !== '' ? $whatsappNumber : null,
];
