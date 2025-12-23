<?php

namespace App\Http\Services;

class LineNotifyService
{
    public function execute($message)
    {
        $url = "https://notify-api.line.me/api/notify";
        $headers = [
            'Content-Type: application/x-www-form-urlencoded',
            'Authorization: Bearer ' . config('line.token')
        ];

// Define the message to be sent
        $data = [
            'message' => $message
        ];

// Initialize cURL
        $ch = curl_init($url);


        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);

        curl_close($ch);
    }
}
