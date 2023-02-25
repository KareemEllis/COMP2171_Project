window.addEventListener('load', ()=>{
    
    //FORM FIELDS
    const fName = document.querySelector("#fname")
    const lName = document.querySelector("#lname")
    const mName = document.querySelector("#initial")
    const dob = document.querySelector("#dob")
    const nationality = document.querySelector("#nationality")
    const gender = document.querySelector("#gender")
    const maritalStatus = document.querySelector("maritalStatus")
    const familyType = document.querySelector("#familyType")
    const homeAddress = document.querySelector("#homeAddress")
    const mailAddress = document.querySelector("#mailingAddress")
    const email = document.querySelector("#email")
    const id = document.querySelector("#id")
    const contactName = document.querySelector("#contactName")
    const contactRelationship = document.querySelector("#contactRelationship")
    const contactPhone = document.querySelector("#contactPhone")
    const contactAddress = document.querySelector("#contactAddress")
    const contactEmail = document.querySelector("#contactEmail")
    const levelOfStudy = document.querySelector("#level")
    const yearOfStudy = document.querySelector("#year")
    const programme = document.querySelector("#programme")
    const faculty = document.querySelector("#faculty")
    const school = document.querySelector("#school")
    const roomType = document.querySelector("#roomType")
    const roommate = document.querySelector("#rommatePref")

    const form = document.querySelector("form")
    const controls = document.querySelector(".controls")
    const msgBox = document.querySelector(".msg")
    const button = document.querySelector("button")

    form.addEventListener("submit", (e)=>{
        e.preventDefault()

        fieldsOK = true

        //CHECK IF INPUT FIELDS ARE EMPTY

        //FIRST NAME INPUT
        if(fName.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a First Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".fnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //LAST NAME INPUT
        if(lName.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a Last Name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".lnameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //DOB
        if(dob.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".dobMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Select your date of birth'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".dobMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //NATIONALITY INPUT
        if(nationality.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".nationalityMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your nationality'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".nationalityMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //HOME ADDRESS INPUT
        if(homeAddress.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".homeAddressMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your home address'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".homeAddressMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //MAILING ADDRESS INPUT
        if(mailAddress.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".mailAddressMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your mailing address'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".mailAddressMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //EMAIL INPUT
        let mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if(!email.value.trim().match(mailformat))
        {
            fieldsOK = false
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a valid email'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".emailMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Student ID INPUT
        if(id.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".idMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your student ID'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".idMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Contact Name INPUT
        if(contactName.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".contactNameMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter name'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".contactNameMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Contact Relationship INPUT
        if(contactRelationship.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".contactRelationshipMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter relationship'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".contactRelationshipMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Contact Phone INPUT
        if(contactPhone.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".contactPhoneMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter phone number'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".contactPhoneMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Contact Address INPUT
        if(contactAddress.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".contactAddressMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter Address'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".contactAddressMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }


        //CONTACT EMAIL INPUT
        if(!contactEmail.value.trim().match(mailformat))
        {
            fieldsOK = false
            msg = document.querySelector(".contactEmailMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter a valid email'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".contactEmailMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }


        //Year of study INPUT
        if(yearOfStudy.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".yearMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your year of study'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".yearMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Programme INPUT
        if(programme.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".programmeMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your programme'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".programmeMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //Faculty INPUT
        if(faculty.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".facultyMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your faculty'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".facultyMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }

        //School INPUT
        if(school.value.trim() == "")
        {
            fieldsOK = false
            msg = document.querySelector(".schoolMsg")
            msg.innerHTML = '<i class=\"material-icons\">&#xe000;</i>Enter your school'
            msg.classList.add('error')
        }
        else{
            msg = document.querySelector(".schoolMsg")
            msg.innerHTML = ''
            msg.classList.remove('error')
        }


        const formData = new FormData(form)


        //IF THE FORM FIELDS ARE OKAY
        if(fieldsOK)
        {
            controls.classList.remove('fail')
            msgBox.textContent = ""

            console.log("FIELDSOK")   
            fetch('./applicationForm.php', {
                method: 'POST',
                body: formData
            })
            .then(response => {
                if(response.ok){return response.text()}
                else{return Promise.reject('Something was wrong with fetch request!')}
            })
            .then(data => {
                console.log(data)
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
            
        }
        else
        {
            console.log("Fields not okay")
            msgBox.textContent = "Couldn't create new user"
            controls.classList.add('fail')
        }


    })
})