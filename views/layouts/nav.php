<nav>
    <a href="#" class="nav-icon" aria-label="visit homepage" aria-current="page">
        <img src="../../img/Troc_Enchere.png" alt="Troc-Enchères">
        <!-- <span>Troc-Enchères</span> -->
    </a>

    <div class="main-navlinks">
        <button class="hamburger" type="button" aria-label="Toggle navigation" aria-expanded="false">
            <span></span>
            <span></span>
            <span></span>
        </button>
        <div class="navlinks-container">
            <a href="<?= $router->url('accueil') ?>" aria-current="page">Accueil</a>
            <a href="<?= $router->url('articles') ?>">Articles</a>
            <a href="<?= $router->url('categories') ?>">Catégories</a>
            <a href="<?= $router->url('contact') ?>">Contact</a>
        </div>
    </div>
    <div class="nav-authentication">
        <a href="#" class="sign-user" aria-label="Sign in page">
            <img src="../../img/user.svg" alt="user-icon">
        </a>
        <div class="sign-btns">
            <a href="<?= $router->url('login') ?>" type="button" id="connectModal">Se connecter</a>
            <a href="<?= $router->url('signUp') ?>" id=" signModal">S'inscrire</a>
        </div>
    </div>
</nav>