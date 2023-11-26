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
                <th>Image</th>
                <th>Title</th>
                <th>Content</th>
                <th>Date of posting</th>
                <th class="text-center">Ation</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($data['post'] as $data) : ?>
            <tr>
                <td><?= $data['id'];?></td>
                <td><img src="../../../../<?= $data['image'] ?>" alt="" width="80px" height="80px"></td>
                <td><?=$data['title']?></td>
                <td><?= substr($data['content'], 0 , 100)?>...</td>
                <td><?=$data['cr']?></td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                        <a href="/post/edit/?post_id=<?=$data['id']?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <a href="/post/delete/?post_id=<?=$data['id']?>" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>