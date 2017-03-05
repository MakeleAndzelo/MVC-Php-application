<?php require 'partials/head.php'?>
    <h1>Names</h1>
    <ul>
        <?php foreach($names as $name): ?>
            <li><?= $name->name; ?></li>
        <?php endforeach; ?>
    </ul>
    <h1>Submit your name</h1>
    <form action="/users" method="POST">
        <input type="text" name="name">
        <button type="submit">Submit</button>
    </form>
<?php require 'partials/footer.php'; ?>