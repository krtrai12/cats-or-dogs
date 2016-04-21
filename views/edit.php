    <body>
            <h1>Edit Profile</h1>
            <form action="../profileInformation.php" method="post" class="well">
                <div class="form-group">
                    <label>Description Here</label>
                    <input type="text" name="description" class="form-control">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text" name="first" class="form-control">
                </div>
                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text" name="last" class="form-control">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <input type="text" name="gender" class="form-control">
                </div>
                <div class="form-group">
                    <label>Animal Choice</label>
                    <input type="text" name="animalchoice" class="form-control">
                </div>
                <div><button type="submit" class="btn btn-default">Save Changes</button></div>   
            </form>
            <form>
            <div><a href="profileController.php"><button type="submit" class="btn btn-default">Back</button></a></div>
            </form>
        </div>
    </body>