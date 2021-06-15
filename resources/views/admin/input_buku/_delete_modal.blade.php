<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Data</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{url($user->level.'/delete-book',$book->id_buku)}}" method="POST">
                @csrf
                @method('delete')
                <input type="hidden" name="id_buku" id="delete-id">
                <div class="modal-body">
                    <span class=" text-danger">Apakah anda yakin ingin menghapus buku <span class="text-dark" id="judulBuku"></span> ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>