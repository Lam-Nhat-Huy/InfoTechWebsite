<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->
</div>
</div>
</div>
</div>
</div>
<!-- Jquery JS-->
<script src="<?= ASSETS ?>/vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="<?= ASSETS ?>/vendor/bootstrap-4.1/popper.min.js"></script>
<script src="<?= ASSETS ?>/vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="<?= ASSETS ?>/vendor/slick/slick.min.js">
</script>
<script src="<?= ASSETS ?>/vendor/wow/wow.min.js"></script>
<script src="<?= ASSETS ?>/vendor/animsition/animsition.min.js"></script>
<script src="<?= ASSETS ?>/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="<?= ASSETS ?>/vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="<?= ASSETS ?>/vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="<?= ASSETS ?>/vendor/circle-progress/circle-progress.min.js"></script>
<script src="<?= ASSETS ?>/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= ASSETS ?>/vendor/chartjs/Chart.bundle.min.js"></script>
<script src="<?= ASSETS ?>/vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="<?= ASSETS ?>/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    var attr_count = 1;
    function add_product_attribute() {
        attr_count++;
        var html = '<div class="row form-group" id="attr_'+attr_count+'"> <div class="col col-md-3"> <label for="color-input" class="form-control-label">Option</label> </div> <div class="col-12 col-md-3"> <label for="" class="mr-2">Color</label> <select name="color[]" id="select"> <?php if (!empty($data['color'])) : ?> <?php foreach ($data['color'] as $color) : ?> <option value="<?= $color['id'] ?>"><?= $color['name'] ?></option> <?php endforeach ?> <?php endif ?> </select> </div> <div class="col-12 col-md-2"> <label for="" class="mr-2">Ram</label> <select name="ram[]" id=""> <?php if (!empty($data['ram'])) : ?> <?php foreach ($data['ram'] as $ram) : ?> <option value="<?= $ram['id']?>"><?= $ram['name']?></option> <?php endforeach ?> <?php endif ?> </select> </div> <div class="col-12 col-md-2 mb-2"><input type="text" name="price[]" class="form-control" placeholder="Price"> </div> <div class="col-12 col-md-2 mb-2"><button class="btn btn-danger" onclick=remove_attr("'+attr_count+'") type="button">Remove</button></div> </div>';
        jQuery('#product_attr').append(html);
    }
    function remove_attr(attr_count){
        jQuery('#attr_'+attr_count).remove();
    }
</script>
</body>

</html>
<!-- end document-->