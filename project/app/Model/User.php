<?php
App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public $validate = [
        'name' => [
            'rule' => ['lengthBetween', 5, 20],
            'message' => 'Name must be between 5 and 20 characters'
        ],
        'email' => 'email',
        // 'password' => [
        //     'rule' => ['compareWith', 'confirm_password'],
        //     'message' => 'Passwords do not match'
        // ]
        // 他のバリデーションルール...
    ];

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public function validateUser($data) {
        // debug($data);
        $this->set($data);
        
        if (!$this->validates()) {
            return $this->validationErrors;
        }
        return [];
    }

    // ここでカスタムバリデーションメソッドを定義します
    public function compareWith($check, $otherField) {
        // $check には 'password' フィールドの値が配列で渡される
        // $otherField は 'password_confirm' のフィールド名
        $value = array_values($check)[0];
        return $value === $this->data[$this->alias][$otherField];
    }

}
?>