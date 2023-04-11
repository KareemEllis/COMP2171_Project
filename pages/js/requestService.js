window.addEventListener('load', ()=>{
    const form = document.querySelector("form")
    const details = document.querySelector("#details")
    const fetchMsg = document.querySelector(".fetchMsg")

    form.addEventListener("submit", (e)=>{
        e.preventDefault()

        fieldsOK = true
        
        if(details.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".detailsMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter Details'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".detailsMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }


        if(fieldsOK == true){
            const formData = new FormData(form)

            fetch('./requestAddForm.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
                fetchMsg.classList.remove("hide")
                if(data == "Success"){
                    fetchMsg.textContent = "Request Successful"
                    fetchMsg.classList.add("success")
                    fetchMsg.classList.remove("failure")
                }
                else{
                    fetchMsg.textContent = "Failed to Request Service"
                    fetchMsg.classList.add("failure")
                    fetchMsg.classList.remove("success")
                }
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
        }

    })
})