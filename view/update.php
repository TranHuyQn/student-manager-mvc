<h2>Updata infomation</h2>
<?php
if(isset($message)) echo $message;
?>
<div class="table">
    <form method="post" action="">
        <table>
            <tr>
                <td>ID</td>
                <td>
                    <?php echo $id ?>
                </td>
            </tr>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name"
                           value="<?php echo isset($name) ? $name : $currentStudent->getName(); ?>"><?php echo $errorName ?>
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email"
                           value="<?php echo isset($email) ? $email : $currentStudent->getEmail(); ?>"><?php echo $errorEmail ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit">Update</button>
                </td>
            </tr>
        </table>
    </form>
</div>