<?php 
if(empty($_GET['selector']) || empty($_GET['validator'])){

    echo 'Không Thấy Mã Code';
}else{
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

   

    }


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
                        <form action="/ResetPassword/" method="post">

                            <div class="form-group">
                                <input type="hidden" name="type" value="reset" >
                                <input type="hidden" name="selector" value=" <?php echo $selector ?> " >
                                <input type="hidden" name="validator" value=" <?php echo $validator ?> " >
                                
                                <label>Password</label>
                                <input class="au-input au-input--full" type="password" name="pwd" placeholder="Password">
                                <label>Repeat Password</label>
                                <input class="au-input au-input--full" type="password" name="pwd-repeat" placeholder="Password">
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" name="submit"
                                type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
  