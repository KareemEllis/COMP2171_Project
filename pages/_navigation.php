<aside class="sidebar">
    <ul>
        <a href="./dashboard.php" <?php if(basename($_SERVER['PHP_SELF']) == "dashboard.php"){echo "class=\"currentPage\"";} ?> >
            <li>
                <i class="material-icons">home</i>
                Home
            </li>
        </a>

        <a href="./applicationProcessing.php" <?php if(basename($_SERVER['PHP_SELF']) == "applicationProcessing.php"){echo "class=\"currentPage\"";} ?> >
            <li>
                <i class="material-icons">assignment</i>
                Application Processing
            </li>
        </a>

        <a href="./roomAssignment.php" <?php if(basename($_SERVER['PHP_SELF']) == "roomAssignment.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">hotel</i>
                Room Assignment
            </li>
        </a>

        <a href="./residentProcessing.php" <?php if(basename($_SERVER['PHP_SELF']) == "residentProcessing.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">people_outline</i>
                Residents
            </li>
        </a>

        <a href="./requestAddForm.php" <?php if(basename($_SERVER['PHP_SELF']) == "requestAddForm.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">build</i>
                Request Service
            </li>
        </a>

        <a href="./requestProcessing.php" <?php if(basename($_SERVER['PHP_SELF']) == "requestProcessing.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">home_repair_service</i>
                Process Requests
            </li>
        </a>

        <a href="./noticeBoard.php" <?php if(basename($_SERVER['PHP_SELF']) == "noticeBoard.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">web</i>
                Notice Board
            </li>
        </a>

        <a href="./reportGeneration.php" <?php if(basename($_SERVER['PHP_SELF']) == "reportGeneration.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">assessment</i>
                Report Generation
            </li>
        </a>

        <hr>
        <a href="./logout.php" <?php if(basename($_SERVER['PHP_SELF']) == "logout.php"){echo "class=\"currentPage\"";} ?>>
            <li>
                <i class="material-icons">exit_to_app</i>
                Logout
            </li>
        </a>
    </ul>
</aside>