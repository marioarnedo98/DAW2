-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-06-2019 a las 08:26:39
-- Versión del servidor: 10.1.37-MariaDB-0+deb9u1
-- Versión de PHP: 7.0.33-0+deb9u3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cms`
--
CREATE DATABASE IF NOT EXISTS `cms` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cms`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `introduccion` text NOT NULL,
  `ruta` text NOT NULL,
  `contenido` text NOT NULL,
  `orden` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `titulo`, `introduccion`, `ruta`, `contenido`, `orden`, `id_user`) VALUES
(27, 'Navega por la web como hace 30 años', 'En marzo de 1989 Tim Berners-Lee publicaba aquella legendaria propuesta que desembocaría en la creación de la World Wide Web...', 'views/images/articulos/articulo225.jpg', 'Pronto se cumplirán 30 años de aquel hito, y los responsables del CERN han querido rendir homenaje a ese momento con una reedición del primer navegador web de la historia: WorldWideWeb vuelve a la vida dentro de tu navegador para que veas cómo se veía entonces internet. Eso sí: puede que tengas problemas para acceder, porque ese homenaje ha tenido un éxito insospechado y da error de acceso en muchos casos.\r\n\r\n<h3>Navegadores que disparan la nostalgia</h3>\r\nEn realidad WorldWideWeb fue una aplicación creada en diciembre de 1990 para una máquina NeXT en el CERN, en las afueras de Ginebra. Los desarrolladores de este centro se han adelantado al trigésimo aniversario de ese navegador mítico, pero la fecha sí cuadra si tenemos en cuenta que la propuesta original de la WWW se creó en marzo de 1989.\r\nEl navegador \"remasterizado\" se puede cargar dentro de tu navegador web convencional a través de esta URL. Las instrucciones las tenéis aquí, en este simpático proyecto que recupera la magia y simplicidad de aquel primer desarrollo, y que permite navegar a cualquier sitio actual pero mostrándolo como se hubiera mostrado entonces.\r\nEl éxito de esta idea ha sido tal que en estos momentos tanto la página informativa como el propio navegador no cargan del todo bien y a menudo puede aparecer un error 503. Nosotros no hemos sido capaces de cargar nuestra web para probar (se hace desde Document->Open from full document reference y se inserta la URL), pero sí ha sido posible ver cómo el modo texto dominaba por completo este navegador.\r\n\r\nEste proyecto se une a otro similar desarrollado por el CERN en 2013. Se trata de Line Mode Browser 2013, que fue un homenaje al navegador que con ese nombre apareció en 1992 (el segundo de la historia tras WorldWideWeb) y que permitió a los usuarios de sistemas operativos basados en consola (modo texto) navegar por la web.\r\n', 0, 3),
(34, 'El nuevo mundo tejido por la WWW', 'Internet y la web han desatado una revolución a la que le queda mucho camino por delante...', 'views/images/articulos/articulo287.jpg', '<p>Cient&iacute;ficos de la Organizaci&oacute;n Europea de Investigaci&oacute;n Nuclear (CERN, en sus siglas en ingl&eacute;s) tejieron hace 30 a&ntilde;os una red inform&aacute;tica para que los 10.000 investigadores de aquella instituci&oacute;n, ubicada en Suiza, pudieran intercambiar informaci&oacute;n y documentos. El padre de la World Wide Web (la web) fue el ingeniero y f&iacute;sico brit&aacute;nico Tim Berners-Lee. &ldquo;La invent&eacute; solo porque la necesitaba&rdquo;. As&iacute; de sencillo.</p>\r\n<p>En aquellos tiempos, la web era una mara&ntilde;a de textos e hipertextos, una pantalla confusa y aburrida, sin im&aacute;genes ni gr&aacute;ficos, que funcionaba con una lastimosa lentitud. Los inicios de la web no hubieran sido aptos para los impacientesmileniales, que se exasperan solo por el hecho de que durante unos segundos se cuelgue una serie en el m&oacute;vil o se caiga Instagram.</p>\r\n<p>El inabarcable volumen de contenidos de la WWW da muestra de la fabulosa estructura tecnol&oacute;gica en la que se asienta esta cicl&oacute;pea telara&ntilde;a de p&aacute;ginas, que habitan esa computadora global que es Internet. Aquella incipiente Red Gal&aacute;ctica fue fruto de un proyecto creado por Estados Unidos en los tiempos de la Guerra Fr&iacute;a para mantener vivas las comunicaciones en caso de un conflicto b&eacute;lico con la URSS. Hoy es una enorme autopista virtual por la que circula el alud de contenidos alojados en p&aacute;ginas digitales.</p>\r\n<p>La ONU ha declarado un derecho humano (equiparable al agua potable, la vivienda o la alimentaci&oacute;n) el acceso a Internet, pero la brecha digital ahonda el desequilibrio entre pa&iacute;ses ricos y pobres. Internet y la web se complementan. Su uni&oacute;n da ox&iacute;geno a Google y a otros buscadores y alimenta un ecosistema que ha impulsado el crecimiento y el conocimiento de la sociedad. El binomio ha desatado una revoluci&oacute;n a la que le queda mucho camino por delante. Berners-Lee, sin embargo, no ahorra cr&iacute;ticas a la hora de analizar en lo que se ha convertido su criatura: &ldquo;Aunque la web ha creado oportunidades, dado voz a grupos marginados, y hecho m&aacute;s f&aacute;ciles nuestras vidas, tambi&eacute;n ha creado oportunidades a los timadores, dado voz a los que difunden odio y hecho todo tipo de cr&iacute;menes m&aacute;s f&aacute;ciles de cometer&rdquo;.</p>\r\n<p>Internet no es culpable de lo que viaja por sus carriles, aunque, como en toda autopista, es necesario controlar un tr&aacute;fico infestado de bulos, infundios y mentiras. Esa es la gran lacra de la Red.</p>', 0, 3),
(35, '30º aniversario de Internet: las 51 webs que han hecho de la Red lo que hoy es', 'Expertos españoles eligen las páginas más destacadas de la World Wide Web en España...', 'views/images/articulos/articulo664.jpg', '<p><strong>Google, Terra</strong> y<strong> Amazon</strong> encabezan la lista de las webs que m&aacute;s han contribuido a hacer de Internet lo que es hoy en Espa&ntilde;a. Un grupo amplio de programadores, emprendedores, profesores o abogados vinculados desde los inicios a Internet han hecho una lista personal de 15 webs relevantes.</p>\r\n<p>El resultado da una idea de lo que ha sido Internet en Espa&ntilde;a durante estas tres d&eacute;cadas: un pu&ntilde;ado de monstruos internacionales y gigantes nacionales mezclados con otros que desaparecieron, un grupo de webs irreverentes que muestran el poder rebelde de la Red y un tercer conjunto de empresas de varios sectores (medios, comercio, banca) convertidos en pesos pesados digitales</p>\r\n<p>El desaf&iacute;o era, en parte, un juego imposible: &iquest;c&oacute;mo comparar una web de un impacto enorme pero una vida corta con una web menos central pero con una vida larga? &iquest;O c&oacute;mo relacionar gigantes internacionales con iniciativas espa&ntilde;olas obviamente menores pero de mucha penetraci&oacute;n? El objetivo de grupo de expertos era medir del mejor modo posible esa contradicci&oacute;n.</p>\r\n<p><strong>Los primeros 10 puestos de la lista fueron:</strong></p>\r\n<ul>\r\n<li><a href=\"google.es\" target=\"_blank\" rel=\"noopener\">Google</a></li>\r\n<li><a href=\"terra.com\" target=\"_blank\" rel=\"noopener\">Terra</a></li>\r\n<li><a href=\"amazon.es\" target=\"_blank\" rel=\"noopener\">Amazon</a></li>\r\n<li><a href=\"https://www.infojobs.net/\" target=\"_blank\" rel=\"noopener\">InfoJobs</a></li>\r\n<li><a href=\"https://es.wikipedia.org/wiki/Wikipedia:Portada\" target=\"_blank\" rel=\"noopener\">Wikipedia</a></li>\r\n<li><a href=\"https://www.idealista.com/\" target=\"_blank\" rel=\"noopener\">Idealista</a></li>\r\n<li><a href=\"https://www.tuenti.es/\" target=\"_blank\" rel=\"noopener\">Tuenti</a></li>\r\n<li><a href=\"https://es.yahoo.com/\" target=\"_blank\" rel=\"noopener\">Yahoo</a></li>\r\n<li><a href=\"https://www.facebook.com/\" target=\"_blank\" rel=\"noopener\">Facebook</a></li>\r\n<li><a href=\"https://www.softonic.com/\" target=\"_blank\" rel=\"noopener\">Softonic</a></li>\r\n</ul>', 0, 3),
(36, 'PHP es cada vez más vulnerable a los ataques', 'El lenguaje de programación utilizado en el desarrollo de la mayoría de los sitios web es cada vez más vulnerable, según un estudio de F5...', 'views/images/articulos/articulo646.jpg', '<p>Un nuevo an&aacute;lisis llevado a cabo por F5 Labs, la divisi&oacute;n de inteligencia en ciberseguridad de F5 Networks,&nbsp;destaca&nbsp;la creciente vulnerabilidad de PHP,&nbsp;el lenguaje de programaci&oacute;n utilizado en m&aacute;s del 80% de los&nbsp;sitios web. Este informe indica que&nbsp;el 81% del tr&aacute;fico malicioso monitorizado&nbsp;durante 2018&nbsp;en todo el mundo estuvo&nbsp;relacionado con PHP, lo que representa un incremento del 23% con respecto a los datos de 2017. Adem&aacute;s, PHP represent&oacute; el 68% de todos los exploits publicados durante el a&ntilde;o pasado en la Exploit Database (EDB).</p>\r\n<p>El&nbsp;an&aacute;lisis de F5 Labs se centr&oacute; en el seguimiento de las actividades de reconocimiento llevadas a cabo por parte de los hackers, que tratan de involucrar a las capas administrativas de desarrollo en las cadenas de ataques m&aacute;s amplias. La publicaci&oacute;n de estas conclusiones forma parte de la primera entrega del informe Application Protection Report 2019 elaborado por F5 Labs.</p>\r\n<p>&nbsp;</p>', 0, 3),
(37, 'Estos son los lenguajes de programación que más han crecido en 2018', 'En esta lista interesante permite descubrir los nuevos lenguajes desarrollados en los últimos años que poco a poco comienzan a abrirse camino, según GitHub....', 'views/images/articulos/articulo406.jpg', '<p>El lenguaje estrella del año es <strong>TypeScript</strong>, porque no solo está en la lista de <strong>los lenguajes de programación que más han crecido en 2018</strong>, sino que también aparece en la de los más usados del año. TypeScript es una variante de JavaScript desarrollada por Microsoft, que utiliza el <strong>tipado estático</strong>. Se trata de una forma de programación en donde los errores de tipos de datos se detectan durante la compilación, y no durante la ejecución. Con una organización estática, las aplicaciones son más estables y seguras.</p>\r\n<p>De hecho los lenguajes con <strong>tipado estático</strong> han sido los que más han crecido en 2018, ya que Kotlin y Rust también lo son.</p>\r\n<p><strong>HCL</strong>, un lenguaje que utiliza la lengua inglesa para que pueda ser fácilmente leido y modificado, ha doblado su número de usuarios en 2018.</p>\r\n<p>Queda clara la influencia de las grandes corporaciones en la popularización de los lenguajes. Si <strong>TypeScript </strong>ha sido desarrollado por Microsoft, <strong>Go</strong>, que ha crecido un 150% en 2018, es obra de Google. Se trata de un lenguaje concurrente basado en la sintaxis de C. También es de <strong>tipado estático.</strong></p>\r\n<p>La sorpresa de la lista es Python, que pese a tener casi 30 años, ha crecido un 150% en 2018. La razón es que resulta ser un lenguaje que se amolda muy bien al <strong>machine learning</strong>, y se está usando en proyectos de <strong>Inteligencia Artificial</strong>.</p>', 0, 3),
(39, ' Ideas Retina El MIT desarrolla un sistema para entrenar redes neuronales en tiempo récord', '\"Queremos permitir que tanto los expertos en inteligencia artificial como los no expertos diseñen eficientemente arquitecturas de redes neuronales con una solución de bot...', 'views/images/articulos/articulo982.jpg', '<p>En el momento de nacer, el ser humano tiene aproximadamente 100.000 millones de neuronas, que apenas se relacionan entre ellas. Gracias a los est&iacute;mulos que recibe en sus primeras etapas de crecimiento, el beb&eacute; ir&aacute; desarrollando un sinf&iacute;n dea conexiones neuronales, cerca del doble de las que tendr&aacute; cuando sea adulto, ya que durante la infancia y la adolescencia eliminar&aacute; aquellas que sean prescindibles.</p>\r\n<section id=\"sumario_2|html\" class=\"sumario_html izquierda\"><a name=\"sumario_2\"></a>\r\n<div class=\"sumario__interior\">\r\n<div class=\"sumario-texto\">\r\n<p style=\"text-align: center;\"><img style=\"width: 434px; height: 434px;\" src=\"https://media3.giphy.com/media/l3vRcrVqhBVSpJte0/giphy.gif\" /></p>\r\n</div>\r\n</div>\r\n</section>\r\n<p>Este proceso, <a href=\"https://elpais.com/elpais/2019/03/22/ciencia/1553275685_962482.html\">que se desarrolla durante toda nuestra vida</a>, es el punto de partida de las redes neuronales con los que trabaja la inteligencia artificial. Estas redes pueden crearse por medio de un sistema que se define como b&uacute;squeda de arquitectura neuronal (NAS, por sus siglas en ingl&eacute;s). El problema es que su proceso de formaci&oacute;n difiere mucho del que tenemos las personas; estos sistemas requieren una ingente capacidad de procesamiento, lleva mucho tiempo desarrollarlos y no son especialmente baratos.</p>\r\n<p>Un algoritmo desarrollado recientemente por Google tard&oacute; 48.000 horas en producir una red neuronal que utiliza para la clasificaci&oacute;n de im&aacute;genes. El gigante tecnol&oacute;gico tiene capacidad para ejecutar cientos de unidades de procesamiento gr&aacute;fico (GPU, por sus siglas en ingl&eacute;s) al mismo tiempo y cuenta con un <em>hardware</em> que har&iacute;a las delicias de muchos. Pero son muy pocas las empresas que participan de forma activa en el desarrollo de inteligencia artificial y cuentan con recursos de estas dimensiones.</p>', 0, 6),
(40, '¿Una nueva forma de inteligencia artificial?', 'Las redes neuronales artificiales se inventaron hace mucho, en la década de 1950. Entre las más difundidas hoy en día están las redes neuronales convolutivas (CNN), como ...', 'views/images/articulos/articulo840.jpg', '<p><span data-mce-mark=\"1\">Unas ecuaciones completamente ordinarias podr&iacute;an convertirse en nuevas estrellas del cielo de la inteligencia artificial: los alrededor de 5000 investigadores participantes en la &uacute;ltima edici&oacute;n de uno de los congresos de inteligencia artificial m&aacute;s importantes, el NeurIPS, que se celebra al final de cada a&ntilde;o (en 2018 en Montreal), eligieron el art&iacute;culo que expone esa idea como <a href=\"https://nips.cc/Conferences/2018/Awards\" target=\"_blank\" rel=\"noopener\">uno de los mejores</a>. La denominaci&oacute;n del nuevo sistema es ODE-Solver, donde ODE es el acr&oacute;nimo en ingl&eacute;s de </span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">&laquo;</span></span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">ecuaciones diferenciales ordinarias</span></span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">&raquo;</span></span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">: el resolvedor de ecuaciones diferenciales ordinarias, pues. Estas son modelos matem&aacute;ticos del comportamiento interrelacionado de diferentes magnitudes.</span></span></p>\r\n<p><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">Las redes neuronales artificiales se inventaron hace mucho, en la d&eacute;cada de 1950. Entre las m&aacute;s difundidas hoy en d&iacute;a est&aacute;n las redes neuronales convolutivas (CNN), como es el caso de GoogleNet, conocida sobre todo por su capacidad de reconocer im&aacute;genes. Hacen que los datos correspondientes (por ejemplo, p&iacute;xeles de im&aacute;genes) progresen por una red de nudos que equivalen a las neuronas del cerebro y est&aacute;n ordenadas como si fuese en capas. As&iacute; se asigna una ponderaci&oacute;n a las informaciones y se las somete conjuntamente a c&aacute;lculo de modo que representen el mundo tan bien como sea posible y, por lo tanto, formen un modelo tan optimizado como se pueda. La exitosa GoogleNet comprende m&aacute;s de 20 capas; una ResNet (una red neuronal residual</span></span><span data-mce-mark=\"1\">), hasta mil y m&aacute;s.</span></p>\r\n<p><span data-mce-mark=\"1\">Las funciones que encuentra el nuevo ODE-Solver aparecen cuando se van introduciendo m&aacute;s y m&aacute;s planos, como explican el cient&iacute;fico de la computaci&oacute;n David Duvenaud y su equipo de la Universidad de Toronto, el Silicon Valley canadiense del </span><span data-mce-mark=\"1\">&laquo;</span><span data-mce-mark=\"1\">aprendizaje profundo</span><span data-mce-mark=\"1\">&raquo;. Las ecuaciones diferenciales corrientes pueden captar </span><span data-mce-mark=\"1\">&laquo;la din&aacute;mica continua de las unidades ocultas</span>&raquo; de una red neuronal artificial, dicen los autores <a href=\"https://arxiv.org/abs/1806.07366\" target=\"_blank\" rel=\"noopener\">en su art&iacute;culo prepublicado en arXiv</a>. La idea no es ciertamente nueva, como ellos mismos reconocen; otro equipo canadiense <a href=\"https://arxiv.org/abs/1709.03698\" target=\"_blank\" rel=\"noopener\">la hab&iacute;a propuesto ya en 2017</a>. Sin embargo, ahora de lo que se trata es de <span data-mce-mark=\"1\">&laquo;aplicar directamente un ODE-Solver</span><span data-mce-mark=\"1\">&raquo; sin el rodeo a trav&eacute;s de una red neuronal artificial.</span></p>\r\n<p><span data-mce-mark=\"1\">El ODE-Solver podr&iacute;a representar mejor la din&aacute;mica de los datos naturales: cuando se reciben los valores de mediciones espaciadas de forma irregular los aborda mejor que las redes neuronales artificiales. Puesto que se emplean ecuaciones en vez de capas distintas, ya no hay que buscar el n&uacute;mero &oacute;ptimo de estas, como se cuenta en la revista de informaci&oacute;n cient&iacute;fica <a href=\"https://www.technologyreview.com/s/612561/a-radical-new-neural-network-design-could-overcome-big-challenges-in-ai/\" target=\"_blank\" rel=\"noopener\">MIT Technology Review</a>. Marc Deisenroth, cient&iacute;fico de la computaci&oacute;n y experto en aprendizaje autom&aacute;tico que ense&ntilde;a en el Imperial College de Londres, <a href=\"https://twitter.com/mpd37/status/1009719995750866945\" target=\"_blank\" rel=\"noopener\">comenta en Twitter</a> lo siguiente: </span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">&laquo;Idea interesante la de considerar las capas de las redes neuronales como sucesos discretos de una versi&oacute;n continua</span></span><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">&raquo;.</span></span></p>\r\n<p><span data-mce-mark=\"1\"><span data-mce-mark=\"1\">Como estrellas en ciernes de la familia de la inteligencia artificial est&aacute;n tambi&eacute;n ultimamente las redes generativas adversarias (GAN). Se basan en una idea tan simple como triunfal: una red se enfrenta a otra y aprende de sus victorias y de sus derrotas. Intenta, por ejemplo, generar im&aacute;genes que la otra no sepa diferenciar de las aut&eacute;nticas, o desarrolla estrategias de Hacking para enga&ntilde;ar a la red rival, como un aprendiz de boxeador que se faja con su entrenador. Esta idea tambi&eacute;n se dio a conocer en el congreso NIPS hace unos a&ntilde;os. &nbsp; </span></span></p>', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `orden` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `galeria`
--

INSERT INTO `galeria` (`id`, `ruta`, `orden`, `id_user`) VALUES
(24, '../../views/images/galeria/galeria739.jpg', 0, 3),
(25, '../../views/images/galeria/galeria496.jpg', 0, 3),
(26, '../../views/images/galeria/galeria736.jpg', 0, 3),
(27, '../../views/images/galeria/galeria817.jpg', 0, 3),
(28, '../../views/images/galeria/galeria178.jpg', 0, 3),
(29, '../../views/images/galeria/galeria986.jpg', 0, 3),
(30, '../../views/images/galeria/galeria594.jpg', 0, 3),
(31, '../../views/images/galeria/galeria272.jpg', 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `revision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `nombre`, `email`, `mensaje`, `fecha`, `revision`) VALUES
(14, 'Mario', 'marioarnedo1@gmail.com', 'Hola que tal buenas tardes', '2019-04-29 11:22:10', 1),
(19, 'Mario', 'marioarnedo1@gmail.com', 'Este es un mensaje', '2019-05-10 16:14:09', 1),
(21, 'Marquitos', 'daw10.2018@gmail.com', 'Hola ', '2019-05-13 10:44:37', 1),
(22, 'Maria Jose', 'mjibanez@jesuitasrioja.org', 'Me quiero subscribir', '2019-05-20 08:05:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `ruta` text NOT NULL,
  `titulo` text NOT NULL,
  `descripcion` text NOT NULL,
  `orden` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`id`, `ruta`, `titulo`, `descripcion`, `orden`, `id_user`) VALUES
(65, '../../views/images/slide/slide624.jpg', 'Lenguajes de programación', 'Noticias sobre...', 1, 3),
(71, '../../views/images/slide/slide995.jpg', 'Estilos', 'Noticias sobre...', 5, 3),
(72, '../../views/images/slide/slide952.jpg', 'Web', 'Noticias sobre...', 3, 3),
(73, '../../views/images/slide/slide200.jpg', 'Tecnologías', 'Noticias sobre...', 2, 3),
(74, '../../views/images/slide/slide180.jpg', 'IOT', 'Noticias sobre...', 6, 3),
(75, '../../views/images/slide/slide903.jpg', 'Y mucho mas...', 'Noticias sobre...', 7, 3),
(76, '../../views/images/slide/slide827.jpg', 'Bienvenidos a...', 'HTML-Mania!', 4, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscriptores`
--

CREATE TABLE `suscriptores` (
  `id` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `revision` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `suscriptores`
--

INSERT INTO `suscriptores` (`id`, `nombre`, `email`, `revision`) VALUES
(7, 'Mario', 'marioarnedo1@gmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(10) NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `photo` text NOT NULL,
  `rol` int(11) NOT NULL,
  `intentos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `email`, `photo`, `rol`, `intentos`) VALUES
(3, 'admin', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'admin@hotmail.com', 'views/images/perfiles/perfil275.jpg', 0, 0),
(6, 'profe', '$2a$07$asxx54ahjppf45sd87a5auZYWFa1Eks7.6xE5.g1u61Yy1kWFrmSK', 'profe@hotmail.com', 'views/images/perfiles/perfil894.jpg', 0, 0),
(7, 'Profe2', '$2a$07$asxx54ahjppf45sd87a5auUV1zNXeIojUUuJVT4RuX4E3LFNY7ygy', 'profe2@gmail.com', 'views/images/perfiles/perfil830.jpg', 1, 0),
(8, 'Profe3', '$2a$07$asxx54ahjppf45sd87a5aucFffiI4jEvKTG1jug0O.KUqQlqfWxIS', 'profe2@gmail.com', 'views/images/perfiles/perfil161.jpg', 0, 0),
(9, 'PruebaAdmi', '$2a$07$asxx54ahjppf45sd87a5auXBm1Vr2M1NV5t/zNQtGHGpS5fFirrbG', 'pruebaadmin@gmail.com', 'views/images/perfiles/perfil985.jpg', 0, 0),
(10, 'PruebaEd', '$2a$07$asxx54ahjppf45sd87a5au6fAHIlFrQ7jQ4XHf7fycZYUNBysO4Bq', 'editor@correo.es', 'views/images/perfiles/perfil105.jpg', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT de la tabla `suscriptores`
--
ALTER TABLE `suscriptores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
