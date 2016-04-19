        <footer id="footerMenuSignedIn">
            <?php require_once('searchDB.php')?>
            <nav>
<<<<<<< HEAD
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/index.php') { unset($_SESSION['user_id']); header('Location: ./'); exit(); } ?>><a href="../index.php">LOG OUT</a></li>
                </ul>
=======
                <form action="../authenticate.php" method="post">
                    <ul>
                        <li <?php if ($_SERVER['REQUEST_URI'] == '../about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                        <li <?php if ($_SERVER['REQUEST_URI'] == '../index.php') echo 'class="active"'; unset($_SESSION['user_id']); ?>><a href="../index.php">LOG OUT</a></li>
                    </ul>
                </form>
                <form class="col-sm-4">
                    <div class="dropdown">
                        <input type="text" class="form-control" data-toggle="dropdown" id="people" placeholder="Search people" autofocus>
                        <ul class="dropdown-menu" id="people-dropdown"></ul>
                    </div>
                </form>
>>>>>>> origin/master
            </nav>
        </footer>
    </body>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../views/searchForFriends.js"></script>
</html>