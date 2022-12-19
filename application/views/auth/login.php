<?php
include APPPATH . 'views/fragment/header.php'; 
?>

<div style="background-image:url('<?= BASE_ASSETS ?>/images/bg.jpg');margin:0px !important;">
    <div class="vh-100 d-flex justify-content-center align-items-center">
            <div class="col-md-4 p-5 shadow-sm border rounded-3">
            <h5 class="text-center mb-4 text-primary">E-Katalog</h5>
            <hr/>
                <h4 class="text-center mb-4 text-primary">Login</h4>
                <?php
                if(isset($message)){
                    echo '<div class="alert alert-danger d-flex align-items-center" role="alert"><small>'.$message.'</small></div>';
                }?>
                <form method="POST" action="<?= base_url("auth/login") ?>">
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="username" class="form-control border border-primary" name="identity" required>
                    </div>
                    <div class="mb-3">
                        <label  class="form-label">Password</label>
                        <input type="password" class="form-control border border-primary" name="password">
                    </div>
                    <div class="mb-3">
                        <label class="form-label"></label>
                        <input type="checkbox" id="remember" name="remember" value="1"> Remember me
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
</div>
<?php
    include APPPATH . 'views/fragment/footer.php'; 
?>