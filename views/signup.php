<div class="col-sm-6">
                    <!-- A page to sign up for the website -->
                    <h1>Register</h1>
                    <form action="../authenticate.php" method="post" class="well">
                        <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" name="username" class="form-control">
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
                                        <label>Gender (m/f)</label>
                                        <input type="text" name="gender" class="form-control">
                        </div>
                        <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                        </div>
                        <div><button type="submit" class="btn btn-default">Register</button></div>   
                    </form>
                </div>
<?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                    <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
<?php endif; ?>
            </div>


