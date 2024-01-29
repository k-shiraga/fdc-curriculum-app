<?php
// ユーザーデータの取得
$user = $user['User'];
// 画像のパスを設定
$imagePath = !empty($user['profile_photo']) ? $this->Html->url('/upload/' . $user['profile_photo']) : null;

// CSSの読み込み
echo $this->Html->css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
?>

<h1>ユーザープロフィール</h1>

<div>
    <h2>ユーザー名: <?php echo h($user['username']); ?></h2>

    <div>
        <strong>生年月日:</strong>
        <?php echo h($user['birthdate']); ?>
    </div>

    <div>
        <strong>性別:</strong>
        <?php echo h($user['gender'] == 1 ? 'Male' : 'Female'); ?>
    </div>

    <div>
        <strong>趣味:</strong>
        <?php echo h($user['hobby']); ?>
    </div>

    <?php if ($imagePath): ?>
    <div>
        <strong>プロフィール写真:</strong>
        <img src="<?php echo $imagePath; ?>" alt="Profile Photo" style="width: 150px; height: 150px;"/>
    </div>
    <?php endif; ?>
</div>
