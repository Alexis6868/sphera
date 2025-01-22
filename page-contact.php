<?php
/*
Template Name: Contact
*/

get_header();
?>
<form class="form" method="POST" action="">
    <label for="name">Name:</label>
    <input placeholder="Votre nom"type="text" id="name" name="name" required>
    
    <label for="email">Email:</label>
    <input placeholder="E-mail" type="email" id="email" name="email" required>
    
    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>
    
    <button class="CTA" type="submit" name="submit_contact_form">Envoyé</button>
</form>
<?php
get_footer();
?>
