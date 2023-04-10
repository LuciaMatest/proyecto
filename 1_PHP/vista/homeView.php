<!-- Pantalla de carga -->
<div class="loader">
    <img src="./webroot/recursos/0_Carga.gif" alt="Cargando...">
</div>
<!-- Contenido de la página web -->
<div class="contenido-pagina">
    <!-- Home -->
    <section id="section1">
        <div class="background">
            <div class="text-center">
                <img src="webroot/recursos/home.png" alt="home" class="home rounded mx-auto d-block">
                <img src="webroot/recursos/pru.png" alt="person" class="person">
            </div>
        </div>
    </section>
    <!-- Proyectos -->
    <section id="section2">
        <div class="background">
            <div class="d-flex flex-column align-items-center">
                <img src="webroot/recursos/Proyectos.png" alt="proyectos" class="proyectos rounded mx-auto d-block mb-5">
                <form action="./index.php" method="post">
                    <input type="hidden" name="" value="">
                    <input type="submit" value="Ver proyectos" name="ver" class="btn btn-lg btn-block btn-primary">
                </form>
            </div>
        </div>
    </section>
    <!-- Sobre mi -->
    <section id="section3">
        <div class="background">
            <div class="d-flex flex-column align-items-center">
                <img src="webroot/recursos/Sobre mi.png" alt="sobre" class="sobre rounded mx-auto d-block mb-4">
                <p class="text-center justify-text mt-2">¡Hola! Soy Lucía, una apasionada ilustradora,
                    diseñadora gráfica y
                    desarrolladora web.
                    <br>Me encanta combinar mi creatividad y habilidades técnicas para crear soluciones visuales
                    efectivas e impactantes.
                    <br>Echa un vistazo a mi portafolio digital para ver mis trabajos y proyectos más recientes.
                    <br>¡Espero que te gusten!
                </p>
                <div class="d-flex justify-content-center align-items-center mt-2" id="redes">
                    <a href="https://instagram.com/lulu.ilustracion?igshid=YmMyMTA2M2Y=" class="mx-2 p-1">
                        <img src="webroot/recursos/redes/instagram.png" alt="ig" class="img-fluid">
                    </a>
                    <a href="https://www.linkedin.com/in/luluilustracion/" class="mx-2 p-1">
                        <img src="webroot/recursos/redes/linkedin.png" alt="link" class="img-fluid">
                    </a>
                    <a href="https://www.tiktok.com/@lulu.ilustracion?_t=8bFX3XdNlh8&_r=1" class="mx-2 p-1">
                        <img src="webroot/recursos/redes/tik-tok.png" alt="tik" class="img-fluid">
                    </a>
                </div>
                <div class="d-flex justify-content-center align-items-center">
                    <img src="webroot/recursos/pru2.png" class="manos">
                </div>
            </div>
        </div>
    </section>
    <!-- Navegador de circulos -->
    <div id="navegador" class="mx-2">
        <a href="#section1" class="circle"></a>
        <a href="#section2" class="circle"></a>
        <a href="#section3" class="circle"></a>
    </div>
</div>