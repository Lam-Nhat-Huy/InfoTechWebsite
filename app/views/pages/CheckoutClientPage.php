  <!-- breadcrumb start-->
  <section class="breadcrumb breadcrumb_bg">
      <div class="container">
          <div class="row justify-content-center">
              <div class="col-lg-8">
                  <div class="breadcrumb_iner">
                      <div class="breadcrumb_iner_item">
                          <h2>Product Checkout</h2>
                          <p>Home <span>-</span> Shop Single</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
  <!-- breadcrumb start-->

  <!--================Checkout Area =================-->
  <section class="checkout_area padding_top">
      <div class="container">
          <form action="" method="post" class="billing_details">
              <div class="row">
                  <div class="col-lg-7">
                      <h3>Billing Details</h3>
                      <div class="row contact_form" novalidate="novalidate">
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control" id="first" name="name" value="<?= isset($_SESSION['username']) ? $_SESSION['username'] : '' ?>" placeholder="Name" />

                          </div>
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control" id="number" name="phone" value="<?= isset($_SESSION['phone']) ? $_SESSION['phone'] : '' ?>" placeholder="Phone number" />
                              <div class="text-danger"><?= isset($_SESSION['errorPhone']) ? $_SESSION['errorPhone'] : '' ?></div>
                          </div>
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control" id="email" name="email" placeholder="Email address" value="<?= isset($_SESSION['client_user_email']) ? $_SESSION['client_user_email'] : '' ?>">

                          </div>
                          <div class="col-md-12 form-group p_star">
                              <input type="text" class="form-control" id="add1" name="address" placeholder="Address" />
                              <div class="text-danger"><?= isset($_SESSION['errorAddress']) ? $_SESSION['errorAddress'] : '' ?></div>
                          </div>
                          <div class="col-md-12 form-group">
                              <textarea class="form-control" name="note" id="message" rows="1" placeholder="Order Notes"></textarea>
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-5">
                      <div class="order_box">
                          <h2>Your Order</h2>
                          <ul class="list">
                              <li>
                                  <a href="#">Product
                                      <span>Total</span>
                                  </a>
                              </li>
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
                                      <li>
                                          <a href="#"><?= $item['name'] ?> <?= isset($item['ram']) ? '(' . $item['color'] . ', ' . $item['ram'] . ')' : '' ?>
                                              <span class="middle">x <?= ($item['qty']) < 10 ? '0' . $item['qty'] : $item['qty'] ?></span>
                                              <span class="last">$<?= number_format($item['price'] * $item['qty']) ?></span>
                                          </a>
                                      </li>
                                  <?php endforeach ?>
                              <?php } ?>
                          </ul>
                          <ul class="list list_2">
                              <li>
                                  <a>Subtotal
                                      <span>$<?= isset($total) ? number_format($total) : '' ?></span>
                                  </a>
                              </li>
                              <li>
                                  <a>Total
                                      <span>$<?= isset($total) ? number_format($total) : '' ?></span>
                                  </a>
                              </li>
                          </ul>
                          <h4 class="mb-3 fw-bold mt-3">Hình thức thanh toán</h4>
                          <div class="form-check">
                              <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault1" checked value="COD">
                              <label class="form-check-label" for="flexRadioDefault1">
                                  COD
                              </label>
                          </div>
                          <div class="form-check mb-3">
                              <input class="form-check-input" type="radio" name="payment" id="flexRadioDefault2" value="VNPay">
                              <label class="form-check-label" for="flexRadioDefault2">
                                  VNPay
                              </label>
                          </div>
                          <button class="btn_3 w-100" type="submit" onclick="sendEmail()">Proceed to Paypal</button>
                          <div class="loading" id="loading">
                              <i class="fas fa-spinner fa-spin loading-icon"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </form>
      </div>
  </section>
  <!--================End Checkout Area =================-->