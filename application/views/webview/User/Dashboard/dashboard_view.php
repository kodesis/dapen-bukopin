<!-- <div id="main">
<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header> -->

<div class="page-heading">
    <h3>Profile Statistics</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Saldo Perbulan</h4>
                        </div>
                        <div class="card-body">
                            <div id="chart-profile-visit"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="ms-3 name">
                            <h6 class="text-muted mb-2">PDP Bank KB Bukopin</h6>
                            <a href="<?= base_url('assets/cms/file_pdp/PDP Bank KB Bukopin.pdf') ?>" class="btn btn-success">
                                Download File
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Ringkasan Laporan Keuangan</h4>
                </div>
                <div class="card-content pb-4">
                    <?php
                    if (isset($triwulan) || !empty($triwulan)) {
                    ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name">
                                <!-- <h6 class="text-muted mb-2" id="nama_file"><?= $triwulan->created ?></h6> -->
                                <h6 class="text-muted mb-2" id="nama_file"><?= $triwulan->nama_file ?></h6>
                                <a href="<?= base_url('uploads/file/' . $triwulan->file) ?>" class="btn btn-success">
                                    Download File
                                </a>
                            </div>
                        </div>
                    <?php
                    }

                    if (isset($tahunan) || !empty($tahunan)) {

                    ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="name">
                                <h6 class="text-muted mb-2" id="nama_file"><?= $tahunan->nama_file ?></h6>
                                <a href="<?= base_url('uploads/file/' . $tahunan->file) ?>" class="btn btn-success">
                                    Download File
                                </a>
                            </div>
                        </div>
                    <?php
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
</div>