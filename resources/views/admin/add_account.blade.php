<x-layout.main>
    <div class="page-title-box">
        <div class="container-fluid">

            <div class="row">
                <div class="col-sm-12">
                    <div class="state-information d-none d-sm-block">

                    </div>

                    <h4 class="page-title">Tambah User</h4>
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
                            <h4 class="mt-0 header-title mb-4">Tambah User</h4>
                            <div class="col d-md-flex justify-content-center">
                                <form method="post" action="{{ url('/admin/insert_user') }}" class="col-md-6">
                                    @csrf
                                    <div class="form-group">
                                        <label for="" class="form-label">Nama</label>
                                        <input type="text" id="" class="form-control" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Username</label>
                                        <input type="text" id="" class="form-control" name="username">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Role</label>
                                        <select id="" class="form-control" name="role">
                                            <option value="" selected disabled>Pilih ..</option>
                                            <option value="admin">Admin</option>
                                            <option value="ketua">Ketua</option>
                                            <option value="wakil">Wakil</option>
                                            <option value="panitera">Panitera</option>
                                            <option value="panmud">Panmud</option>
                                            <option value="pp">PP</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Password</label>
                                        <input type="password" id="" class="form-control" name="password">
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="form-label">Konf. Password</label>
                                        <input type="password" id="" class="form-control"
                                            name="password_confirmation">
                                    </div>
                                    <div class="col p-0">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ url('/admin/account') }}" class="btn btn-warning">Kembali</a>
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
