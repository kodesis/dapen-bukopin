        <!-- <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->
        <div class="page-heading">
            <div class="page-title mb-4">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>File Laporan <?= $Title ?></h3>
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
                <div class="row">
                    <?php
                    foreach ($data_file as $i) {
                    ?>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row mb-2">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="bi-file-earmark-medical-fill"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-extrabold"><?= $i->nama_file ?></h6>
                                            <span class="text-muted font-semibold mb-0" id="user_count"><?= $i->deskripsi_file ?></span>
                                        </div>
                                    </div>
                                    <div>
                                        <a class="btn btn-primary" href="<?= base_url('uploads/file/' . $i->file) ?>" download>Unduh</a>
                                        <?php
                                        $tipe = trim(explode(' ', $i->tipe)[1]);
                                        if ($tipe != 'Triwulan' || $tipe != 'Tahunan') {
                                            $tipe = 'PDP';
                                        }
                                        ?>
                                        <a class="btn btn-secondary" href="<?= base_url('Detail_Laporan/' . $tipe . '/' . $i->uid) ?>">Lihat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                    <!-- <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon red mb-2">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Saved Post</h6>
                                    <h6 class="font-extrabold mb-0">112</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                </div>

            </section>
            <!-- Basic Tables end -->
        </div>