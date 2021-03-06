<?php
require_once('./Controller/Blog.php');
require_once('DataProvider.php');
class BlogDTO
{
    public static $_instance = null;
    private function __construct()
    {
    }
    public static function getInstance()
    {
        if (self::$_instance == null) {
            self::$_instance = new BlogDTO();
        }

        return self::$_instance;
    }
    public function GetBlog($id)
    {
        $query = "SELECT * FROM Blog Where id = '$id'";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        if ($row > 0) {
            $row = $result->fetch_assoc();
            $Blog = new Blog();
            $Blog->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetNameBlog($row["nameBlog"])
                ->SetDetail($row["detail"])
                ->SetDate($row["date"])
                ->SetSummary($row["summary"])
                ->SetCountAccess($row["countAccess"])
                ->SetIdAccount($row["idAccount"]);
            return $Blog;
        } else
            return null;
    }
    public function GetListBlog($idAccount)
    {
        $listBlog = array();
        $query = "SELECT * FROM Blog where idAccount = '$idAccount'";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $Blog = new Blog();
            $Blog->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetNameBlog($row["nameBlog"])
                ->SetDetail($row["detail"])
                ->SetDate($row["date"])
                ->SetSummary($row["summary"])
                ->SetCountAccess($row["countAccess"])
                ->SetIdAccount($row["idAccount"]);
            array_push($listBlog, $Blog);
        }
        return $listBlog;
    }
    public function GetListBlogNew()
    {
        $listBlog = array();
        $query = "SELECT * FROM `blog` ORDER BY date DESC";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $Blog = new Blog();
            $Blog->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetNameBlog($row["nameBlog"])
                ->SetDetail($row["detail"])
                ->SetDate($row["date"])
                ->SetCountAccess($row["countAccess"])
                ->SetSummary($row["summary"])
                ->SetIdAccount($row["idAccount"]);
            array_push($listBlog, $Blog);
        }
        return $listBlog;
    }
    public function GetListBlogOrderByCountAccess()
    {
        $listBlog = array();
        $query = "SELECT * FROM Blog ORDER BY countAccess DESC";
        $result = DataProvider::getInstance()->Execute($query);

        $row = mysqli_num_rows($result);
        while ($row = $result->fetch_assoc()) {
            $Blog = new Blog();
            $Blog->SetId($row["id"])
                ->SetImageUrl($row["imageURL"])
                ->SetNameBlog($row["nameBlog"])
                ->SetDetail($row["detail"])
                ->SetDate($row["date"])
                ->SetSummary($row["summary"])
                ->SetCountAccess($row["countAccess"])
                ->SetIdAccount($row["idAccount"]);
            array_push($listBlog, $Blog);
        }
        return $listBlog;
    }
    public function CreateBlog($Blog)
    {
        $imageUrl = $Blog->GetImageUrl();
        $nameBlog = $Blog->GetNameBlog();
        $detail = $Blog->GetDetail();
        $date = $Blog->GetDate();
        $idAccount = $Blog->GetIdAccount();
        $summary = $Blog->GetSummary();
        $query = "Insert into Blog(imageUrl,nameBlog,detail,idAccount,date,summary) 
    values('$imageUrl','$nameBlog','$detail','$idAccount','$date','$summary')";
        $result = DataProvider::getInstance()->Execute($query);

        return $result;
    }
    public function UpdateBlog($Blog)
    {
        $id = $Blog->GetId();
        $imageUrl = $Blog->GetImageUrl();
        $nameBlog = $Blog->GetNameBlog();
        $detail = $Blog->GetDetail();
        $idAccount = $Blog->GetIdAccount();
        $countAccess = $Blog->GetCountAccess();
        $summary = $Blog->GetSummary();
        $date = $Blog->GetDate();
        $query = "Update Blog set 
            imageUrl='$imageUrl',
            nameBlog='$nameBlog',
            detail='$detail',
            date='$date',
            summary='$summary',
            countAccess='$countAccess',
            idAccount='$idAccount' WHERE id ='$id'";
        $result = DataProvider::getInstance()->Execute($query);
        return $result;
    }
    public function DeleteBlog($idBlog)
    {
        $query = "DELETE FROM `blog` WHERE id = '$idBlog'";
        $result = DataProvider::getInstance()->Execute($query);
        echo $query;
        return $result;
    }
    public function IncreaseCountAccessBlog($blog)
    {
        $id = $blog->GetId();
        $countAccess = $blog->GetCountAccess();
        $countAccess++;
        $query = "Update Blog set 
            countAccess='$countAccess'
            WHERE id ='$id'";
        echo "<h1>" . $query . "</h1>";
        $result = DataProvider::getInstance()->Execute($query);
        return $result;
    }
}
