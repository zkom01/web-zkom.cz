<?php
// ── Anthropic API Proxy ──
// Načteme konfiguraci (pokud soubor existuje)
if (file_exists('config.php')) {
    require_once 'config.php';
}

// Zkontrolujeme, zda je konstanta definovaná
$apiKey = defined('ANTHROPIC_API_KEY') ? ANTHROPIC_API_KEY : '';

if (empty($apiKey)) {
    die("Chyba: Anthropic API klíč není nakonfigurován.");
}

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(204);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

$raw   = file_get_contents('php://input');
$input = json_decode($raw, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON: ' . json_last_error_msg()]);
    exit;
}

if (!isset($input['messages']) || !is_array($input['messages'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Missing or invalid messages array']);
    exit;
}

// Filtruj prazdne zpravy
$messages = array_values(array_filter($input['messages'], function($m) {
    return !empty($m['role']) && !empty($m['content']);
}));

if (empty($messages)) {
    http_response_code(400);
    echo json_encode(['error' => 'No valid messages after filtering']);
    exit;
}

$payload = json_encode([
    'model'      => 'claude-sonnet-4-6',
    'max_tokens' => 1000,
    'system'     => $input['system'] ?? '',
    'messages'   => $messages,
]);

if (!function_exists('curl_init')) {
    http_response_code(500);
    echo json_encode(['error' => 'cURL neni dostupne na tomto serveru']);
    exit;
}

$ch = curl_init('https://api.anthropic.com/v1/messages');
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST           => true,
    CURLOPT_POSTFIELDS     => $payload,
    CURLOPT_TIMEOUT        => 30,
    CURLOPT_HTTPHEADER     => [
        'Content-Type: application/json',
        'x-api-key: ' . ANTHROPIC_API_KEY,
        'anthropic-version: 2023-06-01',
    ],
]);

$response  = curl_exec($ch);
$httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
$curlError = curl_error($ch);
curl_close($ch);

if ($curlError) {
    http_response_code(500);
    echo json_encode(['error' => 'cURL chyba: ' . $curlError]);
    exit;
}

if (!$response) {
    http_response_code(500);
    echo json_encode(['error' => 'Prazdna odpoved z Anthropic API (HTTP ' . $httpCode . ')']);
    exit;
}

http_response_code($httpCode);
echo $response;
