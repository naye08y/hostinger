<!--foother-->
<style>
  .footer-bg {
  background-color: #cce3c0;
}

.text-green {
  color: #2e5339;
  font-family: 'Helvetica', sans-serif;
  font-size: 0.9rem;
}

.footer-title {
  color: #4a7c59;
  font-family: 'Playfair Display', serif;
  font-size: 1.2rem;
  margin-bottom: 1rem;
  position: relative;
}

.footer-title::after {
  content: "";
  display: block;
  width: 40px;
  height: 2px;
  background-color: #4a7c59;
  margin-top: 6px;
}

.footer-links {
  list-style: none;
  padding: 0;
  margin: 0;
}

.footer-links li {
  margin-bottom: 8px;
}

.footer-links a {
  color: #2e5339;
  text-decoration: none;
  transition: color 0.3s ease;
  display: inline-block;
}

.footer-links a:hover {
  color: #000;
  transform: translateX(2px);
}

.footer-text {
  margin-top: 10px;
  font-size: 0.85rem;
}

.footer-socials a {
  display: inline-block;
  margin-right: 10px;
  transition: transform 0.3s ease;
}

.footer-socials img {
  width: 32px;
  height: 32px;
  border-radius: 6px;
  transition: filter 0.3s ease, transform 0.3s ease;
}

.footer-socials a:hover img {
  filter: brightness(1.2);
  transform: scale(1.1);
}

.footer-divider {
  border-top: 2px solid #8c6f54;
  opacity: 0.7;
  margin-top: 30px;
}

/* Responsivo */
@media (max-width: 576px) {
  .footer-title {
    text-align: center;
  }

  .footer-links li,
  .footer-text,
  .footer-socials {
    text-align: center;
  }

  .footer-socials a {
    margin: 0 8px;
  }
}

  </style>
<style>
/* Navegación principal */
#navegacion {
    background-color: #ffffff; /* fondo blanco */
    font-family: 'Poppins', sans-serif; /* tipografía elegante y moderna */
    font-weight: 700; /* más negrita */
    box-shadow: 0 2px 5px rgba(0,0,0,0.1); /* sombra sutil */
    padding: 1rem;
}

/* Botones dentro de la navegación: borde verde, fondo transparente */
#navegacion .btn {
    background-color: transparent; /* sin fondo */
    color: #5f9e6dff; /* verde para texto y borde */
    border: 2px solid #5f9e6dff; /* borde verde */
    padding: 0.5rem 1.2rem;
    font-weight: 600;
    border-radius: 8px;
    transition: all 0.3s ease;
    font-family: 'Poppins', sans-serif;
}

/* Efecto hover: relleno verde pastel y texto blanco */
#navegacion .btn:hover {
    background-color: #a8d5ba; /* verde pastel */
    color: #fff; /* texto blanco */
    transform: scale(1.05);
    border-color: #a8d5ba;
}

/* Badge de carrito */
#navegacion #num_cart {
    background-color: #000; /* fondo negro */
    color: #fff; /* texto blanco */
    padding: 2px 6px;
    border-radius: 50%;
    font-size: 0.8rem;
    vertical-align: top;
}

/* Alineación para el botón de Buscar (text-end) y Mi Carrito */
#navegacion .text-end {
    display: inline-block;
    margin-right: 10px;
}

/* Responsive para móviles */
@media (max-width: 576px) {
    #navegacion {
        text-align: center;
    }
    #navegacion .text-end {
        display: block;
        margin: 0.5rem 0;
    }
}

/* Navbar fijo arriba */
#navegacion {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    z-index: 9999;
    transition: top 0.3s;
}
</style>


<footer class="footer-bg text-green">
  <div class="container py-5">
    <div class="row gy-4">
      <!-- Ubicación -->
      <div class="col-12 col-md-5">
        <h5 class="footer-title">Ubicación</h5>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3753.190569926138!2d-99.25325262610298!3d19.831887927810925!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d226e96268038b%3A0xd4198e04d4e0df19!2sYerbabuena%2C%2054694%20Santa%20Teresa%2C%20M%C3%A9x.!5e0!3m2!1ses-419!2smx!4v17572797545"
          width="100%" height="200"
          style="border:0; border-radius: 10px;" loading="lazy">
        </iframe>
        <p class="footer-text">Yerbabuena 6, 54694 Santa Teresa, Méx.</p>
      </div>

      <!-- Más información -->
      <div class="col-6 col-md-2">
        <h5 class="footer-title">Más información</h5>
        <ul class="footer-links">
          <li><a href="conocenos.php">Conócenos</a></li>
          <li><a href="terminosYcondiciones.php">Términos y condiciones</a></li>
          <li><a href="avisoPrivacidad.php">Aviso de privacidad</a></li>
        </ul>
      </div>

      <!-- Contacto -->
      <div class="col-6 col-md-2">
        <h5 class="footer-title">Contáctanos</h5>
        <ul class="footer-links">
          <li>Email</li>
          <li><a href="mailto:almarazaraceli777@gmail.com">almarazaraceli777@gmail.com</a></li>
          <li>WhatsApp</li>
          <li><a href="https://wa.me/525512603194">55-1260-3194</a></li>
        </ul>
      </div>

      <!-- Redes sociales -->
      <div class="col-12 col-md-3">
        <h5 class="footer-title">Síguenos</h5>
        <div class="footer-socials">
          <a href="#"><img src="img/facebook.png" alt="Facebook"></a>
          <a href="#"><img src="img/instagram.png" alt="Instagram"></a>
          <a href="#"><img src="img/whatsapp.png" alt="WhatsApp"></a>
        </div>
      </div>
    </div>

    <hr class="footer-divider">

    <div class="text-center mt-3">
      <h6>&copy; Hecho en México, todos los derechos reservados.</h6>
    </div>
  </div>
</footer>

