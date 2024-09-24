<?php
// UltraMsg API credentials
$instance_id = "instance75206"; // Replace with your UltraMsg instance ID
$token = "60r5480ejv67kjzg"; // Replace with your UltraMsg token

// WhatsApp message details
$to = "+212613306238"; // Replace with the recipient's phone number
$image_path = "/images/img.jpg"; // Replace with your server's image path

// Full URL of the image on your server
$image_url = "https://localhost/rissala/test" . $image_path; // Ensure this points to the uploaded image on your server
$caption = "Here is your image"; // Optional caption for the image

// API endpoint URL
$url = "https://api.ultramsg.com/$instance_id/messages/image";

// Prepare the data
$data = [
    'to' => $to,
    'image' => $image_url,
    'caption' => $caption
];

// Initialize cURL
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $token",
    "Content-Type: application/x-www-form-urlencoded"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

// Execute the API request
$response = curl_exec($ch);

// Check for errors
if ($response === false) {
    echo "cURL Error: " . curl_error($ch);
} else {
    // Decode and print the response
    $result = json_decode($response, true);
    echo "Response: " . print_r($result, true);
}

// Close cURL
curl_close($ch);
?>
