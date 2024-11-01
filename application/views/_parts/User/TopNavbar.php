<body>
    <!--Preloader-->
    <!-- <div id="preloader">
        <div id="loader" class="loader">
            <div class="loader-container">
                <div class="loader-icon"><img src="<?= base_url() ?>/assets/user/img/logo/dapenbukopin_lg1.png" alt="Preloader"></div>
            </div>
        </div>
    </div> -->
    <!--Preloader-end -->
    <!-- Floating Social Media Share Buttons -->
    <div class="floating-share-buttons">
        <button class="share-button" id="shareButton">
            <i class="fas fa-share-alt"></i> <!-- Font Awesome share icon -->
        </button>
        <ul class="social-media-list" id="socialMediaList">
            <li>
                <a href="https://www.facebook.com/Dana-Pensiun-Bank-KB-Bukopin-103430788837798/" target="_blank" class="share-button facebook">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/dapen_kbbukopin/" target="_blank" class="share-button instagram">
                    <i class="fab fa-instagram"></i>
                </a>
            </li>
            <!-- <li>
                <a href="https://www.linkedin.com/shareArticle?mini=true&url=YOUR_URL" target="_blank" class="share-button linkedin">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </li> -->
            <li>
                <a href="https://api.whatsapp.com/message/EXLTRFFRPD6MD1" target="_blank" class="share-button whatsapp">
                    <i class="fab fa-whatsapp"></i>
                </a>
            </li>
        </ul>
    </div>
    <!-- Floating Social Media Share Buttons END -->
    <!-- Scroll-top -->
    <button class="scroll__top scroll-to-target" data-target="html">
        <i class="fas fa-angle-up"></i>
    </button>
    <!-- Scroll-top-end-->
    <!-- header-area -->
    <header class="tg-header__style-five">
        <div class="tg-header__top">
            <div class="container custom-container">
                <div class="running-text">
                    <?php

                    $this->db->select('*');
                    $this->db->from('running_text');
                    $this->db->where('active', 1);
                    $this->db->where('lokasi', 'Landing');
                    $running_text =  $this->db->get()->result();
                    if (isset($running_text) || !(empty($running_text))) {
                    ?>
                        <marquee behavior="scroll" style="color:#fff" direction="left">
                            <?php
                            foreach ($running_text as $rt) {
                                echo $rt->text . ' || ';
                            }
                            ?>
                        </marquee>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div id="sticky-header" class="tg-header__area tg-header__area-five">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tgmenu__wrap">
                            <nav class="tgmenu__nav">
                                <div class="logo">
                                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/user/img/logo/dapenbukopin_lg1.png" alt="Logo"></a>
                                </div>
                                <?php
                                $url = $this->uri->segment(1)
                                ?>
                                <div class="tgmenu__navbar-wrap tgmenu__main-menu d-none d-lg-flex">
                                    <ul class="navigation">
                                        <li class="<?php if ($url == "") {
                                                        echo "active";
                                                    } ?>"><a href="<?= base_url() ?>">Beranda</a>
                                        </li>
                                        <li class="menu-item-has-children <?php if ($url == "AboutUs") {
                                                                                echo "active";
                                                                            } ?>"><a href="#">Tentang</a>
                                            <ul class="sub-menu">
                                                <li><a href="<?= base_url('AboutUs/VisiDanMisi') ?>">Visi Dan Misi</a></li>
                                                <li><a href="<?= base_url('AboutUs/Sejarah') ?>">Sejarah</a></li>
                                                <li><a href="<?= base_url('AboutUs/ProgramPensiun') ?>">Program Pensiun</a></li>
                                                <li><a href="<?= base_url('AboutUs/Team') ?>">Pengurus dan Dewan Pengawas</a></li>
                                            </ul>
                                        </li>
                                        </li>
                                        <li class="<?php if ($url == "Peraturan") {
                                                        echo "active";
                                                    } ?>"><a href="<?= base_url('Peraturan') ?>">Peraturan</a>
                                        </li>
                                        <!-- <li class="<?php if ($url == "Formulir_Permohonan") {
                                                            echo "active";
                                                        } ?>"><a href="<?= base_url('Formulir_Permohonan') ?>">Formulir Permohonan</a></li>
                                        <li class="<?php if ($url == "Formulir_Iuran") {
                                                        echo "active";
                                                    } ?>"><a href="<?= base_url('Formulir_Iuran') ?>">Formulir Iuran</a></li> -->
                                        <li class="<?php if ($url == "Formulir") {
                                                        echo "active";
                                                    } ?>"><a href="<?= base_url('Formulir') ?>">Formulir</a></li>
                                        <li class="<?php if ($url == "Buku_Layanan") {
                                                        echo "active";
                                                    } ?>"><a href="<?= base_url('Buku_Layanan') ?>">Buku Layanan Kepesertaan</a></li>
                                        <!-- <li><a class="btn">Saldo Peserta</a> -->
                                        <!-- <li class="header-btn-two"><a href="<?= base_url('SaldoUser') ?>" class="btn border-btn">Saldo Peserta</a></li> -->
                                    </ul>
                                </div>
                                <div class="tgmenu__action tgmenu__action-five d-none d-md-block">
                                    <ul class="list-wrap">
                                        <li class="header-btn"><a href="<?= base_url('auth') ?>" class="btn">Login</a></li>
                                        <!-- <li class="header-btn"><a href="<?= base_url('dashboard') ?>" class="btn">Saldo Peserta</a></li> -->
                                        <!-- <li class="header-btn"><a href="<?= base_url('SaldoUser') ?>" class="btn">Saldo Peserta</a></li> -->
                                    </ul>
                                </div>
                                <div class="mobile-nav-toggler mobile-nav-toggler-two">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18" fill="none">
                                        <path d="M0 2C0 0.895431 0.895431 0 2 0C3.10457 0 4 0.895431 4 2C4 3.10457 3.10457 4 2 4C0.895431 4 0 3.10457 0 2Z" fill="currentcolor" />
                                        <path d="M0 9C0 7.89543 0.895431 7 2 7C3.10457 7 4 7.89543 4 9C4 10.1046 3.10457 11 2 11C0.895431 11 0 10.1046 0 9Z" fill="currentcolor" />
                                        <path d="M0 16C0 14.8954 0.895431 14 2 14C3.10457 14 4 14.8954 4 16C4 17.1046 3.10457 18 2 18C0.895431 18 0 17.1046 0 16Z" fill="currentcolor" />
                                        <path d="M7 2C7 0.895431 7.89543 0 9 0C10.1046 0 11 0.895431 11 2C11 3.10457 10.1046 4 9 4C7.89543 4 7 3.10457 7 2Z" fill="currentcolor" />
                                        <path d="M7 9C7 7.89543 7.89543 7 9 7C10.1046 7 11 7.89543 11 9C11 10.1046 10.1046 11 9 11C7.89543 11 7 10.1046 7 9Z" fill="currentcolor" />
                                        <path d="M7 16C7 14.8954 7.89543 14 9 14C10.1046 14 11 14.8954 11 16C11 17.1046 10.1046 18 9 18C7.89543 18 7 17.1046 7 16Z" fill="currentcolor" />
                                        <path d="M14 2C14 0.895431 14.8954 0 16 0C17.1046 0 18 0.895431 18 2C18 3.10457 17.1046 4 16 4C14.8954 4 14 3.10457 14 2Z" fill="currentcolor" />
                                        <path d="M14 9C14 7.89543 14.8954 7 16 7C17.1046 7 18 7.89543 18 9C18 10.1046 17.1046 11 16 11C14.8954 11 14 10.1046 14 9Z" fill="currentcolor" />
                                        <path d="M14 16C14 14.8954 14.8954 14 16 14C17.1046 14 18 14.8954 18 16C18 17.1046 17.1046 18 16 18C14.8954 18 14 17.1046 14 16Z" fill="currentcolor" />
                                    </svg>
                                </div>
                            </nav>
                        </div>
                        <!-- Mobile Menu  -->
                        <div class="tgmobile__menu">
                            <nav class="tgmobile__menu-box">
                                <div class="close-btn"><i class="fas fa-times"></i></div>
                                <div class="nav-logo">
                                    <a href="<?= base_url() ?>"><img src="<?= base_url() ?>/assets/user/img/logo/dapenbukopin_lg1.png" alt="Logo"></a>
                                </div>
                                <div class="tgmobile__search">
                                    <!-- <form action="#">
                                        <input type="text" placeholder="Search here...">
                                        <button><i class="fas fa-search"></i></button>
                                    </form> -->
                                    <a href="<?= base_url('auth') ?>" class="btn">Login</a>
                                </div>
                                <div class="tgmobile__menu-outer">
                                    <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                                </div>
                                <div class="tgmobile__menu-bottom">
                                    <div class="contact-info">
                                        <ul class="list-wrap">
                                            <!-- <li><a href="mailto:info@apexa.com">info@apexa.com</a></li>
                                            <li><a href="tel:0123456789">+123 888 9999</a></li> -->
                                        </ul>
                                    </div>
                                    <div class="social-links">
                                        <ul class="list-wrap">
                                            <li><a href="https://www.facebook.com/Dana-Pensiun-Bank-KB-Bukopin-103430788837798/"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="https://www.instagram.com/dapen_kbbukopin/"><i class="fab fa-instagram"></i></a></li>
                                            <li><a href="https://api.whatsapp.com/message/EXLTRFFRPD6MD1"><i class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                        </div>
                        <div class="tgmobile__menu-backdrop"></div>
                        <!-- End Mobile Menu -->
                    </div>
                </div>
            </div>
        </div>
    </header>
    <script>
        document.getElementById("shareButton").addEventListener("click", function() {
            const socialMediaList = document.getElementById("socialMediaList");
            if (socialMediaList.style.display === "none" || socialMediaList.style.display === "") {
                socialMediaList.style.display = "block"; // Show social media buttons
            } else {
                socialMediaList.style.display = "none"; // Hide social media buttons
            }
        });
    </script>
    <!-- header-area-end -->