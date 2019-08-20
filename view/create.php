<?php
if(isset($message)){
    echo "<p class='alert-info'>$message</p>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add new student</title>
</head>
<body>
<!--<div class="table">-->
<!--    <form method="post" action="">-->
<!--        <table>-->
<!--            <tr>-->
<!--                <td>Name</td>-->
<!--                <td><input type="text" name="name" size="20"-->
<!--                           value="--><?php //if (isset($name)) echo $name; ?><!--"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Email</td>-->
<!--                <td><input type="text" name="email" size="20"-->
<!--                           value="--><?php //if (isset($email)) echo $email; ?><!--"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Username</td>-->
<!--                <td><input type="text" name="username" size="20"-->
<!--                           value="--><?php //if (isset($username)) echo $username; ?><!--"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--                <td>Password</td>-->
<!--                <td><input type="text" name="password" size="20"-->
<!--                           value="--><?php //if (isset($password)) echo $password; ?><!--"></td>-->
<!--            </tr>-->
<!--            <tr>-->
<!--            <tr>-->
<!--                <td></td>-->
<!--                <td>-->
<!--                    <button type="submit">Add</button>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </form>-->
<!--</div>-->
<h2>Add new student</h2>
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
                           value="<?php if (isset($password)) echo $password; ?>"><?php echo $errorPassword ?></td>
            </tr>
            <tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Add</button>
                </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>