<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js">
    </script>
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
            <ul class="navbar-nav mr-auto">
                <?php if ($this->session->userdata('level') >= "2") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Buku
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>buku">Data Buku</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>buku/add">Tambah Buku</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Kategori
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>kategori">Data Kategori</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>kategori/add">Tambah Kategori</a>
                    </div>
                </li>
                <?php if ($this->session->userdata('level') == "3") : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Anggota
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?= base_url(); ?>anggota">Data Anggota</a>
                        <a class="dropdown-item" href="<?= base_url(); ?>anggota/add">Tambah Anggota</a>
                    </div>
                    <?php endif;  ?>
                    <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>buku">Data Buku</a>
                </li>
                <?php endif;  ?>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item mt-2">
                    <?= "Hello, " . $this->session->userdata('user'); ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url(); ?>login/logout">Logout</a>
                </li>
            </ul>
        </div>
    </nav>