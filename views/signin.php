<div class="row">
                <div class="col-sm-6">
                    <h3>Login</h3>
                    <form action="views/authenticate.php" method="post" class="well">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <input type="hidden" name="task" value="login">
                        <button type="submit" class="btn btn-default">Login</button>
                    </form>
<?php if (isset($_SESSION['message'])): ?>
                <div class="row">
                    <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                </div>
<?php endif; ?>
            </div>
