<?php

include('./dbConfig.php');

$targetDirectory = 'images/';  //フォルダ名
$imageId = $_GET['id'];  //削除ボタンから送られるクエリパラメータを取得

if(!empty($imageId)){  //empty関数に！をつけて空でないことを確認
    $sql = "SELECT file_name FROM images WHERE id = ". $imageId;  //詳細画面ではidの画像データだけ取得。文字列はドットを記述。
   
    $sth = $db->prepare($sql);
    $sth->execute();
    $getImageName = $sth->fetch();  //画像名を取得

    $getImageName = unlink($targetDirectory . $getImageName['file_name']);  //unlink関数でファイルパスを記載して対象ファイルを削除

    //unlinkが成功するとtrueを返すので、trueならカラムの削除もする。
    //queryも成功するとtrueを返すので変数$deleteReccordをつくり、if文で成功判定する。
    if($getImageName){
        $deleteReccord = $db->query("DELETE FROM images WHERE id = " . $imageId);
            if($deleteReccord){
                // リダイレクト先のURLへ転送する
                $url = 'https://motivation.sunnyday.jp/post-images/post-images.php';
                header('Location: ' . $url, true, 301);
                // すべての出力を終了
                exit;
            }
    }
}

?>
