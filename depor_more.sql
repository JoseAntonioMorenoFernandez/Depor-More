-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-05-2024 a las 23:09:29
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `depor_more`
--
CREATE DATABASE IF NOT EXISTS `depor_more` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `depor_more`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id_art` int(11) NOT NULL,
  `ean` varchar(13) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `subcategoria` varchar(30) NOT NULL,
  `precio` float NOT NULL,
  `imagen1` varchar(200) NOT NULL,
  `imagen2` varchar(200) NOT NULL,
  `descuento` float NOT NULL,
  `talla_hom_zap` enum('40','41','42','43','44','45','46') NOT NULL,
  `talla_muj_zap` enum('37','38','39','40','41','42','43') NOT NULL,
  `talla_nin_zap` enum('33','34','35','36','37','38','39') NOT NULL,
  `talla_hom_rop` enum('S','M','L','XL','XXL') NOT NULL,
  `talla_muj_rop` enum('S','M','L','XL','XXL') NOT NULL,
  `talla_nin_rop` enum('XXS','XS','S','M','L') NOT NULL,
  `activo` enum('S','N') NOT NULL DEFAULT 'S',
  `cod_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id_art`, `ean`, `nombre`, `descripcion`, `categoria`, `subcategoria`, `precio`, `imagen1`, `imagen2`, `descuento`, `talla_hom_zap`, `talla_muj_zap`, `talla_nin_zap`, `talla_hom_rop`, `talla_muj_rop`, `talla_nin_rop`, `activo`, `cod_categoria`) VALUES
(1, '8308876873095', 'Adidas Vl Court 3.01', 'Caminando con actitud\r\nExperimenta la mejor fusión de estilo audaz y comodidad excepcional con las zapatillas VL Court 3.0 de adidas para hombre. El cierre de cordones ofrece un ajuste personalizado, ', 'Mujer', 'Calzado', 69, '../imagenes/articulos/adidas-vl-court-3-1.webp', '../imagenes/articulos/adidas-vl-court-3-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(2, '8447746877668', 'Adidas Supernova Stride', 'Conquista cada sendero\r\nConquista los senderos más desafiantes con las zapatillas de senderismo adidas Terrex Trailmaker 2.0 , un híbrido audaz entre una zapatilla de running y una de montaña. Su part', 'Hombre', 'Calzado', 79, '../imagenes/articulos/adidas-trailmaker-1.webp', '../imagenes/articulos/adidas-trailmaker-2.webp', 15, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(3, '8045163885297', 'Nike Air Max Ltd 3', 'El poder del estilo\r\nDescubre las Nike Air Max Ltd 3, unas zapatillas de hombre diseñadas para brindarte la máxima comodidad y un estilo inigualable. Su diseño moderno y funcional te permitirá disfrut', 'Hombre', 'Calzado', 129, '../imagenes/articulos/nike-air-max-ltd-3_1.webp', '../imagenes/articulos/nike-air-max-ltd-3_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(4, '8917826793522', 'Nike Air Max Invigor', 'Look legendario\r\nDescubre las Nike Air Max Invigor, las zapatillas de hombre que combinan diseño y confort. Su innovadora tecnología Air Max proporciona una amortiguación excepcional, mientras que su ', 'Hombre', 'Calzado', 109, '../imagenes/articulos/nike-air-max-invigor_1.jpg', '../imagenes/articulos/nike-air-max-invigor_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(5, '8591431884447', 'ASICS Gel Pulse 14', 'Diseño especial\r\nLas zapatillas Asics Gel Pulse 14 crean la comodidad que necesitas para que te concentres en tu entrenamiento. Tanto para correr como para ir al gimnasio, estas zapatillas ofrecen una', 'Hombre', 'Calzado', 109, '../imagenes/articulos/asics-gel-pulse-14_1.jpg', '../imagenes/articulos/asics-gel-pulse-14_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(6, '8944704130617', 'ASICS Gel-kayano 30', 'Sensación de ligereza\r\nDescubre las Asics Gel Kayano 30, unas zapatillas de running que te ofrecerán el máximo confort y rendimiento en tus carreras. Cuentan con la tecnología 4D GUIDANCE SYSTEM: un s', 'Hombre', 'Calzado', 174, '../imagenes/articulos/asics-gel-kayano-30_1.webp', '../imagenes/articulos/asics-gel-kayano-30_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(7, '8832679186759', 'Reebok Glide', 'Estilo sin esfuerzo\r\nExperimenta la comodidad y el estilo con las Reebok Glide. Diseñadas especialmente para hombres activos, estas zapatillas ofrecen una pisada suave y un ajuste seguro. Su diseño li', 'Hombre', 'Calzado', 49, '../imagenes/articulos/reebok-glide_1.webp', '../imagenes/articulos/reebok-glide_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(8, '8344887461295', 'Reebok Ultra Flash', 'Funcionalidad en cada zancada\r\nExperimenta la comodidad y el rendimiento con las Reebok Ultra Flash. Diseñadas para los hombres que buscan superar sus límites, estas zapatillas de hombre ofrecen una a', 'Hombre', 'Calzado', 69, '../imagenes/articulos/reebok-ultra-flash_1.webp', '../imagenes/articulos/reebok-ultra-flash_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(9, '8045448685262', 'Camiseta Volcom V Entertainment', '¿qué pasa, mi gente? Aquí os traigo la camiseta volcom v entertainment poems en color blanco, ¡es una joya! Es de manga corta con cuello redondo y tiene un corte clásico que queda bien en cualquier cu', 'Hombre', 'Ropa', 39, '../imagenes/articulos/camiseta-volcom-v-entertainment_1.jpg', '../imagenes/articulos/camiseta-volcom-v-entertainment_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(10, '8620108842840', 'Camiseta Boriken', 'Comodidad diaria\r\n¡Luce moderno con la Camiseta Boriken para Hombre! Esta camiseta de tejido ligero es perfecta para los días de calor, con un corte estándar que te ofrece una gran comodidad. Combínal', 'Hombre', 'Ropa', 19, '../imagenes/articulos/t-shirt-boriken_1.webp', '../imagenes/articulos/t-shirt-boriken_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(11, '8264120050136', 'Jack & Jones Jpstzeus', 'Jack & Jones Jpstzeus\r\nPantalón Trekking Hombre de Jack & Jones, fabricado con tejido ligero y diseño corto para ofrecerte una mayor comodidad en tus actividades deportivas. Una prenda moderna y cómod', 'Hombre', 'Ropa', 49, '../imagenes/articulos/jack-and-jones-jpstzeus_1.webp', '../imagenes/articulos/jack-and-jones-jpstzeus_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(12, '8060521548970', 'Geographical Norway Fitakol', 'Una declaración de estilo y comodidad\r\nDiseñada por Geographical Norway, una marca conocida por su calidad y estilo excepcionales, la sudadera Fitakol combina un diseño moderno a la par que deportivo,', 'Hombre', 'Ropa', 59, '../imagenes/articulos/geographical-norway-fitakol_1.webp', '../imagenes/articulos/geographical-norway-fitakol_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(13, '8894570294415', 'Bjorn Borg Big Logo', 'Elegante y funcional\r\nBjorn Borg Big Logo es una sudadera deportiva para hombre con un ajuste cómodo y un tejido afelpado. Esta sudadera es ideal para practicar deportes en climas fríos y para lucir u', 'Hombre', 'Ropa', 35, '../imagenes/articulos/bjorn-borg-big-logo_1.webp', '../imagenes/articulos/bjorn-borg-big-logo_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(14, '8759975311133', 'Nike Dri Fit Academy', 'Con bolsillos\r\nApuesta por un look deportivo para el día a día. Descubre el nuevo chándal de Nike Dri-FIT Academy. La tecnología Dri-FIT capilariza el sudor de la piel para mantener la transpirabilida', 'Hombre', 'Ropa', 129, '../imagenes/articulos/nike-dri-fit-academy_1.webp', '../imagenes/articulos/nike-dri-fit-academy_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(15, '8518359738276', 'Chándal Puma', 'Black&White\r\n¡El chándal que nunca pasa de moda! Renueva tu vestuario deportivo con el chándal Puma. Diseño de dos piezas con pantalón largo y sudadera con cremallera completa.', 'Hombre', 'Ropa', 79, '../imagenes/articulos/ch-ndal-puma_1.webp', '../imagenes/articulos/ch-ndal-puma_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(16, '8326822317141', 'Fila Basic', 'Siempre adelante\r\nEste cortaviento para hombre es una prenda perfecta para los días de viento. Está fabricado con tejido resistente al viento, para que puedas disfrutar de la comodidad y elasticidad q', 'Hombre', 'Ropa', 29, '../imagenes/articulos/fila-basic_1.webp', '../imagenes/articulos/fila-basic_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(17, '8499805638711', 'Puma Lightweight', 'Resistencia a la intemperie\r\nEl cortavientos Puma es la prenda perfecta para los entrenamientos de running. Está fabricado con tejido resistente al viento y ofrece comodidad y elasticidad. Esta chaque', 'Hombre', 'Ropa', 35, '../imagenes/articulos/puma-lightweight_1.webp', '../imagenes/articulos/puma-lightweight_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(18, '8839854034273', 'Nike Duff 60l', 'Varios compartimentos\r\nGuarda toda la ropa de tu entrenamiento en la amplia bolsa de deporte Nike Brasilia 9.5. Gracias a sus distintos compartimentos podrás guardar de forma organizada. En el compart', 'Hombre', 'Complementos', 69, '../imagenes/articulos/nike-duff_1.webp', '../imagenes/articulos/nike-duff_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(19, '8133411537349', 'Puma Fundamental', 'Práctica y elegante\r\n¿Día de oficina? Mejóralo con esta elegante mochila Puma Buzz en color negro. Diseño original y perfecto para organizar tus pertenencias. Cuenta con un compartimento principal y d', 'Hombre', 'Complementos', 39, '../imagenes/articulos/puma-fundamental_1.webp', '../imagenes/articulos/puma-fundamental_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(20, '8561968976474', 'Gorra Jordan', 'Gorra Unisex Jordan\r\nEsta gorra unisex de Jordan es perfecta para aquellos que buscan un look moderno y deportivo. Está fabricada con material transpirable para mantener tu cabeza fresca y cómoda dura', 'Hombre', 'Complementos', 29, '../imagenes/articulos/nike-jordan-1.jpg', '../imagenes/articulos/nike-jordan-clc99-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(21, '8806777497256', 'Silver Patch', 'Look deportivo\r\nAñade a tu look esta gorra de Silver Patch y marca estilo vayas donde vayas. Presenta cierre ajustable para mayor comodidad.', 'Hombre', 'Complementos', 19, '../imagenes/articulos/silver-patch_1.webp', '../imagenes/articulos/silver-patch_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(22, '8556926851689', 'Sinner Bretton', 'Ref: 0350304\r\nColor: Negro', 'Hombre', 'Complementos', 39, '../imagenes/articulos/sinner-bretton_1.webp', '../imagenes/articulos/sinner-bretton_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(23, '8822019300636', 'Sinner Capitan', 'Ref: 0350309\r\nColor: Negro', 'Hombre', 'Complementos', 29, '../imagenes/articulos/sinner-capitan_1.webp', '../imagenes/articulos/sinner-capitan_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(24, '8968176598510', 'Converse Belmont', 'Zapatilla sencilla y elegante\r\nDescubre las Converse Belmont, unas zapatillas de lona de hombre que combinan diseño y funcionalidad. Su estructura ligera y flexible te permitirá moverte con total libe', 'Hombre', 'Calzado', 55, '../imagenes/articulos/converse-belmont_1.webp', '../imagenes/articulos/converse-belmont_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(25, '8108101093289', 'New Balance Garoe', 'Zapatillas Trail Hombre\r\nRef: 0373672\r\nColor: Azul', 'Hombre', 'Calzado', 89, '../imagenes/articulos/new-balance-garoe_1.webp', '../imagenes/articulos/new-balance-garoe_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(26, '8850628178039', 'Adidas Vl Court 3.0', 'Tu toque casual diario\r\nSumérgete en el estilo desenfadado con las zapatillas VL Court 3.0 de adidas para mujer, ideales para looks informales. El cierre de cordones ofrece un ajuste personalizado, mi', 'Mujer', 'Calzado', 79, '../imagenes/articulos/adidas-vl-court-3-1.webp', '../imagenes/articulos/adidas-vl-court-3-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(27, '8410181776464', 'Adidas Vl Court 3.0', 'Zapatillas Skate Mujer\r\nRef: 0381717\r\nColor: Blanco', 'Mujer', 'Calzado', 69, '../imagenes/articulos/adidas-vl-court-3-0_01.webp', '../imagenes/articulos/adidas-vl-court-3-0_02.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(28, '8236200469367', 'Adidas Ultraboost Light', 'Zapatillas Running Mujer\r\nRef: 0387689\r\nColor: Blanco', 'Mujer', 'Calzado', 199, '../imagenes/articulos/adidas-ultraboost-light_1.webp', '../imagenes/articulos/adidas-ultraboost-light_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(29, '8387133790723', 'Nike Initiator', 'Estilo Retro\r\nDescubre las Nike Initiator, unas zapatillas vintage de mujer que combinan diseño y funcionalidad. Su ajuste cómodo y su suela reforzada de goma las hacen ideales para el día a día. Adem', 'Mujer', 'Calzado', 79, '../imagenes/articulos/nike-initiator_1.webp', '../imagenes/articulos/nike-initiator_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(30, '8905815083568', 'Nike Revolution 7', 'Cada zancada es una victoria\r\nDescubre la libertad de movimiento con las Nike Revolution 7, diseñadas específicamente como zapatillas de running para mujer. Su diseño ligero y transpirable, junto a su', 'Mujer', 'Calzado', 79, '../imagenes/articulos/nike-revolution-1.webp', '../imagenes/articulos/nike-revolution-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(31, '8065992130072', 'ASICS Trabuco Terra 2', 'Zapatillas Trail Mujer\r\nRef: 0374144\r\nColor: Rosa', 'Mujer', 'Calzado', 109, '../imagenes/articulos/asics-trabuco-terra-2_1.webp', '../imagenes/articulos/asics-trabuco-terra-2_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(32, '8470450073654', 'ASICS Dedicate', 'Zapatillas Tenis Mujer\r\nRef: 0374191\r\nColor: Blanco', 'Mujer', 'Calzado', 69, '../imagenes/articulos/asics-dedicate_1.webp', '../imagenes/articulos/asics-dedicate_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(33, '8181320076397', 'ASICS Gel Trabuco 11', 'Zancadas con estilo\r\nLas zapatillas de correr Asics Gel Trabuco 11, para mujer, son una excelente opción para las corredoras que buscan un calzado cómodo, ligero e impermeable Gore-Tex. Cuentan con un', 'Mujer', 'Calzado', 119, '../imagenes/articulos/asics-gel-trabuco-1_1.jpg', '../imagenes/articulos/asics-gel-trabuco-1_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(34, '8582779498425', 'ASICS Gel-pulse 15', 'Déjate llevar por tus pies\r\nExperimenta la comodidad y el rendimiento con las ASICS Gel-Pulse 15. Estas zapatillas de running para mujer están diseñadas para proporcionarte una amortiguación superior ', 'Mujer', 'Calzado', 119, '../imagenes/articulos/asics-gel-pulse-15_1.jpg', '../imagenes/articulos/asics-gel-pulse-15_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(35, '8789765002934', 'Skechers Summits At', 'Zapatillas Trekking Mujer\r\nRef: 0376428\r\nColor: Morado', 'Mujer', 'Calzado', 75, '../imagenes/articulos/skechers-summits-at_1.jpg', '../imagenes/articulos/skechers-summits-at_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(36, '8727583723153', 'Skechers Uno', 'Zapatillas Mujer\r\nRef: 0376154\r\nColor: Blanco', 'Mujer', 'Calzado', 99, '../imagenes/articulos/skechers-uno_1.webp', '../imagenes/articulos/skechers-uno_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(37, '8275615255991', 'New Balance Wl373', 'Zapatillas Mujer\r\nRef: 0373586\r\nColor: Marrón', 'Mujer', 'Calzado', 89, '../imagenes/articulos/new-balance-wl373_1.webp', '../imagenes/articulos/new-balance-wl373_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(38, '8462584640643', 'New Balance 373', 'Zapatillas Mujer\r\nRef: 0373616\r\nColor: Gris', 'Mujer', 'Calzado', 109, '../imagenes/articulos/new-balance-373_1.jpg', '../imagenes/articulos/new-balance-373_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(39, '8465874342087', 'Converse Flower Star', 'Camiseta Mujer\r\nRef: 0376867\r\nColor: Negro', 'Mujer', 'Ropa', 39, '../imagenes/articulos/converse-flower-star_1.webp', '../imagenes/articulos/converse-flower-star_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(40, '8514009776162', 'Puma Her', 'Camiseta Mujer\r\nRef: 0375036\r\nColor: Azul', 'Mujer', 'Ropa', 29, '../imagenes/articulos/puma-her_1.webp', '../imagenes/articulos/puma-her_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(41, '8284920934474', 'Camiseta Puma', 'Camiseta Mujer\r\nRef: 0375075\r\nColor: Naranja', 'Niño', 'Ropa', 35, '../imagenes/articulos/camiseta-puma_1.webp', '../imagenes/articulos/camiseta-puma_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(42, '8842242578959', 'Camiseta Nike', 'Corte crop\r\nLa camiseta Nike para mujer con diseño boxy y corte crop es la combinación perfecta de confort y estilo. Su corte holgado y tejido transpirable la convierten en la elección ideal para cual', 'Mujer', 'Ropa', 49, '../imagenes/articulos/camiseta-nike_1.webp', '../imagenes/articulos/camiseta-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(43, '8410082047929', 'Pantalón Up', 'Estilo y confort\r\nEl pantalón Up es una prenda versátil y moderna. Este pantalón Pirata para mujer es ideal para cualquier actividad deportiva, proporcionando comodidad y libertad de movimiento.', 'Mujer', 'Ropa', 47, '../imagenes/articulos/basics-sra-pantalon-pirata-felpa-s-p_1.webp', '../imagenes/articulos/basics-sra-pantalon-pirata-felpa-s-p_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(44, '8911925738315', 'adidas 3s', 'Para mujeres activas\r\nDiseñado para mujeres activas con un estilo de vida ajetreado, este pantalón corto adidas aportará el toque deportivo que quieres para tus outfits. Presenta las emblemáticas 3 ba', 'Mujer', 'Ropa', 35, '../imagenes/articulos/adidas-3s_1.webp', '../imagenes/articulos/adidas-3s_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(45, '8776554502298', 'Pantalón Nike', 'Short Mujer\r\nRef: 0381306\r\nColor: Morado', 'Mujer', 'Ropa', 49, '../imagenes/articulos/calcoes-nike_1.webp', '../imagenes/articulos/calcoes-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(46, '8109803187625', 'Puma Classic', 'Puma Classic\r\nChándal Mujer de Puma con un tejido suave y cintura elástica para un ajuste cómodo. Una prenda deportiva perfecta para tus entrenamientos.', 'Mujer', 'Ropa', 79, '../imagenes/articulos/puma-classic_1.webp', '../imagenes/articulos/puma-classic_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(47, '8361455406187', 'Puma Classic', 'Puma Classic\r\nChándal Mujer de Puma con un tejido suave y cintura elástica para un ajuste cómodo. Una prenda deportiva perfecta para tus entrenamientos.', 'Mujer', 'Ropa', 89, '../imagenes/articulos/puma-classic_1.webp', '../imagenes/articulos/puma-classic_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(48, '8026932796874', 'Chándal Up', 'Chándal Up\r\nChándal Mujer con tejido suave y cintura elástica para un ajuste perfecto. Esta prenda deportiva es ideal para realizar actividades físicas y mantenerte cómoda durante todo el día.', 'Mujer', 'Ropa', 69, '../imagenes/articulos/fato-de-treino-up_1.webp', '../imagenes/articulos/fato-de-treino-up_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(49, '8347448409558', 'Chaqueta Montaña Boriken', 'Diseño estructurado\r\nChaqueta para mujer de Boriken con diseño acolchado en color negro. Confeccionada en un tejido ligero y resistente, cuenta con tecnología Tech Wind que mantiene el confort térmico', 'Mujer', 'Ropa', 119, '../imagenes/articulos/anorak-boriken-c-capuz_1.webp', '../imagenes/articulos/anorak-boriken-c-capuz_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(50, '8561632875466', 'Glen Reebok Blsa Dpte M', 'Bolsa deporte mujer\r\nRef: 0387347\r\nColor: Rosa', 'Mujer', 'Complementos', 59, '../imagenes/articulos/reebok-glen_1.webp', '../imagenes/articulos/reebok-glen_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(51, '8745286707347', 'Nike Gym Club', 'Bolsa Deporte Pequeña\r\nRef: 0375234\r\nColor: Azul', 'Mujer', 'Complementos', 65, '../imagenes/articulos/nike-gym-club_1.webp', '../imagenes/articulos/nike-gym-club_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(52, '8404326311334', 'Gorra De Algodón Bordado Victoria', 'Gorra de algodón con tira trasera regulable. Bordado y etiqueta personalizada en la parte posterior.', 'Mujer', 'Complementos', 25, '../imagenes/articulos/bone-de-algodao-bordado-victoria-things-1.jpg', '../imagenes/articulos/bone-de-algodao-bordado-victoria-things-com-fita-traseira-ajustavel_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(53, '8150443719245', 'New Era Ny Yankees', 'Gorra\r\nRef: 0378172\r\nColor: Morado', 'Mujer', 'Complementos', 25, '../imagenes/articulos/new-era-ny-yankees_1.webp', '../imagenes/articulos/new-era-ny-yankees_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(54, '8224346712158', 'Gafas Silver', 'Día soleado\r\nEstas gafas de sol Silver son el complemento estrella para tus looks diarios. Diseño resistente perfecto para los días soleados de desconexión.', 'Mujer', 'Complementos', 35, '../imagenes/articulos/gafas-silver_1.webp', '../imagenes/articulos/gafas-silver_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(55, '8301264026735', 'Sinner Amos', 'Gafas de Moda\r\nRef: 0350321\r\nColor: Gris', 'Mujer', 'Complementos', 79, '../imagenes/articulos/sinner-amos_1.webp', '../imagenes/articulos/sinner-amos_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(56, '8215328553562', 'Adidas Predator Club', 'Botas para los pequeños artistas del balón\r\nLas botas Predator 24 Club para niños son la elección perfecta para los pequeños amantes del fútbol sala que sueñan con dejar su huella en la pista. Con un ', 'Niño', 'Calzado', 59, '../imagenes/articulos/adidas-predator-club_1.webp', '../imagenes/articulos/adidas-predator-club_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(57, '8071734916906', 'ASICS Gel-noosa Tri 15 Gs', 'Zapatillas Running Niño\r\nRef: 0374121\r\nColor: Rojo', 'Niño', 'Calzado', 75, '../imagenes/articulos/asics-gel-noosa-tri-15-gs_1.webp', '../imagenes/articulos/asics-gel-noosa-tri-15-gs_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(58, '8427032600358', 'Joma Master 1000', 'Zapatillas Tenis Niño\r\nRef: 0377396\r\nColor: Azul', 'Niño', 'Calzado', 39, '../imagenes/articulos/joma-master-1.webp', '../imagenes/articulos/joma-master-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(59, '8257019259070', 'Jordan Max Aura 5', 'Alcanza nuevas alturas\r\nLas Jordan Max Aura 5 son las botas de baloncesto para niños que combinan diseño y funcionalidad. Su caña alta proporciona un ajuste cómodo y seguro, mientras que la suela de t', 'Niño', 'Calzado', 89, '../imagenes/articulos/nike-jordan-max-aura-1.webp', '../imagenes/articulos/nike-jordan-max-aura-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(60, '8827256679757', 'Puma Attacanto', 'Botas Fútbol Turf Niños\r\nRef: 0373554\r\nColor: Amarillo', 'Niño', 'Calzado', 45, '../imagenes/articulos/attacanto-kid-bta-1.jpg', '../imagenes/articulos/attacanto-kid-bta-trf-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(61, '8079583621496', 'Reebok Rush 5', 'Velocidad y Comodidad Infantil\r\nLas Reebok Rush 5 son las Zapatillas Running Niña ideales para las pequeñas atletas. Diseñadas para brindar velocidad y comodidad, estas zapatillas cuentan con una suel', 'Niño', 'Calzado', 49, '../imagenes/articulos/reebok-rush-5_1.webp', '../imagenes/articulos/reebok-rush-5_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(62, '8812270159071', 'ASICS Contend 8 Gs', 'Zapatillas Running Niña\r\nRef: 0374118\r\nColor: Rojo', 'Niño', 'Calzado', 59, '../imagenes/articulos/asics-contend-8-gs_1.webp', '../imagenes/articulos/asics-contend-8-gs_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(63, '8248129488145', 'Nike Star Runner 4', 'Zapatillas Running Niña\r\nRef: 0375592\r\nColor: Negro', 'Niño', 'Calzado', 45, '../imagenes/articulos/nike-star-runner-1.webp', '../imagenes/articulos/nike-star-runner-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(64, '8828932996635', 'Fila Ray Tracer', 'Estilo Chunky\r\nLas Fila Ray Tracer son unas zapatillas de niña que ofrecen un diseño moderno y atractivo, además de comodidad y durabilidad gracias a sus materiales de alta calidad, que las convierten', 'Niño', 'Calzado', 69, '../imagenes/articulos/fila-ray-tracer_1.webp', '../imagenes/articulos/fila-ray-tracer_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(65, '8613326223336', 'Skechers Microspec Plus', 'Zapatillas Velcro Niña\r\nRef: 0376971\r\nColor: Azul', 'Niño', 'Calzado', 39, '../imagenes/articulos/skechers-microspec-plus-1.jpg', '../imagenes/articulos/skechers-microspec-plus-disco_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(66, '8451843617126', 'Nike Futura', 'Camiseta Nike Futura Niño\r\nEsta camiseta Nike Futura para niño es ideal para los entrenamientos deportivos. Está fabricada con un tejido ligero y un corte estándar que le aporta comodidad y libertad d', 'Niño', 'Ropa', 19, '../imagenes/articulos/t-shirt-nike-futura_1.webp', '../imagenes/articulos/t-shirt-nike-futura_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(67, '8307774885205', 'Puma Ess', 'Puma Ess\r\nEsta camiseta Niño de Puma Ess es una prenda ideal para los entrenamientos. Está confeccionada con un tejido ligero y un corte estándar para que te sientas cómodo. ¡No te pierdas esta camise', 'Niño', 'Ropa', 22, '../imagenes/articulos/puma-ess_1.webp', '../imagenes/articulos/puma-ess_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(68, '8837603498604', 'Nike Academy 23', 'Nike Academy 23\r\n¡La camiseta Nike Academy 23 es perfecta para los fanáticos del fútbol! Esta camiseta de manga corta para niños está confeccionada con un tejido ligero para que los más pequeños se si', 'Niño', 'Ropa', 19, '../imagenes/articulos/nike-academy-1.webp', '../imagenes/articulos/nike-academy-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(69, '8134359632345', 'Camiseta Nike', 'Camiseta Nike\r\nLa camiseta Nike para niña es una prenda deportiva creada para ofrecer comodidad y estilo. Está fabricada con un tejido suave y ligero para que se sienta cómoda durante todo el día. La ', 'Niño', 'Ropa', 29, '../imagenes/articulos/t-shirt-nike_1.webp', '../imagenes/articulos/t-shirt-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(70, '8774746420785', 'Camiseta Puma', 'Camiseta Puma\r\nEsta camiseta de Puma para niña es perfecta para cualquier ocasión. Está hecha de un tejido ligero y su corte estándar le da un ajuste cómodo. Combínala con tus prendas favoritas para c', 'Niño', 'Ropa', 15, '../imagenes/articulos/camiseta-puma_1.webp', '../imagenes/articulos/camiseta-puma_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(71, '8968242783913', 'Nike Futura', 'Camiseta Nike Futura\r\n¡Luce moderna con esta camiseta Nike Futura para niña! Esta camiseta de corte estándar está confeccionada en un tejido ligero para que te sientas cómoda. Combínala con tus prenda', 'Niño', 'Ropa', 29, '../imagenes/articulos/nike-futura_1.webp', '../imagenes/articulos/nike-futura_3.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(72, '8461456122414', 'Pantalón Nike', 'Corto y cómodo\r\nEl nuevo pantalón corto de Nike es la prenda perfecta para los días más deportivos. Confeccionado con un tejido suave que proporciona comodidad durante todo el día.', 'Niño', 'Ropa', 25, '../imagenes/articulos/cal-es-nike_1.webp', '../imagenes/articulos/cal-es-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(73, '8391291783925', 'Puma Teamrise', 'Entrenamientos\r\nEl pantalón de fútbol Puma teamRISE para chico es perfecto para salir al campo de fútbol cómodamente. Su tecnología dryCELL absorbe el sudor proporcionando una buena transpirabilidad y', 'Niño', 'Ropa', 22, '../imagenes/articulos/calcoes-puma-team-1.webp', '../imagenes/articulos/calcoes-puma-team-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(74, '8260648768899', 'Nike Strike', 'Rendimiento de élite\r\nEl pantalón Nike Strike es la prenda imprescindible para los entrenamientos de fútbol. Está fabricado en tejido suave y con una cintura elástica para un ajuste cómodo. Está dispo', 'Niño', 'Ropa', 39, '../imagenes/articulos/nike-strike_1.webp', '../imagenes/articulos/nike-strike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(75, '8061893588699', 'adidas Tiro 23', 'Entra en calor rápidamente\r\nEntrena como un profesional sin preocuparte por el frío. Este pantalón adidas querrás ponértelo antes y después de los partidos, para tomar algo con tus amigos al acabar el', 'Niño', 'Ropa', 29, '../imagenes/articulos/adidas-tiro-1.webp', '../imagenes/articulos/adidas-tiro-23_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(76, '8039352074180', 'Pantalón Nike', 'Corto para el cole\r\nEl nuevo pantalón corto de Nike es la prenda perfecta para los días más deportivos. Confeccionado con un tejido suave que proporciona comodidad durante todo el día.', 'Niño', 'Ropa', 29, '../imagenes/articulos/pantaloni-nike_1.webp', '../imagenes/articulos/pantaloni-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(77, '8088719183887', 'Pantalón Jordan', 'Día deportivo\r\nEl nuevo pantalón corto de Nike es la prenda perfecta para los días más deportivos. Confeccionado con un tejido suave que proporciona comodidad durante todo el día.', 'Niño', 'Ropa', 25, '../imagenes/articulos/nike-jordan_1.webp', '../imagenes/articulos/nike-jordan_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(78, '8463850771058', 'Pantalón Nike', 'Pantalón Nike Niña\r\nEste pantalón deportivo largo de Nike es ideal para la niña deportista. Está confeccionado con un tejido suave y una cintura elástica para mayor comodidad. Está diseñado para ofrec', 'Niño', 'Ropa', 35, '../imagenes/articulos/calcas-nike_1.webp', '../imagenes/articulos/calcas-nike_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(79, '8456444751288', 'Pantalón Puma', 'Pantalón Puma\r\nEste pantalón deportivo de Puma para niña es perfecto para entrenar. Está fabricado con un tejido suave y una cintura elástica para una mayor comodidad. Está disponible en varios colore', 'Niño', 'Ropa', 19, '../imagenes/articulos/puma-puma_1.webp', '../imagenes/articulos/puma-puma_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(80, '8027784886357', 'Air Jordan', 'Para el día a día\r\nLa mochila Nike Air Jordan en color negro con el original diseño serigrafiado en la parte frontal es justo lo que necesitas para llevar tus pertenencias siempre contigo. Diseño con ', 'Niño', 'Complementos', 39, '../imagenes/articulos/mochila-com-estojo-nike-jordan_1.webp', '../imagenes/articulos/mochila-com-estojo-nike-jordan_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(81, '8399703176963', 'Nike H86 Metal Swoosh', 'Gorra Nike H86 Metal Swoosh\r\nEsta gorra de Nike para niño es perfecta para los amantes del deporte. Su diseño moderno y su ajuste cómodo harán que te sientas cómodo en todas tus actividades. Está fabr', 'Niño', 'Complementos', 22, '../imagenes/articulos/nike-h86_1.webp', '../imagenes/articulos/nike-h86_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(82, '8430275944464', 'Portatodo Doble De Atlético De Madrid', 'Estuche atlético de madrid doble portatodo del atleti con dos departamentos con cierre de cremallera\r\ncinta para colgar en el extremo producto oficial atlético de madrid fabricado por safta ', 'Niño', 'Complementos', 29, '../imagenes/articulos/estuche-atl-tico-de-madrid-1.jpg', '../imagenes/articulos/estuche-atl-tico-de-madrid-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(83, '8458979359052', 'Vans Old Skool Drop', 'Mochila\r\nRef: 0377630\r\nColor: Verde', 'Niño', 'Complementos', 49, '../imagenes/articulos/vans-old-skool-drop_1.jpg', '../imagenes/articulos/vans-old-skool-drop_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(84, '8988427350732', 'Nike H86 Metal Swoosh', 'Gorra Nike H86 Metal Swoosh\r\nEsta gorra Nike para niños es perfecta para los entrenamientos. Está fabricada en material transpirable para mantenerte fresco y cómodo. El ajuste es perfecto para que se ', 'Niño', 'Complementos', 25, '../imagenes/articulos/nike-h86-metal-1.webp', '../imagenes/articulos/nike-h86-metal-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(85, '8064982254342', 'Estuche Catrinas Elsa Doble', 'Estuche catrinas doble portatodo elsa con dos departamentos con cierre de cremallera \r\ncinta para colgar en el extremo producto oficial catrinas underworld fabricado por safta', 'Niño', 'Complementos', 22, '../imagenes/articulos/estuche-catrinas-elsa-1.webp', '../imagenes/articulos/estuche-catrinas-elsa-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(86, '8876222981126', 'Raqueta De Tenis Yonex Ezone 98', 'Para jugadores de nivel intermedio a avanzado que buscan dominar con poder controlable y comodidad\r\n\r\nCaracterísticas:\r\nTamaño de la cabeza: 98 pulgadas cuadradas\r\nPeso: 305g\r\nTamaño del grip: 1-5\r\nLo', 'Raqueta', 'Tenis', 299, '../imagenes/articulos/raqueta-de-tenis-yonex-1.jpg', '../imagenes/articulos/raqueta-de-tenis-yonex-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(87, '8228021369481', 'Raqueta De Tenis Prince', 'La serie legacy es la opción para jugadores con golpes más cortos y lentos. La combinación de las tecnologías textreme, o3 y ats, da como resultado el punto dulce más grande de la historia. Con una po', 'Raqueta', 'Tenis', 259, '../imagenes/articulos/raqueta-de-tenis-prince-txt2-5-o3-legacy-110-270-g-encordada-1.webp', '../imagenes/articulos/raqueta-de-tenis-prince-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(88, '8855351732410', 'Head Speed Mp L', 'Raqueta Tenis\r\nRef: 0382235\r\nColor: Negro', 'Raqueta', 'Tenis', 239, '../imagenes/articulos/head-speed-mp-1.webp', '../imagenes/articulos/head-speed-mp-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(89, '8822583718833', 'Raqueta De Tenis Prince Vortex 100', 'La serie vortex combina efectos y potencia con una sensación y un toque impresionantes. Con un patrón de cordaje único de 14x21, el vortex recompensa los swings completos con una trayectoria predecibl', 'Raqueta', 'Tenis', 219, '../imagenes/articulos/raqueta-de-tenis-prince-vortex-100-310-g-sin-1.webp', '../imagenes/articulos/raqueta-de-tenis-prince-vortex-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(90, '8497367763927', 'Raqueta De Tenis Prince Random 265', 'Esta raqueta prince ha sido diseñada con la colaboración de la marca hydrogen para combinar técnica y estilo. La raqueta prince random 265g está diseñada para el jugador de fondo con un golpe fuerte e', 'Raqueta', 'Tenis', 199, '../imagenes/articulos/raqueta-de-tenis-prince-random-265-g-sin-encordar-y-1.webp', '../imagenes/articulos/raqueta-de-tenis-prince-random-265-g-sin-encordar-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(91, '8686483072964', 'adidas Metalbone Hrd', 'Potencia extrema\r\nLa nueva adidas Metalbone Hrd es una pala de pádel ligera y fácil de manejar: un modelo de alto rendimiento y tacto más duro utilizado por Ale Galán en sus competiciones. Construida ', 'Raqueta', 'Padel', 390, '../imagenes/articulos/adidas-metalbone-hrd_1.webp', '../imagenes/articulos/adidas-metalbone-hrd_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(92, '8401942319016', 'Pala De Pádel Orven Sport Vulcano', 'la pala vulcano v2 es el buque insignia de orven. En este modelo encontraremos el marco de la pala fabricado con kevlar y fibra de vidrio, reforzando los puentes con carbono. Las caras tienen una dobl', 'Raqueta', 'Padel', 390, '../imagenes/articulos/pala-de-p-del-orven-1.webp', '../imagenes/articulos/pala-de-p-del-orven-2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(93, '8568102215129', 'Puma Nova Elite Pwr', 'Para jugadores avanzados\r\nLa pala de pádel Puma Nova Elite PWR está diseñada específicamente para profesionales y jugadores que buscan el máximo rendimiento competiciones o entrenamientos. Presenta un', 'Raqueta', 'Padel', 199, '../imagenes/articulos/nova-elite-pwr-1.webp', '../imagenes/articulos/nova-elite-pwr-pla-padl_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(94, '8782592589929', 'Pala De Pádel Royal Padel Rp M27 Fury', 'Rp m27 rline fury 2023 evolución e incorporación de refuerzos de carbono 3d hexcel twill aeronautical, tanto en la cara, parante y marco de la pala consiguiendo así una mayor durabilidad.', 'Raqueta', 'Padel', 350, '../imagenes/articulos/pala-de-p-del-royal-padel-1.webp', '../imagenes/articulos/pala-de-p-del-royal-padel-rp-m27-fury_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(95, '8012694927911', 'Pala Pádel Vibor-a Black Mamba Liquid', 'Reedición de la número uno en ventas de vibor-a\" black mamba liquid. Una pala de gama alta muy polivalente, con gran tacto y una buena salida de bola.El modelo más vendido de vibor-a, que aporta gran ', 'Raqueta', 'Padel', 299, '../imagenes/articulos/pala-padel-vibor-a-1.jpg', '../imagenes/articulos/pala-padel-vibor-a-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(96, '8891746494748', 'adidas Champions', 'Entrenamiento nivel élite\r\nEntrena como un futbolista de la élite profesional con este balón de entrenamiento adidas de la UEFA Champions League 2023/2024. Este balón cosido a máquina lleva consigo la', 'Balones', 'Futbol', 35, '../imagenes/articulos/adidas-champions_1.jpg', '../imagenes/articulos/adidas-champions_2.jpg', 10, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(97, '8206018234520', 'Puma Liga Española 23/24', '¡A por la victoria!\r\nEl balón de fútbol de La Liga 23/24, cuenta con una cubierta de TPU cosida a máquina y tiene un tacto más suave. Además, incorpora una cámara de caucho que retiene el aire de mane', 'Balones', 'Futbol', 25, '../imagenes/articulos/liga-espanola-1.jpg', '../imagenes/articulos/liga-espanola-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(98, '8281846328411', 'Nike Academy', 'Balón Fútbol\r\nRef: 0375821\r\nColor: Blanco\r\n', 'Balones', 'Futbol', 22, '../imagenes/articulos/nike-academy_1.jpg', '../imagenes/articulos/nike-academy_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(99, '8905297577687', 'Balón Liga Española Orbita 23/24', 'Oficial de LaLiga\r\nSi quieres organizar partidos de fútbol digno de las estrellas de LaLiga, necesitarás el icónico balón que utilizan los profesionales. Este balón es una réplica de los que se usa en', 'Balones', 'Futbol', 29, '../imagenes/articulos/bola-liga-espanhola-1.jpg', '../imagenes/articulos/bola-liga-espanhola-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(100, '8532637170604', 'adidas Euro 24 Trn', 'Ideal para entrenar\r\nVive la emoción del fútbol europeo con este balón Euro 24 de adidas, diseñado con la calidad y el estilo que caracterizan a la marcade las 3 bandas. Este balón es el compañero ide', 'Balones', 'Futbol', 32, '../imagenes/articulos/adidas-euro-24_1.jpg', '../imagenes/articulos/adidas-euro-24_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(101, '8947869296471', 'adidas Champions', 'Para partidos de Champions\r\nHaz que cada partido sea una experiencia emocionante con este balón adidas de la UEFA Champions League. Este balón está cosido a máquina y tiene una cubierta de TPU 100% re', 'Balones', 'Futbol', 27, '../imagenes/articulos/adidas-champions_0377509_1.jpg', '../imagenes/articulos/adidas-champions_0377509_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(102, '8939041742549', 'Balón Team Quest España', 'Balón Fútbol\r\nRef: 0382273\r\nColor: Rojo', 'Balones', 'Futbol', 19, '../imagenes/articulos/bola-team-quest_1.webp', '../imagenes/articulos/bola-team-quest_2.webp', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(103, '8119324906444', 'ATLETICO DE MADRID Balón de Fútbol con Escudo 1903', 'Balón de fútbol del equipo del atlético de madrid (atleti). El color principal es el rojo. Su diámetro es de 21 centímetros. Tiene un pequeño detalle estampado sobre la superficie. Se entrega desinfla', 'Balones', 'Futbol', 35, '../imagenes/articulos/61WMRMSuXRL._AC_SX679_1.jpg', '../imagenes/articulos/61jDZ4V-56L._AC_SX679_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(104, '8235495934865', 'Balón De Baloncesto Wilson Nba Drv Plus 7', 'El balón de baloncesto wilson nba drv está fabricado en caucho microcelular de alta calidad que proporciona un excelente rendimiento. La superficie ofrece un gran agarre. Cuenta con válvula de bloqueo', 'Balones', 'Baloncesto', 29, '../imagenes/articulos/bal-n-de-baloncesto-wilson-1.jpg', '../imagenes/articulos/bal-n-de-baloncesto-wilson-1.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(105, '8518566384933', 'Jordan Skills 2.0', 'Balón baloncesto\r\nRef: 0345776\r\nColor: Rojo', 'Balones', 'Baloncesto', 19, '../imagenes/articulos/nike-jordan_1.jpg', '../imagenes/articulos/nike-jordan_2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(107, '8266933478625', 'Balón De Baloncesto Wilson Nba All Teams', 'Los logos de los 30 equipos se pueden encontrar en este balón. Muestre su amor por el juego y los equipos que hacen que cada temporada sea memorable. Esta pelota proporciona agarre incluso en las supe', 'Balones', 'Baloncesto', 33, '../imagenes/articulos/bola-de-basquetebol-wilson-nba-1.jpg', '../imagenes/articulos/bola-de-basquetebol-wilson-nba-2.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(108, '8916667733592', 'Balón De Baloncesto Wilson Nba All Team', 'Los logos de los 30 equipos se pueden encontrar en este balón black mate. Muestre su amor por el juego y los equipos que hacen que cada temporada sea memorable. Esta pelota proporciona agarre incluso ', 'Balones', 'Baloncesto', 49, '../imagenes/articulos/bola-de-basquetebol-wilson-nba-all-1.jpg', '../imagenes/articulos/bola-de-basquetebol-wilson-nba-all-1.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL),
(109, '8365158562478', 'Balón De Baloncesto Wilson Nba Team Alliance - Chi', 'Los verdaderos fanáticos dan a conocer sus colores. El balón de baloncesto compuesto wilson team alliance está disponible para todas las franquicias de la nba. La cubierta pure feel de alto rendimient', 'Balones', 'Baloncesto', 49, '../imagenes/articulos/bola-de-basquetebol-wilson-nba-team-alliance-chicago-bulls.jpg', '../imagenes/articulos/bola-de-basquetebol-wilson-nba-team-alliance-chicago-bulls.jpg', 0, '40', '37', '33', 'S', 'S', 'XXS', 'S', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_cat` int(11) NOT NULL,
  `cod_cat` varchar(5) NOT NULL,
  `nom_cat` varchar(30) NOT NULL,
  `cod_sub` varchar(5) NOT NULL,
  `nom_sub` varchar(30) NOT NULL,
  `activo` enum('S','N') DEFAULT 'S'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_cat`, `cod_cat`, `nom_cat`, `cod_sub`, `nom_sub`, `activo`) VALUES
(79, '01hom', 'Hombre', '01cal', 'Calzado', 'S'),
(80, '02muj', 'Mujer', '01cal', 'Calzado', 'S'),
(81, '01hom', 'Hombre', '02rop', 'Ropa', 'S'),
(82, '02muj', 'Mujer', '02rop', 'Ropa', 'S'),
(83, '03nin', 'Niño', '01cal', 'Calzado', 'S'),
(84, '01hom', 'Hombre', '03com', 'Complementos', 'S'),
(85, '02muj', 'Mujer', '03com', 'Complementos', 'S'),
(86, '03nin', 'Niño', '03com', 'Complementos', 'S'),
(87, '03nin', 'Niño', '02rop', 'Ropa', 'S'),
(88, '04raq', 'Raqueta', '01ten', 'Tenis', 'S'),
(89, '04raq', 'Raqueta', '02pad', 'Padel', 'S'),
(90, '05bal', 'Balones', '01fut', 'Futbol', 'S'),
(91, '05bal', 'Balones', '02bal', 'Baloncesto', 'S'),
(92, '06pru', 'Prueba', '06', 'Pueba', 'S');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineapedido`
--

CREATE TABLE `lineapedido` (
  `id` int(11) NOT NULL,
  `numPedido` int(11) NOT NULL,
  `ean` varchar(13) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `descuento` decimal(5,2) DEFAULT 0.00,
  `talla` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `lineapedido`
--

INSERT INTO `lineapedido` (`id`, `numPedido`, `ean`, `cantidad`, `precio`, `descuento`, `talla`) VALUES
(1, 1, '8968242783913', 1, 29.00, 0.00, 'XXS'),
(2, 2, '8968242783913', 1, 29.00, 0.00, 'XXS'),
(3, 3, '8045448685262', 1, 39.00, 0.00, 'L'),
(4, 3, '8264120050136', 1, 49.00, 0.00, 'L'),
(5, 3, '8447746877668', 1, 79.00, 15.00, '42'),
(6, 4, '8401942319016', 1, 390.00, 0.00, ''),
(7, 4, '8822019300636', 1, 29.00, 0.00, ''),
(8, 4, '8260648768899', 1, 39.00, 0.00, 'XXS'),
(9, 5, '8301264026735', 1, 79.00, 0.00, ''),
(15, 9, '8307774885205', 1, 22.00, 0.00, 'L'),
(16, 9, '8832679186759', 1, 49.00, 0.00, '42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `estado` enum('INCOMPLETO','COMPLETADO') DEFAULT 'INCOMPLETO',
  `dni` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `fecha`, `total`, `estado`, `dni`) VALUES
(1, '2024-05-20 23:52:46', 29.00, 'COMPLETADO', '11111112L'),
(2, '2024-05-20 23:54:13', 29.00, 'COMPLETADO', '11111112L'),
(3, '2024-05-20 23:57:50', 155.15, 'INCOMPLETO', '11111112L'),
(4, '2024-05-21 00:23:27', 458.00, 'INCOMPLETO', '11111113C'),
(5, '2024-05-21 00:24:43', 79.00, 'COMPLETADO', '11111113C'),
(9, '2024-05-21 23:05:23', 71.00, 'INCOMPLETO', '11111114K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(5) NOT NULL,
  `dni` varchar(9) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `localidad` varchar(30) NOT NULL,
  `cpostal` varchar(5) NOT NULL,
  `provincia` varchar(30) NOT NULL,
  `telefono` int(9) NOT NULL,
  `rol` enum('cliente','empleado','administrador') NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(200) NOT NULL,
  `activo` enum('S','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `dni`, `nombre`, `apellidos`, `direccion`, `localidad`, `cpostal`, `provincia`, `telefono`, `rol`, `email`, `password`, `activo`) VALUES
(1, '11111111H', 'Cliente 1', 'Cliente 1', 'C/ Cliente 1 ', 'Petrer', '03610', 'Alicante', 600600600, 'cliente', 'cliente1@gmail.com', '$2y$10$ovK6tUcBCwVZJGUEvm4Jxu69UdoNn8a5HSexhTMSkYSizx6fihDQy', 'S'),
(2, '11111112L', 'Cliente 2', 'Cliente 2', 'C/ Cliente 2', 'Elda', '03600', 'Alicante ', 600200100, 'cliente', 'cliente2@gmail.com', '$2y$10$M4b1rBv90zUqWS1Xshq51uMV0GXPaFBFx1Fy50oa6ZoCOI19b2pne', 'S'),
(3, '11111113C', 'Cliente 3', 'Cliente 3', 'C/ Cliente 3', 'Monforte del Cid', '03670', 'Alicante', 600300300, 'cliente', 'cliente3@gmail.com', '$2y$10$DwidaxcH2TNRUMvxMSygNen8LAd1DH3iWOqSdh/KJ18qx.RHhGKIi', 'S'),
(4, '11111114K', 'Cliente 4', 'Cliente 4', 'C/ Cliente 4', 'Villena', '03400', 'Alicante', 600300100, 'cliente', 'cliente4@gmail.com', '$2y$10$eLhqTfyoOowCYfotdOUQ9OYMvjwX6/94NveaDY/fjbshVkouOGpM2', 'S'),
(5, '11111115E', 'Cliente 5', 'Cliente 5', '', '', '', '', 0, 'cliente', 'cliente5@gmail.com', '$2y$10$02arIDIjDQCOScBBhqs7DOTULmvRUWm4oPHp2Y2Iyb6wL/EsEoEyy', 'S'),
(6, '11111116T', 'Cliente 6', 'Cliente 6', '', '', '', '', 0, 'cliente', 'cliente6@gmail.com', '$2y$10$KpB1d.p7c6ycqJ94elF18ONa3SgpS54AHeFO6tjSRFa58qADCN9QG', 'S'),
(7, '11111117R', 'Cliente 7', 'Cliente 7', '', '', '', '', 0, 'cliente', 'cliente7@gmail.com', '$2y$10$P2vXF8F3ufHm6D8hW8i8ResNC0JdLu93WnTspUja.NgaJfqwxR3q6', 'S'),
(8, '11111118W', 'Cliente 8', 'Cliente 8', '', '', '', '', 0, 'cliente', 'cliente8@gmail.com', '$2y$10$j/JZCRpj.2zzZIgGWphn..bRA/eH1NmrmrZk8xsh6tSsdqbkebt8K', 'S'),
(9, '11111119A', 'Cliente 9', 'Cliente 9', '', '', '', '', 0, 'cliente', 'cliente9@gmail.com', '$2y$10$bsLtTepSlgE28AfwvYiwwOLn0X5Mg9ghR5fitPNW9F337nVUotude', 'S'),
(10, '11111120G', 'Cliente 10', 'Cliente 10', '', '', '', '', 0, 'cliente', 'cliente10@gmail.com', '$2y$10$9DBMy51uf7AWyaHV7eDXhOawSdrUNcJHGwtzYYy4DshMJyw3NMd86', 'S'),
(11, '22222222J', 'Empleado 1', 'Empleado 1', '', '', '', '', 0, 'empleado', 'empleado1@gmail', '$2y$10$3PnPAm7s1PF1YE.MCtBXJOvOirmJpkXipvFy1t3LCSi7gZqNMDbPy', 'S'),
(12, '22222223Z', 'Empleado 2', 'Empleado 2', '', '', '', '', 0, 'empleado', 'empleado2@gmail', '$2y$10$kDY5pIp5d0xCYxQhe3g79.g5Q6CdF3cRcPCXpbK8TP/HCQdLzR5bu', 'S'),
(13, '22222224S', 'Empleado 3', 'Empleado 3', '', '', '', '', 0, 'empleado', 'empleado3@gmail', '$2y$10$YTO/kaZgt9vqLDw.dLkz..vo9Cy49yIGQ/14Nbce2MY.ytUZtYafu', 'S'),
(14, '22222225Q', 'Empleado 4', 'Empleado 4', '', '', '', '', 0, 'empleado', 'empleado4@gmail', '$2y$10$lqBb1b/XfP/3dcpwHbraduIi90Q8Qe/RPJUUCPPumL6pBvfeXilzO', 'S'),
(15, '22222226V', 'Empleado 5', 'Empleado 5', '', '', '', '', 0, 'empleado', 'empleado5@gmail', '$2y$10$XLzw62hpm6nfsiHBgbdlAemq/VVBxYBJfHLBOpr5xzUZvrtvo7Zwy', 'S'),
(16, '33333333P', 'Administrador 1', 'Administrador 1', '', '', '', '', 0, 'administrador', 'administrador1@gmail.com', '$2y$10$nfnLSHSP7JVzZuuQ/W3sGex.pvY0.Lr.EIpuJ9jvogtRtf.KIYL36', 'S'),
(17, '33333334D', 'Administrador 2', 'Administrador 2', '', '', '', '', 0, 'administrador', 'administrador2@gmail.com', '$2y$10$6vedWQrYE9j4p2/Rvtqt3e9398IS9xU6DVIa/FkEc5.NIzN6OuxOy', 'S'),
(18, '33333335X', 'Administrador 3', 'Administrador 3', '', '', '', '', 0, 'administrador', 'administrador3@gmail.com', '$2y$10$WKt9QWyuhef961g05aekMuApUY3wnrx0neLwKZEW4JhsE0wJzhDlO', 'S'),
(30, '44751316D', 'JOSE ANTONIO', 'MORENO FERNANDEZ', '', '', '', '', 0, 'administrador', 'moreno@gmail.com', '$2y$10$0mA.2JVt.PAG9EqMXqKJEOtEye9byhYrBj9M6TDnPvf9gxnGywOWS', 'S');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id_art`),
  ADD UNIQUE KEY `ean` (`ean`),
  ADD KEY `fk_cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indices de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `numPedido` (`numPedido`),
  ADD KEY `ean` (`ean`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uk_dni` (`dni`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `fk_cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categorias` (`id_cat`);

--
-- Filtros para la tabla `lineapedido`
--
ALTER TABLE `lineapedido`
  ADD CONSTRAINT `lineapedido_ibfk_1` FOREIGN KEY (`numPedido`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lineapedido_ibfk_2` FOREIGN KEY (`ean`) REFERENCES `articulos` (`ean`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `usuarios` (`dni`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
