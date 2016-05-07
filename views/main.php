    <div>
        <body>
            <h1>Welcome, <?php echo $_SESSION['username']?>!</h1>
            <section id="friendsfeed">
                <?php foreach ($selection as $row): ?>
                    <div><?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                        <p><?php echo $row['caption']; ?></p>
                        <h6><?php echo "Posted by: "; echo $row['posted_by']; echo " at "; echo $row['timestamp']; ?></h6>
                    </div>
                    <div>
                        <?php //require('/var/www/html/comments.php') ?>
                        <section id="postComment">
                            <form action="comments.php" method="post">
                                <input type="text" name="newcomment" placeholder="Comment...">
                                <input type="submit" name="addComment" value="<?php echo $row['post_id']; ?>">
                            </form>
                        </section>
                        
                        <?php $result = $user->getComments($row['post_id']);
                        foreach ($result as $row): ?>
                                <p><?php echo $row['content']; ?></p>
                                <h6><?php echo "Posted by: "; echo $row['comment_by']; echo " at "; echo $row['timestamp']; ?></h6>
                        <?php endforeach; ?> 
                        
                    </div>
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