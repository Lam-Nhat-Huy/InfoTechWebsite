  <!--================Home Banner Area =================-->
  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <h2>Cart Products</h2>
                          <p>Home <span>-</span>Cart Products</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
      <form class="container" action="" method="post">
          <div class="cart_inner">
              <div class="table-responsive">
                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">Product</th>
                              <th scope="col">Option</th>
                              <th scope="col">Price</th>
                              <th scope="col">Quantity</th>
                              <th scope="col">Total</th>
                              <th scope="col">Action</th>
                          </tr>
                      </thead>
                      <tbody>
                      <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) { ?>
                          <?php
                          $total_product = 0;
                          $total = 0;
                          ?>
                          <?php foreach ($_SESSION['cart'] as $key => $item) :

                              ?>
                              <?php
                              $total_product = $item['price'] * $item['qty'];
                              $_SESSION['total'] = $total += $total_product;
                              ?>
                              <tr id="cart">
                              <td>
                                  <div class="media">
                                      <div class="d-flex">
                                          <img src="/<?= $item['image'] ?>" alt="" width="90px" height="65px">
                                      </div>
                                      <div class="media-body">
                                          <p><?= $item['name'] ?></p>
                                      </div>
                                  </div>
                              </td>
                              <td>
                                  <h5><?= isset($item['ram']) ? $item['ram'] : '' ?></h5>
                                  <h5><?= isset($item['color']) ? $item['color'] : '' ?></h5>
                              </td>
                              <td>
                                  <h5>$<?= number_format($item['price']) ?></h5>
                              </td>
                              <td>
                                  <div class="product_count">
                                      <span class="input-number-decrement"> <i class="fas fa-arrow-down"></i></span>
                                      <input class="input-number" type="text" value="<?= $item['qty'] ?>" name="editQty"
                                             id="editQty">
                                      <span class="input-number-increment"><i class="fas fa-arrow-up"></i></span>
                                  </div>
                                  <input type="hidden" value="<?= $key ?>" id="idCart">
                              </td>
                              <td>
                                  <h5>$<?= number_format($total_product) ?></h5>
                              </td>
                              <td>
                                  <a href="javascript:void(0)" onclick="removeCart(<?= $key ?>)"><i class="fas fa-trash"
                                                                                                    style="font-size: 30px;color:black;"></i></a>
                              </td>
                          </tr>
                          <?php endforeach ?>
                      <?php } else {
                          ?>
                          <tr id="newcart">
                              <td></td>
                              <td></td>
                              <td>Hiện tại không có sản phẩm nào trong giỏ hàng</td>
                              <td></td>
                              <td></td>
                              <td></td>
                          </tr>
                      <?php } ?>
                      <tr class="bottom_button">
                              <td>
                                  <a class="btn_1 border-0" href="javascript:void(0)" onclick="editCart()">Update
                                      Cart</a>
                              </td>
                              <td></td>
                              <td></td>
                              <td>
                                  <h5>Subtotal</h5>
                              </td>
                              <td>
                                  <h5><?= isset($total) ? number_format($total) : '' ?></h5>
                              </td>
                          <td></td>
                          </tr>

                      </tbody>
                  </table>
                  <div class="checkout_btn_inner float-right">
                      <a class="btn_1" href="#">Continue Shopping</a>
                      <a class="btn_1 checkout_btn_1" href="#">Proceed to checkout</a>
                  </div>
              </div>
          </div>
      </form>
  </section>
  <!--================End Cart Area =================-->