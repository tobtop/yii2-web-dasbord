<script>
document.querySelector('.btn-success').addEventListener('click', function() {
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    );
});
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

// ตรวจสอบว่าผู้ใช้เข้าสู่ระบบแล้วหรือยัง
if (!Yii::$app->user->isGuest) {
    // ดึงข้อมูลผู้ใช้ที่เข้าสู่ระบบ
    $currentUser = Yii::$app->user->identity;
} else {
    // ผู้ใช้ยังไม่ได้เข้าสู่ระบบ
    $currentUser = null;
}

?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Note: wait for code in email </h5>
                </div>

                <div class="invoice p-3 mb-3">

                    <div class="row">
                        <div class="col-12">
                            <h4>
                                <i class="fas fa-globe"></i> STUDY FAST SCHOOL.
                                <small class="float-right"></small>
                            </h4>
                        </div>
                    </div>

                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                            From
                            <address>
                                <strong>STUDY FAST SCHOOL, Inc.</strong><br>
                                THAI BKK WEBSITE<br>
                                course online Study<br>
                                Phone: (99+) 777<br>
                                Email: STUDYFAST_SCHOOL@almasaeedstudio.com
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            To
                            <address>
                                <?php if ($currentUser !== null) : ?>
                                <strong><?= $currentUser->username ?></strong><br>
                                <!-- ส่วนอื่น ๆ ของข้อมูลผู้ใช้ -->
                                <?php else : ?>
                                Guest
                                <?php endif; ?>
                                <strong><?= $model_users[0]['fname'] ?></strong><br>
                                <?= $model_users[0]['email'] ?><br>
                                <?= $model_users[0]['tel_no'] ?><br>


                            </address>
                            </address>
                        </div>

                        <div class="col-sm-4 invoice-col">
                            <b>Invoice #<?php echo rand(100000, 999999); ?></b><br>
                            <br>
                            <b>Order ID:</b> <?php echo strtoupper(substr(md5(rand()), 0, 6)); ?><br>
                            <b>Payment Due:</b> <?php echo date('m/d/Y', strtotime('+'.rand(1, 30).' days')); ?><br>
                            <b>Account:</b> <?php echo rand(100, 999).'-'.rand(10000, 99999); ?>
                        </div>


                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product</th>
                                            <th>Serial #</th>
                                            <th>Description</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($model_pro as $index => $product) : ?>
                                        <?php if ($index === 0) : ?>
                                        <tr>
                                            <td><?= $index + 1 ?></td>
                                            <td><?= $product['product'] ?></td>
                                            <td><?= $product['Serial'] ?></td>
                                            <td><?= $product['Description'] ?></td>
                                            <td><?= $product['price'] . ' bath' ?></td>
                                        </tr>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <!-- ส่วนอื่น ๆ ของโค้ด -->

                    </div>
                </div>
            </div>
        </div>
</section>


<div class="row">
    <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="https://www.trendymobile.net/wp-content/uploads/visa-master-logo.jpg" alt="Visa"
            style="max-width: 100px;">
        <img src="https://financialit.net/sites/default/files/mastercard_early_1990s_logo_2.png"
            style="max-width: 100px;">
        <img src="https://www.leceipt.com/wp-content/uploads/2022/05/paypal-logo.png" alt="Paypal"
            style="max-width: 100px;">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
            Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
            plugg dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
    </div>

    <div class="col-6">
        <p class="lead">Amount Due <?php echo date('m/d/Y', strtotime('+'.rand(1, 30).' days')); ?></p>
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td>$<?= $model_pro[0]['price'] ?></td>
                    </tr>
                    <tr>
                        <th>Tax (9.3%)</th>
                        <td>$<?= number_format($model_pro[0]['price'] * 0.093, 2) ?></td>
                    </tr>
                    <tr>
                        <th>Shipping:</th>
                        <td>$5.80</td>
                    </tr>
                    <tr>
                        <th>Total:</th>
                        <td>$<?= number_format($model_pro[0]['price'] + ($model_pro[0]['price'] * 0.093) + 5.80, 2) ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="row no-print">
    <div class="col-12">
        <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default" id="printBtn">
            <i class="fas fa-print"></i> Print
        </a>

        <script>
        document.getElementById('printBtn').addEventListener('click', function(event) {
            event.preventDefault(); // Prevent the default link behavior

            // Display loading state or spinner
            document.getElementById('printBtn').innerHTML = '<i class="fas fa-spinner fa-spin"></i> Loading...';

            // Simulate bad network connection delay (replace this with your actual printing logic)
            setTimeout(function() {
                // Display error message
                document.getElementById('printBtn').innerHTML =
                    '<i class="fas fa-exclamation-circle"></i> Connect HD';
            }, 2000); // 2000 milliseconds (2 seconds) delay for demonstration purposes
        });
        </script>

        <!-- Button to trigger the modal -->
        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#paymentModal">
            <i class="far fa-credit-card"></i> Submit Payment
        </button>

        <!-- Vertically centered modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Payment Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Payment form or confirmation message goes here -->
                        <p>Are you sure you want to submit the payment?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="submitBtn">Submit</button>

                        <script>
                        document.getElementById('submitBtn').addEventListener('click', function() {
                            Swal.fire({
                                title: 'Success!',
                                text: 'You have successfully submitted your payment.',
                                icon: 'success',
                                showConfirmButton: false,
                                timer: 2000
                            }).then(function() {
                                // Add comment here
                                alert('Check your email');
                            });
                        });
                        </script>
                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;" id="generatePdfBtn">
            <i class="fas fa-download"></i> Generate PDF
        </button>

        <script>
        document.getElementById('generatePdfBtn').addEventListener('click', function() {
            // Change button text to loading state
            document.getElementById('generatePdfBtn').innerHTML =
                '<i class="fas fa-spinner fa-spin"></i> Generating...';

            // Simulate PDF generation delay (replace this with your actual PDF generation code)
            setTimeout(function() {
                // Change button text back to original text
                document.getElementById('generatePdfBtn').innerHTML =
                    '<i class="fas fa-download"></i> Generate PDF';

                // Perform PDF generation logic here

                // Show success message or redirect to the generated PDF
                alert('PDF generated successfully!');
            }, 2000); // 2000 milliseconds (2 seconds) delay for demonstration purposes
        });
        </script>
    </div>
</div>