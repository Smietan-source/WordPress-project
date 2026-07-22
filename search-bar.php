<?php
$search_query = isset($_GET['q']) ? htmlspecialchars($_GET['q'], ENT_QUOTES, 'UTF-8') : '';
?>

<form action="search-results.php" method="GET" class="search-bar-form">
    <input 
        type="text" 
        name="q" 
        value="<?php echo $search_query; ?>" 
        placeholder="Search..." 
        required
    >
    <button type="submit"><?php echo file_get_contents(get_theme_file_path('search-svgrepo-com.svg')); ?></button>
</form>