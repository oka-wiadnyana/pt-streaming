<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Sidang yang akan datang</h4>
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
                @foreach ($data as $d)
                    @if ($loop->index < 4)
                        <x-partials.upper_card :perkara="$d" />
                    @endif
                @endforeach
            </div>
            <!-- end row -->


            <x-partials.today_card :perkara="$today" />

            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Daftar Perkara</h4>
                            <div class="table-responsive order-table">
                                <table class="table table-hover mb-0" id="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nomor Perkara PT</th>
                                            <th scope="col">Nomor Perkara PN</th>
                                            <th scope="col">Tanggal Putusan</th>
                                            <th scope="col">Jenis perkara</th>

                                            <th scope="col">Status</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
                                </table>
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
            $(function() {

                var table = $('#table').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url("get_data_datatables/$jenis_perkara") }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        }, {
                            data: 'nomor_perkara',
                            name: 'nomor_perkara',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'nomor_perkara_pertama',
                            name: 'nomor_perkara_pertama',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'tanggal_sidang',
                            name: 'tanggal_sidang',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'jenis_perkara',
                            name: 'jenis_perkara',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: true,
                            searchable: true
                        },


                        {
                            data: 'action',
                            name: 'action',

                        },
                    ]
                });

            });
        </script>
    @endpush
</x-layout.main>
