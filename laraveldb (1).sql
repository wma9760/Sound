-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 10:32 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `albumimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `albumimage`, `category`, `recommended`, `trending`, `featured`, `desc`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Sufi', '1651393379.jpg', 'audio', '1', '1', '1', '\"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '1', '2022-04-30 22:22:59', '2022-05-06 15:59:26'),
(2, 'test', '1651919874.png', 'vedio', '1', '1', '1', 'df', '1', '2022-05-07 05:37:54', '2022-05-08 15:33:15');

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE `artists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `artistimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `DOB`, `artistimage`, `recommended`, `trending`, `featured`, `desc`, `status`, `language_id`, `created_at`, `updated_at`) VALUES
(1, 'Abida Parveen', '1954-02-20', '1651163590.jfif', '1', '1', '1', 'Abida Parveen is a Pakistani singer, composer and musician of Sufi music. She is also a painter and entrepreneur. Parveen is one of the highest paid singers in Pakistan. Her singing and music has earned her many accolades, and she has been dubbed as the \'', '1', 1, '2022-04-28 01:33:10', '2022-04-28 01:36:32'),
(2, 'Abrar-ul-Haq', '1988-07-19', '1651163720.jfif', '0', '0', '0', 'Abrar-ul-Haq is a Pakistani politician, philanthropist and singer-songwriter. His debut 1995 album Billo De Ghar sold over 40.3 million albums worldwide, which made him a household name and granted him the title of \"King of Pakistani Pop\".', '1', 1, '2022-04-28 01:35:20', '2022-04-28 01:35:20'),
(3, 'Adnan Sami', '1971-08-15', '1651163849.jfif', '0', '0', '0', 'Adnan Sami Khan is an Indian singer, musician, music composer, and pianist. He performs Indian and Western music, including for Hindi movies. He has been awarded with Padma Shri for his remarkable contribution in music. His most notable instrument is the ', '1', 1, '2022-04-28 01:37:29', '2022-04-28 01:37:29'),
(4, 'Ahmed Jahanzaib', '1978-05-28', '1651163926.jfif', '0', '0', '1', 'Ahmed Jahanzeb Usmani is a Pakistani pop singer and composer. Known also as AJ and Wonderboy as he released his first record at a very young age of 8, he was born in Karachi, Sindh, Pakistan.', '1', 1, '2022-04-28 01:38:46', '2022-04-28 01:38:46'),
(5, 'Aima Baig', '1995-03-10', '1651163999.jfif', '0', '1', '1', 'Aima Baig is a singer. She is known for her brief appearance in Dunya News\' program Mazaaq Raat from 2015 to 2017. She rose to fame from her songs in Lahore Se Aagey, after which she gained popularity through many other soundtracks and her appearance in C', '1', 1, '2022-04-28 01:39:59', '2022-04-28 01:39:59'),
(6, 'Ali Zafar', '1980-05-28', '1651164087.jfif', '1', '1', '1', 'Ali Zafar PP is a Pakistani singer-songwriter, model, actor, producer, screenwriter and painter. Zafar started out on Pakistani television before becoming a popular musician. He later also established a career in Bollywood and his success led many Pakista', '1', 1, '2022-04-28 01:41:27', '2022-04-28 01:41:27'),
(7, 'Arif Lohar', '1966-05-18', '1651164155.jfif', '1', '1', '1', 'Arif Lohar is a Pakistani Punjabi folk singer. He became popular in Pakistan as well as in India after his famous song \"Jugni\" with Nooran Lal in 2006. He usually sings accompanied by a native musical instrument resembling tongs. His folk music is represe', '1', 1, '2022-04-28 01:42:35', '2022-04-28 01:42:35'),
(8, 'Asim Azhar', '1996-10-29', '1651164232.jfif', '1', '0', '0', 'Asim Azhar is a Pakistani singer, songwriter, musician and an actor. He started his career as a singer on YouTube, covering contemporary Western songs before he became a public figure.', '1', 1, '2022-04-28 01:43:52', '2022-04-28 01:43:52'),
(9, 'Atif Aslam', '1983-03-12', '1651164343.jfif', '1', '1', '1', 'Atif Aslam is a playback singer and an actor. His voice reigns in people’s hearts. He is also known for his command in the Vocal Belting technique.', '1', 1, '2022-04-28 01:45:43', '2022-04-28 01:45:43'),
(10, 'Farhan Saeed', '1984-09-14', '1651164416.jfif', '1', '0', '1', 'Farhan Saeed Butt is a Pakistani singer-songwriter, actor, music video director, and entrepreneur. Saeed is the former lead vocalist of the Pakistani band Jal and is the owner of the restaurant Cafe Rock in Lahore. He sings in Urdu as well as in Punjabi.', '1', 1, '2022-04-28 01:46:56', '2022-04-28 01:46:56'),
(11, 'Quratulain Baloch', '1988-03-04', '1651164485.jfif', '1', '1', '1', 'Quratulain Balouch is a Pakistani American singer-songwriter. Also known as QB or the Humsafar Girl, she became popular for her title track Woh Humsafar Tha in Hum TV\'s serial Humsafar.', '1', 1, '2022-04-28 01:48:05', '2022-04-28 01:48:05'),
(12, 'Rahat Fateh Ali Khan', '1974-12-09', '1651164564.jfif', '1', '1', '1', 'Rahat Fateh Ali Khan is a Pakistani musician, primarily of Qawwali, a devotional music of the Muslim Sufis. Khan is one of the biggest and highest paid singers in Pakistan. He is the nephew of Nusrat Fateh Ali Khan, son of Farrukh Fateh Ali Khan and grand', '1', 1, '2022-04-28 01:49:24', '2022-04-28 01:49:24'),
(13, 'Shafqat Amanat Ali', '1965-02-26', '1651164640.jfif', '0', '0', '0', 'Shafqat Amanat Ali Khan PP is a Pakistani pop and classical singer, songwriter, and composer belonging to the Patiala Gharana tradition of music. He was the lead vocalist of the Pakistani pop rock band Fuzön until 2006 and is a prominent playback singer i', '1', 1, '2022-04-28 01:50:40', '2022-04-28 01:50:40'),
(14, 'Umair Jaiswal', '1986-12-20', '1651164818.jfif', '0', '0', '1', 'Umair Jaswal is a Pakistani film, television actor, singer-songwriter and music producer from Islamabad. He was also lead vocalist of the rock band Qayaas. Umair is the brother of singers Yasir Jaswal and Uzair Jaswal.', '0', 1, '2022-04-28 01:53:38', '2022-05-05 10:25:34'),
(15, 'Ellie Goulding', '1986-12-06', 'Artist16511650441303674365.jfif', '1', '1', '1', 'Elena Jane Goulding is an English singer and songwriter. Her career began when she met record producers Starsmith and Frankmusik, and she was later spotted by Jamie Lillywhite, who later became her manager and A&R.', '1', 2, '2022-04-28 01:57:24', '2022-05-05 09:40:25'),
(113, 'Harry styles', '1994-02-01', 'Artist1651391776100977181.jfif', '0', '0', '1', 'Harry Edward Styles is an English singer, songwriter and actor. His musical career began in 2010 as a solo contestant on the British music competition series The X Facto', '1', 2, '2022-04-30 21:56:16', '2022-05-05 09:40:14'),
(114, 'Taylor Swift', '1989-12-13', 'Artist16513919171644441255.jfif', '0', '1', '0', 'Taylor Alison Swift is an American singer-songwriter. Her discography spans multiple genres, and her narrative songwriting—often inspired by her personal life—has received critical praise and widespread media coverage.', '1', 2, '2022-04-30 21:58:37', '2022-05-05 09:40:03'),
(115, 'Justin Bieber', '1994-03-01', 'Artist16517789481438782522.jfif', '1', '0', '1', 'Justin Drew Bieber is a Canadian singer. Often referred to as a pop icon, Bieber is widely recognised for his genre-melding musicianship and has played an influential role in modern-day popular music.', '1', 2, '2022-05-05 09:29:08', '2022-05-05 09:29:08');

-- --------------------------------------------------------

--
-- Table structure for table `audioalbums`
--

CREATE TABLE `audioalbums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `audio_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audioalbums`
--

INSERT INTO `audioalbums` (`id`, `language_id`, `audio_id`, `album_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-04-30 22:23:25', '2022-04-30 22:23:25'),
(2, 1, 6, 1, '2022-04-30 22:23:42', '2022-04-30 22:23:42'),
(3, 1, 4, 1, '2022-04-30 22:26:38', '2022-04-30 22:26:38'),
(4, 2, 9, 1, '2022-05-06 16:27:02', '2022-05-06 16:28:44'),
(5, 1, 1, 1, '2022-05-07 05:43:38', '2022-05-07 05:43:38');

-- --------------------------------------------------------

--
-- Table structure for table `audioes`
--

CREATE TABLE `audioes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `gnere_id` bigint(20) UNSIGNED NOT NULL,
  `audio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `audioimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trending` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `featured` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aproval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audioes`
--

INSERT INTO `audioes` (`id`, `title`, `language_id`, `artist_id`, `gnere_id`, `audio`, `audioimage`, `recommended`, `trending`, `featured`, `desc`, `status`, `created_at`, `updated_at`, `aproval`) VALUES
(1, 'Chaap Tilak', 1, 1, 1, '1651165529.mp3', '1651165529.jfif', '1', '1', '1', 'Penned by the subcontinent’s foremost musical genius Hazrat Amir Khusrau, ‘Chaap Tilak’ is an instantly recognisable qawwali that has been graced by every legendary voice of this region for the past many centuries. Written in braj bhasha, the popular country dialect which was a forerunner of Urdu, its beauty lay in its simplicity. Sung from the perspective of a young girl, it is replete with modest yet enchanting symbols, as it celebrates the splendour of losing oneself in love. Both the use of motifs as well as the language itself were deliberate creative choices by Hazrat Amir Khusrau, as they communicated to the common people using their own ideas and aesthetics. This season’s Coke Studio serves as the host to a resplendent performance of this classic by Pakistan’s greatest living artists, Abida Parveen and Rahat Fateh Ali Khan. The two musical legends have performed this song almost as a story, delivering the verses in an exhilarating back-and-forth style. The song’s composition is deliberately struc', '1', '2022-04-28 02:05:29', '2022-04-28 21:07:30', 1),
(4, 'Item NUmber', 1, 6, 2, 'Audio165123323836674707.mp3', 'Audio1651233238334513043.jfif', '1', '1', '1', 'Item number is a peppy dance number sung by Ali Zafar and Aima Baig for the film Teefa in Trouble. Its a satire on \"item numbers\" in films.', '1', '2022-04-28 20:53:58', '2022-04-28 21:08:15', 1),
(5, 'Chupke Chupke', 1, 6, 2, 'Audio16512345642043483942.mp3', 'Audio1651234564200354928.jfif', '1', '0', '1', 'Chupke Chupke OST Lyrics by Ali Zafar was written by Saima Akram Chaudhry while the Chupke Chupke Drama OST Lyrics video was directed by Danish Nawaz. This Pakistani brand new Drama OST produced by Momina Duraid Productions while labeling by HUM TV.', '1', '2022-04-28 21:16:04', '2022-04-28 21:16:04', 1),
(6, 'Afreen Afreen', 1, 12, 5, 'Audio1651234849526454335.mp3', 'Audio16512348491450752990.jfif', '1', '1', '1', 'Afreen Afreen Lyrics from Coke Studio (2017) sung by Momina Mustehsan, Rahat Fateh Ali Khan. This song is composed by Strings with lyrics penned by Javed ...', '1', '2022-04-28 21:20:49', '2022-05-06 11:59:12', 1),
(7, 'Tere Mst Mast Do Nain', 1, 12, 1, 'Audio165123528150395261.mp3', 'Audio16512352811086199810.jfif', '1', '1', '1', '\"Tere Mast Mast Do Nain\" is a song from the Bollywood film Dabangg starring Salman Khan and Sonakshi Sinha, directed by Abhinav Kashyap.', '1', '2022-04-28 21:28:01', '2022-05-06 05:37:57', 1),
(8, 'Wo Hamsafar Tha OST', 1, 11, 5, 'Audio1651235660586008188.mp3', 'Audio1651235660414264954.jfif', '1', '1', '1', 'Listen to Qurat Ul Ain Balouch OST Wo Humsafar Tha MP3 song. OST Wo Humsafar Tha song from the album Humsafar is released on Sep 2011.', '1', '2022-04-28 21:34:20', '2022-05-06 05:45:10', 1),
(9, 'Love Me Like You Do', 2, 15, 2, 'Audio16518469972352902.mp3', 'Audio1651846997992859790.jfif', '1', '1', '1', '\"Love Me like You Do\" is a song recorded by English singer Ellie Goulding for the soundtrack to the film Fifty Shades of Grey (2015).', '1', '2022-05-06 04:23:17', '2022-05-10 03:29:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `audio_ratings`
--

CREATE TABLE `audio_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `track_id` bigint(20) UNSIGNED NOT NULL,
  `stars_rated` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audio_ratings`
--

INSERT INTO `audio_ratings` (`id`, `user_id`, `track_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 10, 7, 2, '2022-05-09 09:33:53', '2022-05-09 09:33:53'),
(3, 10, 7, 4, '2022-05-09 09:45:11', '2022-05-09 09:45:11'),
(4, 10, 7, 3, '2022-05-09 09:45:33', '2022-05-09 09:45:33'),
(5, 10, 7, 4, '2022-05-09 09:45:46', '2022-05-09 09:45:46'),
(6, 10, 7, 3, '2022-05-09 09:47:06', '2022-05-09 09:47:06'),
(7, 10, 7, 3, '2022-05-09 10:07:42', '2022-05-09 10:07:42'),
(8, 10, 7, 3, '2022-05-09 10:08:06', '2022-05-09 10:08:06'),
(9, 10, 7, 3, '2022-05-09 10:10:14', '2022-05-09 10:10:14'),
(10, 10, 7, 3, '2022-05-09 10:12:21', '2022-05-09 10:12:21'),
(11, 10, 7, 4, '2022-05-09 10:18:57', '2022-05-09 10:18:57'),
(12, 10, 1, 1, '2022-05-09 10:39:45', '2022-05-09 12:57:02'),
(13, 10, 5, 4, '2022-05-09 10:42:15', '2022-05-09 10:42:15'),
(14, 10, 5, 4, '2022-05-09 10:43:12', '2022-05-09 10:43:12'),
(15, 10, 5, 5, '2022-05-09 10:44:06', '2022-05-09 10:44:06'),
(16, 10, 5, 5, '2022-05-09 10:44:27', '2022-05-09 10:44:27'),
(17, 10, 5, 5, '2022-05-09 10:44:28', '2022-05-09 10:44:28'),
(18, 10, 5, 1, '2022-05-09 10:46:50', '2022-05-09 10:46:50'),
(19, 10, 5, 1, '2022-05-09 10:46:50', '2022-05-09 10:46:50'),
(20, 10, 4, 2, '2022-05-09 11:26:38', '2022-05-09 12:57:30');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Afghanistan', 'AF', NULL, NULL),
(2, 'Aland Islands', 'AX', NULL, NULL),
(3, 'Albania', 'AL', NULL, NULL),
(4, 'Algeria', 'DZ', NULL, NULL),
(5, 'American Samoa', 'AS', NULL, NULL),
(6, 'Andorra', 'AD', NULL, NULL),
(7, 'Angola', 'AO', NULL, NULL),
(8, 'Anguilla', 'AI', NULL, NULL),
(9, 'Antarctica', 'AQ', NULL, NULL),
(10, 'Antigua and Barbuda', 'AG', NULL, NULL),
(11, 'Argentina', 'AR', NULL, NULL),
(12, 'Armenia', 'AM', NULL, NULL),
(13, 'Aruba', 'AW', NULL, NULL),
(14, 'Australia', 'AU', NULL, NULL),
(15, 'Austria', 'AT', NULL, NULL),
(16, 'Azerbaijan', 'AZ', NULL, NULL),
(17, 'Bahamas', 'BS', NULL, NULL),
(18, 'Bahrain', 'BH', NULL, NULL),
(19, 'Bangladesh', 'BD', NULL, NULL),
(20, 'Barbados', 'BB', NULL, NULL),
(21, 'Belarus', 'BY', NULL, NULL),
(22, 'Belgium', 'BE', NULL, NULL),
(23, 'Belize', 'BZ', NULL, NULL),
(24, 'Benin', 'BJ', NULL, NULL),
(25, 'Bermuda', 'BM', NULL, NULL),
(26, 'Bhutan', 'BT', NULL, NULL),
(27, 'Bolivia', 'BO', NULL, NULL),
(28, 'Bonaire, Sint Eustatius and Saba', 'BQ', NULL, NULL),
(29, 'Bosnia and Herzegovina', 'BA', NULL, NULL),
(30, 'Botswana', 'BW', NULL, NULL),
(31, 'Bouvet Island', 'BV', NULL, NULL),
(32, 'Brazil', 'BR', NULL, NULL),
(33, 'British Indian Ocean Territory', 'IO', NULL, NULL),
(34, 'Brunei Darussalam', 'BN', NULL, NULL),
(35, 'Bulgaria', 'BG', NULL, NULL),
(36, 'Burkina Faso', 'BF', NULL, NULL),
(37, 'Burundi', 'BI', NULL, NULL),
(38, 'Cambodia', 'KH', NULL, NULL),
(39, 'Cameroon', 'CM', NULL, NULL),
(40, 'Canada', 'CA', NULL, NULL),
(41, 'Cape Verde', 'CV', NULL, NULL),
(42, 'Cayman Islands', 'KY', NULL, NULL),
(43, 'Central African Republic', 'CF', NULL, NULL),
(44, 'Chad', 'TD', NULL, NULL),
(45, 'Chile', 'CL', NULL, NULL),
(46, 'China', 'CN', NULL, NULL),
(47, 'Christmas Island', 'CX', NULL, NULL),
(48, 'Cocos (Keeling) Islands', 'CC', NULL, NULL),
(49, 'Colombia', 'CO', NULL, NULL),
(50, 'Comoros', 'KM', NULL, NULL),
(51, 'Congo', 'CG', NULL, NULL),
(52, 'Congo, Democratic Republic of the Congo', 'CD', NULL, NULL),
(53, 'Cook Islands', 'CK', NULL, NULL),
(54, 'Costa Rica', 'CR', NULL, NULL),
(55, 'Cote D\'Ivoire', 'CI', NULL, NULL),
(56, 'Croatia', 'HR', NULL, NULL),
(57, 'Cuba', 'CU', NULL, NULL),
(58, 'Curacao', 'CW', NULL, NULL),
(59, 'Cyprus', 'CY', NULL, NULL),
(60, 'Czech Republic', 'CZ', NULL, NULL),
(61, 'Denmark', 'DK', NULL, NULL),
(62, 'Djibouti', 'DJ', NULL, NULL),
(63, 'Dominica', 'DM', NULL, NULL),
(64, 'Dominican Republic', 'DO', NULL, NULL),
(65, 'Ecuador', 'EC', NULL, NULL),
(66, 'Egypt', 'EG', NULL, NULL),
(67, 'El Salvador', 'SV', NULL, NULL),
(68, 'Equatorial Guinea', 'GQ', NULL, NULL),
(69, 'Eritrea', 'ER', NULL, NULL),
(70, 'Estonia', 'EE', NULL, NULL),
(71, 'Ethiopia', 'ET', NULL, NULL),
(72, 'Falkland Islands (Malvinas)', 'FK', NULL, NULL),
(73, 'Faroe Islands', 'FO', NULL, NULL),
(74, 'Fiji', 'FJ', NULL, NULL),
(75, 'Finland', 'FI', NULL, NULL),
(76, 'France', 'FR', NULL, NULL),
(77, 'French Guiana', 'GF', NULL, NULL),
(78, 'French Polynesia', 'PF', NULL, NULL),
(79, 'French Southern Territories', 'TF', NULL, NULL),
(80, 'Gabon', 'GA', NULL, NULL),
(81, 'Gambia', 'GM', NULL, NULL),
(82, 'Georgia', 'GE', NULL, NULL),
(83, 'Germany', 'DE', NULL, NULL),
(84, 'Ghana', 'GH', NULL, NULL),
(85, 'Gibraltar', 'GI', NULL, NULL),
(86, 'Greece', 'GR', NULL, NULL),
(87, 'Greenland', 'GL', NULL, NULL),
(88, 'Grenada', 'GD', NULL, NULL),
(89, 'Guadeloupe', 'GP', NULL, NULL),
(90, 'Guam', 'GU', NULL, NULL),
(91, 'Guatemala', 'GT', NULL, NULL),
(92, 'Guernsey', 'GG', NULL, NULL),
(93, 'Guinea', 'GN', NULL, NULL),
(94, 'Guinea-Bissau', 'GW', NULL, NULL),
(95, 'Guyana', 'GY', NULL, NULL),
(96, 'Haiti', 'HT', NULL, NULL),
(97, 'Heard Island and Mcdonald Islands', 'HM', NULL, NULL),
(98, 'Holy See (Vatican City State)', 'VA', NULL, NULL),
(99, 'Honduras', 'HN', NULL, NULL),
(100, 'Hong Kong', 'HK', NULL, NULL),
(101, 'Hungary', 'HU', NULL, NULL),
(102, 'Iceland', 'IS', NULL, NULL),
(103, 'India', 'IN', NULL, NULL),
(104, 'Indonesia', 'ID', NULL, NULL),
(105, 'Iran, Islamic Republic of', 'IR', NULL, NULL),
(106, 'Iraq', 'IQ', NULL, NULL),
(107, 'Ireland', 'IE', NULL, NULL),
(108, 'Isle of Man', 'IM', NULL, NULL),
(109, 'Israel', 'IL', NULL, NULL),
(110, 'Italy', 'IT', NULL, NULL),
(111, 'Jamaica', 'JM', NULL, NULL),
(112, 'Japan', 'JP', NULL, NULL),
(113, 'Jersey', 'JE', NULL, NULL),
(114, 'Jordan', 'JO', NULL, NULL),
(115, 'Kazakhstan', 'KZ', NULL, NULL),
(116, 'Kenya', 'KE', NULL, NULL),
(117, 'Kiribati', 'KI', NULL, NULL),
(118, 'Korea, Democratic People\'s Republic of', 'KP', NULL, NULL),
(119, 'Korea, Republic of', 'KR', NULL, NULL),
(120, 'Kosovo', 'XK', NULL, NULL),
(121, 'Kuwait', 'KW', NULL, NULL),
(122, 'Kyrgyzstan', 'KG', NULL, NULL),
(123, 'Lao People\'s Democratic Republic', 'LA', NULL, NULL),
(124, 'Latvia', 'LV', NULL, NULL),
(125, 'Lebanon', 'LB', NULL, NULL),
(126, 'Lesotho', 'LS', NULL, NULL),
(127, 'Liberia', 'LR', NULL, NULL),
(128, 'Libyan Arab Jamahiriya', 'LY', NULL, NULL),
(129, 'Liechtenstein', 'LI', NULL, NULL),
(130, 'Lithuania', 'LT', NULL, NULL),
(131, 'Luxembourg', 'LU', NULL, NULL),
(132, 'Macao', 'MO', NULL, NULL),
(133, 'Macedonia, the Former Yugoslav Republic of', 'MK', NULL, NULL),
(134, 'Madagascar', 'MG', NULL, NULL),
(135, 'Malawi', 'MW', NULL, NULL),
(136, 'Malaysia', 'MY', NULL, NULL),
(137, 'Maldives', 'MV', NULL, NULL),
(138, 'Mali', 'ML', NULL, NULL),
(139, 'Malta', 'MT', NULL, NULL),
(140, 'Marshall Islands', 'MH', NULL, NULL),
(141, 'Martinique', 'MQ', NULL, NULL),
(142, 'Mauritania', 'MR', NULL, NULL),
(143, 'Mauritius', 'MU', NULL, NULL),
(144, 'Mayotte', 'YT', NULL, NULL),
(145, 'Mexico', 'MX', NULL, NULL),
(146, 'Micronesia, Federated States of', 'FM', NULL, NULL),
(147, 'Moldova, Republic of', 'MD', NULL, NULL),
(148, 'Monaco', 'MC', NULL, NULL),
(149, 'Mongolia', 'MN', NULL, NULL),
(150, 'Montenegro', 'ME', NULL, NULL),
(151, 'Montserrat', 'MS', NULL, NULL),
(152, 'Morocco', 'MA', NULL, NULL),
(153, 'Mozambique', 'MZ', NULL, NULL),
(154, 'Myanmar', 'MM', NULL, NULL),
(155, 'Namibia', 'NA', NULL, NULL),
(156, 'Nauru', 'NR', NULL, NULL),
(157, 'Nepal', 'NP', NULL, NULL),
(158, 'Netherlands', 'NL', NULL, NULL),
(159, 'Netherlands Antilles', 'AN', NULL, NULL),
(160, 'New Caledonia', 'NC', NULL, NULL),
(161, 'New Zealand', 'NZ', NULL, NULL),
(162, 'Nicaragua', 'NI', NULL, NULL),
(163, 'Niger', 'NE', NULL, NULL),
(164, 'Nigeria', 'NG', NULL, NULL),
(165, 'Niue', 'NU', NULL, NULL),
(166, 'Norfolk Island', 'NF', NULL, NULL),
(167, 'Northern Mariana Islands', 'MP', NULL, NULL),
(168, 'Norway', 'NO', NULL, NULL),
(169, 'Oman', 'OM', NULL, NULL),
(170, 'Pakistan', 'PK', NULL, NULL),
(171, 'Palau', 'PW', NULL, NULL),
(172, 'Palestinian Territory, Occupied', 'PS', NULL, NULL),
(173, 'Panama', 'PA', NULL, NULL),
(174, 'Papua New Guinea', 'PG', NULL, NULL),
(175, 'Paraguay', 'PY', NULL, NULL),
(176, 'Peru', 'PE', NULL, NULL),
(177, 'Philippines', 'PH', NULL, NULL),
(178, 'Pitcairn', 'PN', NULL, NULL),
(179, 'Poland', 'PL', NULL, NULL),
(180, 'Portugal', 'PT', NULL, NULL),
(181, 'Puerto Rico', 'PR', NULL, NULL),
(182, 'Qatar', 'QA', NULL, NULL),
(183, 'Reunion', 'RE', NULL, NULL),
(184, 'Romania', 'RO', NULL, NULL),
(185, 'Russian Federation', 'RU', NULL, NULL),
(186, 'Rwanda', 'RW', NULL, NULL),
(187, 'Saint Barthelemy', 'BL', NULL, NULL),
(188, 'Saint Helena', 'SH', NULL, NULL),
(189, 'Saint Kitts and Nevis', 'KN', NULL, NULL),
(190, 'Saint Lucia', 'LC', NULL, NULL),
(191, 'Saint Martin', 'MF', NULL, NULL),
(192, 'Saint Pierre and Miquelon', 'PM', NULL, NULL),
(193, 'Saint Vincent and the Grenadines', 'VC', NULL, NULL),
(194, 'Samoa', 'WS', NULL, NULL),
(195, 'San Marino', 'SM', NULL, NULL),
(196, 'Sao Tome and Principe', 'ST', NULL, NULL),
(197, 'Saudi Arabia', 'SA', NULL, NULL),
(198, 'Senegal', 'SN', NULL, NULL),
(199, 'Serbia', 'RS', NULL, NULL),
(200, 'Serbia and Montenegro', 'CS', NULL, NULL),
(201, 'Seychelles', 'SC', NULL, NULL),
(202, 'Sierra Leone', 'SL', NULL, NULL),
(203, 'Singapore', 'SG', NULL, NULL),
(204, 'Sint Maarten', 'SX', NULL, NULL),
(205, 'Slovakia', 'SK', NULL, NULL),
(206, 'Slovenia', 'SI', NULL, NULL),
(207, 'Solomon Islands', 'SB', NULL, NULL),
(208, 'Somalia', 'SO', NULL, NULL),
(209, 'South Africa', 'ZA', NULL, NULL),
(210, 'South Georgia and the South Sandwich Islands', 'GS', NULL, NULL),
(211, 'South Sudan', 'SS', NULL, NULL),
(212, 'Spain', 'ES', NULL, NULL),
(213, 'Sri Lanka', 'LK', NULL, NULL),
(214, 'Sudan', 'SD', NULL, NULL),
(215, 'Suriname', 'SR', NULL, NULL),
(216, 'Svalbard and Jan Mayen', 'SJ', NULL, NULL),
(217, 'Swaziland', 'SZ', NULL, NULL),
(218, 'Sweden', 'SE', NULL, NULL),
(219, 'Switzerland', 'CH', NULL, NULL),
(220, 'Syrian Arab Republic', 'SY', NULL, NULL),
(221, 'Taiwan, Province of China', 'TW', NULL, NULL),
(222, 'Tajikistan', 'TJ', NULL, NULL),
(223, 'Tanzania, United Republic of', 'TZ', NULL, NULL),
(224, 'Thailand', 'TH', NULL, NULL),
(225, 'Timor-Leste', 'TL', NULL, NULL),
(226, 'Togo', 'TG', NULL, NULL),
(227, 'Tokelau', 'TK', NULL, NULL),
(228, 'Tonga', 'TO', NULL, NULL),
(229, 'Trinidad and Tobago', 'TT', NULL, NULL),
(230, 'Tunisia', 'TN', NULL, NULL),
(231, 'Turkey', 'TR', NULL, NULL),
(232, 'Turkmenistan', 'TM', NULL, NULL),
(233, 'Turks and Caicos Islands', 'TC', NULL, NULL),
(234, 'Tuvalu', 'TV', NULL, NULL),
(235, 'Uganda', 'UG', NULL, NULL),
(236, 'Ukraine', 'UA', NULL, NULL),
(237, 'United Arab Emirates', 'AE', NULL, NULL),
(238, 'United Kingdom', 'GB', NULL, NULL),
(239, 'United States', 'US', NULL, NULL),
(240, 'United States Minor Outlying Islands', 'UM', NULL, NULL),
(241, 'Uruguay', 'UY', NULL, NULL),
(242, 'Uzbekistan', 'UZ', NULL, NULL),
(243, 'Vanuatu', 'VU', NULL, NULL),
(244, 'Venezuela', 'VE', NULL, NULL),
(245, 'Viet Nam', 'VN', NULL, NULL),
(246, 'Virgin Islands, British', 'VG', NULL, NULL),
(247, 'Virgin Islands, U.s.', 'VI', NULL, NULL),
(248, 'Wallis and Futuna', 'WF', NULL, NULL),
(249, 'Western Sahara', 'EH', NULL, NULL),
(250, 'Yemen', 'YE', NULL, NULL),
(251, 'Zambia', 'ZM', NULL, NULL),
(252, 'Zimbabwe', 'ZW', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gneres`
--

CREATE TABLE `gneres` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gneres`
--

INSERT INTO `gneres` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sufi', '2022-04-27 13:18:36', '2022-04-27 13:18:36'),
(2, 'classic pop', '2022-04-27 13:18:51', '2022-04-27 13:18:51'),
(3, 'hip hop', '2022-04-27 13:20:50', '2022-04-27 13:20:50'),
(4, 'Romantic', '2022-04-28 21:22:29', '2022-04-28 21:22:29'),
(5, 'classic', '2022-04-28 21:30:49', '2022-04-28 21:30:49'),
(6, 'Pop', '2022-05-06 06:04:22', '2022-05-06 06:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Urdu', '2022-04-28 02:02:06', '2022-04-28 02:02:06'),
(2, 'English', '2022-04-28 02:02:15', '2022-04-28 02:02:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_04_20_064835_create_users_table', 1),
(4, '2022_05_09_114525_ratings', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sliderimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `sliderimage`, `status`, `created_at`, `updated_at`) VALUES
(6, 'test', 'Slider9996394351651293463.webp', '1', '2022-04-29 13:37:43', '2022-04-29 13:37:51'),
(7, 'test', 'Slider2261194171651293555.webp', '1', '2022-04-29 13:39:15', '2022-04-29 13:39:15'),
(8, 'slider', 'Slider8064490891651293567.webp', '1', '2022-04-29 13:39:27', '2022-04-29 13:39:27'),
(9, 'slider', 'Slider6533431741651293581.webp', '1', '2022-04-29 13:39:41', '2022-04-29 13:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobileNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `mobileNo`, `address`, `country_id`, `email`, `password`, `userimage`, `email_verified_at`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'user', 'female', '031258963', 'sf', 4, 'user@sound.com', '$2y$10$QZvjbdiswyyqvmtLdyE/fu3v2teOofwDKrbR68a.bh2hu9yVq78Ea', '1651051146.jfif', NULL, 0, NULL, '2022-04-26 18:19:06', '2022-04-26 18:19:06'),
(3, 'we', 'female', '03215896258', 'jhgjhgg', 9, 'wet@d.c', '$2y$10$qrdTBe5ofiiASgLDZlbXneNxqaDuBZ2iuyV92fkbloVqsJ33k1Dae', '1651051273.jfif', NULL, 0, NULL, '2022-04-26 18:21:13', '2022-04-26 18:21:13'),
(10, 'admin', 'female', '03125896321', 'Aptech Metro Stargate karachi', 252, 'admin@sound.com', '$2y$10$p4mdCWGbAW5cdkj5y1ZIn.Y0RMaiAsm8Vno1UDtpd6XvddJ1i/VV2', '1651052028.jfif', NULL, 1, NULL, NULL, '2022-04-26 18:33:48'),
(11, 'test', 'male', '66602', 'ere', 8, 'tes@gmail.com', '$2y$10$p4mdCWGbAW5cdkj5y1ZIn.Y0RMaiAsm8Vno1UDtpd6XvddJ1i/VV2', '1651051943.jfif', NULL, 0, NULL, '2022-04-26 18:32:23', '2022-04-26 18:32:23'),
(12, 'test', 'male', '0321654987', 'sfs', 11, 'test@admin.com', '$2y$10$8GZ4DYhlDw1XBUa0eFB2r.HKGDTGfelLqz2NDSGMmWuEx8u5opNK2', '1651054406.jfif', NULL, 1, NULL, '2022-04-26 19:13:26', '2022-04-26 19:13:26'),
(13, 'fa', 'female', '032145698', 'dsfd', 247, 'sdf@dsf.g', '$2y$10$n.6aIl8LU3FuKcER2p5FuOWNGd0w7Ln1oVKdlF8kH4TI7sP758pAe', '1651057127.jfif', NULL, 1, NULL, '2022-04-26 19:58:47', '2022-04-26 20:10:31'),
(14, 'sana', 'female', '032598741', 'karachi', 252, 'user@user.com', '$2y$10$m94v7YZyuPg4BQtDLbV.8.k5N0PL0n4vaW6RyQPo.3ALDiZ20qq9e', '1651852217.jpg', NULL, 0, NULL, '2022-05-06 03:39:50', '2022-05-06 05:50:17'),
(15, 'user', 'female', '0312457892', 'lahore', 170, 'user@123.com', '$2y$10$JEaJsMiZk9eUhefTF3FbkOk6025WnCThMylhGt6n2HhYMxgRcikKG', '1651852203.jpg', NULL, 0, NULL, '2022-05-06 05:50:03', '2022-05-06 05:50:03'),
(16, 'sana', 'female', '03216547789', 'islamabad', 170, 'test@sound.com', '$2y$10$E1hzLUvJtyRNLvF00Y.8ROwY4hHP8C55Jb3rpe5pMap1ibb1u6UOu', '1651953182.jpg', NULL, 0, NULL, '2022-05-07 14:53:02', '2022-05-07 14:53:02');

-- --------------------------------------------------------

--
-- Table structure for table `vedioalbums`
--

CREATE TABLE `vedioalbums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `vedio_id` bigint(20) UNSIGNED NOT NULL,
  `album_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vedioalbums`
--

INSERT INTO `vedioalbums` (`id`, `language_id`, `vedio_id`, `album_id`, `created_at`, `updated_at`) VALUES
(3, 2, 1, 2, '2022-05-07 05:44:12', '2022-05-07 05:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `vedioes`
--

CREATE TABLE `vedioes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language_id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` bigint(20) UNSIGNED NOT NULL,
  `gnere_id` bigint(20) UNSIGNED NOT NULL,
  `vedio` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vedioimage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recommended` tinyint(1) DEFAULT NULL,
  `trending` tinyint(1) DEFAULT NULL,
  `featured` tinyint(1) DEFAULT NULL,
  `desc` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `aproval` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vedioes`
--

INSERT INTO `vedioes` (`id`, `title`, `language_id`, `artist_id`, `gnere_id`, `vedio`, `vedioimage`, `recommended`, `trending`, `featured`, `desc`, `status`, `created_at`, `updated_at`, `aproval`) VALUES
(1, 'test', 1, 1, 1, 'vedio1651866951488099066.mp4', 'vedio1651866951151967423.jpg', 0, 1, 1, 'et', 1, '2022-05-06 14:55:51', '2022-05-08 12:52:56', 1),
(2, 'wteset', 2, 1, 2, 'vedio16518670081564778903.mp4', 'vedio1651867008457311933.webp', 1, 1, 1, '3', 1, '2022-05-06 14:56:48', '2022-05-08 12:52:11', 1),
(3, 'yty', 1, 1, 3, 'vedio16518676891375064456.mp4', 'vedio16518676891211782438.jpg', 1, 1, 1, 'ty', 1, '2022-05-06 15:08:09', '2022-05-08 12:51:21', 1),
(4, 'As It Was', 2, 1, 6, 'vedio16520285081315715027.mp4', 'vedio1652028508948539290.webp', 1, 1, 1, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque', 1, '2022-05-08 11:48:28', '2022-05-08 12:52:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vedio_ratings`
--

CREATE TABLE `vedio_ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `track_id` bigint(20) UNSIGNED NOT NULL,
  `stars_rated` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vedio_ratings`
--

INSERT INTO `vedio_ratings` (`id`, `user_id`, `track_id`, `stars_rated`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 1, '2022-05-09 17:38:14', '2022-05-09 17:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `artists`
--
ALTER TABLE `artists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `artists_language_id_foreign` (`language_id`);

--
-- Indexes for table `audioalbums`
--
ALTER TABLE `audioalbums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audioalbums_language_id_foreign` (`language_id`),
  ADD KEY `audioalbums_audio_id_foreign` (`audio_id`),
  ADD KEY `audioalbums_album_id_foreign` (`album_id`);

--
-- Indexes for table `audioes`
--
ALTER TABLE `audioes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audioes_language_id_foreign` (`language_id`),
  ADD KEY `audioes_artist_id_foreign` (`artist_id`),
  ADD KEY `audioes_gnere_id_foreign` (`gnere_id`);

--
-- Indexes for table `audio_ratings`
--
ALTER TABLE `audio_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audio_ratings_user_id_foreign` (`user_id`),
  ADD KEY `audio_ratings_track_id_foreign` (`track_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gneres`
--
ALTER TABLE `gneres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_country_id_foreign` (`country_id`);

--
-- Indexes for table `vedioalbums`
--
ALTER TABLE `vedioalbums`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vedioalbums_language_id_foreign` (`language_id`),
  ADD KEY `vedioalbums_vedio_id_foreign` (`vedio_id`),
  ADD KEY `vedioalbums_album_id_foreign` (`album_id`);

--
-- Indexes for table `vedioes`
--
ALTER TABLE `vedioes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vedioes_language_id_foreign` (`language_id`),
  ADD KEY `vedioes_artist_id_foreign` (`artist_id`),
  ADD KEY `vedioes_gnere_id_foreign` (`gnere_id`);

--
-- Indexes for table `vedio_ratings`
--
ALTER TABLE `vedio_ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vedio_ratings_user_id_foreign` (`user_id`),
  ADD KEY `vedio_ratings_track_id_foreign` (`track_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `albums`
--
ALTER TABLE `albums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `artists`
--
ALTER TABLE `artists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `audioalbums`
--
ALTER TABLE `audioalbums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `audioes`
--
ALTER TABLE `audioes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `audio_ratings`
--
ALTER TABLE `audio_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=253;

--
-- AUTO_INCREMENT for table `gneres`
--
ALTER TABLE `gneres`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `vedioalbums`
--
ALTER TABLE `vedioalbums`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vedioes`
--
ALTER TABLE `vedioes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vedio_ratings`
--
ALTER TABLE `vedio_ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `artists`
--
ALTER TABLE `artists`
  ADD CONSTRAINT `artists_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `audioalbums`
--
ALTER TABLE `audioalbums`
  ADD CONSTRAINT `audioalbums_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `audioalbums_audio_id_foreign` FOREIGN KEY (`audio_id`) REFERENCES `audioes` (`id`),
  ADD CONSTRAINT `audioalbums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `audioes`
--
ALTER TABLE `audioes`
  ADD CONSTRAINT `audioes_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `audioes_gnere_id_foreign` FOREIGN KEY (`gnere_id`) REFERENCES `gneres` (`id`),
  ADD CONSTRAINT `audioes_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `audio_ratings`
--
ALTER TABLE `audio_ratings`
  ADD CONSTRAINT `audio_ratings_track_id_foreign` FOREIGN KEY (`track_id`) REFERENCES `audioes` (`id`),
  ADD CONSTRAINT `audio_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`);

--
-- Constraints for table `vedioalbums`
--
ALTER TABLE `vedioalbums`
  ADD CONSTRAINT `vedioalbums_album_id_foreign` FOREIGN KEY (`album_id`) REFERENCES `albums` (`id`),
  ADD CONSTRAINT `vedioalbums_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  ADD CONSTRAINT `vedioalbums_vedio_id_foreign` FOREIGN KEY (`vedio_id`) REFERENCES `audioes` (`id`);

--
-- Constraints for table `vedioes`
--
ALTER TABLE `vedioes`
  ADD CONSTRAINT `vedioes_artist_id_foreign` FOREIGN KEY (`artist_id`) REFERENCES `artists` (`id`),
  ADD CONSTRAINT `vedioes_gnere_id_foreign` FOREIGN KEY (`gnere_id`) REFERENCES `gneres` (`id`),
  ADD CONSTRAINT `vedioes_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`);

--
-- Constraints for table `vedio_ratings`
--
ALTER TABLE `vedio_ratings`
  ADD CONSTRAINT `vedio_ratings_track_id_foreign` FOREIGN KEY (`track_id`) REFERENCES `vedioes` (`id`),
  ADD CONSTRAINT `vedio_ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
