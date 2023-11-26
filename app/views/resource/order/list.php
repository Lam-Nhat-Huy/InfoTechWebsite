<div class="table-data__tool">
    <h3 class="title-5 m-b-35">Post Table</h3>
    <div class="table-data__tool-right">
        <a href="/post/add/" class="au-btn au-btn-icon au-btn--green au-btn--small">
            <i class="zmdi zmdi-plus"></i>add item</a>
    </div>
</div>
<div class="table-responsive table-responsive-data2">
    <table class="table table-data2">
        <thead>
            <tr>
                <th>id</th>
                <th>user_name</th>
                <th>user_email</th>
                <th>user_address</th>
                <th>cart_code</th>
                <th>cart_status</th>
        </thead>
        <tbody>
            <?php foreach ($data['order'] as $data) : ?>
                <tr>
                    <td><?= $data['id']; ?></td>
                    <td><?= $data['user_name']; ?></td>
                    <td><?= $data['user_email']; ?></td>
                    <td><?= $data['user_address'] ?></td>
                    <td><?= $data['cart_code'] ?></td>
                    <td><?= $data['cart_status'] ?></td>

                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>