<?php
    include "./inc/phpinclude.php";

    $bid=$_GET["bid"];
    $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
    $rs = $result->fetch_object();

    // echo "<pre>";
    // print_r($rs);

?>

<!doctype html>
<html lang="ko">
  <head>
    <?php
        include "./inc/scriptinclude.php";
    ?>

    <title>게시글 보기</title>
  </head>
  <body>


    <div class="col-md-8" style="margin:auto;padding:20px;">
      <h3 class="pb-4 mb-4 fst-italic border-bottom" style="text-align:center;">
        - 게시글 보기 -
      </h3>

      <article class="blog-post">
        <h2 class="blog-post-title"><?php echo $rs->subject;?></h2>
        <p class="blog-post-meta"><?php echo $rs->regdate;?> by <a href="#"><?php echo $rs->userid;?></a></p>

        <hr>
        <p>
          <?php echo $rs->content;?>
        </p>
        <hr>
      </article>

      <nav class="blog-pagination" aria-label="Pagination">
        <a class="btn btn-outline-secondary" href="./index.php">목록</a>
        <a class="btn btn-outline-secondary" href="./write.php?parent_id=<?php echo $rs->bid;?>">답글</a>
        <a class="btn btn-outline-secondary" href="./write.php?bid=<?php echo $rs->bid;?>">수정</a>
        <a class="btn btn-outline-secondary" href="./delete.php?bid=<?php echo $rs->bid;?>">삭제</a>
      </nav>

    </div>

</body>
</html>    