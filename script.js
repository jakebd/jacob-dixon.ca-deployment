const input = document.querySelector('.chatinput')
const send = document.querySelector('.sendbutton')
const chatContainer = document.querySelector('.chats')

send.onclick = () => {
    if(input.value){
        const message = `
            <div class="message">
                <div>
                    ${input.value}
                </div>
            </div>
        `
        chatContainer.innerHTML += message
        scrollDown();
        bot()
        input.value = null
    }
}

// when click enter
input.addEventListener("keypress", function(e){
    if(e.key === "Enter"){
        e.preventDefault();
        send.click();
    }
})

// scroll down when new message added
function scrollDown(){
    chatContainer.scrollTop = chatContainer.scrollHeight;
}

// bot response
function bot(){
    var http = new XMLHttpRequest()
    var data = new FormData()
    data.append('prompt', input.value)
    http.open('POST', 'request.php', true)
    http.send(data)
    setTimeout(() => {
        chatContainer.innerHTML += `
            <div class="message response">
                <div>
                    <img src="img/preloader.gif" alt="preloader">
                </div>
            </div>
        `
        scrollDown();
    }, 1000);
    http.onload = () => {
        var response = JSON.parse(http.response)
        var replyText = processResponse(response.choices[0].text)
        var replyContainer = document.querySelectorAll('.response')
        replyContainer[replyContainer.length-1].querySelector('div').innerHTML = replyText
        scrollDown();
    }
}

function processResponse(res){
    var arr = res.split(':')
    return arr[arr.length-1]
        .replace(/(\r\n|\r|\n)/gm, '')
        .trim()
}