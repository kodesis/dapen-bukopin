<!-- main-area -->
<main class="fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="<?= base_url() ?>/assets/user/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Pengurus Dan Dewan Pengawas</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Pengurus Dan Dewan Pengawas</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape">
            <img src="<?= base_url() ?>/assets/user/img/images/breadcrumb_shape01.png" alt="">
            <img src="<?= base_url() ?>/assets/user/img/images/breadcrumb_shape02.png" alt="" class="rightToLeft">
            <img src="<?= base_url() ?>/assets/user/img/images/breadcrumb_shape03.png" alt="">
            <img src="<?= base_url() ?>/assets/user/img/images/breadcrumb_shape04.png" alt="">
            <img src="<?= base_url() ?>/assets/user/img/images/breadcrumb_shape05.png" alt="" class="alltuchtopdown">
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- team-area -->
    <section class="team-area pt-120 pb-90">
        <div class="container">
            <div class="team-item-wrap">
                <div class="row justify-content-center">
                    <h1 class="mb-5" style="text-align:center;">PENGURUS</h1>
                    <?php
                    if (!empty($pengurus) || isset($pengurus)) {
                        foreach ($pengurus as $p) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                                <div class="team-item">
                                    <div class="team-thumb">
                                        <img src="<?= base_url() ?>/uploads/team/<?= $p->file ?>" alt="">
                                    </div>
                                    <div class="team-content">
                                        <h4 class="title"><?= $p->nama ?></h4>
                                        <span><?= $p->detail_posisi ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-content">
                                    <h4 class="title">Data Tidak Ditemukan</h4>
                                    <!-- <span>Direktur Utama</span> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <img src="<?= base_url() ?>/assets/user/img/team/pengurus/Dewi.png" alt="">
                                </div>
                                <div class="team-content">
                                    <h4 class="title">Dewi Andari</h4>
                                    <span>Direktur Utama</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <img src="<?= base_url() ?>/assets/user/img/team/pengurus/Iman Hurustyadi.png" alt="">
                                </div>
                                <div class="team-content">
                                    <h4 class="title">Iman Hurustyadi</h4>
                                    <span>Direktur</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-thumb">
                                    <img src="<?= base_url() ?>/assets/user/img/team/pengurus/Foto Pak Rifnaldi-1.png" alt="">
                                </div>
                                <div class="team-content">
                                    <h4 class="title">Rifnaldi</h4>
                                    <span>Direktur</span>
                                </div>
                            </div>
                        </div> -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="team-item-wrap">
                <div class="row justify-content-center">
                    <h1 class="mb-5" style="text-align:center;">DEWAN PENGAWAS</h1>
                    <?php
                    if (!empty($pengawas) || isset($pengawas)) {
                        foreach ($pengawas as $s) {
                    ?>
                            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                                <div class="team-item">
                                    <div class="team-thumb">
                                        <img src="<?= base_url() ?>/uploads/team/<?= $s->file ?>" alt="">
                                    </div>
                                    <div class="team-content">
                                        <h4 class="title"><?= $s->nama ?></h4>
                                        <span><?= $s->detail_posisi ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                            <div class="team-item">
                                <div class="team-content">
                                    <h4 class="title">Data Tidak Ditemukan</h4>
                                    <!-- <span>Direktur Utama</span> -->
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team-item">
                            <div class="team-thumb">
                                <img src="<?= base_url() ?>/assets/user/img/team/pengawas/Iwan.png" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="title">Agustinus Iwan Christanto</h4>
                                <span>Ketua Dewan Pengawas (Mewakili Pemberi Kerja)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team-item">
                            <div class="team-thumb">
                                <img src="<?= base_url() ?>/assets/user/img/team/pengawas/Gamar_crop.jpg" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="title">Gamaridha Akhirul Amru Ryad</h4>
                                <span>Wakil Ketua Dewan Pengawas (Mewakili Pemberi Kerja)</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-8">
                        <div class="team-item">
                            <div class="team-thumb">
                                <img src="<?= base_url() ?>/assets/user/img/team/pengawas/Putu.jpg" alt="">
                            </div>
                            <div class="team-content">
                                <h4 class="title">I Putu Adi Saputra</h4>
                                <span>Anggota Dewan Pengawas (Mewakili Peserta)</span>
                            </div>
                        </div>
                    </div> -->
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- team-area-end -->
</main>
<!-- main-area-end -->