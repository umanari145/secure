<?php session_start();?>
正常なパスワード変更画面
<form action="pass_exe.php" method="POST">
新パスワード<input name="pwd" type="password"><BR>
<input type="hidden" name="token" value="<?php echo htmlspecialchars(session_id(), ENT_COMPAT, 'UTF-8');?>" ><BR>
<input type=submit value="パスワード変更">
</form>
</body>
