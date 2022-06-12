<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');

$listBlog = BlogDTO::getInstance()->GetListBlogNew();
$min = min(count($listBlog), 4);
$account = AccountDTO::getInstance()->GetAccount($idAccount);
$userName = $account->GetUserName();
for ($i = 0; $i < $min; $i++) {
    $imageUrl = $listBlog[$i]->GetImageUrl();
    $nameBlog = $listBlog[$i]->GetNameBlog();
    $date = $listBlog[$i]->GetDate();
    $countAccess = $listBlog[$i]->GetCountAccess();
    $idBlog = $listBlog[$i]->GetId();
    $summary = $listBlog[$i]->GetSummary();
?>
    <form action="./info-blog.php" method="post" class="container__newest-blog-item">
        <input type="hidden" name="idBlog" value="<?php echo $idBlog ?>">
        <div class="container__newest-blog-item-col-img" href="">
            <img src="<?php echo $imageUrl ?>" alt="">
        </div>
        <div class="container__newest-blog-item-col-text">
            <div>
                <input  type="submit" class="container__newest-blog-item-header link"
                value = "<?php echo $nameBlog ?>">
                <p class="container__newest-blog-item-content">
                    <?php echo $summary ?>
                </p>
            </div>
            <div class="container__newest-blog-item-info upload-info padding-small">
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