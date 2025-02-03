
<?php
if ($categories) 
{    
?>
    <?php
    foreach ($categories as $category)
    { 
        $imagePath = '/../images/categories/' . htmlspecialchars($category['img']) . '.png';
        $defaultImage = '/../images/general/default.png';
        ?>
        
        <div class="category-container"
            category_id="<?php echo htmlspecialchars($category['id']); ?>" 
            onclick="loadProducts('<?php echo htmlspecialchars($category['id']); ?>');">
            <img src="<?php echo file_exists(__DIR__ . $imagePath) ? $imagePath : $defaultImage; ?>" 
                alt="<?php echo htmlspecialchars($category['nom']); ?>" 
                class="category-image">
            <p class="category-text"><?php echo htmlspecialchars($category['nom']); ?></p>
        </div>
    <?php
    }
}
else
{
?>
    <div class="no-categories-message">
        <p>No s'han trobat categories.</p>
    </div>
<?php 
} 
?>