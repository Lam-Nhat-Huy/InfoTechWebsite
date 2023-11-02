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
                    <div class="login-form">
                        <form action="" method="post" enctype="multipart/form-data" class="needs-validation was-validated">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="au-input au-input--full" type="text" name="name" placeholder="Username" required>
                                <div class="invalid-feedback">
                                    Please enter a valid username
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Address</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="au-input au-input--full" type="text" name="address" placeholder="Address" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="au-input au-input--full" type="number" min="0" name="phone" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <label for="select" class=" form-control-label">Role Id</label>
                                <select name="role_id" id="role_id" class="form-control">
                                    <option value="1">User</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <label>Password Repaet</label>
                                <input class="au-input au-input--full" type="password" name="cpassword" placeholder="Password repaet" required>
                            </div>
                            <div class="form-group">
                                <label>Avatar</label>
                                <input class="" type="file" name="avatar" placeholder="Avatar" required>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green" type="submit">register</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Already have account?
                                <a href="/login/">Sign In</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>