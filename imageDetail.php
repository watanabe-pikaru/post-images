<!-- 詳細画面 -->

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./post-images.css">
  <title>画像投稿アプリ</title>
</head>

<body>
  <?php include('./dbConfig.php') ?>
  <?php include('./getDatas.php') ?>

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
    <h1>更新/削除</h1>

    <div class="detailImageBox">
      <div class="detailImage">
        <img src="./images/<?PHP echo $data['image']['file_name']; ?>" alt="投稿画像">
        <div class="detailImagButton">
          <button class="updateButton" onclick="location.href='./postImageForm.php?id=<?php echo $_GET['id']; ?>';">更新</button>
          <button class="deleteButton" onclick="location.href='./deleteImage.php?id=<?php echo $_GET['id']; ?>';">削除</button>
        </div>
        <button class="backButton" onclick="location.href='./post-images.php';">&larr;戻る</button>
      </div>
    </div>
  </main>
    <footer class="footer">
    </footer>
    <script src="portfolio.js"></script>
</body>

</html>

