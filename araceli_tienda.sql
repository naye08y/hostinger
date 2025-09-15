-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-09-2025 a las 12:44:22
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `araceli_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_guardado`
--

CREATE TABLE `carrito_guardado` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito_guardado`
--

INSERT INTO `carrito_guardado` (`id`, `usuario_id`, `producto_id`, `cantidad`) VALUES
(6, 4, 2, 1),
(7, 4, 1, 1),
(8, 4, 3, 1),
(9, 4, 5, 1),
(10, 3, 2, 1),
(11, 3, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Nutricosmeticos'),
(2, 'Herbales'),
(3, 'Nutricionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`id`, `pedido_id`, `producto_id`, `nombre`, `precio`, `cantidad`) VALUES
(1, 4, 1, 'Algasilicio', 324.00, 1),
(2, 5, 3, 'Bio-P', 199.00, 1),
(3, 6, 1, 'Algasilicio', 324.00, 1),
(4, 6, 2, 'ATX', 419.00, 1),
(5, 6, 3, 'Bio-P', 199.00, 1),
(6, 7, 10, 'Aceite Eucalipto y Romero', 289.00, 1),
(7, 7, 17, 'Crema para Piernas', 314.00, 1),
(8, 7, 20, 'Flex-In', 499.00, 1),
(9, 8, 1, 'Algasilicio', 324.00, 1),
(10, 8, 4, 'SBT', 119.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `piezas` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id`, `nombre`, `piezas`) VALUES
(1, 'Cápsulas con hongo SHITAKE', '10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paquete`
--

CREATE TABLE `paquete` (
  `id` int(11) NOT NULL,
  `productos_id` int(11) DEFAULT NULL,
  `inventario_id` int(11) DEFAULT NULL,
  `cantidad_inventario` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `idtransaccion` varchar(20) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL,
  `statusPaypal` varchar(20) DEFAULT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `ventas_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`id`, `idtransaccion`, `fecha`, `statusPaypal`, `correo`, `usuario_id`, `total`, `ventas_id`) VALUES
(4, '125086845628', '2025-09-05 20:35:05', 'approved', NULL, 4, 324.00, NULL),
(5, '124544877223', '2025-09-05 21:33:08', 'approved', NULL, 3, 199.00, NULL),
(6, '125091010268', '2025-09-05 21:33:59', 'approved', NULL, 3, 942.00, NULL),
(7, '125090977872', '2025-09-05 21:35:44', 'approved', NULL, 3, 1102.00, NULL),
(8, '124545354343', '2025-09-05 21:38:52', 'approved', NULL, 3, 443.00, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo` varchar(255) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `ruta_img` varchar(100) DEFAULT NULL,
  `precio1` varchar(50) DEFAULT NULL,
  `precio2` varchar(50) DEFAULT NULL,
  `precio3` varchar(50) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL,
  `existencia` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo`, `nombre`, `descripcion`, `ruta_img`, `precio1`, `precio2`, `precio3`, `categoria_id`, `existencia`) VALUES
(1, '01_Algasilicio', 'Algasilicio', 'Ayuda en casos de tuberculosis, arterosclerosis y enfermedades óseas ya que en estas pierde grandes cantidades de silicio. Ayuda a disminuir colesterol. Ayuda en casos de hipertensión. Para cansancio, problemas menopaúsicos, cefaleas, enfermedades de Crohn, diabetes, tiroides y asma.', 'NutriCion/01Algasilicio-Photoroom.png', '324.00', NULL, NULL, 3, 10.00),
(2, '02_ATX', 'ATX', 'Combate los signos de envejecimiento prematuro, problemas circulatorios, alergias relacionadas con el sistema respiratorio, tratamiento en VIH y cáncer; asma, diabetes, artritis reumatoide, anemia, lupus psoriasis, estreñimiento.', 'NutriCion/04ATX-Photoroom.png', '419.00', NULL, NULL, 3, 10.00),
(3, '03_Bio-P', 'Bio-P', 'Provee de una energía para personas con diabetes, deportistas, esfuerzo físico o mental agotador, ayuda a tratar síntomas del refriado, excelente en el tratamiento contra la anemia ya que provee una cantidad suficiente de vitaminas y minerales, para personas con bajo rendimiento laboral a causa del mal descanso.', 'NutriCion/06BioP-Photoroom.png', '199.00', NULL, NULL, 3, 9.00),
(4, '04_SBT', 'SBT', 'Ayuda al control de peso y a su disminución controlada, auxiliar en casos de ansiedad por la comida, desintoxica el colon.', 'NutriCion/07SBT-Photoroom.png', '119.00', NULL, NULL, 3, 10.00),
(5, '05_Herba_DTX_384', 'Herba DTX 384', 'Ayuda a purificar la sangre, estimula el sistema linfático, ayuda a bajar niveles de colesterol y triglicéridos, diurético, antiinflamatorio, mal aliento, dolores estomacales, espasmos intestinales, diarrea, vomito, indigestión, intoxicación por comida.', 'NutriCion/12HerbaDTX-Photoroom.png', '119.00', NULL, NULL, 3, 9.00),
(6, '06_Isotonik', 'Isotonik', 'Suplemento alimenticio en polvo que contiene sales minerales que promueven la hidratación y fortalecimiento de sistemas.', 'NutriCion/Isotonik-Photoroom.png', '199.00', NULL, NULL, 3, 9.00),
(7, '07_HOM_PLUS', 'HOM+PLUS', 'Fórmula que aporte elementos naturales, vitaminas y minerales que favorecen el rendimiento físico y mental durante el día, y la regeneración de tejidos en la noche.', 'NutriCion/17HOMPLUS-Photoroom.png', '384.00', NULL, NULL, 3, 10.00),
(8, '08_COFFEE', 'COFFEE', 'Café en polvo con ingredientes que contienen propiedades estimulantes y nutritivas que ayudan a brindar energía y bienestar.', 'NutriCion/18coffee-Photoroom.png', '229.00', NULL, NULL, 3, 9.00),
(9, '09_Aceite_de_Krill', 'Aceite de Krill', 'Fuente de ácidos grasos y Omega 3, fosfolípidos, colina y astaxantina. Efectivo para reducir el colesterol y triglicéridos e inflamación de articulaciones, mejorar la función hepática, la función cerebral y el rendimiento físico.', 'NutriCion/AceiteDeKrill-Photoroom.png', '499.00', NULL, NULL, 3, 9.00),
(10, '10_Aceite_Eucalipto_y_Romero', 'Aceite Eucalipto y Romero', 'Contiene propiedades expectorantes que ayudan a tratar la congestión nasal y padecimientos respiratorios. Ideal para personas que les guste el aroma en oficina/habitación.', 'Herba/AceiteEucaliptoRomero-Photoroom.png', '289.00', NULL, NULL, 2, 9.00),
(11, '11_Balance_e', 'Balance-e', 'Ayuda a regular las emociones, ansiedad, depresión y estrés. Fuentes de GABA, un componente importante del sistema nervioso central que permite al cerebro controlar las emociones.', 'NutriCion/BALANCE-E-Photoroom.png', '279.00', NULL, NULL, 3, 10.00),
(12, '12_BioAloe_03', 'BioAloe 03', 'Contiene propiedad antiinflamatorias que ayudan en caso de gastritis o colitis. Es una excelente fuente de fibra soluble en caso de estreñimiento. Ayuda a proteger el tracto digestivo tratando síntomas de reflujo.', 'NutriCion/BioAloe03-Photoroom.png', '263.00', NULL, NULL, 3, 9.00),
(13, '13_Biotina_Cola_de_caballo_y_Colageno', 'Biotina, Cola de caballo y Colágeno', 'Aporta nutrición al cabello y cuero cabelludo.', 'NutriCosmeti/BiotinaColaDeCaballoColageno-Photoroom.png', '299.00', NULL, NULL, 1, 9.00),
(14, '14_Capsulas_TIR_01', 'Cápsulas TIR-01', 'Fuente natural de yodo, selenio y antioxidantes que fomentan la regulación de las hormonas tiroideas.', 'NutriCion/CapsulasTIR-01-Photoroom.png', '239.00', NULL, NULL, 3, 10.00),
(15, '15_Carbon_Vegetal_Nopal_y_Neem', 'Carbon Vegetal, Nopal y Neem', 'Auxiliar para eliminar todas aquellas sustancias, bacterias, toxinas y grasas no saludables del organismo, para casos de diarrea, flatulencias, eructos, mal aliento, residuos de alcohol, drogas, tabaco.', 'NutriCion/CarbonVegetalNopalNeem-Photoroom.png', '199.00', NULL, NULL, 3, 10.00),
(16, '16_Crema_de_Gayuba_para_Manos', 'Crema de Gayuba para Manos', 'Contiene activos que ayudan a atenuar las manchas dejándolas suaves y humectadas. Ideal para manchas en las manos o en caso de pigmentación provocada por el sol, edad, entre otros factores.', 'NutriCosmeti/CremaGayubaManos-Photoroom.png', '299.00', NULL, NULL, 1, 10.00),
(17, '17_Crema_para_Piernas', 'Crema para Piernas', 'Contiene propiedades analgésicas, relajantes y humectantes que ayudan a disminuir la sensación de pesadez en piernas.', 'Herba/CremaParaPiernas-Photoroom.png', '314.00', NULL, NULL, 2, 10.00),
(18, '18_Curcuma', 'Cúrcuma', 'Auxiliar en el tratamiento de padecimientos del hígado, como cirrosis, hígado graso, acidez estomacal, es anticancerígeno, ayuda a la expulsión de la retención de líquidos, por su efecto antiinflamatorio.', 'NutriCion/Curcuma-Photoroom.png', '239.00', NULL, NULL, 3, 10.00),
(19, '19_Fenix_CTX', 'Fénix CTX', 'Las células senescentes, son aquellas células atrofiadas, que con la edad, el cuerpo no elimina correctamente. Estas células pueden «contagiar» a las células de su alrededor creando una reacción en cadena de «células zombie» responsables de la inflamación que causa enfermedades degenerativas. Las rhadiola y la fisetina hacen más eficiente el senescente ayudándonos a prevenir enfermedades degenerativas. En conjunto con las Cápsulas Juv-Nid, promueven la Longevidad activa.', 'NutriCion/FenixCTX-Photoroom.png', '499.00', NULL, NULL, 3, 10.00),
(20, '20_Flex_In', 'Flex-In', 'Proviene osteoartritis, evita la inflamación, repara el cartílago y repone el colágeno para fortalecer las articulaciones y garantizar una buena movilidad hoy y en futuro.', 'Herba/Flex-In.png', '499.00', NULL, NULL, 2, 10.00),
(21, '21_Golden_Milk', 'Golden Milk', 'Aporta antioxidantes y posee propiedades antiinflamatorias que benefician a todo el organismo.', 'NutriCosmeti/GoldenMilk-Photoroom.png', '299.00', NULL, NULL, 1, 10.00),
(22, '22_Hoja_de_Moringa_y_Matcha', 'Hoja de Moringa y Matcha', 'Auxiliar para bajar la presión alta, bajar la glucosa de la sangre, y efecto de antibiótico, desmineralización, falta de energía, estrés, mejora el estado de alerta, ayuda a mejorar el rendimiento en personas deportistas.', 'Herba/HojaDeMoringaMatcha-Photoroom.png', '251.00', NULL, NULL, 2, 10.00),
(23, '23_Holo_Vis', 'Holo-Vis', 'El cempasúchil es rico en luteína y zeaxantina, dos componentes naturales de la retina que protegen a los ojos del envejecimiento debido a la degradación macular propia del paso de los años.', 'NutriCosmeti/Holo-VIS-Photoroom.png', '359.00', NULL, NULL, 1, 10.00),
(24, '24_Juv_Nad', 'Juv-Nad', 'Con el transcurso del tiempo, las células pierden su capacidad de generar energía y de auto repararse porque disminuye la producción de NAD+. El NMN es la materia prima principal para que el cuerpo produzca el NAD+ que necesita; el Resveratrol es activador de genes de la longevidad y la Quercetina ayuda a proteger las células del estrés oxidativo. Juv-NAD ayuda a aumentar la producción de NAD+ para que las células puedan trabajar de forma óptima y retrasar los procesos de envejecimiento. En conjunto con las cápsulas Fénix-CTX, promueven la Longevidad Activa.', 'NutriCosmeti/Juv-Nad-Photoroom.png', '499.00', NULL, NULL, 1, 10.00),
(25, '25_LC7D', 'LC7D', 'Suplemento alimenticio con ingredientes que ayudan aportando fibra, reducen las grasas en sangre, y tienen un efecto antiinflamatorio.', 'NutriCion/LC7D-Photoroom.png', '379.00', NULL, NULL, 3, 10.00),
(26, '26_Magnesio', 'Magnesio', 'El magnesio es necesario para el funcionamiento de todos los sistemas del cuerpo. Ayuda a mantener la función normal del músculo, nervios, corazón, huesos, cerebro y el sistema inmune, regula los niveles de azúcar, presión arterial y el ciclo de sueño.', 'NutriCion/MAGNESIO-Photoroom.png', '198.00', NULL, NULL, 3, 10.00),
(27, '27_Malteada_7BENE', 'Malteada 7BENE', 'Aporta energía para iniciar el día. Brinda vitaminas, minerales y fibra ideal para todas las personas. Complementa la alimentación en personas veganas.', 'NutriCion/Malteada7BENE-Photoroom.png', '33.00', NULL, NULL, 3, 10.00),
(28, '28_Mentex_C', 'Mentex-C', 'Potencia el rendimiento mental y mejora la concentración manteniendo una función cognitiva saludable mejorando la memoria, enfoque y energía mental a través del tiempo. Con extracto de bacopa y romero que han demostrado en estudios clínicos su efectividad para prevenir y corregir la degeneración cognitiva y aumentar la retención y eleuterococo y vitaminas B7 para aumentar la energía cerebral.', 'NutriCion/Mentex-C-Photoroom.png', '425.00', NULL, NULL, 3, 10.00),
(29, '29_MV_10', 'MV-10', 'Aporta el 75% de la dosis recomendada diaria de vitaminas A, C, E, B1, B2, B3, B5, B6, B12, D3, ácido fólico y biotina. El extracto de Rhodiola y las vitaminas del complejo B mejoran la resistencia, la energía y el rendimiento cognitivo.', 'NutriCion/MV-10-Photoroom.png', '279.00', NULL, NULL, 3, 10.00),
(30, '30_Omega_3_6_9', 'Omega 3-6-9', 'Controla la presión arterial, mejora el sistema nervioso y la visión, excelente para el estreñimiento, triglicéridos, hemorroides, protege contra infartos, reduce el azúcar en la sangre, el estrés oxidativo y la inflamación del intestino.', 'NutriCion/Omega3-6-9-Photoroom.png', '199.00', NULL, NULL, 3, 10.00),
(31, '31_Piel_Radiante', 'Piel Radiante', 'Ayuda aportando hidratación a la piel previniendo manchas. Dar apariencia luminosa a la piel. Brinda una mejor apariencia a la piel de las piernas, mejorando la circulación.', 'NutriCosmeti/PielRadiante-Photoroom.png', '39.00', NULL, NULL, 1, 10.00),
(32, '32_Piel_Tersa', 'Piel Tersa', 'Ayuda a mejorar la apariencia de la piel con imperfecciones. Aporta elementos que ayudan a la rápida recuperación y cicatrización en piel grasa maltratada. Brinda hidratación a la piel.', 'NutriCosmeti/PielTersa-Photoroom.png', '41.00', NULL, NULL, 1, 10.00),
(33, '33_Piernas_Bellas', 'Piernas Bellas', 'Promueve la microcirculación y la desinflamación de tejidos, aportando colágeno que le da más firmeza de los tejidos mejorando el drenaje linfático que evita la retención de líquidos.', 'NutriCosmeti/PiernasBellas-Photoroom.png', '36.00', NULL, NULL, 1, 10.00),
(34, '34_Piernas_V', 'Piernas V', 'Ayuda a mejorar la insuficiencia venosa, mejorando la apariencia de las venas y disminuye la pesadez, el hormigueo y corrige los hematomas.', 'NutriCosmeti/PiernasV-Photoroom.png', '36.00', NULL, NULL, 1, 10.00),
(35, '35_Sazonador_Vegetal', 'Sazonador Vegetal', 'Brinda un sabor natural a los alimentos complementado con vitaminas, minerales y fotoquímicos. ¡Disfruta del beneficio de los hongos!', 'NutriCion/SazonadorVegetal-Photoroom.png', '229.00', NULL, NULL, 3, 10.00),
(36, '36_Semillas_de_Cardo_Mariano', 'Semillas de Cardo Mariano', 'Protector hepático, regenerador y antioxidante. Ideal para personas con problemas hepáticos, hígado graso y personas que tomen muchos medicamentos.', 'NutriCion/SemillasCardoMariano-Photoroom.png', '239.00', NULL, NULL, 3, 10.00),
(37, '37_Shampoo_en_Barra', 'Shampoo en barra', 'Shampoo en barra ideal para una limpieza profunda, con extracto de chile y densinaria.', 'NutriCosmeti/ShampooBarra-Photoroom.png', '254.00', NULL, NULL, 3, 10.00),
(38, '38_SHOT_Invernal', 'SHOT Invernal', 'Ayuda a prevenir o tratar resfriados al igual que crisis por alergia o asma.', 'NutriCion/ShotInvernal-Photoroom.png', '167.00', NULL, NULL, 3, 10.00),
(39, '39_Spray_de_Eucalipto_y_Romero', 'Spray de Eucalipto y Romero', 'Contiene propiedades expectorantes que ayudan a tratar la congestión nasal y padecimientos respiratorios. Ideal para personas que les guste el aroma en oficina/habitación.', 'Herba/SprayEucaliptoRomero-Photoroom.png', '231.00', NULL, NULL, 2, 10.00),
(40, '40_Tonico_Herbal', 'Tónico Herbal', 'Auxiliar en casos de dolores musculares o articulares, desinflama picaduras de mosquitos, y funciona como repelente. Con una pequeña gota en el oído desinflama o alivia infecciones. Ideal para desinfectar heridas, o reacciones alérgicas de la piel, sarpullido, moretones, magulladuras. Para limpiar el rostro con un algodón en casos de acné. Úsalo también en casos de problemas respiratorios.', 'Herba/TonicoHerbal-Photoroom.png', '289.00', NULL, NULL, 2, 10.00),
(51, '021_rimel', 'Mascara de volumen', 'La sábila mantiene a la fibra capilar suave y humectada, mientras que la jojoba y el germen de trigo la fortalecen y contribuyen a su crecimiento, para lograr unas pestañas cada vez más resistentes y voluminosas con cada uso.\r\n\r\nPreguntas Frecuentes.\r\n¿Cómo usar este producto?\r\nAplicar en las pestañas y distribuir con el cepillo hasta alcanzar el volumen deseado.\r\n¿Cuáles son las precauciones?\r\nSolo para uso externo. No se deje al alcance de los niños. En caso de irritación suspenda su uso y consulte a su médico.\r\n¿Cuales son sus ingredientes?\r\nAloe vera, germen de trigo y jojoba.', 'NutriCosmeti/Captura de pantalla 2025-08-29 201903.png', '179.00', NULL, NULL, 1, 5.00),
(52, '023_sueroac', 'Suero facial ácido glicólico', 'El ácido glicólico es un excelente exfoliante, ayuda a remover las células muertas del rostro para lograr una apariencia luminosa, uniforme y tersa.\r\n\r\nPreguntas Frecuentes.\r\n¿Cómo usar este producto?\r\nCon el rostro limpio, aplica una gota en cada extremo de tu rostro y distribuye el producto suavemente hasta cubrirlo por completo. Aplícalo diariamente en la mañana y en la noche.\r\n¿Cuáles son las precauciones?\r\nSolo par uso extremo. No usar si se tiene sensibilidad a algún componente de la fórmula. Manténgase fuera del alcance de los niños. En caso de irritación o enrojecimiento suspenda su uso y consulte a su médico.\r\n¿Cuales son sus ingredientes?\r\nSuero ácido glicólico', 'NutriCosmeti/Captura_de_pantalla_2025-08-29_202337-removebg-preview.png', '344.00', NULL, NULL, 1, 20.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_vendidos`
--

CREATE TABLE `productos_vendidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_producto` bigint(20) UNSIGNED NOT NULL,
  `cantidad` bigint(20) UNSIGNED NOT NULL,
  `id_venta` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos_vendidos`
--

INSERT INTO `productos_vendidos` (`id`, `id_producto`, `cantidad`, `id_venta`) VALUES
(1, 10, 1, 1),
(2, 12, 1, 1),
(3, 6, 1, 2),
(4, 13, 1, 2),
(5, 5, 1, 3),
(6, 8, 1, 3),
(7, 9, 1, 4),
(8, 3, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `correo` varchar(500) DEFAULT NULL,
  `contraseña` varchar(100) DEFAULT NULL,
  `domicilio` varchar(100) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `permiso` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contraseña`, `domicilio`, `telefono`, `permiso`) VALUES
(2, 'Felipe', 'Ortiz Lopez', 'felipe44@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'UNIDAD LINDAVISTA VALLEJO 58 A 301, LIDAVISTA', '5598784152', 2),
(3, 'Nayeli', 'Davila Almaraz', 'nayews1998@gmail.com', '25f9e794323b453885f5181f1b624d0b', 'Av ahuizotla 65 edomex', '5566993025', 3),
(4, 'Maria', 'Quiroz Juarez', 'mari12@gmail.com', '25d55ad283aa400af464c76d713c07ad', 'Tultitlan Estado de México', '5541210014', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(7,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `fecha`, `total`) VALUES
(3, '2025-08-30 02:07:26', 348.00),
(4, '2025-09-06 05:48:56', 1197.00);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito_guardado`
--
ALTER TABLE `carrito_guardado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `product_id` (`producto_id`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_id` (`productos_id`),
  ADD KEY `inventario_id` (`inventario_id`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `fk_pedido_ventas` (`ventas_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito_guardado`
--
ALTER TABLE `carrito_guardado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `paquete`
--
ALTER TABLE `paquete`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `productos_vendidos`
--
ALTER TABLE `productos_vendidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `pedido_id` FOREIGN KEY (`pedido_id`) REFERENCES `pedido` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `paquete`
--
ALTER TABLE `paquete`
  ADD CONSTRAINT `inventario_id` FOREIGN KEY (`inventario_id`) REFERENCES `inventario` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_id` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_pedido_ventas` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `categoria_id` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
