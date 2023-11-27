<?php
class ColorModel extends Database{
    private $error = "";

    public function createColor($name, $user_id)
    {
        $stmt = $this->conn->prepare("INSERT INTO `colors` (name, user_id) VALUES (?,?)");

        $stmt->bind_param('si', $name, $user_id);
        if (!empty($name)) {
            if ($stmt->execute()) {
                header('Location: /color/');
            } else {
                $this->error = "Can't create category" . $this->conn->error;
                header('Location: /color/add/');
            }
        } else {
            header('Location: /color/add/');
        }
    }

    public function getAllColorByAccount()
    {
        $stmt = "SELECT c.name as name, c.id as id, u.name as user_name, c.created_at as cr, c.updated_at as ud FROM `colors` c, `users` u WHERE u.id = c.user_id";
        return $this->execute($stmt);
    }

    public function getOneColor()
    {
        $id = $_GET['id'];
        $stmt = "SELECT * FROM `colors` WHERE id = '$id'";
        return $this->execute($stmt);
    }

    public function updateColor($name, $id)
    {
        $stmt = $this->conn->prepare("UPDATE `colors` SET name = ? WHERE id = ?");

        $stmt->bind_param('si', $name, $id);
        if (!empty($name)) {
            if ($stmt->execute()) {
                header('Location: /color/list/');
            } else {
                $this->error = "Can't update Color" . $this->conn->error;
                header('Location: /color/add/');
            }
        } else {
            header('Location: /color/add/');
        }
    }

    public function deleteColor($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM `colors` WHERE `id` = ?");

        $stmt->bind_param('i', $id);
        if ($stmt->execute()) {
            header('Location: /color/list/');
        } else {
            header('Location: /color/list/');
        }
    }
}