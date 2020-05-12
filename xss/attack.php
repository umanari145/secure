<?php
  mb_language('Japanese');
  $sid = $_GET['sid'];
  //ここの下に何らかの攻撃処理をかく(たとえば攻撃した人間に被害者のSESSIONIDを記したメールを送るなど)
?>
<body>攻撃成功(sampleからこの画面に強引に遷移させる)<br>
<?php echo $sid;?>
</body>
