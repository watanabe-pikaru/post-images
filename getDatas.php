<!-- データベースからデータを取得 -->

<?PHP

$uri = $_SERVER['REQUEST_URI'];  //表示中のURLの情報を取得

//URIの中にPHPファイルあるか確認
//strpos関数で特定の文字列が含まれるかを検索
//含まれていたらif文詳細画面の処理、含まれない場合はelseTOP画面の処理
if (strpos($uri,'imageDetail.php') !== false) {
    $imageId = $_GET['id'];  //クエリパラに設定したIDの値を取得。
    $sql = "SELECT * FROM images WHERE id = ". $imageId;  //詳細画面ではidの画像データだけ取得。文字列はドットを記述。
    $sth = $db->prepare($sql);
    $sth->execute();
    $data['image'] = $sth->fetch();  //fetchは１レコード分。imageはforeach文で使った$imageのこと。
}  else {
    //imagesテーブルから全てのカラムデータを取得。＊は全て。
    //画像投稿なので新しいデータは一番上に表示したい。idを降順DESCにする。昇順はASC。
    $sql = "SELECT * FROM images ORDER BY create_date DESC " ; 

    //準備
    $sth = $db->prepare($sql);
    //実行
    $sth->execute();
    //全部取り出す。
    $data = $sth->fetchAll();
}

//retuen分は戻り値($date)を設定し、処理を終了させて、呼び出し元に値を返す。
return $data;

?>

