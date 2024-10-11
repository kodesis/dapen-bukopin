<!-- main-area -->
<main class="fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="<?= base_url() ?>/assets/user/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">About Us</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About</li>
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
                            <h2 class="title">Pengertian <br> <span>dari</span> Program Pensiun <span>Bank Bukopin</span></h2>
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
                                    <h6 class="circle rotateme">Pensiun Dengan Bukopin -</h6>
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
                            (Pasal 1 Angka 8 UU Nomor 11 Tahun 1992 Tentang Dana Pensiun).
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
                            Peraturan Dana Pensiun Bank Bukopin yang terakhir telah diubah dengan Keputusan Direksi PT. Bank Bukopin Tbk Nomor : KEP.2284/DIR/XI/2017 dan telah disahkan oleh Otoritas Jasa Keuangan dengan Surat Keputusan Dewan Komisioner Otoritas Jasa Keuangan Nomor : KEP-14/NB.11/2018 tanggal 24 Januari 2018. </p>
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