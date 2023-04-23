<h1>Chat</h1>
<div id="messages">
    <?php foreach ($messages as $message) : ?>
        <p><strong><?php echo $message['username']; ?>:</strong> <?php echo $message['message']; ?></p>
    <?php endforeach; ?>
</div>
<form action="index.php" method="post">
    <label for="username">Usuario:</label>
    <input type="text" name="username" id="username" required>
    <br>
    <label for="message">Mensaje:</label>
    <input type="text" name="message" id="message" required>
    <br>
    <input type="submit" value="Enviar">
</form>