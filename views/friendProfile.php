    
    <body>
        <div>
            <section id="top">
                <section id="picture">
                    <figure>
                        <img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">
                        <!--<a href="editController.php"><img id="editPic" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a></p>-->
                    </figure>
                    <!--<p><?php// echo '@'; echo $_SESSION['username']; ?></p>-->
                </section>
            
                <section id="info">
                    <a href="editController.php"><img id="editUsername" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>
                    <p><?php echo 'Name: '; echo $_SESSION['friendFirst']; echo ' '; echo $_SESSION['friendLast']; echo ' (@'; echo $_SESSION['friendUsername']; echo ')'; ?>
                    <!--<a href="editController.php"><img src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>--></p>
                    <p><?php echo 'Gender: '; echo $_SESSION['friendGender']; ?></p>
                    <p><?php if (isset($_SESSION['friendAnimalChoice'])) { echo 'Animal Choice: '; echo $_SESSION['friendAnimalChoice']; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p><?php if (isset($_SESSION['friendDescription'])) { echo 'Description: '; echo $_SESSION['friendDescription']; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
            <section id="rest">
                <section id="profilePost">

                        <label>Post about your pet:</label><br>
                            <input type="text" name="newpost" placeholder="Description...">
                        <button type="submit" name="add" value="Submit">Submit</button>

                </section>
                
                <section id="profileFeed" class="posts">
                    <p> This is where my posts go:</p>
                    <section></section>
                    <?php foreach ($selection as $profilepost):
                    // display all of your posts from the database here ?>
                    
                    <?php endforeach; ?>
                </section>
            </section> 
        </div>
    </body>