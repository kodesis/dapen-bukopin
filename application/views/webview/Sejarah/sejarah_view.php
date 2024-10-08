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
                            <h2 class="title">Sejarah <br> <span>dari</span> Dana Pensiun <span>Bank Bukopin</span></h2>
                        </div>
                        <div class="about__img-wrap-five">
                            <img src="<?= base_url() ?>/assets/user/img/images/inner02_about_img.jpg" alt="">
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
                            1987
                        </h3>
                        <p style="text-align: center;">
                            Dana Pensiun Bank Bukopin merupakan kelanjutan dari Yayasan Dana Pensiun Karyawan Bank Umum Koperasi Indonesia yang dibentuk berdasarkan akta Nomor 94 tanggal 19 Maret 1987 Notaris Muhani Salim, SH dengan nama Yayasan Dana Pensiun Karyawan Bank Umum Koperasi Indonesia, yang pembentukan dananya telah mendapat persetujuan dari Menteri berdasarkan surat Nomor S.721/MK.11/1987 tanggal 2 Oktober 1987, kemudian disesuaikan dengan Undang-Undang Dana Pensiun dengan surat pengesahan dengan surat pengesahan berdasarkan Keputusan Menteri Nomor : Kep-185/KM.17/1995 tanggal 4 Juli 1995.
                        </p>
                        <br>
                        <br>
                        <h3 style="text-align: center;">
                            2014
                        </h3>
                        <p style="text-align: center;">
                            Awal bulan Juni 2014 tepatnya mulai tanggal 3 Juni 2014 Dana Pensiun Bank Bukopin berubah program dari program Manfaat Pasti menjadi program Iuran Pasti. Peserta program pensiun Iuran Pasti ini merupakan lanjutan dari program pensiun yang sebelumnya dengan program Manfaat Pasti. </p>
                        <br>
                        <br>
                        <h3 style="text-align: center;">
                            2018
                        </h3>
                        <p style="text-align: center;">
                            Peraturan Dana Pensiun Bank Bukopin yang terakhir telah diubah dengan Keputusan Direksi PT. Bank Bukopin Tbk Nomor : KEP.2284/DIR/XI/2017 dan telah disahkan oleh Otoritas Jasa Keuangan dengan Surat Keputusan Dewan Komisioner Otoritas Jasa Keuangan Nomor : KEP-14/NB.11/2018 tanggal 24 Januari 2018. </p>
                        <br>
                        <br>
                        <h3 style="text-align: center;">
                            2022
                        </h3>
                        <p style="text-align: center;">
                            Peraturan Dana Pensiun Bank KB Bukopin yang terakhir telah diubah dengan Keputusan Direksi PT. Bank KB Bukopin Tbk Nomor 0084 Tahun 2022 tanggal 01 Agustus 2022 dan telah disahkan oleh Otoritas Jasa Keuangan dengan Surat Keputusan Dewan Komisioner Otoritas Jasa Keuangan Nomor : KEP-720/NB.11/2022 tanggal 15 November 2022. </p>
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