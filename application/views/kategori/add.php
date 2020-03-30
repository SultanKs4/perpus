<div class="container mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header font-weight-bold">
                Form Tambah Data Kategori
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="nama" class="font-weight-bold">Nama</label>
                        <input id="nama" class="form-control" type="text" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="font-weight-bold">Keterangan</label>
                        <input id="keterangan" class="form-control" type="text" name="keterangan">
                    </div>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>