<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
    <?php echo("<link rel='stylesheet' href='".$this ->config-> get('app.baseUrl')."/public/assets/css/app.css'>"); ?>
</head>
<body>
<?php $view -> component('errorModal') ?>
<?php $view -> component('header') ?>