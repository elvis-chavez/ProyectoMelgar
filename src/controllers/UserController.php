<?php

namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;
use Jose\ProyectoMelgar\models\User;

class UserController extends Controller {
    public function __construct(private User $user) {
        parent::__construct();
    }

    public function getUsers() {
        $users = User::getAll();
        $this->render('users/index', [
            'user' => $this->user,
            'users' => $users
        ]);
    }

    public function getForm() {
        $this->render('users/form', ['user' => $this->user]);
    }

    public function createUser() {
        $username = $this->post('username');
        $lastname = $this->post('lastname');
        $password = $this->post('password');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $birthdate = $this->post('birthdate');

        if (
            !is_null($username) &&
            !is_null($lastname) &&
            !is_null($password) &&
            !is_null($email) &&
            !is_null($phone) &&
            !is_null($birthdate)
            ) {
            $user = new User(
                $username, $lastname, $password, $email, $phone, $birthdate
            );

            $user->save();
            header('location: /ProyectoMelgar/users');
            } else {
            $this->render('errors/index');
        }
    }

    public function editForm($id) {
        if (!is_null($id)) {
            $get_user = User::getById($id);
            
            if ($get_user) {
                $this->render('users/form', [
                    'user' => $this->user,
                    'get_user' => $get_user
                ]);
            }
        }
        $this->render('errors/index');
    }

    public function updateUser() {
        $id = $this->post('id');
        $name = $this->post('username');
        $lastname = $this->post('lastname');
        $password = $this->post('password');
        $email = $this->post('email');
        $phone = $this->post('phone');
        $birthdate = $this->post('birthdate');
        $role = $this->post('role');
        $active = $this->post('active');

        if (
            !is_null($id) &&
            !is_null($name) &&
            !is_null($lastname) &&
            !is_null($password) &&
            !is_null($email) &&
            !is_null($phone) &&
            !is_null($birthdate) &&
            !is_null($role) &&
            !is_null($active)
            ) {
            $user = User::getById($id);
            
            if ($user) {
                $user->setId($id);
                $user->setUsername($name);
                $user->setLastname($lastname);
                $user->setPassword($password);
                $user->setEmail($email);
                $user->setPhone($phone);
                $user->setBirthdate($birthdate);
                $user->setRoleId($role);
                $user->setActive($active);
                $user->update($user);

                header('Location: /ProyectoMelgar/users');
            }
        }
        $this->render('errors/index');
    }
}