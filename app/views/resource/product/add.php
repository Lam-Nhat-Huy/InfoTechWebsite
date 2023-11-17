<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <strong>Add Product</strong>
        </div>
        <div class="card-body card-block">
            <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="text-input" class=" form-control-label">Name</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="text-input" name="name" placeholder="Name product..." class="form-control">
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
                            <?php if (!empty($data['category'])) : ?>
                                <?php foreach ($data['category'] as $item) : ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach ?>
                            <?php endif ?>
                        </select>
                    </div>
                </div>
                <div id="product_attr">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="color-input" class="form-control-label">Option</label>
                        </div>
                        <div class="col-12 col-md-3">
                            <label for="" class="mr-2">Color</label>
                            <select name="color[]" id="select">
                                <?php if (!empty($data['color'])) : ?>
                                    <?php foreach ($data['color'] as $color) : ?>
                                        <option value="<?= $color['id'] ?>"><?= $color['name'] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-2">
                            <label for="" class="mr-2">Ram</label>
                            <select name="ram[]" id="">
                                <?php if (!empty($data['ram'])) : ?>
                                    <?php foreach ($data['ram'] as $ram) : ?>
                                        <option value="<?= $ram['id'] ?>"><?= $ram['name'] ?></option>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
                        </div>
                        <div class="col-12 col-md-2 mb-2">
                            <input type="text" name="price[]" class="form-control" placeholder="Price">
                        </div>
                        <div class="col-12 col-md-2">
                            <button class="btn btn-primary" onclick="add_product_attribute()" type="button">Add more</button>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="password-input" class=" form-control-label">Sale price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="password-input" name="sale_price" placeholder="Sale price" class="form-control">
                        <small class="help-block form-text">Please enter a complex password</small>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="textarea-input" class=" form-control-label">Content</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="content" id="textarea-input" rows="9" placeholder="Content..." class="form-control"></textarea>
                    </div>
                </div>
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