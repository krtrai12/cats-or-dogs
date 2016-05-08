    
    <body>
        <div>
            <section id="top">
                <aside id="picture">
                    <figure>
                        <?php if (isset($profpic)) { echo '<img id="profilePic" height="200" width="200" src="data:image;base64,' . $profpic . ' "> '; } else { 
                        echo '<img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">'; } ?>
                        <a href="profpicController.php"><img id="editPic" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>
                    </figure>
                </aside>
            
                <section id="info">
                    <a href="editController.php"><img id="editUsername" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a>
                    <p><?php echo 'Name: '; echo $_SESSION['first']; echo ' '; echo $_SESSION['last']; echo ' (@'; echo $_SESSION['username']; echo ')'; ?></p>
                    <p><?php echo 'Gender: '; echo $_SESSION['gender']; ?></p>
                    <p><?php if (isset($_SESSION['animalchoice'])) { echo 'Animal Choice: '; echo $_SESSION['animalchoice']; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p><?php if (isset($_SESSION['description'])) { echo 'Description: '; echo $_SESSION['description']; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
            <section id="rest">
                <section id="profilePost">
                    <form action="profileController.php" method="post" enctype="multipart/form-data">
                        <label>Post about your pet:</label><br>
                            <input type="file" name="image">
                            <input type="text" name="newpost" placeholder="Description...">
                            <input type="submit" name="add" value="Upload">
                    </form>
                </section>
                <section id="profileFeed" class="posts">
                    <?php foreach ($selection as $row): ?>
                            <div><?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                                <p><?php echo $row['caption']; ?></p>
                                <h6><?php echo "Posted by: "; echo $row['posted_by']; echo " at "; echo $row['timestamp']; ?></h6>
                            </div>
                            <div>
                                <form action="profileController.php" method="post">
                                    <input type="hidden" name="postid" value="<?php echo $row['post_id']; ?>">
                                    <button type="submit" name="delete" value="Delete">Delete</button>
                                </form>
                                
                                <?php if ($row['reported'] == 0) { echo
                                    '<form action="profileController.php" method="post">
                                    <input type="hidden" name="postid" value="' . $row['post_id'] . '">
                                    <input type="submit" name="report" value="Report">
                                    </form>'; } else { echo
                                    '<form><input type="submit" name="report" disabled="disabled" value="Reported"></form>'; } ?>
                                
                                <form action="profileController.php" method="post">
                                    <input type="text" name="newcomment" placeholder="Comment">
                                    <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                    <button type="submit" name="comment" value="Comment">Add Comment</button>
                                </form>
                            </div>
                        
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