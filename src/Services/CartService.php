<?php

namespace App\Services;

use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class CartService {
    private SessionInterface $session;
    private ProductRepository $productRepository;
    private float $tva = 0.2;

    public function __construct(SessionInterface $session, ProductRepository $productRepository) {
        $this->session = $session;
        $this->productRepository = $productRepository;
    }

    //Ajout au panier

    public function addToCart($id){
        $cart = $this->getCart();
        if(isset($cart[$id])){
            //le produit est déjà dans le panier
            $cart[$id]++;
        }else{
            //le produit n,'est pas dans le panier
            $cart[$id] = 1;
        }
        $this->updateCart($cart);
    }

    //supprimer une unité d'un produit du panier par les 'id'

    public function deleteFromCart($id){
        $cart = $this->getCart();
        //le produit qui est dans le panier
        if(isset($cart[$id])){
            //quantité de produits > 1
            if($cart[$id] > 1){
                $cart[$id]--;
            }else{
                unset($cart[$id]);
            }
            $this->updateCart($cart);
        }
    }

    //Supprimer tout un article du panier

    public function deleteAllFromCart($id){
        $cart = $this->getCart();
        //le produit qui est dans le panier
        if(isset($cart[$id])){
            unset($cart[$id]);
            $this->updateCart($cart);
        }
    }

    //Supprimer tout le panier

    public function deleteCart($cart){
        $this->updateCart([]);
    }

    //Mise à jour du panier

    public function updateCart($cart){
        $this->session->set('cart', $cart);
        $this->session->set('cartData', $this->getFullCart());
    }

    //Lecture du panier

    public function getCart(){
        return $this->session->get('cart', []);
    }

    //Objet fullcart contenant tous les éléments indispensables

    public function getFullCart(): array {
        $cart = $this->getCart();
        $fullcart = [];
        $quantityCart = 0;
        $subTotal = 0;

        foreach($cart as $id => $quantity){
            $product = $this->productRepository->find($id);
            if($product){

                $productTotal = $quantity * $product->getPrice()/100;
                $fullcart['products'][] = [
                    "priceTTC" => round(($productTotal + ($productTotal*$this->tva)),2),
                    "quantity" => $quantity,
                    "product" => $product
                ];
                $subTotal += $quantity * $product->getPrice()/100;
                $quantityCart += $quantity;

            } else {
                $this->deleteFromCart($id);
            }
        }
        $fullcart['data'] = [
            "quantityCart" => $quantityCart,
            "subTotalHT" => $subTotal,
            "taxe" => round($subTotal*$this->tva,2),
            "subTotalTTC" => round(($subTotal + ($subTotal*$this->tva)),2)
        ];
        return $fullcart;
    }
}