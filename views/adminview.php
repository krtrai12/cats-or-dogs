    <div>
        <body>
            <h1>Reported Posts</h1>
            <section id="friendsfeed">
                <?php foreach ($selection as $row): ?>
                <section id="feedPost">
                    <div><?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                        <p><?php echo ' @'; echo $_SESSION['username']; echo ': '; echo $row['caption']; ?></p>
                        <h6><?php echo "Posted by: "; echo $row['posted_by']; echo " at "; echo $row['timestamp']; ?></h6>
                    </div>
                    <div>
                        <?php $result = $user->getComments($row['post_id']);
                        foreach ($result as $rowc): ?>
                                <h6><?php echo $rowc['content']; ?></h6>
                                <h6><?php echo "Posted by: "; echo $rowc['comment_by']; echo " at "; echo $rowc['timestamp']; ?></h6>
                                
                        <?php endforeach; ?>
                        
                        <form action="admin.php" method="post">
                            <input type="hidden" name="postid" value="<?php echo $row['post_id'] ?>">
                            <input type="submit" name="delete" value="Remove Post">
                        </form>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="postid" value="<?php echo $row['post_id'] ?>">
                            <input type="submit" name="unreport" value="Keep Post">
                        </form>
                    </div>
                </section>
                <?php endforeach; ?> 
            </section>
        </body>
    </div>