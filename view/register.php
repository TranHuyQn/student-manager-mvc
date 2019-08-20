<h2>Register new student</h2>
<?php echo $noti ?>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" size="20"
                           value="<?php if (isset($name)) echo $name; ?>"><?php echo $errorName ?></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" size="20"
                           value="<?php if (isset($email)) echo $email; ?>"><?php echo $errorEmail ?></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" size="20"
                           value="<?php if (isset($username)) echo $username; ?>"><?php echo $errorUsername ?></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password" size="20"
                           value="<?php if (isset($password)) echo $password; ?>"><?php echo $errorPassword ?>
                </td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Register</button>
                </td>
            </tr>
        </table>
    </form>
</div>