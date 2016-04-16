        <footer id="footerMenuSignedIn">
            <nav>
                <ul>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '../about.php') echo 'class="active"'; ?>><a href="../about.php">ABOUT US</a></li>
                    <li <?php if ($_SERVER['REQUEST_URI'] == '../index.php') echo 'class="active"'; ?>><a href="../index.php">LOG OUT</a></li>
                </ul>
            </nav>
        </footer>
    </body>
</html>