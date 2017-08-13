<?php
class Payment
{

    public static function check_sign($amount, $marchant_order_id, $real_sign) { // Проверка цифровой подписи unitpay
	
        $sign = md5(Config::getInstance()->get('merchant_id').':'.$amount.':'.Config::getInstance()->get('merchant_secret').':'.$marchant_order_id);
	
        if ($sign != $real_sign) {
            return "error";
        }else{
            return "success";
            }
	}
	
	public static function pay($amount, $user) // пополнение счета
	{   
            $db = Db::getConnection();
        
            $table = Config::getInstance()->get('table');
            $column_money = Config::getInstance()->get('column_money');
            $column_user = Config::getInstance()->get('column_user');
        
            // Текст запроса к БД
            $sql = "UPDATE `{$table}` SET `{$column_money}` = `{$column_money}` + :amount WHERE `{$column_user}` = :user";
        
            // Получение и возврат результатов. Используется подготовленный запрос
            $result = $db->prepare($sql);
            $result->bindParam(':amount', $amount, PDO::PARAM_INT);
            $result->bindParam(':user', $user, PDO::PARAM_STR);
            return $result->execute();
	}
        
        public static function freekassa_pay ( $amount, $username ) {
            $merchant_id = Config::getInstance()->get('merchant_id');
            $merchant_secret = Config::getInstance()->get('merchant_secret');
            $amount = (int) $amount;
            $number = rand(100, 999);
		
            $sign = md5($merchant_id.':'.$amount.':'.$merchant_secret.':'.$number);
		
            if ( $amount >= Config::getInstance()->get('min_pay') AND $amount <= Config::getInstance()->get('max_pay') ) {
                header("Location:http://www.free-kassa.ru/merchant/cash.php?m={$merchant_id}&oa={$amount}&s={$sign}&o={$number}&us_name={$username}");
                unset($_REQUEST['moneypay']);
                exit;
            }
	}
}
?>