<?php
function getChatGptResponse($message) {
    global $apiKeyOpenAI;

    $url = "https://api.openai.com/v1/chat/completions";
    $headers = [
        "Content-Type: application/json",
        "Authorization: Bearer " . $apiKeyOpenAI
    ];

    $data = [
        "model" => "gpt-3.5-turbo",  
        "messages" => [
            ["role" => "user", "content" => $message]
        ]
    ];

    error_log("Sending message to OpenAI: " . json_encode($data));  // Debug

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);
    curl_close($ch);

    error_log("OpenAI response: " . $response);  // Debug

    if ($response === false) {
        error_log("Error while calling OpenAI API: " . curl_error($ch));
        return "Sorry, I couldn't get a response from OpenAI.";
    }

    $responseData = json_decode($response, true);
    if (isset($responseData['choices'][0]['message']['content'])) {
        return $responseData['choices'][0]['message']['content'];
    }

    return "Sorry, I couldn't get a response.";
}

?>