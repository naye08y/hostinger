CREATE DATABASE araceli_tienda;
USE araceli_tienda;

CREATE TABLE categoria(

    id int not null auto_increment, 
    nombre varchar (50),
    PRIMARY KEY (id)

);

CREATE TABLE productos(

    id int not null auto_increment, 
    codigo varchar (255),
    nombre varchar (50),
    ruta_img varchar (100),
    precio1 varchar (50),
    precio2 varchar (50),
    precio3 varchar (50),
    categoria_id int,
    existencia DECIMAL(5, 2) NOT NULL,
    PRIMARY KEY (id)

);

ALTER TABLE productos
 ADD CONSTRAINT categoria_id FOREIGN KEY (categoria_id) REFERENCES categoria (id) ON DELETE CASCADE;


CREATE TABLE inventario(

    id int not null auto_increment, 
    nombre varchar (50),
    piezas varchar (50),
    PRIMARY KEY (id)

);


CREATE TABLE receta(

    id int not null auto_increment, 
    productos_id int,
    inventario_id int,
    cantidad_inventario varchar (50),
    PRIMARY KEY (id)
);


ALTER TABLE receta
 ADD CONSTRAINT productos_id FOREIGN KEY (productos_id) REFERENCES productos (id) ON DELETE CASCADE;

ALTER TABLE receta
 ADD CONSTRAINT inventario_id FOREIGN KEY (inventario_id) REFERENCES inventario (id) ON DELETE CASCADE;


CREATE TABLE usuarios(

    id int not null auto_increment, 
    nombre varchar (50),
    apellido varchar (50),
    correo varchar (500),
    contraseña varchar (100),
    domicilio varchar (100),
    telefono varchar (20),
    permiso int,
    PRIMARY KEY (id)

);

INSERT INTO categoria (nombre) VALUES ('Bebidas Calientes');
INSERT INTO categoria (nombre) VALUES ('Bebidas Frías');
INSERT INTO categoria (nombre) VALUES ('Alimentos');

 CREATE TABLE pedido(
    id int not null auto_increment,
    idtransaccion varchar (20),
    fecha datetime,
    statusPaypal varchar (20),
    correo varchar (50),
    usuario_id int,
    total decimal (10, 2),
    PRIMARY KEY (id)
);

ALTER TABLE pedido
 ADD CONSTRAINT usuario_id FOREIGN KEY (usuario_id) REFERENCES usuarios (id) ON DELETE CASCADE;

CREATE TABLE detalle_pedido(
    id int not null auto_increment,
    pedido_id int,
    producto_id int,
    nombre varchar (50),
    precio decimal (10,2),
    cantidad int,
    PRIMARY KEY (id)
);

ALTER TABLE detalle_pedido
 ADD CONSTRAINT pedido_id FOREIGN KEY (pedido_id) REFERENCES pedido (id) ON DELETE CASCADE;

  ALTER TABLE detalle_pedido
  ADD CONSTRAINT product_id FOREIGN KEY (producto_id) REFERENCES productos (id) ON DELETE CASCADE;

  CREATE TABLE ventas(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	fecha DATETIME NOT NULL,
	total DECIMAL(7,2),
	PRIMARY KEY(id)
) ;

CREATE TABLE productos_vendidos(
	id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
	id_producto BIGINT UNSIGNED NOT NULL,
	cantidad BIGINT UNSIGNED NOT NULL,
	id_venta BIGINT UNSIGNED NOT NULL,
	PRIMARY KEY(id)
);


INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatCajeta', 'Latte de Cajeta',50.00,'latCajeta.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatRomp', 'Latte de Rompope',50.00,'bRomp.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatNull', 'Latte de Nutella',50.00,'bNutella.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatVai', 'Latte Vainilla',50.00,'capVaini.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatCar', 'Latte con Caramelo',50.00,'latCar.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatMK', 'Latte Moka Blanco',50.00,'mocBlan.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatCal', 'Latte Dulce de Calabaza',50.00,'caCalab.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('LatAmar', 'Latte Amaretto',50.00,'caAmar.jpg',20,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('CarAmer','Cafe Americano',50.00,'caAmer.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('ChocBlan','Chocolate Blanco ',50.00,'chocBlan.jpg',30,32,35,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('HorcharaCal','Horchata caliente',50.00,'horcha.jpg',22,34,38,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeManCal','Té Manzana Canela',50.00,'teManza.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeFrutosR','Té Frutos Rojos',50.00,'teFrutos.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeVerde','Té Verde',50.00,'teVerde.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeManza','Té Manzanilla',50.00,'teManza.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeHierba','Té Hierbabuena',50.00,'teHierba.jpg',15,18,22,1);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,precio2,precio3,categoria_id) VALUES ('TeLimon','Té Limón',50.00,'teLimon.jpg',15,18,22,1);

INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraCaj','Frapuccino Cajeta',50.00,'fCaj.png',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraNut','Frapuccino Nutella',50.00,'fNut.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraCar','Frapuccino Caramelo',50.00,'fCar.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraCap','Frapuccino Capuchino',50.00,'fCap.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraOreo','Frapuccino Oreo',50.00,'fOreo.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraMango','Frappe Mango Chamoy',50.00,'fMango.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraFresa','Frappe Fresa',50.00,'fFresa.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('FraChocolate','Frappe Chocolate',50.00,'fChoc.jpg',32,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Gomi','Gomiboing',50.00,'gomi.jpg',20,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SoLimon','Soda Limón',50.00,'sLim.jpg',25,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SoMango','Soda Mango',50.00,'sMango.jpg',25,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SoFresa','Soda Fresa',50.00,'sFresa.jpg',25,2);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SoNar','Soda Naranja',50.00,'sNaranja.jpg',25,2);

INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SJQM','Sandwich jamón Queso Manchego',50.00,'saJM.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SJQA','Sandwich jamón Queso Amarillo',50.00,'saJA.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SJPan','Sandwich jamón Queso Panela',50.00,'sPanela.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SJOax','Sandwich jamón Queso Oaxaca',50.00,'sOaxaca.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SSalch','Sandwich con Salchica',50.00,'sSal.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('SHuevo','Sandwich de Huevo',50.00,'saHue.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Sincro','Sincronizada',50.00,'sincro.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Moll','Molletes',50.00,'moll.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('TChil','Torta de Chilaquiles',50.00,'tChil.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('TSal','Torta de Salchicha',50.00,'tSal.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('TMill','Torta de Milanesa',50.00,'tMil.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('hHawai','Hamburguesa Hawaiana',50.00,'hHawai.jpg',55,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('hDoQueso','Hamburguesa Doble Queso',50.00,'hDoQ.jpg',60,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('hEsp','Hamburguesa Especial',50.00,'hEsp.jpg',65,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('HotDog','HotDog',50.00,'hotD.png',20,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('HotDogTQ','HotDog Tocino y Queso',50.00,'hotTQ.jpg',25,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CuernitoJ','Cuernito jamón',50.00,'cJamon.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Ensalada','Ensalada',50.00,'ensa.jpg',40,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('MilChil','Milanesa con Chilaquiles',50.00,'milChil.jpg',65,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('TacMil','Tacos de Milanesa',50.00,'tacMil.jpg',25,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('TaBick','Tacos de Bisteck',50.00,'taBis.jpg',20,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Nachos','Nachos',80.00,'nachos.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Maruchan','Maruchan',100.00,'maruchan.png',20,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepNull','Crepa Nutella',50.00,'creNull.jpg',35,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepNullFre','Crepa Nutella con Fresa',50.00,'creNullFresa.jpg',35,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepCaj','Crepa Cajeta con Nuez',50.00,'creCajN.jpg',35,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepFhilZal','Crepa Philadelphia con Zarzamora',50.00,'creFilZa.jpg',35,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepFhilFresa','Crepa Philadelphia con Fresa',50.00,'creFilFresa.jpg',35,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepSal','Crepa de Salchicha',50.00,'creSal.jpg',40,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('CrepHawai','Crepa Hawaiiana',50.00,'creHawai.jpg',40,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Waffles','Waffles',50.00,'wafles.jpg',33,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Chicharrones','Chicharrones',90.00,'chicha.jpg',10,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Palomitas','Palomitas',90.00,'palomitas.jpg',22,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Dedos','Dedos Indy',90.00,'dedos.jpg',5,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Bubu','Bubulubu',90.00,'bubulu.jpg',5,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Cheesecake','Cheesecake',20.00,'ches.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Pastel','Pastel',20.00,'pastel.jpg',30,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Pan','Rebanada de Pan',20.00,'pan.jpg',20,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('PanDul','Pan Dulce',20.00,'panDul.jpg',10,3);
INSERT INTO productos (codigo,nombre,existencia, ruta_img,precio1,categoria_id) VALUES ('Panque','Panquesito',20.00,'panquesito.jpg',8,3);



INSERT INTO inventario (nombre,piezas) VALUES ('lechita fresa', 9);
INSERT INTO inventario (nombre,piezas) VALUES ('lechita capuchino', 10);
INSERT INTO inventario (nombre,piezas) VALUES ('lechita de chocolate', 5);
INSERT INTO inventario (nombre,piezas) VALUES ('Boing mango', 24);
INSERT INTO inventario (nombre,piezas) VALUES ('Boing de piña', 17);
INSERT INTO inventario (nombre,piezas) VALUES ('Boing de guayaba', 20);
INSERT INTO inventario (nombre,piezas) VALUES ('Boing de manzana', 5);
INSERT INTO inventario (nombre,piezas) VALUES ('Coca sin azucar', 33);
INSERT INTO inventario (nombre,piezas) VALUES ('Sprite', 10);
INSERT INTO inventario (nombre,piezas) VALUES ('Refresco de Manzana', 6);
INSERT INTO inventario (nombre,piezas) VALUES ('Refresco de Naranja', 6);
INSERT INTO inventario (nombre,piezas) VALUES ('Milanesa de res', 6);
INSERT INTO inventario (nombre,piezas) VALUES ('Milanesa de pollo', 8);
INSERT INTO inventario (nombre,piezas) VALUES ('Carne de hamburguesa', 8);
INSERT INTO inventario (nombre,piezas) VALUES ('Bisteck', 6);
INSERT INTO inventario (nombre,piezas) VALUES ('Pechuga de bisteck', 5);
INSERT INTO inventario (nombre,piezas) VALUES ('Cheescake', 8);
INSERT INTO inventario (nombre,piezas) VALUES ('Fresas', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Zarzamora', 6);
INSERT INTO inventario (nombre,piezas) VALUES ('Maruchan', 90);
INSERT INTO inventario (nombre,piezas) VALUES ('Cigarros', 60);
INSERT INTO inventario (nombre,piezas) VALUES ('Botana', 10);
INSERT INTO inventario (nombre,piezas) VALUES ('Te manzanilla', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Te verde', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Te canela', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Te fusion herba', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Te hierbabuena', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Te limón', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Picafresas', 3);
INSERT INTO inventario (nombre,piezas) VALUES ('Gomitas', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Chamoy', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Miguelito', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Crema batida', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Chocolate hersey', 3);
INSERT INTO inventario (nombre,piezas) VALUES ('Aceite', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Nutella', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Cajeta', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Caramelo', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Queso amarillo liquido', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Mantequilla', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Frijoles', 5);
INSERT INTO inventario (nombre,piezas) VALUES ('Durazno en almibar', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Piña en almibar', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Harina', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Lechera', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Café de grano', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Chiles curados', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Salsa chipotle', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Hielos', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Leche entera', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Leche deslactosada', 14);
INSERT INTO inventario (nombre,piezas) VALUES ('Mermelada Zarzamora', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Mermelada de fresa', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Canela en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Sal de ajo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Consome de pollo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Pimienta', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Cebolla en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Sal', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Azucar', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Sustituto de azucar', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Agua', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Aderezo cesar', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Aderezo ranch', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Aderezo itiliano', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Huevos', 20);
INSERT INTO inventario (nombre,piezas) VALUES ('Amareto', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Vainilla sin azucar', 3);
INSERT INTO inventario (nombre,piezas) VALUES ('Rompope', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Chocolate blanco', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Vainilla sin azucar', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Crema irlandesarme', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Avellana', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Cajeta en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Capuchino en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Horchata en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Chocolate  en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Chocolate blanco en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Cokies and cream en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Moka en polvo', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Fresa', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Mango ', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Jitomate', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Cebolla', 3);
INSERT INTO inventario (nombre,piezas) VALUES ('Chiles', 14);
INSERT INTO inventario (nombre,piezas) VALUES ('Limones', 16);
INSERT INTO inventario (nombre,piezas) VALUES ('Aguacate', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Lechuga', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Espinacas', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Papas', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Jitomates cherry', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Jitomates cherry', 5);
INSERT INTO inventario (nombre,piezas) VALUES ('Vasos cafe grande', 34);
INSERT INTO inventario (nombre,piezas) VALUES ('Vasos café mediano', 33);
INSERT INTO inventario (nombre,piezas) VALUES ('Vasos cafe chico', 55);
INSERT INTO inventario (nombre,piezas) VALUES ('Vasos frappe', 67);
INSERT INTO inventario (nombre,piezas) VALUES ('Tapas para vaso gra/Med', 77);
INSERT INTO inventario (nombre,piezas) VALUES ('Tapas vasos chicos', 55);
INSERT INTO inventario (nombre,piezas) VALUES ('Tapas frappe', 67);
INSERT INTO inventario (nombre,piezas) VALUES ('Popotes', 120);
INSERT INTO inventario (nombre,piezas) VALUES ('Agitadores', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Sirenas', 43);
INSERT INTO inventario (nombre,piezas) VALUES ('Servilletas', 2);
INSERT INTO inventario (nombre,piezas) VALUES ('Charolas de unicel grandes papas', 25);
INSERT INTO inventario (nombre,piezas) VALUES ('Charolas de unicel chicas', 22);
INSERT INTO inventario (nombre,piezas) VALUES ('Charolas hotdog',24);
INSERT INTO inventario (nombre,piezas) VALUES ('Charolas hamburgues', 25);
INSERT INTO inventario (nombre,piezas) VALUES ('Tenedores', 55);
INSERT INTO inventario (nombre,piezas) VALUES ('Cucharas', 46);
INSERT INTO inventario (nombre,piezas) VALUES ('Fabuloso', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Fibras', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Sacates', 3);
INSERT INTO inventario (nombre,piezas) VALUES ('Jabón', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Cloro', 4);
INSERT INTO inventario (nombre,piezas) VALUES ('Escoba', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Jalador', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Recogedor', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('jabón para mános', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Telera para torta', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Bolillo para mollete', 20);
INSERT INTO inventario (nombre,piezas) VALUES ('Bolillitos para hornear', 40);
INSERT INTO inventario (nombre,piezas) VALUES ('Cuernitos', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Panquecitos', 20);
INSERT INTO inventario (nombre,piezas) VALUES ('Pan de sadwich blanco', 14);
INSERT INTO inventario (nombre,piezas) VALUES ('Pan de sadwich integral', 10);
INSERT INTO inventario (nombre,piezas) VALUES ('Pan de Hotdogs', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Pan de Hamburguesa', 12);
INSERT INTO inventario (nombre,piezas) VALUES ('Jamón', 20);
INSERT INTO inventario (nombre,piezas) VALUES ('Salchicha', 22);
INSERT INTO inventario (nombre,piezas) VALUES ('Queso amarillo', 24);
INSERT INTO inventario (nombre,piezas) VALUES ('Queso panela', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Queso Oaxaca', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Tocino', 1);
INSERT INTO inventario (nombre,piezas) VALUES ('Philadelphia', 5);