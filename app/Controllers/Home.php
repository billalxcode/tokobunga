<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;
use App\Models\DiscountModel;
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
        $categoryModel = new CategoryModel();

        $this->context["title"] = "Toko Bunga";
        $this->context["products"] = $productModel->findAll(6);
        $this->context["categories"] = $categoryModel->findAll();

        echo view("layout/header", $this->context);
        echo view("indexPage", $this->context);
        echo view("layout/footer", $this->context);
    }

    public function product()
    {
        $productModel = new ProductModel();
        $categoryModel = new CategoryModel();

        $search = $this->request->getVar('s');
        if ($search != null && $search != "") {
            // Get data 
            if ($search == '') {
                $paginateData = $productModel->paginate(6,'page');
            } else {
                $paginateData = $productModel->select('*')
                    ->orLike('product_name', $search)
                    ->orLike('product_price', $search)
                    ->orLike('product_description', $search)
                    ->paginate(6, 'page');
            }
        } else {
            $paginateData = $productModel->paginate(6, 'page');
        }

        $this->context['title'] = "Toko Bunga | Produk";
        $this->context['categories'] = $categoryModel->findAll();
        $this->context['products'] = $paginateData;
        $this->context['pager'] = $productModel->pager;
        $this->context['search'] = $search;
        
        echo view('layout/header', $this->context);
        echo view('product', $this->context);
        echo view('layout/footer', $this->context); 
    }

    public function admin()
    {
        $this->context["title"] = "Dashboard";

        $userSession = $this->checkSession();
        if ($userSession) {
            echo view("admin/layout/header", $this->context);
            echo view("admin/layout/sidebar");
            echo view("admin/dashboard");
            echo view("admin/layout/footer");
        } else {
            $this->session->setFlashdata('error', "Maaf anda belum login");
            return redirect();
        }
    }
}
