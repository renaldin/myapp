<!-- Header -->
<?php $this->load->view('partials/header'); ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('<?= base_url(); ?>assets/assets/img/home-bg.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Wellcome, go reading!!</h1>
                            <span class="subheading">Teknologi baca is article website.</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">

                    <?= $this->session->flashdata('message'); ?>

                    <form method="GET">
                        <div class="form-group">
                            <input type="text" name="find">
                            <button class="btn-primary" type="submit">Cari</button>
                        </div>
                    </form>

                    <!-- Post preview-->
                    <?php foreach ($blogs as $key => $row) : ?>
                    <div class="post-preview">
                        <a href="<?= site_url('blog/detail/' . $row['url']); ?>">
                            <h2 class="post-title"><?= $row['title']; ?></h2>
                        </a>
                        <p class="post-meta">
                            Posted on <?= $row['date']; ?>

                            <?php if (isset($_SESSION['username'])) : ?>
                                <a class="btn btn-success btn-sm" href="<?= site_url('blog/edit/' . $row['id']); ?>">Edit</a>
                                <a class="btn btn-danger btn-sm" href="<?= site_url('blog/delete/' . $row['id']); ?>" onclick="return confirm('Sure you want to delete ?')">Delete</a>
                            <?php endif; ?>
                        </p>
                        <p>
                            <?= $row['content']; ?>
                        </p>
                    </div>
                    <!-- Divider-->
                    <hr class="my-4" />
                    <?php endforeach; ?>

                    <?= $this->pagination->create_links();?>
                </div>
            </div>
        </div>

<!-- Footer -->
<?php $this->load->view('partials/footer'); ?>      