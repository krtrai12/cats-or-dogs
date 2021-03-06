    <div>
        <body>
            <!-- The main page for the website when you are signed in.  View all of the posts on the website -->
            <h1>Welcome, <?php echo $_SESSION['username']?>!</h1>
            
            <section id="friendsfeed">
                
                <?php foreach ($selection as $row): ?>
                    <section id="feedPost">
                        <div id="post">
                            <section id="postPicture">
                                <?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                            </section>
                            
                            <section id="postReactions">
                                <p id= "caption"><?php echo ' @'; echo htmlentities($row['posted_by'], ENT_QUOTES, 'utf-8'); echo ': '; echo htmlentities($row['caption'], ENT_QUOTES, 'utf-8'); ?></p>
                                <p id="time"><?php echo $row['timestamp']; ?></p>
        
                                <?php $result = $user->getComments($row['post_id']);
                                
                                foreach ($result as $rowc): ?>
                                    <p id= "comments"><?php echo ' @'; echo htmlentities($rowc['comment_by'], ENT_QUOTES, 'utf-8'); echo ': '; echo htmlentities($rowc['content'], ENT_QUOTES, 'utf-8'); ?></p>
                                    <p id="time"><?php echo $rowc['timestamp']; ?></p>       
                                <?php endforeach; ?>
                            </section>
                            
                            <section id="postComment">
                                <form action="comments.php" method="post">
                                    <input type="text" name="newcomment" placeholder="Comment...">
                                    <input type="hidden" name="addComment" value="<?php echo $row['post_id']; ?>">
                                    <input type="submit" value="Submit">
                                </form>
                                
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
                            </section>   
                        </div>
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