    
    <body>
        <div>
            <section id="top">
                <section id="picture">
                    <figure>
                        <img id="profilePic" src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">
                    </figure>
                    
                </section>
            
                <section id="info">
                    
                    <p><?php echo 'Name: '; echo $friendFirst; echo ' '; echo $friendLast; echo ' (@'; echo $_GET['friendUsername'];  echo ')'; ?></p>
                    <p><?php echo 'Gender: '; echo $friendGender; ?></p>
                    <p><?php if (isset($friendAnimal)) { echo 'Animal Choice: '; echo $friendAnimal; } else { echo '<i>Animal choice</i>'; } ?></p>
                    <p><?php if (isset($friendDescription)) { echo 'Description: '; echo $friendDescription; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
                
            <section id="rest">
                <section id="profileFeed" class="posts">
                    <?php foreach ($selection as $row): ?>
                        <form action="../friendPosts.php" method="post">
                            <div><?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                                <p><?php echo $row['caption']; ?></p>
                                <h6><?php echo "Posted by: "; echo $row['posted_by']; echo " at "; echo $row['timestamp']; ?></h6>
                            </div>
                        </form>
                        <div>
                        
                            <?php $result = $user->getComments($row['post_id']);
                            foreach ($result as $rowc): ?>
                                    <h6><?php echo $rowc['content']; ?></h6
                                    <h6><?php echo "Posted by: "; echo $rowc['comment_by']; echo " at "; echo $rowc['timestamp']; ?></h6>
                            <?php endforeach; ?>
                            
                            <section id="postComment">
                                <form action="comments.php" method="post">
                                    <?php $_SESSION['fromFriend'] = $_GET['friendUsername']; ?>
                                    <input type="text" name="newcomment" placeholder="Comment...">
                                    <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                    <input type="submit" value="Submit">
                                </form>
                            </section>
                        
                        </div>  
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