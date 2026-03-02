<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>ConstructoraAV - Suministro de materiales</title>
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
</head>
<body>
  <div class="page">
    <nav class="nav">
      <div class="nav-inner">
        <a class="brand" href="{{ url('/') }}#top"><img class="brand-logo" src="{{ asset('exteriores/logo-chido.png') }}" alt="Constructora AV" /></a>
        <button class="mobile-toggle" id="menuToggle">Menu</button>
        <div class="nav-links" id="navLinks">
          <a href="{{ url('servicios.html') }}">Servicios</a>
          <a href="{{ url('proyectos.html') }}">Proyectos</a>
          <a href="{{ url('renta.html') }}">Renta de maquinaria</a>
          <a href="{{ url('materiales.html') }}">Materiales</a>
          <a href="{{ url('/') }}#nosotros">Nosotros</a>
          <a href="{{ url('/') }}#contacto">Contacto</a>
        </div>
        <a class="cta" href="{{ url('/') }}#contacto">Cotizar proyecto</a>
      </div>
    </nav>

    <section class="page-hero" id="top">
      <div class="page-hero-content">
        <span class="hero-tag">Suministro puntual</span>
        <h1>Materiales con calidad certificada y entrega programada</h1>
        <p>Abastecimiento confiable para obra civil e industrial, con control de calidad y trazabilidad en cada pedido.</p>
        <div class="hero-badges">
          <span>Disponibilidad inmediata</span>
          <span>Logistica optimizada</span>
          <span>Soporte tecnico</span>
        </div>
        <div class="hero-actions">
          <a class="cta" href="#cotizar-materiales">Cotizar materiales</a>
          <a class="cta cta-outline" href="{{ url('/') }}#contacto">Hablar con un asesor</a>
        </div>
      </div>
      <div class="page-hero-card">
        <h3>Control y calidad</h3>
        <ul class="check-list">
          <li>Materiales certificados</li>
          <li>Entregas programadas</li>
          <li>Inventario garantizado</li>
          <li>Soporte en obra</li>
        </ul>
        <div class="card-metric">
          <strong>+120</strong>
          <span>Envios al mes</span>
        </div>
      </div>
    </section>

    <section class="section" id="catalogo">
      <div class="section-header">
        <div>
          <h2>Materiales disponibles</h2>
          <p>Una seleccion base para abastecer proyectos de diferentes escalas.</p>
        </div>
      </div>
      <div class="carousel" data-carousel>
        <button class="carousel-btn prev" type="button" aria-label="Anterior">‹</button>
        <div class="carousel-track">
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/arena-de-rio.png') }}" alt="Arena de rio" />
            <div class="carousel-caption">
              <strong>Arena de rio</strong>
              <ul>
                <li>Uso: concreto y mortero</li>
                <li>Textura fina</li>
                <li>Disponibilidad inmediata</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/grava.jpg') }}" alt="Grava" />
            <div class="carousel-caption">
              <strong>Grava</strong>
              <ul>
                <li>Uso: drenaje y cimentacion</li>
                <li>Alta resistencia</li>
                <li>Entrega a obra</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/monton-de-gravon-sobre-fondo-blanco.png') }}" alt="Gravon" />
            <div class="carousel-caption">
              <strong>Gravon</strong>
              <ul>
                <li>Uso: base y subbase</li>
                <li>Granulometria controlada</li>
                <li>Alto rendimiento</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/subbase.png') }}" alt="Subbase" />
            <div class="carousel-caption">
              <strong>Subbase</strong>
              <ul>
                <li>Uso: estabilizacion de suelos</li>
                <li>Compactacion eficiente</li>
                <li>Disponibilidad por volumen</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/tepetate.png') }}" alt="Tepetate" />
            <div class="carousel-caption">
              <strong>Tepetate</strong>
              <ul>
                <li>Uso: relleno y nivelacion</li>
                <li>Facil compactacion</li>
                <li>Precio competitivo</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/tierra-lama.png') }}" alt="Tierra lama" />
            <div class="carousel-caption">
              <strong>Tierra lama</strong>
              <ul>
                <li>Uso: mejora de suelos y abono natural</li>
                <li>Retencion de humedad y nutrientes</li>
                <li>Nivelacion y compactacion de terrenos</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/asfalto.png') }}" alt="Asfalto" />
            <div class="carousel-caption">
              <strong>Asfalto</strong>
              <ul>
                <li>Uso: pavimentacion</li>
                <li>Calidad certificada</li>
                <li>Entrega en obra</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/espigon.png') }}" alt="Espigon" />
            <div class="carousel-caption">
              <strong>Espigon</strong>
              <ul>
                <li>Uso: proteccion costera</li>
                <li>Gran resistencia</li>
                <li>Disponibilidad por pedido</li>
              </ul>
            </div>
          </div>
          <div class="carousel-slide">
            <img src="{{ asset('materiales-agregados/jal.png') }}" alt="Jal" />
            <div class="carousel-caption">
              <strong>Jal</strong>
              <ul>
                <li>Uso: aligerar cargas y rellenar firmes</li>
                <li>Material volcanico poroso y ligero</li>
                <li>Concretos ligeros y tabiques</li>
              </ul>
            </div>
          </div>
        </div>
        <button class="carousel-btn next" type="button" aria-label="Siguiente">›</button>
        <div class="carousel-dots" aria-hidden="true"></div>
      </div>
      <div class="material-note">
        <h3>Abastecimiento a la medida</h3>
        <p>Consolidamos pedidos por volumen y programamos entregas para reducir tiempos muertos en obra. Solicita asesoria para definir el material adecuado segun tu etapa de construccion.</p>
      </div>
    </section>

    <section class="section" id="cotizar-materiales">
      <div class="section-header">
        <div>
          <h2>Cotizar materiales</h2>
          <p>Envianos cantidades aproximadas y fechas para generar tu propuesta.</p>
        </div>
      </div>
      <div class="quote-grid">
        <div class="quote-card reveal">
          <h3>Soporte en suministro</h3>
          <p>Te ayudamos a planear entregas por etapas y optimizar costos de transporte.</p>
          <ul class="check-list">
            <li>Planeacion de entrega</li>
            <li>Control de calidad</li>
            <li>Disponibilidad garantizada</li>
          </ul>
        </div>
        <form class="quote-form reveal" method="POST" action="{{ route('materiales.submit') }}">
          @csrf
          <div class="form-row">
            <input type="text" name="name" placeholder="Nombre" required />
            <input type="tel" name="phone" placeholder="Telefono" required />
          </div>
          <div class="form-row">
            <input type="email" name="email" placeholder="Correo" />
            <input type="text" name="material" placeholder="Material requerido" required />
          </div>
          <textarea name="details" placeholder="Detalle del proyecto" required></textarea>
          <input type="text" name="quantity" placeholder="Cantidad aproximada" />
          <button class="cta" type="submit">Enviar solicitud</button>
          <p class="form-status" role="status">{{ session('success') }}</p>
          <p class="privacy-note">[NOMBRE COMERCIAL] es responsable del tratamiento de sus datos personales. Los datos proporcionados en este formulario se usarán para atender su solicitud. Consulte el <a href="{{ url('legal.html#aviso') }}">Aviso de Privacidad Integral</a>.</p>
        </form>
      </div>
    </section>

    <footer class="footer">
      <div class="footer-grid">
        <div>
          <h3>ConstructoraAV</h3>
          <p>Construccion integral con enfoque tecnico, seguridad y entrega puntual.</p>
        </div>
        <div>
          <h4>Contacto</h4>
          <p>Av. Industria 210, Monterrey</p>
          <p>+52 81 0000 0000</p>
          <p>contacto@constructorav.com</p>
        </div>
        <div>
          <h4>Links</h4>
          <a href="{{ url('servicios.html') }}">Servicios</a>
          <a href="{{ url('proyectos.html') }}">Proyectos</a>
          <a href="{{ url('renta.html') }}">Renta de maquinaria</a>
          <a href="{{ url('materiales.html') }}">Materiales</a>
          <a href="{{ url('/') }}#contacto">Contacto</a>
          <a href="{{ url('legal.html') }}" class="footer-muted">Aviso de privacidad</a>
        </div>
        <div>
          <h4>Acceso interno</h4>
          <p class="footer-muted">Solo personal autorizado.</p>
          <a class="footer-internal" href="/login">Acceso interno</a>
        </div>
      </div>
      <div class="footer-bottom">
        ConstructoraAV 2026 - Empresa de construccion. Todos los derechos reservados.
      </div>
    </footer>
  </div>

  <script src="{{ asset('script.js') }}"></script>
</body>
</html>
