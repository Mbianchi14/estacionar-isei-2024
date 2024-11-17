/* INICIALIZAMOS */
const CACHE_NAME = "EstacionApp-v1";
const urlsToCache = [
  "/home/inicio",
  "/css/main.css",
  "index.php",
  "img/favicon.png.png",
  "img/favicon.png.png"
];

/* INSTALAMOS EL SERVICE WORKER */
self.addEventListener("install", (event) => {
  event.waitUntil(
    caches.open(CACHE_NAME).then((cache) => {
      return cache.addAll(urlsToCache);
    })
  );
});

/* Interceptamos solicitudes de red */
self.addEventListener("fetch", (event) => {
  event.respondWith(
    caches.match(event.request).then((response) => {
      return response || fetch(event.request);
    })
  );
});

/* Actualizar SWorkerjs  */
self.addEventListener("activate", (event) => {
  const cacheWhitelist = [CACHE_NAME];
  event.waitUntil(
    caches.keys().then((cacheNames) => {
      return Promise.all(
        cacheNames.map((cacheName) => {
          if (!cacheWhitelist.includes(cacheName)) {
            return caches.delete(cacheName);
          }
        })
      );
    })
  );
});
