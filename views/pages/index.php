    <main class="container section">
        <?php include __DIR__ . '/icons.php'; ?>
    </main>

    <section class="section">
        <h2>Cars and trucks on sale</h2>

        
        <?php
            include __DIR__ . '/list.php';
        ?>

        
        <div class="container align-right">
            <a href="/cars" class="bg-green">View all</a>
        </div>

    </section>

    <section class="contact-image">
        <h2>Find the car of your dreams</h2>
        <p>Fill the contact form and an advisor will be in touch soon</p>
        <a href="/contact" class="yellow-buttom">Contact us</a>
    </section>

    <div class="container section low-section">
       <section class="blog">
            <h3>Our blog</h3>
            <article class="blog-entrance">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog1.webp" type="image/webp">
                        <source srcset="build/img/blog1.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog1.jpg" alt="Blog entrance image">
                    </picture>
                </div>
                <div class="text-entrance">
                    <a href="/entrance">
                        <h4>History of the cars</h4>
                        <p class="meta-information">Written on <span>12/08/2023</span> by: <span>Admin</span></p>
                        <p>A short history about the beginning of the cars, from the first manufacturers to 
                            new generations, also we talk of the new innovations about the future of the cars.
                        </p>
                    </a>
                </div>
            </article>
            <article class="blog-entrance">
                <div class="image">
                    <picture>
                        <source srcset="build/img/blog2.webp" type="image/webp">
                        <source srcset="build/img/blog.jpg" type="image/jpg">
                        <img loading="lazy" src="build/img/blog2.jpg" alt="Blog entrance image">
                    </picture>
                </div>
                <div class="text-entrance">
                    <a href="/entrance">
                        <h4>Basic guide for check your engine car</h4>
                        <p class="meta-information">Written on <span>12/20/2023</span> by: <span>Admin</span></p>
                        <p>A simple guide to understand your engine car operation: oil changes, 
                            check battery, lights, spark plugs and other things.
                        </p>
                    </a>
                </div>
            </article>
       </section>
       
       <section class="testimonials my-3">
            <h3>Testimonials</h3>

            <div class="testimonial">
                <blockquote>
                    The staff is excellent, very good service and the car they offered me achieve with all my expectations.
                </blockquote>
                <p>
                  - Esteban López
                </p>
            </div>
       </section>
    </div>