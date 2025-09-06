<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // --- 1. Collect form data
    $vorname = $_POST['Vorname'];
    $nachname = $_POST['Nachname'];
    $email = $_POST['E-Mail'];
    $route = $_POST['Gewuenschte_Route'];
    $dauer = $_POST['Reisedauer'];
    $wuensche = $_POST['Zusaetzliche_Wuensche'];

    // --- 2. Build the email
    $to = "info@abenteuermietenamerika.de";
    $subject = "Neue Buchungsanfrage von Abenteuer-Mieten-Amerika.de";
    $message = "Sie haben eine neue Buchungsanfrage erhalten.\n\n"
             . "Vorname: " . $vorname . "\n"
             . "Nachname: " . $nachname . "\n"
             . "E-Mail: " . $email . "\n"
             . "Gewünschte Route: " . $route . "\n"
             . "Reisedauer: " . $dauer . "\n"
             . "Zusätzliche Wünsche: " . $wuensche . "\n\n"
             . "--- Ende der Nachricht ---";
    $headers = "From: " . $email;

    // --- 3. Send the email
    if (mail($to, $subject, $message, $headers)) {
        // Redirect to a success page or back to the home page with a message
        header('Location: index.html?success=1');
    } else {
        // Redirect on failure
        header('Location: index.html?success=0');
    }
} else {
    // If someone tries to access the PHP file directly, redirect them
    header('Location: index.html');
}
?>