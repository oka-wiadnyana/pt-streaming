@props(['perkara' => null])
<div class="col-xl-3 col-md-6">
    <div class="card bg-light mini-stat position-relative">
        <div class="card-body">
            <div class="mini-stat-desc">
                <h6
                    class="px-2 py-2 rounded rounded-xl text-uppercase verti-label text-dark-50 text-white {{ $perkara->jenis_perkara === 'Pidana' ? 'bg-danger' : ($perkara->jenis_perkara === 'Perdata' ? 'bg-success' : 'bg-secondary') }}">
                    {{ $perkara->jenis_perkara }}</h6>
                <div class="text-dark">
                    <h6 class="text-uppercase mt-0 text-dark-50">{{ $perkara->reverse_date }}</h6>
                    <h4 class="mb-3 mt-0">{{ $perkara->nomor_perkara }}</h4>

                    <a href="{{ "/detail/$perkara->id" }}">
                        <div class="badge badge-light text-info" style="font-size: 1rem"> Detail </div>
                    </a>

                </div>
                {{-- <div class="mini-stat-icon">
                    <i class="mdi mdi-clipboard-check-outline display-2 text-secondary"></i>
                </div> --}}
            </div>
        </div>
    </div>
</div>
