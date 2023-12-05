<?php
class PostModel extends Database
{
    // xử lý database ở đây
    public function GetAllPostByAccout()
    {

        $user_id = $_SESSION['user_id'];

        $stmt = "SELECT p.id as id, u.id as u_id, p.title as title, p.image as image, p.content as content, p.create_at as cr, u.name as user_name, cp.name as category_name, p.category_id as category_id
        FROM posts p
        INNER JOIN users u on p.user_id = u.id
        INNER JOIN posts_category cp on p.category_id = cp.id
        WHERE  p.user_id = $user_id";
        return $this->execute($stmt);
    }

    public function GetAllPost()
    {

        $stmt = " SELECT * FROM posts ";
        return $this->execute($stmt);
    }

    public function CreatePost($user_id, $category_id, $title, $image, $content)
    {

        $stmt = $this->conn->prepare("INSERT INTO `posts`(`user_id`, `category_id` , `title`, `image`, `content`) VALUES (?,?,?,?,?)");
        $stmt->bind_param('iisss', $user_id,$category_id, $title, $image, $content);
        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/add');
        }
    }

    public function GetOnePostById()
    {
        $id = $_GET['post_id'];
        $stmt = "SELECT * FROM `posts` WHERE id = $id";
        return $this->execute($stmt);
    }


    public function UpdatePost($title, $image, $content, $category_id, $id)
    {
        $stmt = $this->conn->prepare(" UPDATE `posts` set `title`= ?, `image` = ?, `content` = ?, `category_id` = ? WHERE `id` = ? ");
        $stmt->bind_param('sssii', $title, $image, $content, $category_id, $id);
        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/edit');
        }
    }


    public function DeletePost($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `posts` WHERE `id` = ? ");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            header('Location: /post/list');
        } else {
            header('Location: /post/list');
        }
    }

    public function CountPost()

    {
        $stmt = " SELECT COUNT(*) FROM posts ";
        return $this->execute($stmt);
    }


    public function GetPostLimit($this_page_first_result, $result_per_page)
    {
        $stmt = "SELECT p.id as id, u.id as u_id, p.title as title, p.image as image, p.content as content, p.create_at as cr, u.name as user_name, cp.name as caterogy_name
        FROM posts p
        INNER JOIN posts_category cp ON p.category_id = cp.id
        INNER JOIN users u ON p.user_id = u.id
        LIMIT $this_page_first_result, $result_per_page";
        return $this->execute($stmt);
    }

    public function GetPostRecent()
    {
        $stmt = "SELECT * FROM posts
        ORDER BY create_at DESC
        LIMIT 5";
        return $this->execute($stmt);
    }

    public function GetPostCategory()
    {
        $stmt = "SELECT * FROM posts_category";
        return $this->execute($stmt);
    }

    public function GetPostByCategoryLimit($category_id, $this_page_first_result, $result_per_page)
    {
        $stmt = "SELECT p.id as id, u.id as u_id, p.title as title, p.image as image, p.content as content, p.create_at as cr, u.name as user_name, cp.name as caterogy_name
        FROM posts p
        INNER JOIN posts_category cp ON p.category_id = cp.id
        INNER JOIN users u ON p.user_id = u.id
        WHERE  p.category_id = $category_id
        LIMIT $this_page_first_result, $result_per_page";
        return $this->execute($stmt);
    }

    public function GetPostByCategory($category_id)
    {
        $stmt = " SELECT * FROM posts
                  WHERE category_id = $category_id";
        return $this->execute($stmt);
    }


    public function SearchPost($SearchKey)
    {
        $stmt = " SELECT p.id as id, u.id as u_id, p.title as title, p.image as image, p.content as content, p.create_at as cr, u.name as user_name, cp.name as caterogy_name 
        FROM posts p
        INNER JOIN posts_category cp ON p.category_id = cp.id
        INNER JOIN users u ON p.user_id = u.id
        WHERE p.title LIKE '%$SearchKey%' ";
        return $this->execute($stmt);
    }
}
