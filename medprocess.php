<?php
if ($_FILES['image']['error'] == UPLOAD_ERR_OK) {
    $apiKey = "AIzaSyCDV-ArqY9VBfR9jOncK_a0vWZupMsSLqQ";
    $imagePath = $_FILES['image']['tmp_name'];
    $imageData = base64_encode(file_get_contents($imagePath));

    // Step 1: Extract medicine name from the image
    $apiUrl = "https://generativelanguage.googleapis.com/v1/models/gemini-2.0-flash:generateContent?key=" . $apiKey;
    
    $postData = json_encode([
        "contents" => [
            [
                "parts" => [
                    ["inlineData" => ["mimeType" => "image/jpeg", "data" => $imageData]],
                    ["text" => "Extract only the name of the medicine from this image."]
                ]
            ]
        ]
    ]);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $apiUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    $response = curl_exec($ch);
    curl_close($ch);

    // Extract medicine name
    $responseData = json_decode($response, true);
    $medicineName = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? "Unknown Medicine";

    if ($medicineName !== "Unknown Medicine") {
        // Step 2: Ask Gemini about this medicine (uses, dosage, side effects)
        $postData = json_encode([
            "contents" => [
                [
                    "parts" => [
                        ["text" => "Give me detailed information about the medicine '$medicineName'. Include its uses, recommended dosage, and possible side effects (section wise). Format it as a readable response in 200 words."]
                    ]
                ]
            ]
        ]);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $apiUrl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        curl_close($ch);

        // Extract formatted medicine information
        $responseData = json_decode($response, true);
        $medicineInfo = $responseData['candidates'][0]['content']['parts'][0]['text'] ?? "No additional details found.";

        // Step 3: Display the results
        echo "<h3>Medicine Details</h3>";
        echo "<p><strong>Name:</strong> " . htmlspecialchars($medicineName) . "</p>";
        echo "<div style='font-size: 18px; line-height: 1.5;'>";
        echo nl2br(htmlspecialchars($medicineInfo));
        echo "</div>";
    } else {
        echo "<p style='color: red;'>Medicine name not detected. Please try again.</p>";
    }
} else {
    echo "<p style='color: red;'>Image upload failed. Please try again.</p>";
}
?>
