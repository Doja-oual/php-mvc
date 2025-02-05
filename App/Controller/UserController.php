<?php

class UserController {
    public function showAll() {
        $userModel = new UserModel();
        $users = $userModel->getAllUsers();
        include 'view/user/index.php';
    }

    public function show($id) {
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        include 'view/user/show.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? "";
            $email = $_POST['email'] ?? "";
            $password = $_POST['password'] ?? "";

            // Validation des données
            if (Validator::validateString($name) && Validator::validateEmail($email) && Validator::validatePassword($password)) {
                $userModel = new UserModel();
                $userModel->addUser($name, $email, $password);
                header("Location: /user/show/$id");
            } else {
                echo "Données invalides.";
            }
        } else {
            include 'view/user/create.php';
        }
    }

    public function edit($id) {
        $userModel = new UserModel();
        $user = $userModel->getUserById($id);
        include 'view/user/edit.php';
    }

    public function update($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? "";
            $email = $_POST['email'] ?? "";

            // Validation des données
            if (Validator::validateString($name) && Validator::validateEmail($email)) {
                $userModel = new UserModel();
                $userModel->updateUser($id, $name, $email);
                header("Location: /user/show/$id");
            } else {
                echo "Données invalides.";
            }
        } else {
            $this->edit($id);
        }
    }

    public function delete($id) {
        $userModel = new UserModel();
        $userModel->deleteUser($id);
        header("Location: /");
    }
}
?>
