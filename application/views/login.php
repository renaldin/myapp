<!-- Header -->
<?php $this->load->view('partials/header'); ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?= base_url(); ?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Login</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-6 col-lg-8 col-xl-7">

                    <?= $this->session->flashdata('message'); ?>

                    <?= form_open(); ?>
                        <div class="form-group">
                            <label for="usernama">Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="passwprd">Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Login</button>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>