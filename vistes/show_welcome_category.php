<?php
if ($category) {
    $imagePath = '/../images/categories/' . htmlspecialchars($category['img']) . '.png';
    $defaultImage = '/../images/def.png';
    $imageToDisplay = file_exists(__DIR__ . $imagePath) ? $imagePath : $defaultImage;
    ?>
    
    <img src="<?php echo $imageToDisplay; ?>" 
        alt="<?php echo htmlspecialchars($category['nom']); ?>" 
        class="category-image">
    <div class="welcome-header-text-category">
        <h1><?php echo htmlspecialchars($category['nom']); ?></h1>
    </div>

<?php 
} 
?>