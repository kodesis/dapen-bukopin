        <!-- <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header> -->
        <style>
            .text-right {
                text-align: right !important;
            }

            .info-container {
                font-family: Arial, sans-serif;
                line-height: 1.5;
                /* Improved readability */
            }

            .info-item {
                display: flex;
                align-items: center;
                margin-bottom: 8px;
                /* Space between items */
            }

            .info-item svg {
                margin-right: 8px;
                /* Space between icon and text */
                fill: green;
                /* Color of the icon */
            }

            .info-label {
                min-width: 100px;
                /* Minimum width for the labels */
                font-weight: bold;
                /* Make the labels bold */
            }

            .info-value {
                flex: 1;
                /* Allow the value to take the remaining space */
            }
        </style>

        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Saldo User</h3>
                        <p class="text-subtitle text-muted">Powerful interactive tables with datatables (jQuery required).</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Saldo User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Masukan Tanggal</h4>
                    </div>

                    <div class="card-body">
                        <form id="cari_bulan_form">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="basicInput">Bulan</label>
                                        <fieldset class="form-group">
                                            <select class="form-select" id="bulan_cari" name="bulan_cari">
                                                <option selected disabled>-- Pilih Bulan --</option>
                                                <option value="1">Januari</option>
                                                <option value="2">Februari</option>
                                                <option value="3">Maret</option>
                                                <option value="4">April</option>
                                                <option value="5">Mei</option>
                                                <option value="6">Juni</option>
                                                <option value="7">Juli</option>
                                                <option value="8">Agustus</option>
                                                <option value="9">September</option>
                                                <option value="10">Oktober</option>
                                                <option value="11">November</option>
                                                <option value="12">Desember</option>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="disabledInput">Tahun</label>
                                        <input type="number" class="form-control" id="tahun_cari" name="tahun_cari" placeholder="Masukan Tahun" min="2020" max="2500">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="col-sm-12 d-flex justify-content-end mt-2">
                            <button onclick="submitcari()" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button onclick="resetcari()"
                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <section class="section fade" id="tab_ketemu">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title"><?= $this->session->userdata('name') ?></h2>
                    <div class="info-container">
                        <table style="width:25%; border-collapse: collapse;">
                            <tr>
                                <td>
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" height="20">
                                            <path fill="#f7a400" d="M512 80c8.8 0 16 7.2 16 16l0 32L48 128l0-32c0-8.8 7.2-16 16-16l448 0zm16 144l0 192c0 8.8-7.2 16-16 16L64 432c-8.8 0-16-7.2-16-16l0-192 480 0zM64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm56 304c-13.3 0-24 10.7-24 24s10.7 24 24 24l48 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-48 0zm128 0c-13.3 0-24 10.7-24 24s10.7 24 24 24l112 0c13.3 0 24-10.7 24-24s-10.7-24-24-24l-112 0z" />
                                        </svg>
                                    </i>
                                </td>
                                <td><strong>NIK</strong></td>
                                <td>
                                    :
                                </td>
                                <td><span id="nik_user"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20">
                                            <path fill="#f7a400" d="M384 48c8.8 0 16 7.2 16 16l0 384c0 8.8-7.2 16-16 16L96 464c-8.8 0-16-7.2-16-16L80 64c0-8.8 7.2-16 16-16l288 0zM96 0C60.7 0 32 28.7 32 64l0 384c0 35.3 28.7 64 64 64l288 0c35.3 0 64-28.7 64-64l0-384c0-35.3-28.7-64-64-64L96 0zM240 256a64 64 0 1 0 0-128 64 64 0 1 0 0 128zm-32 32c-44.2 0-80 35.8-80 80c0 8.8 7.2 16 16 16l192 0c8.8 0 16-7.2 16-16c0-44.2-35.8-80-80-80l-64 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64zM496 192c-8.8 0-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16l0 64c0 8.8 7.2 16 16 16s16-7.2 16-16l0-64z" />
                                        </svg>
                                    </i>
                                </td>
                                <td><strong>Alamat</strong></td>
                                <td>
                                    <p>:</p>
                                </td>
                                <td><span id="alamat_user"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" height="20">
                                            <path fill="#f7a400" d="M86.4 5.5L61.8 47.6C58 54.1 56 61.6 56 69.2L56 72c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L105.6 5.5C103.6 2.1 100 0 96 0s-7.6 2.1-9.6 5.5zm128 0L189.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L233.6 5.5C231.6 2.1 228 0 224 0s-7.6 2.1-9.6 5.5zM317.8 47.6c-3.8 6.5-5.8 14-5.8 21.6l0 2.8c0 22.1 17.9 40 40 40s40-17.9 40-40l0-2.8c0-7.6-2-15-5.8-21.6L361.6 5.5C359.6 2.1 356 0 352 0s-7.6 2.1-9.6 5.5L317.8 47.6zM128 176c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48c-35.3 0-64 28.7-64 64l0 71c8.3 5.2 18.1 9 28.8 9c13.5 0 27.2-6.1 38.4-13.4c5.4-3.5 9.9-7.1 13-9.7c1.5-1.3 2.7-2.4 3.5-3.1c.4-.4 .7-.6 .8-.8l.1-.1s0 0 0 0s0 0 0 0s0 0 0 0s0 0 0 0c3.1-3.2 7.4-4.9 11.9-4.8s8.6 2.1 11.6 5.4c0 0 0 0 0 0s0 0 0 0l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c3-3.5 7.4-5.4 12-5.4s9 2 12 5.4l.1 .1c.1 .1 .4 .4 .7 .7c.7 .7 1.7 1.7 3.1 3c2.8 2.6 6.8 6.1 11.8 9.5c10.2 7.1 23 13.1 36.3 13.1s26.1-6 36.3-13.1c5-3.5 9-6.9 11.8-9.5c1.4-1.3 2.4-2.3 3.1-3c.3-.3 .6-.6 .7-.7l.1-.1c2.9-3.4 7.1-5.3 11.6-5.4s8.7 1.6 11.9 4.8c0 0 0 0 0 0s0 0 0 0s0 0 0 0l.1 .1c.2 .2 .4 .4 .8 .8c.8 .7 1.9 1.8 3.5 3.1c3.1 2.6 7.5 6.2 13 9.7c11.2 7.3 24.9 13.4 38.4 13.4c10.7 0 20.5-3.9 28.8-9l0-71c0-35.3-28.7-64-64-64l0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 48-64 0 0-48zM448 394.6c-8.5 3.3-18.2 5.4-28.8 5.4c-22.5 0-42.4-9.9-55.8-18.6c-4.1-2.7-7.8-5.4-10.9-7.8c-2.8 2.4-6.1 5-9.8 7.5C329.8 390 310.6 400 288 400s-41.8-10-54.6-18.9c-3.5-2.4-6.7-4.9-9.4-7.2c-2.7 2.3-5.9 4.7-9.4 7.2C201.8 390 182.6 400 160 400s-41.8-10-54.6-18.9c-3.7-2.6-7-5.2-9.8-7.5c-3.1 2.4-6.8 5.1-10.9 7.8C71.2 390.1 51.3 400 28.8 400c-10.6 0-20.3-2.2-28.8-5.4L0 480c0 17.7 14.3 32 32 32l384 0c17.7 0 32-14.3 32-32l0-85.4z" />
                                        </svg>
                                    </i>
                                </td>
                                <td><strong>Tanggal Lahir</strong></td>
                                <td>
                                    <p>:</p>
                                </td>
                                <td><span id="tgl_lahir_user"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <i>
                                        <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                                <path fill="#f7a400" d="M64 32C28.7 32 0 60.7 0 96l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 32zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 288zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                            </svg></i>
                                    </i>
                                </td>
                                <td><strong>Tgl. Masuk Kerja </strong></td>
                                <td>
                                    <p>:</p>
                                </td>
                                <td><span id="pegawai_user"></span></td>
                            </tr>
                            <tr>
                                <td>
                                    <i><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" height="20"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path fill="#f7a400" d="M64 32C28.7 32 0 60.7 0 96l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 32zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm48 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0zM64 288c-35.3 0-64 28.7-64 64l0 64c0 35.3 28.7 64 64 64l384 0c35.3 0 64-28.7 64-64l0-64c0-35.3-28.7-64-64-64L64 288zm280 72a24 24 0 1 1 0 48 24 24 0 1 1 0-48zm56 24a24 24 0 1 1 48 0 24 24 0 1 1 -48 0z" />
                                        </svg></i>
                                </td>
                                <td><strong>Tgl. Kepesertaan </strong></td>
                                <td>
                                    <p>:</p>
                                </td>
                                <td><span id="peserta_user"></span></td>
                            </tr>
                        </table>
                    </div>
                    <br>
                    <h2 class="card-title">SALDO PESERTA : <span id="tanggal_hasil"></span></h2>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="" style="border: 3px;">
                            <thead>
                                <tr>
                                    <th width="40%" class="text-right"></th>
                                    <th width="20%" class="text-right">Pemberi Kerja</th>
                                    <th width="20%" class="text-right">Peserta</th>
                                    <th width="20%" class="text-right">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Saldo Awal</td>
                                    <td id="saldo_awal_1" class="text-right"></td>
                                    <td id="saldo_awal_2" class="text-right"></td>
                                    <td id="saldo_awal_3" class="text-right"></td>
                                </tr>
                                <tr>
                                    <td>Iuran Pensiun Bulan Ini</td>
                                    <td id="iuran_1" class="text-right"></td>
                                    <td id="iuran_2" class="text-right"></td>
                                    <td id="iuran_3" class="text-right"></td>
                                </tr>
                                <tr>
                                    <td>Hasil Pengembangan Bulan Ini</td>
                                    <td id="hasil_1" class="text-right"></td>
                                    <td id="hasil_2" class="text-right"></td>
                                    <td id="hasil_3" class="text-right"></td>
                                </tr>
                                <tr>
                                    <td>Saldo Akhir</td>
                                    <td id="saldo_akhir_1" class="text-right"></td>
                                    <td id="saldo_akhir_2" class="text-right"></td>
                                    <td id="saldo_akhir_3" class="text-right"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>