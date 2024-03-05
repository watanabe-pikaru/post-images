
<!-- データベース接続 -->

<?php

$db_host = "mysql219.phy.lolipop.lan";
$db_name = "LAA1562925-motivation";
$db_user = "LAA1562925";
$db_pass = "root";

try {
  $db = new PDO("mysql:host={$db_host};dbname={$db_name};charset=utf8", $db_user, $db_pass);     // // PDOインスタンスを生成
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // エラーモードの設定
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); // エミュレーションを停止。
} catch (PDOException $e) {
  exit("データベースの接続に失敗しました");
  
}

?>