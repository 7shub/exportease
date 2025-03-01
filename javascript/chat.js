const form = document.querySelector(".typing-area"),
inputField = form.querySelector(".input-field"),
sendBtn = form.querySelector("button"),
chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) =>
    {
        e.preventDefault(); //preventing form from submitting
    }

sendBtn.onclick = ()=>
{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
     //creating XML object
    
    xhr.onload = () =>
    {
        if(xhr.readyState === XMLHttpRequest.DONE)
        {
            if(xhr.status === 200)
            {
               inputField.value = "";//once message inserted into leave blank the input field
               scrollToBottom()
            }
        }
    }
    //we have to send the form data through ajax to php
    let formData = new FormData(form); //creating new formData object
    xhr.send(formData);
}

chatBox.nomouseenter = ()=>
    {
        chatBox.classList.add("active");
    }
chatBox.nomouseenter = ()=>
    {
        chatBox.classList.remove("active");
    }
setInterval(()=>
    {
         // let's start Ajax
         let xhr = new XMLHttpRequest(); //creating XML object
         xhr.open("POST", "php/get-chat.php", true);
         xhr.onload = () =>
         {
             if(xhr.readyState === XMLHttpRequest.DONE)
             {
                 if(xhr.status === 200)
                 {
                     let data = xhr.response;
                     //console.log(data);
                     chatBox.innerHTML = data;
                     if(!chatBox.classList.contains("active"))
                     {
                         scrollToBottom();
                     }
                 }
             }
         }
         let formData = new FormData(form); //creating new formData object
         xhr.send(formData);
    }, 500);//this function will run frequently after 500ms

    function scrollToBottom()
    {
        chatBox.scrollTop = chatBox.scrollHeight;
    }