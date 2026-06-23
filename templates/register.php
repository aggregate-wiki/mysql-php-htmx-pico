<?php foreach ($users as $user): ?>
    <article><?php echo $user; ?></article>
<?php endforeach; ?>
<form>
    <fieldset role="group">
        <input type="text" name="name" placeholder="Name">
        <input type="submit" hx-post="register.php" value="Register">
    </fieldset>
</form>
