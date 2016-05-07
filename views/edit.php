    <body>
            <h1>Edit Profile</h1>
            <form action="editController.php" method="post">
                <div class="form-group">
                    <label>Description Here</label>
                    <input type="text" name="newdescription"
                        <?php if (isset($_SESSION['description'])) echo 'value=' . $_SESSION['description']; ?>>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="newfirst"
                        <?php if (isset($_SESSION['first'])) { echo 'value=' . $_SESSION['first']; } ?>>
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="newlast"
                        <?php if (isset($_SESSION['last'])) { echo 'value=' . $_SESSION['last']; } ?>>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="newgender"
                        <?php if (isset($_SESSION['gender'])) { echo 'value=' . $_SESSION['gender']; } ?>>
                </div>
                <div class="form-group">
                    <label>Animal Choice</label>
                    <input type="text" name="newanimalchoice"
                        <?php if (isset($_SESSION['animalchoice'])) { echo 'value=' . $_SESSION['animalchoice']; } ?>>
                </div>
                <div><button type="submit">Save Changes</button></div>   
            </form>
                <div><a href="profileController.php"><button>Back</button></a></div>
        </div>
        <?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                        <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
        <?php endif; ?>
    </body>