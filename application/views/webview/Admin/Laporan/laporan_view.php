        <!-- <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->
        <style>
            /* Optional: Adjust the aspect ratio for smaller devices */
            @media (max-width: 768px) {
                .responsive-embed embed {
                    width: 350px;
                    height: 100%;
                }

                .section-embed {
                    height: 500px;
                }
            }
        </style>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Detail File</h3>
                        <!-- <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p> -->
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail File</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Basic Tables start -->

            <section class="section">
                <div class="card" style="height: 100vh;">
                    <!-- <div class="responsive-embed"> -->
                    <embed type="application/pdf" src="<?= $data_file ?>" width="100%" height="100%">
                    <!-- </div> -->
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
                            <label for="password">Foto </label>
                            <div class="form-group">
                                <input id="file_add" name="file" type="file" placeholder="Masukan Foto"
                                    class="form-control">
                            </div>
                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_add" name="nama" type="text" placeholder="Masukan Nama File"
                                    class="form-control">
                            </div>
                            <label for="email">Posisi </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="posisi_add" name="posisi">
                                    <option selected disabled>Pilih Posisi</option>
                                    <option value="Pengurus">Pengurus</option>
                                    <option value="Pengawas">Dewan Pengawas</option>
                                </select>
                            </fieldset>
                            <label for="name">Detail Posisi </label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Masukan Detail Posisi"
                                    id="detail_posisi_add" name="detail_posisi"></textarea>
                                <label for="floatingTextarea">Detail Posisi</label>
                            </div>

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
                            <label for="password">Foto </label>
                            <div class="form-group">
                                <input id="file_edit" name="file" type="file" placeholder="Masukan Foto"
                                    class="form-control">
                            </div>
                            <label for="name">Nama </label>
                            <div class="form-group">
                                <input id="nama_edit" name="nama" type="text" placeholder="Masukan Nama File"
                                    class="form-control">
                            </div>
                            <label for="email">Posisi </label>
                            <fieldset class="form-group">
                                <select class="form-select" id="posisi_edit" name="posisi">
                                    <option selected disabled>Pilih Posisi</option>
                                    <option value="Pengurus">Pengurus</option>
                                    <option value="Pengawas">Dewan Pengawas</option>
                                </select>
                            </fieldset>
                            <label for="name">Detail Posisi </label>
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Masukan Detail Posisi"
                                    id="detail_posisi_edit" name="detail_posisi"></textarea>
                                <label for="floatingTextarea">Detail Posisi</label>
                            </div>
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