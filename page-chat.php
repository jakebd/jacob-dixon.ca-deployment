<?php
get_header();
?>
<?php $send_img_url = wp_get_attachment_image_url(246, "full");?>
<?php $bot_img_url = wp_get_attachment_image_url(251, "full");?>
<?php $loading_img_url = wp_get_attachment_image_url(247, "full");?>
<script type="text/javascript">
    var preloaderImageUrl = "<?php echo wp_get_attachment_image_url(249, 'full'); ?>";
</script>

<div class="chat-container">
    <div class="chat-header">
        <div class="bot">
            <img src=<?=$bot_img_url ?> style="width: 65px; height: 65px; border-radius: 50%;" alt="bot-img" draggable="false">
            <span></span>
        </div>
        <div class="title">
            Jake Bot
        </div>
    </div>
    <div class="chat-body">
        <div class="chats">
            <div class="message response" >
                <div>
                    Hello there! How can I help you today
                </div>
            </div>
        </div>
        <div class="sender">
            <input type="text" placeholder="Write a message" id="messageInput" autofocus>
            <button class="sendBtn">
                <img src=<?=$send_img_url?> alt="send-btn">
            </button>
        </div>
    </div>
</div>
<?php
get_footer();
?>