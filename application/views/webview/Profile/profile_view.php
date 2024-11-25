<style>
    .hidden {
        display: none;
    }
</style>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Account Profile</h3>
                <!-- <p class="text-subtitle text-muted">A page where users can change profile information</p> -->
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item">Account</li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <!-- <div class="col-12 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="avatar avatar-2xl">
                                <img src="./assets/compiled/jpg/2.jpg" alt="Avatar">
                            </div>

                            <h3 class="mt-3">John Doe</h3>
                            <p class="text-small">Junior Software Engineer</p>
                        </div>
                    </div>
                </div>
            </div> -->
            <div class="col-12 col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form id="profile_form">
                            <div class="form-group">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Your Name" value="<?= $profile->nama ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">NIP</label>
                                <input type="text" readonly name="nip" id="nip" class="form-control" placeholder="Your NIP  " value="<?= $profile->kd_peserta ?>">
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="<?= $profile->email ?>">
                            </div>
                            <div class="form-group">
                                <label for="birthday" class="form-label">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat"><?= $profile->alamat ?></textarea>
                            </div>
                            <div class="form-check mb-2">
                                <div class="checkbox">
                                    <input type="checkbox" name="ganti_password" id="ganti_password" onchange="ganti_password_form()" class="form-check-input">
                                    <label for="checkbox1">Ganti Password?</label>
                                </div>
                            </div>
                            <div class="hidden" id="form_password">
                                <div class="form-group">
                                    <label for="email" class="form-label">Password</label>
                                    <input type="password" name="password1" id="password1" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="form-label">Konfirmasi Password</label>
                                    <input type="password" name="password2" id="password2" class="form-control">
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <button type="button" onclick="update_profile()" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>