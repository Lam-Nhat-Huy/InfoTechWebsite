<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Edit Product</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <?php if(!empty($data['product'])):?>
                    <?php foreach($data['product'] as $item):?>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="name" placeholder="Name product..." class="form-control" value="<?= $item['name']?>">
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
                        <label for="select" class=" form-control-label">Select</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <select name="category" id="select" class="form-control">
                            <?php if (!empty($data['category'])) { ?>
                                <?php foreach ($data['category'] as $data) : ?>
                                    <option <?= (isset($_GET['category_id']) && $_GET['category_id'] === $data['id']) ? 'selected' : '' ?> value="<?= $data['id']?>"><?= $data['name'] ?></option>
                                <?php endforeach ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="email-input" class=" form-control-label">Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="email-input" name="price" placeholder="Price product" class="form-control" value="<?= $item['price']?>">
                        <small class="help-block form-text">Please enter your email</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Sale price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="password-input" name="sale_price" placeholder="Sale price" class="form-control" value="<?= $item['sale_price']?>"> 
                        <small class="help-block form-text">Please enter a complex password</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Content</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="content" id="textarea-input" rows="9" placeholder="Content..." class="form-control" ><?= $item['content']?></textarea>
                    </div>
                </div> 
                 <input type="hidden" value="<?=$item['image']?>" name="thumbnail">
                <?php endforeach?>
                <?php endif?>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> Submit
            </button>
            <a href="/product/list/" type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Back
            </a>
        </div>
        </form>
    </div>
</div>