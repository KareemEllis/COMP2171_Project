window.addEventListener('load', ()=>{

  const residentSearchBtn = document.querySelector(".residentSearchBtn");
  const requestSearchBtn = document.querySelector(".requestSearchBtn");
  const searchField = document.querySelector(".searchField");
  const tableBody = document.querySelector(".tableData");
  const deleteBtn = document.querySelector(".btn-delete");

  residentSearchBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("Searching for Request")
  
    const formData = new FormData();
    formData.append('ID', `${searchField.value}`)
    formData.append('search_type', 'residentID');
    console.log(formData)
    
    fetch('./requestSearch.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        return response.text()
      } else {
        return Promise.reject('something went wrong!')
      }
    })
    .then(data => {
      console.log(data)
      tableBody.innerHTML = ''; //clears all data from table
      tableBody.insertAdjacentHTML('beforeend', data);
    })
    .catch(error => console.log('There was an error: ' + error));
  })

  requestSearchBtn.addEventListener("click", (e)=>{
    e.preventDefault();
    console.log("Searching for Request")
  
    const formData = new FormData();
    formData.append('ID', `${searchField.value}`)
    formData.append('search_type', 'requestID');
    console.log(formData)
    
    fetch('./requestSearch.php', {
      method: 'POST',
      body: formData
    })
    .then(response => {
      if (response.ok) {
        return response.text()
      } else {
        return Promise.reject('something went wrong!')
      }
    })
    .then(data => {
      console.log(data)
      tableBody.innerHTML = ''; //clears all data from table
      tableBody.insertAdjacentHTML('beforeend', data);
    })
    .catch(error => console.log('There was an error: ' + error));
  })

  deleteBtn.addEventListener("click", ()=>{
    console.log("Deleting Rejected Applications")

    const formData = new FormData();
    formData.append('query', 'delete')

    fetch('./requestProcessing.php', {
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
  
  
  function sortTable(n) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("table");
    switching = true;
    // Set the sorting direction to ascending:
    dir = "asc"; 
    /* Make a loop that will continue until
    no switching has been done: */
    while (switching) {
      // Start by saying: no switching is done:
      switching = false;
      rows = table.rows;
      /* Loop through all table rows (except the
      first, which contains table headers): */
      for (i = 1; i < (rows.length - 1); i++) {
        // Start by saying there should be no switching:
        shouldSwitch = false;
        /* Get the two elements you want to compare,
        one from current row and one from the next: */
        x = rows[i].getElementsByTagName("td")[n];
        y = rows[i + 1].getElementsByTagName("td")[n];
        /* Check if the two rows should switch place,
        based on the direction, asc or desc: */
        if (dir == "asc") {
          if (Date.parse(x.innerHTML) > Date.parse(y.innerHTML)) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        } else if (dir == "desc") {
          if (Date.parse(x.innerHTML) < Date.parse(y.innerHTML)) {
            // If so, mark as a switch and break the loop:
            shouldSwitch = true;
            break;
          }
        }
      }
      if (shouldSwitch) {
        /* If a switch has been marked, make the switch
        and mark that a switch has been done: */
        rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
        switching = true;
        // Each time a switch is done, increase this count by 1:
        switchcount ++;      
      } else {
        /* If no switching has been done AND the direction is "asc",
        set the direction to "desc" and run the while loop again. */
        if (switchcount == 0 && dir == "asc") {
          dir = "desc";
          switching = true;
        }
      }
    }
  }

  document.getElementById("dateSubmittedHeader").addEventListener("click", ()=> {
    sortTable(0);
  });

})
  

