<?php
require "config/db.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>HEALTH - Xây dựng lối sống lành mạnh</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="icon" href="img/health.jpg" type="image/x-icon">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <link rel="stylesheet" href="css/style1.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <!--banner-->
    <div class="w3-container" style="padding: 0px;">
        <div>
            <?php require("blocks/header.php"); ?>
        </div>
        <div class="content">
            <div class="w3-row" style="background-color: #e5e5e5;">
                <div class="w3-col m8 tt">
                    <?php
                    if (isset($_GET["news_id"])) {
                        $news_id = $_GET["news_id"];
                        $sql = "SELECT * FROM tbl_news WHERE News_ID = $news_id";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                    ?>
                            <b>
                                <p style="font-size:24px"><?php echo $row["Title"]; ?></p>
                            </b>
                            <p style="font-size:16px"><?php echo $row["Description"]; ?></p>
                          
                    <?php
                        } else {
                            echo "Không tìm thấy bài viết.";
                        }
                    } else {
                        echo "Không có ID bài viết.";
                    }
                    ?>
<!-- comment fb -->

<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v20.0&appId=1444815719476530" nonce="OHSMBOyV">

</script>
<?php
    $news_id = $_GET['news_id'];
    $current_url = "http://127.0.0.1/doan1/read.php?news_id=" . $news_id;
    ?>
                    <div class="fb-comments" data-href="<?php echo $current_url; ?>" data-width="100%" data-numposts="10"></div>
                </div>
                
               
            </div>
        </div>
    </div>
    

    <!--menu-->
    <div id="navbar" class="w3-container" style="border: 1px solid #e5e5e5; padding: 0 30px 0 0px; margin: 50px 0px 0px 0px; width: 100%;">
        <div class="w3-bar w3-hide-small" style="font-size:12px;">
            <a href="index.php" class="w3-bar-item button-not-hover" style="padding: 12px 16px;"><i class="fa fa-home"></i></a>
            <div class="button-not-hover">
                <?php require("blocks/menu.php"); ?>
            </div>
        </div>
    </div>
</body>

</html>
