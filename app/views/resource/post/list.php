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
            <tr>
                <td>1</td>
                <td><img src="../../../../public/images/b1.jpg" alt="" width="80px" height="80px"></td>
                <td>Độc lạ bình dương</td>
                <td>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veniam, hic aliquam! Libero cumque, praesentium minima natus adipisci pariatur aut inventore quia porro eveniet incidunt, dicta delectus magni nisi velit explicabo?</td>
                <td>8/11/2023</td>
                <td>
                    <div class="table-data-feature">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                            <i class="zmdi zmdi-mail-send"></i>
                        </button>
                        <a href="/post/edit/" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                            <i class="zmdi zmdi-edit"></i>
                        </a>
                        <a href="/post/delete/" class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" onclick="return confirm('Are you sure you want to delete?')">
                            <i class="zmdi zmdi-delete"></i>
                        </a>
                        <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                            <i class="zmdi zmdi-more"></i>
                        </button>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>