<form id="login-form" action="" method="post">
    <input type="hidden" name="token" value="<?php echo $_GET['token'] ?>">
    <div class="login-wrap mt-4">
        <div class="block-error"></div>
        <div class="row">
            <div class="form-group inputs mt-4">
                <input placeholder="OTP" required name="otp" id="LoginForm_username" type="number" />
                <span class="new-status">&nbsp;</span>
                <div class="errorMessage" id="LoginForm_otp" style="display:none"></div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4 col-md-offset-4">
                <input class="submit" id="login-button" type="submit" name="yt0" value="Submit OTP" />
            </div>
        </div>
    </div>
</form>
