<?php
App::uses('AppModel', 'Model');
class User extends AppModel {

    public $validate = [
        'name' => [
            'rule' => ['lengthBetween', 5, 20],
            'message' => 'Name must be between 5 and 20 characters'
        ],
        'email' => 'email',
        'password' => [
            'rule' => ['compareWith', 'confirm_password'],
            'message' => 'Passwords do not match'
        ]
        // 他のバリデーションルール...
    ];

    public function validateUser($data) {
        debug($data);
        $this->set($data);
        
        if (!$this->validates()) {
            return $this->validationErrors;
        }
        return [];
    }

}
?>