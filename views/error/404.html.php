<div class="flex h-full flex-col justify-center items-center gap-3">
    <?php if ($_SESSION["user"]): ?>
        <div class="flex justify-center">
            <a href="<?= WEBROOT ?><?= redirectAfterError($_SESSION["user"]["role_name"]) ?>" class="md:font-medium underline">Retourner a votre dashboard <i class="ri-arrow-right-up-box-line"></i></a>
        </div>
    <?php else:  ?>
        <div class="flex justify-center">
            <a href="<?= WEBROOT ?>" class="md:font-medium underline">Retourner a la page de connexion <i class="ri-arrow-right-up-box-line"></i></a>
        </div>
    <?php endif; ?>
    <img src="asset/404.jpg" class="h-full lg:h-96 object-cover" alt="">
</div>