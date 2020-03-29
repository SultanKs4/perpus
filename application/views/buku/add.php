<div class="container mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header font-weight-bold">
                Form Edit Data Buku
            </div>
            <div class="card-body">
                <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
                <?php endif ?>
                <form method="post" action="">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <input id="judul" class="form-control" type="text" name="judul">
                    </div>
                    <div class="form-group">
                        <label for="penulis" class="font-weight-bold">Penulis</label>
                        <input id="penulis" class="form-control" type="text" name="penulis">
                    </div>
                    <div class=" form-group">
                        <label for="penerbit" class="font-weight-bold">Penerbit</label>
                        <input id="penerbit" class="form-control" type="text" name="penerbit">
                    </div>
                    <div class=" form-group">
                        <label for="rak" class="font-weight-bold">Rak</label>
                        <input id="rak" class="form-control" type="text" name="rak">
                    </div>
                    <div class=" form-group">
                        <label for="idkategori" class="font-weight-bold">Kategori</label>
                        <select class="form-content" id="idkategori" name="idkategori">
                            <?php foreach ($kategori as $key) :  ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>