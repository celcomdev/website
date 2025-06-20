<section class="pt-5">
    <div class="container">
        <div class="row px-2 justify-content-center">
            <?php if (Yii::app()->session['error_status']) : ?>
                <div class="flash-error clearfix">
                    <p class="lead">Kindly select appropriate SMS Bundle to continue</p>
                </div>
            <?php endif; ?>
            <h3 class="pt-3 text-dark text-center fw-semibold">Check Our Pricing Plan</h3>
            <p class="pb-3 text-center">
                If you have an existing account, click on the "BUY NOW" button to pay directly.
            </p>
            <div id="buy-now" class="pt-5">
                <buy-now-form></buy-now-form>
            </div>
        </div>
    </div>
</section>