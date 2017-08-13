<?php

/**
 * Контроллер PaymentController
 */
class PaymentController {

    public function actionIndex()
    {   
	if(isset($_POST['AMOUNT'])) 
        {
            Payment::pay($_POST['AMOUNT'], $_POST['us_name']);
	}
         return true;
    }
}
