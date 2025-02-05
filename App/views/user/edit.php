<h1>Modifier l'utilisateur</h1>
<form method="POST" action="/user/update/<?php echo $user->id; ?>">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" value="<?php echo htmlspecialchars($user->name); ?>" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($user->email); ?>" required>
    <br>
    <button type="submit">Modifier</button>
</form>
