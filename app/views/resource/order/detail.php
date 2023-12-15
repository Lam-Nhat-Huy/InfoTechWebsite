<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
        </thead>
        <tbody>
        <?php foreach ($data['detail'] as $data) : ?>
            <tr>
                <td><?= $data['name'] ?></td>
                <td><?= $data['qty'] ?></td>
                <td><?= $data['price'] ?></td>
                <td>
                    <a href="/order/detail/" class="item" data-toggle="tooltip" data-placement="top" title=""
                       data-original-title="Detail">
                        <i class="zmdi zmdi-more"></i>
                    </a>
                </td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>