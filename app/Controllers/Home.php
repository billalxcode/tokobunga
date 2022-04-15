<?php

namespace App\Controllers;

use App\Models\CategoryModel;
use App\Models\DiscountModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use Config\Services;

class Home extends BaseController
{
    protected $session;
    protected $context = array();
    protected $helpers = [];
    protected $userModel;
    protected $productModel;
    protected $categoryModel;
    protected $discountModel;

    function __construct()
    {
        $this->session = Services::session();

        $this->userModel = new UserModel();
        $this->productModel = new ProductModel();
        $this->categoryModel = new CategoryModel();
        $this->discountModel = new DiscountModel();
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
        $productModel = new ProductModel();

        $this->context["title"] = "Toko Bunga";
        $this->context["products"] = $productModel->findAll();
        
        echo view("indexPage", $this->context);
    }

    public function admin() {
        $userData = $this->checkSession();
        if ($userData) {
            $this->context["title"] = "Dashboard";
            $this->context['products'] = $this->productModel->findAll();
            $this->context['categories'] = $this->categoryModel->findAll();
            $this->context['discounts'] = $this->discountModel->findAll();

            echo view("admin/layout/header", $this->context);
            echo view("admin/layout/sidebar");
            echo view("admin/dashboard");
            echo view("admin/layout/footer");
        } else {
            $this->session->setFlashdata("error", "Maaf anda belum login");
            return redirect()->to("/login");
        }
    }
}
