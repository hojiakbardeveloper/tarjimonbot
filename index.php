<? 

$token = "7272115712:AAGsI4dy657YHVht60vYEomPPchSsN7FJCA";
$apiUrl = "https://api.telegram.org/bot$token/";

$content = file_get_contents("php://input");
$xabar = json_decode($content, true);

$chat_id = $xabar["message"]["chat"]["id"] ?? null;
$text = $xabar["message"]["text"] ?? null;

if($text == "/start"){
    sendMessage($chat_id, "Tarjimon botga Hush kelibsiz!!! O'zbekcha so'z kiriting tarjima qilib beraman");
}
else if($text == "uy"){
    sendMessage($chat_id, "Home");
}
else if($text == "avtomobil"){
    sendMessage($chat_id, "Car");
}
else {
    sendMessage($chat_id, "Bunday so'zni bilmayman.");
}


function sendMessage($id, $matn){
    global $apiUrl;

    $url = $apiUrl."sendMessage";

    $payload = [
        "chat_id"=> $id,
        "text" => $matn
    ];

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_exec($ch);
    curl_close($ch);

}





?>

