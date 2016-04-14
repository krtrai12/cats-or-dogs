        <footer id="footerMenuSignedOut">
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/home.php') echo 'class="active"'; ?>><a href="views/home.php">HOME</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/aboutus.php') echo 'class="active"'; ?>><a href="views/aboutus.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '/signup.php') echo 'class="active"'; ?>><a href="views/signup.php">SIGN UP</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>