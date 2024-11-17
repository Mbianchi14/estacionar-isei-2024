<head>
    <?= $head ?>
    <title><?= $title ?></title>
</head>

<body>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <style>
        #map {
            height: 100vh;
            /* Altura total de la ventana */
            width: 100%;
        }


        .search-overlay {
            z-index: 1000;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
            padding: 10px 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            width: 100%;
            /* Asegura que el formulario no sea más ancho que el mapa */
            max-width: 700px;
            /* Limita el tamaño máximo del formulario */
            margin-top: 110px;
            /* Ajusta este valor a lo que necesites */
        }

        .leaflet-container {
            background: #e6f7ff;
            /* Color de fondo de gama azul */
        }

        .form-control {
            border: 1px solid #007BFF;
            /* Color azul de los bordes */
        }

        .leaflet-popup-content-wrapper {
            background-color: transparent !important;
            box-shadow: none !important;
            border: none !important;
        }

        .leaflet-popup-tip {
            display: none !important;
            /* eliminar flecha  */
        }

        .leaflet-popup-content {
            color: #000;
            padding: 0;
        }

        .custom-popup {
            background-color: #0022B226;
            color: #0022b2;
            width: 63px;
            height: 28px;
            border-radius: 10px;
            font-weight: 800;
            font-size: 17px;
            text-align: center;
            cursor: pointer;
            gap: 2px;
            position: sticky;
            top: 284px;
            left: 214px;
        }

        .custom-circle {
            background-color: #0022B226;
            color: #0022b2;
            border-radius: 10px;
            font-weight: 800;
            font-size: 17px;
            text-align: center;
            cursor: pointer;
            gap: 2px;
            position: sticky;
            top: 284px;
            left: 214px;
        }

        .custom-circle>p {
            padding: 3px;
        }

        .custom-popup>p {
            padding: 3px;
        }
    </style>

    <header><?= $header ?></header>
    <div class="container-fluid p-0">
        <!-- Mapa -->
        <div id="map"></div>


        <!-- Superposición del input de búsqueda -->
        <div class="search-overlay position-absolute top-0 start-50 translate-middle-x mt-7">
            <form method="GET" class="d-flex flex-row gap-2">
                <input type="text" class="form-control" name="search" placeholder="Buscar ubicación..." required>
                <select class="form-select" name="category">
                    <option value="" selected disabled>Selecciona un filtro</option>
                    <option value="cochera">cochera</option>
                    <option value="hotels">op 1 </option>
                    <option value="parks">op 2</option>
                </select>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        </div>

        <!-- Leaflet JS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
        <!-- Script del mapa -->

        <?php
        $precio = 2000;
        $lat = -32.938823;
        $lon = -60.653619;
        ?>

        <script>
            var map = L.map("map").setView([-32.95481, -60.66925], 14);
            var Stadia_AlidadeSmooth = L.tileLayer(
                "https://tiles.stadiamaps.com/tiles/alidade_smooth/{z}/{x}/{y}{r}.{ext}",
                {
                    minZoom: 0,
                    maxZoom: 20,
                    attribution:
                        '<a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy;',
                    ext: "png",
                }
            ).addTo(map);

            var Eicon = L.icon({
                iconUrl: '../img/favicon.png',

                iconSize: [45, 45], // size of the icon
                iconAnchor: [22, 22], // point of the icon which will correspond to marker's location
                popupAnchor: [-1, -1] // point from which the popup should open relative to the iconAnchor
            });

            var circle = L.circle([-32.937358, -60.662864], {
                color: '#0022B2',
                fillColor: '#0022B226',
                fillOpacity: 0.5,
                radius: 400
            }).addTo(map)
                .bindPopup(`<div class="custom-circle p-2 d-flex justify-content-center align-items-center" style="background-color: var(--color-901); color: var(--color-900); border-radius: 10px; font-weight: 800; font-size: 17px; position: sticky; top: 284px; left: 214px;">
    <p class="mb-0">Cocheras cerca</p>
</div>`)
                .openPopup();

            var precio = <?= json_encode($precio); ?>;
            var lat = <?= json_encode($lat); ?>;
            var lon = <?= json_encode($lon); ?>;
            L.marker([lat, lon], { icon: Eicon }).addTo(map)
                .bindPopup(`<div class="custom-popup p-2 d-flex justify-content-center align-items-center" style="background-color: var(--color-901); color: var(--color-900); border-radius: 10px; font-weight: 800; font-size: 17px; position: sticky; top: 284px; left: 214px;">
    <p class="mb-0">$${precio}</p>
</div>`)
                .openPopup();

        </script>

        <?= $navInferior ?>
</body>