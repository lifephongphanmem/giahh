

DROP TABLE IF EXISTS `dmloaidat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dmloaidat`(
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `loaidat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
`khuvuc` text COLLATE utf8_unicode_ci,
`vitri` text COLLATE utf8_unicode_ci,
  `sapxep` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


--
-- Table structure for table `hsgiadat`
--

DROP TABLE IF EXISTS `hsgiadat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hsgiadat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tgnhap` date DEFAULT NULL,
`tgapdung` date DEFAULT NULL,
  `nam` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quy` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,  
  `thang` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `trangthai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `phanloai` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `filedk` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
 
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;


DROP TABLE IF EXISTS `giadat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giadat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,


            `khuvuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `vitri1` double DEFAULT NULL,
           `vitri2` double DEFAULT NULL,
            `vitri3` double DEFAULT NULL,
            `vitri4` double DEFAULT NULL,
            `vitri5` double DEFAULT NULL,
              `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,

  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

DROP TABLE IF EXISTS `giadatdefault`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giadatdefault` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mahs` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloaigia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,


            `khuvuc` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
            `vitri1` double DEFAULT NULL,
           `vitri2` double DEFAULT NULL,
            `vitri3` double DEFAULT NULL,
            `vitri4` double DEFAULT NULL,
            `vitri5` double DEFAULT NULL,
              `ghichu` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
`mahuyen` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
