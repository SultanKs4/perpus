<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title><?= $title ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">SSS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto" id="navbar-data">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>buku">Data Buku</a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto" id="navbar-user">
                <li class="nav-item mt-2">
                    <?= "Hello, " . $this->session->userdata('user'); ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>login/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>