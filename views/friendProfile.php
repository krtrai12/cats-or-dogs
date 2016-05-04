    
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
                    <p><?php if (isset($friendAnimal)) { echo 'Description: '; echo $friendDescription; } else { echo '<i>Your Description</i>'; } ?></p>
                </section>
            </section>
            
                
                <section id="profileFeed" class="posts">
                    <p> This is where posts go:</p>
                    <section></section>
                    <?php foreach ($selection as $profilepost):
                    // display all of your posts from the database here ?>
                    
                    <?php endforeach; ?>
                </section>
            </section> 
        </div>
    </body>