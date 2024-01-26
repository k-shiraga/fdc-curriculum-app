<?php
class UsersController extends AppController
{
    public function index()
    {
      $params = 'Hello World!!';
      $this->set(compact('params'));
    }

    public function login() {
      if ($this->request->is('post')) {
          if ($this->Auth->login()) {
              return $this->redirect($this->Auth->redirectUrl());
          }
          $this->Session->setFlash(__('Invalid username or password, try again'));
      }
    }

    public function logout() {
      return $this->redirect($this->Auth->logout());
    }

    // public function logout() {
    //     return $this->redirect($this->Auth->logout());
    // }

    // public function login() {
    //   $params = 'Hello World!!';
    //   $this->set(compact('params'));
    // }

      public function register() {
          if ($this->request->is('post')) {
              $this->User->create();
              $data = $this->request->data;
              // debug($data);
              // バリデーションロジック
              $errors = $this->User->validateUser($data);
              // debug($errors);
              // エラー処理
              if (!empty($errors)) {
                  $this->Session->setFlash('Validation failed.');
                  $this->Session->write('errors', $errors);
                  return $this->redirect(['action' => 'register']);
              }

              // パスワードのハッシュ化
              $data['User']['password'] = password_hash($data['User']['password'], PASSWORD_DEFAULT);

              // debug($data);
              if ($this->User->save($data)) {
                  $this->Flash->success(__('The user has been saved.'));
                  return $this->redirect(['action' => 'succcessRegestr']);
              }
              $this->Flash->error(__('Unable to add the user.'));
          }
      }

      public function succcessRegestr() {

      }
}
