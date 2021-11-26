<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="index.css">
    <title>Natuna Dive Resort</title>
</head>
<body>
    <header>
        <div class="button"><i class="fas fa-bars"></i></div>
        <nav class="navigation">
            <div class="logo"><img src="images/logo.png" alt=""></div>
            <div class="btnclose"><i class="fas fa-close"></i></div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#package">Package</a></li>
                <li><a href="#divesite">Dive site</a></li>
                <li><a href="#contact">contact</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <!-- home -->
        <section class="home" id="home">
            <div class="bg-shadow"></div>
            <div class="text-hero">
                <h1>The First Ecofrendly Resort In Natuna Island</h1>
                <small>book your privat tour across the island and explore underwater world with us</small>
                <button class="btn-booking">
                    <a href="#package">Book Now</a>
                </button>
            </div>
        </section>
        <!-- end home -->

        <!-- about -->
        <section class="about">
            <div class="main-about">
                <img src="images/hero.jpg" alt="">
                <div class="text-about">
                    <h1>Welcome To Our Resort</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Viverra et augue nulla tempus praesent rhoncus sed. Pretium pharetra elementum leo proin facilisi nunc amet, consequat. Venenatis neque, id vitae est. Gravida scelerisque nisl interdum euismod aenean.
                    Sed duis faucibus semper ullamcorper pharetra, tincidunt facilisi facilisis. Elit non sit aliquet cum at est sit. Arcu massa nibh Lorem ipsum dolor sit amet consectetur adipisicing elit. Error, dolore cum voluptatibus tenetur, esse sit, vero optio quas nemo tempore repudiandae doloribus perspiciatis fugit at inventore? Fugiat ullam inventore in aliquam, iure esse, nisi sunt nemo ipsa unde, id et? Maxime voluptate amet cumque. Omnis libero provident inventore earum debitis at aliquam officiis voluptatem veritatis sed? A tempora eveniet perferendis. Consequuntur esse molestiae recusandae enim doloribus porro sint optio! Tempore atque voluptatem ullam. Asperiores consequatur excepturi repellendus, nemo sint illo laborum illum soluta eos dolores vitae ullam cupiditate voluptates molestiae mollitia doloremque a quia modi voluptatibus molestias iusto! Doloribus, nostrum!</p>
                </div>
            </div>
        </section>
        <!-- end about -->
        <!-- content -->
            <div class="main-content">
                <section class="package" id="package">
                    <div class="title">
                        <h1>Package</h1>
                        <div class="line"></div>
                        <div class="linee"></div>
                    </div>     
                    <div class="main-package">
                        @foreach ($package as $packages )
                        <div class="col-package">
                            <img src="{{ asset('storage/' . $packages->gambar_paket) }}" alt="">
                            <div class="card">
                                <div class="body-card">
                                    <div class="card-title">{{ $packages->nama_paket }}</div>
                                    <div class="card-text">
                                        <p>
                                            {{ $packages->fasilitas_paket }}
                                        </p>
                                        <p>
                                        </p>
                                        <span>Rp. {{ $packages->harga_paket }}</span>
                                    </div>
                                    <div class="card-btn">
                                        <a href="details_package.html">View Details <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach                        
                    </div>
            </section>
            <!-- page dive site -->
            <section class="divesite" id="divesite">
                <div class="title">
                    <h1>Dive Site</h1>
                    <div class="line"></div>
                    <div class="linee"></div>
                </div>
                    <div class="col-divesite">
                        <div class="card">
                            <img src="divesite1.jpg" alt="">
                            <div class="body-card">
                                <div class="card-title">Tokong Layar</div>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, repellat ducimus. Tenetur assumenda harum sunt error, magnam id eaque maiores deleniti neque odio, ducimus odit cum accusamus, laborum quae tempora Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum veritatis eius repellat aperiam, voluptatem dolores sed dolorem incidunt, laborum possimus inventore rerum animi voluptas odio minus perspiciatis iste fugit eligendi voluptates asperiores numquam omnis facilis! Rerum minus obcaecati fugiat, perferendis animi lorem100</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="divesite2.jpg" alt="">
                            <div class="body-card">
                                <div class="card-title">Pulau Penjalin</div>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, repellat ducimus. Tenetur assumenda harum sunt error, magnam id eaque maiores deleniti neque odio, ducimus odit cum accusamus, laborum quae tempora Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum veritatis eius repellat aperiam, voluptatem dolores sed dolorem incidunt, laborum possimus inventore rerum animi voluptas odio minus perspiciatis iste fugit eligendi voluptates asperiores numquam omnis facilis! Rerum minus obcaecati fugiat, perferendis animi lorem100</p>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <img src="divesite3.jpg" alt="">
                            <div class="body-card">
                                <div class="card-title">Dammar Pinnacle</div>
                                <div class="card-text">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem, repellat ducimus. Tenetur assumenda harum sunt error, magnam id eaque maiores deleniti neque odio, ducimus odit cum accusamus, laborum quae tempora Lorem ipsum dolor, sit amet consectetur adipisicing elit. Earum veritatis eius repellat aperiam, voluptatem dolores sed dolorem incidunt, laborum possimus inventore rerum animi voluptas odio minus perspiciatis iste fugit eligendi voluptates asperiores numquam omnis facilis! Rerum minus obcaecati fugiat, perferendis animi lorem100</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
                <!-- end dive site -->
            </div>
        <!-- end content -->
        <section class="contact" id="contact">
            <div class="col-contact">
                <div class="card">
                    <div class="card-address">
                        <div class="card-title">Contact Us</div>
                        <div class="card-street"><i class="fas fa-map-marker-alt"></i> JL. Raya Sepempang, Sepempang, Bunguran Timur Ranai, Riau, Indonesia 29783</div>
                        <div class="card-email"><i class="far fa-envelope"></i> natunadiveresort@gmail.com</div>
                        <div class="card-phone"><i class="fas fa-mobile-alt"></i>082172712727</div>
                        <div class="card-socialmedia">
                            <ul>
                                <li class="instagram"><i class="fab fa-instagram"></i></li>
                                <li class="facebook"><i class="fab fa-facebook-square"></i></li>
                                <li class="twitter"><i class="fab fa-twitter"></i></li>
                                <li class="whatsapps"><i class="fab fa-whatsapp"></i></li>
                            </ul>
                        </div>
                    </div>
                    <div class="body-card">
                        <div class="card-title">Get In Touch</div>
                        <small class="card-tagline">feel free to drop us a line below!</small>
                        <div class="card-form">
                           <form action="">
                               <div class="form-group">
                                   <input type="text" name="name" class="name" placeholder="Your Name" required>
                               </div>
                               <div class="form-group">
                                   <input type="email" name="email" class="email" placeholder="Your Email" required>
                               </div>
                               <div class="form-group">
                                   <textarea name="message" id="message" placeholder="Message"></textarea>
                               </div>
                               <div class="btn-contact">
                                   <a href="#">Send</a>
                               </div>
                           </form>
                        </div>
                    </div>
                </div>
        </section>
    </main>
    <footer>
            <div class="footer-text">
                <div class="language">English <i class="fas fa-sort-down"></i></div>
                <div class="footer-site">&copy2021NatunaDiveResort.All Rights Reserved</div>
            </div>
    </footer>
    <script src="main.js"></script>
</body>
</html>