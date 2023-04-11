window.addEventListener('load', () => {

    const logout = document.querySelector("#logout")
    const user = document.querySelector("#user")

    const viewResidentsBtn = document.querySelector(".view-residents")
    const viewBlockLynxBtn = document.querySelector(".view-blockL")
    const viewBlockGenusBtn = document.querySelector(".view-blockG")
    const viewBlockPardusBtn = document.querySelector(".view-blockP")
    
    const filterFName = document.querySelector(".filter-fName")
    const filterMName = document.querySelector(".filter-mName")
    const filterlName = document.querySelector(".filter-lName")
    const filterPosition = document.querySelector(".filter-position")
    const filterNationality = document.querySelector(".filter-nationality")
    const filterRoom = document.querySelector(".filter-room")

    const downloadBtn = document.querySelector("#download button")

    const results = document.querySelector('#results')
    const resultContainer = document.querySelector("#results .container")

    const modal = document.querySelector('dialog')
    const closeModalBtn = document.querySelector('dialog .close')
    const confirmModalBtn = document.querySelector('dialog .confirm')
    const modalTypeText = document.querySelector('.reportType')
    const modalColumnsText = document.querySelector('.reportColumns')

    let viewType

    let spinner = '<div class="loader"></div>'

    //Change filter Button Colors when clicked
    let allFilterButtons = document.querySelectorAll(".filters button")
    
    allFilterButtons.forEach(btn => {
        btn.addEventListener('click', ()=>{
            btn.classList.toggle("on")
            btn.classList.toggle("off")
        })
    });

    //Download PDF FILE
    downloadBtn.addEventListener('click', () => {
        html2pdf()
        .from(results)
        .save()
    })

    //Generate Fetch Url Filter Parameters
    function getFilterParamters(){
        //The paramaters will be sent to php to query the Database with
        let firstName
        let middleInitial
        let lastName
        let position
        let nationality
        let roomNumber

        if(filterFName.classList.contains("on")){firstName = 'First Name'}
        else{firstName=''}

        if(filterMName.classList.contains("on")){middleInitial = 'Middle Initial'}
        else{middleInitial=''}

        if(filterlName.classList.contains("on")){lastName = 'Last Name'}
        else{lastName=''}

        if(filterPosition.classList.contains("on")){position = 'Position'}
        else{position=''}

        if(filterNationality.classList.contains("on")){nationality = 'Nationality'}
        else{nationality=''}

        if(filterRoom.classList.contains("on")){roomS = 'Room Number'}
        else{roomS=''}

        let parameters = `fname=${firstName}&mname=${middleInitial}&lname=${lastName}&position=${position}&nationality=${nationality}&room=${roomS}`
        
        return parameters
    }

    function getSelectedColumns(){
        let columns = "Resident ID"

        if(filterFName.classList.contains("on")){columns += ', First Name'}

        if(filterMName.classList.contains("on")){columns += ', Middle Initial'}

        if(filterlName.classList.contains("on")){columns += ', Last Name'}

        if(filterPosition.classList.contains("on")){columns += ', Position'}

        if(filterNationality.classList.contains("on")){columns += ', Nationality'}

        if(filterRoom.classList.contains("on")){columns += ', Room Number'}
        
        return columns
    }
    
    function fetchTable(){
        resultContainer.innerHTML = `<div>${spinner}</div>`
        
        fetch(`../pages/reportGeneration.php?view=${viewType}&${getFilterParamters()}`)
        .then(response => {
            if(response.ok){return response.text()}
            else{return Promise.reject('Something was wrong with fetch request!')}
        })
        .then(data => {
            resultContainer.innerHTML = `<h1>Report of ${viewType}</h1>`
            resultContainer.innerHTML += data
            console.log(data)
        })
        .catch(error => {
            console.log(`ERROR: ${error}`)
        })
    }


//******************************************COMPLETED******************************************
    //CLOSE MODAL
    closeModalBtn.addEventListener('click', () => {
        modal.close()
    })

    //Confirm generating the report
    confirmModalBtn.addEventListener('click', () => {
        fetchTable()
        modal.close()
        
    })
//******************************************COMPLETED******************************************
    //VIEW RESIDENTS REPORT
    viewResidentsBtn.addEventListener('click', ()=>{
        viewType = 'Resident'
        modalTypeText.innerHTML = "<h4>REPORT TYPE:</h4> ALL RESIDENTS"
        modalColumnsText.innerHTML = "<h4>COLUMNS:</h4> " + getSelectedColumns()
        modal.showModal()

    })

    //VIEW BLOCK G REPORT
    viewBlockGenusBtn.addEventListener('click', ()=>{
        viewType = 'Genus'
        modalTypeText.innerHTML = "<h4>REPORT TYPE:</h4> GENUS BLOCK"
        modalColumnsText.innerHTML = "<h4>COLUMNS:</h4> " + getSelectedColumns()
        modal.showModal()
    })

    //VIEW BLOCK L REPORT
    viewBlockLynxBtn.addEventListener('click', ()=>{
        viewType = 'Lynx'
        modalTypeText.innerHTML = "<h4>REPORT TYPE:</h4> LYNX BLOCK"
        modalColumnsText.innerHTML = "<h4>COLUMNS:</h4> " + getSelectedColumns()
        modal.showModal()
    })

    //VIEW BLOCK P REPORT
    viewBlockPardusBtn.addEventListener('click', ()=>{
        viewType = 'Pardus'
        modalTypeText.innerHTML = "<h4>REPORT TYPE:</h4> PARDUS BLOCK"
        modalColumnsText.innerHTML = "<h4>COLUMNS:</h4> " + getSelectedColumns()
        modal.showModal()
    })
})