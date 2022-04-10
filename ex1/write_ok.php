<?php
    include "./inc/phpinclude.php";

    if(!$_SESSION['UID']){
        echo "<script>alert('회원 전용 게시판입니다.');location.href='./index.php';</script>";
        exit;
    }

    // echo "<pre>";
    // print_r($_POST);

    $subject=$_POST["subject"];
    $content=$_POST["content"];
    $bid=$_POST["bid"];//bid값이 있으면 수정이고 아니면 등록이다.
    $parent_id=$_POST["parent_id"];//parent_id가 있으면 답글이다.
    $userid=$_SESSION['UID'];//userid는 세션값으로 넣어준다.
    $status=1;//status는 1이면 true, 0이면 false이다.

    // echo "<br>------<br>";

    // echo "제목=>".$subject."<br>";
    // echo "내용=>".$content;

    if ($bid) {//bid값이 있으면 수정이고 아니면 등록이다.
        $result = $mysqli->query("select * from board where bid=".$bid) or die("query error => ".$mysqli->error);
        $rs = $result->fetch_object();
    
        if($rs->userid!=$_SESSION['UID']){
            echo "<script>alert('본인 글이 아니면 수정할 수 없습니다.');location.href='./';</script>";
            exit;
        }
    
        $sql="update board set subject='".$subject."', content='".$content."', modifydate=now() where bid=".$bid;
    
    } else {
        if($parent_id){//답글인 경우 쿼리를 수정해서 parent_id를 넣어준다.
            $sql="insert into board (userid,subject,content,parent_id) values ('".$userid."','".$subject."','".$content."','".$parent_id."')";
        }else{
            $sql="insert into board (userid,subject,content) values ('".$userid."','".$subject."','".$content."')";
        }
    }
    $result=$mysqli->query($sql) or die($mysqli->error);
    
    if ($result) {
        echo "<script>location.href='./index.php';</script>";
        exit;
    } else {
        echo "<script>alert('글등록에 실패했습니다.');history.back();</script>";
        exit;
    }


?>