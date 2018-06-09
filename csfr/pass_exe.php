<?php
  function ex($s)
  { // XSS対策用のHTMLエスケープと表示関数
      echo htmlspecialchars($s, ENT_COMPAT, 'UTF-8');
  }
  session_start();

  //トークン対策(crack_pageからのアクセスをブロックする)
  if (session_id() !== $_POST['token']) {
      die("不正な画面遷移です。");
  }

  $id = $_SESSION['id']; // ユーザIDの取り出し
  // ログイン確認…省略
  $pwd = $_POST['pwd'];   // パスワードの取得
  // パスワード変更処理　ユーザ$idのパスワードを$pwdに変更する
?>
<body>
実際に変更を受け付ける画面<br>
<?php ex($id); ?>さんのパスワードを<?php ex($pwd); ?>に変更しました
</body>
