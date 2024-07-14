<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    {{-- <h4 class="page-title">Sidang yang akan datang</h4> --}}
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
            {{-- <div class="row">
                @foreach ($data as $d)
                    @if ($loop->index < 4)
                        <x-partials.upper_card :perkara="$d" />
                    @endif
                @endforeach
            </div> --}}
            <!-- end row -->


            {{-- <x-partials.today_card :perkara="$today" /> --}}


            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title mb-4">Daftar Panitera Pengganti</h4>
                            <div class="col">
                                <a href="{{ url('admin/add_pp') }}" class="btn btn-primary">Tambah
                                    Panitera Pengganti</a>
                            </div>
                            <div class="table-responsive order-table">
                                <table class="table table-hover mb-0" id="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nama</th>

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
                    ajax: "{{ url('admin/get_pp_datatables') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex',
                            orderable: false,
                            searchable: false
                        }, {
                            data: 'pp_nama',
                            name: 'pp_nama',
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

            function deletePp(id) {
                Swal.fire({
                    title: "Anda Yakin Menghapusnya?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    denyButtonText: `Tidak`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        fetch(`{{ url('/admin/delete_pp') }}/${id}`) // api for the get request
                            .then(response => {
                                window.location.reload();
                            })
                    }

                });
            }
        </script>
    @endpush
</x-layout.main>
