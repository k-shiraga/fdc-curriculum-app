<?php
// echo phpinfo();
// jQueryとjQuery UIの読み込み

$existingImage = !empty($this->request->data['User']['profile_photo']) ? $this->request->data['User']['profile_photo'] : null;
$imagePath = $existingImage ? $this->Html->url('/upload/' . $existingImage) : '';


echo $this->Html->css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
echo $this->Html->script('//code.jquery.com/jquery-3.6.0.min.js');
echo $this->Html->script('//code.jquery.com/ui/1.12.1/jquery-ui.min.js');


// フォームの開始
echo $this->Form->create('User', array('type' => 'file'));

// 名前の入力フィールド
echo $this->Form->input('username');

// メールアドレスの入力フィールド
// echo $this->Form->input('email');

// 生年月日の入力フィールド、jQuery UIの日付ピッカーを使用
echo $this->Form->input('birthdate', array('type' => 'text', 'class' => 'datepicker'));

// 性別のラジオボタン
echo $this->Form->input('gender', array('type' => 'radio', 'options' => array('1' => 'Male', '2' => 'Female')));

// 趣味のテキストエリア
echo $this->Form->input('hobby', array('rows' => '3'));

// プロフィール写真のアップロードフィールド
echo $this->Form->input('profile_photo', array('type' => 'file', 'id' => 'profile-photo-input'));

// 画像プレビュー機能
?>

<div id="image-preview-container">
    <img id="image-preview" src="<?php echo $imagePath; ?>" alt="Image preview" />
</div>


<script>
    $(document).ready(function() {
        $('#profile-photo-input').change(function() {
            console.log(1);
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                
                reader.onload = function(e) {
                    $('#image-preview').attr('src', e.target.result);
                }
                
                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
    });

    $(document).ready(function() {
    // 日付ピッカーの初期化
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd' // 日付のフォーマットを指定
    });

    // 画像プレビュー機能
    $('#profile-photo-input').change(function() {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
                $('#image-preview').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(this.files[0]); // convert to base64 string
        }
    });
});
</script>


<?php
// 更新ボタン
echo $this->Form->button(__('Update'), array('type' => 'submit'));

// フォームの終了
echo $this->Form->end();
?>

<style>
    #image-preview {
    width: 150px;
    height: 150px;
    border: 1px solid #ddd;
    margin: 10px 0;
    background-position: center center;
    background-size: cover;
}
</style>