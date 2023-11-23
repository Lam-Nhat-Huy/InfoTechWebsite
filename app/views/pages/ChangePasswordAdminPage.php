<?php 
$token = $_GET['token'];
?>
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
                        <form action="/processresetpassword/" method="post">
                                <input type="hidden" name="token" value="<?=$token?>" >
                            <div class="form-group">
                            <label>Email Address</label>
                                <input class="au-input au-input--full" type="text" name="usersEmail" placeholder="Email">
                                <label>New Password</label>
                                <input class="au-input au-input--full" type="password" id="password" name="password"
                                    placeholder="Password">
                                    <label>Password Confirmation</label>
                                <input class="au-input au-input--full" type="password" id="password_Confirmation" name="password_Confirmation"
                                    placeholder="password_Confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>