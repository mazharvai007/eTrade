<?php


namespace App\Classes;


class ErrorHandler
{
    /*
     * Custom errors handler
     */
    public function handleErrors($error_number, $error_message, $error_file, $error_line)
    {
        $error = "[{$error_number}] An error occurred in file {$error_file} on line {$error_line}: {$error_message}";

        $enviroment = getenv('APP_ENV');

        if ($enviroment == 'local') {
            $whoops = new \Whoops\Run;
            $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
            $whoops->register();
        } else {
            $data = [
                'to' => getenv('ADMIN_EMAIL'),
                'subject' => 'System Error',
                'view' => 'errors',
                'name' => 'Admin',
                'body' => $error
            ];

            /*
             * Error method chaining
             */
            ErrorHandler::emailAdmin($data)->outputFriendlyError();
        }
    }

    /*
     * Generic errors
     */
    public function outputFriendlyError()
    {
        ob_end_clean();
        view('errors/generic');
        exit();
    }

    /*
     * Send email to the admin with error
     */
    public static function emailAdmin($data)
    {
        $mail = new Mail();
        $mail->send($data);

        return new static();
    }

}