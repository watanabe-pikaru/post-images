<!-- 画像登録画面 -->

<!-- 登録画面に遷移したとき、クエリパラがあれば更新処理に遷移、なければ登録処理に遷移 -->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>画像投稿アプリ</title>
  <link rel="stylesheet" href="./post-images.css">
</head>

<body>
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

  <h1>新規登録</h1>

  <div class="submitImage">
    <?PHP if (isset($_GET['id'])) { ?>
      <form action="./updateImage.php?id=<?PHP echo ($_GET['id']); ?>" method="post" enctype="multipart/form-data">
      <?PHP } else { ?>
        <form action="./postimage.php" method="post" enctype="multipart/form-data">
        <?PHP } ?>
        <img id="preview"> <!-- src属性をJSで追加して画像を表示させる -->
        <input type="file" name="file" onchange="previewFile(this);">
        <!-- onchange属性で、JS発動 -->
        <button type="submit" name="submit">送信</button>
        </form>
        <button onclick="location.href='./post-images.php';" class="backButton">&larr;戻る</button>
  </div>
  </main>

  <footer class="footer">
  </footer>

  <script src="portfolio.js"></script>

</body>

</html>



