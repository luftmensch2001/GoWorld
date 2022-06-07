<?php
require_once('./Controller/Account.php');
require_once('./Model/AccountDTO.php');
require_once('./Controller/Blog.php');
require_once('./Model/BlogDTO.php');

$listBlog = BlogDTO::getInstance()->GetListBlog($idAccount);
for ($i = 0; $i < count($listBlog); $i++) {
    $imageUrl = $listBlog[$i]->GetImageUrl();
    $nameBlog = $listBlog[$i]->GetNameBlog();
    $date = $listBlog[$i]->GetDate();
    $countAccess = $listBlog[$i]->GetCountAccess();
?>
    <tr id="tour-1" class="tour-list-row" data-bs-toggle="modal" data-bs-target="#tourModal">
        <td class="text-center">
            <img class="table-img" src="<?php echo $imageUrl ?>" al="tour image" />
        </td>
        <td class="text-center"><?php echo $nameBlog ?></td>
        <td class="text-center"><?php echo $date ?></td>
        <td class="text-center"><?php echo $countAccess ?></td>
        <td class="text-center">
            <form action="./DeleteBlog.php" method="post">
                <input type="hidden" name="idBlog" value="<?php echo $listBlog[$i]->GetId() ?>">
                <input type="submit" value="Xóa">
            </form>
        </td>
    </tr>
<?php
}
?>