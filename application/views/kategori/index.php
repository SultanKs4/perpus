<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- Jobsheet 3 Praktikum Bagian 1 Langkah 6 -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Kategori <strong> berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
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
                <h1 style="text-align: center; margin-top: 30px;">Data Kategori</h1>
            </div>
            <table class="table table-striped table-bordered" id="list_kategori">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama</th>
                        <th>keterangan</th>
                        <?php if ($this->session->userdata('level') == "2" || $this->session->userdata('level') == "3") : ?>
                        <th>aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($kategori as $kt) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $kt['nama']; ?></td>
                        <td><?= $kt['keterangan']; ?></td>
                        <?php if ($this->session->userdata('level') == "2" || $this->session->userdata('level') == "3") : ?>
                        <td>
                            <a href="<?= base_url(); ?>kategori/edit/<?= $kt['id']; ?>"
                                class="badge badge-success">Edit</a>
                            <a href="<?= base_url(); ?>kategori/delete/<?= $kt['id']; ?>" class="badge badge-danger"
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
    $('#list_kategori').DataTable();
});
</script>