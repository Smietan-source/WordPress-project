    <div class="blog_header">
        <h4>Kategorie Bloga</h4>
    </div>
    
    <section class="footer-section">
         <?php         
            $categories = get_categories();
            foreach($categories as $category){
                echo "<div class='box-categories'>";
                echo "<a href='" . get_category_link($category->term_id) . "'>" . $category->cat_name . "</a>";
                echo "</div>";
            } 
        ?>
    </section>

    <footer class="footer">
        <span>Strona wykonana przez Michała @2026</span>
    </footer>

<?php wp_footer() ?>
</body>
</html>