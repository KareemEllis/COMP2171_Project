window.addEventListener('load', ()=>{
    const notices = document.querySelectorAll(".notice")
    
    const modal = document.querySelector('dialog')
    const closeModalBtn = document.querySelector('dialog .close')
    const confirmModalBtn = document.querySelector('dialog .confirm')

    let noticeComponent = null
    let noticeToDelete = ''

    //Add a fade to bottom of overflowed content
    notices.forEach(notice => {
        const content = notice.querySelector(".content")
        if (content.scrollHeight > content.clientHeight) {
            // if the content has exceeded the maximum height
            content.classList.add("overflowed")
        }
    });

    //CLOSE MODAL
    closeModalBtn.addEventListener('click', () => {
        modal.close()
        noticeToDelete = ''
    })

    deleteNotice = (childElement, noticeID) => {
        modal.showModal()
        noticeToDelete = noticeID
        noticeComponent = childElement.parentElement.parentElement
        
    }

    confirmModalBtn.addEventListener('click', () => {
        const formData = new FormData()
        console.log(`DELETING NOTICE #${noticeToDelete}`)
        formData.append('id', noticeToDelete)
 
        fetch('./noticeBoard.php', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if(response.ok){return response.text()}
            else{return Promise.reject('Something was wrong with fetch request!')}
        })
        .then(data => {
            console.log(data)
            noticeComponent.remove()
            modal.close()
        })
        .catch(error => {
            console.log(`ERROR: ${error}`)
            alert("Failed to delete notice")
        })
    })


})