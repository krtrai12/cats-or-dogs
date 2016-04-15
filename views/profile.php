    
    <body>
        <section id="picture">
            <figure>
                <img src="profile_pic.jpg" alt="Profile Picture" width="200" height="200">
            </figure>
        </section>
        <section id="description">
            <p>Description Here</p>
        </section>
        <section id="info">
            <ul>
                <li><a href="edit.php">Edit Profile</a></li>
            </ul>
            <h6>Username/Name</h6>
            <p>Gender</p>
            <p>Animal Choice</p>
        </section>
        <section id="profilefeed">
            <fieldset>
                <label>Post about your pet:</label><br>
                <div>
                    <input type="text" name="newpost" placeholder="Description...">
                </div>
                <button type="submit" name="add" value="Submit">Submit</button>
            </fieldset>
            <div class="posts">
                <?php foreach ($selection as $profilepost):
                // display all of your posts from the database here ?>
                
                <?php endforeach; ?>
            </div>
        </section>
    </body>