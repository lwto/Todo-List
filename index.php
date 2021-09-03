<?php

$todo = [];
if (file_exists('todo.json')) {
    $json = file_get_contents('todo.json');
    $todo = json_decode($json, true);
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TO DO</title>
</head>

<body>
    <div style="margin-left:auto; margin-right:auto; width: 80vw; height:100vh; display:flex; flex-direction:column; margin-top:5rem; align-items:center;">
        <form action="newtodo.php" method="post" style="margin-bottom: 20px; width:50%; text-align:center">
            <input type="text" name="todo_name" placeholder="Enter your todo" style="width:60%; padding: 8px; border-radius: 5px;  border:1px solid bisque;">
            <button style="padding:8px;border-radius: 5px; background-color:burlywood; border:none; width:30%;">New Todo</button>
        </form>

        <?php foreach ($todo as $todoName => $todo) : ?>

            <div style="margin-bottom: 20px; display:flex;background-color:bisque; margin-left:auto; margin-right:auto; width:50%; padding:.5rem 1rem; border-radius: 5px; align-items:center;">
                <div style="padding-right: 5rem; width:200px;"><?php echo $todoName ?></div>

                <input type="checkbox" <?php echo $todo['completed'] ? 'checked' : '' ?>>

                <form action="delete.php" method="post">
                    <input type="hidden" name="todo_name" value="<?php echo $todoName ?>">
                    <button>Delete</button>
                </form>
            </div>

        <?php endforeach ?>
    </div>
</body>

</html>