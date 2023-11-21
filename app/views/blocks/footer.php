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
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
    $(document).ready(function() {
        var chartData = <?php echo json_encode($data['chartData']); ?>;
        new Morris.Bar({
            element: 'column-chart',
            data: chartData,
            xkey: 'label',
            ykeys: ['product_count', 'total_price'],
            labels: ['Số lượng', 'Tổng giá']
        });
    });
</script>
</body>

</html>
<!-- end document-->