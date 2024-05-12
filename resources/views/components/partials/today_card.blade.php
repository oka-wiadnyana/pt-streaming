@props(['perkara' => null])




<div class="col p-0">
    <div class="card">
        <div class="card-title px-5 mt-4">
            <span class="h1 badge badge-pill badge-info"
                style="font-size: 1rem">{{ $perkara !== null ? 'Sidang hari ini' : 'Tidak ada sidang hari ini' }}</span>
        </div>
        @foreach ($perkara as $p)
            <div class="card-body d-md-flex">

                <div class="col col-md-6 mb-2 mb-md-0">
                    @if ($p->link_streaming)
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $p->link_streaming }}" allowfullscreen></iframe>
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
                <div class="col col-md-6">
                    <div class="col-md-8 {{ strtolower($p->jenis_perkara) === 'pidana' ? 'bg-danger' : (strtolower($p->jenis_perkara) === 'perdata' ? 'bg-success' : (strtolower($p->jenis_perkara) === 'tipikor' ? 'bg-warning' : 'bg-info')) }} m-0 px-3 py-2 mr-2 mb-2 text-center"
                        style="border-radius: 25px">
                        <span class="text-white h6 ">{{ $p->nomor_perkara }} Jo.
                            {{ $p->nomor_perkara_pertama }}</span>
                    </div>
                    <div class="col-md-4 bg-primary m-0 px-3 py-2 text-center mb-2 " style="border-radius: 25px">
                        <span class="text-white h6 ">{{ $p->reverse_date }}</span>
                    </div>
                    <div class=" bg-light mx-auto mb-2">
                        <div class="col p-0 bg-info px-3 py-2 rounded rounded-xl h6 text-white ">
                            <span class="text-center d-inline-block mx-auto">Amar Putusan</span>
                        </div>

                        <div class="col p-0 px-3 py-2 rounded rounded-xl ">
                            @if ($p->amar_putusan)
                                <span>
                                    {!! $p->amar_putusan !!}
                                </span>
                            @else
                                <span class="d-block text-center h4 ">
                                    Amar belum tersedia
                                </span>
                            @endif


                        </div>

                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
