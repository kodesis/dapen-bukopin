<!-- main-area -->
<main class="fix">
    <!-- breadcrumb-area -->
    <section class="breadcrumb__area breadcrumb__bg" data-background="<?= base_url() ?>/assets/user/img/bg/breadcrumb_bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb__content">
                        <h2 class="title">Detail Formulir</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Detail Formulir</li>
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
                            <h2 class="title">Detail Formulir</h2>
                        </div>
                        <div class="about__img-wrap-five text-center">
                            <embed
                                src="<?= $data ?>"
                                width="60%"
                                height="900px"
                                type="application/pdf"
                                style="border: none;">
                            </embed>
                        </div>
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