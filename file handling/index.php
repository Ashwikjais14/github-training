<?php

$uploadDir = __DIR__ . "/uploads/";
$files = [];

if (is_dir($uploadDir)) {
    $items = scandir($uploadDir);

    foreach ($items as $item) {
        if ($item === "." || $item === "..") {
            continue;
        }

        $filePath = $uploadDir . $item;

        if (is_file($filePath)) {
            $files[] = [
                "name" => $item,
                "size" => filesize($filePath),
                "time" => filemtime($filePath)
            ];
        }
    }
}

// Newest files first
usort($files, function ($a, $b) {
    return $b["time"] <=> $a["time"];
});

$message = $_GET["message"] ?? "";
$type = $_GET["type"] ?? "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>File Upload Module</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="container">

    <div class="card">

        <h1>File Upload Module</h1>

        <p class="subtitle">
            Upload images or PDF files
        </p>

        <?php if ($message): ?>

            <div class="<?= $type === 'success' ? 'success' : 'error' ?>">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>

        <form
            action="upload.php"
            method="POST"
            enctype="multipart/form-data"
        >

            <label for="file">
                Select File
            </label>

            <input
                type="file"
                id="file"
                name="file"
                accept=".jpg,.jpeg,.png,.gif,.webp,.pdf"
                required
            >

            <p class="file-info">
                Allowed: JPG, JPEG, PNG, GIF, WEBP, PDF<br>
                Maximum size: 5 MB
            </p>

            <button type="submit">
                Upload File
            </button>

        </form>

    </div>


    <div class="card">

        <h2>Uploaded Files</h2>

        <?php if (empty($files)): ?>

            <p class="empty">
                No files uploaded yet.
            </p>

        <?php else: ?>

            <div class="file-list">

                <?php foreach ($files as $file): ?>

                    <?php
                    $extension = strtolower(
                        pathinfo($file["name"], PATHINFO_EXTENSION)
                    );

                    $size = $file["size"];

                    if ($size >= 1024 * 1024) {
                        $formattedSize =
                            round($size / (1024 * 1024), 2) . " MB";
                    } else {
                        $formattedSize =
                            round($size / 1024, 2) . " KB";
                    }
                    ?>

                    <div class="file-item">

                        <div class="file-details">

                            <strong>
                                <?= htmlspecialchars($file["name"]) ?>
                            </strong>

                            <span>
                                <?= strtoupper($extension) ?>
                                ·
                                <?= $formattedSize ?>
                            </span>

                        </div>

                        <a
                            href="uploads/<?= rawurlencode($file["name"]) ?>"
                            target="_blank"
                            class="view-btn"
                        >
                            View
                        </a>

                    </div>

                <?php endforeach; ?>

            </div>

        <?php endif; ?>

    </div>

</div>

</body>
</html>