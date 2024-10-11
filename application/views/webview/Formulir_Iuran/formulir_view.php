<!-- main-area -->
<main class="fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="<?= base_url() ?>assets/user/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Formulir Iuran</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Formulir Iuran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="breadcrumb__shape">
            <img src="<?= base_url() ?>assets/user/img/images/breadcrumb_shape01.png" alt="">
            <img src="<?= base_url() ?>assets/user/img/images/breadcrumb_shape02.png" alt="" class="rightToLeft">
            <img src="<?= base_url() ?>assets/user/img/images/breadcrumb_shape03.png" alt="">
            <img src="<?= base_url() ?>assets/user/img/images/breadcrumb_shape04.png" alt="">
            <img src="<?= base_url() ?>assets/user/img/images/breadcrumb_shape05.png" alt="" class="alltuchtopdown">
        </div>
    </section>
    <!-- breadcrumb-area-end -->
    <!-- services-area -->
    <section class="services__area-three services__bg-three" data-background="<?= base_url() ?>assets/user/img/bg/h3_services_bg.jpg">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section-title white-title text-center mb-50">
                        <span class="sub-title">DAFTAR FORMULIR</span>
                        <h2 class="title">Silahkan Pilih Formulir</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center gutter-24">
                <?php
                foreach ($formulir as $item) {
                ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="services__item-three">
                            <div class="services__item-top">
                                <div class="services__icon-three">
                                    <i class="flaticon-profit"></i>
                                </div>
                                <div class="services__item-top-title">
                                    <h2 class="title"><a href=""><?= $item->nama_file ?></a></h2>
                                </div>
                            </div>
                            <div class="services__content-three">
                                <p><?= $item->deskripsi_file ?></p>
                                <a href="<?= base_url('uploads/file/' . $item->file) ?>" class="btn btn-two">Unduh File</a>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
</main>
<!-- main-area-end -->