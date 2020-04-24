<?php


namespace App\Controllers;


use App\Classes\Mail;

class IndexController extends BaseController
{
    public function show()
    {

        echo "Inside Homepage from controller class.";

        $mail = new Mail();

        $data = [
            'to' => 'ea36d407b2-307ebe@inbox.mailtrap.io',
            'subject' => 'Welcome to eTrade Store',
            'view' => 'welcome',
            'name' => 'John Doe',
            'body' => 'Testing email template'
        ];

        if ($mail->send($data)) {
            echo "Email sent successfully.";
        } else {
            echo "Email sending failed.";
        }
    }
}