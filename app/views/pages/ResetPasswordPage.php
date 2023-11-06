<div class="page-wrapper">
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        <a href="#">
                            <img src="<?= ASSETS ?>/images/infotech-logo.png" alt="CoolAdmin">
                        </a>
                    </div>
                    <a class="btn btn-danger btn-primary m-b-100" href="/login/">Back</a>
                    <div class="login-form">
                        <form action="./app/controllers/ResetPasswordController.php" method="post">
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="UsersEmail" placeholder="Email">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" name="QuenMatKhau" type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>