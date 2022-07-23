<?php
class db_conn
{
    private $host = "localhost";
    private $conn_user = "webID";
    private $conn_pw = "y[4tKGhJVJVw]g4T";
    private $db_name = "pieroot";
    private $conn_port = "3306";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->conn_user, $this->conn_pw, $this->db_name, $this->conn_port);
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function get_ID($user_id, $user_pw): int
    {
        $sql = "SELECT * FROM users WHERE user_ID ='{$user_id}'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >= 0) {
            $row = mysqli_fetch_array($result);
            $database_passwd = $row['user_Passwd'];
            $database_regdate = $row['user_Regdate'];
            $password = $user_pw . $database_regdate;
            $hashedpasswd = password_hash($password, PASSWORD_ARGON2ID);
            $result_password = password_verify($password, $hashedpasswd);
            if ($result_password) {
                $_SESSION['user_id'] = $row['user_ID'];
                $_SESSION['user_name'] = $row['user_Name'];
                $_SESSION['user_passwd'] = $password;

                return 1;
            } else {
                return -2;
            }
        } else {
            return -1;
        }
    }

    public function Permission_check($user_id, $user_pw): int
    {
        $sql = "SELECT * FROM users WHERE user_ID ='{$user_id}'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >= 0) {
            $row = mysqli_fetch_array($result);
            $user_ID = $row['user_ID'];
            $user_Passwd = $row['user_Passwd'];

            if (password_verify($user_pw, $user_Passwd)) {
                $sql = "SELECT * FROM permission_check WHERE user_ID ='{$user_ID}'";
                $permission_check = mysqli_query($this->conn, $sql);
                if (mysqli_num_rows($permission_check) >= 0) {
                    $per_row = mysqli_fetch_array($permission_check);
                    $permission = $per_row['permission'];
                    return $permission;
                } else {
                    return 0;
                }
            } else {
                return -1;
            }
        }
        return -2;
    }

    public function board_list(): mixed
    {
        $sql = "SELECT * FROM board";
        $result = mysqli_query($this->conn, $sql);
        // $list = array();
        if (mysqli_num_rows($result) >= 0) {
            return $result;
        } else {
            return -1;
        }
    }

    public function board_count(): int
    {
        $sql = "SELECT count(*) FROM board";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result)) {
            $row = mysqli_fetch_array($result);
            var_dump($row[0]);
            return $row[0];
        } else {
            return -1;
        }
    }


    public function board_content($board_id)
    {
        $sql = "SELECT * FROM board WHERE id ='{$board_id}'";
        $result = mysqli_query($this->conn, $sql);
        if (mysqli_num_rows($result) >= 0) {
            $row = mysqli_fetch_array($result);

            // return $row;
        } else {
            return -1;
        }
    }

    public function board_write($user_id, $board_title, $board_content): int
    {
        $sql = "INSERT INTO board (editer, board_title, board_content) VALUES ('{$user_id}', '{$board_title}', '{$board_content}')";
        $result = mysqli_query($this->conn, $sql);
        if ($result) {
            return 1;
        } else {
            return -1;
        }
    }
}