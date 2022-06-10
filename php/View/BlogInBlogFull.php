<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');
?>
        <?php
        $listBlog = BlogDTO::getInstance()->GetListBlogNew();
        if (!isset($_POST['pageNumber']))
        {
            $pageNumber = 0;
        } else
        {
            $pageNumber = $_POST['pageNumber']-1;
        }

        $startNumber = ($pageNumber*12);
        $lastNumber =min($startNumber+12,count($listBlog));


        $account = AccountDTO::getInstance()->GetAccount($idAccount);
        $userName = $account->GetUserName();
        for ($i = $startNumber; $i < $lastNumber; $i++) {
            $imageUrl = $listBlog[$i]->GetImageUrl();
            $nameBlog = $listBlog[$i]->GetNameBlog();
            $date = $listBlog[$i]->GetDate();
            $countAccess = $listBlog[$i]->GetCountAccess();
            $idBlog = $listBlog[$i]->GetId();
            $summary = $listBlog[$i]->GetSummary();
        ?>
            <form action="./info-blog.php" method="post" class="container__list-blog-item">
                <input type="hidden" name="idBlog" value="<?php echo $idBlog ?>">
                <div href="" class="container__list-blog-item-img link">
                    <img src="<?php echo $imageUrl?>" alt="">
                </div>

                <div class="container__list-blog-item-text">
                    <input type="submit" class="container__list-blog-item-header link" value="<?php echo $nameBlog ?>">
                    <p class="container__list-blog-item-content">
                        <?php echo $summary ?>
                    </p>
                </div>
                <div class="container__list-blog-item-info upload-info padding-small">
                    <div class="date-upload"><?php echo $date ?></div>
                    <div class="author"><?php echo $userName ?></div>
                </div>
            </form>
        <?php
        }
        ?>
    </div>
</div>