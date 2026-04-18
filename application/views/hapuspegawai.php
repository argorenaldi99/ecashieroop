<div class="modal" id="hapuspegawai<?= $d['id']; ?>">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h4 class="modal-title">Hapus</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <p>Apakah anda yakin untuk menghapus data pegawai <?= $d['nama_pegawai']; ?> ?</p>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="keluarbtn" onclick="location.href = '<?= base_url(); ?>admin/hapuspegawai/<?= $d['id']; ?>';">Ya</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
      </div>

    </div>
  </div>
</div>