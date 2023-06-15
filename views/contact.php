<h1>Contactez-nous</h1>
        <form action="submit_contact.php" method="POST">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" placeholder="Votre email" id="email" name="email" aria-describedby="email-help">
                <!-- <div id="email-help" class="form-text">Message n'a pas été envoyé.</div> -->
            </div>
            <div class="mb-3">
                <label for="objet" class="form-label">Objet</label>
                <input type="text" class="form-control" placeholder="Objet de votre message" id="objet" name="objet">
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Votre message</label>
                <textarea class="form-control" placeholder="Exprimez vous" id="message" name="message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>

<!-- <?php include_once 'common/footer.php'; ?>   -->      