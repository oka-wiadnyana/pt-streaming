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
                                            <option value="Pidana" @selected($data->jenis_perkara === 'Pidana')>Pidana</option>
                                            <option value="Perdata" @selected($data->jenis_perkara === 'Perdata')>Perdata</option>
                                            <option value="Tipikor" @selected($data->jenis_perkara === 'Tipikor')>Tipikor</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Tanggal sidang <small
                                                class="text-danger">*</small></label>
                                        <input type="date" id="" class="form-control" name="tanggal_sidang"
                                            value="{{ $data->tanggal_sidang }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Link Streaming</label>
                                        <input type="text" id="" class="form-control" name="link_streaming"
                                            value="{{ $data->link_streaming }}">
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
    @endpush
</x-layout.main>
