    
    <body>
        <div>
            <section id="top">
                <aside id="picture">
                    <figure>
                        <?php if (isset($profpic)) { echo '<img id="profilePic" height="200" width="200" src="data:image;base64,' . $profpic . ' "> '; } else { 
                        echo '<img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">'; } ?>
                    </figure>
                </aside>
            
                <section id="info">
                    <a href="editController.php"><img id="editUsername" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a><label id="edits">Edit Personal Information:</label>
                    <a href="profpicController.php"><img id="editPic" src="views/Images/edit_icon.png" width="20" height="20" alt="Edit"></a><label id="edits">Edit Picture:</label>
                    <p id="infoSect"><?php echo 'Name: '; echo $_SESSION['first']; echo ' '; echo $_SESSION['last']; echo ' (@'; echo $_SESSION['username']; echo ')'; ?></p>
                    <p id="infoSect"><?php echo 'Gender: '; echo $_SESSION['gender']; ?></p>
                    <p id="infoSect"><?php if (isset($_SESSION['animalchoice'])) { echo 'Animal Choice: '; echo $_SESSION['animalchoice']; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p id="infoSect"><?php if (isset($_SESSION['description'])) { echo 'Description: '; echo $_SESSION['description']; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
            <section id="rest">
                <section id="profilePost">
                    <form id="profilePostForm" action="profileController.php" method="post" enctype="multipart/form-data">
                        <label>Post about your pet:</label><br>
                            <input id="file" type="file" name="image">
                            <input id="text" type="text" name="newpost" placeholder="Description...">
                            <input id="submit" type="submit" name="add" value="Upload">
                    </form>
                </section>
                
                <section id="profileFeed" class="posts">
                    <?php foreach ($selection as $row): ?>
                        <section id="feedPost">
                            <div id="post">
                                <section id="postPicture">
                                    <?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                                </section>
                                
                                <section id="postReactions">
                                    <p id= "caption"><?php echo ' @'; echo $row['posted_by']; echo ': '; echo $row['caption']; ?></p><p id="time"><?php echo $row['timestamp']; ?></p>
            
                                    <?php $result = $user->getComments($row['post_id']);
                                    
                                    foreach ($result as $rowc): ?>
                                        <p id= "comments"><?php echo ' @'; echo $rowc['comment_by']; echo ': '; echo $rowc['content']; ?></p><p id="time"><?php echo $rowc['timestamp']; ?></p>       
                                    <?php endforeach; ?>
                                </section>
                            
                                <form action="profileController.php" method="post">
                                    <input type="hidden" name="postid" value="<?php echo $row['post_id']; ?>">
                                    <button type="submit" name="delete" value="Delete">Delete</button>
                                </form>
                            
                                <?php if ($row['reported'] == 0) { echo
                                    '<form action="profileController.php" method="post">
                                    <input type="hidden" name="postid" value="' . $row['post_id'] . '">
                                    <input type="hidden" name="dateposted" value="' . $row['timestamp'] . '">
                                    <input type="submit" name="report" value="Report">
                                    </form>'; } else { echo
                                    '<form><input type="submit" name="report" disabled="disabled" value="Reported"></form>'; } ?>
                                
                                <form action="profileController.php" method="post">
                                    <input type="text" name="newcomment" placeholder="Comment">
                                    <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                    <button type="submit" name="comment" value="Comment">Add Comment</button>
                                </form>
                            </div>
                        </section>
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