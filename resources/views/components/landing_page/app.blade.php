@props(['statistics' => null])
<div class="app-features-area mb-5">

    <div class="container">
        <div class="row">
            <div class="col video-style-one-item  ">

                <div class="d-md-flex fun-facto-box  justify-content-around">
                    <div class="fun-fact text-center mb-2 mb-md-0 rounded rounded-xl">
                        <div class="counter">
                            <div class="timer" data-to="{{ $statistics->is_access ?? 0 }}" data-speed="2000"
                                style="margin-right: 0.5rem">{{ $statistics->is_access ?? 0 }}</div>
                            <div class="operator">Klik</div>
                        </div>
                        <span class="medium text-white ">Pengunjung</span>
                    </div>
                    <div class="fun-fact text-center">
                        <div class="counter">
                            <div class="timer" data-to="{{ $statistics->is_download ?? 0 }}" data-speed="2000"
                                style="margin-right: 0.5rem">{{ $statistics->is_download ?? 0 }}</div>
                            <div class="operator">Kali</div>
                        </div>
                        <span class="medium text-white">Copy Putusan Didownload</span>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
