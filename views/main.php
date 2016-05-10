    <div>
        <body>
            <h1>Welcome, <?php echo $_SESSION['username']?>!</h1>
            <section id="friendsfeed">
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
                        <?php if ($_SESSION['username'] == $row['posted_by']) { echo
                                    '<form action="mainController.php" method="post">
                                    <input type="hidden" name="postid" value="' . $row['post_id'] . '">
                                    <input type="submit" name="delete" value="Delete">
                                    </form>'; } ?>
                                
                        <?php if ($row['reported'] == 0) { echo
                                    '<form action="mainController.php" method="post">
                                    <input type="hidden" name="postid" value="' . $row['post_id'] . '">
                                    <input type="hidden" name="dateposted" value="' . $row['timestamp'] . '">
                                    <input type="submit" name="report" value="Report">
                                    </form>'; } else { echo
                                    '<form><input type="submit" name="report" disabled="disabled" value="Reported"></form>'; } ?>   
                    </div>
                    
                    <section id="postComment">
                            <form action="comments.php" method="post">
                                <input type="text" name="newcomment" placeholder="Comment...">
                                <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                <input type="submit" value="Submit">
                            </form>
                        </section>
                </section>
                <?php endforeach; ?> 
            </section>
            <section id="suggestions">
                <div>
                    <p>Suggested Followers:</p>
                    <ul>
                        <p>Jokes, You Have No Friends.</p>
                    </ul>
                </div>
            </section>
        </body>
    </div>