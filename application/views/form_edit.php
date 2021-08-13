<?php $this->load->view('partials/header'); ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/post-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="post-heading">
                        <h1>Edit Article</h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>Edit Article</h1>

                <div class="alert alert-warning">
                    <?= validation_errors(); ?>
                </div>
                <?= form_open_multipart(); ?>
                    <div class="form-group">
                        <label>Title</label>
                        <?= form_input('title', set_value('title', $blog['title']), 'class="form-control"'); ?>
                    </div>

                    <div class="form-group">
                        <label>URL</label>
                        <?= form_input('url', set_value('url', $blog['url']), 'class="form-control"'); ?>
                    </div>

                    <div class="form-group">
                        <label>Content</label>
                        <?= form_textarea('content', set_value('content', $blog['content']), 'class="form-control"'); ?>
                    </div>
                    <div class="form-group">
                        <label>Cover</label>
                        <?= form_upload('cover', set_value('cover', $blog['cover']), 'class="form-control"'); ?>
                    </div>
                    <br>
                    <button class="btn btn-primary" type="submit">Save Article</button>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

<?php $this->load->view('partials/footer'); ?>