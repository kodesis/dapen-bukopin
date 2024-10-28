<main class="fix">
    <!-- slider-area -->
    <section class="slider__area">
        <div class="swiper-container slider_baner__active slider_baner_home6">
            <div class="swiper-wrapper">
                <?php
                if (!empty($banner) || isset($banner)) {
                    foreach ($banner as $b) {
                ?>
                        <div class="swiper-slide slider__single">
                            <!-- <div class="slider__bg" data-background="<?= base_url() ?>assets/user/img/slider/slider adpi 20231.jpg"></div> -->
                            <div class="slider__bg" style="background-image: url('<?= base_url() ?>/uploads/banner/<?= $b->file_banner ?>');"></div>
                            <div class=" container">
                                <div class="row">
                                    <div class="col-lg-7">
                                        <div class="banner__content-three">
                                            <!-- <div class="text-25-years">
                                        <span class="text-stroke-2">25</span>
                                        <h4 class="text-experience">Years Experiences<br> in this field</h4>
                                    </div> -->
                                            <span class="sub-title aos-init aos-animate">Dapen Bank KB Bukopin</span>
                                            <h2 class="title"><?= $b->judul_banner ?></h2>
                                            <p><?= $b->deskripsi ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="swiper-slide slider__single">
                        <!-- <div class="slider__bg" data-background="<?= base_url() ?>assets/user/img/slider/slider adpi 20231.jpg"></div> -->
                        <div class="slider__bg" style="background-image: url('<?= base_url() ?>assets/user/img/slider/adpi 2023.jpg');"></div>
                        <div class=" container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="banner__content-three">
                                        <span class="sub-title aos-init aos-animate">Dapen Bank KB Bukopin</span>
                                        <h2 class="title">Dana Pensiun Bank KB Bukopin berkomitmen untuk menjaga keamanan dan kesinambungan penghasilan para peserta di masa pensiun melalui pengelolaan dana yang profesional dan transparan. Kami unggul karena.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide slider__single">
                        <!-- <div class="slider__bg" data-background="<?= base_url() ?>assets/user/img/slider/slider adpi 20221.jpg"></div> -->
                        <div class="slider__bg" style="background-image: url('<?= base_url() ?>assets/user/img/slider/adpi 2022.jpg');"></div>
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="banner__content-three">
                                        <span class="sub-title aos-init aos-animate">Dapen Bank KB Bukopin</span>
                                        <h2 class="title">Dana Pensiun Bank KB Bukopin berkomitmen untuk menjaga keamanan dan kesinambungan penghasilan para peserta di masa pensiun melalui pengelolaan dana yang profesional dan transparan. Kami unggul karena.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="box-button-slider-bottom">
            <div class="container">
                <div class="testimonial__nav-four">
                    <div class="testimonial-two-button-prev button-swiper-prev"><i class="flaticon-right-arrow"></i></div>
                    <div class="testimonial-two-button-next button-swiper-next"><i class="flaticon-right-arrow"></i></div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->
    <!-- counter-area -->
    <section class="counter-area">
        <div class="container">
            <div class="row justify-content-center">
                <!-- <div class="col-xl-3 col-lg-4 col-sm-6">
                    <div class="counter-item">
                        <div class="icon">
                            <i class="flaticon-trophy"></i>
                            <img src="<?= base_url() ?>/assets/user/img/brand/adpi_panjang.png" alt="">
                        </div>
                        <div class="content">
                            <h2 class="count"><span class="odometer" data-count="45"></span>+</h2>
                            <p>Successfully <br> Completed Projects</p>
                        </div>
                    </div>
                </div> -->
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <a href="https://www.bukopinfinance.co.id/">
                        <div class="counter-item">
                            <div class="icon">
                                <!-- <i class="flaticon-happy"></i> -->
                                <img src="<?= base_url() ?>/assets/user/img/brand/bufin.png" alt="">
                            </div>
                            <!-- <div class="content">
                            <h2 class="count"><span class="odometer" data-count="92"></span>K</h2>
                            <p>Satisfied <br> 100% Our Clients</p>
                        </div> -->
                        </div>
                    </a>
                </div>

                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <a href="https://www.kbbank.co.id/">
                        <div class="counter-item">
                            <div class="icon">
                                <!-- <i class="flaticon-time"></i> -->
                                <img src="<?= base_url() ?>/assets/user/img/brand/logokb2.png" alt="">
                            </div>
                            <!-- <div class="content">
                            <h2 class="count"><span class="odometer" data-count="25"></span>+</h2>
                            <p>Years of Experiences <br> To Run This Company</p>
                        </div> -->
                        </div>
                    </a>
                </div>
                <div class="col-xl-4 col-lg-4 col-sm-6">
                    <a href="https://www.kbbanksyariah.co.id/">
                        <div class="counter-item">
                            <div class="icon">
                                <!-- <i class="flaticon-china"></i> -->
                                <img src="<?= base_url() ?>/assets/user/img/brand/LOGO-KB-BUKOPIN-SYARIAH.png" alt="">
                            </div>
                            <!-- <div class="content">
                            <h2 class="count"><span class="odometer" data-count="19"></span>+</h2>
                            <p>All Over The World <br> We Are Available</p>
                        </div> -->
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="counter-shape-wrap">
            <img src="<?= base_url() ?>/assets/user/img/images/counter_shape01.png" alt="" data-aos="fade-right" data-aos-delay="400">
            <img src="<?= base_url() ?>/assets/user/img/images/counter_shape02.png" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
            <img src="<?= base_url() ?>/assets/user/img/images/counter_shape03.png" alt="" data-aos="fade-left" data-aos-delay="400">
        </div>
    </section>
    <!-- counter-area-end -->
    <!-- services-area -->
    <!-- <section class="services__area-seven services__bg-seven">
        <div class="container" style="max-width: 1400px;">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center mb-50 tg-heading-subheading animation-style3">
                        <span class="sub-title">Visi Dan Misi</span>
                        <h2 class="title tg-element-title">DANA PENSIUN<br class="d-none d-lg-block" /> BANK KB BUKOPIN</h2>
                    </div>
                </div>
            </div>
            <div class="services__item-wrap-two mb-5">
                <div class="row justify-content-center gutter-24">
                    <div class="col-xl-8 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__content-five">
                                <p style="text-align: justify;">Visi dan Misi Dana Pensiun ditetapkan sebagai sasaran yang ingin dituju dan rincian pelaksanaannya, sebagai penjabaran dari maksud dan tujuan pendirian Dana Pensiun sebagaimana ditetapkan dalam Peraturan Dana Pensiun. Selanjutnya, sebagai sebuah lembaga yang telah lama berdiri dan melakukan kegiatan, Dana Pensiun memiliki pengalaman yang membentuk butir-butir kebiasaan serta tradisi positif, berupa Nilai-nilai Dasar atau Core Values Dana Pensiun. Visi dan Misi sebagai acuan pencapaian maksud dan tujuan serta Nilai-nilai Dasar (Core Values) Dana Pensiun yang menjadi dasar pertimbangan penyusunan serta penetapan Good Pension Fund Governance adalah sebagai berikut :
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center gutter-24">
                    <div class="col-xl-6 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__content-five">
                                <h2 class="title">Visi Dana Pensiun</h2>
                                <p style="text-align: justify;">Menjadi Dana Pensiun yang sehat dan mampu menunjang kepentingan Peserta dan Pendiri dalam menjaga terpeliharanya kesinambungan penghasilan hari tua bagi para pesertanya.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="services__item-wrap-two">
                <div class="row justify-content-center gutter-24">
                    <div class="services__item-five services__item-six" style="margin-left:100px;">
                        <div class="services__content-five">
                            <h2 class="title">Misi Dana Pensiun</h2>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__icon-five">
                                <div class="icon">
                                    1
                                </div>
                                <div class="services__icon-shape">
                                    <div class="shape one">
                                        <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M31.1376 1.6526C32.9089 0.629968 35.0911 0.629967 36.8624 1.6526L64.9126 17.8474C66.6839 18.87 67.775 20.7599 67.775 22.8052V55.1948C67.775 57.2401 66.6839 59.13 64.9126 60.1526L36.8624 76.3474C35.0911 77.37 32.9089 77.37 31.1376 76.3474L3.0874 60.1526C1.31615 59.13 0.22501 57.2401 0.22501 55.1948V22.8052C0.22501 20.7599 1.31614 18.87 3.08739 17.8474L31.1376 1.6526Z" fill="#FEF6E6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="services__content-five">
                                <h2 class="title">Menyelenggarakan kepesertaan pensiun secara akurat dan tertib.</h2>
                                <p>Menyelenggarakan Sistim Kepesertaan Program Pensiun secara rapi, tertib, dan akurat.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__icon-five">
                                <div class="icon">
                                    2
                                </div>
                                <div class="services__icon-shape">
                                    <div class="shape one">
                                        <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M31.1376 1.6526C32.9089 0.629968 35.0911 0.629967 36.8624 1.6526L64.9126 17.8474C66.6839 18.87 67.775 20.7599 67.775 22.8052V55.1948C67.775 57.2401 66.6839 59.13 64.9126 60.1526L36.8624 76.3474C35.0911 77.37 32.9089 77.37 31.1376 76.3474L3.0874 60.1526C1.31615 59.13 0.22501 57.2401 0.22501 55.1948V22.8052C0.22501 20.7599 1.31614 18.87 3.08739 17.8474L31.1376 1.6526Z" fill="#FEF6E6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="services__content-five">
                                <h2 class="title">Mengelola dan administrasi iuran pensiun secara bertanggung jawab.</h2>
                                <p>Menyelenggarakan Sistim Penerimaan dan Administrasi Iuran Pensiun secara tertib dan bertanggung jawab.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__icon-five">
                                <div class="icon">
                                    3
                                </div>
                                <div class="services__icon-shape">
                                    <div class="shape one">
                                        <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M31.1376 1.6526C32.9089 0.629968 35.0911 0.629967 36.8624 1.6526L64.9126 17.8474C66.6839 18.87 67.775 20.7599 67.775 22.8052V55.1948C67.775 57.2401 66.6839 59.13 64.9126 60.1526L36.8624 76.3474C35.0911 77.37 32.9089 77.37 31.1376 76.3474L3.0874 60.1526C1.31615 59.13 0.22501 57.2401 0.22501 55.1948V22.8052C0.22501 20.7599 1.31614 18.87 3.08739 17.8474L31.1376 1.6526Z" fill="#FEF6E6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="services__content-five">
                                <h2 class="title">
                                    Mengelola dana pensiun secara optimal dan aman sesuai kebijakan investasi.</h2>
                                <p>Mengelola kekayaan Dana Pensiun secara optimal dan aman melalui kebijakan investasi sesuai dengan Arahan Investasi oleh Pendiri bersama Dewan Pengawas.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="services__item-five services__item-six">
                            <div class="services__icon-five">
                                <div class="icon">
                                    4
                                </div>
                                <div class="services__icon-shape">
                                    <div class="shape one">
                                        <svg width="68" height="78" viewBox="0 0 68 78" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M31.1376 1.6526C32.9089 0.629968 35.0911 0.629967 36.8624 1.6526L64.9126 17.8474C66.6839 18.87 67.775 20.7599 67.775 22.8052V55.1948C67.775 57.2401 66.6839 59.13 64.9126 60.1526L36.8624 76.3474C35.0911 77.37 32.9089 77.37 31.1376 76.3474L3.0874 60.1526C1.31615 59.13 0.22501 57.2401 0.22501 55.1948V22.8052C0.22501 20.7599 1.31614 18.87 3.08739 17.8474L31.1376 1.6526Z" fill="#FEF6E6" />
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="services__content-five">
                                <h2 class="title">Membayar manfaat pensiun sebagai penghasilan berkelanjutan.</h2>
                                <p>Membayarkan manfaat pensiun sebagai sumber penghasilan yang berkesinambungan bagi peserta atau pihak yang berhak setelah peserta tidak bekerja lagi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- services-area-end -->
    <!-- slide partners -->
    <section class="partners__area-six">
        <div class="box-swiper">
            <div class="swiper-container slider_partners__active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide slider__partner">
                        <span style="font-size: 40px" class="text-stroke"><img src="<?= base_url() ?>/assets/user/img/home6/snow-icon.svg" /> Profesional</span>
                    </div>
                    <div class="swiper-slide slider__partner">
                        <span style="font-size: 40px" class="text-stroke"><img src="<?= base_url() ?>/assets/user/img/home6/snow-icon.svg" /> Respek</h4>
                    </div>
                    <div class="swiper-slide slider__partner">
                        <span style="font-size: 40px" class="text-stroke"><img src="<?= base_url() ?>/assets/user/img/home6/snow-icon.svg" /> Integritas</span>
                    </div>
                    <div class="swiper-slide slider__partner">
                        <span style="font-size: 40px" class="text-stroke"><img src="<?= base_url() ?>/assets/user/img/home6/snow-icon.svg" /> Mandiri</span>
                    </div>
                    <div class="swiper-slide slider__partner">
                        <span style="font-size: 40px" class="text-stroke"><img src="<?= base_url() ?>/assets/user/img/home6/snow-icon.svg" /> Akuntabel</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end slide partners -->
    <!-- choose-area -->
    <section class="choose__area-five choose__area-six">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-6 mb-35">
                    <div class="choose__content-five">
                        <div class="section-title mb-30 tg-heading-subheading animation-style3">
                            <span class="sub-title">Why We Are The Best</span>
                            <h2 class="title tg-element-title">Kami Memastikan Manajemen Pensiun yang Aman dan Berkelanjutan</h2>
                        </div>
                        <p>Dana Pensiun Bank KB Bukopin berkomitmen untuk menjaga keamanan dan kesinambungan penghasilan para peserta di masa pensiun melalui pengelolaan dana yang profesional dan transparan. Kami unggul karena.</p>
                        <div class="choose__box-wrap">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="choose__box">
                                        <div class="icon">
                                            <i class="flaticon-report"></i>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Pengelolaan Dana yang Optimal dan Aman</h4>
                                            <p>Dana pensiun dikelola dengan kebijakan investasi yang aman dan sesuai arahan untuk hasil maksimal.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="choose__box">
                                        <div class="icon">
                                            <i class="flaticon-financial-profit"></i>
                                            </svg>
                                        </div>
                                        <div class="content">
                                            <h4 class="title">Pembayaran Manfaat yang Berkelanjutan</h4>
                                            <p>Kami memastikan manfaat pensiun sebagai sumber penghasilan yang berkesinambungan bagi peserta setelah mereka pensiun.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-9 mb-35">
                    <div class="choose__img-wrap-five">
                        <img src="<?= base_url() ?>/assets/user/img/home6/HUT web.jpg" alt="Apexa">
                        <!-- <img src="<?= base_url() ?>/assets/user/img/home6/card.png" class="shape-bottom-left" alt=""> -->
                        <!-- <img src="<?= base_url() ?>/assets/user/img/home6/icon.svg" class="shape-left" alt="" data-parallax='{"x" : 40}'> -->
                        <!-- <img src="<?= base_url() ?>/assets/user/img/home6/hassle.png" alt="" class="alltuchtopdown"> -->
                        <!-- <img src="<?= base_url() ?>/assets/user/img/home6/dot.svg" alt="" class="shape-top-right"> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- choose-area-end -->
    <!-- all services -->
    <section class="all_services__area-six">
        <div class="container">
            <h2>Mengamankan Masa Depan Anda <br class="d-none d-lg-block" /> dengan Iuran Pasti.</h2>
            <!-- <p>Empowering Businesses through Strategic Consulting With Us</p> -->
            <a href="https://api.whatsapp.com/message/EXLTRFFRPD6MD1" class="btn" data-aos="fade-up" data-aos-delay="600">Contact Us</a>
        </div>
    </section>
    <!-- end all services -->
    <!-- our team -->
    <!-- <section class="our_team__area-six">
        <div class="container">
            <div class="section-title mb-30 tg-heading-subheading animation-style3 text-center">
                <span class="sub-title text-capitalize">Meet Our Amazing Team</span>
                <h2 class="title tg-element-title">Pengurus</h2>
            </div>
            <div class="row justify-content-center">
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
                            <h2>Tidak Ada Pengurus</h2>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="section-title mb-30 tg-heading-subheading animation-style3 text-center">
                <h2 class="title tg-element-title">Dewan Pengawas</h2>
            </div>
            <div class="row justify-content-center">
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
                            <h2>Tidak Ada Pengawas</h2>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <div class="text-center">
                <a href="https://api.whatsapp.com/message/EXLTRFFRPD6MD1" class="btn" data-aos="fade-up" data-aos-delay="600">Contact Us</a>
            </div>
        </div>
    </section> -->
    <!-- end our team -->
    <!-- FAQ -->
    <section class="faqs__area-six">
        <div class="circle" data-parallax='{"x" : 100 , "y" : 100 }'></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-30">
                    <div class="box-need-help">
                        <img src="<?= base_url() ?>/assets/user/img/home6/img-faq.png" />
                        <div class="box-text-need-help">
                            <svg width="36" height="36" viewBox="0 0 36 36" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2563 21.887H19.8349C20.1467 21.887 20.3998 21.6339 20.3998 21.3221C20.3998 21.0103 20.1467 20.7572 19.8349 20.7572H12.2563C11.9445 20.7572 11.6914 21.0103 11.6914 21.3221C11.6914 21.6339 11.9444 21.887 12.2563 21.887Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M17.0264 21.3221V34.9233C17.0264 35.2351 17.2795 35.4882 17.5913 35.4882C17.9027 35.4882 18.1562 35.2351 18.1562 34.9233V21.3221C18.1562 21.0102 17.9027 20.7571 17.5913 20.7571C17.2795 20.7571 17.0264 21.0102 17.0264 21.3221Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.92772 0.291473C2.72897 0.291473 0.943359 2.07708 0.943359 4.27619C0.943359 6.47529 2.72897 8.26054 4.92772 8.26054C7.12688 8.26054 8.91249 6.47535 8.91249 4.27619C8.91249 2.07702 7.12688 0.291473 4.92772 0.291473ZM4.92772 1.42136C6.50353 1.42136 7.7826 2.70043 7.7826 4.27619C7.7826 5.85165 6.50353 7.13065 4.92772 7.13065C3.35225 7.13065 2.07325 5.85165 2.07325 4.27619C2.07325 2.70037 3.35231 1.42136 4.92772 1.42136Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M30.8529 0.291473C28.6538 0.291473 26.8682 2.07708 26.8682 4.27619C26.8682 6.47529 28.6538 8.26054 30.8529 8.26054C33.0517 8.26054 34.8373 6.47535 34.8373 4.27619C34.8373 2.07702 33.0517 0.291473 30.8529 0.291473ZM30.8529 1.42136C32.4284 1.42136 33.7074 2.70043 33.7074 4.27619C33.7074 5.85165 32.4284 7.13065 30.8529 7.13065C29.2771 7.13065 27.9981 5.85165 27.9981 4.27619C27.9981 2.70037 29.2771 1.42136 30.8529 1.42136Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.04144 16.3672C8.13485 16.5555 8.32845 16.6809 8.54728 16.6809L8.75707 16.6402L13.959 14.5608C14.7597 14.2411 15.6693 14.6309 15.9895 15.4316C16.3092 16.2319 15.9191 17.1415 15.1187 17.4616L8.24863 20.2076C7.59214 20.4701 6.84869 20.2577 6.42799 19.7063C6.28112 19.5138 6.02761 19.4363 5.79791 19.5138C5.56856 19.5914 5.41413 19.8069 5.41413 20.049V22.8862C5.41413 23.1732 5.62918 23.4142 5.91394 23.4474L10.4866 23.9754C11.5672 24.1001 12.3829 25.0153 12.3829 26.1034V34.9233C12.3829 35.2352 12.636 35.4882 12.9478 35.4882C13.2597 35.4882 13.5128 35.2351 13.5128 34.9233V26.1034C13.5128 24.4413 12.2669 23.0436 10.6161 22.8531L6.54396 22.3827V21.2031C7.19555 21.5025 7.96086 21.5394 8.6678 21.257L15.5383 18.511C16.9175 17.9592 17.5898 16.3917 17.0384 15.0121C16.487 13.6324 14.9195 12.9602 13.5399 13.5116L8.78082 15.4139L6.04687 10.9392C5.66085 10.3072 5.03148 9.86242 4.30722 9.70911C4.28501 9.70462 4.2628 9.69972 4.24017 9.69517C3.48124 9.53471 2.68993 9.70947 2.06925 10.1746C1.44856 10.6401 1.05876 11.3504 0.999974 12.124C0.667772 16.4952 0.00153606 25.2556 0.00153606 25.2556C0.000354475 25.2699 0 25.2842 0 25.2986C0 26.9587 1.24326 28.3553 2.89175 28.5481L6.96874 29.0746V34.9233C6.96874 35.2352 7.22184 35.4882 7.53366 35.4882C7.84548 35.4882 8.09857 35.2351 8.09857 34.9233V28.5779C8.09857 28.2935 7.88766 28.054 7.60591 28.0174L3.02609 27.4265C1.9531 27.3027 1.14141 26.3994 1.12977 25.3215C1.12977 25.3185 2.12632 12.2096 2.12632 12.2096C2.16058 11.761 2.38656 11.3486 2.74665 11.0789C3.10709 10.8089 3.56584 10.7075 4.00645 10.8006L4.07309 10.8145C4.49344 10.9035 4.85837 11.1618 5.08246 11.5283C5.93704 12.9271 7.66912 15.7624 8.007 16.3156C8.01846 16.3337 8.02974 16.351 8.04144 16.3672Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5565 17.189L5.37188 20.1609C6.0562 21.281 7.44899 21.7443 8.66814 21.2569C8.95775 21.1413 9.09901 20.8121 8.98304 20.5229C8.86742 20.2332 8.53823 20.092 8.24898 20.2076C7.54168 20.4905 6.73342 20.2219 6.33605 19.5719L4.52073 16.5999C4.35802 16.334 4.00999 16.25 3.74413 16.4123C3.47816 16.5751 3.39379 16.923 3.5565 17.189Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26.4758 16.27L21.0056 17.0435C19.5345 17.2514 18.5093 18.6148 18.7172 20.0859C18.9251 21.5567 20.2885 22.5822 21.7596 22.3743L28.4874 21.4226C28.7491 21.3856 29.0007 21.3111 29.2354 21.203V22.3825L25.1632 22.8529C23.5124 23.0435 22.2666 24.4411 22.2666 26.1032V34.9231C22.2666 35.235 22.5197 35.4881 22.8315 35.4881C23.1433 35.4881 23.3964 35.235 23.3964 34.9231V26.1032C23.3964 25.0152 24.2122 24.0999 25.2927 23.9752L29.8639 23.4472H29.8627C30.1456 23.4163 30.3651 23.1768 30.3651 22.886V20.0485C30.3651 19.8063 30.2107 19.5913 29.9814 19.5137C29.752 19.4357 29.4985 19.5134 29.3513 19.7058C29.1039 20.0297 28.7374 20.2462 28.3291 20.3039L21.6013 21.2552C20.7475 21.3761 19.9566 20.7811 19.8361 19.9273C19.7152 19.0738 20.3102 18.2829 21.1637 18.162L26.8964 17.3515L26.8188 17.3567L27.3009 17.0863L30.3576 12.0828C30.7485 11.4433 31.4645 11.0761 32.2121 11.1326C32.2227 11.1333 32.2329 11.134 32.2434 11.1348C33.2505 11.2109 34.0425 12.0267 34.0885 13.0353L34.6493 25.3104C34.6432 26.3928 33.8297 27.3016 32.7529 27.4263L28.2684 27.9442C27.9863 27.9766 27.7724 28.2135 27.7686 28.4975L27.6805 34.9152C27.6763 35.2271 27.926 35.4836 28.2375 35.4881C28.5494 35.4922 28.8059 35.2425 28.8104 34.9307L28.8914 29.0093L32.8825 28.5486C34.5333 28.358 35.7792 26.96 35.7792 25.2983C35.7792 25.2896 35.7788 25.281 35.7784 25.2723C35.7784 25.2723 35.404 17.0754 35.2172 12.9837C35.1449 11.4041 33.905 10.127 32.3285 10.0083C32.3179 10.0075 32.3074 10.0064 32.2972 10.0056C31.1267 9.91748 30.0054 10.4922 29.3934 11.4937L26.4758 16.27Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M23.2265 1.98628C23.2265 1.53698 23.048 1.1057 22.7301 0.787857C22.4122 0.469952 21.9814 0.291473 21.5317 0.291473H13.6499C12.7137 0.291473 11.9551 1.0504 11.9551 1.98628V9.16634C11.9551 9.53541 12.1705 9.87063 12.5065 10.0235C12.8424 10.1764 13.2367 10.1188 13.5151 9.87624C14.0585 9.40284 14.8243 8.73542 15.2509 8.36334C15.3541 8.27372 15.4859 8.22439 15.6223 8.22439H21.5316C21.9813 8.22439 22.4122 8.04585 22.7301 7.728C23.0479 7.4101 23.2264 6.97888 23.2264 6.52958V1.98628H23.2265ZM13.085 8.75244V1.98628C13.085 1.67446 13.3377 1.42136 13.6499 1.42136H21.5316C21.6815 1.42136 21.8254 1.48086 21.9312 1.58708C22.0371 1.69289 22.0966 1.83639 22.0966 1.98628V6.52958C22.0966 6.67947 22.0371 6.82297 21.9312 6.92878C21.8254 7.035 21.6815 7.0945 21.5316 7.0945H15.6224C15.2129 7.0945 14.8175 7.24249 14.5087 7.51142L13.085 8.75244Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0747 3.79108H20.1938C20.5057 3.79108 20.7587 3.53799 20.7587 3.22617C20.7587 2.91435 20.5056 2.66125 20.1938 2.66125H15.0747C14.7629 2.66125 14.5098 2.91435 14.5098 3.22617C14.5098 3.53799 14.7628 3.79108 15.0747 3.79108Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M15.0747 5.8513H17.5917C17.9032 5.8513 18.1566 5.5982 18.1566 5.28638C18.1566 4.9745 17.9032 4.72147 17.5917 4.72147H15.0747C14.7629 4.72147 14.5098 4.97456 14.5098 5.28638C14.5097 5.5982 14.7628 5.8513 15.0747 5.8513Z" fill="#F7A400" />
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26.79 21.663L28.4874 21.4227C29.284 21.3101 29.9883 20.8472 30.4078 20.161L32.2232 17.189C32.3859 16.9231 32.3015 16.5751 32.0356 16.4124C31.7697 16.2501 31.4217 16.3341 31.259 16.6L29.4437 19.572C29.2004 19.9701 28.7913 20.2386 28.3292 20.3041L26.6317 20.5441C26.3229 20.5878 26.1075 20.874 26.1511 21.1828C26.1948 21.4912 26.4811 21.7066 26.79 21.663Z" fill="#F7A400" />
                            </svg>
                            <h6>Need more help?</h6>
                            <p>Feeling inquisitive? Have a read through some of our FAQs or <a href="https://api.whatsapp.com/message/EXLTRFFRPD6MD1">contact</a> our Supporters for help</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-30">
                    <div class="box-faq-right">
                        <h1 class="title tg-element-title mb-20">Frequently asked questions</h1>
                        <p class="tg-element-title mb-40">Program Pensiun Dana Pensiun Bank KB Bukopin</p>
                        <div class="block-faqs">
                            <div class="accordion wow fadeInUp" id="accordionFAQ">
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="headingOne">
                                        <button class="accordion-button text-heading-5" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Apa itu Program Dana Pensiun?
                                        </button>
                                    </h5>
                                    <div class="accordion-collapse collapse" id="collapseOne" aria-labelledby="headingOne" data-bs-parent="#accordionFAQ">
                                        <div class="accordion-body">Program Pensiun Iuran Pasti (PPIP) adalah program pensiun yang iurannya ditetapkan dalam peraturan Dana Pensiun dan seluruh iuran serta hasil pengembangannya dibukukan pada rekening masing-masing peserta sebagai manfaat pensiun
                                            (UU Nomor 4 Tahun 2023 Tentang Pengembangan dan Penguatan Sektor Keuangan).</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button text-heading-5 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Apa Esensi dari Program Dana Pensiun?
                                        </button>
                                    </h5>
                                    <div class="accordion-collapse collapse" id="collapseTwo" aria-labelledby="headingTwo" data-bs-parent="#accordionFAQ">
                                        <div class="accordion-body">Dari perencanaan suatu program pensiun, adalah mengalokasikan sebagian penghasilan sekarang dalam bentuk Iuran untuk diakumulasi berikut hasil pengembangannya sebagai manfaat pensiun sehingga diharapkan tercapai suatu kesinambungan penghasilan bagi pesertanya setelah karyawan yang bersangkutan menjalani masa pensiun.</div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="headingThree">
                                        <button class="accordion-button text-heading-5 collapsed text-heading-5 type=" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Apa Saja Perencanaan Program?
                                        </button>
                                    </h5>
                                    <div class="accordion-collapse collapse" id="collapseThree" aria-labelledby="headingThree" data-bs-parent="#accordionFAQ">
                                        <div class="accordion-body">Perencanaan suatu Program Pensiun Iuran Pasti mempunyai dua komitmen dasar bagi pemberi kerja yaitu adanya komitmen pemberi kerja untuk menjaga kesinambungan penghasilan pekerja dalam bentuk pemberian uang pensiun bagi pekerjanya pada masa purna bakti dan komitmen pemberi kerja untuk melakukan pengiuran atas nama pekerja selama pekerja berada pada masa bakti. Dua komitmen ini sangat relevan satu sama lain karena tanpa pengiuran yang rasional tidak akan mungkin dicapai objektif "menjaga kesinambungan penghasilan".</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End FAQ -->
</main>