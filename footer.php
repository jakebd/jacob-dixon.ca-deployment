

<footer class="mt-5 mb-3 text-secondary">
    &copy; 2024 <?= get_bloginfo("name")?> <?= get_bloginfo("description")?> 

</footer>

</div> <!--container close-->

<?php wp_footer(); ?>
<script>
jQuery(document).ready(function($) {
    $('.menu-item-has-children > a').off('click').on('click', function(e) {
        e.preventDefault();
        e.stopPropagation();

        var parentItem = $(this).parent();
        var submenu = parentItem.children('.sub-menu');

        if (!parentItem.hasClass('active')) {
            submenu.slideDown().parent().addClass('active');
        } else {
            submenu.slideUp().parent().removeClass('active');
        }

        // Close other sub-menus
        $('.menu-item-has-children').not(parentItem).removeClass('active').children('.sub-menu').slideUp();
    });

    // Close submenus when clicking outside
    $(document).on('click', function(e) {
        if (!$(e.target).closest('.menu-item-has-children').length) {
            $('.menu-item-has-children').removeClass('active').children('.sub-menu').slideUp();
        }
    });
});

</script>
</body>
</html>