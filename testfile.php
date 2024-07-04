<?php
function isVideoByExtension($filePath) {
    $videoExtensions = ['mp4', 'avi', 'wmv', 'flv', 'mkv', 'mov', 'mpeg'];

    $fileExtension = pathinfo($filePath, PATHINFO_EXTENSION);

    return in_array(strtolower($fileExtension), $videoExtensions);
}

// Usage
$filePath = "admin\postimages\mid-adult-blonde-female-political-leader-addressing-world-important-issues-wit-SBV-346755528-preview(1).mp4";
if (isVideoByExtension($filePath)) {
    echo "The file is a video.";
} else {
    echo "The file is not a video.";
}
?>