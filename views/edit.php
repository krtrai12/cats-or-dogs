    <body>
            <h1>Edit Profile</h1>
            <form action="../profileInformation.php" method="post" class="well">
                <div class="form-group">
                    <label>Description Here</label>
                    <input type="text" name="description"
                        <?php if (isset($_SESSION['description'])) echo 'placeholder=' . $_SESSION['description'] . ' '; ?> class="form-control">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first"
                        <?php if (isset($_SESSION['first'])) echo 'placeholder=' . $_SESSION['first'] . ' '; ?>class="form-control">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last"
                        <?php if (isset($_SESSION['last'])) echo 'placeholder=' . $_SESSION['last'] . ' '; ?>class="form-control">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender"
                        <?php if (isset($_SESSION['gender'])) echo 'placeholder=' . $_SESSION['gender'] . ' '; ?>class="form-control">
                </div>
                <div class="form-group">
                    <label>Animal Choice</label>
                    <input type="text" name="animalchoice"
                        <?php if (isset($_SESSION['animalchoice'])) echo 'placeholder=' . $_SESSION['animalchoice'] . ' '; ?>class="form-control">
                </div>
                <div><button type="submit" class="btn btn-default">Save Changes</button></div>   
            </form>
            <form>
            <div><a href="./profileController.php"><button type="submit" class="btn btn-default">Back</button></a></div>
            </form>
        </div>
        <?php if (isset($_SESSION['message'])): ?>
                                <div class="row">
                                                <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                                </div>
                <?php endif; ?>
    </body>