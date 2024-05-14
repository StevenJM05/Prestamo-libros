<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Prestamos</span>
                    <span class="profession">Steven Y Alex</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="<?php echo URL?>">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">inicio</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="alumnos">
                            <i class='bx bx-male-female icon'></i>
                            <span class="text nav-text">Alumnos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="carreras">
                        <i class='bx bx-briefcase icon'></i>
                            <span class="text nav-text">Carreras</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="escuelas">
                            <i class='bx bxs-school icon'></i>
                            <span class="text nav-text">Escuelas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="libros">
                            <i class='bx bx-book-bookmark icon'></i>
                            <span class="text nav-text">Libros</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="prestamos">
                            <i class='bx bx-collection icon'></i>
                            <span class="text nav-text">Prestamos</span>
                        </a>
                    </li>

                </ul>
            </div>
        </div>

    </nav>

    <script>
        const body = document.querySelector('body'),
            sidebar = body.querySelector('nav'),
            toggle = body.querySelector(".toggle"),
            modeText = body.querySelector(".mode-text");
        toggle.addEventListener("click", () => {
            sidebar.classList.toggle("close");
        })
       
    </script>

</body>