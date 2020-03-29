$(document).ready(function() {
    if (level == "admin") {
        add()
    }
    $('#list_buku').DataTable();
});

function add() {
    $("#row-head").append("<th>aksi</th>");
    $("#row-data").append(`<td>
    <a href="<?= base_url(); ?>mahasiswa/hapus/<?= $mhs['id']; ?>"
        class="badge badge-danger"
        onclick="return confirm('Yakin Data ini akan dihpus?');">Hapus</a>
    <a href="<?= base_url(); ?>mahasiswa/edit/<?= $mhs['id']; ?>"
        class="badge badge-success mr-1">Edit</a>
    <a href="<?= base_url(); ?>mahasiswa/detail/<?= $mhs['id']; ?>"
        class="badge badge-primary mr-1">Detail</a>
</td>`);
}