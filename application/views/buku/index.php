<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Buku <strong> berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="col-md-12">
                <h1 style="text-align: center; margin-top: 30px;">Data Buku</h1>
            </div>
            <table class="table table-striped table-bordered" id="list_buku">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>penulis</th>
                        <th>penerbit</th>
                        <th>kategori</th>
                        <th>rak</th>
                        <?php if ($this->session->userdata('level') == "2" || $this->session->userdata('level') == "3") : ?>
                        <th>aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($buku as $bk) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $bk['judul']; ?></td>
                        <td><?= $bk['penulis']; ?></td>
                        <td><?= $bk['penerbit']; ?></td>
                        <td><?= $bk['kategori']; ?></td>
                        <td><?= $bk['rak']; ?></td>
                        <?php if ($this->session->userdata('level') == "2" || $this->session->userdata('level') == "3") : ?>
                        <td>
                            <a href="<?= base_url(); ?>buku/edit/<?= $bk['id']; ?>" class="badge badge-success">Edit</a>
                            <a href="<?= base_url(); ?>buku/delete/<?= $bk['id']; ?>" class="badge badge-danger"
                                onclick="return confirm('Yakin Data ini akan dihapus?');">Hapus</a>
                        </td>
                        <?php endif; ?>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#list_buku').DataTable();
});
</script>