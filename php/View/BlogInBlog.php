<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');

$listBlog = BlogDTO::getInstance()->GetListBlog($idAccount);
if (count($listBlog) > 0) {
    $i = 0;
    $imageUrl = $listBlog[$i]->GetImageUrl();
    $nameBlog = $listBlog[$i]->GetNameBlog();
    $date = $listBlog[$i]->GetDate();
    $countAccess = $listBlog[$i]->GetCountAccess();
    $account = AccountDTO::getInstance()->GetAccount($idAccount);
    $userName = $account->GetUserName();
    $idBlog = $listBlog[$i]->GetId();
?>
    <form action="./info-blog.php" method="post" class="container__hot-blog-col-left col l-5">
        <input type="hidden" name="idBlog" value="<?php echo $idBlog?>">
        <div class="container__hot-blog-big">
            <div class="container__hot-blog-big-img link">
                <img src="<?php echo $imageUrl ?>" alt="">
            </div>
            <div class="container__hot-blog-big-text">
                <input style="background-color:white;border:none" type="submit" href="" class="container__hot-blog-big-header link" value="<?php echo $nameBlog ?>">
                <div class="container__hot-blog-info upload-info">
                    <div class="date-upload"><?php echo $date ?></div>
                    <div class="author"><?php echo $userName ?></div>
                </div>
            </div>
        </div>
    </form>
    <div class="container__hot-blog-col-right col l-7">
        <div class="row container__hot-blog-col-right-row">
        <?php
    }
    $min = min(count($listBlog), 5);
    for ($i = 1; $i < $min; $i++) {
        $imageUrl = $listBlog[$i]->GetImageUrl();
        $nameBlog = $listBlog[$i]->GetNameBlog();
        $date = $listBlog[$i]->GetDate();
        $countAccess = $listBlog[$i]->GetCountAccess();
        $idBlog = $listBlog[$i]->GetId();
        ?>
            <form action="./info-blog" method="post" class="container__hot-blog-small c-o-1 l-5">
            <input type="hidden" name="idBlog" value="<?php echo $idBlog?>">
                <div class="container__hot-blog-small-item">
                    <a href="" class="container__hot-blog-small-img link">
                        <img src="<?php echo $imageUrl ?>" alt="">
                    </a>
                    <div class="container__hot-blog-small-text">
                    <input style="background-color:white;border:none;font-size:medium;" type="submit" href="" class="container__hot-blog-big-header link" value="<?php echo $nameBlog ?>">
                        <div class="container__hot-blog-info upload-info">
                            <div class="date-upload"><?php echo $date ?></div>
                            <div class="author"><?php echo $userName ?></div>
                        </div>
                    </div>
                </div>
            </form>
        <?php
    }
        ?>
        </div>
    </div>