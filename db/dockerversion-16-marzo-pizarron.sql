-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: database:3306
-- Tiempo de generación: 16-03-2024 a las 23:18:06
-- Versión del servidor: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Versión de PHP: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `docker`
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
  `cliente_aud` text NOT NULL COMMENT 'auditoria del cliente',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `casos`
--

CREATE TABLE `casos` (
  `cod_sca` int(11) NOT NULL,
  `cod_cap_sca` int(11) DEFAULT NULL COMMENT 'codigo capitulo',
  `con_sca` text DEFAULT NULL COMMENT 'conceptos',
  `pal_sca` text DEFAULT NULL COMMENT 'lsita de palabras',
  `hec_sca` text DEFAULT NULL COMMENT 'hechos',
  `pre_sca` text NOT NULL COMMENT 'preguntas ',
  `tit_sca` varchar(250) DEFAULT NULL COMMENT 'titulo',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conyugue`
--

CREATE TABLE `conyugue` (
  `cod_coy` int(11) NOT NULL,
  `nom_coy` varchar(250) NOT NULL,
  `ape_coy` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `cod_dep` int(11) NOT NULL,
  `nom_dep` varchar(200) NOT NULL,
  `cod_ind_dep` int(11) NOT NULL COMMENT 'indicativo departamente',
  `cod_pais_dep` int(11) NOT NULL COMMENT 'codigo del pais',
  `cod_per_dep` int(11) NOT NULL COMMENT 'Codigo del departamento permitido',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_empresa_persona`
--

CREATE TABLE `d_empresa_persona` (
  `cod_dep` int(11) NOT NULL,
  `cod_per_dpe` int(11) DEFAULT NULL COMMENT 'codigo de la persona',
  `cod_emp` int(11) NOT NULL COMMENT 'codigo de la empresa',
  `dep_dep` text NOT NULL COMMENT 'departamento ',
  `car_dpe` text NOT NULL COMMENT 'cargo',
  `mail_dpe` varchar(250) NOT NULL COMMENT 'mail de la empresa',
  `tel_dpe` varchar(250) NOT NULL COMMENT 'telefonos empresa',
  `dir_dpe` varchar(250) NOT NULL COMMENT 'Dirección',
  `cod_suc` int(11) NOT NULL COMMENT 'Columna sucursal',
  `pri_dpe` int(11) NOT NULL COMMENT 'verifica si la empresa es la principal ',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_evento_persona`
--

CREATE TABLE `d_evento_persona` (
  `cod_devp` int(11) NOT NULL,
  `cod_eve_devp` int(11) DEFAULT NULL COMMENT 'codigo del evento\n',
  `cod_per_devp` int(11) DEFAULT NULL COMMENT 'codigo persona\n',
  `pro_devp` int(11) DEFAULT NULL COMMENT 'aplica protocolo\n',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_eve_per`
--

CREATE TABLE `d_eve_per` (
  `cod_dev` int(11) NOT NULL,
  `cod_eve_dev` int(11) DEFAULT NULL COMMENT 'codigo del evento\n\n',
  `cod_per_dev` varchar(45) DEFAULT NULL COMMENT 'codigo persona\n',
  `personas_cod_per` int(11) NOT NULL,
  `fec_crea` datetime NOT NULL,
  `fec_modif` datetime NOT NULL,
  `usu_acce` int(11) NOT NULL,
  `reg_eli` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `d_segmento_persona`
--

CREATE TABLE `d_segmento_persona` (
  `cod_dse` int(11) NOT NULL,
  `cod_seg_dse` int(11) DEFAULT NULL COMMENT 'codigo del segmento\n',
  `cod_per_dse` int(11) DEFAULT NULL COMMENT 'codigo persona\n',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresas`
--

CREATE TABLE `empresas` (
  `cod_emp` int(11) NOT NULL,
  `nom_emp` varchar(255) DEFAULT NULL COMMENT 'nombre empresa\n',
  `dir_emp` varchar(255) DEFAULT NULL COMMENT 'direccion',
  `mai_emp` varchar(255) DEFAULT NULL COMMENT 'mail de la empresa',
  `cod_dep_emp` int(11) DEFAULT NULL COMMENT 'Codigo de departamento',
  `cod_ciu_emp` int(11) DEFAULT NULL COMMENT 'codigo de la ciudad',
  `tel_emp` varchar(45) DEFAULT NULL COMMENT 'telefonos',
  `web_emp` varchar(255) DEFAULT NULL COMMENT 'sitio web',
  `cod_sec_emp` int(11) DEFAULT NULL COMMENT 'codigo de sector\n',
  `obs_emp` longtext DEFAULT NULL COMMENT 'observaciones',
  `cod_pad_emp` int(11) DEFAULT NULL COMMENT 'código padre',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `cod_env` int(11) NOT NULL,
  `nom_env` varchar(100) DEFAULT NULL,
  `des_env` text DEFAULT NULL,
  `img_env` varchar(250) DEFAULT NULL,
  `sta_env` int(11) NOT NULL DEFAULT 0 COMMENT 'estado del envio 0 no enviado - 1 procesp - 2 terminado',
  `cod_eve_env` int(11) NOT NULL COMMENT 'codigo del  evento',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `cod_eve` int(11) NOT NULL,
  `nom_eve` varchar(250) NOT NULL COMMENT 'nombre del evento',
  `tip_eve_eve` int(11) DEFAULT NULL COMMENT 'tipo de evento',
  `pro_eve` int(11) DEFAULT NULL COMMENT 'maneja protocolo',
  `com_eve` longtext DEFAULT NULL COMMENT 'observaciones del evento',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `info_whatsapp`
--

CREATE TABLE `info_whatsapp` (
  `cod_inw` int(11) NOT NULL,
  `cod_env_inw` int(11) NOT NULL COMMENT 'codigo del envio',
  `cod_per_inw` int(11) NOT NULL COMMENT 'odigo de la persona',
  `sta_inw` text NOT NULL COMMENT 'respuesta del envio'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
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
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `cod_per` int(11) NOT NULL,
  `cod_tit_per` int(11) DEFAULT NULL COMMENT 'codigo del titulo',
  `nom_per` varchar(255) DEFAULT NULL COMMENT 'nombres',
  `ape_per` varchar(255) DEFAULT NULL COMMENT 'apellidos',
  `cod_gen_per` int(11) DEFAULT NULL COMMENT 'codigo del genero',
  `pro_per` varchar(255) DEFAULT NULL COMMENT 'profesion',
  `cod_civ_per` int(11) DEFAULT NULL COMMENT 'codigo estado civil',
  `mai_per` varchar(255) DEFAULT NULL COMMENT 'mail ',
  `coy_per` int(11) DEFAULT 0 COMMENT 'codigo del cotanto principal si es conyegue',
  `cod_emp_per` int(11) DEFAULT NULL COMMENT 'codigo de la empresa',
  `dsc_per` varchar(255) DEFAULT NULL COMMENT 'departamento o seccion',
  `car_per` varchar(255) DEFAULT NULL COMMENT 'cargo',
  `tof_per` varchar(45) DEFAULT NULL COMMENT 'telefono corporativo\n',
  `obs_per` longtext DEFAULT NULL COMMENT 'observaciones\n',
  `twt_per` varchar(250) DEFAULT NULL COMMENT 'twitter',
  `cel_per` varchar(250) DEFAULT NULL COMMENT 'celular',
  `cod_dep_per` int(11) DEFAULT NULL COMMENT 'departamento persona',
  `cod_cui_per` int(11) DEFAULT NULL COMMENT 'codigo de la ciudad',
  `dir_per` text DEFAULT NULL COMMENT 'direccion de personas ',
  `sec_per` int(11) DEFAULT NULL COMMENT 'codigo del sector',
  `temp_per` int(11) DEFAULT NULL COMMENT 'estado del registro temporal',
  `codigo_temporal` int(11) DEFAULT NULL,
  `dir_corr_per` text DEFAULT NULL COMMENT 'Direccion de correspondencia',
  `tipo_dir_per` int(11) DEFAULT NULL COMMENT 'tipo de direccion - parametros',
  `cod_dir_per` int(11) DEFAULT NULL COMMENT 'código de direccion',
  `cod_suc_per` int(11) DEFAULT NULL COMMENT 'Código de sucursal para dir de corresp',
  `asis_per` int(11) DEFAULT 0 COMMENT 'identifica asistente',
  `est_coy_per` int(11) DEFAULT 0 COMMENT 'Es estado de  conyugue',
  `reg_per` int(11) DEFAULT 2,
  `hab_per` text DEFAULT NULL COMMENT 'Habeas data',
  `sin_dirc_per` int(11) DEFAULT NULL COMMENT 'Sin direccion de correspondencia',
  `wha_per` varchar(50) DEFAULT NULL COMMENT 'whatsapp',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas1`
--

CREATE TABLE `personas1` (
  `cod_per` int(11) NOT NULL,
  `cod_tit_per` int(11) DEFAULT NULL COMMENT 'codigo del titulo',
  `nom_per` varchar(255) DEFAULT NULL COMMENT 'nombres',
  `ape_per` varchar(255) DEFAULT NULL COMMENT 'apellidos',
  `cod_gen_per` int(11) DEFAULT NULL COMMENT 'codigo del genero',
  `pro_per` varchar(255) DEFAULT NULL COMMENT 'profesion',
  `cod_civ_per` int(11) DEFAULT NULL COMMENT 'codigo estado civil',
  `mai_per` varchar(255) DEFAULT NULL COMMENT 'mail ',
  `coy_per` int(11) DEFAULT NULL COMMENT 'codigo del cotanto principal si es conyegue\n',
  `cod_emp_per` int(11) DEFAULT NULL COMMENT 'codigo de la empresa',
  `dsc_per` varchar(255) DEFAULT NULL COMMENT 'departamento o seccion',
  `car_per` varchar(255) DEFAULT NULL COMMENT 'cargo',
  `tof_per` varchar(45) DEFAULT NULL COMMENT 'telefono corporativo\n',
  `obs_per` longtext DEFAULT NULL COMMENT 'observaciones\n',
  `twt_per` varchar(250) NOT NULL COMMENT 'twitter',
  `cel_per` varchar(250) NOT NULL COMMENT 'celular',
  `cod_dep_per` int(11) NOT NULL COMMENT 'departamento persona',
  `cod_cui_per` int(11) NOT NULL COMMENT 'codigo de la ciudad',
  `dir_per` text NOT NULL COMMENT 'direccion de personas ',
  `sec_per` int(11) NOT NULL COMMENT 'codigo del sector',
  `temp_per` int(11) NOT NULL COMMENT 'estado del registro temporal',
  `codigo_temporal` int(11) NOT NULL,
  `dir_corr_per` text NOT NULL COMMENT 'Direccion de correspondencia',
  `tipo_dir_per` int(11) NOT NULL COMMENT 'tipo de direccion - parametros',
  `cod_dir_per` int(11) NOT NULL COMMENT 'código de direccion',
  `cod_suc_per` int(11) NOT NULL COMMENT 'Código de sucursal para dir de corresp',
  `asis_per` int(11) NOT NULL DEFAULT 0 COMMENT 'identifica asistente',
  `est_coy_per` int(11) NOT NULL DEFAULT 0 COMMENT 'Es estado de  conyugue',
  `reg_per` int(11) NOT NULL DEFAULT 2,
  `hab_per` text NOT NULL COMMENT 'Habeas data',
  `sin_dirc_per` int(11) NOT NULL COMMENT 'Sin direccion de correspondencia',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `cod_sec` int(11) NOT NULL,
  `nom_sec` varchar(250) NOT NULL COMMENT 'nombre segemento de las personas',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segmento`
--

CREATE TABLE `segmento` (
  `cod_seg` int(11) NOT NULL,
  `nom_seg` varchar(250) NOT NULL COMMENT 'nombre segemento de las personas',
  `fec_crea` datetime DEFAULT NULL,
  `fec_modif` datetime DEFAULT NULL,
  `usu_acce` int(11) DEFAULT NULL,
  `reg_eli` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporal100`
--

CREATE TABLE `temporal100` (
  `codigo` int(11) NOT NULL,
  `id_persona` text DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `codigo_titulo` int(11) NOT NULL,
  `primer_nombre` text DEFAULT NULL,
  `segundo_nombre` text DEFAULT NULL,
  `primer_apellido` text DEFAULT NULL,
  `segundo_apellido` text DEFAULT NULL,
  `ciudad` text DEFAULT NULL,
  `codigo_ciudad` int(11) NOT NULL,
  `direccion_residencia` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `celular` text DEFAULT NULL,
  `e_mail` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `sitio_de_orrespondencia` text DEFAULT NULL,
  `sexo` text DEFAULT NULL,
  `codigo_genero` int(11) NOT NULL,
  `profesion` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `codigo_sector` int(11) NOT NULL,
  `estado_civil` text DEFAULT NULL,
  `codigo_estado_civil` int(11) NOT NULL,
  `nombre_conyuge` text DEFAULT NULL,
  `celular_conyuge` text DEFAULT NULL,
  `correo_conyuge` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL,
  `empresa_1` text DEFAULT NULL,
  `cargo_1` text DEFAULT NULL,
  `dir_empresa1` text DEFAULT NULL,
  `tel_empresa1` text DEFAULT NULL,
  `empresa_2` text DEFAULT NULL,
  `cargo_2` text DEFAULT NULL,
  `dir_empresa2` text DEFAULT NULL,
  `ceremonia` text DEFAULT NULL,
  `protocolo_ceremonia` text DEFAULT NULL,
  `lanzamiento_libro_de_arte` text DEFAULT NULL,
  `protocololanzamiento_libro_de_arte` text DEFAULT NULL,
  `libro_de_arte` text DEFAULT NULL,
  `protocolo_libro_de_arte` text DEFAULT NULL,
  `regalo_libro_especial` text DEFAULT NULL,
  `bases` text DEFAULT NULL,
  `revista` text DEFAULT NULL,
  `procesado` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod_usu` int(11) NOT NULL,
  `nom_usu` char(200) DEFAULT NULL,
  `nombre_usu` varchar(250) NOT NULL COMMENT 'Nombre de usuario',
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
  `reg_eli` int(11) NOT NULL,
  `token_usu` varchar(50) DEFAULT NULL COMMENT 'token',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
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
-- Indices de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  ADD PRIMARY KEY (`cod_aud`);

--
-- Indices de la tabla `casos`
--
ALTER TABLE `casos`
  ADD PRIMARY KEY (`cod_sca`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`cod_mun`);

--
-- Indices de la tabla `conyugue`
--
ALTER TABLE `conyugue`
  ADD PRIMARY KEY (`cod_coy`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`cod_dep`);

--
-- Indices de la tabla `d_empresa_persona`
--
ALTER TABLE `d_empresa_persona`
  ADD PRIMARY KEY (`cod_dep`),
  ADD KEY `cod_emp` (`cod_emp`),
  ADD KEY `cod_per_dpe` (`cod_per_dpe`);

--
-- Indices de la tabla `d_evento_persona`
--
ALTER TABLE `d_evento_persona`
  ADD PRIMARY KEY (`cod_devp`);

--
-- Indices de la tabla `d_eve_per`
--
ALTER TABLE `d_eve_per`
  ADD PRIMARY KEY (`cod_dev`);

--
-- Indices de la tabla `d_segmento_persona`
--
ALTER TABLE `d_segmento_persona`
  ADD PRIMARY KEY (`cod_dse`);

--
-- Indices de la tabla `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`cod_emp`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`cod_env`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`cod_eve`);

--
-- Indices de la tabla `info_whatsapp`
--
ALTER TABLE `info_whatsapp`
  ADD PRIMARY KEY (`cod_inw`);

--
-- Indices de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  ADD PRIMARY KEY (`cod_int`);

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
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`cod_per`),
  ADD KEY `reg_eli` (`reg_eli`),
  ADD KEY `temp_per` (`temp_per`);

--
-- Indices de la tabla `personas1`
--
ALTER TABLE `personas1`
  ADD PRIMARY KEY (`cod_per`),
  ADD KEY `reg_eli` (`reg_eli`),
  ADD KEY `temp_per` (`temp_per`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`cod_sec`);

--
-- Indices de la tabla `segmento`
--
ALTER TABLE `segmento`
  ADD PRIMARY KEY (`cod_seg`);

--
-- Indices de la tabla `temporal100`
--
ALTER TABLE `temporal100`
  ADD PRIMARY KEY (`codigo`);

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
-- AUTO_INCREMENT de la tabla `auditoria`
--
ALTER TABLE `auditoria`
  MODIFY `cod_aud` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `casos`
--
ALTER TABLE `casos`
  MODIFY `cod_sca` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `cod_mun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `conyugue`
--
ALTER TABLE `conyugue`
  MODIFY `cod_coy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `cod_dep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `d_empresa_persona`
--
ALTER TABLE `d_empresa_persona`
  MODIFY `cod_dep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `d_evento_persona`
--
ALTER TABLE `d_evento_persona`
  MODIFY `cod_devp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `d_eve_per`
--
ALTER TABLE `d_eve_per`
  MODIFY `cod_dev` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `d_segmento_persona`
--
ALTER TABLE `d_segmento_persona`
  MODIFY `cod_dse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empresas`
--
ALTER TABLE `empresas`
  MODIFY `cod_emp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `cod_env` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `cod_eve` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `info_whatsapp`
--
ALTER TABLE `info_whatsapp`
  MODIFY `cod_inw` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `interfaz`
--
ALTER TABLE `interfaz`
  MODIFY `cod_int` int(11) NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `cod_per` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personas1`
--
ALTER TABLE `personas1`
  MODIFY `cod_per` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `cod_sec` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `segmento`
--
ALTER TABLE `segmento`
  MODIFY `cod_seg` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `temporal100`
--
ALTER TABLE `temporal100`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod_usu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
