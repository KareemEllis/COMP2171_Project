window.addEventListener('load', ()=>{

    const btnAccept = document.querySelector(".btn-accept")
    const btnReject = document.querySelector(".btn-reject")
    const btnPending = document.querySelector(".btn-pending")
    const btnComplete = document.querySelector(".btn-complete")
    const ID = document.querySelector(".ID")

    btnAccept.addEventListener("click", ()=>{
        console.log("Accepting Request")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'In Progress')

        fetch('./requestStatusChange.php', {
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
        console.log("Rejecting Request")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'Rejected')

        fetch('./requestStatusChange.php', {
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

    btnPending.addEventListener("click", ()=>{
        console.log("Pending Request")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'Pending')

        fetch('./requestStatusChange.php', {
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

    btnComplete.addEventListener("click", ()=>{
        console.log("Completed Request")

        const formData = new FormData();
        formData.append('ID', `${ID.textContent}`)
        formData.append('status', 'Completed')

        fetch('./requestStatusChange.php', {
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