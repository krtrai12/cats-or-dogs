    <body>
        <div>
            <section id="rest">
                <section id="profilePost">
                    <form action="profpicController.php" method="post" enctype="multipart/form-data">
                        <label>Upload a Profile Picture:</label><br>
                            <input type="file" name="image">
                            <input type="submit" name="add" value="Upload">
                    </form>
                </section>
            </section>
            <div><a href="profileController.php"><button>Back</button></a></div>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                    <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
            <?php endif; ?>
        </div>
    </body>