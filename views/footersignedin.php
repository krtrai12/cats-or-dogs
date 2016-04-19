        <footer id="footerMenuSignedIn">
            <nav>
                <form action="../authenticate.php" method="post">
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '../about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li name="logout" <?php if ($_SERVER['REQUEST_URI'] == '../index.php') echo 'class="active"'; ?>><a href="../index.php">LOG OUT</a></li>
                </ul>
                </form>
            </nav>
        </footer>
    </body>
</html>