    
    <body>
        <section id="picture">
            <figure>
                <img src="https://www.junkfreejune.org.nz/themes/base/production/images/default-profile.png" alt="Profile Picture" width="200" height="200">
            </figure>
        </section>
        <section id="description">
            <p>Description Here</p>
        </section>
        <section id="info">
            <ul>
                <li><a href="edit.php">Edit Profile</a></li>
            </ul>
            <p>Username</p>
            <p>First/Last</p>
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