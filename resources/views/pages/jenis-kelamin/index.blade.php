@extends('layout.master')
@section('navbar-sidebar')
@include('component._navbar')
@include('component._sidebar')
@endsection
@section('content')
@if (session('success'))
    <div class="alert alert-success pb-0" role="alert">
        <h4 class="alert-heading">Berhasil !</h4>
        <p>{{ session('success') }}</p>
    </div>
@endif
<div class="card">
    <div class="card-body">

        <div class="mb-3">
            <form action="{{ route('gender.index') }}" method="GET" class="d-flex justify-content-start gap-4">
                <select class="form-select form-control" name="gender" id="gender" style="width: 200px">
                    <option value="" selected disabled>Filter by Gender</option>
                    <option value="Perempuan">Perempuan</option>
                    <option value="Laki-Laki">Laki - Laki</option>
                </select>
                <button type="submit" class="btn btn-primary ml-2">Filter</button>
            </form>
        </div>
        
        
        
        <div class="d-flex justify-content-lg-end mb-3">
            {{-- <a class="btn btn-success" href="{{ route('user.create') }}">Tambah User</a> --}}
            <p class="text-danger">Jumlah Pendaftar : {{ $userCount }}</p>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-bordered" id="my_table">
                <thead class="bg-light">
                    <tr>
                        <th class="text-nowrap" style="width:50px">No</th>
                        <th class="text-nowrap">NISN</th>
                        <th class="text-nowrap">Name</th>
                        <th class="text-nowrap">School</th>
                        <th class="text-nowrap">Email</th>
                        <th class="text-nowrap">Phone Number</th>
                        <th class="text-nowrap">Gender</th>
                        <th class="text-nowrap">Minat Jurusan</th>
                        <th class="text-nowrap" style="width: 100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $item)
                        <tr>
                            <td class="text-nowrap">{{ $loop->iteration }}</td>
                            <td class="text-nowrap">{{ $item->nisn }}</td>
                            <td class="text-nowrap">{{ $item->name }}</td>
                            <td class="text-nowrap">{{ $item->school }}</td>
                            <td class="text-nowrap">{{ $item->email }}</td>
                            <td class="text-nowrap">{{ $item->phone_number }}</td>
                            <td class="text-nowrap">{{ $item->gender }}</td>
                            <td class="text-nowrap">{{ $item->minat_jurusan }}</td>
                            <td class="text-nowrap">
                                <div class="d-flex">
                                    <a href="{{ route('user.edit',$item->id) }}" class="btn btn-warning me-2">Edit</a>
                                    <form action="{{ route('user.destroy',$item->id) }}" method="post" id="delete_form{{ $item->id }}">
                                        @csrf
                                        @method('delete')
                                        <button type="button" class="btn btn-danger" onclick="delete_item('delete_form{{ $item->id }}')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
    function delete_item(form) {
        let cf = confirm('Yakin Menghapus Data ?')
        if (cf) {
            document.getElementById(form).submit();
        }
    }
</script>
@endsection
