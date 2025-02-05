

<h1>Profil de l'utilisateur</h1>
<p>Nom : <?php echo htmlspecialchars($user->name); ?></p>
<p>Email : <?php echo htmlspecialchars($user->email); ?></p>
<a href="/user/edit/<?php echo $user->id; ?>">Modifier</a>
<a href="/user/delete/<?php echo $user->id; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
