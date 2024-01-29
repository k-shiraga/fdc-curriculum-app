<?php
// app/Model/User.php
App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {
    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => array('between', 5, 20),
                'message' => 'A username is required'
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'A username is required'
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'このメールアドレスは既に使用されています。'
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'パスワードを入力してください。'
            ),
        ),
        'confirm_password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'パスワードの確認を入力してください。'
            ),
            'match' => array(
                'rule' => array('validatePasswordConfirmation'),
                'message' => 'パスワードが一致しません。'
            )
        ),
        'birthdate' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => '生年月日は必須です。'
            )
        ),
        'gender' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => '性別は必須です。'
            )
        ),
        'hobby' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => '趣味は必須です。'
            )
        )
    );

    // パスワード確認用のカスタムバリデーションメソッド
    public function validatePasswordConfirmation($check) {
        if ($this->data[$this->alias]['password'] === $this->data[$this->alias]['confirm_password']) {
            return true;
        }
        return false;
    }

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new BlowfishPasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

      // ファイルアップロードのバリデーションルール
    public function uploadFile($check) {
        // $check には ['profile_picture' => ['tmp_name' => '...', 'error' => '...']] が含まれる
        // ファイルアップロードのバリデーションロジックをここに実装
        return is_uploaded_file($check['profile_picture']['tmp_name']) && $check['profile_picture']['error'] == 0;
    }
}
?>