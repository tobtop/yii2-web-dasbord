<div class="row">
    <div class="col-lg-3 col-6">
        <?php $count = 0; ?>
        <?php foreach ($model_course as $course): ?>
        <?php if ($course->id): ?>
        <?php $count++; ?>
        <?php endif; ?>
        <?php endforeach; ?>
        <div class="small-box bg-info">
            <div class="inner">
                <h3><?= $count ?></h3>
                <p>Count course</p>
            </div>
            <div class="icon">
                <i class="fas fa-window-restore"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>


    <div class="col-lg-3 col-6">
        <?php
            $totalPrice = 0;
            $totalCount = 0;
        ?>
        <?php foreach ($model_course as $course): ?>
        <?php
                if ($course->price) {
                    $totalPrice += $course->price;
                    $totalCount++;
                }
            ?>
        <?php endforeach; ?>
        <?php $averagePrice = $totalCount > 0 ? $totalPrice / $totalCount : 0; ?>
        <div class="small-box bg-info">
            <div class="inner">
                <h3>$<?= number_format($averagePrice, 2) ?></h3>
                <p>Average Price</p>
            </div>
            <div class="icon">
                <i class="fas fa-money-bill-wave-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
                <h3>2</h3>
                <p>type pemian</p>
            </div>
            <div class="icon">
                <i class="fas fa-user"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-6">

        <div class="small-box bg-danger">
            <div class="inner">
                <h3>10</h3>
                <p>Unique Visitors</p>
            </div>
            <div class="icon">
                <i class="fas fa-user-friends"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

</div>


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
            <tr>
                <td>2</td>
                <td>Pro_Premium+</td>
                <td>22-222-2222</td>
                <td>Access to all courses and content available on the platform.</td>
                <td>1999 bath</td>
            </tr>
        </tbody>
    </table>
</div>
<div class="col-sm-4 invoice-col">

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
                <tr>
                    <td><?= $index + 1 ?></td>
                    <td><?= $product['product'] ?></td>
                    <td><?= $product['Serial'] ?></td>
                    <td><?= $product['Description'] ?></td>
                    <td><?= $product['price'] . ' bath' ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<div class="col-sm-4 invoice-col">

</div>


<div class="col-sm-4 invoice-col">

</div>


<div class="row">
    <div class="col-12">
        <canvas id="chart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Prepare the data for the chart
var labels = [];
var prices = [];
var colors = []; // Array to store different colors

<?php
    $colorPalette = ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)']; // Define an array of colors

    foreach ($model_pro as $index => $product) :
        ?>
labels.push('<?= $product['product'] ?>');
prices.push(<?= $product['price'] ?>);
colors.push('<?= $colorPalette[$index % count($colorPalette)] ?>'); // Assign colors from the palette
<?php endforeach; ?>

// Create the chart
var ctx = document.getElementById('chart').getContext('2d');
var chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: labels,
        datasets: [{
            label: 'Price',
            data: prices,
            backgroundColor: colors, // Use the colors array for different bar colors
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
</script>