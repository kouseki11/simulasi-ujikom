<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Register &mdash; Stisla</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets') }}/css/style.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/css/components.css">

</head>

<body>
    <div id="app">
        <section class="section">
            @if (session('success'))
            <div class="alert alert-success pb-0" role="alert">
                <h4 class="alert-heading">Berhasil !</h4>
                <p>{{ session('success') }}</p>
            </div>
            @endif
            @if (session('error'))
            <div class="alert alert-danger pb-0" role="alert">
                <h4 class="alert-heading">Terjadi Masalah</h4>
                <p>{{ session('error') }}</p>
            </div>
            @endif
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-6 mx-auto">
                        <div class="login-brand">
                            <img src="{{ asset('assets') }}/img/logo.png" alt="logo" width="100"
                                class="shadow-light rounded-circle">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register.create') }}" class="needs-validation"
                                    novalidate="">
                                    @csrf
                            <div class="row row-cols-1 row-cols-lg-2">            
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="nisn">NISN</label>
                                        <input id="nisn @error('nisn') is-invalid @enderror" type="nisn" class="form-control" name="nisn"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your nisn
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="name" class="control-label">Name</label>
                                        <input id="name" type="name" class="form-control" name="name"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your name
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2">      
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="school" class="form-label">Asal Sekolah</label>
                                        <select class="form-select form-control @error('school') is-invalid @enderror" name="school" id="school" style="width: 200px">
                                            <option value="" selected disabled>Select an School</option>
                                          
                                                <option value="SMPN 18 Bogor">SMPN 18 Bogor</option>
                                            
                                        </select>
                                        @error('school')<span class="text-danger d-block">{{ $message }}</span>@enderror
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="control-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            tabindex="2" required>
                                        <div class="invalid-feedback">
                                            please fill in your email
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row row-cols-1 row-cols-lg-2">            
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="phone_number">Phone Number</label>
                                        <input id="phone_number" type="phone_number" class="form-control" name="phone_number"
                                            tabindex="1" required autofocus>
                                        <div class="invalid-feedback">
                                            Please fill in your phone number
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="gender" class="form-label">Jenis Kelamin</label>
                                        <select class="form-select form-control"  name="gender" id="gender" style="width: 200px">
                                            <option value="" selected disabled>Select an gender</option>
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
                                        <label for="minat_jurusan" class="form-label">Minat Jurusan</label>
                                        <select class="form-select form-control"  name="minat_jurusan" id="minat_jurusan" style="width: 200px">
                                            <option value="" selected disabled>Select an jurusan</option>
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

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Register
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script src="{{ asset('assets') }}/js/scripts.js"></script>
    <script src="{{ asset('assets') }}/js/custom.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
    <script type="text/javascript">

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
</body>

</html>
