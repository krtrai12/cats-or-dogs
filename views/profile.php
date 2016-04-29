    
    <body>
        <div>
            <section id="top">
                <section id="picture">
                    <figure>
                        <img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">
                        <a href="editController.php"><img id="editPic" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>
                    </figure>
                    <!--<p><?php// echo '@'; echo $_SESSION['username']; ?></p>-->
                </section>
            
                <section id="info">
                    <a href="editController.php"><img id="editUsername" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>
                    <p><?php echo 'Name: '; echo $_SESSION['first']; echo ' '; echo $_SESSION['last']; echo ' (@'; echo $_SESSION['username']; echo ')'; ?>
                    <!--<a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>--></p>
                    <p><?php echo 'Gender: '; echo $_SESSION['gender']; ?></p>
                    <p><?php if (isset($_SESSION['animalchoice'])) { echo 'Animal Choice: '; echo $_SESSION['animalchoice']; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p><?php if (isset($_SESSION['description'])) { echo 'Description: '; echo $_SESSION['description']; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
            <section id="rest">
                <section id="profilePost">
                    <form action="profileController.php" method="post">
                        <label>Post about your pet:</label><br>
                            <input type="text" name="newpost" placeholder="Description...">
                        <button type="submit" name="add" value="Submit">Submit</button>
                    </form>
                </section>
                
                <section id="profileFeed" class="posts">
                    <?php foreach ($selection as $row): ?>
                        <div><p><?php echo $row['caption']; ?></p>
                        <h6><?php echo "Posted by: "; echo $row['posted_by']; echo " at "; echo $row['timestamp']; ?></h6></div>
                        <button type="submit" name="delete" value="Delete">Delete</button>
                    <?php endforeach; ?>
                </section>
            </section>
            <?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                    <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
            <?php endif; ?>
        </div>
    </body>