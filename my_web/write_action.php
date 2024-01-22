<?php
                $connect = mysqli_connect("localhost", "user1", "1234", "my_web_db") or die("fail");

                $id = $_GET['name'];                      //Writer
                $pw = $_GET['pw'];                        //Password
                $title = $_GET['title'];                  //Title
                $content = $_GET['content'];              //Content
                $date = date('Y-m-d H:i:s');            //Date

                if (empty($title) || empty($content)) {
                        echo "<script>alert('제목과 내용을 모두 입력해주세요.'); 
                        history.back();</script>";
                } else {
                $URL = './index.php';                   //return URL
 
                $query = "insert into board (number,title, content, date, hit, id, password) 
                        values(null,'$title', '$content', '$date',0, '$id', '$pw')";

                $result = $connect->query($query);
                 if($result){ 
?>                  <script>
                        alert("<?php echo "글이 등록되었습니다."?>");
                        location.replace("<?php echo $URL?>");
                    </script>
<?php
                }
                
                else{
                        echo "FAIL";
                }
        }
                mysqli_close($connect);
?>