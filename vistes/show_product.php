<?php
if ($producto)
{
?>
    <?php
    $imageUrl = !empty($producto['img']) ? htmlspecialchars($producto['img']) : null;
    $defaultImage = '/images/general/default.png';
    ?>

    <div class="left-product-container">
            <img src="<?php echo $imageUrl ? $imageUrl : $defaultImage; ?>" 
                alt="<?php echo htmlspecialchars($producto['nom']); ?>" 
                class="product-big-image">
    </div>
    <div class="right-product-container">
        <h2 id="product-big-name"><?php echo htmlspecialchars($producto['nom']); ?></p>
        <p id="product-big-description"><?php echo htmlspecialchars($producto['descripcio']); ?></p>
        <p id="product-big-price"><?php echo htmlspecialchars($producto['preu']); ?> €</p>
        <button class="add-cart" onclick="afegirACesta(<?php echo htmlspecialchars($producto['id']); ?>)">Afegir a la cesta</button>
    </div>
    <?php
} else {
    ?>
    <div class="no-categories-message">
        <p>No s'ha trobat el producte.</p>
    </div>
<?php 
}
?>