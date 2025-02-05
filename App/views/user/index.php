<h1>Liste des utilisateurs</h1>
<ul>
    <?php foreach ($users as $user) : ?>
        <li>
            <a href="/user/show/<?php echo $user->id; ?>"><?php echo htmlspecialchars($user->name); ?></a>
        </li>
    <?php endforeach; ?>
</ul>
