    <div>
        <body>
            <h1>Reported Posts</h1>
            <section id="friendsfeed">
                <?php foreach ($selection as $row): ?>
                <section id="feedPost">
                    <div><?php echo '<img height="300" width="300" src="data:image;base64,' . $row['image'] . ' "> '; ?>
                        <p><?php echo ' @'; echo htmlentities($_SESSION['username'], ENT_QUOTES, 'utf-8'); echo ': '; echo htmlentities($row['caption'], ENT_QUOTES, 'utf-8'); ?></p>
                        <h6><?php echo "Posted by: "; echo htmlentities($row['posted_by'], ENT_QUOTES, 'utf-8'); echo " at "; echo $row['timestamp']; ?></h6>
                    </div>
                    <div>
                        <?php $result = $user->getComments($row['post_id']);
                        foreach ($result as $rowc): ?>
                                <h6><?php echo htmlentities($rowc['content'], ENT_QUOTES, 'utf-8'); ?></h6>
                                <h6><?php echo "Posted by: "; echo htmlentities($rowc['comment_by'], ENT_QUOTES, 'utf-8'); echo " at "; $rowc['timestamp']; ?></h6>
                                
                        <?php endforeach; ?>
                        
                        <form action="admin.php" method="post">
                            <input type="hidden" name="postid" value="<?php echo $row['post_id']; ?>">
                            <input type="submit" name="delete" value="Remove Post">
                        </form>
                        <form action="admin.php" method="post">
                            <input type="hidden" name="postid" value="<?php echo $row['post_id']; ?>">
                            <input type="hidden" name="dateposted" value="<?php echo $row['timestamp']; ?>">
                            <input type="submit" name="unreport" value="Keep Post">
                        </form>
                    </div>
                </section>
                <?php endforeach; ?> 
            </section>
        </body>
    </div>