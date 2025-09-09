<?php
require_once __DIR__ . '/BaseController.php';

class ContactController extends BaseController {

    public function index() {
        return $this->view('pages/contact');
    }

    public function send() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo "Method Not Allowed";
            exit;
        }

        if (!csrf_check($_POST['csrf_token'] ?? '')) {
            flash('contact_error', 'Invalid request. Please try again.');
            $this->redirect('contact');
            return;
        }

        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $subject = filter_input(INPUT_POST, 'subject', FILTER_SANITIZE_STRING);
        $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

        if (!$name || !$email || !$subject || !$message) {
            flash('contact_error', 'Please fill out all fields correctly.');
            $this->redirect('contact');
            return;
        }

        $to = 'business.ensaio@gmail.com';
        $email_subject = "New Contact Form Submission: " . $subject;

        $email_body = "You have received a new message from your website contact form.\n\n";
        $email_body .= "Here are the details:\n\n";
        $email_body .= "Name: " . $name . "\n";
        $email_body .= "Email: " . $email . "\n\n";
        $email_body .= "Message:\n" . $message . "\n";

        $headers = "From: noreply@yourwebsite.com\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        if (mail($to, $email_subject, $email_body, $headers)) {
            flash('contact_success', 'Thank you for your message! We will get back to you shortly.');
        } else {
            // This is a basic error handler. On a live server, this could be due to server config.
            flash('contact_error', 'Sorry, there was an error sending your message. Please try again later.');
        }

        $this->redirect('contact');
    }
}
