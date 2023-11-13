<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit Post</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php foreach ($data['post'] as $data) : ?>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="text-input" class=" form-control-label">Title</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="text-input" name="title" placeholder="Name product..." class="form-control" value=" <?= $data['title'] ?> ">
                            <small class="form-text text-muted">This is a help text</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="file-input" class=" form-control-label">Image</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="file" id="file-input" name="image" class="form-control-file">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="textarea-input" class=" form-control-label">Content</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="content" id="textarea-input" rows="9" placeholder="Content..." class="form-control"> <?= $data['content'] ?></textarea>
                        </div>
                    </div>
                <?php endforeach ?>
                <input type="hidden" value="<?= $data['image'] ?>" name="thumbnail">
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <a href="/post/list/" type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Back
            </a>
        </div>
        </form>
    </div>
</div>