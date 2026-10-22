<?php

#[\AllowDynamicProperties]
class LoginController extends Controller
{
    function __construct()
    {
        $this->model('admin');
    }

    public function index()
    {
        $this->view('admin/login');
    }

    public function check()
    {
        $rawUsername = $_POST['username'] ?? '';
        $rawPassword = $_POST['password'] ?? '';

        $username = $this->validate($rawUsername);
        $password = md5($this->validate($rawPassword));

        $query = $this->admin->selectWhere(array('username' => $username, 'password' => $password));

        $data = $this->admin->getResult($query);
        $jml = $this->admin->getRows($query);

        if ($jml > 0 && !empty($data[0])) {
            $user = $data[0];
            $_SESSION['username'] = $user['username'];
            $_SESSION['password'] = $user['password'];

            $this->redirect('admin');
        } else {
            $view = $this->view('admin/login');
            $view->bind('msg', 'Username atau Password salah');
        }
    }
}
