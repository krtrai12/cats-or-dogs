<div class="col-sm-6">
                    <h1>Register</h1>
                    <form action="../authenticate.php" method="post" class="well">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="text" name="first" class="form-control" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="last" class="form-control" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <input type="text" name="gender" class="form-control" placeholder="Gender">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-default">Register</button>
                    </form>
                </div>
<?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                    <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
<?php endif; ?>
            </div>


