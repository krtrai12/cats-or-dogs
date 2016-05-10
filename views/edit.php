    <body>
            <h1>Edit Profile</h1>
            <form action="editController.php" method="post">
                <div class="form-group">
                    <label>Description Here</label>
                    <input type="text" name="newdescription"
                        <?php if (isset($_SESSION['description'])) echo 'value=' . htmlentities($_SESSION['description'], ENT_QUOTES, 'utf-8'); ?>>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="newfirst"
                        <?php if (isset($_SESSION['first'])) { echo 'value=' . htmlentities($_SESSION['first'], ENT_QUOTES, 'utf-8'); } ?>>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="newlast"
                        <?php if (isset($_SESSION['last'])) { echo 'value=' . htmlentities($_SESSION['last'], ENT_QUOTES, 'utf-8'); } ?>>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="newgender"
                        <?php if (isset($_SESSION['gender'])) { echo 'value=' . htmlentities($_SESSION['gender'], ENT_QUOTES, 'utf-8'); } ?>>
                </div>
                <div class="form-group">
                    <label>Animal Choice</label>
                    <input type="text" name="newanimalchoice"
                        <?php if (isset($_SESSION['animalchoice'])) { echo 'value=' . htmlentities($_SESSION['animalchoice'], ENT_QUOTES, 'utf-8'); } ?>>
                </div>
                <div><button type="submit">Save Changes</button></div>   
            </form>
                <div><div id="backButton"><a href="profileController.php"><button>Back</button></a></div></div>
        </div>
        <?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                        <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
        <?php endif; ?>
    </body>