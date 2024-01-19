@extends('layout.master')
@section('navbar-sidebar')
@include('component._navbar')
@include('component._sidebar')
@endsection
@section('content')
@if (session('error'))
    <div class="alert alert-danger pb-0" role="alert">
        <h4 class="alert-heading">Terjadi Masalah</h4>
        <p>{{ session('error') }}</p>
    </div>
@endif
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<form action="{{ route('user.update',$user->id) }}" method="post">
    @csrf
    @method('put')
    <div class="card">
        <div class="card-body">
            
            <div class="row row-cols-1 row-cols-lg-2">           
                <div class="col">
                    <div class="mb-3">
                        <label for="nisn" class="form-label">NISN <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" id="nisn" placeholder="Masukkan Nisn" value="{{ old('nisn') ? old('nisn') : $user->nisn }}">
                        @error('nisn')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Masukkan name" value="{{ old('name') ? old('name') : $user->name }}">
                        @error('name')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>                    
            
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Masukkan Email" value="{{ old('email') ? old('email') : $user->email }}">
                        @error('email')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                        <label for="school" class="form-label">Asal Sekolah<span class="text-danger">*</span></label>
                        <select class="form-select form-control @error('school') is-invalid @enderror" name="school" id="school">
                            <option value="" selected disabled>Select a School</option>
                                <option value="{{ $user->school }}" selected>{{ $user->school }}</option>
                                @foreach ($schools as $school)
                                    <option value="{{ $school['nama_sekolah'] }}">{{ $school['nama_sekolah'] }}</option>
                                @endforeach
                        </select>
                        @error('school')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>  
            </div>

            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number<span class="text-danger">*</span></label>
                        <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" id="phone_number" placeholder="Masukkan phone_number" value="{{ old('phone_number') ? old('phone_number') : $user->phone_number }}">
                        @error('phone_number')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>
                
                <div class="col">
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin<span class="text-danger">*</span></label>
                        <select class="form-select form-control @error('gender') is-invalid @enderror" name="gender" id="gender">
                            <option value="" selected disabled>Select an gender</option>
                                <option value="{{ $user->gender }}" selected>{{ $user->gender }}</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki - Laki</option>
                        </select>
                        @error('gender')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>  
            </div>

            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col">
                    <div class="mb-3">
                        <label for="minat_jurusan" class="form-label">Minat Jurusan<span class="text-danger">*</span></label>
                        <select class="form-select form-control @error('minat_jurusan') is-invalid @enderror" name="minat_jurusan" id="minat_jurusan">
                            <option value="" selected disabled>Select an minat jurusan</option>
                                <option value="{{ $user->minat_jurusan }}" selected>{{ $user->minat_jurusan }}</option>
                                <option value="PPLG">PPLG</option>
                                <option value="DKV">DKV</option>
                                <option value="TJKT">TJKT</option>
                                <option value="MPLB">MPLB</option>
                                <option value="PMN">PMN</option>
                                <option value="KLN">KLN</option>
                                <option value="HTL">HTL</option>
                        </select>
                        @error('minat_jurusan')<span class="text-danger d-block">{{ $message }}</span>@enderror
                    </div>
                </div>  
            </div>

            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script>
    $("#school").select2({
        placeholder: 'Select School',
        allowClear: true
    });

    $("#gender").select2({
        placeholder: 'Select gender',
        allowClear: true
    });

    $("#minat_jurusan").select2({
        placeholder: 'Select jurusan',
        allowClear: true
    });
</script>
@endsection
