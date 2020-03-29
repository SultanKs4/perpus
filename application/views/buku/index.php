<div class="container">
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="col-md-12">
                <h1 style="text-align: center; margin-top: 30px;">Data Buku</h1>
            </div>
            <table class="table table-striped table-bordered" id="list_buku">
                <thead>
                    <tr id="row-head">
                        <th>#</th>
                        <th>Judul</th>
                        <th>penulis</th>
                        <th>penerbit</th>
                        <th>kategori</th>
                        <th>rak</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($buku as $bk) : ?>
                    <tr id="row-data">
                        <td><?= $no++ ?></td>
                        <td><?= $bk['judul']; ?></td>
                        <td><?= $bk['penulis']; ?></td>
                        <td><?= $bk['penerbit']; ?></td>
                        <td><?= $bk['kategori']; ?></td>
                        <td><?= $bk['rak']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>