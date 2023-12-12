<?php
if (isset($_GET['product_id'])) {
    $id_sp = $_GET['product_id'];
}


?>
<script src="path/to/jquery.min.js"></script>
<script src="path/to/bootstrap.min.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap');


    .card {
        position: relative;
        display: flex;
        padding: 20px;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 1px solid #d2d2dc;
        border-radius: 11px;
        -webkit-box-shadow: 0px 0px 5px 0px rgb(249, 249, 250);
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1);
        box-shadow: 0px 0px 5px 0px rgb(161, 163, 164)
    }

    .media img {

        width: 60px;
        height: 60px;
    }


    .reply a {

        text-decoration: none;
    }

    .cross {
        padding: 10px;
        color: #d6312d;
        cursor: pointer;
        font-size: 23px;
    }

    .cross i {

        margin-top: -5px;
        cursor: pointer;
    }


    .comment-box {
        padding: 5px
    }

    .comment-area textarea {
        resize: none;
        border: 1px solid #ff0000
    }

    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
    }

    .send {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000
    }

    .send:hover {
        color: #fff;
        background-color: #f50202;
        border-color: #f50202
    }

    .rating {
        display: inline-flex;
        margin-top: -10px;
        flex-direction: row-reverse;


    }

    .rating > input {
        display: none
    }

    .rating > label {
        position: relative;
        width: 28px;
        font-size: 35px;
        color: #ff0000;
        cursor: pointer;
    }

    .rating > label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .rating > label:hover:before,
    .rating > label:hover ~ label:before {
        opacity: 1 !important
    }

    .rating > input:checked ~ label:before {
        opacity: 1
    }

    .rating:hover > input:checked ~ label:before {
        opacity: 0.4
    }

    /* CSS cho form Reply */
    /* CSS cho form reply */
    .replyform {
        display: none;
        margin-top: 20px;
    }

    .replyform form {
        display: flex;
        flex-direction: row;
        background-color: #f5f5f5;
        padding: 10px;
        border-radius: 5px;
    }

    .replyform textarea {
        flex-grow: 1;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-right: 10px;
        resize: none; /* Tắt khả năng thay đổi kích thước textarea */
        width: 889px;
    }

    .replyform button {
        background-color: #ff3368;
        color: #fff;
        border: none;
        padding: 10px 15px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .replyform button:hover {
        background-color: #218838;
    }

    /* CSS cho phần thẻ reply */
    .reply-link {
        margin-left: auto; /* Đẩy phần tử sang bên phải */
        display: flex;
        align-items: center; /* Căn giữa nội dung và biểu tượng */
    }

    .reply-link span {
        margin-left: 5px; /* Khoảng cách giữa biểu tượng và văn bản */
    }
    .btn-danger{
        background-color: #ff3368;
        border-color: #ff3368;
    }
    
</style>
<section class="breadcrumb breadcrumb_bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Shop Single</h2>
                        <p>Home <span>-</span> Shop Single</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- breadcrumb start-->
<!--================End Home Banner Area =================-->

<!--================Single Product Area =================-->
<form class="product_image_area section_padding" action="" method="post">
    <?php
    foreach ($data['product'] as $item) {
        if (!empty($data['attribute'])) {
            foreach ($data['attribute'] as $attr) {
            }
            ?>
            <div class="container">
                <div class="row s_product_inner justify-content-between">
                    <div class="col-lg-7 col-xl-7">
                        <div class="product_slider_img">
                            <div id="vertical">
                                <div>
                                    <img src="../../<?= $item['image'] ?> ">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-4">
                        <div class="s_product_text">
                            <h5>previous <span>|</span> next</h5>
                            <h3><?= $item['name'] ?></h3>
                            <div id="price_attr">
                                <h2><?= !empty($attr['price']) ? number_format($attr['price']) : number_format($item['price']) ?></h2>
                            </div>
                            <ul class="list">
                                <li>
                                    <a class="active" href="#">
                                        <span>Category</span> : <?= $item['category_name'] ?></a>
                                </li>
                                <li class="mb-3">
                                    <?php
                                    if ($item['color_id'] > 0) {
                                        echo "<span class='mr-3'>Color:</span>";
                                        $uniqueColors = array();
                                        foreach ($data['attribute'] as $color) {
                                            if (!array_key_exists($color['color'], $uniqueColors)) { // Kiểm tra xem giá trị đã tồn tại trong mảng chưa
                                                $uniqueColors[$color['color']] = true; // Đánh dấu giá trị là đã xuất hiện
                                                ?>
                                                <a href="javascript:void(0)"
                                                   onclick="loadAttr('<?= $color['color_id'] ?>','<?= $item['id'] ?>','color')"
                                                   class="btn <?= ($color['color_id'] === $attr['color_id']) ? 'btn-danger' : '' ?> color"
                                                   style="border: solid 1px #ff9ea2;margin-right:4px;"
                                                   id="color_select"><?= $color['color'] ?></a>
                                                <?php
                                            }
                                        }
                                    }
                                    ?>
                                </li>
                                <li class="mb-3 d-flex">
                                    <span class="mr-3"><?= !empty($item['ram_id']) ? 'Ram:' : '' ?></span>
                                    <div id="hihi">
                                        <?php
                                        if ($item['ram_id'] > 0) {
                                            $uniqueRams = array(); //đay là mảng chứa giá trị duy nhất
                                            foreach ($data['attribute'] as $ram) {
                                                if (!array_key_exists($ram['ram_name'], $uniqueRams)) { // Kiểm tra xem giá trị đã tồn tại trong mảng chưa
                                                    $uniqueRams[$ram['ram_name']] = true; // Đánh dấu giá trị là đã xuất hiện
                                                    if ($ram['ram_id'] == $attr['ram_id']) {
                                                    ?>
                                                    <a class="btn <?= ($ram['ram_id'] === $attr['ram_id']) ? 'btn-danger' : '' ?> ram "
                                                       style="border: solid 1px #ff9ea2;margin-right:4px"><?= $ram['ram_name'] ?></a>
                                                    <?php
                                                    }
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                </li>
                            </ul>
                            <p>
                                <?= $item['content'] ?>
                            </p>
                            <div class="card_area d-flex justify-content-between align-items-center">
                                <!-- <div class="product_count">
                                    <span class="inumber-decrement"><i class="fas fa-minus"></i></span>
                                    <input class="input-number" type="text" value="1" min="0" max="10" name="qty">
                                    <span class="number-increment"><i class="fas fa-plus"></i></span>
                                </div> -->
                                <div id="add_to_cart">
                                    <?php
                                    if ($item['color_id'] > 0) {
                                        foreach ($data['attribute'] as $cart) {
                                            $ram = $attr['ram_id'];
                                            $color = $attr['color_id'];
                                            ?>

                                            <?php
                                        }
                                        ?>
                                        <a class='btn_3' href='javascript:void(0)'
                                           onclick='addToCart(<?= $ram ?>,<?= $color ?>, <?= $item["id"] ?>)'>add to
                                            cart</a>
                                        <?php
                                    } else {
                                        ?>
                                        <a class='btn_3' href='javascript:void(0)'
                                           onclick='addCart(<?= $item["id"] ?>)'>add to cart</a>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <a href="#" class="like_us"><i class="fas fa-heart"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }

    ?>
</form>
<!--================End Single Product Area =================-->

<!--================Product Description Area =================-->
<section class="product_description_area">
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                   aria-selected="true">Description</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                   aria-controls="profile" aria-selected="false">Specification</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                   aria-controls="contact" aria-selected="false">Comments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" id="review-tab" data-toggle="tab" href="#review" role="tab"
                   aria-controls="review" aria-selected="false">Reviews</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <p>
                    Beryl Cook is one of Britain’s most talented and amusing artists
                    .Beryl’s pictures feature women of all shapes and sizes enjoying
                    themselves .Born between the two world wars, Beryl Cook eventually
                    left Kendrick School in Reading at the age of 15, where she went
                    to secretarial school and then into an insurance office. After
                    moving to London and then Hampton, she eventually married her next
                    door neighbour from Reading, John Cook. He was an officer in the
                    Merchant Navy and after he left the sea in 1956, they bought a pub
                    for a year before John took a job in Southern Rhodesia with a
                    motor company. Beryl bought their young son a box of watercolours,
                    and when showing him how to use it, she decided that she herself
                    quite enjoyed painting. John subsequently bought her a child’s
                    painting set for her birthday and it was with this that she
                    produced her first significant work, a half-length portrait of a
                    dark-skinned lady with a vacant expression and large drooping
                    breasts. It was aptly named ‘Hangover’ by Beryl’s husband and
                </p>
                <p>
                    It is often frustrating to attempt to plan meals that are designed
                    for one. Despite this fact, we are seeing more and more recipe
                    books and Internet websites that are dedicated to the act of
                    cooking for one. Divorce and the death of spouses or grown
                    children leaving for college are all reasons that someone
                    accustomed to cooking for more than one would suddenly need to
                    learn how to adjust all the cooking practices utilized before into
                    a streamlined plan of cooking that is more efficient for one
                    person creating less
                </p>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                        <tr>
                            <td>
                                <h5>Width</h5>
                            </td>
                            <td>
                                <h5>128mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Height</h5>
                            </td>
                            <td>
                                <h5>508mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Depth</h5>
                            </td>
                            <td>
                                <h5>85mm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Weight</h5>
                            </td>
                            <td>
                                <h5>52gm</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Quality checking</h5>
                            </td>
                            <td>
                                <h5>yes</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Freshness Duration</h5>
                            </td>
                            <td>
                                <h5>03days</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>When packeting</h5>
                            </td>
                            <td>
                                <h5>Without touch of hand</h5>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h5>Each Box contains</h5>
                            </td>
                            <td>
                                <h5>60pcs</h5>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
// Kiểm tra nếu session 'user_id' tồn tại
if(isset($_SESSION['user_id'])) {
?>
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#form">Comment Form</button>

            <form action="" method="post">
                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                     aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="text-right cross">
                                <i class="fa fa-times mr-2"></i>
                            </div>
                            <input type="hidden" name="id_user" value="<?php echo $_SESSION['user_id'] ?>">
                            <input type="hidden" name="id_sp" value="<?php echo $id_sp ?>">
                            <div class="card-body text-center">
                                <img src="https://i.imgur.com/d2dKtI7.png" height="100" width="100">
                                <div class="comment-box text-center">
                                    <h4>Add a comment</h4>
                                    <div class="rating">
                                        <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                        <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                        <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                        <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                        <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                    </div>
                                    <div class="comment-area">
                                        <textarea name="noidung" class="form-control"
                                                  placeholder="@<?php echo $_SESSION['username'] ?>"
                                                  rows="4"></textarea>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button name="insert_comment" type="submit" class="btn btn-success send px-5">
                                            Send Comment <i class="fa fa-long-arrow-right ml-1"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <?php
} else {
    // Hiển thị thông báo hoặc thực hiện hành động khác khi 'user_id' không tồn tại
    echo '<p>Please log in to comment.</p>';
}
?>

            <!-- list comment Cha -->
            <div class="container mb-5 mt-5">

                <div class="card">

                    <div class="row">

                        <div class="col-md-12">

                            <h3 class="text-center mb-5">
                                Comment List
                            </h3>
                            <div class="row">
                                <div class="col-md-12">
                                    <?php if (!empty($data['comment'])) { ?>
                                        <?php foreach ($data['comment'] as $data) : ?>
                                            <div class="media">
                                                <img class="mr-3 rounded-circle" alt="Bootstrap Media Preview"
                                                     src="https://i.imgur.com/stD0Q19.jpg"/>
                                                <div class="media-body">
                                                    <div class="row">
                                                        <div class="col-8 d-flex">
                                                            <h5><?= $data['tennguoi'] ?></h5>
                                                            <span>- <?= $data['date'] ?></span>

                                                        </div>

                                                        <div class="col-4">

                                                            <div class="pull-right reply">
                                                                <!-- Nút Reply Cha-->
                                                                <a class="reply-link  " href="#"
                                                                   data-comment-id="<?= $data['id'] ?>"><span><i
                                                                                class="fa fa-reply"></i> reply</span></a>
                                                                <!-- End Nút Reply Cha -->


                                                            </div>


                                                        </div>
                                                        <!-- Button Edit And Delete Comment Cha-->
                                                        <form class="ml-3" method="post" action="">
                                                            <input type="hidden" name="parent_comment_id"
                                                                   value="<?= $data['id'] ?>">
                                                            <input class="btn-primary rounded-lg" href="#"
                                                                   onclick="openEditForm(<?= $data['id'] ?>)"
                                                                   value="Edit" type="button">

                                                            <input class="btn-danger rounded-lg" value="Delete"
                                                                   name="DeleteComment" type="submit">
                                                        </form>
                                                    </div>

                                                    <?= $data['content'] ?>
                                                    <!-- Form Edit -->
                                                    <form method="post" id="editForm_<?= $data['id'] ?>"
                                                          style="display: none;">
                                                        <!-- Các trường và nút lưu, hủy chỉnh sửa ở đây -->
                                                        <!-- Ví dụ: -->
                                                        <input type="hidden" name="parent_comment_id"
                                                               value="<?= $data['id'] ?>">
                                                        <textarea id="message" name="noidung" rows="4"
                                                                  required></textarea>
                                                        <button name="EditComment" type="submit">Save</button>
                                                        <button type="button" onclick="cancelEdit(<?= $data['id'] ?>)">
                                                            Cancel
                                                        </button>
                                                    </form>
                                                    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                                                    <!-- Form Reply Cha -->
                                                    <div class="replyform" id="replyForm_<?= $data['id'] ?>"
                                                         style="display: none;">

                                                        <form action="" method="post">
                                                            <input type="hidden" name="id_user"
                                                                   value="<?php echo $_SESSION['user_id'] ?>">
                                                            <input type="hidden" name="product_id"
                                                                   value="<?php echo $id_sp ?>">
                                                            <input type="hidden" name="parent_comment_id"
                                                                   value="<?= $data['id'] ?>">

                                                            <div class="container">
                                                                <div class="row">
                                                                    <div class="">
                                                                        <textarea name="noidung" type="text"
                                                                                  class="input"
                                                                                  placeholder="@<?php echo $_SESSION['username'] ?>"></textarea>
                                                                        <button name="submit_reply"
                                                                                class="primaryContained btn-danger  float-right"
                                                                                type="submit">Send
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>

                                                    </div>
                                                    <!-- End Form Reply Cha -->

                                                    <!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

                                                    <?php
                                                    $comment = new CommentModel();
                                                    $id_cm = $data['id'];
                                                    $row = $comment->GetParentId($id_cm);
                                                    foreach ($row as $data) {
                                                        extract($data);
                                                        ?>

                                                        <div class="media mt-4">
                                                            <a class="pr-3" href="#"><img class="rounded-circle"
                                                                                          alt="Bootstrap Media Another Preview"
                                                                                          src="https://i.imgur.com/xELPaag.jpg"/></a>
                                                            <div class="media-body">

                                                                <div class="row">
                                                                    <div class="col-12 d-flex">
                                                                        <h5> <?= $data['reply_user_name'] ?></h5>

                                                                        <span>-  <?= $data['date'] ?></span>
                                                                        <!-- Nút Reply Con-->
                                                                        <a class="reply-link  " href="#"
                                                                           data-comment-id="<?= $data['id'] ?>"><span><i
                                                                                        class="fa fa-reply"></i> reply</span></a>
                                                                        <!-- End Nút Reply Con -->

                                                                    </div>


                                                                    <!-- Button Edit And Delete Comment Con-->
                                                                    <form class="ml-3" method="post" action="">
                                                                        <input type="hidden" name="parent_comment_id"
                                                                               value="<?= $data['id'] ?>">
                                                                        <input class="btn-primary rounded-lg" href="#"
                                                                               onclick="openEditForm(<?= $data['id'] ?>)"
                                                                               value="Edit" type="button">

                                                                        <input class="btn-danger rounded-lg"
                                                                               value="Delete" name="DeleteComment"
                                                                               type="submit">
                                                                    </form>
                                                                </div>

                                                                <?= $data['content'] ?>
                                                                <!-- Form Edit Con -->
                                                                <form method="post" id="editForm_<?= $data['id'] ?>"
                                                                      style="display: none;">
                                                                    <!-- Các trường và nút lưu, hủy chỉnh sửa ở đây -->
                                                                    <!-- Ví dụ: -->
                                                                    <input type="hidden" name="parent_comment_id"
                                                                           value="<?= $data['id'] ?>">
                                                                    <textarea id="message" name="noidung" rows="4"
                                                                              required></textarea>
                                                                    <button name="EditComment" type="submit">Save
                                                                    </button>
                                                                    <button type="button"
                                                                            onclick="cancelEdit(<?= $data['id'] ?>)">
                                                                        Cancel
                                                                    </button>
                                                                </form>
                                                                <!-- Form Reply Con -->
                                                                <div class="replyform" id="replyForm_<?= $data['id'] ?>"
                                                                     style="display: none;">
                                                                    <form action="" method="post">
                                                                        <input type="hidden" name="id_user"
                                                                               value="<?php echo $_SESSION['user_id'] ?>">
                                                                        <input type="hidden" name="product_id"
                                                                               value="<?php echo $id_sp ?>">
                                                                        <input type="hidden" name="parent_comment_id"
                                                                               value="<?= $data['id'] ?>">

                                                                        <div class="container">
                                                                            <div class="row">
                                                                                <div class="">
                                                                                    <textarea name="noidung" type="text"
                                                                                              class="input"
                                                                                              placeholder="@<?php echo $_SESSION['username'] ?>"></textarea>
                                                                                    <button name="submit_reply"
                                                                                            class="primaryContained float-right"
                                                                                            type="submit">Trả Lời
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </form>

                                                                </div>
                                                                <!-- End Form Reply Con -->
                                                            </div>
                                                        </div>
                                                        <?php
                                                        $comment = new CommentModel();
                                                        $id_cm = $data['id'];
                                                        $row = $comment->GetParentId($id_cm);
                                                        foreach ($row as $data) {
                                                            extract($data);
                                                            ?>

                                                            <div class="media mt-3">
                                                                <a class="pr-3" href="#"><img class="rounded-circle"
                                                                                              alt="Bootstrap Media Another Preview"
                                                                                              src="https://i.imgur.com/nAcoHRf.jpg"/></a>
                                                                <div class="media-body">
                                                                    <div class="row">
                                                                        <div class="col-12 d-flex">
                                                                            <h5><?= $data['reply_user_name'] ?></h5>
                                                                            <span>- <?= $data['date'] ?></span>
                                                                            <!-- Nút Reply Con vs Con-->
                                                                            <a class="reply-link  " href="#"
                                                                               data-comment-id="<?= $data['id'] ?>"><span><i
                                                                                            class="fa fa-reply"></i> reply</span></a>
                                                                            <!-- End Nút Reply Con vs Con -->
                                                                        </div>

                                                                        <!-- Button Edit And Delete Comment Con VS Con-->
                                                                        <form class="ml-3" method="post" action="">
                                                                            <input type="hidden"
                                                                                   name="parent_comment_id"
                                                                                   value="<?= $data['id'] ?>">
                                                                            <input class="btn-primary rounded-lg"
                                                                                   href="#"
                                                                                   onclick="openEditForm(<?= $data['id'] ?>)"
                                                                                   value="Edit" type="button">

                                                                            <input class="btn-danger rounded-lg"
                                                                                   value="Delete" name="DeleteComment"
                                                                                   type="submit">
                                                                        </form>
                                                                    </div>

                                                                    <?= $data['content'] ?>
                                                                    <!-- Form Edit Con vs Con -->
                                                                    <form method="post" id="editForm_<?= $data['id'] ?>"
                                                                          style="display: none;">
                                                                        <!-- Các trường và nút lưu, hủy chỉnh sửa ở đây -->
                                                                        <!-- Ví dụ: -->
                                                                        <input type="hidden" name="parent_comment_id"
                                                                               value="<?= $data['id'] ?>">
                                                                        <textarea id="message" name="noidung" rows="4"
                                                                                  required></textarea>
                                                                        <button name="EditComment" type="submit">Save
                                                                        </button>
                                                                        <button type="button"
                                                                                onclick="cancelEdit(<?= $data['id'] ?>)">
                                                                            Cancel
                                                                        </button>
                                                                    </form>
                                                                    <!-- Form Reply Con vs Con -->
                                                                    <div class="replyform"
                                                                         id="replyForm_<?= $data['id'] ?>"
                                                                         style="display: none;">

                                                                        <form action="" method="post">
                                                                            <input type="hidden" name="id_user"
                                                                                   value="<?php echo $_SESSION['user_id'] ?>">
                                                                            <input type="hidden" name="product_id"
                                                                                   value="<?php echo $id_sp ?>">
                                                                            <input type="hidden"
                                                                                   name="parent_comment_id"
                                                                                   value="<?= $data['id'] ?>">

                                                                            <div class="container">
                                                                                <div class="row">
                                                                                    <div class="">
                                                                                        <textarea name="noidung"
                                                                                                  type="text"
                                                                                                  class="input"
                                                                                                  placeholder="@<?php echo $_SESSION['username'] ?>"></textarea>
                                                                                        <button name="submit_reply"
                                                                                                class="primaryContained float-right"
                                                                                                type="submit">Trả Lời
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </form>

                                                                    </div>
                                                                    <!-- End Form Reply Con vs Con-->
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                        ?>

                                                        <?php
                                                    }
                                                    ?>

                                                </div>
                                            </div>


                                        <?php endforeach ?>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>

            </div>

            <!-- end list comment Cha -->

        </div>
    </div>

    </div>
    </div>
</section>
<!--================End Product Description Area =================-->

<!-- product_list part start-->
<section class="product_list best_seller">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="section_tittle text-center">
                    <h2>Best Sellers <span>shop</span></h2>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-12">
                <div class="best_product_slider owl-carousel">
                    <div class="single_product_item">
                        <img src="<?= ASSETS ?>/images/product/product_1.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="<?= ASSETS ?>/images/product/product_2.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="<?= ASSETS ?>/images/product/product_3.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="<?= ASSETS ?>/images/product/product_4.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                    <div class="single_product_item">
                        <img src="<?= ASSETS ?>/images/product/product_5.png" alt="">
                        <div class="single_product_text">
                            <h4>Quartz Belt Watch</h4>
                            <h3>$150.00</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    function toggleReplyForm(commentId) {
        var replyForm = document.getElementById('replyForm_' + commentId);
        replyForm.style.display = (replyForm.style.display === 'none' || replyForm.style.display === '') ? 'block' : 'none';
    }
    document.addEventListener('DOMContentLoaded', function () {
        var replyLinks = document.querySelectorAll('.reply-link');

        function toggleReplyForm(commentId) {
            var replyForm = document.getElementById('replyForm_' + commentId);
            replyForm.style.display = (replyForm.style.display === 'none' || replyForm.style.display === '') ? 'block' : 'none';
        }

        replyLinks.forEach(function (link) {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                var commentId = link.getAttribute('data-comment-id');
                console.log('Clicked on reply for comment ID:', commentId);
                toggleReplyForm(commentId);
            });
        });
    });

    function openEditForm(commentId) {
        // Construct the unique form id
        var formId = "editForm_" + commentId;

        // Show the corresponding form
        document.getElementById(formId).style.display = "block";
    }

    function cancelEdit(commentId) {
        // Construct the unique form id
        var formId = "editForm_" + commentId;

        // Hide the corresponding form
        document.getElementById(formId).style.display = "none";
    }

    

</script>

