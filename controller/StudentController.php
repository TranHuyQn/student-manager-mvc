<?php

class StudentController
{
    public $studenDB;

    public function __construct()
    {
        $this->studenDB = new DBstudent();
    }

    function create()
    {
        if (isset($_SESSION['id']) && $this->studenDB->isAdmin($_SESSION['id'])) {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                include 'view/create.php';
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $error = false;
                if (empty($name)) {
                    $errorName = "Tên người dùng không được bỏ trống";
                    $error = true;
                }
                if (empty($email)) {
                    $errorEmail = "Email không được bỏ trống";
                    $error = true;
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorEmail = "Email không hợp lệ";
                        $error = true;
                    }
                }
                if (empty($username)) {
                    $errorUsername = "username không được bỏ trống";
                    $error = true;
                }
                if (empty($password)) {
                    $errorPassword = "password không được bỏ trống";
                    $error = true;
                }
                if (!$error) {
                    if ($this->studenDB->isDuplicateEmail($email) || $this->studenDB->isDuplicateUsername($username)) {
                        $noti = 'Email hoặc Username đã tồn tại.';
                    } else {
                        $newStudent = new Student($name, $email, $username, $password);
                        $this->studenDB->create($newStudent);
                        $message = 'Thêm thành công';
                        $name = NULL;
                        $email = NULL;
                        $username = NULL;
                        $password = NULL;
                    }
                }
                include 'view/create.php';
            }
        } else {
            header('location:index.php');
        }
    }

    function showList()
    {
        if (isset($_SESSION['id'])) {
            if ($this->studenDB->isAdmin($_SESSION['id'])) {
                $students = $this->studenDB->getAll();
            } else {
                $student = $this->studenDB->finById($_SESSION['id']);
                $students[] = $student;
            }
            include 'view/list.php';
        } else {
            header('location: index.php');
        }
    }

    function update()
    {
        if (isset($_SESSION['id'])) {
            if ($this->studenDB->isAdmin($_SESSION['id'])) {
                $id = $_GET['id'];
            } else {
                $id = $_SESSION['id'];
            }
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                $currentStudent = $this->studenDB->finById($id);
                if (is_string($currentStudent)) {
                    echo $currentStudent . '<br>';
                    echo '<a href="index.php">Trở về</a>';
                    die();
                }
                include 'view/update.php';
            } else {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $error = false;
                if (empty($name)) {
                    $errorName = 'name không được để trống';
                    $error = true;
                }
                if (empty($email)) {
                    $errorEmail = 'email không được để trống';
                    $error = true;
                } else {
                    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $errorEmail = "Email không hợp lệ";
                        $error = true;
                    }
                }
                if (!$error) {
                    $currentStudent = $this->studenDB->finById($id);
                    if ($this->studenDB->isDuplicateEmail($email) && $email != $currentStudent->getEmail()) {
                        $errorEmail = 'Email đã tồn tại.';
                    } else {
                        $this->studenDB->update($id, $name, $email);
                        $message = 'Cập nhật thành công';
                    }
                }
                include 'view/update.php';
            }
        } else {
            header('location:index.php');
        }
    }

    function del()
    {
        $id = $_GET['id'];
        if (isset($_SESSION['id']) && $this->studenDB->isAdmin($_SESSION['id'])) {
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $currentStudent = $this->studenDB->finById($id);
                if (is_string($currentStudent)) {
                    echo $currentStudent . '<br>';
                    echo '<a href="index.php">Trở về</a>';
                    die();
                }
                $this->studenDB->del($id);
            } else {
                header('location: index.php', true);
            }
            header('location: index.php', true);
        } else {
            header('location:index.php');
        }
    }

    function login()
    {
        if (isset($_SESSION['id'])) {
            header('location: index.php?page=list');
        } else {
            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                include 'view/login.php';
            } else {
                if (empty($_POST["username"]) && empty($_POST["password"])) {
                    echo '<p>Không được để trống \'username\' và \'password\'</p>';
                } else {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $Dbconnect = new DBconnect();
                    $conn = $Dbconnect->connect();
                    $sql = "SELECT * FROM students WHERE username='$username'";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute();
                    $resultUsername = $stmt->rowCount();

                    if ($resultUsername != 0) {
                        $sql = "SELECT * FROM students WHERE username='$username' and password='$password'";
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        $result = $stmt->fetch();

                        if ($result) {
                            $_SESSION['id'] = $result['id'];
                            header('location:index.php?page=list');
                        } else {
                            echo 'sai mat khau';
                        }
                    } else {
                        echo 'sai ten dang nhap';
                    }
                    include 'view/login.php';
                }
            }
        }
    }

    function logout()
    {
        if (isset($_SESSION['id'])) {
            unset($_SESSION['id']);
            header('location:index.php');
        } else {
            header('location:index.php');
        }
    }

    function register()
    {
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            include 'view/register.php';
        } else {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $error = false;
            if (empty($name)) {
                $errorName = "Tên người dùng không được bỏ trống";
                $error = true;
            }
            if (empty($email)) {
                $errorEmail = "Email không được bỏ trống";
                $error = true;
            } else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errorEmail = "Email không hợp lệ";
                    $error = true;
                }
            }
            if (empty($username)) {
                $errorUsername = "username không được bỏ trống";
                $error = true;
            }
            if (empty($password)) {
                $errorPassword = "password không được bỏ trống";
                $error = true;
            }
            if (!$error) {
                $studentDB = new DBstudent();
                if ($studentDB->isDuplicateEmail($email) || $studentDB->isDuplicateUsername($username)) {
                    $noti = 'Email hoặc Username đã tồn tại.';
                } else {
                    $newStudent = new Student($name, $email, $username, $password);
                    $studentDB->create($newStudent);
                    header('location: index.php', true);
                }
            }
            include 'view/register.php';
        }
    }
}
