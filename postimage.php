<!-- 画像の名前をデータベースに登録 -->

<?php

include('./dbConfig.php');  //データベース接続

//「images/画像データ」というパスを作り、登録した画像をimagesフォルダに保存。
//$_FILESはSG変数。フォームから送信された値がSG変数に入る。
$targetDirectory = 'images/';  //フォルダ名
$fileName = basename($_FILES["file"]["name"]);  //basename関数は、パスからファイル名を抜き出す。
$targetFilePath = $targetDirectory . $fileName;  //PHPは文字列を「ドットで繋げる」。
$fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  //pathinfo関数で拡張子を取得。引数１にファイルパス、引数２は固定。


//送られてきた画像に拡張子が付いているか確認。
//move_uploded_file関数で、指定したファイルがアップロードされたか確認し、 そのファイルを新しい位置に移動。
//データベースに保存する前に画像をアップロードする。
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($fileName)) {  //POSTかつファイルネームが空でないかを確認
    $arrImageTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'PNG');  //拡張子の配列を定義
    if (in_array($fileType, $arrImageTypes)) {  //in_array関数でデータの拡張子が配列の拡張子に入っているか確認。
        $postImageForServer = move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);  //imagesフォルダに保存

            if ($postImageForServer) {
                $insert = $db->query("INSERT INTO images (file_name) VALUES ('" . $fileName . "')");
                //データを挿入するには次のSQLクエリINSERT INTOで、imagesデーブルのfile_nameカラムに$fileNameの値を保存。

            }
        }
    }

// リダイレクト先のURLへ転送する
$url = 'https://motivation.sunnyday.jp/post-images/post-images.php';
header('Location: ' . $url, true, 301);

// すべての出力を終了
exit;
?>

