<!-- main-area -->
<main class="fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="<?= base_url() ?>/assets/user/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Tentang Kami</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Beranda</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tentang Kami</li>
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
    <!-- about-area -->
    <section class="about__area-five">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about__content-five">
                        <div class="section-title mb-30">
                            <h2 class="title">Pengertian <br> <span>dari</span> Program Pensiun <span>Bank KB Bukopin</span></h2>
                        </div>
                        <div class="about__img-wrap-five text-center">
                            <div style="background-color: #f5c42c;">
                                <img class="img-fluid" src="<?= base_url() ?>/assets/user/img/images/PPIP.jpg"
                                    style="max-height: 600px;" alt="">
                            </div>
                            <div class="experience-year">
                                <div class="icon">
                                    <i class="flaticon-trophy"></i>
                                </div>
                                <div class="content">
                                    <!-- <h6 class="circle rotateme">Years Of - Experience 25 -</h6> -->
                                    <h6 class="circle rotateme">Pensiun With KBBukopin -</h6>
                                </div>
                            </div>
                        </div>
                        <h3 style="text-align: center;">
                            Pengertian
                        </h3>
                        <p style="text-align: center;">
                            Program Pensiun Iuran Pasti (PPIP) adalah program pensiun yang iurannya ditetapkan dalam peraturan Dana Pensiun dan seluruh iuran serta hasil pengembangannya dibukukan pada rekening masing-masing peserta sebagai manfaat pensiun
                            <br>
                        </p>
                        <p style="text-align: center;">
                            (UU Nomor 4 Tahun 2023 Tentang Pengembangan dan Penguatan Sektor Keuangan).
                        </p>
                        <br>
                        <br>
                        <h3 style="text-align: center;">
                            Esensi
                        </h3>
                        <p style="text-align: center;">
                            Dari perencanaan suatu program pensiun, adalah mengalokasikan sebagian penghasilan sekarang dalam bentuk Iuran untuk diakumulasi berikut hasil pengembangannya sebagai manfaat pensiun sehingga diharapkan tercapai suatu kesinambungan penghasilan bagi pesertanya setelah karyawan yang bersangkutan menjalani masa pensiun. </p>
                        <br>
                        <br>
                        <h3 style="text-align: center;">
                            Perencanaan Program
                        </h3>
                        <p style="text-align: center;">
                            Perencanaan suatu Program Pensiun Iuran Pasti mempunyai dua komitmen dasar bagi pemberi kerja yaitu adanya komitmen pemberi kerja untuk menjaga kesinambungan penghasilan pekerja dalam bentuk pemberian uang pensiun bagi pekerjanya pada masa purna bakti dan komitmen pemberi kerja untuk melakukan pengiuran atas nama pekerja selama pekerja berada pada masa bakti. Dua komitmen ini sangat relevan satu sama lain karena tanpa pengiuran yang rasional tidak akan mungkin dicapai objektif "menjaga kesinambungan penghasilan".
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about-area-end -->
</main>
<!-- main-area-end -->

<script>
    const text = document.querySelector('.circle');
    text.innerHTML = text.textContent.replace(/\S/g, "<span>$&</span>");
    const element = document.querySelectorAll('.circle span');
    for (let i = 0; i < element.length; i++) {
        element[i].style.transform = "rotate(" + i * 17 + "deg)"
    }
</script>