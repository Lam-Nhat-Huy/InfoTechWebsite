<div class="table-data__tool">
    <h3 class="title-5 m-b-35">Comment Table</h3>
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
                <th>User name</th>
                <th>Product</th>
                <th>Content</th>
                <th>Create_at</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data['comment'] as $data) : ?>
                <tr>
                    <td><?= $data['id']; ?></td>
                    <td><?= $data['username'] ?></td>
                    <td><?= $data['product_name'] ?></td>
                    <td><?= $data['content'] ?></td>
                    <td><?= $data['cr'] ?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>