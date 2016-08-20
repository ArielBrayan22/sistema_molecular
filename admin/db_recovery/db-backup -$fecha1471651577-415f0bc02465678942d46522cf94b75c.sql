DROP TABLE bibliografia;

CREATE TABLE `bibliografia` (
  `Id_Bibliografia` int(11) NOT NULL AUTO_INCREMENT,
  `texto` text CHARACTER SET latin1 NOT NULL,
  `ID_PG` int(11) NOT NULL,
  PRIMARY KEY (`Id_Bibliografia`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO bibliografia VALUES("1","James Foley, Andries van Dam, Steven Feiner, John Hughes, \"COMPUTER\nGRAPHICS Principles and Practice\", Addison Wesley (1992)\n","1");
INSERT INTO bibliografia VALUES("2","Donald Eran, Pauline Baker, \"COMPUTER GRAPHICS\", Prentice Hall (1994).","1");
INSERT INTO bibliografia VALUES("3","M. E. Mortenson, \"COMPUTER GRAPHICS An introduction to the mathematics and\nGeometry\", Industrial Press\n","1");
INSERT INTO bibliografia VALUES("4","Heinz-Otto Peitgen, Hartmut Jürgens, Dietmar Saupe, \"FRACTALS FOR THE CLASSROOM Introduction to Fractals and Chaos\", Springer Verlag (1993)\n","1");
INSERT INTO bibliografia VALUES("5","Craig A. Lindley, \"PRACTICAL RAY TRACING IN C\", John Wiley and Sons (1992)","1");
INSERT INTO bibliografia VALUES("6","asada","19");
INSERT INTO bibliografia VALUES("8","ddsds","19");



DROP TABLE carrera;

CREATE TABLE `carrera` (
  `ID_Carrera` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_carrera` varchar(200) NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  PRIMARY KEY (`ID_Carrera`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

INSERT INTO carrera VALUES("1","INGENIERÍA CIVIL","4");
INSERT INTO carrera VALUES("2","INGENIERÍA DE ALIMENTOS","0");
INSERT INTO carrera VALUES("3","INGENIERÍA DE SISTEMAS","1");
INSERT INTO carrera VALUES("4","INGENIERÍA ELECTRICA","0");
INSERT INTO carrera VALUES("5","INGENIERÍA ELECTRONICA","0");
INSERT INTO carrera VALUES("6","INGENIERÍA ELECTROMECANICA ","0");
INSERT INTO carrera VALUES("7","INGENIERÍA INDUSTRIAL ","0");
INSERT INTO carrera VALUES("8","INGENIERÍA EN INFORMATICA","1");
INSERT INTO carrera VALUES("9","INGENIERÍA MATEMATICA","0");
INSERT INTO carrera VALUES("10","INGENIERÍA MECANICA","0");
INSERT INTO carrera VALUES("11","INGENIERÍA QUIMICA","0");
INSERT INTO carrera VALUES("12","LICENCIATURA EN BIOLOGIA","0");
INSERT INTO carrera VALUES("13","LICENCIATURA EN DIDACTICA DE LA FISICA ","0");
INSERT INTO carrera VALUES("14","LICENCIATURA EN DIDACTICA DE LA MATEMATICA ","0");
INSERT INTO carrera VALUES("15","LICENCIATURA EN FISICA ","0");
INSERT INTO carrera VALUES("16","LICENCIATURA EN MATEMATICAS ","0");
INSERT INTO carrera VALUES("17","LICENCIATURA EN QUIMICA","0");
INSERT INTO carrera VALUES("18","LIC. EN ENFERMERIA","0");
INSERT INTO carrera VALUES("19","LIC. EN NUTRICION","0");



DROP TABLE criterio;

CREATE TABLE `criterio` (
  `ID_Criterio` int(11) NOT NULL AUTO_INCREMENT,
  `Criterio` text NOT NULL,
  `ID_PG` int(11) NOT NULL,
  PRIMARY KEY (`ID_Criterio`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO criterio VALUES("1","Los parciales y el Examen final se evaluarán con un examen escrito y una práctica cada uno. El\ntrabajo práctico servirá para reforzar los conocimientos adquiridos y para lograr la relación\nálgebra-geometría.\n","1");
INSERT INTO criterio VALUES("2","Para el examen final, se desarrollará un proyecto que ponga en práctica todos los conceptos\ndesarrollados en el curso. La defensa será en computadora. Dependiendo de la cantidad de\nalumnos se puede considerar el trabajo en grupos de dos personas.","1");
INSERT INTO criterio VALUES("3","Para el examen Final se deberá presentar un artículo científico relacionado con un tema\nespecífico de la infografía. Este trabajo será individual.\n","1");
INSERT INTO criterio VALUES("9","czxxzcffdf dffd","19");



DROP TABLE departamento;

CREATE TABLE `departamento` (
  `ID_Departamento` int(11) NOT NULL AUTO_INCREMENT,
  `Departamento` varchar(200) NOT NULL,
  `ID_Facultad` int(11) NOT NULL,
  PRIMARY KEY (`ID_Departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

INSERT INTO departamento VALUES("1","Informática Sistemas","1");
INSERT INTO departamento VALUES("2","Electronica y Electrica","1");
INSERT INTO departamento VALUES("4","Ing Civil","1");



DROP TABLE docente;

CREATE TABLE `docente` (
  `ID_Docente` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Completo` varchar(200) NOT NULL,
  `Apellidos` varchar(200) NOT NULL,
  `Profesion` text NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Celular` int(11) NOT NULL,
  `Correo` varchar(200) NOT NULL,
  `Direccion` varchar(200) NOT NULL,
  `User_Login` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Docente`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO docente VALUES("1","Marco Antoni","Montecinos Choqu","Msc. Lic. Informatic ","443241","7078923","markmcbo@gmail.co ","Av. America entre Libertador Edificio Aduve Nro. 30","1980102","304667");
INSERT INTO docente VALUES("3","Rosemary","Torrico Bascope","Msc. Lic. Informatica","4415679","71778384","rosemary@cs.umss.edu.bo ","Calle Manuela Gandarrillas y Calle Segunda Nro. 234 2053489","197508320","2053489");
INSERT INTO docente VALUES("5","ariel brayan","ferrel salvatierra","ing de sistemas   ","4775422","77902769","arielito_facilito@gmail.com   ","av. segunda frente a la tercera","guapo","123456");
INSERT INTO docente VALUES("6","juan jose","ramieres alcozer","lic. en Informatica","4005594","7899023","arcozer@gmail.com","calle nueva y tercer nro. 903","alcozer","2345");



DROP TABLE facultad;

CREATE TABLE `facultad` (
  `ID_Facultad` int(11) NOT NULL AUTO_INCREMENT,
  `Facultad` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Facultad`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

INSERT INTO facultad VALUES("1","FACULTAD DE CIENCIAS Y TECNOLOGIA");
INSERT INTO facultad VALUES("2","FACULTAD DE CIENCIAS ECONOMICAS");
INSERT INTO facultad VALUES("3","FACULTADAD DE ARQUITECTURA Y CIENCIAS DEL HABITAT");
INSERT INTO facultad VALUES("4","FACULTAD DE HUMANIDADES Y CIENCIA DE LA EDUCACIÓN ");
INSERT INTO facultad VALUES("5","FACULDAD DE CIENCIAS JURIDICAS Y POLITICAS");
INSERT INTO facultad VALUES("6","FACULTAD DE MEDICINA");
INSERT INTO facultad VALUES("7","FACULTAD DE ODONTOLOGIA");
INSERT INTO facultad VALUES("8","FACULTAD DE BIOQUIMICA Y FARMACIA");
INSERT INTO facultad VALUES("9","FACULTAD DE CIENCIAS AGROPECUARIAS, FORESTALES Y VETERINARIAS");



DROP TABLE gestion;

CREATE TABLE `gestion` (
  `ID_Gestion` int(11) NOT NULL AUTO_INCREMENT,
  `gestion` varchar(10) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Gestion`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

INSERT INTO gestion VALUES("9","1-2016","PRIMERO");
INSERT INTO gestion VALUES("10","2-2016","SEGUNDO");
INSERT INTO gestion VALUES("13","1-2017","PRIMERO");



DROP TABLE justificacion;

CREATE TABLE `justificacion` (
  `Id_Justificacion` int(11) NOT NULL AUTO_INCREMENT,
  `Justificacion` text NOT NULL,
  `ID_PG` int(11) NOT NULL,
  PRIMARY KEY (`Id_Justificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO justificacion VALUES("1","Durante las últimas décadas, el campo de la Graficación por Computadora ha evolucionado de\nuna manera continua y rápida aplicándose a diversas áreas del saber humano que van desde la\nsimulación hasta el entretenimiento, muchas de las cuales han maravillado e impactado a la\nsociedad.\nEntre las numerosas aplicaciones, podemos mencionar las siguientes: Interfaces GUI, Industria\ndel Entretenimiento, Aplicaciones Comerciales, Diseño Asistido, Aplicaciones Científicas,\nMedicina, Cartografía y GIS.\nTodos estos sistemas, utilizados para fines tan diversos, tienen un fundamento subyacente que\nconsiste en una seria de técnicas derivadas de la aplicación de la Graficación por Computadora.\nEn este contexto se hace necesario un estudio de los algoritmos y técnicas gráficas que\npermitan el desarrollo de nuevas aplicaciones para solucionar diversos problemas que se\npresentan.\n","1");
INSERT INTO justificacion VALUES("2","aaa","15");
INSERT INTO justificacion VALUES("6","dsfsdfdsg","19");



DROP TABLE kardex;

CREATE TABLE `kardex` (
  `ID_Kardex` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PG_K` int(11) NOT NULL,
  `ID_Tipo_K` int(11) NOT NULL,
  `ID_Materia_K` int(11) NOT NULL,
  `ID_Docente_K` int(11) NOT NULL,
  `ID_Gestion_K` int(11) NOT NULL,
  PRIMARY KEY (`ID_Kardex`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO kardex VALUES("1","37","2","16","6","1");
INSERT INTO kardex VALUES("3","38","5","16","6","1");
INSERT INTO kardex VALUES("5","45","1","15","6","9");



DROP TABLE materia;

CREATE TABLE `materia` (
  `ID_Materia` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre_Materia` varchar(200) NOT NULL,
  `Codigo` int(11) NOT NULL,
  `Grupo` varchar(10) NOT NULL,
  `Nivel_Materia` varchar(10) NOT NULL,
  `Carga_Horaria` varchar(100) NOT NULL,
  `Materias_Relacionadas` text NOT NULL,
  `ID_Departamento` int(11) NOT NULL,
  `ID_Carrera` int(11) NOT NULL,
  PRIMARY KEY (`ID_Materia`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

INSERT INTO materia VALUES("14","ESTRUCUTURAS","20139534","1","J","24","PROYECTO FINAL, PERFIL DE PROYECTO DE GRADO","4","1");
INSERT INTO materia VALUES("15","CAMINOS","23904","1","A","24","PUENTES, VIALIDAD","4","1");
INSERT INTO materia VALUES("38","TOPOGRAFIA","20485875","2","B","23","TOPO II, TOPO III","4","1");
INSERT INTO materia VALUES("39","TOPOGRAFIA","299559","1","B","24","TOPO II, TOPO III","4","1");
INSERT INTO materia VALUES("40","INTRODUCCION A LA PROGRAMACION","224345","1","A","24","ELEMENTOS DE PROGRMACION","1","3");
INSERT INTO materia VALUES("41","GRAFICACIÓN POR COMPUTADORA","2010042","1","A","24","METODOLOGIA DE GRAFICAS, OPEN SOURCE","1","8");



DROP TABLE metodologia;

CREATE TABLE `metodologia` (
  `ID_Metod` int(11) NOT NULL AUTO_INCREMENT,
  `Metodologia` text NOT NULL,
  `ID_PG` int(11) NOT NULL,
  PRIMARY KEY (`ID_Metod`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO metodologia VALUES("1","Los cursos estarán compuestos de clases magistrales en aula, complementados por ejercicio, donde el alumno podrá poner en práctica los conceptos aprendidos. El curso tendrá sesiones prácticas en laboratorio, donde el alumno debe participar con sus dudas y resultados de los ejercicios propuestos.","1");
INSERT INTO metodologia VALUES("2","En las clases, los alumnos deberán mostrarse participativos, y deberán mostrar creatividad e\niniciativa en la resolución de los ejercicios planteados","1");
INSERT INTO metodologia VALUES("6","addsd","19");



DROP TABLE objetivo;

CREATE TABLE `objetivo` (
  `ID_Objetivos` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PG` int(11) NOT NULL,
  `Texto_Obj` text NOT NULL,
  PRIMARY KEY (`ID_Objetivos`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

INSERT INTO objetivo VALUES("1","1","Tener los suficientes fundamentos matemáticos, geométricos y de programación para\ndesarrollar aplicaciones gráficas.");
INSERT INTO objetivo VALUES("2","1","Introducir los algoritmos y estructura de datos necesarios para presentar datos gráficamente\nen una computadora.");
INSERT INTO objetivo VALUES("3","1","Estudiar la generación de las primitivas básicas y su correspondiente manipulación.");
INSERT INTO objetivo VALUES("4","1","Desarrollar modelos 3D, junto con su representación, visualización y transformación.");
INSERT INTO objetivo VALUES("5","1","Generar imágenes con realismo fotográfico.");
INSERT INTO objetivo VALUES("6","1","Aprender algoritmos y técnicas para el modelamiento geométrico.");
INSERT INTO objetivo VALUES("7","1","Tener conocimiento sobre los modelos Fractales y su aplicación.\n");
INSERT INTO objetivo VALUES("8","15","asdfsd");
INSERT INTO objetivo VALUES("12","19","sdfsdfsd");



DROP TABLE planglobal;

CREATE TABLE `planglobal` (
  `ID_PG` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Tipo` int(11) NOT NULL,
  `ID_Materia` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `ID_Gestion` int(11) NOT NULL,
  PRIMARY KEY (`ID_PG`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

INSERT INTO planglobal VALUES("6","1","1","4","1");
INSERT INTO planglobal VALUES("15","1","1","2","1");
INSERT INTO planglobal VALUES("16","1","2","3","1");
INSERT INTO planglobal VALUES("18","1","1","3","1");
INSERT INTO planglobal VALUES("20","0","11","0","0");
INSERT INTO planglobal VALUES("34","1","11","2","1");
INSERT INTO planglobal VALUES("35","1","11","2","9");
INSERT INTO planglobal VALUES("40","2","16","6","9");
INSERT INTO planglobal VALUES("41","2","14","5","1");
INSERT INTO planglobal VALUES("43","1","24","6","1");
INSERT INTO planglobal VALUES("44","1","21","5","9");
INSERT INTO planglobal VALUES("46","1","40","1","9");
INSERT INTO planglobal VALUES("47","1","41","6","9");



DROP TABLE registro_editado_pg;

CREATE TABLE `registro_editado_pg` (
  `ID_Registro` int(11) NOT NULL AUTO_INCREMENT,
  `Estado` varchar(100) NOT NULL,
  `ID_PG` int(11) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`ID_Registro`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

INSERT INTO registro_editado_pg VALUES("1","Llenado","1","2","2016-07-24");
INSERT INTO registro_editado_pg VALUES("2","Llenado","15","2","2016-08-04");
INSERT INTO registro_editado_pg VALUES("3","Llenado","19","2","2016-08-06");
INSERT INTO registro_editado_pg VALUES("4","Llenado","19","2","2016-08-06");
INSERT INTO registro_editado_pg VALUES("5","Llenado","19","2","2016-08-06");
INSERT INTO registro_editado_pg VALUES("6","Llenado","31","2","2016-08-06");
INSERT INTO registro_editado_pg VALUES("7","Llenado","34","2","2016-08-06");



DROP TABLE sec_option;

CREATE TABLE `sec_option` (
  `ID_Select` int(11) NOT NULL AUTO_INCREMENT,
  `ID_Carrera` int(11) NOT NULL,
  PRIMARY KEY (`ID_Select`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO sec_option VALUES("1","8");



DROP TABLE seccion_contenido;

CREATE TABLE `seccion_contenido` (
  `ID_Contenido` int(11) NOT NULL AUTO_INCREMENT,
  `Contenido` text NOT NULL,
  `ID_Unidad` int(11) NOT NULL,
  PRIMARY KEY (`ID_Contenido`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

INSERT INTO seccion_contenido VALUES("1","Introducción a las Gráficas por Computadora\n","1");
INSERT INTO seccion_contenido VALUES("2","Aplicaciones\n","1");
INSERT INTO seccion_contenido VALUES("3","Historia de las Gráficas por Computadora","1");
INSERT INTO seccion_contenido VALUES("4","Dispositivos de Despliegue","1");
INSERT INTO seccion_contenido VALUES("5","Fundamentos gráficos\n","1");
INSERT INTO seccion_contenido VALUES("6","El álgebra Lineal y las Gráficas por Computadora","2");
INSERT INTO seccion_contenido VALUES("7","Sistemas de Coordenadas\n","2");
INSERT INTO seccion_contenido VALUES("8","Vectores y Matrices","2");
INSERT INTO seccion_contenido VALUES("9","Matrices y las Transformaciones Lineales","2");
INSERT INTO seccion_contenido VALUES("10","Coordenadas Homogéneas","2");
INSERT INTO seccion_contenido VALUES("11","Transformaciones Afines","2");
INSERT INTO seccion_contenido VALUES("12","Matrices Avanzadas y Proyecciones\n","2");
INSERT INTO seccion_contenido VALUES("13","Orientación y Desplazamiento Angular en 3D\n","2");
INSERT INTO seccion_contenido VALUES("14","Generalización de las Transformaciones\n","2");
INSERT INTO seccion_contenido VALUES("15","Transformaciones Window-Viewport","2");
INSERT INTO seccion_contenido VALUES("16","Verificaciones Geométricas\n","2");
INSERT INTO seccion_contenido VALUES("17","Técnicas de discretización\n","3");
INSERT INTO seccion_contenido VALUES("18","Discretización de la línea","3");
INSERT INTO seccion_contenido VALUES("19","Algoritmo de Bresehman\n","3");
INSERT INTO seccion_contenido VALUES("20","Discretización del Círculo","3");
INSERT INTO seccion_contenido VALUES("21","Discretización de la Elipse","3");
INSERT INTO seccion_contenido VALUES("22","Aliasing\n","3");
INSERT INTO seccion_contenido VALUES("23","Importancia de una buena representación","4");
INSERT INTO seccion_contenido VALUES("24","Tipos de Representación","4");
INSERT INTO seccion_contenido VALUES("25","Mallas Poligonales","4");
INSERT INTO seccion_contenido VALUES("26","Aplicación de las transformaciones y proyecciones a una Representación\n","4");
INSERT INTO seccion_contenido VALUES("27","Otras representaciones: Sup. Cuadráticas y Sup. Paramétricas\n","4");
INSERT INTO seccion_contenido VALUES("28","Introducción","5");
INSERT INTO seccion_contenido VALUES("29","Historia","5");
INSERT INTO seccion_contenido VALUES("30"," Curvas","5");
INSERT INTO seccion_contenido VALUES("31","Curvas de Hermite","5");
INSERT INTO seccion_contenido VALUES("32","Curvas de Bézier","5");
INSERT INTO seccion_contenido VALUES("33","Curvas B-Spline","5");
INSERT INTO seccion_contenido VALUES("34","Superficies","5");
INSERT INTO seccion_contenido VALUES("35","Superficies bicubicas de Hermite\n","5");
INSERT INTO seccion_contenido VALUES("36","Superficies de Bézier","5");
INSERT INTO seccion_contenido VALUES("37","Sólidos","5");
INSERT INTO seccion_contenido VALUES("38","Introducción","6");
INSERT INTO seccion_contenido VALUES("39","Naturaleza de la Luz","6");
INSERT INTO seccion_contenido VALUES("40","Luz e Iluminación","6");
INSERT INTO seccion_contenido VALUES("41","Modelos para el Color","6");
INSERT INTO seccion_contenido VALUES("42","Modelo Geométrico para la Luz\n","6");
INSERT INTO seccion_contenido VALUES("43","Modelos de Reflexión","6");
INSERT INTO seccion_contenido VALUES("44","Modelo de Phong","6");
INSERT INTO seccion_contenido VALUES("45","Modelo de Cook y Torrance","6");
INSERT INTO seccion_contenido VALUES("46","Modelos de Iluminación\n","6");
INSERT INTO seccion_contenido VALUES("47","La generación de imágenes de realismo fotográfico","7");
INSERT INTO seccion_contenido VALUES("48","En busca del Realismo","7");
INSERT INTO seccion_contenido VALUES("49","Modelos de Lambert, Gouraud y Phong","7");
INSERT INTO seccion_contenido VALUES("50","Ray Tracing\n","7");
INSERT INTO seccion_contenido VALUES("51","Naturaleza recursiva del Ray Tracing","7");
INSERT INTO seccion_contenido VALUES("52","Intersección Rayo-Objeto\n","7");
INSERT INTO seccion_contenido VALUES("53","Visibilidad Selectiva\n","7");
INSERT INTO seccion_contenido VALUES("54","Atenuación Atmosférica","7");
INSERT INTO seccion_contenido VALUES("55","Técnicas de Aceleración","7");
INSERT INTO seccion_contenido VALUES("56","Orientación y Dirección","8");
INSERT INTO seccion_contenido VALUES("57","Formas de especificar la orientación","8");
INSERT INTO seccion_contenido VALUES("58","Matrices","8");
INSERT INTO seccion_contenido VALUES("59","Ángulos de Euler","8");
INSERT INTO seccion_contenido VALUES("60","Cuaterniones","8");
INSERT INTO seccion_contenido VALUES("61","Introducción a los fractales","9");
INSERT INTO seccion_contenido VALUES("62","Fractales Clásicos","9");
INSERT INTO seccion_contenido VALUES("63","Autosimilaridad\n","9");
INSERT INTO seccion_contenido VALUES("64","Sistema de Funciones Iteradas","9");
INSERT INTO seccion_contenido VALUES("65","Sistemas L","9");
INSERT INTO seccion_contenido VALUES("66","Conjunto de Julia","9");
INSERT INTO seccion_contenido VALUES("67","Conjunto de Mandelbrot","9");
INSERT INTO seccion_contenido VALUES("68","mavos a buscar poquemos a","31");
INSERT INTO seccion_contenido VALUES("80","a","31");
INSERT INTO seccion_contenido VALUES("81","a","31");



DROP TABLE seccion_objetivo;

CREATE TABLE `seccion_objetivo` (
  `ID_Objetivo` int(11) NOT NULL AUTO_INCREMENT,
  `Objetivo` text NOT NULL,
  `ID_Unidad` int(11) NOT NULL,
  PRIMARY KEY (`ID_Objetivo`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;

INSERT INTO seccion_objetivo VALUES("1"," Realizar una revisión histórica de la Infografía.","1");
INSERT INTO seccion_objetivo VALUES("2","Presentar las múltiples aplicaciones de la Infografía.\n","1");
INSERT INTO seccion_objetivo VALUES("3","Presentar los fundamentos de la Infografía","1");
INSERT INTO seccion_objetivo VALUES("4","Establecer claramente la relación entre algebra-geometría-código","2");
INSERT INTO seccion_objetivo VALUES("5","Proporcionar los fundamentos matemáticos usados en las Gráficas por Computadora.","2");
INSERT INTO seccion_objetivo VALUES("6","Lograr un entendimiento geométrico de los conceptos matemáticos para su implementación en software","2");
INSERT INTO seccion_objetivo VALUES("7","Presentar la discretización como elemento básico dentro de las Graficas por computadora junto con los problemas relacionados","3");
INSERT INTO seccion_objetivo VALUES("8","Presentar los algoritmos básicos para la graficación de las primitivas básicas y las diversas operaciones que se pueden realizar sobre las mismas.\n","3");
INSERT INTO seccion_objetivo VALUES("9","Determinar la importancia de una buena representación.","4");
INSERT INTO seccion_objetivo VALUES("10","Especificar las diferentes formas de representar los objetos con fines infográficos","4");
INSERT INTO seccion_objetivo VALUES("11","Relacionar la Representación con las Transformaciones y las Proyecciones con fines de visualización","4");
INSERT INTO seccion_objetivo VALUES("12","Determinar las limitaciones geométricas de las representaciones clásicas: forma implícita y explicita.\n","5");
INSERT INTO seccion_objetivo VALUES("13","Extender el esquema de representación de la forma de los objetos a curvas y superficies paramétricas.","5");
INSERT INTO seccion_objetivo VALUES("14","Estudiar como poder representar superficies y Curvas paramétricas.","5");
INSERT INTO seccion_objetivo VALUES("15","Presentar los fundamentos para representar Sólidos.","5");
INSERT INTO seccion_objetivo VALUES("16","Entender la naturaleza de la Luz y el Color.","6");
INSERT INTO seccion_objetivo VALUES("17","Presentar modelos para el color.","6");
INSERT INTO seccion_objetivo VALUES("18","Presentar los modelos de Reflexión e Iluminación para la generación de imágenes realistas.","6");
INSERT INTO seccion_objetivo VALUES("19","Aplicar los modelos de Reflexión, iluminación y del Color a la generación de imágenes realistas","7");
INSERT INTO seccion_objetivo VALUES("20","Describir los algoritmos y técnicas que permiten crear el realismo.","7");
INSERT INTO seccion_objetivo VALUES("21","Generar imágenes de realismo fotográfico.","7");
INSERT INTO seccion_objetivo VALUES("22","Establecer la diferencia entre dirección, orientación y desplazamiento angular","8");
INSERT INTO seccion_objetivo VALUES("23","Determinar las formas más comunes de especificar la orientación junto con sus ventajas y desventajas.","8");
INSERT INTO seccion_objetivo VALUES("24","Especificar un Sistema de Coordenadas.","8");
INSERT INTO seccion_objetivo VALUES("25","Introducción el concepto de fractal.\n","9");
INSERT INTO seccion_objetivo VALUES("26","Presentar algoritmos y técnicas para modelar la naturaleza.\n","9");
INSERT INTO seccion_objetivo VALUES("38","prueba","0");
INSERT INTO seccion_objetivo VALUES("41","quiero un poquemon a","31");
INSERT INTO seccion_objetivo VALUES("42","a","31");
INSERT INTO seccion_objetivo VALUES("43","a","31");



DROP TABLE tipo;

CREATE TABLE `tipo` (
  `ID_Tipo` int(11) NOT NULL AUTO_INCREMENT,
  `Tipo` varchar(100) NOT NULL,
  PRIMARY KEY (`ID_Tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO tipo VALUES("1","Titular");
INSERT INTO tipo VALUES("6","Normal");



DROP TABLE unidad;

CREATE TABLE `unidad` (
  `ID_Unidad` int(11) NOT NULL AUTO_INCREMENT,
  `Unidad` text NOT NULL,
  `Numero_Unidad` int(11) NOT NULL,
  `Hora_Academica` int(11) NOT NULL,
  `Cant_Semana` int(11) NOT NULL,
  `ID_PG` int(11) NOT NULL,
  PRIMARY KEY (`ID_Unidad`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

INSERT INTO unidad VALUES("1","INTRODUCCIÓN A LAS GRÁFICAS POR COMPUTADORA\n","1","6","1","1");
INSERT INTO unidad VALUES("2","FUNDAMENTOS MATEMATICOS PARA LA INFOGRAFIA","2","18","3","1");
INSERT INTO unidad VALUES("3","ALGORITMOS Y CONCEPTOS BASICOS","3","12","2","1");
INSERT INTO unidad VALUES("4","REPRESENTACION Y VISUALIZACION 3D","4","18","3","1");
INSERT INTO unidad VALUES("5","MODELAMIENTO GEOMETRICO\n","5","24","4","1");
INSERT INTO unidad VALUES("6","LA LUZ Y MODELOS DE REFLEXION, ILUMINACION Y DEL COLOR","6","18","3","1");
INSERT INTO unidad VALUES("7","RAY TRACING","7","12","2","1");
INSERT INTO unidad VALUES("8","DIRECCIÓN Y ORIENTACIÓN\n","8","6","1","1");
INSERT INTO unidad VALUES("9","GEOMETRIA FRACTAL","9","6","1","1");
INSERT INTO unidad VALUES("31","INTRODUCCION A LA PROGRAMACION Y ESTRUCTURA DE DATOS EN LA INGEGRACION A LA INTELIGENCIA ARTIFICIAL","1","2","12","19");
INSERT INTO unidad VALUES("32","qwerew","2","1","1","19");
INSERT INTO unidad VALUES("33","nuevos caminos","13","33","4","19");
INSERT INTO unidad VALUES("34","chjgsdgsd","10","3323","323","19");
INSERT INTO unidad VALUES("35","Undia si ti ","2","23","4","19");



DROP TABLE usuario;

CREATE TABLE `usuario` (
  `ID_User` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `Cargo` varchar(100) NOT NULL,
  `ID_Docente` int(11) NOT NULL,
  PRIMARY KEY (`ID_User`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES("1","root","root","Administrador","1");
INSERT INTO usuario VALUES("2","root2","root2","Administrador","1");



DROP TABLE video;

CREATE TABLE `video` (
  `ID_Video` int(11) NOT NULL AUTO_INCREMENT,
  `Titulo` varchar(200) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Caracteristica` text NOT NULL,
  PRIMARY KEY (`ID_Video`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




