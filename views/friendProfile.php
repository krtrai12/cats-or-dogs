    
    <body>
        <div>
            <section id="top">
                <aside id="picture">
                    <figure>
                        <?php
                        $profilepic = $user->getProfilePicture($_GET['friendUsername']);
                        if (isset($profilepic)) { echo '<img id="profilePic" height="200" width="200" src="data:image;base64,' . $profilepic . ' "> '; } else { 
                        echo '<img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">'; } ?>
                    </figure>
                </aside>
            
                <section id="info">
                    <p id="infoSect"><?php echo 'Name: '; echo $friendFirst; echo ' '; echo $friendLast; echo ' (@'; echo $_GET['friendUsername'];  echo ')'; ?></p>
                    <p id="infoSect"><?php echo 'Gender: '; echo $friendGender; ?></p>
                    <p id="infoSect"><?php if (isset($friendAnimal)) { echo 'Animal Choice: '; echo $friendAnimal; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p id="infoSect"><?php if (isset($friendDescription)) { echo 'Description: '; echo $friendDescription; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
                
            <section id="rest">
                <section id="friendProfFeed" class="posts">
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
                                
                                <section id="postComment">
                                    <form action="comments.php" method="post">
                                        <?php $_SESSION['fromFriend'] = $_GET['friendUsername']; ?>
                                        <input type="text" name="newcomment" placeholder="Comment...">
                                        <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                        <input type="submit" value="Submit">
                                    </form>
                                    
                                    <?php if ($row['reported'] == 0) { echo
                                    '<form action="friendProfileController.php" method="post">
                                    <input type="hidden" name="postid" value="' . $row['post_id'] . '">
                                    <input type="submit" name="report" value="Report">
                                    </form>'; } else { echo
                                    '<form><input type="submit" name="report" disabled="disabled" value="Reported"></form>'; } ?> 
                                </section>
                            </div>
                        </section> 
                    <?php endforeach; ?>  
                </section>
                <?php if (isset($_SESSION['message'])): ?>
                    <div class="row">
                        <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                    </div>
                <?php endif; ?>
            </section> 
        </div>
    </body>