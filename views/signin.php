<div class="row">
                <!-- A page to input your credentials and sign in. -->
                <div class="col-sm-6">
                    <h1>Login</h1>
                    <form action="../authenticate.php" method="post" class="well">
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="signinusername" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="signinpassword" class="form-control">
                        </div>
                        <div>
                        <input type="hidden" name="task" value="login">
                        <button type="submit" class="btn btn-default">Login</button>
                        </div>
                    </form>
                </div>
                <?php if (isset($_SESSION['message'])): ?>
                                <div class="row">
                                                <p class="text-info text-center"><?php echo $_SESSION['message']; unset($_SESSION['message']);?></p>
                                </div>
                <?php endif; ?>
</div>

