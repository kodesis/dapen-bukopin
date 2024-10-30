        <!-- <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->
        <style>
            /* Optional: Adjust the aspect ratio for smaller devices */
            @media (max-width: 768px) {
                .responsive-embed embed {
                    width: 350px;
                    height: 100%;
                }

                .section-embed {
                    height: 500px;
                }
            }
        </style>
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Detail File</h3>
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
                <div class="card" style="height: 100vh;">
                    <!-- <div class="responsive-embed"> -->
                    <?php
                    if (!empty($data_file)) {
                    ?>
                        <embed type="application/pdf" src="<?= $data_file ?>" width="100%" height="100%">
                    <?php
                    } else {
                    ?>
                        <h2>FILE TIDAK ADA</h2>
                    <?php
                    }
                    ?>
                    <!-- </div> -->
                </div>

            </section>
            <!-- Basic Tables end -->
        </div>