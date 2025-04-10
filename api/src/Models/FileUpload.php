<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('POST request method required');
}

if (empty($_FILES) || !isset($_FILES['fileToUpload'])) {
    http_response_code(400);
    exit('No file was uploaded. Use key=fileToUpload in form-data');
}

$uploadDir = __DIR__ . '/uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0755, true);
}

$fileInfo = $_FILES['fileToUpload'];
$targetFile = $uploadDir . basename($fileInfo['name']);
$imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
$maxSize = 5 * 1024 * 1024; // 5 MB
$allowed = ['jpg','jpeg','png','gif'];
$errors = [];

if (file_exists($targetFile)) {
    $errors[] = 'File already exists.';
}

if ($fileInfo['size'] > $maxSize) {
    $errors[] = 'File is too large. Max 5MB.';
}


if (!in_array($imageFileType, $allowed, true)) {
    $errors[] = 'Invalid file type. Only JPG, JPEG, PNG & GIF allowed.';
}


if (!empty($errors)) {
    http_response_code(400);
    foreach ($errors as $e) {
        echo $e . "\n";
    }
    exit;
}


if (!move_uploaded_file($fileInfo['tmp_name'], $targetFile)) {
    http_response_code(500);
    exit('Error moving uploaded file.');
}


http_response_code(200);
echo 'Upload successful: ' . htmlspecialchars(basename($fileInfo['name']));

