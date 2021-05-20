<?php
?>

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $data['page_title'] . " | " . WEBSITE_TITLE ?></title>
    <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">
</head>
<body>

<!-- <section class="container"> -->
<?php $this->view("partialsNav", $data); ?>
