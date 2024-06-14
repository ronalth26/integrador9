<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Onepage - clean responsive HTML5 themes - thomsoon.com</title>

    <meta name="description" content="Free download theme onepage, clean and modern responsive for all" />
    <meta name="keywords" content="responsive, html5, onepage, themes, template, clean layout, free web" />
    <meta name="author" content="Thomsoon.com" />

    <link rel="shortcut icon" href="img/favicon.png">

    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('resource/css/reset.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('resource/css/style-responsive.css') }}" />
	<link rel="stylesheet" type="text/css" href="{{ asset('resource/css/style.css') }}" /> -->
    <link href="{{ asset('assets/css/reset.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style-responsive.css') }}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="container">


        <!-- section start-page -->

        <section class="start-page parallax-background" id="home">

            <div class="opacity"></div>
            <div class="content">
                <div class="text">

                    <h1>CIR<br />
                        <span>COMUNITY INCLUSION REHABILITATION</span>
                    </h1>
                    <p>La discapacidad no define, la recuperación sí</p>

                    <a href="#about-us">
                        <div class="read-more">Leer Más ↓</div>
                    </a>
                </div>
                <div class="arrow-down"></div>
            </div>
        </section>

        <!-- section menu mobile -->

        <section class="menu-media">

            <div class="menu-content">

                <div class="logo">discapacitado</div>

                <div class="icon"><a href="#"><img src="img/icons/menu-media.png" /></a></div>

            </div>

        </section>

        <ul class="menu-click">
            <a href="#home">
                <li href="#home">INICIO</li>
            </a>
            <a href="#about-us">
                <li href="#about-us">QUIENESSOMOS</li>
            </a>
            <a href="#portfolio">
                <li href="#portfolio">EVIDENCIAS</li>
            </a>
            <a href="#contact">
                <li href="#contact">CONTACTO</li>
            </a>
        </ul>


        <!-- section menu -->

        <section class="menu">

            <div class="menu-content">

                <div class="logo">CIR</div>

                <ul id="menu">
                    <li><a href="#home">INICIO</a></li>
                    <li><a href="#about-us">NOSOTROS</a></li>
                    <li><a href="#portfolio">PORTAFOLIO</a></li>
                    <li><a href="#contact">CONTACTO</a></li>
                    @if (Route::has('login'))
                    @auth
                    <li><a href="{{ url('/home') }}">HOME</a></li>
                    @else
                    <li><a href="{{ route('login') }}">LOGIN</a></li>
                    <li><a href="{{ route('discapacitado.index') }}">DISCAPACITADO</a>/li>
                    <li><a href="{{ route('especialista.index') }}">ESPECIALISTA</a></li>
                    @endauth
                    @endif
                </ul>
            </div>


        </section>


        <!-- section about us -->

        <section class="about-us" id="about-us">

            <h1>¿QUIENES SOMOS?</h1>
            <hr />
            <p class="title">
                CIR es una plataforma que brinda apoyo y recursos a personas con discapacidad, enfocándose
                en la inclusión y rehabilitación integral para mejorar su salud. Además, ofrece
                oportunidades de mejora profesional a sus especialistas, quienes trabajan para ofrecer
                una mejor calidad de vida a las personas con discapacidad.
                Nuestro objetivo es empoderar a los individuos para que superen los obstáculos y alcanzen
                su máximo potencial, promoviendo la confianza y la participación
                activa en la comunidad.
            </p>

            <div class="column-one">

                <div class="circle-one"></div>

                <h2>Intercambio Experiencia<br />FOROS</h2>
                <p>
                    Los foros de intercambio de experiencias de usuario permiten a las personas
                    discapacitadas compartir sus historias de superación y lucha con otras personas
                    que enfrentan similares desafíos. Estos espacios virtuales y locales ofrecen
                    una plataforma para intercambiar información y experiencias, promoviendo la inclusión,
                    la confianza y la participación activa de las personas con discapacidad en la comunidad.
                </p>

            </div>

            <div class="column-two">

                <div class="circle-two"></div>

                <h2>Monitoreo Del Paciente<br />SEGUIMIENTO</h2>
                <p>
                    El monitoreo del paciente es un proceso integral que implica la supervisión continua
                    de los signos vitales y parámetros fisiológicos de un paciente. Este monitoreo puede
                    ser realizado de manera invasiva o no invasiva, dependiendo del tipo de paciente y
                    la gravedad de su condición. El monitoreo puede llegar a ser invasivo, no invasivo o
                    remoto para cumplir con las espectativas de nuestros usuarios con discapacidad.
                </p>

            </div>


            <div class="column-three">

                <div class="circle-three"></div>

                <h2>Todos Son Bienvenidos<br />INCLUSIÓN</h2>
                <p>
                    Se busca mejorar la capacidad, la oportunidad y el valor de las personas que se
                    encuentran en desventaja debido a su identidad, para que puedan participar
                    plenamente en la sociedad. Esto implica garantizar que todas las personas,
                    independientemente de su origen, sexo, identidad de género, orientación sexual,
                    etnia, religión o discapacidad, tengan acceso a los recursos, servicios y
                    oportunidades necesarios para vivir una vida digna y satisfactoria.
                </p>

            </div>


        </section>

        <div class="clear"></div>

        <!-- portoflio-->

        <section class="portfolio" id="portfolio">


            <div class="portfolio-margin">

                <h1>PORTAFOLIO</h1>
                <hr />

                <!-- 1 item portoflio-->

                <ul class="grid">

                    <li>
                        <a href="#">
                            <img src="img/portfolio/1.png" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 1</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 2 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/2.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 2</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 3 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/3.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 3</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>


                    <!-- 4 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/4.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 4</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 5 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/5.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 5</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>


                    <!-- 6 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/6.png" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 6</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 7 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/7.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 7</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 8 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/8.png" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 8</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>

                    <!-- 9 item portoflio-->

                    <li>
                        <a href="#">
                            <img src="img/portfolio/9.jpg" alt="Portfolio item" />
                            <div class="text">
                                <p>PORTFOLIO 9</p>
                                <p class="description">Your text here...</p>
                            </div>
                        </a>
                    </li>


                </ul>

                <a href="#">
                    <div class="read-more">Leer Más</div>
                </a>

            </div>

        </section>


        <div class="clear"></div>




        <!-- partners-->

        <section class="partners parallax-background-partners" id="partners">

            <div class="opacity"></div>

            <div class="content">

                <h2>Thanks for partners</h2>

                <div class="logo">

                    <a href="#"><img src="img/logos/alex1.png"></a>
                    <a href="#"><img src="img/logos/archiq.png"></a>
                    <a href="#"><img src="img/logos/thomsoon.png"></a>
                    <a href="#"><img src="img/logos/alex2.png"></a>

                </div>

            </div>

        </section>


        <!-- Contact-->

        <section class="contact" id="contact">
            <h1>Contactanos</h1>
            <hr />

            <div class="content">

                <div class="form">

                    <form action="#" method="post" enctype="text/plain">

                        <input name="your-name" id="your-name" value="Nombre" />
                        <input name="your-email" id="your-email" value="Correo" />

                        <textarea id="message" name="message"></textarea>

                        <a href="#">
                            <div class="button">
                                <span>Enviar</span>
                            </div>
                        </a>

                    </form>

                </div>


                <div class="contact-text">

                    Para contactarte con nosotros ingresa tus nombre aquí<br />
                    <br />

                    Escribe tu correo electrónico o tu número<br /><br />

                    Ejemplo:<br />

                    Nombres: <strong>Tomasz Mazurczak</strong><br /><br />

                    Correo: <strong>contact@thomsoon.com</strong><br /><br />

                    Descripción: <strong>Me gustaría recibir <br />
                        más información de...</strong>

                </div>


            </div>

        </section>


        <section class="footer">

            <div class="margin">

                <div class="menu-footer">

                    <a href="#home">Inicio</a>
                    <a href="#">Politica de privacidad</a>
                    <a href="#">Contacto</a>
                    <a href="#">Facebook</a>

                </div>

                <div class="copyright">© 2024. Todos los derechos son reservados por CIR.com</div>

            </div>


        </section>


    </div>



    <!-- Scripts -->

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> <!-- jQuery -->
    <script src="{{ asset('js/jquery.parallax.js') }} "></script> <!-- jQuery Parallax -->
    <script src="{{ asset('js/jquery.nicescroll.js') }} "></script> <!-- jQuery NiceScroll -->
    <script src="{{ asset('js/jquery.sticky.js') }} "></script> <!-- jQuery Stick Menu -->
    <script src="{{ asset('js/script.js') }} "></script> <!-- All script -->

</body>

</html>