<!--Categorias1 -->
<style>
	
  @import url('https://fonts.googleapis.com/css2?family=Dancing+Script&family=Montserrat:wght@200&display=swap');

    /* estilo contenedor de botones*/

.ch-grid {
	margin: 20px 0 0 0;
	padding: 0;
	list-style: none;
	display: block;
	text-align: center;
	width: 100%;
}

.ch-grid:after,
.ch-item:before {
	content: '';
    display: table;
}

.ch-grid:after {
	clear: both;
}

.ch-grid li {
	width: 220px;
	height: 220px;
	display: inline-block;
	margin: 20px;
}


/* Estilos para botones*/
.ch-item {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	position: relative;
	cursor: default;
	box-shadow: 0 1px 3px rgba(0,0,0,0.2);
}
.ch-thumb {
	width: 100%;
	height: 100%;
	border-radius: 50%;
	overflow: hidden;
	position: absolute;
	box-shadow: inset 0 0 0 15px rgba(255,255,255, 0.5);
	transform-origin: 95% 40%;
	transition: all 0.3s ease-in-out;
}
.ch-thumb:after {
	content: '';
	width: 8px;
	height: 8px;
	position: absolute;
	border-radius: 50%;
	top: 40%;
	left: 95%;
	margin: -4px 0 0 -4px;
	background: radial-gradient(ellipse at center, rgba(14,14,14,1) 0%,rgba(125,126,125,1) 100%);
	box-shadow: 0 0 1px rgba(255,255,255,0.9);
}
.ch-img-1 { 
	background-image: url(img/categoria_herbal.png);
	z-index: 14;
}

.ch-img-2 { 
	background-image: url(img/categoria_nutri.png);
	z-index: 11;
}

.ch-img-3 { 
	background-image: url(img/categoria_belleza.png);
	z-index: 10;
}
.ch-info {
	position: absolute;
	width: inherit;
	height: inherit;
	border-radius: 50%;
	overflow: hidden;
	background: #85a72bff url(../images/noise.png);
	box-shadow: inset 0 0 0 5px rgba(0,0,0,0.05);
}
.ch-info h3 {
	color: #fff;
	text-transform: uppercase;
	position: relative;
	letter-spacing: 2px;
	font-size: 22px;
	margin: 0 10px;
	padding: 22px 0 0 0;
	height: 85px;
	font-family: 'Montserrat';
	text-align: center;
	text-shadow: 
		0 0 1px #fff, 
		0 2px 2px rgba(0,0,0,0.3);
}

.ch-info p {
	color: #fff;
	padding: 10px 5px;
	font-style: italic;
	font-family: 'Dancing Script';
	margin: 0 30px;
	font-size: 21px;
	border-top: 1px solid rgba(255,255,255,0.5);
}
.ch-info p a {
	display: block;
	color: #333;
	width: 80px;
	height: 80px;
	background: rgba(255,255,255,0.3);
	border-radius: 50%;
	color: #fff;
	font-style: normal;
	font-weight: 700;
	text-transform: uppercase;
	font-size: 17px;
	letter-spacing: 1px;
	padding-top: 24px;
	margin: 7px auto 0;
	font-family: 'Montserrat';
	opacity: 0;
	transition: 
		transform 0.3s ease-in-out 0.2s,
		opacity 0.3s ease-in-out 0.2s,
		background 0.2s linear 0s;
	transform: translateX(60px) rotate(90deg);
}

.ch-info p a:hover {
	background: rgba(255,255,255,0.5);
}
.ch-item:hover .ch-thumb {
	box-shadow: inset 0 0 0 15px rgba(255,255,255, 0.5), 0 1px 3px rgba(0,0,0,0.2);
	transform: rotate(-110deg);
}
.ch-item:hover .ch-info p a{
	opacity: 1;
	transform: translateX(0px) rotate(0deg);
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


<ul class="ch-grid">
<li>
	<div class="ch-item">	
		<div class="ch-info">
			<h3>Herbales</h3>
			<p>Visita<a href="productos_herbales.php">Ir</a></p>
		</div>
		<div class="ch-thumb ch-img-1"></div>
	</div>
</li>
<li>
	<div class="ch-item">	
		<div class="ch-info">
			<h3>Nutrición</h3>
			<p>Visita<a href="productos_nutricionales.php">Ir</a></p>
		</div>
		<div class="ch-thumb ch-img-2"></div>
	</div>
</li>
<li>
	<div class="ch-item">	
		<div class="ch-info">
			<h3>Cuidado y belleza</h3>
			<p>Visita<a href="productos_nutricosmeticos.php">Ir</a></p>
		</div>
		<div class="ch-thumb ch-img-3"></div>
	</div>
</li>
</ul>

</div>
