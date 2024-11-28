<?php 

// Initialize cURL session
$ch = curl_init();

// Set the cURL options
curl_setopt($ch, CURLOPT_URL, 'https://sendbox-277094416812.us-central1.run.app/interactive');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Authorization: Basic bWF5YW5rOjEyMzQ1Ng==',
    'Content-Type: application/json',
]);

// Set the POST data
$data = json_encode([
    'question' => $_POST['question'],
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

// Execute the request and capture the response
$response = curl_exec($ch);

echo $response;die;