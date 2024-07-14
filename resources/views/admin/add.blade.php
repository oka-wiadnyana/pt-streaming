<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Tambah perkara</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active"></li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- end container-fluid -->

    </div>
    <!-- page-title-box -->
    {{-- @dd($data) --}}
    <div class="page-content-wrapper">
        <div class="container-fluid">


            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Tambah Perkara</h4>
                            <div class="col d-md-flex justify-content-center">
                                <form method="post" action="{{ url('/admin/insert') }}" class="col-md-6">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Perkara PT</label>
                                        <input type="text" id="" class="form-control" name="nomor_perkara">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Perkara PN</label>
                                        <input type="text" id="" class="form-control"
                                            name="nomor_perkara_pertama">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Perkara</label>
                                        <select id="" class="form-control" name="jenis_perkara">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($klasifikasi as $k)
                                                <option value="{{ $k->jenis_perkara }}">{{ $k->jenis_perkara }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Klasifikasi</label>
                                        <select id="" class="form-control" name="klasifikasi_perkara">
                                            <option value="" selected disabled>Pilih ..</option>

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Ketua</label>
                                        <select id="" class="form-control" name="hk">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}">{{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Anggota</label>
                                        <select id="" class="form-control" name="ha1">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}">{{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Anggota</label>
                                        <select id="" class="form-control" name="ha2">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}">{{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">PP</label>
                                        <select id="" class="form-control" name="pp">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($pp as $h)
                                                <option value="{{ $h->id }}">{{ $h->pp_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal Putus</label>
                                        <input type="date" id="" class="form-control" name="tanggal_sidang">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Pukul</label>
                                        <input type="time" id="" class="form-control" name="pukul">
                                    </div>
                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container-fluid -->
    </div>
    <!-- end page content-->
    @push('script')
        <script>
            let jenisPerkara = document.querySelector('[name="jenis_perkara"]');
            ('jenis_perkara');
            console.log(jenisPerkara);
            let klasifikasi = document.querySelector('[name="klasifikasi_perkara"]');
            jenisPerkara.addEventListener('change', function() {
                console.log(this.value)
                klasifikasi.innerHTML = "";
                options = document.createElement('option');
                options.text = "Pilih";
                options.value = "";
                klasifikasi.add(options);
                fetch(`{{ url('/admin/get_klasifikasi') }}/${this.value}`).then(data => data.json()).then(d => {
                    d.forEach(element => {
                        let options;
                        options = document.createElement('option');
                        options.text = element.klasifikasi_text;
                        options.value = element.klasifikasi_text;
                        klasifikasi.add(options);
                    });
                })
            })
        </script>
    @endpush
</x-layout.main>
