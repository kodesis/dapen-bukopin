        <!-- <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Management User</h3>
                        <!-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Management User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Basic Tables start -->
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="card-title">
                                    Table Management User
                                </h5>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end">
                                <a class="btn btn-light" href="<?= base_url('assets\cms\format\Contoh_Format_user.xlsx') ?>" style="margin-right:10px ;" download>
                                    Download Format
                                </a>
                                <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                    data-bs-target="#upload_modal" style="margin-right:10px ;">
                                    Upload User
                                </button>
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#add_modal">
                                    Add User
                                </button>
                                <!-- <button class="btn btn-primary">Add User</button> -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table1" style="overflow-x:auto; display:block; max-height:400px; width: 100%;">
                                <!-- <table class="table" id="table1"> -->
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Peserta</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>NIK</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Pegawai</th>
                                        <th>Peserta</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                            <td>1</td>
                                            <td>Graiden</td>
                                            <td>vehicula.aliquet@semconsequat.co.uk</td>
                                            <td>076 4820 8838</td>
                                            <td>Offenburg</td>
                                            <td>1997-08-07</td>
                                            <td>2010-03-05</td>
                                            <td>2024-10-03</td>
                                            <td>Admin</td>
                                            <td>
                                                <a title="Update User" href="<?= base_url() ?>usermanagement/update" class="btn btn-warning"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit">
                                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                                    </svg></a>
                                                <a title="Delete User" href="<?= base_url() ?>usermanagement/delete" class="btn btn-danger"><svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg></a>
                                            </td>
                                        </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </section>
            <!-- Basic Tables end -->

        </div>


        <!--scrolling content Modal ADD -->
        <div class="modal fade" id="add_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Add User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add_user">

                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_add" name="nama" type="text" placeholder="Masukan Nama"
                                    class="form-control">
                            </div>
                            <label for="email">Email </label>
                            <div class="form-group">
                                <input id="email_add" name="email" type="email" placeholder="Masukan Email"
                                    class="form-control">
                            </div>
                            <label for="email">Kode Peserta </label>
                            <div class="form-group">
                                <input id="kd_peserta_add" name="kd_peserta" type="number" placeholder="Masukan Kode Peserta"
                                    class="form-control">
                            </div>
                            <label for="email">Role </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="role_add" name="role">
                                    <option selected disabled>Pilih Role</option>
                                    <!-- <option value="2">User</option>
                                        <option value="1">Admin</option> -->
                                </select>
                            </fieldset>
                            <label for="password">Password </label>
                            <div class="form-group">
                                <input id="password1_add" name="password1" type="password" placeholder="Masukan Password"
                                    class="form-control">
                            </div>

                            <label for="password">Konfirmasi Password </label>
                            <div class="form-group">
                                <input id="password2_add" name="password2" type="password" placeholder="Masukan Konfimrasi Password"
                                    class="form-control">
                            </div>
                            <label for="nik">NIK </label>
                            <div class="form-group">
                                <input id="nik_add" name="nik" type="number" placeholder="Masukan NIK"
                                    class="form-control">
                            </div>
                            <label for="date">Alamat </label>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukan Alamat"
                                        id="alamat_add" name="alamat"></textarea>
                                    <label for="floatingTextarea">Alamat</label>
                                </div>
                            </div>
                            <label for="date">Tanggal Lahir </label>
                            <div class="form-group">
                                <input id="tgl_lahir_add" name="tgl_lahir" type="date" placeholder="Masukan Tanggal Lahir"
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">Pegawai </label>
                                    <div class="form-group">
                                        <input id="pegawai_add" name="pegawai" type="date" placeholder="Masukan Tanggal"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Peserta </label>
                                    <div class="form-group">
                                        <input id="peserta_add" name="peserta" type="date" placeholder="Masukan Tanggal"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="add_user()" type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--scrolling content Modal Update -->
        <div class="modal fade" id="edit_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_user">
                            <input type="hidden" id="id_edit" name="id_edit">
                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_edit" name="nama" type="text" placeholder="Masukan Nama"
                                    class="form-control">
                            </div>
                            <label for="email">Email </label>
                            <div class="form-group">
                                <input id="email_edit" name="email" type="email" placeholder="Masukan Email"
                                    class="form-control">
                            </div>
                            <label for="email">Kode Peserta </label>
                            <div class="form-group">
                                <input id="kd_peserta_edit" name="kd_peserta" type="number" placeholder="Masukan Kode Peserta"
                                    class="form-control">
                            </div>
                            <label for="email">Role </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="role_edit" name="role">
                                    <option selected disabled>Pilih Role</option>
                                    <option value="2">User</option>
                                    <option value="1">Admin</option>
                                </select>
                            </fieldset>

                            <!-- <label for="email">Perbarui Password? </label>
                            <div class="form-group">
                                <input type="checkbox" id="update_password" class="form-check-input" onchange="edit_password()" value="True">
                                <label for="checkbox1">YES!</label>
                            </div>

                            <label for="password">Password </label>
                            <div class="form-group">
                                <input id="password1_edit" name="password1" type="password" placeholder="Masukan Password"
                                    class="form-control" readonly>
                            </div>

                            <label for="password">Konfirmasi Password </label>
                            <div class="form-group">
                                <input id="password2_edit" name="password2" type="password" placeholder="Masukan Konfimrasi Password"
                                    class="form-control" readonly>
                            </div> -->
                            <label for="nik">NIK </label>
                            <div class="form-group">
                                <input id="nik_edit" name="nik" type="number" placeholder="Masukan NIK"
                                    class="form-control">
                            </div>
                            <label for="date">Alamat </label>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukan Alamat"
                                        id="alamat_edit" name="alamat"></textarea>
                                    <label for="floatingTextarea">Alamat</label>
                                </div>
                            </div>
                            <label for="date">Tanggal Lahir </label>
                            <div class="form-group">
                                <input id="tgl_lahir_edit" name="tgl_lahir" type="date" placeholder="Masukan Tanggal Lahir"
                                    class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="date">Pegawai </label>
                                    <div class="form-group">
                                        <input id="pegawai_edit" name="pegawai" type="date" placeholder="Masukan Tanggal"
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="date">Peserta </label>
                                    <div class="form-group">
                                        <input id="peserta_edit" name="peserta" type="date" placeholder="Masukan Tanggal"
                                            class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="update_user()" type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--scrolling content Modal Update -->
        <div class="modal fade" id="edit_password_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit Password User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_password_user">
                            <input type="hidden" id="id_edit" name="id_edit">
                            <label for="password">Password </label>
                            <div class="form-group">
                                <input id="password1_edit" name="password1" type="password" placeholder="Masukan Password"
                                    class="form-control">
                            </div>

                            <label for="password">Konfirmasi Password </label>
                            <div class="form-group">
                                <input id="password2_edit" name="password2" type="password" placeholder="Masukan Konfimrasi Password"
                                    class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="update_password_user()" type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!--scrolling content Modal Upload Excel -->
        <div class="modal fade" id="upload_modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Upload User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="upload_user">
                            <!-- <label for="name">Tanggal Data</label>
                            <div class="form-group">
                                <input id="tanggal_upload" name="tanggal" type="date" placeholder="Masukan Tanggal"
                                    class="form-control">
                            </div> -->
                            <label for="name">Upload File Excel </label>
                            <div class="form-group">
                                <input id="file" name="file" type="file" placeholder="Masukan File"
                                    class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="upload_user()" type="button" class="btn btn-primary ms-1">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Accept</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>