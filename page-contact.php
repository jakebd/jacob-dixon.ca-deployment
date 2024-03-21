<?php
get_header();
?>
<div class="container-page mt-3 mb-5">

    <div class="direct-contact-container">
        <ul class="contact-list">
            <li class="list-item"><i class="fa fa-map-marker fa-2x"></i><span class="contact-text place"><a href="https://maps.app.goo.gl/6y77qXwq7GFCcrbQ6" target="_blank" title="Halifax, Nova Scotia">Halifax, Nova Scotia</a></span></li>
            
            <li class="list-item"><i class="fa fa-phone fa-2x"></i><span class="contact-text phone"><a href="tel:1-902-222-9322" title="Give me a call">(902) 222-9322</a></span></li>
            
            <li class="list-item"><i class="fa fa-envelope fa-2x"></i><span class="contact-text gmail"><a href="mailto:jacob.dixon@live.com" title="Send me an email">jacob.dixon@live.com</a></span></li>
            
        </ul>

        <hr>
        <ul class="social-media-list">
            <li>
                <a href="https://linkedin.com/in/jacob-dixon-53194b171" target="_blank" class="contact-icon">
                    <i class="fa-brands fa-linkedin" aria-hidden="true"></i>
                </a>
            </li>
            <li>
                <a href="https://github.com/jakebd" target="_blank" class="contact-icon">
                    <i class="fa-brands fa-github"></i>
                </a>
            </li>
            <li>
                <a href="https://www.instagram.com/jake_d07/" target="_blank" class="contact-icon">
                    <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                </a>
            </li>       
        </ul>
        <hr>

    </div>

      <div class="container_form">
        <h2>Contact Me</h2>
        <?php echo do_shortcode('[wpforms id="138"]'); ?>
    </div>
</div>
<?php
get_footer();
?>
