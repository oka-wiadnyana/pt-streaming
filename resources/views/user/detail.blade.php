<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Detail perkara</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">Nomor : {{ $data->nomor_perkara }} Jo.
                            {{ $data->nomor_perkara_pertama }}</li>
                    </ol>

                </div>
            </div>
        </div>
        <!-- end container-fluid -->

    </div>
    <!-- page-title-box -->
    {{-- @dd($data) --}}
    <div class="page-content-wrapper mt-5">
        <div class="container-fluid">
            <div class="row">

            </div>
            <!-- end row -->


            <div class="row">

                <div class="col">
                    <div class="card ">
                        <div class="card-body ">

                            <div class="col-md-8 d-md-flex  p-0 mx-auto mb-2">

                                <div class="col-md-8 {{ strtolower($data->jenis_perkara) === 'pidana' ? 'bg-danger' : (strtolower($data->jenis_perkara) === 'perdata' ? 'bg-success' : (strtolower($data->jenis_perkara) === 'tipikor' ? 'bg-warning' : 'bg-info')) }} m-0 px-3 py-2 mr-2 mb-2 mb-md-0 text-center"
                                    style="border-radius: 25px">
                                    <span class="text-white h6 ">{{ $data->nomor_perkara }} Jo.
                                        {{ $data->nomor_perkara_pertama }}</span>
                                </div>
                                <div class="col-md-4 bg-primary m-0 px-3 py-2 text-center " style="border-radius: 25px">
                                    <span class="text-white h6 ">{{ $data->date_reverse }}</span>
                                </div>


                            </div>
                            <div class="col-md-8 mx-auto p-0 rounded rounded-xl mb-2" style="overflow: hidden">
                                @if ($data->link_streaming)
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <iframe class="embed-responsive-item" src="{{ $data->link_streaming }}"
                                            allowfullscreen></iframe>
                                    </div>
                                @else
                                    <div class="col mx-auto p-0 rounded rounded-xl mb-2 d-flex justify-content-center align-items-center bg-light border text-center"
                                        style="height: 15rem">
                                        <div>
                                            <i class="mdi mdi-eye-off h1"></i> <span class="d-block">Link belum tersedia
                                            </span>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-8 bg-light mx-auto mb-2">
                                <div class="row p-0 bg-info px-3 py-2 rounded rounded-xl h6 text-white ">
                                    <span class="text-center d-inline-block mx-auto">Amar Putusan</span>
                                </div>

                                <div class="col p-0 px-3 py-2 rounded rounded-xl ">
                                    @if ($data->amar_putusan)
                                        <span>
                                            {!! $data->amar_putusan !!}
                                        </span>
                                    @else
                                        <span class="d-block text-center h4 ">
                                            Amar belum tersedia
                                        </span>
                                    @endif


                                </div>

                            </div>
                            <div class="col-md-8 mx-auto p-0 mb-2 ">
                                <a href="{{ $data->doc_putusan ? url($data->doc_putusan) : '' }}"
                                    class="btn btn-success d-inline-block w-100 {{ $data->doc_putusan ? '' : 'disabled' }}"
                                    target="_blank" onclick="insertDataClick()">
                                    @if ($data->doc_putusan)
                                        <i class="mdi mdi-arrow-down"></i> Download
                                    @else
                                        Doc Putusan Belum Tersedia
                                    @endif
                                </a>
                            </div>
                            <div class="col-md-8 mx-auto p-0">
                                <a href="{{ url()->previous() }}" class="btn btn-warning d-inline-block w-100 "><i
                                        class="mdi mdi-arrow-left"></i>Kembali</a>
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
            const insertDataClick = () => {
                fetch('{{ url('is_download') }}').then((data) => data.json()).then(d => {
                    return false;
                })
            }
        </script>
    @endpush
</x-layout.main>
