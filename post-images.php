<!-- TOPページ -->


<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>画像投稿アプリ</title>
  <link rel="stylesheet" href="post-images.css">
</head>

<body>
  <?php include('./dbConfig.php') ?>
  <?php include('./getDatas.php') ?> <!-- $dataが使える -->

 
    <header>
      <div class="header_title">
        <a href="https://motivation.sunnyday.jp/portfolio.html">HikaruCode</a>
      </div>

      <ul class="header_nav" id="js-nav">
        <li><a href="https://motivation.sunnyday.jp/portfolio.html#about">About</a></li>
        <li><a href="https://motivation.sunnyday.jp/portfolio.html#skill">Skill</a></li>
        <li><a href="https://motivation.sunnyday.jp/portfolio.html#works">Works</a></li>
        <li><a href="https://motivation.sunnyday.jp/portfolio.html#contact">Contact</a></li>
      </ul>

      <button class="header_hamburger" id="js-hamburger">
        <span class="sp1" id="js-sp1"></span>
        <span class="sp2" id="js-sp2"></span>
        <span class="sp3" id="js-sp3"></span>
      </button>

    </header>

    <main class="main">
      <h1>画像投稿アプリ</h1>
      <div class="header-post">
        <button class="postImage" onclick="location.href='./postImageForm.php';">投稿</button>
      </div>

      <div class="imageList">
        <!-- $dataの個々の要素を$imageに連想配列で１レコード分のデータが入っている。 -->
        <!-- postimage.phpでファイル名をfile_nameカラムに入れたので、画像を呼び出すのに使う。 -->
        <!-- PHPで配列の値にアクセスするには[]を使う。文字列は''で囲む。 -->
        <?php foreach ($data as $image) { ?>
          <a href="./imageDetail.php?id=<?PHP echo $image['id']; ?>"><img src="./images/<?php echo $image['file_name']; ?>" alt="投稿"></a>
          <!-- ここで詳細画面に渡すidは画像表示・更新・削除などに使われる -->
        <?php }; ?>
      </div>
    </main>

  <div class="pagetop">
    <a href="#">▲TOP</a>
  </div>

  <footer class="footer">
  </footer>

  <script src="portfolio.js"></script>
</body>

</html>



