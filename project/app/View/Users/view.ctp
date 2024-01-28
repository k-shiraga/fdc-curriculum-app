<div class="user-profile">
    <h1>User Profile</h1>
    <div class="profile-photo">
        <?php echo $this->Html->image($user['User']['image_url'], ['alt' => 'Profile Photo']); ?>
    </div>
    <h2><?php echo h($user['User']['username']) . ', ' . h($user['User']['age']); ?></h2>
    <p>Gender: <?php echo h($user['User']['gender']); ?></p>
    <p>Birthdate: <?php echo h($user['User']['birthdate']); ?></p>
    <p>Joined: <?php echo h($user['User']['joined']); ?></p>
    <p>Last Login: <?php echo h($user['User']['last_login_time']); ?></p>
    <div class="hobby">
        <p>Hubby:</p>
        <p><?php echo nl2br(h($user['User']['hobby'])); ?></p>
    </div>
</div>