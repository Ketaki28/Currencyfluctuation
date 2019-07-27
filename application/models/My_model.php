<?php 
   class My_model extends CI_Model {
	
        function __construct() { 
            parent::__construct(); 
        }

        function convertlogic($data){

            // take form values into php variables

            $basecurrency = $data["BaseCurrency"];
            $foreigncurrency = $data["ForeignCurrency"];
            $amount = $data["Amount"];
            
            //store current date into php variable
    

            //fetch value of  currencies from database
            $sql = "SELECT c.value from currencydetails as c where c.currencyName = '$basecurrency' order by c.cDate desc limit 1 ";
            $result = $this->db->query($sql);
            $baseCurrencyValue = $result->row()->value;

            $sql = "SELECT c.value from currencydetails as c where c.currencyName = '$foreigncurrency' order by c.currencyName ASC limit 1 ";
            $result = $this->db->query($sql);
            $foreignCurrencyValue = $result->row()->value;

            $convertedAmount = 0;

            // USD to Any currency
            if($basecurrency == "USD")
            {
                $convertedAmount = $amount * $foreignCurrencyValue;
            }
            
            // Any to Any currency
            else if($basecurrency != "USD" && $foreigncurrency != "USD")
            {
                $x = $amount/$baseCurrencyValue;
                $convertedAmount = $x * $foreignCurrencyValue;
            }

            //Any currency to USD 
            else if($foreigncurrency = "USD")
            {
                $convertedAmount = $amount/$baseCurrencyValue;
            }

            //base and foreign currency are same
            else
            {
                $convertedAmount = $amount;
            }

            return $convertedAmount;

        
        }
   } 
?> 