<div class="container mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header font-weight-bold">
                Form Tambah Data Anggota
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
                        <label for="alamat" class="font-weight-bold">Alamat</label>
                        <input id="alamat" class="form-control" type="text" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="telepon" class="font-weight-bold">Telepon</label>
                        <input id="telepon" class="form-control" type="tel" name="telepon">
                    </div>
                    <div class="form-group">
                        <label for="level" class="font-weight-bold">Level</label>
                        <select class="form-content" id="level" name="level">
                            <?php foreach ($level as $key) :  ?>
                            <option value="<?= $key['id'] ?>"><?= $key['level'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="username" class="font-weight-bold">Username</label>
                        <input id="username" class="form-control" type="text" name="username">
                    </div>
                    <div class="form-group">
                        <label for="password" class="font-weight-bold">Password</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>
                    <button class="btn btn-primary float-right" type="submit" name="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>