<?php
require_once 'app/init.php';
$itemsQuery = $db->prepare("SELECT id, name, done FROM items WHERE user = :user");
$itemsQuery->execute([
    'user' => $_SESSION['user_id']
]);
$items = $itemsQuery->rowCount() ? $itemsQuery : [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>To do
    </title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans">
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Shadows+Into+Light+Two">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" type="text/css" href="style.css"
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="list">

    <h1 class="header">To do.</h1>

    <?php if(!empty($items)): ?>
        <ul class="items">
            <?php foreach($items as $item): ?>
                <li>
                    <span class="item<?php echo $item['done'] ? ' done' : ''?>"> <?php echo ($item['name']); ?></span>
                    <a class="delete-button" href="mark.php?as=delete&item=<?php echo $item['id']; ?>">Delete</a>
                    <?php if(!$item['done']): ?>
                        <a class="done-button" href="mark.php?as=done&item=<?php echo $item['id']; ?>">Mark as done</a>
                    <?php else: ?>
                        <a class="undone-button" href="mark.php?as=undone&item=<?php echo $item['id']; ?>">Mark as undone</a>
                    <?php endif; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>You haven't added any items yet.</p>
    <?php endif; ?>

    <form class="item-add" action="add.php" method="post">
        <input type="text" name="name" placeholder="Type a new item here." class="input" autocomplete="off" required>
        <input type="submit" value="Add" class="submit">
    </form>
</div>
<h2>
    <button>Switch Color</button>
    <script type="text/javascript">
   var color =["#ffff00","#cc6699","#cc00ff","#3333cc","#0099cc","#00cc66","#663300","#ccccff","#99ffcc"];
var i=0;
document.querySelector("button").addEventListener("click",function(){
    i = i < color.length ? ++i : 0;
    document.querySelector("body").style.background = color[i]
})
    </script>

</h2>
</body>

</html>