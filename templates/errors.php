<?php if (isset($errors) && count($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <section>
            <mark><?php echo $error; ?></mark>
        </section>
    <?php endforeach; ?>
<?php endif; ?>
