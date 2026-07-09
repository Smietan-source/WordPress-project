    <section>
        <div class="box-categories">
            <?php 
                    
            $categories = get_the_category();
            foreach($categories as $category){
                echo "<a href='" . get_category_link($category->term_id) . "'>" . $category->cat_name . "</a>";
            }
                    
            ?>
        </div>
    </section>

    <footer class="footer">
        <span>Strona wykonana przez Michała @2026</span>
    </footer>

<?php wp_footer() ?>
</body>
</html>