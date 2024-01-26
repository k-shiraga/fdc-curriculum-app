<!-- Display error messages -->
<?php if (!empty($this->Session->read('errors'))): ?>
    <div class="error-messages">
        <?php foreach ($this->Session->read('errors') as $error): ?>
            <p><?php echo $error; ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<!-- Registration form -->
<?php
echo $this->Form->create('User', ['url' => ['action' => 'register']]);
echo $this->Form->input('name', ['label' => 'Name:', 'required' => true]);
echo $this->Form->input('email', ['type' => 'email', 'label' => 'Email:', 'required' => true]);
echo $this->Form->input('password', ['type' => 'password', 'label' => 'Password:', 'required' => true]);
echo $this->Form->input('User.confirm_password', ['type' => 'password', 'label' => 'Confirm Password:', 'required' => true]);
echo $this->Form->button('Register');
echo $this->Form->end();
?>