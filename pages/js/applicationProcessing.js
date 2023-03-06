window.addEventListener('load', ()=>{
    const btnConvert = document.querySelector(".btn-convert")
    const btnDelete = document.querySelector(".btn-delete")

    btnConvert.addEventListener("click", ()=>{
        console.log("Converting to residents")

        const formData = new FormData();
        formData.append('query', 'convert')

        fetch('./applicationProcessing.php', {
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

    btnDelete.addEventListener("click", ()=>{
        console.log("Deleting Rejected Applications")

        const formData = new FormData();
        formData.append('query', 'delete')

        fetch('./applicationProcessing.php', {
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