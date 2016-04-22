        <footer id="footerMenuSignedIn">
            <?php require_once('searchdb.php')?>
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/mainController.php') echo 'class="active"'; ?>><a href="../mainController.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/profileController.php') echo 'class="active"'; ?>><a href="../profileController.php">PROFILE</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/index.php') { unset($_SESSION['username']); unset($_SESSION['first']); unset($_SESSION['last']);
                            unset($_SESSION['gender']); unset($_SESSION['animalchoice']); unset($_SESSION['description']); header('Location: ./'); exit(); } ?>><a href="../index.php">LOG OUT</a></li>
                    <form class="col-sm-4">
                        <div class="dropdown">
                            <input type="text" class="form-control" data-toggle="dropdown" id="people" placeholder="Search people" autofocus>
                            <ul class="dropdown-menu" id="people-dropdown"></ul>
                        </div>
                    </form>
                </ul>
            </nav>
        </footer>
    </body>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../views/searchforfriends.js"></script>
</html>