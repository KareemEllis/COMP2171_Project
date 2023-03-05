window.addEventListener('load', ()=>{

    const btnAccept = document.querySelector(".btn-accept")
    const btnReject = document.querySelector(".btn-reject")
    const ID = document.querySelector(".ID")

    btnAccept.addEventListener("click", ()=>{
        console.log("Accepting Application")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'Accepted')

        fetch('./applicationStatusChange.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if(response.ok){return response.text()}
            else{return Promise.reject('Something was wrong with fetch request!')}
        })
        .then(data => {
            console.log(data)
            location.reload()
        })
        .catch(error => {
            console.log(`ERROR: ${error}`)
        })
    })

    btnReject.addEventListener("click", ()=>{
        console.log("Rejecting Application")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'Rejected')

        fetch('./applicationStatusChange.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if(response.ok){return response.text()}
            else{return Promise.reject('Something was wrong with fetch request!')}
        })
        .then(data => {
            console.log(data)
            location.reload()
        })
        .catch(error => {
            console.log(`ERROR: ${error}`)
        })
    })

})