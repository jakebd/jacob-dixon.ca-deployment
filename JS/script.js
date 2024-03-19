//initialize supabase client

const supabaseClient = supabase.createClient(WPVars.SupaURL, WPVars.SupaKey)

//select DOM elements
const messageBar = document.querySelector("#messageInput");
const sendBtn = document.querySelector(".sendBtn");
const messageBox = document.querySelector(".chats");

function scrollDown(){
     messageBox.scrollTop = messageBox.scrollHeight;
}

async function chat() {
  if(messageBar.value.length > 0){
    const UserTypedMessage = messageBar.value;
    messageBar.value = "";

    let message =
    `<div class="message">
        <div>
        ${UserTypedMessage}
        </div>
    </div>`;

  let response = 
    `<div class="message response" >
        <div class="new">
            <img src="${preloaderImageUrl}" style="width: 40px; height: 40px; " alt="preloader">
        </div>
    </div>`
    messageBox.insertAdjacentHTML("beforeend", message);
    scrollDown();


    setTimeout(async () =>{
      messageBox.insertAdjacentHTML("beforeend", response);
      scrollDown();
      try{
        const {data, error} = await supabaseClient.functions.invoke('ask-custom-data', {
          body: JSON.stringify({query: UserTypedMessage})
        });
        console.log(data);
        const ChatBotResponse = document.querySelector(".response .new");
        ChatBotResponse.innerHTML = data.text 
        ChatBotResponse.classList.remove("new");
        scrollDown();
      }catch(error){
        ChatBotResponse.innerHTML = "Opps! An error occured. Please try again"
        scrollDown();
      }
    }, 100);
  }
}
sendBtn.onclick = chat;

document.getElementById('messageInput').addEventListener('keypress', function(event) {
  if (event.key === 'Enter') {
      event.preventDefault(); // Prevents the default form submission if your input is in a form
      chat();
  }
});