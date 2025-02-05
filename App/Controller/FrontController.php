<?php

class FrontController {
    public function index() {
        $postRepository = new PostRepository();
        $posts = $postRepository->getAllPosts();
        include 'view/front/index.php';
    }

    public function showPost($id) {
        $postRepository = new PostRepository();
        $post = $postRepository->getPostById($id);
        include 'view/front/show.php';
    }

    public function showRoles() {
        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();
        include 'view/front/roles.php';
    }

    public function showRole($id) {
        $roleModel = new Role();
        $role = $roleModel->getRoleById($id);
        include 'view/front/role.php';
    }
}
?>
