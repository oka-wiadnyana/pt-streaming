<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Daftar User</h4>
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
                            <div class="col align-items-center d-flex mb-2 ">

                                <h4 class="mt-0 header-title mb-4 mr-2 d-block my-auto">Daftar User</h4>
                                <a href="{{ url('/admin/add_user') }}" class="btn btn-primary">Tambah</a>
                            </div>
                            <div class="table-responsive order-table">
                                <table class="table table-hover mb-0" id="table">
                                    <thead>
                                        <tr>

                                            <th scope="col">Nomor</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Role</th>

                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td><a href="" class="delete btn btn-danger btn"
                                                        onclick="deleteDataUser('{{ $user->id }}');return false">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
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

                var table = $('#table').DataTable({});

            });

            function deleteDataUser(id) {
                Swal.fire({
                    title: "Anda Yakin Menghapusnya?",
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: "Yakin",
                    denyButtonText: `Tidak`
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {

                        fetch(`{{ url('/admin/delete_user') }}/${id}`) // api for the get request
                            .then(response => {
                                window.location.reload();
                            })
                    }

                });
            }
        </script>
    @endpush
</x-layout.main>
