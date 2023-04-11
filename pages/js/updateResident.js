window.addEventListener('load', () => {
    const form = document.querySelector("#update_resident_form");
    console.log(form);

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        const formData = new FormData(form);

        fetch('./residentProcessing.php', {
            method: 'POST',
            body: formData
        })
            .then(response => {
                if (response.ok) { return response.text() }
                else { return Promise.reject('Something went wrong with the fetch request!') }
            })
            .then(data => {
                console.log(data);
                alert('Record Updated Successfully');
                window.location.replace("./residentProcessing.php");
            })
            .catch(error => {
                console.log(`ERROR: ${error}`)
            })
    })
})
