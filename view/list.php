<h2>Danh sách khách hàng</h2>
<a href="./index.php?page=create">Thêm mới</a>
<table border="1" cellspacing="0">
    <tr>
        <th>Stt</th>
        <th>Name</th>
        <th>Email</th>
        <th></th>
    </tr>
    <?php foreach ($students as $key => $student): ?>
        <tr>
            <td><?php echo ++$key; ?></td>
            <td><?php echo $student->getName(); ?></td>
            <td><?php echo $student->getEmail(); ?></td>
            <td>
                <span><a href="index.php?page=update&id=<?php echo $student->getId(); ?>"><button>Update</button></a></span>
                <span><a href="index.php?page=del&id=<?php echo $student->getId(); ?>"><button>Delete</button></a></span>
            </td>
        </tr>
    <?php endforeach; ?>
</table>