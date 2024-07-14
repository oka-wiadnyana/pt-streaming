<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Edit Klasifikasi Perkara</h4>
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
                            <h4 class="mt-0 header-title mb-4">Edit Klasifikasi Perkara</h4>
                            <div class="col d-md-flex justify-content-center">
                                <form method="post" action="{{ url('/admin/update_klasifikasi') }}" class="col-md-6">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Klasifikasi</label>
                                        <input type="text" id="" class="form-control"
                                            name="klasifikasi_text" value="{{ $data['klasifikasi_text'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Jenis Perkara</label>
                                        <input type="text" id="" class="form-control" name="jenis_perkara"
                                            value="{{ $data['jenis_perkara'] }}">
                                    </div>
                                    <input type="hidden" name="id" value="{{ $data['id'] }}">

                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url('/admin/klasifikasi_perkara') }}"
                                            class="btn btn-warning">Kembali</a>
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
    @endpush
</x-layout.main>
