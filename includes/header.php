<?php
require_once __DIR__ . '/../config/app.php';

$pageTitle = $pageTitle ?? SITE_NAME;
$pageStyles = $pageStyles ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($pageTitle); ?></title>
    <link rel="icon" href="icons/favicon.png" type="image/png">
<?php foreach ($pageStyles as $style): ?>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($style); ?>">
<?php endforeach; ?>

</head>
<body>
