<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url($user->level.'/input-distributor')}}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="hidden" id="edit_id" name="id_distributor">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <h6>Nama Distributor</h6>
                        <input type="text" id="edit_nama" name="nama" class="form-control"  autocomplete="off">
                    </div>
                    <div class="form-group">
                        <h6>Alamat</h6>
                        <textarea name="alamat" id="edit_alamat" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <h6>Telepon</h6>
                        <input type="text" id="edit_telepon" name="telepon" class="form-control" autocomplete="off">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Edit Data</button>
                </div>
            </form>
        </div>
    </div>
</div>