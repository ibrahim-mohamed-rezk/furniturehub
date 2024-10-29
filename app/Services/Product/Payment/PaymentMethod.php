<?php
namespace App\Services\Product\Payment;

class PaymentMethod {
    private $payment_method;
    public function __construct($payment_method)
    {
        $this->payment_method = $payment_method;
    }
    
    public function getId()
    {
        if ($this->payment_method == "wallet")
        {
            $id = 1824773;
        }
        elseif ($this->payment_method == "sohulia")
        {
            $id = 4487815;
        }
        elseif($this->payment_method == "card" )
        {
            $id = 1825025;
        }
        elseif($this->payment_method == "cardDeposit" )
        {
            $id = 1825025;
        }
        elseif($this->payment_method == "forsa")
        {
            $id = 2061486;
        }
        elseif($this->payment_method == "sympl")
        {
            $id = 2200064;  
        }
        elseif($this->payment_method == "valu")
        {
            $id = 2143930;
        }
        elseif($this->payment_method ==  "aman")
        {
                $id = 2331735;
        }
        elseif($this->payment_method ==  "contact")
        {
                $id = 4750088;
        }
        elseif($this->payment_method ==  "khazna")
        {
                $id = 4812371;
        }
        elseif($this->payment_method ==  "vodafone_cash")
        {
                $id = 3887489;
        }
        elseif($this->payment_method ==  "installment_discount")
        {
                $id = 3843032;
        }
        else
        {
            $id = null;
        }
        
        return $id;
    }
    
    public function getIframe()
    {
        if ($this->payment_method == "wallet")
        {
            $id = 3291794;
        }
        
        elseif($this->payment_method == "card" )
        {
            $id = 347954;
            
        }
        elseif($this->payment_method == "cardDeposit" )
        {
            $id = 347954;
        }
        elseif($this->payment_method == "forsa")
        {
            $id = 378599;
        }
        elseif($this->payment_method == "sympl")
        {
            $id = 396065;  
        }
        elseif($this->payment_method == "valu")
        {
            $id = 387306;
        }
        elseif($this->payment_method ==  "aman")
        {
                $id = 417493;
        }
        elseif($this->payment_method ==  "installment_discount")
        {
                $id = 721925;
        }
        else
        {
            $id = null;
        }
        
        return $id;
    }

}
