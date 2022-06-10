<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');

$listBlog = BlogDTO::getInstance()->GetListBlogOrderByCountAccess($idAccount);
if (count($listBlog) > 0) {
    $i = 0;
    $imageUrl = $listBlog[$i]->GetImageUrl();
    $nameBlog = $listBlog[$i]->GetNameBlog();
    $date = $listBlog[$i]->GetDate();
    $countAccess = $listBlog[$i]->GetCountAccess();
    $account = AccountDTO::getInstance()->GetAccount($idAccount);
    $userName = $account->GetUserName();
    $idBlog = $listBlog[$i]->GetId();
    $detail = $listBlog[$i]->GetDetail();
    $summary = $listBlog[$i]->GetSummary();
?>
    <form action="./info-blog.php" method="post" class="container__hot-blog-col-left col l-5">
        <input type="hidden" name="idBlog" value="<?php echo $idBlog ?>">
        <div class="container__hot-blog-big">
            <div class="container__hot-blog-big-img link">
                <img src="<?php echo $imageUrl ?>" alt="">
            </div>
            <div class="container__hot-blog-big-text">
                <input type="submit" href="" class="container__hot-blog-big-header link" value="<?php echo $nameBlog ?>">
                <p class="container__newest-blog-item-content"><?php echo $summary ?> </p>
            </div>
            <div class="container__hot-blog-info upload-info padding-big">
                <div class="date-upload"><?php echo $date ?></div>
                <div class="author"><?php echo $userName ?></div>
            </div>
        </div>
    </form>
    <div class="container__hot-blog-col-right col l-7">
        <div class="container__hot-blog-col-right-row">
        <?php
    }
    $min = min(count($listBlog), 5);
    for ($i = 1; $i < $min; $i++) {
        $imageUrl = $listBlog[$i]->GetImageUrl();
        $nameBlog = $listBlog[$i]->GetNameBlog();
        $date = $listBlog[$i]->GetDate();
        $countAccess = $listBlog[$i]->GetCountAccess();
        $idBlog = $listBlog[$i]->GetId();
        $summary = $listBlog[$i]->GetSummary();
        ?>
            <form action="./info-blog.php" method="post" class="container__hot-blog-small">
                <input type="hidden" name="idBlog" value="<?php echo $idBlog ?>">
                <div class="container__hot-blog-small-item">
                    <div href="" class="container__hot-blog-small-img link">
                        <img src="<?php echo $imageUrl ?>" alt="">
                    </div>
                    <div class="container__hot-blog-small-text">
                        <input style="background-color:white;border:none;font-size:medium;" type="submit" href="" class="container__hot-blog-big-header link" value="<?php echo $nameBlog ?>">
                        
                        <p class="container__hot-blog-small-content">
                        <?php echo $summary ?>
                        </p>
                    </div>
                    <div class="container__hot-blog-info upload-info padding-small">
                        <div class="date-upload"><?php echo $date ?></div>
                        <div class="author"><?php echo $userName ?></div>
                    </div>
                </div>
            </form>
        <?php
    }
        ?>
        </div>
    </div>