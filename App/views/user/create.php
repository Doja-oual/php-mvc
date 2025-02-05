<h1>Crer un utilisateur</h1>
<form method="POST" action="/user/create">
    <label for="name">Nom :</label>
    <input type="text" name="name" id="name" required>
    <br>
    <label for="email">Email :</label>
    <input type="email" name="email" id="email" required>
    <br>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <br>
    <button type="submit">Créer</button>
</form>
