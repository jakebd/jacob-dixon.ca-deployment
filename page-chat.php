<?php
get_header();
?>
<?php $send_img_url = wp_get_attachment_image_url(246, "full");?>
<?php $bot_img_url = wp_get_attachment_image_url(248, "full");?>
<?php $loading_img_url = wp_get_attachment_image_url(247, "full");?>
<div class="chat-container">
    <div class="chat-header">
        <div class="bot">
            <img src="images/Logo.jpg" style="width: 70px; height: 70px; border-radius: 50%;" alt="bot-img" draggable="false">
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
            <button>
                <img src=<?=$send_img_url?> alt="send-btn">
            </button>
        </div>
    </div>
</div>
<?php
get_footer();
?>