<?php

class BackController {
    public function dashboard() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        include 'view/back/dashboard.php';
    }

    public function managePosts() {
        $postRepository = new PostRepository();
        $posts = $postRepository->getAllPosts();
        include 'view/back/posts.php';
    }

    public function manageRoles() {
        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();
        include 'view/back/roles.php';
    }

    public function manageUsers() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        include 'view/back/users.php';
    }

    public function editUser($id) {
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        include 'view/back/edit_user.php';
    }
}
?>
