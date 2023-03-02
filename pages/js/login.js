window.addEventListener('load', ()=>{

    const form = document.querySelector("form")
    const username = document.querySelector("#username")
    const usernameMsg = document.querySelector(".username-msg")
    const password = document.querySelector("#password")
    const passwordMsg = document.querySelector(".password-msg")
    const generalMsg = document.querySelector(".general-msg")

    const btnText = document.querySelector("button p")
    const loadingSVG = document.querySelector(".loading")

    let postingData = false

    form.addEventListener("submit", (e)=>{
        e.preventDefault()

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

        if(fieldsOK && !postingData){
            postingData = true
            loadingSVG.classList.remove("hide")
            btnText.classList.add("hide")

            const formData = new FormData(form)

            fetch('', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
                //window.location.replace("./applicationSuccess.php");
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })

            postingData = false

        }
        else
        {
            console.log("Fields not filled or data is already being posted")
        }
        loadingSVG.classList.add("hide")
        btnText.classList.remove("hide")
        
    })

})