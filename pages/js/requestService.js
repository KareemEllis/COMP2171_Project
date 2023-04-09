window.addEventListener('load', ()=>{
    const form = document.querySelector("form")
    const details = document.querySelector("#details")

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
            console.log(document.querySelector("#apptTime").value)

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
                //window.location.replace("./.php");
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
        }

    })
})