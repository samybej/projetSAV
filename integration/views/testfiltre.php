        <?php
$min = 0;
$max = 300;

if (! empty($_POST['min_price'])) {
    $min = $_POST['min_price'];
}

if (! empty($_POST['max_price'])) {
    $max = $_POST['max_price'];
}
$conn = mysqli_connect("localhost", "root", "", "projetweb");

$result = mysqli_query($conn, "select * from produit where price BETWEEN '$min' AND '$max'");

$count = mysqli_num_rows($result);
if ($count > 0) {
    ?>

    <div class="container">
        <table class="tutorial-table" cellspacing="1px" width="100%">
            <tr>
                <th>Product name</th>
                <th>first name</th>
                <th class="text-right">Price (in $)</th>
            </tr>
     <?php
    while ($row = mysqli_fetch_array($result)) {
        ?>
    
        <tr>
                <td><?php echo $row['product_title']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td class='text-right'><?php echo $row['price']; ?></td>
            </tr>
<?php
    } // end while
} else {
    ?>
<div class="no-result">No Results</div>
<?php
}

mysqli_free_result($result);

mysqli_close($conn);

?>
