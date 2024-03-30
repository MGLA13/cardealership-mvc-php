<main class="container section">
        <h1>Contact us</h1>

        <?php if($message): ?>
            <p class="alert <?php echo $alertType ?>"><?php echo $message; ?></p>     
        <?php endif; ?>

        <picture>
            <source srcset="build/img/highlighter.webp" type="image.webp">
            <source srcset="build/img/highlighter.jpg" type="image.jpeg">
            <img loading="lazy" src="build/img/highlighter.jpg" alt="Contact image">
        </picture>

        <h2>Fill the next contact form</h2>

        <form class="form" method="POST" action="/contact">
            <fieldset>
                <legend>Personal information</legend>
                <label for="name">Name</label>
                <input type="text" placeholder="Your name" id="name" name="contact[name]" required>
            
                <label for="message">Message</label>
                <textarea id="message" name="contact[message]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Information of the car or truck</legend>
                
                <label for="opciones">Sell or buy: </label>
                <select autocomplete="off" id="options" name="contact[type]" required>
                    <option value="" disabled selected="selected">--Choose--</option>
                    <option value="Buy">Buy</option>
                    <option value="Sell">Sell</option>
                </select>
                <label for="budget">Price or budget</label>
                <input type="number" pattern="[0-9]" placeholder="Your price or budget" id="budget" name="contact[price]" required>
            
            </fieldset>

            <fieldset>
                <legend>Information for the contact</legend>
                <p>¿How do you like we contact you ??</p>

                <div class="contact-form">
                    <label for="phone-contact">Phone</label>
                    <input type="radio" value="phone_number" id="phone-contact" name="contact[contact]" required>
                    
                    <label for="email-contact">E-mail</label>
                    <input type="radio" value="email" id="email-contact"  name="contact[contact]" required>
                </div>

                <div id="contact">

                </div>

            </fieldset>

            <div class="align-right my-3">
                <input type="submit" value="Send" class="bg-green">
            </div>

        </form>

    </main>