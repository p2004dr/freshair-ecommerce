<?php
if ($productos) {
?>
    <?php
    foreach ($productos as $producto)
    { 
        $imageUrl = !empty($producto['img']) ? htmlspecialchars($producto['img']) : null;
        $defaultImage = '/images/general/default.png';
        ?>
        
        <div class="product-container"
            onclick="loadProduct('<?php echo htmlspecialchars($producto['id']); ?>');">
            <img src="<?php echo $imageUrl ? $imageUrl : $defaultImage; ?>" 
                alt="<?php echo htmlspecialchars($producto['nom']); ?>" 
                class="product-image" 
                width="150px">
            <p id="product-name"><?php echo htmlspecialchars($producto['nom']); ?></p>
            <p id="product-price"><?php echo htmlspecialchars($producto['preu']); ?> €</p>
        </div>
        
    <?php
    }
    ?>
    <?php
} else {
    ?>
    <div class="no-categories-message">
        <p>No s'han trobat productes</p>
    </div>
<?php 
}
?>