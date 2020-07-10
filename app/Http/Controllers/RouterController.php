<?php

namespace App\Http\Controllers;

use Request;
use \App\Product;
use \App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Redirector;
use App\Http\Controllers\Controller;

class RouterController extends Controller {

    public function index() {
        $users_in_bbdd = User::where('email', 'as')->select('email')->get();

        return view ("index", compact('users_in_bbdd'));
    }

    public function aboutUs() {
        return view ("aboutUs");
    }

    public function login() {
        $users = User::get();
        return view ('login', compact('users'));
    }

    public function getProductsRhArmasHachas() {
        $products=Product::where("type", "rh_armas_hachas")->get();
        $product_url_img_in_bbdd = Product::where("type", "rh_armas_hachas")->select("url_img")->get();
        $product_url_img_well = str_replace("_","/",$product_url_img_in_bbdd);
        $product_url_img_full = '/public/img/productos/' . $product_url_img_well;

        return view ('products', compact('products', 'product_url_img_well'));
    }

    public function getProductsRhArmasDagas() {
        $products=Product::where("type", "rh_armas_dagas")->get();
        $product_url_img_in_bbdd = Product::where("type", "rh_armas_dagas")->select("url_img")->get();
        $product_url_img_well = str_replace("_","/",$product_url_img_in_bbdd);
        $product_url_img_full = '/public/img/productos/' . $product_url_img_well;

        return view ('products', compact('products', 'product_url_img_well'));
    }

    public function getProductDetails($id) {
        $product=Product::where("id", $id)->get();
        $product_url_img_in_bbdd = Product::where("id", $id)->select("url_img")->get();
        $product_url_img_well = str_replace("_","/",$product_url_img_in_bbdd);

        return view ('productDetails', compact('product', 'product_url_img_well', 'product_url_img_in_bbdd'));
    }

    public function getShoppingCart() {
        return view ('shoppingCart');
    }

    public function makeOrder() {
        return view ('makeOrder');
    }

    public function checkUserLogging() {
        return view ('checkUserLogging');
    }
}
