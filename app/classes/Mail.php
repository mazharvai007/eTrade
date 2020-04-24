<?php


namespace App\Classes;

use PHPMailer;


class Mail
{
    protected $mail;

    public function __construct()
    {
        // Initialize PHPMailer class
        $this->mail = new PHPMailer\PHPMailer\PHPMailer();

        // Setup
        $this->setUp();
    }

    /*
     * Setup PHPMailer
     */
    public function setUp()
    {
        //Server settings
        $this->mail->isSMTP();
        $this->mail->Mailer = 'smtp';
        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;

        $this->mail->Host = getenv('SMTP_HOST');
        $this->mail->Port = getenv('SMTP_PORT');

        $environment = getenv('APP_ENV');

        if ($environment == 'local') {
//            $this->mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_CLIENT;
            $this->mail->SMTPDebug = '';
        }

        // SMTP Authenticate Information
        $this->mail->Username = getenv('EMAIL_USERNAME');
        $this->mail->Password = getenv('EMAIL_PASSWORD');

        // Content
        $this->mail->isHTML(true);
        $this->mail->SingleTo = true;

        // Sender Information
        $this->mail->From = getenv('ADMIN_EMAIL');
        $this->mail->FromName = getenv('APP_NAME');
    }

    /*
     * Email Sending
     *  Recipients
     */
    public function send($data)
    {
        $this->mail->addAddress($data['to'], $data['name']);
        $this->mail->Subject = $data['subject'];
        $this->mail->Body = make($data['view'], array('data' => $data['body']));

        // Mail send
        return $this->mail->send();
    }
}