window.addEventListener('load', ()=>{

    const form = document.querySelector("form")
    const title = document.querySelector("#notice-title")
    const id = document.querySelector("#notice-id").value

    form.addEventListener("submit", (e)=>{
        e.preventDefault()

        fieldsOK = true
        
        if(title.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".titleMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Title'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".titleMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }


        if(fieldsOK == true){
            const formData = new FormData(form)
            formData.set('notice-id', id)

            fetch('./editNotice.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
                window.location.replace("./noticeBoard.php");
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
        }

    })
})