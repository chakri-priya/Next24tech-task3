
<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $message = trim($_POST["message"]);

    // Validate form data
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill out all fields.";
    } else {
        // Set recipient email address
        $to = "your-email@example.com"; // Change this to your email address

        // Set email subject
        $subject = "New Contact Form Submission";

        // Compose email content
        $email_content = "Name: $name\n";
        $email_content .= "Email: $email\n\n";
        $email_content .= "Message:\n$message\n";

        // Set email headers
        $headers = "From: $name <$email>\r\n";
        $headers .= "Reply-To: $email\r\n";

        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            echo "Your message has been sent successfully!";
        } else {
            echo "Oops! Something went wrong and we couldn't send your message.";
        }
    }
} else {
    // If the form is not submitted, redirect to the contact page
    header("Location: contact.html");
}
?>

