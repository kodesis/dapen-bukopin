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
                        <h3>File Management</h3>
                        <!-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">File Management</li>
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
                            <div class="col-md-8">
                                <h5 class="card-title">
                                    Table File Management
                                </h5>
                            </div>
                            <div class="col-md-4 d-flex justify-content-end">
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#add_modal">
                                    Add File
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
                                        <th>Nama File</th>
                                        <th>Deskripsi File</th>
                                        <th>File</th>
                                        <th>Jenis File</th>
                                        <th>Tipe Dokumen</th>
                                        <!-- <th>Halaman Page</th> -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Graiden</td>
                                        <td>076 4820 8838</td>
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
                                    </tr>
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
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Add File</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="add_file">

                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_add" name="nama" type="text" placeholder="Masukan Nama File"
                                    class="form-control">
                            </div>
                            <label for="email">Deskripsi </label>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukan Deksripsi File"
                                        id="deskripsi_add" name="deskripsi"></textarea>
                                    <label for="floatingTextarea">Deskripsi File</label>
                                </div>
                            </div>
                            <label for="password">File </label>
                            <div class="form-group">
                                <input id="file_add" name="file" type="file" placeholder="Masukan File"
                                    class="form-control">
                            </div>
                            <label for="email">Jenis File </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="jenis_file_add" name="jenis_file">
                                    <option selected disabled>Pilih Jenis File</option>
                                    <option value="pdf">PDF</option>
                                    <option value="word">WORD</option>
                                </select>
                            </fieldset>
                            <label for="email">Jenis Dokumen </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="jenis_dokumen_add" name="jenis_dokumen">
                                    <option selected disabled>Pilih Jenis Dokumen</option>
                                    <option value="Peraturan">Peraturan</option>
                                    <!-- <option value="Formulir Iuran Sukarela">Formulir Iuran Sukarela</option>
                                    <option value="Formulir Permohonan">Formulir Permohonan</option> -->
                                    <option value="Formulir">Formulir</option>
                                    <option value="Buku Layanan Kepesertaan">Buku Layanan Kepesertaan</option>
                                    <option value="Laporan Triwulan">Laporan Triwulan</option>
                                    <option value="Laporan Tahunan">Laporan Tahunan</option>
                                    <!-- <option value="Laporan Tahunan">Laporan Tahunan</option> -->
                                </select>
                            </fieldset>
                            <!-- <label for="email">Halaman Page </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="halaman_page_add" name="halaman_page">
                                    <option selected disabled>Pilih Halaman Tampil Page</option>
                                    <option value="Halaman Formulir Iuran Sukarela">Halaman Formulir Iuran Sukarela</option>
                                    <option value="Halaman Formulir Permohonan">Halaman Formulir Permohonan</option>
                                    <option value="Halaman Buku Layanan Kesetaraan">Halaman Buku Layanan Kesetaraan</option>
                                </select>
                            </fieldset> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="add_file()" type="button" class="btn btn-primary ms-1">
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
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Edit File</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="edit_file">
                            <input type="hidden" id="id_edit" name="id_edit">
                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_edit" name="nama" type="text" placeholder="Masukan Nama"
                                    class="form-control">
                            </div>
                            <label for="email">Deskripsi </label>
                            <div class="form-group">
                                <div class="form-floating">
                                    <textarea class="form-control" placeholder="Masukan Alamat"
                                        id="deskripsi_edit" name="deskripsi"></textarea>
                                    <label for="floatingTextarea">Alamat</label>
                                </div>
                            </div>
                            <label for="password">File </label>
                            <div class="form-group">
                                <input id="file_edit" name="file" type="file" placeholder="Masukan File"
                                    class="form-control">
                            </div>
                            <label for="email">Jenis File </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="jenis_file_edit" name="jenis_file">
                                    <option selected disabled>Pilih Jenis File</option>
                                    <option value="pdf">PDF</option>
                                    <option value="word">WORD</option>
                                </select>
                            </fieldset>
                            <label for="email">Jenis Dokumen </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="jenis_dokumen_edit" name="jenis_dokumen">
                                    <option selected disabled>Pilih Jenis Dokumen</option>
                                    <option value="Peraturan">Peraturan</option>
                                    <!-- <option value="Formulir Iuran Sukarela">Formulir Iuran Sukarela</option>
                                    <option value="Formulir Permohonan">Formulir Permohonan</option> -->
                                    <option value="Formulir">Formulir</option>
                                    <option value="Buku Layanan Kepesertaan">Buku Layanan Kepesertaan</option>
                                    <option value="Laporan Triwulan">Laporan Triwulan</option>
                                    <option value="Laporan Tahunan">Laporan Tahunan</option>
                                </select>
                            </fieldset>
                            <!-- <label for="email">Halaman Page </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="halaman_page_edit" name="halaman_page">
                                    <option selected disabled>Pilih Halaman Tampil Page</option>
                                    <option value="Halaman Formulir Iuran Sukarela">Halaman Formulir Iuran Sukarela</option>
                                    <option value="Halaman Formulir Permohonan">Halaman Formulir Permohonan</option>
                                    <option value="Halaman Buku Layanan Kesetaraan">Halaman Buku Layanan Kesetaraan</option>
                                </select>
                            </fieldset> -->
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary"
                            data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button onclick="update_file()" type="button" class="btn btn-primary ms-1">
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
                        <h5 class="modal-title" id="exampleModalScrollableTitle">Add User</h5>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="upload_user">
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