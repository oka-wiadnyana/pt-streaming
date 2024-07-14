<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Edit perkara Nomor {{ $data->nomor_perkara }}</h4>
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
                            <h4 class="mt-0 header-title mb-4">Edit Perkara</h4>
                            <div class="col d-md-flex justify-content-center">
                                <form method="post" action="{{ url('/admin/update') }}" class="col-md-6"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Perkara PT <small
                                                class="text-danger">*</small></label>
                                        <input type="text" id="" class="form-control" name="nomor_perkara"
                                            value="{{ $data->nomor_perkara }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Nomor Perkara PN <small
                                                class="text-danger">*</small></label>
                                        <input type="text" id="" class="form-control"
                                            name="nomor_perkara_pertama"value="{{ $data->nomor_perkara_pertama }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Perkara <small
                                                class="text-danger">*</small></label>
                                        <select id="" class="form-control" name="jenis_perkara">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @foreach ($klasifikasi as $k)
                                                <option value="{{ $k->jenis_perkara }}" @selected($k->jenis_perkara === $data->jenis_perkara)>
                                                    {{ $k->jenis_perkara }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Klasifikasi</label>
                                        <select id="" class="form-control" name="klasifikasi_perkara">
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Ketua</label>
                                        <select id="" class="form-control" name="hk">
                                            <option value="" disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}" @selected($h->id == $data->hk)>
                                                    {{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Anggota 1</label>
                                        <select id="" class="form-control" name="ha1">
                                            <option value="" disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}" @selected($h->id == $data->ha1)>
                                                    {{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim Anggota 2</label>
                                        <select id="" class="form-control" name="ha2">
                                            <option value="" disabled>Pilih ..</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}" @selected($h->id == $data->ha2)>
                                                    {{ $h->hakim_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">PP</label>
                                        <select id="" class="form-control" name="pp">
                                            <option value="" disabled>Pilih ..</option>
                                            @foreach ($pp as $h)
                                                <option value="{{ $h->id }}" @selected($h->id == $data->pp)>
                                                    {{ $h->pp_nama }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal putus <small
                                                class="text-danger">*</small></label>
                                        <input type="date" id="" class="form-control" name="tanggal_sidang"
                                            value="{{ $data->tanggal_sidang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Pukul</label>
                                        <input type="time" id="" class="form-control" name="pukul"
                                            value="{{ $data->pukul }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Link Streaming</label>
                                        <input type="text" id="" class="form-control"
                                            name="link_streaming" value="{{ $data->link_streaming }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Amar Putusan</label>
                                        <textarea id="myeditorinstance" name="amar_putusan">{{ $data->amar_putusan }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Upload Copy Putusan</label>
                                        <input type="file" class="form-control" name="doc_putusan">
                                    </div>

                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url()->previous() }}" class="btn btn-warning">Kembali</a>
                                    </div>
                                    <input type="hidden" name="id" value="{{ $data->id }}">
                                    <input type="hidden" name="doc_lama" value="{{ $data->doc_putusan }}">
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

            initOptions = document.createElement('option');

            klasifikasi.add(initOptions);
            fetch(`{{ url('/admin/get_klasifikasi/' . $data->jenis_perkara) }}`).then(data => data.json()).then(d => {
                console.log(d);
                klasifikasi.innerHTML = "";
                options = document.createElement('option');
                options.text = "Pilih";
                options.value = "";
                klasifikasi.add(options);
                d.forEach(element => {
                    let initOptions;

                    initOptions = document.createElement('option');
                    initOptions.text = element.klasifikasi_text;
                    initOptions.value = element.klasifikasi_text;
                    if (element.klasifikasi_text == "{{ $data->klasifikasi_perkara }}") {
                        initOptions.setAttribute('selected', 'selected');
                    }

                    klasifikasi.add(initOptions);
                });
            })

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
