<?php
    include "./inc/phpinclude.php";

    if(!$_SESSION['UID']){
        echo "<script>alert('회원 전용 게시판입니다.');history.back();</script>";
        exit;
    }
    
    $bid = null;
    $parent_id = null;

    $subject = null;
    $content = null;

    if (isset($_GET["bid"])) { //bid가 있다는건 수정이라는 의미다.
        $bid= $_GET["bid"]; //get으로 넘겼으니 get으로 받는다. 

        $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
        $rs = $result->fetch_object();
        $subject = $rs->subject;
        $content = $rs->content;

        if($rs->userid!=$_SESSION['UID']){
            echo "<script>alert('본인 글이 아니면 수정할 수 없습니다.');history.back();</script>";
            exit;
        }

    }

    if(isset($_GET["parent_id"])){//parent_id가 있다는건 답글이라는 의미다.
        $parent_id = $_GET["parent_id"];

        $result = $mysqli->query("select * from board where bid=".$parent_id) or die("query error => ".$mysqli->error);
        $rs = $result->fetch_object();

        $subject = "[RE]".$rs->subject;
        $content = $rs->content;
        // $rs->subject = "[RE]".$rs->subject;
    }
    

?>
<!doctype html>
<html lang="ko">
  <head>
    <?php
        include "./inc/scriptinclude.php";
    ?>

    <title>게시판 리스트</title>
  </head>
  <body>
    <div class="col-md-8" style="margin:auto;padding:20px;">
        <form method="post" action="write_ok.php">
            <input type="hidden" name="bid" value="<?php echo $bid;?>">
            <input type="hidden" name="parent_id" value="<?php echo $parent_id;?>">
            <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">제목</label>
                <input type="text" name="subject" class="form-control" id="exampleFormControlInput1" placeholder="제목을 입력하세요." value="<?php echo $subject;?>">
            </div>
            <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">내용</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" name="content" rows="3"><?php echo $content;?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">등록</button>
        </form>
    <div>
</body>
</html>