<?php
session_start();
?>

<form action="" method="POST">
    <input type="text" name="content">
    <input type="submit" name="type" value="create">
</form>

<?php
if (isset($_POST['type'])) {
    if ($_POST['type'] === 'create') {
        $_SESSION['todos'][] = $_POST['content'];
        echo "New task: \"{$_POST['content']}\" was added.";
    } elseif ($_POST['type'] === 'update') {
        $_SESSION['todos'][$_POST['id']] = $_POST['content'];
        echo "New task: \"{$_POST['content']}\" was updated.";
    } elseif ($_POST['type'] === 'delete') {
        array_splice($_SESSION['todos'], $_POST['id'], 1);
        echo "Task: \"{$_POST['content']}\" was deleted.<br>";
    }
}
?>
<?php
if (empty($_SESSION['todos'])) {
    $_SESSION['todos'] = [];
    echo 'Input something.';
}
?>



<!-- <ul> -->
    <?php foreach ($_SESSION['todos'] as $i => $value) : ?>
        <!-- <li> -->
            <form action="" method="POST">

                <input type="hidden" name="id" value="<?php echo $i; ?>">

                <input type="text" name="content" value="<?php echo $value; ?>">

                <input type="submit" name="type" value="update">

                <input type="submit" name="type" value="delete">
            </form> 
        <!-- </li> -->
    <?php endforeach; ?>

<!-- </ul> -->
