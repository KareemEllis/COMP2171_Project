
<head>
  <link rel="stylesheet" href="css/requestSearchForm.css">
</head>

<form method="POST" action="requestProcessing.php">
  <input class="searchField" type="text" name="search_query" placeholder="Search by Request ID or Resident ID">
  <button class="residentSearchBtn" type="submit" name="search_type" value="residentID">Search By Resident ID</button>
  <button class="requestSearchBtn" type="submit" name="search_type" value="requestID">Search By Request ID</button>
</form>
