<?= $head ?>
<title><?= $title ?></title>

<style>
    :root {
        --color-50: #E5F3FF;
        --color-100: #CFE9FF;
        --color-200: #A9D4FF;
        --color-300: #75b3ff;
        --color-400: #3F82FF;
        --color-500: #1450FF;
        --color-600: #0039FF;
        --color-700: #003Aff;
        --color-800: #0034e3;
        --color-900: #0022b2;
        --color-950: #001066;
    }

    body {
        background-color: var(--color-50);
        color: var(--color-900);
    }

    .container {
        background: var(--color-100);
        border-radius: 12px;
        padding: 30px;
        margin-top: 50px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    h1,
    h2,
    h3 {
        color: var(--color-700);
    }

    a {
        color: var(--color-500);
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .indice {
        list-style: none;
        padding-left: 0;
    }

    .indice li {
        margin-bottom: 10px;
    }
</style>


<body>
    <div class="container">
        <h1 class="text-center">Politicas de EstacionAPP</h1>
        <p class="text-center">Aquí encontrarás nuestras políticas, normas y un manual de usuario para ayudarte a
            aprovechar al máximo nuestra app.</p>

        <hr>

        <h2>Índice</h2>
        <ul class="indice">
            <li><a href="#politicas">1. Políticas de Uso</a></li>
            <li><a href="#normas">2. Normas Generales</a></li>
            <li><a href="#manual">3. Manual de Usuario</a></li>
            <li><a href="#descargas">4. Descargar documento</a></li>
        </ul>

        <hr>

        <section id="politicas">
            <h3>1. Políticas de Uso</h3>
            <p>
                Nuestra aplicación tiene como objetivo facilitar el alquiler y la gestión de cocheras.
                A continuación, se presentan nuestras políticas principales:
            </p>
            <ul>
                <li>El usuario debe proporcionar información verídica durante el registro.</li>
                <li>Queda prohibido el uso de la app para actividades ilegales.</li>
                <li>La seguridad de los datos es nuestra prioridad; manejamos tu información siguiendo altos estándares.
                </li>
            </ul>
        </section>

        <hr>

        <section id="normas">
            <h3>2. Normas Generales</h3>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse eos officiis sapiente odit earum fugiat.
                Voluptatibus provident vero at corporis incidunt explicabo saepe, modi optio distinctio sunt repellendus
                vitae rem?
            </p>
            <ol>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit.</li>
            </ol>
        </section>

        <hr>

        <section id="manual">
            <h3>3. Manual de Usuario</h3>
            <p>
                a completar...
            </p>
        </section>

        <section id="descargas">
            <h3>4. Descarga del documento</h3>
            <p> Este espacio esta reservado para que el usuario pueda descargar el manual de usuario en un documento
                y leerlo desde su dispositivo.
            </p>
            <a href="" download="manual/user_manual.docx"
                class="btn btn-outline-primary text-decoration-none d-block mx-auto mt-4"
                style="max-width: 200px;">Descargar PDF</a>
        </section>
    </div>


</body>