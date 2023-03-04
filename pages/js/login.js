window.addEventListener('load', ()=>{

    const form = document.querySelector("form")
    const username = document.querySelector("#username")
    const usernameMsg = document.querySelector(".username-msg")
    const password = document.querySelector("#password")
    const passwordMsg = document.querySelector(".password-msg")
    const generalMsg = document.querySelector(".general-msg")

    const button = document.querySelector("button")

    const btnText = document.querySelector("button p")
    const loadingSVG = document.querySelector(".loading")

    form.addEventListener("submit", (e)=>{
        e.preventDefault()

        generalMsg.classList.add("hide")
        fieldsOK = true

        if(username.value.trim() == ""){
            usernameMsg.classList.remove("hide")
            fieldsOK = false
        }
        else{
            usernameMsg.classList.add("hide")
        }

        if(password.value.trim() == ""){
            passwordMsg.classList.remove("hide")
            fieldsOK = false
        }
        else{
            passwordMsg.classList.add("hide")
        }

        if(fieldsOK){
            button.disabled = true
            loadingSVG.classList.remove("hide")
            btnText.classList.add("hide")

            const formData = new FormData(form)

            fetch('./login.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
                button.disabled = false

                if(data == "success"){
                    console.log("??")
                    window.location.replace("./dashboard.php");
                }
                else{
                    loadingSVG.classList.add("hide")
                    btnText.classList.remove("hide")    
                    generalMsg.classList.remove("hide")
                }

            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
                button.disabled = false
                loadingSVG.classList.add("hide")
                btnText.classList.remove("hide")
            })

        }
        else
        {
            console.log("Fields not filled or data is already being posted")
        }
        
    })

})