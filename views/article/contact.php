<div class="my-5 py-5">
    <h1>Contact</h1>
    <section class="pb-5">
        <p>
            Pour toute question relative aux ventes aux enchères ou aux lots, sachez que Troc-Enchères sera
            plus apte à vous fournir davantage de renseignements sur des lots, les frais de ventes ou encore les
            modalités d’expédition. </p><br>
        <p class="text-justify">Pour contacter la Maison de vente, vous pouvez cliquer sur le lien “Demande de
            renseignements” depuis les pages ventes et lots, ou encore accéder à ses coordonnées sur la page </p>
        <p>Pour toute question sur le fonctionnement du site et le fonctionnement des enchères.
        </p>
    </section>
    <div id="after_submit"></div>
    <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">
        <div class="row">
            <label class="required" for="name">Votre nom :</label><br />
            <input id="name" class="input" name="name" type="text" value="" size="30" /><br />
            <span id="name_validation" class="error_message"></span>
        </div>
        <div class="row">
            <label class="required" for="email">Votre Email:</label><br />
            <input id="email" class="input" name="email" type="text" value="" size="30" /><br />
            <span id="email_validation" class="error_message"></span>
        </div>
        <div class="row">
            <label class="required" for="message">Votre message:</label><br />
            <textarea id="message" class="input" name="message" rows="7" cols="30"></textarea><br />
            <span id="message_validation" class="error_message"></span>
        </div>

        <input id="submit_button" type="submit" value="Envoyer" class="mt-5" />
    </form>
</div>