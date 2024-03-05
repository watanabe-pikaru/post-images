<!-- 更新処理 imageDetail.phpの更新ボタンより遷移-->

<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
?>

<?php

include('./dbConfig.php');

$targetDirectory = 'images/';  //画像フォルダ名指定
$fileName = basename($_FILES["file"]["name"]);  //basename関数は、formで登録された画像ファイルのファイル名を抜き出す。
$targetFilePath = $targetDirectory . $fileName;  //PHPは文字列を「ドットで繋げる」。
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  //pathinfo関数で拡張子を取得。引数１にファイルパス、引数２は固定。
$imageId = $_GET['id'];  //更新ボタンから送られるクエリパラメータを取得


if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($fileName)) {  //POSTかつファイルネームが空でないかを確認
    $arrImageTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');  //拡張子の配列を定義
    if (in_array($fileType, $arrImageTypes)) {  //in_array関数でデータの拡張子が配列の拡張子に入っているか確認。
        $sql = "SELECT file_name FROM images WHERE id = " . $imageId;

        $sth = $db->prepare($sql);
        $sth->execute();
        $getImageName = $sth->fetch();  //削除する画像名を取ってきている。

        $getImageName = unlink($targetDirectory . $getImageName['file_name']);  //unlink関数でファイルパスを記載して対象ファイルを削除

        if ($getImageName) {  //unlinkが成功するとtrueを返すので、trueならカラムの削除もする。
            $uploadImageForServer = move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);  //imagesフォルダに保存

            if ($uploadImageForServer) {  //$uploadImageForServerがtrueなら、imagesテーブルのデータも変える。ファイル名をアップデート。
                $update = $db->query("UPDATE images SET file_name = '" . $fileName . "' WHERE id = " . $imageId);
                
                $url = 'https://motivation.sunnyday.jp/post-images/post-images.php';
header('Location: ' . $url, true, 301);  // リダイレクト先のURLへ転送する
exit;  // すべての出力を終了
            }
        }
    }
}

?>