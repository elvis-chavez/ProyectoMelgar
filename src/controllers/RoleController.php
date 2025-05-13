<?php

namespace Jose\ProyectoMelgar\controllers;

use Jose\ProyectoMelgar\lib\Controller;
use Jose\ProyectoMelgar\models\Role;
use Jose\ProyectoMelgar\models\User;

class RoleController extends Controller {
    public function __construct(private User $user) {
        parent::__construct();
    }

    public function getRoles() {
        $roles = new Role();
        $this->render('role/index', ['user' => $this->user, 'roles' => $roles->getAll()]);
    }

    public function getForm() {
        $this->render('role/form', ['user' => $this->user]);
    }

    public function createRole() {
        $type = $this->post('role_type');

        if (!is_null($type)) {
            $role = new Role();
            $role->setType($type);
            
            $role->save();
            header('Location: /ProyectoMelgar/role');
        } else {
            $this->render('errors/index');
        }
    }

    public function editForm($id) {
        if (!is_null($id)) {
            $role = Role::getById($id);
            
            if ($role) {
                $this->render('role/form', [
                    'user' => $this->user,
                    'role' => $role
                ]);
            }
        }
        $this->render('errors/index');
    }

    public function updateRole() {
        $id = $this->post('role_id');
        $type = $this->post('role_type');

        if (!is_null($id) && !is_null($type)) {
            $role = Role::getById($id);
            
            if ($role) {
                $role->setId($id);
                $role->setType($type);
                $role->update($role);

                header('Location: /ProyectoMelgar/role');
            }
        }
        $this->render('errors/index');
    }
}