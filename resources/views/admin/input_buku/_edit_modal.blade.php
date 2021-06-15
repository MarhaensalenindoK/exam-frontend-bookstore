<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url($user->level.'/edit-buku')}}" method="post">
                <div class="modal-body">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <h6>Id Buku</h6>
                            <input type="text" id="edit-id_buku" name="id_buku" class="form-control" readonly>
                        </div>
                        <div class="form-group">
                            <h6>Judul Buku</h6>
                            <input type="text" id="edit-judul" name="judul" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>No ISBN</h6>
                            <input type="text" id="edit-noisbn" name="noisbn" class="form-control"  autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>Penulis</h6>
                            <input type="text" id="edit-penulis" name="penulis" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>Penerbit</h6>
                            <input type="text" id="edit-penerbit" name="penerbit" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>Tahun Terbit</h6>
                            <input type="text" id="edit-tahun" name="tahun" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>Harga Pokok</h6>
                            <input type="text" id="edit-harga_pokok" name="harga_pokok" class="form-control" autocomplete="off"> 
                        </div>
                        <div class="form-group">
                            <h6>Harga Jual</h6>
                            <input type="text" id="edit-harga_jual" name="harga_jual" class="form-control" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <h6>Diskon</h6>
                            <input type="number" min="0" id="edit-diskon" name="diskon" class="form-control w-25" autocomplete="off">
                        </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
            </form>
        </div>
    </div>
</div>