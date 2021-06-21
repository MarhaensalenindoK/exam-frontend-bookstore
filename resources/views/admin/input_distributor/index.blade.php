@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
    <div class="container-fluid">
    <div class="card card-primary card-outline mt-5">
        <div class="card-body">
            <div class="card-body mb-3">
                <h3>Form Distributor</h3>
            </div>
            @if (Session::has('success'))
            <div class="alert alert-primary" role="alert">
                {{ Session::get('success') }}
            </div>
            @endif
        <button 
        data-bs-toggle="modal" 
        data-bs-target="#addModal" 
        class="btn btn-outline-success float-right mb-3"
        >
        Tambah Data
        </button>
        <table class="table table-hover table-bordered">
            <thead>
            <tr>
                <th scope="col">Nama Distributor</th>
                <th scope="col">Alamat</th>
                <th scope="col">Telepon</th>
                <th scope="col" colspan="2">Aksi</th>
            </tr>
            </thead>
            <tbody>
            @foreach($distributors as $item)

            <tr>
                <th>{{$item->nama_distributor}}</th>
                <td>{{$item->alamat}}</td>
                <td>{{$item->telepon}}</td>
                <td><button
                    class="btn btn-sm btn-secondary" 
                    data-bs-toggle="modal" 
                    data-bs-target="#editModal"
                    onclick="sendDataToModalEditDistributor('{{$item->id_distributor}}','{{$item->nama_distributor}}', '{{$item->alamat}}', '{{$item->telepon}}')"
                    ><span>Edit</span></button>
                </td>
                <td>
                    <button
                    class="btn btn-sm btn-danger"
                    onclick="showAlertDelete('{{$item->id_distributor}}','{{$item->nama_distributor}}')"
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
        
    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
@include('admin.input_distributor._add_distributor')
@include('admin.input_distributor._edit_distributor')
@include('admin.input_distributor._delete_distributor')
@endsection

@section('script')
<script>
    function sendDataToModalEditDistributor(id_distributor, nama_distributor, alamat, telepon){
        $('#edit_id').val(id_distributor);
        $('#edit_nama').val(nama_distributor);
        $('#edit_alamat').val(alamat);
        $('#edit_telepon').val(telepon);
    }

    function showAlertDelete(id_distributor, nama_distributor)
        {
            $('#deleteModal').modal('show')
            $('#delete-id').val(id_distributor);
            $('#nama-distributor').html(nama_distributor);
        }
</script>
@endsection