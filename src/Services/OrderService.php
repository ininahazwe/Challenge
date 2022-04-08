<?php

namespace App\Services;

use App\Entity\CartDetails;
use App\Entity\Company;
use App\Entity\Product;
use App\Entity\Transaction;
use Doctrine\ORM\EntityManagerInterface;

class OrderService{

    private EntityManagerInterface $manager;

    public function __construct(EntityManagerInterface $manager){
        $this->manager = $manager;
    }

    public function saveCart($data, $user){
        $carts = new Transaction();
        $reference = $this->generateUuid();
        $mail = $user->getEmail();
        $address = $data['checkout']['address'];
        $informations = $data['checkout']['informations'];

        $stock = true;

        foreach ($data['products'] as $product) {
            $stock = $this->checkStock($product);
        }

        if ($stock){
            $carts->setFirstname($user->getFirstname())
                  ->setLastname($user->getLastname())
                  ->setEmail($mail)
                  ->setAddress($address)
                  //->setMoreInfo($informations)
                  ->setQuantity($data['data']['quantityCart'])
                  ->setSubTotalHT($data['data']['subTotalHT']*100)
                  ->setTax($data['data']['taxe']*100)
                  ->setSubTotalTTC($data['data']['subTotalTTC']*100)
                  ->setReference($reference)
                  ->setUser($user)
                  ->setCreatedAt(new \DateTime('now'))
                  ->setIsPaid(0);

            if($informations){
                $carts->setMoreInfo($informations);
            }


            $this->manager->persist($carts);

            //creation de l'objet cart détails
            $cart_details_array = [];

            foreach ($data['products'] as $products) {
                $cartDetails = new CartDetails();
                $subtotal = $products['quantity'] * $products['product']->getPrice();
                $cartDetails->setCart($carts)
                    ->setProductName($products['product']->getTitle())
                    ->setProductPrice($products['product']->getPrice())
                    ->setProductQuantity($products['quantity'])
                    ->setSubTotalProductHT($subtotal)
                    ->setTaxeProduct($subtotal*0.2)
                    ->setCreatedAt(new \DateTime('now'))
                    ->setSubTotalProductTTC($subtotal*1.2);

                $this->manager->persist($cartDetails);
                $cart_details_array[] = $cartDetails;
                $this->updateStock($products['product']->getId(), $products['quantity']);

                $this->updateBalanceCompany($products['product']->getGestionnaire()->getCompany()->getId(), $products['priceTTC']);


            }


            $this->manager->flush();
            return $reference;
        }
        return 0;
    }

    public function checkStock($productData): bool {
        $id = $productData['product']->getId();
        $quantity = $productData['quantity'];

        $product = $this->manager->getRepository(Product::class)->find($id);

        if ($product->getStock() > $quantity){
            return true;
        }
        return false;
    }

    public function updateBalanceCompany($companyId, $balance){
        $company = $this->manager->getRepository(Company::class)->find($companyId);
        $company->setBalance($company->getBalance() + $balance);
        $this->manager->persist($company);
    }


    public function updateStock($productId, $quantity){
        $product = $this->manager->getRepository(Product::class)->find($productId);
        $product->setStock($product->getStock() - $quantity);
        $this->manager->persist($product);
    }

    public function generateUuid(): string {
        //Initialisation du générateur de nombres aléatoires Mersenne twister
        mt_srand((double)microtime()*100000);

        //génération d'un identifiant unique
        $charid = strtoupper(md5(uniqid(rand(), true)));

        $hyphen = chr(45);

        //Retour de segment de chaine
        $uuid = ""
                .substr($charid, 0, 8).$hyphen
                .substr($charid, 8, 4).$hyphen
                .substr($charid, 12, 4).$hyphen
                .substr($charid, 16, 4).$hyphen
                .substr($charid, 20, 12);

        return $uuid;
    }

    public function createOrder($cart){

    }

    private function redirectToRoute(string $string) {
    }
}