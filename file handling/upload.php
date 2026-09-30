<?php

$uploadDir = __DIR__ . "/uploads/";

$maxFileSize = 5 * 1024 * 1024; // 5 MB

$allowedMimeTypes = [
    "image/jpeg" => "jpg",
    "image/png"  => "png",
    "image/gif"  => "gif",
    "image/webp" => "webp",
    "application/pdf" => "pdf"
];

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: index.php");
    exit();
}

if (!isset($_FILES["file"])) {
    redirectWithError("No file was selected.");
}

$file = $_FILES["file"];

// Check upload error
if ($file["error"] !== UPLOAD_ERR_OK) {

    switch ($file["error"]) {

        case UPLOAD_ERR_INI_SIZE:
        case UPLOAD_ERR_FORM_SIZE:
            redirectWithError("The uploaded file is too large.");

        case UPLOAD_ERR_NO_FILE:
            redirectWithError("Please select a file.");

        default:
            redirectWithError("File upload failed.");
    }
}

// Check file size
if ($file["size"] > $maxFileSize) {
    redirectWithError("File size must not exceed 5 MB.");
}

if ($file["size"] <= 0) {
    redirectWithError("The uploaded file is empty.");
}

// Detect actual MIME type
$finfo = new finfo(FILEINFO_MIME_TYPE);

$mimeType = $finfo->file($file["tmp_name"]);

if (!array_key_exists($mimeType, $allowedMimeTypes)) {
    redirectWithError(
        "Invalid file type. Only images and PDF files are allowed."
    );
}

// Verify image files
if (str_starts_with($mimeType, "image/")) {

    $imageInfo = getimagesize($file["tmp_name"]);

    if ($imageInfo === false) {
        redirectWithError("The uploaded image is invalid.");
    }
}

// Generate safe unique filename
$extension = $allowedMimeTypes[$mimeType];

$newFileName =
    bin2hex(random_bytes(16)) . "." . $extension;

$destination = $uploadDir . $newFileName;

// Check uploads directory
if (!is_dir($uploadDir)) {

    if (!mkdir($uploadDir, 0755, true)) {
        redirectWithError("Unable to create upload directory.");
    }
}

// Move uploaded file
if (!move_uploaded_file(
    $file["tmp_name"],
    $destination
)) {
    redirectWithError("Unable to save the uploaded file.");
}

redirectWithSuccess(
    "File uploaded successfully."
);


/*
|--------------------------------------------------------------------------
| Helper Functions
|--------------------------------------------------------------------------
*/

function redirectWithError($message)
{
    header(
        "Location: index.php?type=error&message="
        . urlencode($message)
    );

    exit();
}

function redirectWithSuccess($message)
{
    header(
        "Location: index.php?type=success&message="
        . urlencode($message)
    );

    exit();
}
?>