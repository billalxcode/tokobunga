<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CategoryModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Services;

class Users extends BaseController
{
    protected $session;
    protected $context = array();
    protected $helpers = [];
    protected $userModel;
    protected $productModel;
    protected $categoryModel;

    function __construct()
    {
        $this->session = Services::session();

        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
    }

    function checkSession() {
        $isLogin = $this->session->get("login");
        if ($isLogin) {
            $email = $this->session->get("email");
            $userData = $this->userModel->where("email", $email)->first();
            if ($userData) {
                return $userData;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function index()
    {
        return redirect()->to("/login", 301);
    }

    public function login() {
        $method = strtolower($this->request->getMethod());

        if ($method == "post") {
            $username = $this->request->getVar("username");
            $password = $this->request->getVar("password");
            
            $userData = $this->userModel->where("username", $username)->first();
            if ($userData) {
                if (password_verify($password, $userData["password"])) {
                    $sesi = [
                        "login" => true,
                        "email" => $userData["email"]
                    ];

                    $this->session->set($sesi);
                    $this->session->setFlashdata("success", "Kamu berhasil login");
                    return redirect()->to("/admin");
                } else {
                    $this->session->setFlashdata("error", "Maaf password salah");
                    return redirect()->to("/login");
                }
            } else {
                $this->session->setFlashdata("error", "Maaf akun tidak ditemukan");
                return redirect()->to("/login");
            }
        } else {
            $userSession = $this->checkSession();
            if ($userSession) {
                $this->session->destroy();
            }
            echo view("admin/account/login", $this->context);
        }
    }
    
    public function delete() {
        $userData = $this->checkSession();
        if ($userData) {
            $method = strtolower($this->request->getMethod());
            if ($method == "post") {
                $userid = $this->request->getVar("userid");
                $userdata = $this->userModel->where("id", $userid)->first();
                if ($userdata) {
                    $this->userModel->delete($userdata['id']);
                    $this->session->setFlashdata("success", "Data berhasil dihapus");
                    return redirect()->to("/admin/users");
                } else {
                    $this->session->setFlashdata("error", "Maaf data tidak ditemukan");
                    return redirect()->to("/admin/users");
                }
            } else {
                $this->session->setFlashdata("error", "Maaf anda tidak diizinkan untuk mengakses ini");
                return redirect()->to("/admin/users");
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/login");
        }
    }

    public function view() {
        $userData = $this->checkSession();
        if ($userData) {
            $this->context["title"] = "View users";
            $this->context['users'] = $this->userModel->findAll();
            
            echo view("admin/layout/header", $this->context);
            echo view("admin/layout/sidebar");
            echo view("admin/users/viewUser", $this->context);
            echo view("admin/layout/footer");
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/login");
        }
    }

    public function create() {
        $userData = $this->checkSession();
        if ($userData) {
            $this->context["title"] = "Create users";
        
            echo view("admin/layout/header", $this->context);
            echo view("admin/layout/sidebar");
            echo view("admin/users/createUser", $this->context);
            echo view("admin/layout/footer");
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/login");
        }
    }

    public function save() {
        $userSession = $this->checkSession();
        if ($userSession) {
            $method = strtolower($this->request->getMethod());
            if ($method == "post") {
                $action = $this->request->getVar("action");
                $fullname = $this->request->getVar("name");
                $username = $this->request->getVar("username");
                $email = $this->request->getVar("email");
                $password = $this->request->getVar("password");

                if ($action == "new") {
                    $data_post = [
                        "username" => $username,
                        "name" => $fullname,
                        "email" => $email,
                        "isAdmin" => 1,
                        "password" => password_hash($password, PASSWORD_BCRYPT)
                    ];

                    $this->userModel->save($data_post);

                    $this->session->setFlashdata("success", "Data berhasil ditambahkan");
                    return redirect()->to("admin/users/create");
                } else {
                    return redirect()->to("admin/users/create");
                }
            } else {
                return redirect()->to("admin/category/create");
            }
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/login");
        }
    }

    public function logout() {
        $userSession = $this->checkSession();
        if ($userSession) {
            $this->session->destroy();
            $this->session->setFlashdata("success", "Berhasil logout");
        } else {
            $this->session->setFlashdata("error", "Maaf kamu belum login");
        }
        return redirect()->to("/login");
    }
}
