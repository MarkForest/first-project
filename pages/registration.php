<h3 class="page-header">Registration Page</h3>
<?php if(!isset($_POST['regbtn'])): ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <form action="index.php?page=4" method="post">
                    <div class="form-group">
                        <label for="login">Login</label>
                        <input type="text" name="login" id="login" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password-2">Confirm Password</label>
                        <input type="password" name="password-2" id="password-2" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success" name="regbtn">Register</button>
                </form>
            </div>
        </div>
<?php else: ?>
    <?php
        if (register($_POST['login'], $_POST['password'], $_POST['email'])) {
            echo "<h3><span style='color: green'>New User Added!</span></h3>";
        }
    ?>
<?php endif;?>
