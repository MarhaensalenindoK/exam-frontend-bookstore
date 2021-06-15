@extends('layouts.app')

@section('content')
<div class="card card-primary card-outline mt-3">
    <div class="card-body">
        <div class="card-body mb-3">
            <h3>Form Buku</h3>
            @if (Session::has('success'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
            
        </div>

        <form action="{{url($user->level.'/input-buku')}}" method="post">
            @csrf
            <div class="form-group">
                <h6>Id Buku</h6>
                <input type="text" id="judul" name="id_buku" class="form-control" value="{{ $bookId }}" readonly>
            </div>
            <div class="form-group">
                <h6>Judul Buku</h6>
                <input type="text" id="judul" name="judul" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <h6>No ISBN</h6>
                <input type="text" id="noisbn" name="noisbn" class="form-control"  autocomplete="off">
            </div>
            <div class="form-group">
                <h6>Penulis</h6>
                <input type="text" id="penulis" name="penulis" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <h6>Penerbit</h6>
                <input type="text" id="penerbit" name="penerbit" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <h6>Tahun Terbit</h6>
                <input type="text" id="tahun" name="tahun" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <h6>Harga Pokok</h6>
                <input type="text" id="harga_pokok" name="harga_pokok" class="form-control" autocomplete="off"> 
            </div>
            <div class="form-group">
                <h6>Harga Jual</h6>
                <input type="text" id="harga_jual" name="harga_jual" class="form-control" autocomplete="off">
            </div>
            <div class="form-group">
                <h6>Diskon</h6>
                <input type="number" min="0" id="diskon" name="diskon" class="form-control w-25" autocomplete="off">
            </div>
            <div class="form-group mt-5">
                <button type="submit" class="btn btn-primary">Simpan Data</button>
            </div>
        </form>
    </div>
    
    <div class="card-body mt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Kode Buku</th>
                    <th scope="col">judul</th>
                    <th scope="col">No ISBN</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun</th>
                    <th scope="col">Harga Pokok</th>
                    <th scope="col">Harga Jual</th>
                    <th scope="col">Diskon</th>
                    <th scope="col" colspan="2">Aksi</th>
                </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <td>{{$book->id_buku}}</td>
                <td>{{$book->judul}}</td>
                <td>{{$book->noisbn}}</td>
                <td>{{$book->penulis}}</td>
                <td>{{$book->penerbit}}</td>
                <td>{{$book->tahun}}</td>
                <td>{{$book->harga_pokok}}</td>
                <td>{{$book->harga_jual}}</td>
                <td>{{$book->diskon}}</td>
                <td><a href="{{url('editBuku',$book->id_buku)}}" 
                    class="btn btn-sm btn-secondary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editModal"
                    onclick="inputDataToEditModal('{{$book->id_buku}}','{{$book->judul}}','{{$book->noisbn}}','{{$book->penulis}}','{{$book->penerbit}}','{{$book->tahun}}','{{$book->harga_pokok}}','{{$book->harga_jual}}','{{$book->diskon}}')"
                    ><span>Edit</span></a>
                </td>
                <td>
                    <button
                    onclick="showAlertDelete('{{ $book->id_buku }}','{{$book->judul}}')" 
                    class="btn btn-sm btn-danger"
                        >
                        delete
                    </button>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
    </div>
    
</div>
@include('admin.input_buku._edit_modal')
@include('admin.input_buku._delete_modal')
@endsection

@section('script')
    <script>
        function inputDataToEditModal(id_buku, judul, noisbn, penulis, penerbit, tahun, harga_pokok, harga_jual, diskon)
        {
            $('#edit-id_buku').val(id_buku);
            $('#edit-judul').val(judul);
            $('#edit-noisbn').val(noisbn);
            $('#edit-penulis').val(penulis);
            $('#edit-penerbit').val(penerbit);
            $('#edit-tahun').val(tahun);
            $('#edit-harga_pokok').val(harga_pokok);
            $('#edit-harga_jual').val(harga_jual);
            $('#edit-diskon').val(diskon);
        }
        function showAlertDelete(id_buku, judul)
        {
            $('#deleteModal').modal('show')
            $('#delete-id').val(id_buku);
            $('#judulBuku').html(judul);
        }
    </script>
@endsection