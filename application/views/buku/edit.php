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
                    <input type="hidden" name="id" value="<?= $buku['id']; ?>">
                    <div class="form-group">
                        <label for="judul" class="font-weight-bold">Judul</label>
                        <input id="judul" class="form-control" type="text" name="judul" value="<?= $buku['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="penulis" class="font-weight-bold">Penulis</label>
                        <input id="penulis" class="form-control" type="text" name="penulis"
                            value="<?= $buku['penulis'] ?>">
                    </div>
                    <div class=" form-group">
                        <label for="penerbit" class="font-weight-bold">Penerbit</label>
                        <input id="penerbit" class="form-control" type="text" name="penerbit"
                            value="<?= $buku['penerbit']; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="rak" class="font-weight-bold">Rak</label>
                        <input id="rak" class="form-control" type="text" name="rak" value="<?= $buku['rak']; ?>">
                    </div>
                    <div class=" form-group">
                        <label for="idkategori" class="font-weight-bold">Kategori</label>
                        <select class="form-content" id="idkategori" name="idkategori">
                            <!-- Jobsheet 4 Praktikum Bagian 1 Langkah 7 F -->
                            <?php foreach ($kategori as $key) :  ?>
                            <?php if ($key['nama'] == $buku['kategori']) : ?>
                            <option value="<?= $key['id'] ?>" selected><?= $key['nama'] ?></option>
                            <?php else : ?>
                            <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>