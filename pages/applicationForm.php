<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>George Alleyne Hall Application</title>
    <link rel="stylesheet" href="./css/applicationForm.css">
</head>
<body>
    <main>
        <form action="" method="post">
            <header>
                <img src="../resources/logo.png" alt="George Alleyne Hall Logo" srcset="">
                <h1>Hall Application Form</h1>
            </header>
            <div class="name">
                <div class="box">
                    <label>First Name <span class="required">*</span></label>
                    <input type="text" name="fname" id="fname">
                </div>
                <div class="box">
                    <label>Last Name <span class="required">*</span></label>
                    <input type="text" name="lname" id="lname">
                </div>
            </div>

            <label>Middle Initial</label>
            <input type="text" name="initial" id="initial">

            <label>DOB <span class="required">*</span></label>
            <input type="date" name="dob" id="dob">

            <label>Nationality <span class="required">*</span></label>
            <input type="text" name="nationality" id="nationality">
            
            <label>Gender</label>
            <select name="gender" id="gender">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            
            <label>Marital Status <span class="required">*</span></label>
            <select name="maritalStatus" id="maritalStatus">
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Widowed">Widowed</option>
                <option value="Divorced">Divorced</option>
                <option value="Separated">Separated</option>
            </select>
            
            <label>Family Type <span class="required">*</span></label>
            <select name="familyType" id="familyType">
                <option value="Nuclear">Nuclear</option>
                <option value="Single-parent">Single-parent</option>
                <option value="Extended">Extended</option>
            </select>
            
            <label>Home Address <span class="required">*</span></label>
            <textarea name="homeAddress" id="homeAddress" cols="30" rows="10"></textarea>
            
            <label>Mailing Address <span class="required">*</span></label>
            <textarea name="mailingAddress" id="mailingAddress" cols="30" rows="10"></textarea>
            
            <label>Email Address <span class="required">*</span></label>
            <input type="email" name="email" id="email">
            
            <label>Student ID <span class="required">*</span></label>
            <input type="number" name="id" id="id">
            
            <label>Contact</label>
            <hr>
            <div class="contact">
                <label>Name <span class="required">*</span></label>
                <input type="text" name="contactName" id="contactID">
                <label>Relationship <span class="required">*</span></label>
                <input type="text" name="contactRelationship" id="contactRelationship">
                <label>Phone <span class="required">*</span></label>
                <input type="tel" name="contactPhone" id="contactPhone">
                <label>Address <span class="required">*</span></label>
                <textarea name="contactAddress" id="contactAddress" cols="30" rows="10"></textarea>
                <label>Email <span class="required">*</span></label>
                <input type="email" name="contactEmail" id="contactEmail">
            </div>
            
            <label>Level of Study <span class="required">*</span></label>
            <select name="level" id="level">
                <option value="Undergraduate">Undergraduate</option>
                <option value="Graduate">Graduate</option>
            </select>
            
            <label>Year of Study <span class="required">*</span></label>
            <input type="number" name="year" id="year">
            
            <label>Programme <span class="required">*</span></label>
            <input type="text" name="programme" id="programme">
            
            <label>Faculty <span class="required">*</span></label>
            <input type="text" name="faculty" id="faculty">
            
            <label>School <span class="required">*</span></label>
            <input type="text" name="school" id="school">
            
            <label>Room Type <span class="required">*</span></label>
            <select name="roomType" id="roomType">
                <option value="Single">Single</option>
                <option value="Double">Double</option>
            </select>
            
            <label>Roommate Preference</label>
            <input type="text" name="roommatePref" id="roommatePref">

            <button>Submit Application</button>
        </form>
        
    </main>
</body>
</html>