    
    <body>
        <section id="picture">
            <figure>
                <img src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
            </figure>
        </section>
        <section id="info">
            <div>
                <p><?php if (isset($_SESSION['username'])) { echo '<p>' . $_SESSION['username'] . '</p>' } else { echo '<i>Description Here</i>' } ?>
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
                <p><i>Username</i>
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
                <p><i>First/Last</i>
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
                <p><i>Gender</i>
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
                <p><i>Animal Choice</i>
                <a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
            </div>
        </section>
        <section id="profilefeed">
            <fieldset>
                <label>Post about your pet:</label><br>
                <div>
                    <input type="text" name="newpost" placeholder="Description...">
                </div>
                <button type="submit" name="add" value="Submit">Submit</button>
            </fieldset>
            <div class="posts">
                <?php foreach ($selection as $profilepost):
                // display all of your posts from the database here ?>
                
                <?php endforeach; ?>
            </div>
        </section>
    </body>