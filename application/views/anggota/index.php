<div class="container">
    <?php if ($this->session->flashdata('flash-data')) : ?>
    <div class="row mt-3">
        <div class="col-md-6">
            <!-- Jobsheet 3 Praktikum Bagian 1 Langkah 6 -->
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Data Anggota <strong> berhasil </strong> <?= $this->session->flashdata('flash-data'); ?>
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
                <h1 style="text-align: center; margin-top: 30px;">Data Anggota</h1>
            </div>
            <table class="table table-striped table-bordered" id="list_anggota">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>nama</th>
                        <th>alamat</th>
                        <th>telepon</th>
                        <th>level</th>
                        <th>username</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($anggota as $at) : ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $at['nama']; ?></td>
                        <td><?= $at['alamat']; ?></td>
                        <td><?= $at['telepon']; ?></td>
                        <td><?= $at['level']; ?></td>
                        <td><?= $at['username']; ?></td>
                        <td>
                            <a href="<?= base_url(); ?>anggota/edit/<?= $at['id']; ?>"
                                class="badge badge-success">Edit</a>
                            <a href="<?= base_url(); ?>anggota/delete/<?= $at['id']; ?>" class="badge badge-danger"
                                onclick="return confirm('Yakin Data ini akan dihapus?');">Hapus</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function() {
    $('#list_anggota').DataTable();
});
</script>