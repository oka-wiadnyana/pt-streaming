<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Laporan</h4>
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
                            <h4 class="mt-0 header-title mb-4">Cetak Laporan</h4>
                            <div class="col d-md-flex justify-content-center">
                                <form method="post" action="{{ url('/admin/cetak_laporan') }}" class="col-md-6">
                                    @csrf
                                    @php
                                        \Carbon\Carbon::setLocale('id');
                                    @endphp
                                    <div class="form-group">
                                        <label for="" class="form-label">Bulan</label>
                                        <select name="bulan" id="" class="form-control">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}">
                                                    {{ \Carbon\Carbon::parse(date('Y') . '-' . $i . '-01')->isoFormat('MMMM') }}
                                                </option>
                                            @endfor

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tahun</label>
                                        <select name="tahun" id="" class="form-control">
                                            <option value="" selected disabled>Pilih ..</option>
                                            @for ($i = 0; $i < 10; $i++)
                                                <option value="{{ date('Y') - $i }}">{{ date('Y') - $i }}</option>
                                            @endfor

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Hakim</label>
                                        <select name="hakim" id="" class="form-control">
                                            <option value="" selected>Semua</option>
                                            @foreach ($hakim as $h)
                                                <option value="{{ $h->id }}">{{ $h->hakim_nama }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">PP</label>
                                        <select name="pp" id="" class="form-control">
                                            <option value="" selected>Semua</option>
                                            @foreach ($pp as $h)
                                                <option value="{{ $h->id }}">{{ $h->pp_nama }}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal laporan</label>
                                        <input type="date" name="tanggal_laporan" id=""
                                            class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Panitera Muda Hukum</label>
                                        <input type="text" name="panitera_muda_hukum" id=""
                                            class="form-control">

                                    </div>


                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-primary">Submit</button>

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
