<?php if (empty($productos)) { ?>
    <p id=no-items-message>No hi ha productes a la cistella.</p>
<?php } else { ?>
    <?php foreach ($productos as $tupla) { 
        $producto = $tupla['info'];
        $quantitat = $tupla['quantitat'];
        $imageUrl = !empty($producto['img']) ? htmlspecialchars($producto['img']) : null;
        $defaultImage = '/images/general/default.png';
        $preu_total = $producto['preu'] * $quantitat;
    ?>
        <div class="cart-product-item" data-id=<?php echo $producto['id']; ?>>
            <button class="remove-product" onclick="eliminarProducteCesta(<?php echo $producto['id']; ?>)">×</button>

            <div class="left-section">
                <img src="<?php echo $imageUrl ? $imageUrl : $defaultImage; ?>" 
                    alt="<?php echo htmlspecialchars($producto['nom']); ?>">
                <div class="cart-product-text">
                    <h3><?php echo htmlspecialchars($producto['nom']); ?></h3>
                    <p class="unit-price"><?php echo number_format($producto['preu'], 2, ',', ''); ?> € per unitat</p>
                </div>
            </div>
            <div class="product-actions">
                <button class="quantity-control">
                    <span class="decrease" onclick="restarProducteCesta(
                        <?php echo $producto['id']; ?>, 
                        <?php echo $producto['preu']; ?>, 
                        this.closest('.product-actions').querySelector('.quantity'), 
                        this.closest('.product-actions').querySelector('.product-price')
                    )">−</span>
                    
                    <span class="quantity"><?php echo $quantitat; ?></span>
                    
                    <span class="increase" onclick="sumarProducteCesta(
                        <?php echo $producto['id']; ?>, 
                        <?php echo $producto['preu']; ?>, 
                        this.closest('.product-actions').querySelector('.quantity'), 
                        this.closest('.product-actions').querySelector('.product-price')
                    )">+</span>
                </button>
                <p class="product-price"><?php echo number_format($preu_total, 2, ',', ''); ?> €</p>
            </div>
        </div>
        
    <?php } ?>
    
    <div class="cart-buttons-container">
            <button class="black-button" onclick="buidarCesta()">Buidar Cistella</button>

            <button class="black-button" 
                onclick="<?php echo $user_logged_in ? 'realitzarCompra()' : 'toggleLoginModal()'; ?>">
                Realitzar Compra
            </button>
        </div>
<?php } ?>
        