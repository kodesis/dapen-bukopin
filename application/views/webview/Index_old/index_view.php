<style>
    :root {
        --icon-size: 40px;
    }

    .flaticon-profit {
        font-size: var(--icon-size);
    }

    .text-justify {
        text-align: justify;
    }
</style>
<!-- main-area -->
<main class="fix">
    <!-- slider-area -->
    <section class="slider__area">
        <div class="banner-two-col">
            <div class="container ubah-slider">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="banner-col-1">
                            <div class="section-title mb-20 tg-heading-subheading animation-style3">
                                <span class="sub-title">Dana Pensiun Bank Bukopin</span>
                                <h2 class="title tg-element-title text-60-bold"><span>Program</span> Pensiun <span>Iuran</span> Pasti</h2>
                            </div>
                            <p class="mb-5">Professional, Secure, and Transparent Pension Fund Management</p>
                            <div class="choose__tab-content">
                                <ul class="list-wrap">
                                    <li><i class="fas fa-check"></i> Kepesertaan rapi dan akurat</li>
                                    <li><i class="fas fa-check"></i> Administrasi iuran tertib</li>
                                    <li><i class="fas fa-check"></i> Pengelolaan dana optimal dan aman</li>
                                    <li><i class="fas fa-check"></i> Pembayaran manfaat berkesinambungan</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-wrapper">
                <div class="banner-col-2" style="margin-top: 5%;">
                    <div class="swiper-container slider_baner__active slider_baner_home6">
                        <div class="swiper-wrapper">
                            <?php
                            if (!empty($banner) || isset($banner)) {
                                foreach ($banner as $b) {
                            ?>
                                    <div class="swiper-slide slide__home7" style="height: 503px;">
                                        <img style="width: 670px;" src="<?= base_url() ?>/uploads/banner/<?= $b->file_banner ?>" />
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="swiper-slide slide__home7">
                                    <img src="<?= base_url() ?>/assets/user/img/slider/slider adpi 20231.jpg" />
                                </div>
                                <div class="swiper-slide slide__home7">
                                    <img src="<?= base_url() ?>/assets/user/img/slider/slider adpi 20221.jpg" />
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <div class="box-button-slider-bottom" style="bottom: 65px;">
                        <div class="testimonial__nav-four">
                            <div class="testimonial-two-button-prev button-swiper-prev"><i class="flaticon-right-arrow"></i></div>
                            <div class="testimonial-two-button-next button-swiper-next"><i class="flaticon-right-arrow"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider-area-end -->
    <!-- brand-area -->
    <div class="brand-area brand__area-seven brand__area-home7">
        <div class="container">
            <div class="swiper-container brand-active">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/adpi_panjang.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/bufin.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/LOGO-KB-BUKOPIN-SYARIAH.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/logokb2.png" alt="">
                        </div>
                    </div>
                    <!-- <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/brand_img06.png" alt="">
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="brand-item">
                            <img src="<?= base_url() ?>/assets/user/img/brand/brand_img03.png" alt="">
                        </div>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
    <!-- brand-area -->
    <!-- choose-area -->
    <section class="choose__area-three whychoose__area-home7">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-9">
                    <div class="choose__img-wrap-home7">
                        <div class="main-img-why">
                            <img src="<?= base_url() ?>/assets/user/img/home7/HUT web.jpg" alt="Apexa">
                            <!-- <a href="#" class="play-btn"><i class="fas fa-play"></i></a> -->
                        </div>
                        <!-- <img src="<?= base_url() ?>/assets/user/img/images/h3_choose_img02.jpg" alt="" data-parallax='{"y" : 80 }'>
                            <div class="shape">
                                <img src="<?= base_url() ?>/assets/user/img/images/h3_choose_img_shape.jpg" alt="" class="alltuchtopdown">
                            </div> -->
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="choose__content-three">
                        <div class="section-title mb-25 tg-heading-subheading animation-style3">
                            <span class="sub-title">Why We Are The Best</span>
                            <h2 class="title tg-element-title">Kami Memastikan Manajemen Pensiun yang Aman dan Berkelanjutan</h2>
                        </div>
                        <p class="text-justify">Dana Pensiun Bank Bukopin berkomitmen untuk menjaga keamanan dan kesinambungan penghasilan para peserta di masa pensiun melalui pengelolaan dana yang profesional dan transparan. Kami unggul karena</p>
                        <div class="choose__list">
                            <ul class="list-wrap">
                                <li>
                                    <div class="choose__list-box">
                                        <div class="choose__list-icon">
                                            <i class="flaticon-financial-profit"></i>
                                        </div>
                                        <div class="choose__list-content">
                                            <h4 class="title">Pembayaran Manfaat yang Berkelanjutan</h4>
                                            <p class="text-justify">Kami memastikan manfaat pensiun sebagai sumber penghasilan yang berkesinambungan bagi peserta setelah mereka pensiun.
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="choose__list-box">
                                        <div class="choose__list-icon">
                                            <i class="flaticon-report"></i>
                                        </div>
                                        <div class="choose__list-content">
                                            <h4 class="title">Pengelolaan Dana yang Optimal dan Aman</h4>
                                            <p class="text-justify">Dana pensiun dikelola dengan kebijakan investasi yang aman dan sesuai arahan untuk hasil maksimal.</p>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="choose__shape-wrap-three">
            <img src="<?= base_url() ?>/assets/user/img/images/h3_choose_shape01.jpg" alt="" data-parallax='{"x" : 100 , "y" : -100 }'>
            <img src="<?= base_url() ?>/assets/user/img/images/h3_choose_shape02.jpg" alt="">
        </div>
    </section>
    <!-- choose-area-end -->
    <!-- services-area -->
    <!-- <section class="services__area-seven services__area-home7 services__bg-seven">
        <div class="icon-line"><img src="<?= base_url() ?>/assets/user/img/home7/icon-line.svg" /></div>
        <div class="icon-snow"><img src="<?= base_url() ?>/assets/user/img/home7/icon-snow.svg" /></div>
        <div class="icon-star"><img src="<?= base_url() ?>/assets/user/img/home7/icon-star.svg" /></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center mb-50">
                        <h2 class="title">PROGRAM PENSIUN
                            <br class="d-none d-lg-block" />
                            DANA PENSIUN BANK BUKOPIN
                            <br class="d-none d-lg-block" />
                            IURAN PASTI
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24 services__item-style-2">
                <p><b>Apa itu Program Dana Pensiun?</b>
                    <br>
                    Program Pensiun Iuran Pasti (PPIP) adalah program pensiun yang iurannya ditetapkan dalam peraturan Dana Pensiun dan seluruh iuran serta hasil pengembangannya dibukukan pada rekening masing-masing peserta sebagai manfaat pensiun
                    (Pasal 1 Angka 8 UU Nomor 11 Tahun 1992 Tentang Dana Pensiun).
                    <br>
                    <br>
                    <b>Apa Esensi dari Program Dana Pensiun?</b>
                    <br>
                    Dari perencanaan suatu program pensiun, adalah mengalokasikan sebagian penghasilan sekarang dalam bentuk Iuran untuk diakumulasi berikut hasil pengembangannya sebagai manfaat pensiun sehingga diharapkan tercapai suatu kesinambungan penghasilan bagi pesertanya setelah karyawan yang bersangkutan menjalani masa pensiun.
                    <br>
                    <br>
                    <b>Apa Saja Perencanaan Program?</b>
                    <br>
                    Perencanaan suatu Program Pensiun Iuran Pasti mempunyai dua komitmen dasar bagi pemberi kerja yaitu adanya komitmen pemberi kerja untuk menjaga kesinambungan penghasilan pekerja dalam bentuk pemberian uang pensiun bagi pekerjanya pada masa purna bakti dan komitmen pemberi kerja untuk melakukan pengiuran atas nama pekerja selama pekerja berada pada masa bakti. Dua komitmen ini sangat relevan satu sama lain karena tanpa pengiuran yang rasional tidak akan mungkin dicapai objektif "menjaga kesinambungan penghasilan".
                </p>
            </div>
        </div>
    </section> -->
    <!-- services-area-end -->
    <!-- services-area -->
    <section class="services__area-seven services__area-home7 services__bg-seven">
        <div class="icon-line"><img src="<?= base_url() ?>assets/user/img/home7/icon-line.svg" /></div>
        <div class="icon-snow"><img src="<?= base_url() ?>assets/user/img/home7/icon-snow.svg" /></div>
        <div class="icon-star"><img src="<?= base_url() ?>assets/user/img/home7/icon-star.svg" /></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center mb-50">
                        <h2 class="title">PROGRAM PENSIUN
                            <br class="d-none d-lg-block" />
                            DANA PENSIUN BANK BUKOPIN
                            <br class="d-none d-lg-block" />
                            IURAN PASTI
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gutter-24 services__item-style-2">
                <div class="col-xl-12 col-lg-4 col-md-6">
                    <div class="services__item-five">
                        <div class="services__icon-five">
                            <div class="icon">
                                <i class="flaticon-profit"></i>
                            </div>
                            <div class="services__icon-shape">
                                <div class="shape one">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="89" viewBox="0 0 100 89" fill="none">
                                        <path d="M89.3997 20.1665C90.5806 21.4322 91.2497 23.0786 91.2607 24.7458C91.2717 26.4129 90.6237 27.965 89.4585 29.0627L82.7168 35.3787C83.8857 34.2836 85.4772 33.7354 87.141 33.8548C88.8049 33.9742 90.4049 34.7514 91.589 36.0153C92.7732 37.2792 93.4445 38.9265 93.4553 40.5946C93.4661 42.2627 92.8154 43.815 91.6465 44.9101L89.4391 46.9782C90.7021 46.1158 92.2814 45.7931 93.8594 46.075C95.4374 46.3569 96.897 47.2225 97.9445 48.4977C98.9919 49.7729 99.5496 51.363 99.5051 52.948C99.4607 54.5331 98.8175 55.9955 97.705 57.041L66.4218 86.3494C65.306 87.3914 63.8048 87.938 62.2202 87.8791C60.6357 87.8202 59.0853 87.1602 57.881 86.0319C56.6767 84.9037 55.908 83.3908 55.7294 81.7978C55.5509 80.2048 55.9757 78.6498 56.9185 77.4457L46.2874 87.4056C45.1185 88.5008 43.5271 89.0489 41.8632 88.9295C40.1994 88.8101 38.5994 88.033 37.4152 86.769C36.2311 85.5051 35.5598 83.8579 35.549 82.1898C35.5382 80.5217 36.1888 78.9693 37.3578 77.8742L42.5545 73.0055C41.5403 73.9509 40.2052 74.4903 38.7733 74.5334C37.3414 74.5764 35.8998 74.1205 34.6905 73.242C33.4812 72.3636 32.5777 71.1161 32.1318 69.7089C31.6858 68.3017 31.7245 66.8205 32.2413 65.5139L22.1964 74.9247C21.0275 76.0198 19.4361 76.5679 17.7722 76.4485C16.1084 76.3291 14.5084 75.552 13.3242 74.2881C12.1401 73.0241 11.4688 71.3769 11.458 69.7088C11.4472 68.0407 12.0978 66.4883 13.2667 65.3932L25.0674 54.3375C23.8985 55.4326 22.3071 55.9808 20.6432 55.8614C18.9794 55.742 17.3794 54.9649 16.1952 53.7009C15.0111 52.437 14.3398 50.7898 14.329 49.1217C14.3182 47.4536 14.9688 45.9012 16.1377 44.8061L11.4359 49.2111C10.267 50.3062 8.67555 50.8544 7.01169 50.735C5.34784 50.6156 3.74784 49.8384 2.56369 48.5745C1.37954 47.3106 0.708235 45.6633 0.697453 43.9952C0.686672 42.3271 1.3373 40.7748 2.5062 39.6797L35.5613 8.71135C36.7302 7.61624 38.3217 7.06808 39.9855 7.18747C41.6494 7.30686 43.2494 8.08401 44.4335 9.34795C45.6177 10.6119 46.289 12.2591 46.2998 13.9272C46.3105 15.5953 45.6599 17.1477 44.491 18.2428L61.4956 2.31173C62.6645 1.21663 64.2559 0.668477 65.9198 0.787863C67.5836 0.90725 69.1836 1.6844 70.3678 2.94834C71.5519 4.21229 72.2232 5.8595 72.234 7.5276C72.2448 9.19571 71.5942 10.7481 70.4253 11.8432L65.2285 16.7119C66.242 15.7657 67.5766 15.2252 69.0084 15.181C70.4403 15.1369 71.8821 15.5918 73.092 16.4694C74.3019 17.3471 75.2063 18.594 75.6532 20.001C76.1001 21.4079 76.0625 22.8893 75.5466 24.1964L80.5275 19.5299C81.699 18.4397 83.2895 17.8948 84.9518 18.014C86.6141 18.1333 88.2131 18.9071 89.3997 20.1665Z" fill="currentcolor" />
                                    </svg>
                                </div>
                                <div class="shape two">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                                        <path d="M7.36755 4.37738C7.36755 6.02099 6.03514 7.3534 4.39153 7.3534C2.74792 7.3534 1.41552 6.02099 1.41552 4.37738C1.41552 2.73376 2.74792 1.40136 4.39153 1.40136C6.03514 1.40136 7.36755 2.73376 7.36755 4.37738Z" stroke="currentcolor" stroke-width="1.19041" />
                                    </svg>
                                </div>
                                <div class="shape three rotateme">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                        <path d="M1.70898 1.73877L7.06581 7.0956M1.70898 7.0956L7.06581 1.73877" stroke="currentcolor" stroke-width="1.92846" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="services__content-five">
                            <h2 class="title">Apa itu Program Dana Pensiun?</a></h2>
                            <p class="text-justify"> Program Pensiun Iuran Pasti (PPIP) adalah program pensiun yang iurannya ditetapkan dalam peraturan Dana Pensiun dan seluruh iuran serta hasil pengembangannya dibukukan pada rekening masing-masing peserta sebagai manfaat pensiun (Pasal 1 Angka 8 UU Nomor 11 Tahun 1992 Tentang Dana Pensiun).</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-4 col-md-6">
                    <div class="services__item-five">
                        <div class="services__icon-five">
                            <div class="icon">
                                <i class="flaticon-light-bulb"></i>
                            </div>
                            <div class="services__icon-shape">
                                <div class="shape one">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="89" viewBox="0 0 100 89" fill="none">
                                        <path d="M89.3997 20.1665C90.5806 21.4322 91.2497 23.0786 91.2607 24.7458C91.2717 26.4129 90.6237 27.965 89.4585 29.0627L82.7168 35.3787C83.8857 34.2836 85.4772 33.7354 87.141 33.8548C88.8049 33.9742 90.4049 34.7514 91.589 36.0153C92.7732 37.2792 93.4445 38.9265 93.4553 40.5946C93.4661 42.2627 92.8154 43.815 91.6465 44.9101L89.4391 46.9782C90.7021 46.1158 92.2814 45.7931 93.8594 46.075C95.4374 46.3569 96.897 47.2225 97.9445 48.4977C98.9919 49.7729 99.5496 51.363 99.5051 52.948C99.4607 54.5331 98.8175 55.9955 97.705 57.041L66.4218 86.3494C65.306 87.3914 63.8048 87.938 62.2202 87.8791C60.6357 87.8202 59.0853 87.1602 57.881 86.0319C56.6767 84.9037 55.908 83.3908 55.7294 81.7978C55.5509 80.2048 55.9757 78.6498 56.9185 77.4457L46.2874 87.4056C45.1185 88.5008 43.5271 89.0489 41.8632 88.9295C40.1994 88.8101 38.5994 88.033 37.4152 86.769C36.2311 85.5051 35.5598 83.8579 35.549 82.1898C35.5382 80.5217 36.1888 78.9693 37.3578 77.8742L42.5545 73.0055C41.5403 73.9509 40.2052 74.4903 38.7733 74.5334C37.3414 74.5764 35.8998 74.1205 34.6905 73.242C33.4812 72.3636 32.5777 71.1161 32.1318 69.7089C31.6858 68.3017 31.7245 66.8205 32.2413 65.5139L22.1964 74.9247C21.0275 76.0198 19.4361 76.5679 17.7722 76.4485C16.1084 76.3291 14.5084 75.552 13.3242 74.2881C12.1401 73.0241 11.4688 71.3769 11.458 69.7088C11.4472 68.0407 12.0978 66.4883 13.2667 65.3932L25.0674 54.3375C23.8985 55.4326 22.3071 55.9808 20.6432 55.8614C18.9794 55.742 17.3794 54.9649 16.1952 53.7009C15.0111 52.437 14.3398 50.7898 14.329 49.1217C14.3182 47.4536 14.9688 45.9012 16.1377 44.8061L11.4359 49.2111C10.267 50.3062 8.67555 50.8544 7.01169 50.735C5.34784 50.6156 3.74784 49.8384 2.56369 48.5745C1.37954 47.3106 0.708235 45.6633 0.697453 43.9952C0.686672 42.3271 1.3373 40.7748 2.5062 39.6797L35.5613 8.71135C36.7302 7.61624 38.3217 7.06808 39.9855 7.18747C41.6494 7.30686 43.2494 8.08401 44.4335 9.34795C45.6177 10.6119 46.289 12.2591 46.2998 13.9272C46.3105 15.5953 45.6599 17.1477 44.491 18.2428L61.4956 2.31173C62.6645 1.21663 64.2559 0.668477 65.9198 0.787863C67.5836 0.90725 69.1836 1.6844 70.3678 2.94834C71.5519 4.21229 72.2232 5.8595 72.234 7.5276C72.2448 9.19571 71.5942 10.7481 70.4253 11.8432L65.2285 16.7119C66.242 15.7657 67.5766 15.2252 69.0084 15.181C70.4403 15.1369 71.8821 15.5918 73.092 16.4694C74.3019 17.3471 75.2063 18.594 75.6532 20.001C76.1001 21.4079 76.0625 22.8893 75.5466 24.1964L80.5275 19.5299C81.699 18.4397 83.2895 17.8948 84.9518 18.014C86.6141 18.1333 88.2131 18.9071 89.3997 20.1665Z" fill="currentcolor" />
                                    </svg>
                                </div>
                                <div class="shape two">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                                        <path d="M7.36755 4.37738C7.36755 6.02099 6.03514 7.3534 4.39153 7.3534C2.74792 7.3534 1.41552 6.02099 1.41552 4.37738C1.41552 2.73376 2.74792 1.40136 4.39153 1.40136C6.03514 1.40136 7.36755 2.73376 7.36755 4.37738Z" stroke="currentcolor" stroke-width="1.19041" />
                                    </svg>
                                </div>
                                <div class="shape three rotateme">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                        <path d="M1.70898 1.73877L7.06581 7.0956M1.70898 7.0956L7.06581 1.73877" stroke="currentcolor" stroke-width="1.92846" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="services__content-five">
                            <h2 class="title">Apa Esensi dari Program Dana Pensiun?</h2>
                            <p class="text-justify">Dari perencanaan suatu program pensiun, adalah mengalokasikan sebagian penghasilan sekarang dalam bentuk Iuran untuk diakumulasi berikut hasil pengembangannya sebagai manfaat pensiun sehingga diharapkan tercapai suatu kesinambungan penghasilan bagi pesertanya setelah karyawan yang bersangkutan menjalani masa pensiun.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-4 col-md-6">
                    <div class="services__item-five">
                        <div class="services__icon-five">
                            <div class="icon">
                                <i class="flaticon-startup"></i>
                            </div>
                            <div class="services__icon-shape">
                                <div class="shape one">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="89" viewBox="0 0 100 89" fill="none">
                                        <path d="M89.3997 20.1665C90.5806 21.4322 91.2497 23.0786 91.2607 24.7458C91.2717 26.4129 90.6237 27.965 89.4585 29.0627L82.7168 35.3787C83.8857 34.2836 85.4772 33.7354 87.141 33.8548C88.8049 33.9742 90.4049 34.7514 91.589 36.0153C92.7732 37.2792 93.4445 38.9265 93.4553 40.5946C93.4661 42.2627 92.8154 43.815 91.6465 44.9101L89.4391 46.9782C90.7021 46.1158 92.2814 45.7931 93.8594 46.075C95.4374 46.3569 96.897 47.2225 97.9445 48.4977C98.9919 49.7729 99.5496 51.363 99.5051 52.948C99.4607 54.5331 98.8175 55.9955 97.705 57.041L66.4218 86.3494C65.306 87.3914 63.8048 87.938 62.2202 87.8791C60.6357 87.8202 59.0853 87.1602 57.881 86.0319C56.6767 84.9037 55.908 83.3908 55.7294 81.7978C55.5509 80.2048 55.9757 78.6498 56.9185 77.4457L46.2874 87.4056C45.1185 88.5008 43.5271 89.0489 41.8632 88.9295C40.1994 88.8101 38.5994 88.033 37.4152 86.769C36.2311 85.5051 35.5598 83.8579 35.549 82.1898C35.5382 80.5217 36.1888 78.9693 37.3578 77.8742L42.5545 73.0055C41.5403 73.9509 40.2052 74.4903 38.7733 74.5334C37.3414 74.5764 35.8998 74.1205 34.6905 73.242C33.4812 72.3636 32.5777 71.1161 32.1318 69.7089C31.6858 68.3017 31.7245 66.8205 32.2413 65.5139L22.1964 74.9247C21.0275 76.0198 19.4361 76.5679 17.7722 76.4485C16.1084 76.3291 14.5084 75.552 13.3242 74.2881C12.1401 73.0241 11.4688 71.3769 11.458 69.7088C11.4472 68.0407 12.0978 66.4883 13.2667 65.3932L25.0674 54.3375C23.8985 55.4326 22.3071 55.9808 20.6432 55.8614C18.9794 55.742 17.3794 54.9649 16.1952 53.7009C15.0111 52.437 14.3398 50.7898 14.329 49.1217C14.3182 47.4536 14.9688 45.9012 16.1377 44.8061L11.4359 49.2111C10.267 50.3062 8.67555 50.8544 7.01169 50.735C5.34784 50.6156 3.74784 49.8384 2.56369 48.5745C1.37954 47.3106 0.708235 45.6633 0.697453 43.9952C0.686672 42.3271 1.3373 40.7748 2.5062 39.6797L35.5613 8.71135C36.7302 7.61624 38.3217 7.06808 39.9855 7.18747C41.6494 7.30686 43.2494 8.08401 44.4335 9.34795C45.6177 10.6119 46.289 12.2591 46.2998 13.9272C46.3105 15.5953 45.6599 17.1477 44.491 18.2428L61.4956 2.31173C62.6645 1.21663 64.2559 0.668477 65.9198 0.787863C67.5836 0.90725 69.1836 1.6844 70.3678 2.94834C71.5519 4.21229 72.2232 5.8595 72.234 7.5276C72.2448 9.19571 71.5942 10.7481 70.4253 11.8432L65.2285 16.7119C66.242 15.7657 67.5766 15.2252 69.0084 15.181C70.4403 15.1369 71.8821 15.5918 73.092 16.4694C74.3019 17.3471 75.2063 18.594 75.6532 20.001C76.1001 21.4079 76.0625 22.8893 75.5466 24.1964L80.5275 19.5299C81.699 18.4397 83.2895 17.8948 84.9518 18.014C86.6141 18.1333 88.2131 18.9071 89.3997 20.1665Z" fill="currentcolor" />
                                    </svg>
                                </div>
                                <div class="shape two">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="8" height="8" viewBox="0 0 8 8" fill="none">
                                        <path d="M7.36755 4.37738C7.36755 6.02099 6.03514 7.3534 4.39153 7.3534C2.74792 7.3534 1.41552 6.02099 1.41552 4.37738C1.41552 2.73376 2.74792 1.40136 4.39153 1.40136C6.03514 1.40136 7.36755 2.73376 7.36755 4.37738Z" stroke="currentcolor" stroke-width="1.19041" />
                                    </svg>
                                </div>
                                <div class="shape three rotateme">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="9" height="9" viewBox="0 0 9 9" fill="none">
                                        <path d="M1.70898 1.73877L7.06581 7.0956M1.70898 7.0956L7.06581 1.73877" stroke="currentcolor" stroke-width="1.92846" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="services__content-five">
                            <h2 class="title">Apa Saja Perencanaan Program?</h2>
                            <p class="text-justify">Perencanaan suatu Program Pensiun Iuran Pasti mempunyai dua komitmen dasar bagi pemberi kerja yaitu adanya komitmen pemberi kerja untuk menjaga kesinambungan penghasilan pekerja dalam bentuk pemberian uang pensiun bagi pekerjanya pada masa purna bakti dan komitmen pemberi kerja untuk melakukan pengiuran atas nama pekerja selama pekerja berada pada masa bakti. Dua komitmen ini sangat relevan satu sama lain karena tanpa pengiuran yang rasional tidak akan mungkin dicapai objektif "menjaga kesinambungan penghasilan".</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- services-area-end -->
    <!-- Step area -->
    <section class="steps__area-seven">
        <div class="container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-8">
                        <div class="section-title text-center mb-40 tg-heading-subheading animation-style3">
                            <span class="sub-title">Visi Dan Misi</span>
                            <h2 class="title tg-element-title">DANA PENSIUN<br class="d-none d-lg-block"> BANK BUKOPIN</h2>
                            <p class="mb-25 text-justify">Visi dan Misi Dana Pensiun ditetapkan sebagai sasaran yang ingin dituju dan rincian pelaksanaannya, sebagai penjabaran dari maksud dan tujuan pendirian Dana Pensiun sebagaimana ditetapkan dalam Peraturan Dana Pensiun. Selanjutnya, sebagai sebuah lembaga yang telah lama berdiri dan melakukan kegiatan, Dana Pensiun memiliki pengalaman yang membentuk butir-butir kebiasaan serta tradisi positif, berupa Nilai-nilai Dasar atau Core Values Dana Pensiun. Visi dan Misi sebagai acuan pencapaian maksud dan tujuan serta Nilai-nilai Dasar (Core Values) Dana Pensiun yang menjadi dasar pertimbangan penyusunan serta penetapan Good Pension Fund Governance adalah sebagai berikut : </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-30">
                    <h3 class="text-capitalize mw-460">Vision and Mission</h3>
                </div>
                <div class="col-lg-6 mb-30">
                    <p class="text-justify">Menjadi Dana Pensiun yang sehat dan mampu menunjang kepentingan Peserta dan Pendiri dalam menjaga terpeliharanya kesinambungan penghasilan hari tua bagi para pesertanya.</p>
                </div>
            </div>
            <div class="row mt-30">
                <div class="col-lg-3 mb-40">
                    <div class="card-step">
                        <div class="card-icon">
                            <svg width="37" height="35" viewBox="0 0 37 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M31.6616 24.4826C31.628 24.4631 26.8757 22.2065 17.4046 17.7066V2.53256C17.4046 2.21509 17.1472 1.95764 16.8296 1.95764C7.86149 1.95764 0.584563 9.08816 0.329912 17.9806C0.320827 18.0385 0.320128 18.0817 0.326278 18.1356C0.145072 27.447 7.632 34.9723 16.8296 34.9723C23.294 34.9723 29.1835 31.1776 31.8603 25.2974C32.0463 25.0123 31.9447 24.642 31.6616 24.4826ZM16.2547 3.11936V17.4951H1.50366C1.99402 9.66679 8.37499 3.41091 16.2547 3.11936ZM16.8296 33.8225C8.4216 33.8225 1.5713 27.0304 1.47438 18.6449H16.7L30.6093 25.2534C28.032 30.4774 22.684 33.8225 16.8296 33.8225ZM19.5948 0.311768C19.2773 0.311768 19.0198 0.569145 19.0198 0.88669C19.0198 17.4945 19.004 16.4706 19.0505 16.6082C19.0971 16.746 19.1965 16.8668 19.337 16.9374C19.3921 16.965 33.9128 23.863 33.9032 23.8587C34.2424 24.0109 34.6103 23.8204 34.6999 23.4844C35.5864 21.4787 36.056 19.3475 36.0979 17.1431C36.0982 17.1334 36.0985 17.1237 36.0983 17.114C36.2599 7.78171 28.7408 0.311768 19.5948 0.311768ZM20.1697 1.47342C21.1893 1.51116 22.184 1.64834 23.1439 1.8763L20.1697 4.85056V1.47342ZM20.1697 6.47666L24.4105 2.23584C25.1046 2.46561 25.7767 2.74375 26.4232 3.06604L20.1696 9.31962L20.1697 6.47666ZM20.1697 10.9456L27.4737 3.64167C28.0594 3.99317 28.6198 4.3827 29.1516 4.80668L20.1697 13.7885V10.9456ZM20.1697 16.0607V15.4146L30.0257 5.55861C30.5179 6.0148 30.9805 6.50237 31.4096 7.01887L21.6598 16.7687L20.1697 16.0607ZM22.7621 17.2924L32.1171 7.93748C32.5157 8.49787 32.8768 9.08649 33.1986 9.69894L24.6894 18.2081L22.7621 17.2924ZM25.7917 18.7318L33.7231 10.8004C34.0146 11.4822 34.258 12.1892 34.4494 12.9171L27.719 19.6475L25.7917 18.7318ZM33.8433 22.5572L31.8509 21.6106L34.8482 18.6133C34.6913 19.9694 34.3553 21.2889 33.8433 22.5572ZM34.9514 16.884L30.7486 21.0868L28.8213 20.1712L34.7371 14.2553C34.8848 15.1303 34.955 15.9953 34.9514 16.884Z" fill="#F7A400" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h5>Visi 1: Menyelenggarakan kepesertaan pensiun secara akurat dan tertib.</h5>
                            <p class="text-justify">Menyelenggarakan Sistim Kepesertaan Program Pensiun secara rapi, tertib, dan akurat.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-40">
                    <div class="card-step">
                        <div class="card-icon">
                            <svg width="34" height="35" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.3003 5.87795C11.2255 5.87795 6.28327 10.7938 6.28327 16.836C6.28327 18.7691 6.79636 20.6696 7.76697 22.3321C8.70847 23.9447 10.0575 25.3016 11.6683 26.2562C12.1404 26.5361 12.4004 26.9911 12.4004 27.5375V30.0613C12.4004 30.9693 13.0028 31.7399 13.8309 31.9987V32.0455C13.8309 33.5379 15.0515 34.7521 16.5519 34.7521H18.0486C19.5491 34.7521 20.7698 33.538 20.7698 32.0455V31.9987C21.5978 31.7398 22.2002 30.9692 22.2002 30.0613V27.5375C22.2002 26.991 22.4602 26.536 22.9324 26.2562C24.5431 25.3016 25.8922 23.9447 26.8337 22.3321C27.8044 20.6696 28.3174 18.7691 28.3174 16.836C28.3175 10.7937 23.3752 5.87795 17.3003 5.87795V5.87795ZM18.0487 33.5371H16.552C15.7407 33.5371 15.0783 32.8928 15.0536 32.0916H19.5472C19.5225 32.8928 18.86 33.5371 18.0487 33.5371ZM20.1591 30.8766H14.4417C13.9896 30.8766 13.6219 30.5108 13.6219 30.0612V29.6291H20.9787V30.0612C20.9787 30.5108 20.611 30.8766 20.1591 30.8766ZM22.3072 25.2124C21.463 25.7127 20.9787 26.5602 20.9787 27.5374V28.4141H13.6219V27.5374C13.6219 26.5602 13.1377 25.7127 12.2935 25.2124C9.33977 23.4618 7.50483 20.2522 7.50483 16.836C7.50483 11.4636 11.8991 7.09284 17.3004 7.09284C22.7017 7.09284 27.096 11.4636 27.096 16.836C27.096 20.2522 25.261 23.4618 22.3072 25.2124V25.2124ZM3.11621 8.60864C3.28478 8.31813 3.65815 8.21851 3.95049 8.38631L6.28768 9.72843C6.57982 9.89617 6.67984 10.2677 6.51121 10.5583C6.39809 10.7531 6.19281 10.8621 5.98169 10.8621C5.87814 10.8621 5.77316 10.8358 5.67693 10.7806L3.33975 9.43846C3.04761 9.27073 2.94751 8.89915 3.11621 8.60864V8.60864ZM4.23143 17.3615H1.53262C1.19529 17.3615 0.921875 17.0896 0.921875 16.754C0.921875 16.4185 1.19529 16.1465 1.53262 16.1465H4.23143C4.56877 16.1465 4.84218 16.4185 4.84218 16.754C4.84218 17.0896 4.56877 17.3615 4.23143 17.3615ZM6.51121 22.9499C6.67984 23.2404 6.57982 23.6119 6.28768 23.7797L3.95049 25.1219C3.85433 25.1771 3.74929 25.2033 3.64573 25.2033C3.43462 25.2033 3.22934 25.0945 3.11621 24.8995C2.94758 24.6089 3.04761 24.2374 3.33975 24.0697L5.67693 22.7275C5.96921 22.5598 6.34265 22.6593 6.51121 22.9499ZM24.0864 15.1023H23.4305C23.2963 14.6308 23.1079 14.1788 22.8673 13.7508L23.3313 13.2894C23.5698 13.0522 23.5699 12.6676 23.3313 12.4303L21.73 10.8374C21.6154 10.7234 21.4601 10.6594 21.2981 10.6594C21.1361 10.6594 20.9808 10.7234 20.8663 10.8374L20.4022 11.2989C19.9716 11.0594 19.5173 10.8721 19.0435 10.7386V10.0864C19.0435 9.75084 18.7701 9.47889 18.4328 9.47889H16.168C15.8307 9.47889 15.5573 9.75084 15.5573 10.0864V10.7386C15.0833 10.8721 14.6288 11.0594 14.1985 11.2988L13.7346 10.8374C13.496 10.6002 13.1094 10.6002 12.8708 10.8374L11.2693 12.4304C11.0307 12.6676 11.0307 13.0522 11.2693 13.2895L11.7332 13.7509C11.4924 14.1792 11.3041 14.6311 11.1699 15.1024H10.5144C10.177 15.1024 9.90363 15.3744 9.90363 15.7099V17.9626C9.90363 18.2982 10.177 18.5701 10.5144 18.5701H11.17C11.3042 19.0415 11.4925 19.4935 11.7332 19.9216L11.2693 20.383C11.0307 20.6204 11.0308 21.005 11.2693 21.2422L12.8708 22.8352C12.9853 22.9491 13.1407 23.0131 13.3026 23.0131C13.4645 23.0131 13.62 22.9491 13.7345 22.8351L14.1984 22.3737C14.629 22.6132 15.0834 22.8005 15.5572 22.9339V23.5861C15.5572 23.9216 15.8306 24.1936 16.168 24.1936H18.4327C18.77 24.1936 19.0434 23.9216 19.0434 23.5861V22.9339C19.5173 22.8003 19.9718 22.613 20.4022 22.3736L20.8662 22.8351C21.1048 23.0723 21.4914 23.0724 21.73 22.835L23.3313 21.2422C23.5698 21.005 23.5699 20.6204 23.3313 20.383L22.8674 19.9216C23.1081 19.4933 23.2964 19.0413 23.4306 18.5701H24.0864C24.4237 18.5701 24.6971 18.2982 24.6971 17.9626V15.7099C24.6971 15.3743 24.4237 15.1023 24.0864 15.1023V15.1023ZM23.4756 17.355H22.95C22.6587 17.355 22.408 17.5596 22.351 17.8437C22.2194 18.5004 21.9625 19.1168 21.5876 19.6757C21.4259 19.9166 21.4578 20.2376 21.6637 20.4424L22.0357 20.8125L21.298 21.5462L20.9259 21.1762C20.72 20.9714 20.3972 20.9396 20.1551 21.1005C19.5935 21.4733 18.9738 21.7289 18.3133 21.8598C18.0277 21.9165 17.822 22.1659 17.822 22.4556V22.9784H16.7788V22.4556C16.7788 22.1658 16.573 21.9164 16.2873 21.8598C15.6271 21.729 15.0075 21.4735 14.4455 21.1005C14.2034 20.9396 13.8806 20.9714 13.6746 21.1763L13.3027 21.5463L12.5649 20.8125L12.9369 20.4424C13.1428 20.2375 13.1747 19.9166 13.013 19.6757C12.6382 19.1171 12.3813 18.5008 12.2496 17.8437C12.1927 17.5596 11.942 17.355 11.6507 17.355H11.1252V16.3172H11.6507C11.942 16.3172 12.1928 16.1126 12.2496 15.8284C12.3811 15.1718 12.638 14.5555 13.013 13.9966C13.1747 13.7557 13.1428 13.4347 12.9369 13.2298L12.5649 12.8598L13.3027 12.126L13.6746 12.496C13.8807 12.7008 14.2033 12.7325 14.4455 12.5717C15.007 12.1989 15.6267 11.9434 16.2875 11.8124C16.5732 11.7557 16.7788 11.5063 16.7788 11.2166V10.6938H17.822V11.2166C17.822 11.5063 18.0277 11.7557 18.3133 11.8124C18.9735 11.9432 19.5932 12.1988 20.1551 12.5717C20.3975 12.7326 20.7201 12.7008 20.9259 12.496L21.298 12.1259L22.0357 12.8597L21.6637 13.2298C21.4576 13.4347 21.4258 13.7558 21.5876 13.9967C21.9622 14.5549 22.2192 15.1712 22.351 15.8286C22.408 16.1127 22.6588 16.3172 22.95 16.3172H23.4756V17.355ZM17.3002 12.7188C15.0177 12.7188 13.1608 14.5659 13.1608 16.8362C13.1608 19.1065 15.0177 20.9535 17.3002 20.9535C19.5827 20.9535 21.4397 19.1065 21.4397 16.8362C21.4397 14.5659 19.5827 12.7188 17.3002 12.7188V12.7188ZM17.3002 19.7385C15.6913 19.7385 14.3823 18.4365 14.3823 16.8362C14.3823 15.2358 15.6913 13.9338 17.3002 13.9338C18.9091 13.9338 20.2182 15.2358 20.2182 16.8362C20.2182 18.4365 18.9091 19.7385 17.3002 19.7385ZM28.0896 10.5583C27.9209 10.2677 28.021 9.89617 28.3131 9.72843L30.6502 8.38631C30.9424 8.21851 31.3159 8.3182 31.4844 8.60864C31.6531 8.89922 31.553 9.27073 31.2609 9.43846L28.9239 10.7806C28.8277 10.8358 28.7227 10.8621 28.6191 10.8621C28.4079 10.8621 28.2027 10.7531 28.0896 10.5583ZM33.72 16.7651C33.72 17.1006 33.4466 17.3726 33.1093 17.3726H30.4105C30.0731 17.3726 29.7997 17.1006 29.7997 16.7651C29.7997 16.4296 30.0731 16.1576 30.4105 16.1576H33.1093C33.4466 16.1576 33.72 16.4296 33.72 16.7651ZM31.4844 24.8995C31.3713 25.0945 31.166 25.2033 30.9549 25.2033C30.8514 25.2033 30.7463 25.1771 30.6502 25.1219L28.3131 23.7797C28.021 23.6119 27.9209 23.2404 28.0896 22.9499C28.2581 22.6593 28.6317 22.5597 28.9239 22.7275L31.2609 24.0697C31.553 24.2375 31.6531 24.609 31.4844 24.8995ZM16.6895 3.75494V1.07062C16.6895 0.735084 16.963 0.463135 17.3003 0.463135C17.6376 0.463135 17.911 0.735084 17.911 1.07062V3.75494C17.911 4.09047 17.6376 4.36242 17.3003 4.36242C16.963 4.36242 16.6895 4.0904 16.6895 3.75494ZM8.88755 3.47557C8.71892 3.18499 8.81894 2.81348 9.11108 2.64575C9.40309 2.47795 9.77666 2.57757 9.94536 2.86802L11.2949 5.19264C11.4635 5.48322 11.3635 5.85473 11.0714 6.02246C10.9752 6.07768 10.8702 6.104 10.7666 6.104C10.5556 6.104 10.3502 5.99506 10.2371 5.80019L8.88755 3.47557ZM23.306 5.19278L24.6553 2.86815C24.8239 2.57764 25.1972 2.47801 25.4896 2.64575C25.7817 2.81348 25.8817 3.18499 25.7131 3.47557L24.3638 5.80019C24.2507 5.99506 24.0454 6.10407 23.8343 6.10407C23.7308 6.10407 23.6258 6.07781 23.5296 6.0226C23.2375 5.8548 23.1374 5.48329 23.306 5.19278Z" fill="#F7A400" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h5>Visi 2: Mengelola dan administrasi iuran pensiun secara bertanggung jawab.</h5>
                            <p class="text-justify">Menyelenggarakan Sistim Penerimaan dan Administrasi Iuran Pensiun secara tertib dan bertanggung jawab.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-40">
                    <div class="card-step">
                        <div class="card-icon">
                            <svg width="27" height="35" viewBox="0 0 27 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.3208 18.8793C14.0668 18.8793 14.7959 18.6481 15.4161 18.2149C16.0364 17.7817 16.5198 17.166 16.8052 16.4457C17.0907 15.7253 17.1653 14.9327 17.0198 14.1679C16.8743 13.4032 16.5151 12.7008 15.9877 12.1494C15.4602 11.5981 14.7882 11.2227 14.0566 11.0705C13.325 10.9184 12.5667 10.9965 11.8776 11.2949C11.1884 11.5933 10.5994 12.0985 10.185 12.7468C9.77059 13.3951 9.5494 14.1573 9.5494 14.937C9.55068 15.9822 9.94844 16.9841 10.6554 17.7231C11.3625 18.4622 12.321 18.8779 13.3208 18.8793ZM13.3208 12.1211C13.8536 12.1211 14.3745 12.2863 14.8175 12.5957C15.2605 12.9051 15.6058 13.3449 15.8097 13.8594C16.0136 14.374 16.0669 14.9402 15.963 15.4864C15.859 16.0326 15.6025 16.5344 15.2257 16.9282C14.849 17.322 14.369 17.5902 13.8464 17.6988C13.3238 17.8075 12.7822 17.7517 12.2899 17.5386C11.7977 17.3254 11.377 16.9645 11.081 16.5015C10.7849 16.0384 10.627 15.494 10.627 14.937C10.6278 14.1905 10.9119 13.4748 11.4169 12.9469C11.9219 12.419 12.6066 12.122 13.3208 12.1211Z" fill="#F7A400" />
                                <path d="M1.07226 33.7764C1.13392 34.0097 1.26234 34.2177 1.4403 34.3725C1.61827 34.5274 1.83727 34.6216 2.06793 34.6426C2.10373 34.6464 2.13969 34.6483 2.17568 34.6482C2.38906 34.6484 2.59819 34.5859 2.7792 34.4678C2.96021 34.3497 3.1058 34.1808 3.19936 33.9803C4.04644 32.0337 5.35043 30.3425 6.9902 29.0638C7.19346 29.2841 7.45032 29.4424 7.73318 29.5216L8.17929 30.9611C8.30495 31.3781 8.5548 31.7422 8.89239 32.0002C9.22998 32.2582 9.63763 32.3968 10.0558 32.3955H11.6781C12.01 33.6846 12.5288 34.6482 13.3208 34.6482C14.1128 34.6482 14.6317 33.6846 14.9636 32.3955H16.5858C17.0035 32.397 17.4108 32.259 17.7481 32.0016C18.0855 31.7441 18.3354 31.3808 18.4613 30.9645L18.9085 29.5216C19.1912 29.4423 19.4478 29.284 19.6509 29.0638C21.2911 30.3423 22.5953 32.0336 23.4423 33.9803C23.5359 34.1809 23.6816 34.3498 23.8627 34.468C24.0438 34.5861 24.2531 34.6485 24.4665 34.6482C24.5025 34.6483 24.5385 34.6464 24.5743 34.6426C24.8048 34.6216 25.0237 34.5275 25.2016 34.3729C25.3795 34.2183 25.5081 34.0106 25.57 33.7776C26.3587 30.8935 27.5392 23.9434 21.8589 20.8194C21.9084 20.1509 21.9418 19.4762 21.9418 18.7954C21.9814 15.4424 21.3065 12.1222 19.9663 9.07569C18.6261 6.02914 16.654 3.33253 14.1931 1.18143C13.9473 0.971111 13.6393 0.856201 13.3217 0.856201C13.004 0.856201 12.696 0.971111 12.4502 1.18143C9.98907 3.3324 8.01678 6.02895 6.67635 9.07551C5.33592 12.1221 4.66095 15.4423 4.7004 18.7954C4.7004 19.4762 4.7338 20.1509 4.78337 20.8194C-0.896969 23.9434 0.282416 30.8935 1.07226 33.7764ZM10.0558 31.2692C9.86603 31.2696 9.68107 31.2065 9.52801 31.0892C9.37494 30.9718 9.2618 30.8064 9.20512 30.617L8.88401 29.5796H11.2455C11.2897 30.1428 11.3532 30.7161 11.4459 31.2692H10.0558ZM13.3208 33.5089C12.9787 33.2611 12.2433 31.348 12.2433 27.6085C12.2433 23.869 12.9787 21.9559 13.3208 21.7081C13.663 21.9559 14.3984 23.869 14.3984 27.6085C14.3984 31.348 13.663 33.2611 13.3208 33.5089ZM16.5858 31.2692H15.1958C15.2863 30.7161 15.352 30.1428 15.3962 29.5796H17.7577L17.4344 30.6204C17.3775 30.8089 17.2645 30.9735 17.1119 31.0902C16.9592 31.2069 16.7749 31.2696 16.5858 31.2692ZM24.5334 33.4695C24.5309 33.4842 24.5236 33.4976 24.5126 33.5072C24.5017 33.5168 24.4878 33.522 24.4735 33.5219C24.4665 33.524 24.4592 33.5246 24.452 33.5237C24.4447 33.5227 24.4377 33.5203 24.4315 33.5164C24.4252 33.5126 24.4197 33.5074 24.4153 33.5013C24.411 33.4952 24.4079 33.4882 24.4062 33.4808C23.4674 31.3309 22.0131 29.4711 20.1843 28.0816C20.9802 26.1576 21.5038 24.1227 21.7387 22.041C26.1174 24.7729 25.3965 30.3118 24.5334 33.4695ZM13.1263 2.05717C13.1815 2.0101 13.2505 1.98438 13.3217 1.98438C13.3928 1.98438 13.4618 2.0101 13.517 2.05717C15.1589 3.47459 16.5693 5.16174 17.693 7.05255H8.94866C10.0729 5.16171 11.4839 3.47456 13.1263 2.05717ZM8.31667 8.17891H18.325C20.0186 11.4355 20.8922 15.0888 20.8637 18.7954C20.9074 22.0086 20.2679 25.1919 18.9915 28.1154C18.9478 28.2143 18.8785 28.2984 18.7913 28.3582C18.7042 28.4179 18.6027 28.4509 18.4985 28.4533H15.4598C15.47 28.1587 15.476 27.8727 15.476 27.6085C15.476 24.9937 15.0218 20.5688 13.3208 20.5688C11.6199 20.5688 11.1657 24.9937 11.1657 27.6085C11.1657 27.8727 11.1717 28.1587 11.1819 28.4533H8.14319C8.03994 28.4513 7.93928 28.4191 7.85256 28.3605C7.76584 28.3019 7.6965 28.2192 7.65236 28.1216C6.3744 25.1963 5.73417 22.0109 5.77795 18.7954C5.74945 15.0888 6.62306 11.4355 8.31667 8.17891ZM4.9019 22.0404C5.13711 24.1221 5.66072 26.1569 6.45627 28.081C4.62751 29.4705 3.17322 31.3304 2.23441 33.4802C2.22633 33.496 2.21986 33.5332 2.16706 33.5213C2.1528 33.5211 2.13908 33.5156 2.12833 33.5058C2.11758 33.496 2.1105 33.4826 2.10833 33.4678C1.24521 30.3118 0.524327 24.7729 4.9019 22.0404Z" fill="#F7A400" />
                            </svg>
                        </div>
                        <div class="card-info">
                            <h5>Visi 3: Mengelola dana pensiun secara optimal dan aman sesuai kebijakan investasi.</h5>
                            <p class="text-justify">Mengelola kekayaan Dana Pensiun secara optimal dan aman melalui kebijakan investasi sesuai dengan Arahan Investasi oleh Pendiri bersama Dewan Pengawas.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 mb-40">
                    <div class="card-step">
                        <div class="card-icon">
                            <div class="icon">
                                <i class="flaticon-profit" style="color: #F7A400;"></i>
                            </div>
                        </div>
                        <div class=" card-info">
                            <h5>Visi 4: Membayar manfaat pensiun sebagai penghasilan berkelanjutan.</h5>
                            <p class="text-justify">Membayarkan manfaat pensiun sebagai sumber penghasilan yang berkesinambungan bagi peserta atau pihak yang berhak setelah peserta tidak bekerja lagi</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Step area -->
</main>
<!-- main-area-end -->