-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-02-2024 a las 16:04:04
-- Versión del servidor: 10.6.16-MariaDB-cll-lve
-- Versión de PHP: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `psbformularios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin_sitio`
--

CREATE TABLE `admin_sitio` (
  `cod_sit` int(11) NOT NULL,
  `nom_sit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL COMMENT 'nombre de la empresa',
  `nit_sit` varchar(50) DEFAULT NULL COMMENT 'nit de la empresa',
  `dir_sit` varchar(50) DEFAULT NULL COMMENT 'direccion',
  `tel_sit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL COMMENT 'telefono',
  `fax_sit` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL COMMENT 'fax de la empresa',
  `pag_sit` varchar(100) DEFAULT NULL COMMENT 'pagina',
  `mail_sit` longtext DEFAULT NULL COMMENT 'mail de la empresa',
  `logo_sit` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci DEFAULT NULL COMMENT 'logo de la empresa',
  `lugar_sit` varchar(100) NOT NULL COMMENT 'lugar de la empresa',
  `face_sit` varchar(200) DEFAULT NULL COMMENT 'perfil de facebook',
  `twt_sit` varchar(100) DEFAULT NULL COMMENT 'dir twitter',
  `ana_sit` longtext DEFAULT NULL COMMENT 'codigo de google analitics',
  `plus_sit` varchar(100) DEFAULT NULL COMMENT 'google plus',
  `cab_sit` varchar(200) DEFAULT NULL COMMENT 'cabezote imagen',
  `pie_sit` longtext DEFAULT NULL COMMENT 'contenido pie',
  `flic_sit` varchar(100) DEFAULT NULL COMMENT 'flickr',
  `vim_sit` varchar(100) NOT NULL COMMENT 'vimeo',
  `head_sit` varchar(200) DEFAULT NULL COMMENT 'nombre de la imagen del header',
  `heno_sit` varchar(200) DEFAULT NULL COMMENT 'descripcion de la imagen heade',
  `gog_sit` varchar(200) DEFAULT NULL COMMENT 'perfil Google +',
  `you_sit` varchar(200) DEFAULT NULL COMMENT 'YouTube',
  `lpre_sit` varchar(300) DEFAULT NULL COMMENT 'Link prensa',
  `lwlw_sit` varchar(300) DEFAULT NULL COMMENT 'Link women''s link worldwide',
  `lob_sit` varchar(300) DEFAULT NULL COMMENT 'Link observatorio',
  `act_sit` int(9) NOT NULL DEFAULT 0 COMMENT 'si no de la activacion del festivar "boleteria, acreditaciones programacion"',
  `lfo_sit` varchar(250) NOT NULL COMMENT 'logo del footer',
  `can_sit` int(9) NOT NULL DEFAULT 0 COMMENT 'Activa "0" y descativa "1" el canal ficci',
  `act_pro_sit` int(11) NOT NULL,
  `act_bol_sit` int(11) NOT NULL,
  `act_acr_sit` int(11) NOT NULL,
  `act_apo_sit` int(11) NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auditoria`
--

CREATE TABLE `auditoria` (
  `cod_aud` int(11) NOT NULL,
  `cod_usu_aud` int(11) DEFAULT NULL,
  `nom_tab_aud` char(100) DEFAULT NULL,
  `fec_aud` datetime DEFAULT NULL,
  `transaccion` varchar(50) DEFAULT NULL COMMENT 'nombre de la transaccion',
  `sql_aud` text DEFAULT NULL,
  `id_int_aud` int(11) DEFAULT NULL COMMENT 'id de la interfaz',
  `id_reg_aud` int(11) DEFAULT NULL COMMENT 'id del registro',
  `cliente_aud` text NOT NULL COMMENT 'auditoria del cliente'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bases`
--

CREATE TABLE `bases` (
  `cod_bas` int(11) NOT NULL COMMENT 'codigo',
  `cod_cat_bas` int(11) DEFAULT NULL COMMENT 'cod_de la categoria asociado',
  `con_bas` longtext DEFAULT NULL COMMENT 'descripcion del titulo',
  `ord_bas` int(11) NOT NULL DEFAULT 0 COMMENT 'orden',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci COMMENT='bases de los premios simon bolivar';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `borrador`
--

CREATE TABLE `borrador` (
  `cod` int(11) NOT NULL,
  `cedula` int(50) NOT NULL,
  `hv` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `cod_cat` int(11) NOT NULL,
  `nom_cat` varchar(100) NOT NULL,
  `nom_cur_cat` varchar(250) NOT NULL COMMENT 'Nombre Categoria para curador',
  `relacion_cat` int(11) NOT NULL COMMENT '0 solo individual, 1 cualquiera',
  `orden_cat` int(11) NOT NULL,
  `imp_cat` int(11) NOT NULL DEFAULT 0 COMMENT 'importancia de la categoria 1 importante 0 no',
  `entregas_cat` varchar(11) NOT NULL COMMENT 'Cantidad de entregas posibles-> ORDEN: Prensa, radio, tv, internet',
  `desc_cat` longtext NOT NULL COMMENT 'descripcion e la categoria',
  `esp_cat` text NOT NULL COMMENT 'Especificaciones de las categorias',
  `esp1_cat` text NOT NULL COMMENT 'especificacion adicional',
  `num1_cat` int(11) NOT NULL COMMENT 'Numero de entregas impreso',
  `num2_cat` int(11) NOT NULL COMMENT 'Numero de entregas digital',
  `num3_cat` int(11) NOT NULL COMMENT 'Numero de entregas tv',
  `num4_cat` int(11) NOT NULL COMMENT 'Numero de entregas radio',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE `ciudades` (
  `cod_mun` int(11) NOT NULL,
  `cod_int_mun` varchar(10) DEFAULT NULL,
  `nom_mun` varchar(30) DEFAULT NULL,
  `cod_dep_mun` int(11) DEFAULT NULL,
  `des_mun` int(11) NOT NULL COMMENT 'para destacar',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `c_trabajos`
--

CREATE TABLE `c_trabajos` (
  `cod_tra` int(11) NOT NULL DEFAULT 0,
  `categoria_tra` int(11) DEFAULT NULL,
  `tipo_tra` int(11) DEFAULT NULL,
  `titulo_tra` varchar(200) DEFAULT NULL,
  `medio_tra` varchar(250) DEFAULT NULL,
  `fecha_em_tra` date DEFAULT NULL,
  `cod_med` int(11) DEFAULT NULL,
  `sinopsis_tra` longtext DEFAULT NULL,
  `doc1_tra` varchar(100) DEFAULT NULL,
  `doc2_tra` varchar(100) DEFAULT NULL,
  `medios_tra` varchar(200) DEFAULT NULL,
  `duracion_tra` varchar(200) DEFAULT NULL,
  `completo_tra` varchar(11) DEFAULT NULL,
  `fec_crea_trabajos` datetime DEFAULT NULL,
  `reg_eli` int(11) DEFAULT NULL,
  `fec_modif_trabajos` datetime DEFAULT NULL,
  `cod_rel` int(11) DEFAULT NULL,
  `cod_reg_rel_trabajos` int(11) DEFAULT NULL,
  `cod_relacion_tra` int(11) DEFAULT NULL,
  `rol_rel` int(11) DEFAULT NULL,
  `fec_crea_rel_trabajos` datetime DEFAULT NULL,
  `fec_modif_rel_trabajos` datetime DEFAULT NULL,
  `usu_acce_rel_trabajos` int(11) DEFAULT NULL,
  `reg_eli_rel_trabajos` int(11) DEFAULT NULL,
  `cod_cat` int(11) DEFAULT NULL,
  `nom_cat` varchar(100) DEFAULT NULL,
  `cod_reg` int(11) DEFAULT NULL,
  `email_reg` varchar(100) DEFAULT NULL,
  `nombre_reg` varchar(100) DEFAULT NULL,
  `apellidos_reg` varchar(100) DEFAULT NULL,
  `tipo_doc_reg` int(11) DEFAULT NULL,
  `no_doc_reg` varchar(50) DEFAULT NULL,
  `tel_fijo_reg` varchar(100) DEFAULT NULL,
  `reg_eli_registro_usuario` int(11) DEFAULT NULL,
  `ciudad_na_reg` int(11) DEFAULT NULL,
  `cuidad_resi_reg` int(11) DEFAULT NULL,
  `ciudad_nacion` varchar(30) DEFAULT NULL,
  `esta_trab_rtrab` varchar(11) DEFAULT NULL,
  `estado_revision` varchar(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `num_entradas` bigint(21) DEFAULT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entregas`
--

CREATE TABLE `entregas` (
  `cod_en` int(11) NOT NULL,
  `que_tra_en` int(11) NOT NULL COMMENT 'Codigo trabajo',
  `tit_en` text NOT NULL COMMENT 'Titulo del trabajo',
  `fecha_en` date NOT NULL COMMENT 'Fecha de emision del trabajo',
  `contenido_en` varchar(250) NOT NULL COMMENT 'Archivo',
  `original_en` varchar(250) NOT NULL COMMENT 'Archivo adjunto original para fotografia y caric',
  `url_en` text NOT NULL COMMENT 'URL multimedia',
  `duracion_tra` varchar(200) NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especificaciones`
--

CREATE TABLE `especificaciones` (
  `cod_es` int(11) NOT NULL,
  `entregas_es` text NOT NULL,
  `especificaciones_es` longtext NOT NULL,
  `cat_es` int(11) NOT NULL,
  `tipo_es` varchar(11) NOT NULL,
  `cod_medio_esp` int(11) NOT NULL COMMENT 'Codigo de medio',
  `cod_smedio_es` int(11) NOT NULL COMMENT 'Código de submedio',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interfaz`
--

CREATE TABLE `interfaz` (
  `cod_int` int(11) NOT NULL,
  `nom_int` char(100) DEFAULT NULL,
  `rut_int` char(200) DEFAULT NULL,
  `cod_mod_int` int(11) DEFAULT NULL,
  `ord_int` int(11) DEFAULT NULL COMMENT 'orden de la interfaz'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `j_trabajos`
--

CREATE TABLE `j_trabajos` (
  `cod_rjur` int(11) DEFAULT NULL,
  `cod_trab_rjur` int(11) DEFAULT NULL,
  `esta_trab_rjur` int(11) DEFAULT NULL,
  `desc_rjur` text DEFAULT NULL,
  `ip_rjur` varchar(250) DEFAULT NULL,
  `cod_lusu_rjur` int(11) DEFAULT NULL,
  `cod_jur_rjur` int(11) DEFAULT NULL,
  `cal_rjur` int(11) DEFAULT NULL,
  `cod_tra` int(11) DEFAULT NULL,
  `categoria_tra` int(11) DEFAULT NULL,
  `tipo_tra` int(11) DEFAULT NULL,
  `titulo_tra` varchar(200) DEFAULT NULL,
  `medio_tra` varchar(250) DEFAULT NULL,
  `cod_medio` int(11) DEFAULT NULL,
  `fecha_em_tra` date DEFAULT NULL,
  `sinopsis_tra` longtext DEFAULT NULL,
  `doc1_tra` varchar(100) DEFAULT NULL,
  `doc2_tra` varchar(100) DEFAULT NULL,
  `medios_tra` varchar(200) DEFAULT NULL,
  `duracion_tra` varchar(200) DEFAULT NULL,
  `completo_tra` varchar(11) DEFAULT NULL,
  `nom_cat` varchar(100) DEFAULT NULL,
  `cod_reg` int(11) DEFAULT NULL,
  `email_reg` varchar(100) DEFAULT NULL,
  `funcion_reg` varchar(100) DEFAULT NULL,
  `nombre_reg` varchar(100) DEFAULT NULL,
  `apellidos_reg` varchar(100) DEFAULT NULL,
  `pais_resi_reg` int(11) DEFAULT NULL,
  `cuidad_resi_reg` int(11) DEFAULT NULL,
  `direccion_reg` varchar(100) DEFAULT NULL,
  `tel_fijo_reg` varchar(100) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `label`
--

CREATE TABLE `label` (
  `id_lab` int(11) NOT NULL,
  `es_lab` longtext NOT NULL,
  `in_lab` longtext NOT NULL,
  `esp_lab` longtext NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_revision_jurados`
--

CREATE TABLE `log_revision_jurados` (
  `cod_lrjur` int(11) NOT NULL,
  `cod_trab_lrjur` int(11) NOT NULL COMMENT 'codigo de trabajo',
  `esta_trab_lrjur` int(11) NOT NULL COMMENT 'estado de trabajo',
  `desc_lrjur` text NOT NULL COMMENT 'descripcion',
  `ip_lrjur` varchar(250) NOT NULL COMMENT 'ip',
  `cod_lusu_lrjur` int(11) NOT NULL COMMENT 'codigo del lider de trabajo',
  `cod_jur_lrjur` int(11) NOT NULL COMMENT 'código del jurado',
  `cal_lrjur` int(11) NOT NULL COMMENT 'Calificacion',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_revision_trabajos`
--

CREATE TABLE `log_revision_trabajos` (
  `cod_lrt` int(11) NOT NULL,
  `cod_trab_lrt` int(11) NOT NULL COMMENT 'codigo de trabajo',
  `esta_trab_lrt` int(11) NOT NULL COMMENT 'estado del trabajo',
  `desc_rlrt` text NOT NULL COMMENT 'descripcion',
  `ip_lrt` varchar(50) NOT NULL COMMENT 'ip',
  `cod_lusu_lrt` int(11) NOT NULL COMMENT 'codigo del usuario lider',
  `fecha_pend_lrt` datetime NOT NULL COMMENT 'Fecha pendiente',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci COMMENT='auditoria de trabajos';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios`
--

CREATE TABLE `medios` (
  `cod_med` int(11) NOT NULL,
  `nom_dem` varchar(250) NOT NULL,
  `desc_med` text NOT NULL,
  `act_mod_med` int(11) NOT NULL COMMENT 'Activar modulo de curaduria horme',
  `orden_dem` int(11) NOT NULL COMMENT 'Orden',
  `alt_ord_med` int(11) NOT NULL COMMENT 'orden alterno para mostra en los jurados',
  `esp_med` int(11) NOT NULL COMMENT 'Medio espcial aplica para fotografia y caricatura',
  `reg_eli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medio_categoria`
--

CREATE TABLE `medio_categoria` (
  `cod_mca` int(11) NOT NULL,
  `cod_cat_mca` int(11) NOT NULL COMMENT 'codigo categoria',
  `cod_med_mca` int(11) NOT NULL COMMENT 'codigo medio'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `cod_men` int(11) NOT NULL,
  `nom_men` varchar(100) NOT NULL COMMENT 'Nombre',
  `cod_rol_men` int(11) NOT NULL COMMENT 'Rol',
  `ruta_men` varchar(100) NOT NULL COMMENT 'Ruta',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `cod_mod` int(11) NOT NULL,
  `nom_mod` char(20) DEFAULT NULL,
  `rut_mod` varchar(50) DEFAULT NULL COMMENT 'ruta modulo',
  `com_mod` varchar(250) DEFAULT NULL COMMENT 'comentario modulo'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pai` int(11) NOT NULL COMMENT 'id del pais',
  `nom_pai` varchar(300) DEFAULT NULL COMMENT 'nombre del pais',
  `nom_pai_ing` varchar(250) NOT NULL,
  `des_pai` int(11) NOT NULL COMMENT 'destacado',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `cod_para` int(11) NOT NULL,
  `nom_para` varchar(50) NOT NULL,
  `val_op_para` varchar(50) NOT NULL,
  `nom_op_para` varchar(50) NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `cod_per` int(11) NOT NULL,
  `nom_per` varchar(50) NOT NULL,
  `fec_crea` datetime NOT NULL COMMENT 'fechade creacion',
  `fec_modif` datetime NOT NULL COMMENT 'fecha ultima modificacion',
  `usu_acce` int(11) NOT NULL COMMENT 'ultimo usuario en usar',
  `reg_eli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `cod_usu_per` int(11) NOT NULL,
  `cod_int_per` int(11) NOT NULL,
  `con_per` int(11) NOT NULL,
  `edi_per` int(11) DEFAULT NULL,
  `ins_per` int(11) DEFAULT NULL,
  `eli_per` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntas`
--

CREATE TABLE `preguntas` (
  `cod_pre` int(11) NOT NULL,
  `pregunta_pre` text NOT NULL,
  `limite_pre` int(11) NOT NULL,
  `ejemplo_pre` varchar(100) NOT NULL,
  `tipo_pro_pre` varchar(100) NOT NULL COMMENT 'PRTI',
  `categoria_pre` int(11) NOT NULL,
  `tipo_tra_pre` int(11) NOT NULL COMMENT '1 individual, 2 colectivo',
  `opc_pre` int(11) NOT NULL COMMENT 'Obligatorio 1, 0 opcional',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_curador`
--

CREATE TABLE `publicacion_curador` (
  `cod_ajur` int(11) NOT NULL,
  `nom_men_pc` varchar(250) NOT NULL COMMENT 'Medio',
  `cod_cat_pc` int(11) NOT NULL COMMENT 'categoria',
  `esta_pc` int(11) NOT NULL COMMENT 'parametros - si - no',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_usuario`
--

CREATE TABLE `registro_usuario` (
  `cod_reg` int(11) NOT NULL,
  `cod_pad_reg` int(11) NOT NULL COMMENT 'Codigo Padre que registro',
  `acep_term_reg` int(11) NOT NULL COMMENT 'Acepto terminos y condiciones',
  `email_reg` varchar(100) NOT NULL,
  `password1_reg` varchar(100) NOT NULL,
  `password2_reg` varchar(100) NOT NULL,
  `funcion_reg` varchar(100) NOT NULL,
  `nombre_reg` varchar(100) NOT NULL,
  `apellidos_reg` varchar(100) NOT NULL,
  `nacimiento_reg` date NOT NULL,
  `genero_reg` varchar(1) NOT NULL COMMENT 'M o F',
  `nacionalidad_reg` int(11) NOT NULL,
  `ciudad_na_reg` int(11) NOT NULL,
  `tipo_doc_reg` int(11) NOT NULL COMMENT '0 CC, 1 CE',
  `no_doc_reg` varchar(50) NOT NULL,
  `archivo_doc_reg` varchar(100) NOT NULL,
  `pais_resi_reg` int(11) NOT NULL,
  `cuidad_resi_reg` int(11) NOT NULL,
  `direccion_reg` varchar(100) NOT NULL,
  `tel_fijo_reg` varchar(100) NOT NULL,
  `tel_movil_reg` varchar(100) NOT NULL,
  `foto_reg` varchar(100) NOT NULL,
  `nivel_reg` varchar(100) NOT NULL,
  `titulo_reg` varchar(100) NOT NULL,
  `universidad_reg` varchar(100) NOT NULL,
  `grado_reg` int(4) NOT NULL,
  `cargo_reg` varchar(100) NOT NULL,
  `profesion_reg` varchar(100) NOT NULL,
  `empresa_reg` varchar(100) NOT NULL,
  `ciudad_empresa_reg` int(11) NOT NULL,
  `pais_empresa_reg` int(11) NOT NULL,
  `jefe_reg` varchar(100) NOT NULL,
  `email_empresa_reg` varchar(100) NOT NULL,
  `direccion_empresa_reg` varchar(100) NOT NULL,
  `tel_empresa_reg` varchar(100) NOT NULL,
  `experiencia_reg` text NOT NULL,
  `res_hv_reg` text NOT NULL COMMENT 'Resumen hoja de vida',
  `twt_reg` varchar(200) NOT NULL COMMENT 'twiter',
  `ins_reg` varchar(200) NOT NULL COMMENT 'instagram',
  `adjdoc_reg` text NOT NULL COMMENT 'adjunto de la cedula',
  `fecnac_reg` date NOT NULL COMMENT 'fecha de nacimiento',
  `procesado_reg` int(11) NOT NULL DEFAULT 0,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Disparadores `registro_usuario`
--
DELIMITER $$
CREATE TRIGGER `actual_autor_c_trabajo` BEFORE UPDATE ON `registro_usuario` FOR EACH ROW update c_trabajos set nombre_reg=NEW.nombre_reg, apellidos_reg=NEW.apellidos_reg, email_reg=NEW.email_reg,  ciudad_na_reg=NEW.ciudad_na_reg, cuidad_resi_reg=NEW.cuidad_resi_reg where cod_reg=OLD.cod_reg
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_trabajos`
--

CREATE TABLE `rel_trabajos` (
  `cod_rel` int(11) NOT NULL,
  `cod_reg` int(11) NOT NULL COMMENT 'Codigo usuario',
  `cod_tra` int(11) NOT NULL COMMENT 'Codigo trabajo',
  `rol_rel` int(11) NOT NULL COMMENT '1 Lider, 2 Miembro',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `cod_res` int(11) NOT NULL,
  `que_pre_res` int(11) NOT NULL COMMENT 'Relacion con preguntas',
  `que_tra_res` int(11) NOT NULL COMMENT 'Relacion con trabajos',
  `respuesta_res` text NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_jurados`
--

CREATE TABLE `revision_jurados` (
  `cod_rjur` int(11) NOT NULL,
  `cod_trab_rjur` int(11) NOT NULL COMMENT 'codigo de trabajo',
  `esta_trab_rjur` int(11) NOT NULL COMMENT 'estado de trabajo',
  `desc_rjur` text NOT NULL COMMENT 'descripcion',
  `ip_rjur` varchar(250) NOT NULL COMMENT 'ip',
  `cod_lusu_rjur` int(11) NOT NULL COMMENT 'codigo del lider de trabajo',
  `cod_jur_rjur` int(11) NOT NULL COMMENT 'código del jurado',
  `cal_rjur` int(11) NOT NULL COMMENT 'Calificacion',
  `cal1_rjur` int(11) NOT NULL COMMENT 'PROSA',
  `cal2_rjur` int(11) NOT NULL COMMENT 'REDONDEZ ',
  `cal3_rjur` int(11) NOT NULL COMMENT 'FASCINACIÓN ',
  `medio_esp_rjur` int(11) NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_jurados_finales`
--

CREATE TABLE `revision_jurados_finales` (
  `cod_rjur` int(11) NOT NULL,
  `cod_trab_rjur` int(11) NOT NULL COMMENT 'codigo de trabajo',
  `esta_trab_rjur` int(11) NOT NULL COMMENT 'estado de trabajo',
  `desc_rjur` text NOT NULL COMMENT 'descripcion',
  `ip_rjur` varchar(250) NOT NULL COMMENT 'ip',
  `cod_lusu_rjur` int(11) NOT NULL COMMENT 'codigo del lider de trabajo',
  `cod_jur_rjur` int(11) NOT NULL COMMENT 'código del jurado',
  `cal_rjur` int(11) NOT NULL COMMENT 'Calificacion',
  `medio_esp_rjur` int(11) NOT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_trabajos`
--

CREATE TABLE `revision_trabajos` (
  `cod_rtrab` int(11) NOT NULL,
  `cod_trab_rtrab` int(11) NOT NULL COMMENT 'codigo de trabajo',
  `esta_trab_rtrab` int(11) NOT NULL COMMENT 'parametros - estado del trabajo',
  `desc_rtrab` text NOT NULL COMMENT 'descripcion',
  `cod_lusu_rtrab` int(11) NOT NULL COMMENT 'codigo del usuario lider',
  `fecha_pend_rtrab` datetime NOT NULL COMMENT 'Fecha pendiente',
  `ip_rtrab` varchar(11) NOT NULL COMMENT 'ip de maquina',
  `act_tem` int(11) NOT NULL COMMENT 'Activacion temporal',
  `act_med_rt` int(11) NOT NULL COMMENT 'Activacion por medio',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision_trabajos_v`
--

CREATE TABLE `revision_trabajos_v` (
  `cod_rtrab` int(11) DEFAULT NULL,
  `cod_trab_rtrab` int(11) DEFAULT NULL,
  `esta_trab_rtrab` int(11) DEFAULT NULL,
  `desc_rtrab` text DEFAULT NULL,
  `cod_lusu_rtrab` int(11) DEFAULT NULL,
  `fecha_pend_rtrab` datetime DEFAULT NULL,
  `ip_rtrab` varchar(11) DEFAULT NULL,
  `act_tem` int(11) DEFAULT NULL,
  `act_med_rt` int(11) DEFAULT NULL,
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal`
--

CREATE TABLE `temporal` (
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `cod_tra` int(11) NOT NULL,
  `categoria_tra` int(11) NOT NULL,
  `tipo_tra` int(11) NOT NULL COMMENT '1 individual, 2 colectivo',
  `titulo_tra` varchar(200) NOT NULL,
  `medio_tra` varchar(100) NOT NULL COMMENT 'PRTI',
  `fecha_em_tra` date NOT NULL,
  `sinopsis_tra` longtext NOT NULL,
  `doc1_tra` varchar(100) NOT NULL,
  `doc2_tra` varchar(100) NOT NULL,
  `medios_tra` varchar(200) NOT NULL,
  `duracion_tra` varchar(200) NOT NULL,
  `completo_tra` varchar(11) NOT NULL DEFAULT '0',
  `cod_medio_tra` int(11) NOT NULL COMMENT 'codigo del medio ',
  `cod_smedio_tra` int(11) NOT NULL COMMENT 'Código de submedio',
  `fin_tra` int(11) NOT NULL COMMENT 'se declara q esfa cerrado el trabajo',
  `ord_tra` int(11) NOT NULL COMMENT 'orden para libro periodistico',
  `procesado_tra` int(11) NOT NULL DEFAULT 2 COMMENT '2 temporal, 0 sin procesa, 1 procesado por javascript',
  `por_lib_tra` varchar(250) NOT NULL COMMENT 'porta del libro periodistico',
  `fec_pub_lib_tra` varchar(50) NOT NULL COMMENT 'fecha de publicacion libro',
  `isbn_lib_tra` varchar(100) NOT NULL COMMENT 'codigo ISBN',
  `asi_lib_tra` varchar(250) NOT NULL COMMENT 'jurado asignado libro',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Disparadores `trabajos`
--
DELIMITER $$
CREATE TRIGGER `actual_trabajo_c_trabajo` BEFORE UPDATE ON `trabajos` FOR EACH ROW update c_trabajos set titulo_tra=NEW.titulo_tra , medios_tra=NEW.medios_tra , sinopsis_tra=NEW.sinopsis_tra , doc1_tra=NEW.doc1_tra where cod_tra=OLD.cod_tra
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_no_finalizados`
--

CREATE TABLE `t_no_finalizados` (
  `cod_tra` int(11) DEFAULT NULL,
  `categoria_tra` int(11) DEFAULT NULL,
  `tipo_tra` int(11) DEFAULT NULL,
  `titulo_tra` varchar(200) DEFAULT NULL,
  `medio_tra` varchar(250) DEFAULT NULL,
  `fecha_em_tra` date DEFAULT NULL,
  `cod_med` int(11) DEFAULT NULL,
  `sinopsis_tra` longtext DEFAULT NULL,
  `doc1_tra` varchar(100) DEFAULT NULL,
  `doc2_tra` varchar(100) DEFAULT NULL,
  `medios_tra` varchar(200) DEFAULT NULL,
  `duracion_tra` varchar(200) DEFAULT NULL,
  `completo_tra` varchar(11) DEFAULT NULL,
  `fec_crea_trabajos` datetime DEFAULT NULL,
  `reg_eli` int(11) DEFAULT NULL,
  `fin_tra` int(11) DEFAULT NULL,
  `fec_modif_trabajos` datetime DEFAULT NULL,
  `cod_rel` int(11) DEFAULT NULL,
  `cod_reg_rel_trabajos` int(11) DEFAULT NULL,
  `cod_relacion_tra` int(11) DEFAULT NULL,
  `rol_rel` int(11) DEFAULT NULL,
  `fec_crea_rel_trabajos` datetime DEFAULT NULL,
  `fec_modif_rel_trabajos` datetime DEFAULT NULL,
  `usu_acce_rel_trabajos` int(11) DEFAULT NULL,
  `reg_eli_rel_trabajos` int(11) DEFAULT NULL,
  `cod_cat` int(11) DEFAULT NULL,
  `nom_cat` varchar(100) DEFAULT NULL,
  `cod_reg` int(11) DEFAULT NULL,
  `email_reg` varchar(100) DEFAULT NULL,
  `nombre_reg` varchar(100) DEFAULT NULL,
  `apellidos_reg` varchar(100) DEFAULT NULL,
  `reg_eli_registro_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` char(200) DEFAULT NULL,
  `car_usu` char(100) DEFAULT NULL COMMENT 'cargo',
  `cc_usu` int(11) DEFAULT NULL,
  `tel_usu` varchar(50) DEFAULT NULL,
  `dir_usu` varchar(50) DEFAULT NULL,
  `log_usu` varchar(200) DEFAULT NULL,
  `pas_usu` char(200) DEFAULT NULL,
  `pas_usu2` char(200) NOT NULL,
  `ciu_usu` char(11) NOT NULL COMMENT 'codigo de la surcusal',
  `codig_usu` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish2_ci NOT NULL COMMENT 'codigo del usuario',
  `cel_usu` varchar(50) NOT NULL,
  `cod_per_usu` int(11) DEFAULT NULL COMMENT 'codigo del perfil',
  `susu` varchar(200) NOT NULL COMMENT 'campo segurudad usuario',
  `spas` varchar(200) NOT NULL COMMENT 'seguridad password',
  `fec_crea` datetime NOT NULL,
  `fec_modif` datetime NOT NULL,
  `usu_acce` int(11) NOT NULL,
  `reg_eli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin_sitio`
--
ALTER TABLE `admin_sitio`
  ADD PRIMARY KEY (`cod_sit`);

--
-- Indices de la tabla `bases`
--
ALTER TABLE `bases`
  ADD PRIMARY KEY (`cod_bas`);

--
-- Indices de la tabla `borrador`
--
ALTER TABLE `borrador`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`cod_cat`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`cod_mun`);

--
-- Indices de la tabla `c_trabajos`
--
ALTER TABLE `c_trabajos`
  ADD PRIMARY KEY (`cod_tra`);

--
-- Indices de la tabla `entregas`
--
ALTER TABLE `entregas`
  ADD PRIMARY KEY (`cod_en`);

--
-- Indices de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  ADD PRIMARY KEY (`cod_es`);

--
-- Indices de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  ADD PRIMARY KEY (`cod_int`);

--
-- Indices de la tabla `label`
--
ALTER TABLE `label`
  ADD PRIMARY KEY (`id_lab`);

--
-- Indices de la tabla `log_revision_jurados`
--
ALTER TABLE `log_revision_jurados`
  ADD PRIMARY KEY (`cod_lrjur`);

--
-- Indices de la tabla `log_revision_trabajos`
--
ALTER TABLE `log_revision_trabajos`
  ADD PRIMARY KEY (`cod_lrt`);

--
-- Indices de la tabla `medios`
--
ALTER TABLE `medios`
  ADD PRIMARY KEY (`cod_med`);

--
-- Indices de la tabla `medio_categoria`
--
ALTER TABLE `medio_categoria`
  ADD PRIMARY KEY (`cod_mca`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`cod_men`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`cod_mod`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pai`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`cod_para`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`cod_per`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`cod_usu_per`,`cod_int_per`,`con_per`);

--
-- Indices de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  ADD PRIMARY KEY (`cod_pre`);

--
-- Indices de la tabla `publicacion_curador`
--
ALTER TABLE `publicacion_curador`
  ADD PRIMARY KEY (`cod_ajur`);

--
-- Indices de la tabla `registro_usuario`
--
ALTER TABLE `registro_usuario`
  ADD PRIMARY KEY (`cod_reg`);

--
-- Indices de la tabla `rel_trabajos`
--
ALTER TABLE `rel_trabajos`
  ADD PRIMARY KEY (`cod_rel`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`cod_res`);

--
-- Indices de la tabla `revision_jurados`
--
ALTER TABLE `revision_jurados`
  ADD PRIMARY KEY (`cod_rjur`);

--
-- Indices de la tabla `revision_jurados_finales`
--
ALTER TABLE `revision_jurados_finales`
  ADD PRIMARY KEY (`cod_rjur`);

--
-- Indices de la tabla `revision_trabajos`
--
ALTER TABLE `revision_trabajos`
  ADD PRIMARY KEY (`cod_rtrab`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`cod_tra`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin_sitio`
--
ALTER TABLE `admin_sitio`
  MODIFY `cod_sit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bases`
--
ALTER TABLE `bases`
  MODIFY `cod_bas` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo';

--
-- AUTO_INCREMENT de la tabla `borrador`
--
ALTER TABLE `borrador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `cod_cat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `cod_mun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `entregas`
--
ALTER TABLE `entregas`
  MODIFY `cod_en` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especificaciones`
--
ALTER TABLE `especificaciones`
  MODIFY `cod_es` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  MODIFY `cod_int` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `label`
--
ALTER TABLE `label`
  MODIFY `id_lab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_revision_jurados`
--
ALTER TABLE `log_revision_jurados`
  MODIFY `cod_lrjur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `log_revision_trabajos`
--
ALTER TABLE `log_revision_trabajos`
  MODIFY `cod_lrt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medios`
--
ALTER TABLE `medios`
  MODIFY `cod_med` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `medio_categoria`
--
ALTER TABLE `medio_categoria`
  MODIFY `cod_mca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `cod_men` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `cod_mod` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pai` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id del pais';

--
-- AUTO_INCREMENT de la tabla `parametros`
--
ALTER TABLE `parametros`
  MODIFY `cod_para` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `cod_per` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `preguntas`
--
ALTER TABLE `preguntas`
  MODIFY `cod_pre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `publicacion_curador`
--
ALTER TABLE `publicacion_curador`
  MODIFY `cod_ajur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_usuario`
--
ALTER TABLE `registro_usuario`
  MODIFY `cod_reg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rel_trabajos`
--
ALTER TABLE `rel_trabajos`
  MODIFY `cod_rel` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `cod_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revision_jurados`
--
ALTER TABLE `revision_jurados`
  MODIFY `cod_rjur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revision_jurados_finales`
--
ALTER TABLE `revision_jurados_finales`
  MODIFY `cod_rjur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `revision_trabajos`
--
ALTER TABLE `revision_trabajos`
  MODIFY `cod_rtrab` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `cod_tra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
