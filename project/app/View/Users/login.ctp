<?php
 echo $this->Session->flash();
 echo $this->Form->create('User', ['url' => ['action' => 'login']]);
 echo $this->Form->input('username');
 echo $this->Form->input('password');
 echo $this->Form->end('Login');
 ?>