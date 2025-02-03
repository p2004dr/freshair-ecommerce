<?php if (!empty($orders)) { ?>
    <?php foreach ($orders as $order) { ?>
        <div class="order">
            <?php
            $num_productes = 0;

            foreach ($order['products'] as $product) {
                $num_productes += $product['quantitat']; 
            }

            $data_compra = htmlspecialchars(formatTime($order['data']));
            ?>
            <h2>Compra de <?php echo $num_productes; ?> productes realitzada el: <?php echo $data_compra; ?></h2>
            <hr class="separator-thin">

            <?php foreach ($order['products'] as $product) {
                $imageUrl = !empty($product['img']) ? htmlspecialchars($product['img']) : null;
                $defaultImage = '/images/general/default.png';
                $preu_total = $product['preu'] * $product['quantitat'];
            ?>
                <div class="cart-product-item">
                    <div class="left-section">
                        <img src="<?php echo $imageUrl ? $imageUrl : $defaultImage; ?>" 
                            alt="<?php echo htmlspecialchars($product['nom']); ?>">
                        <div class="cart-product-text">
                            <h3><?php echo htmlspecialchars($product['nom']); ?></h3>
                            <p class="unit-price"><?php echo number_format($product['preu'], 2, ',', ''); ?> € per unitat</p>
                        </div>
                    </div>
                    <div class="product-price-section">
                        <p class="quantity"></p>
                        <p class="product-price"><?php echo $product['quantitat'] . ' unitats - '; echo number_format($preu_total, 2, ',', ''); ?> €</p>
                    </div>
                </div>
            <?php } ?>

            <hr class="separator-thin">

            <h2>Total: <?php echo htmlspecialchars($order['total']); ?> €</h2>
        </div>
    <?php } ?>
<?php } else { ?>
    <p>No hi ha informació de les compres per mostrar.</p>
<?php } ?>

<?php
function formatTime($timestamp) {
    $datetime = new DateTime($timestamp);
    $months = [
        '01' => 'gener', '02' => 'febrer', '03' => 'març', '04' => 'abril',
        '05' => 'maig', '06' => 'juny', '07' => 'juliol', '08' => 'agost',
        '09' => 'setembre', '10' => 'octubre', '11' => 'novembre', '12' => 'desembre'
    ];

    $day = $datetime->format('d');
    $month = $months[$datetime->format('m')];
    $year = $datetime->format('Y');
    $time = $datetime->format('H:i');

    return "$day de $month de $year a les $time";
}
?>
