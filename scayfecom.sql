-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2023 at 08:30 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scayfecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Computers', 'computers', 'computer-7.jpg', '2023-03-15 13:43:24', '2023-03-15 13:43:24'),
(2, 'Watches', 'watches', 'watch-5.jpg', '2023-03-15 13:43:25', '2023-03-15 13:43:25'),
(3, 'Phones', 'phones', 'phone-1.jpg', '2023-03-15 13:43:25', '2023-03-15 13:43:25'),
(4, 'Mouses', 'mouses', 'mouse-10.jpg', '2023-03-15 13:43:25', '2023-03-15 13:43:25'),
(5, 'Keyboards', 'keyboards', 'keyboard-7.jpg', '2023-03-15 13:43:25', '2023-03-15 13:43:25');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2014_10_12_000000_create_users_table', 2),
(6, '2014_10_12_100000_create_password_resets_table', 3),
(7, '2023_03_15_023005_create_categories_table', 3),
(8, '2023_03_15_023006_create_sub_categories_table', 3),
(9, '2023_03_15_023007_create_products_table', 3),
(12, '2023_03_21_002738_create_shoppings_table', 4),
(13, '2023_03_25_220628_create_orders_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 is available 0 is not available',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `description`, `price`, `quantity`, `status`, `image`, `sub_category_id`, `created_at`, `updated_at`) VALUES
(2, 'consequuntur nulla dignissimos non distinctio pariatur', 'consequuntur-nulla-dignissimos-non-distinctio-pariatur', 'Quia sit autem possimus. Nesciunt aperiam quibusdam quos et voluptatibus. Aut excepturi ipsa corporis repellendus provident. Sit eveniet iusto expedita rerum nobis. Est quaerat voluptate reiciendis minus voluptatum consequatur harum modi. Dolores rerum doloribus magni inventore distinctio laudantium. Corrupti esse excepturi facilis fuga non aut. Quia aut repudiandae quis.', '67.00', 35.00, 0, 'computer-10.jpg', 3, '2023-03-15 13:54:20', '2023-03-15 13:54:20'),
(3, 'nulla totam ab autem molestias sunt', 'nulla-totam-ab-autem-molestias-sunt', 'Occaecati et blanditiis unde voluptas assumenda quo. Est omnis voluptate qui suscipit rem. Sed tenetur dolor ex numquam quas repellat. Facilis quasi similique optio dolor est voluptates explicabo. Est voluptatem suscipit ad et sed nihil dicta. Veniam et amet aut commodi a optio. Mollitia est ut minus at nihil et eos. Sed vitae quia maiores asperiores quas nostrum.', '46.00', 14.00, 1, 'computer-6.jpg', 1, '2023-03-15 13:54:20', '2023-03-15 13:54:20'),
(4, 'commodi dignissimos aliquam facere autem modi', 'commodi-dignissimos-aliquam-facere-autem-modi', 'Quia nisi corporis illo non et. Suscipit rerum tenetur aut voluptatum atque vel. Eius aut ipsum necessitatibus libero sit et. Et beatae omnis consequatur et. Voluptatem corrupti rerum corrupti dolor. Voluptatem magni qui veritatis et est iste modi velit. Omnis repellat qui sit aut fugit nemo. Quis id dicta omnis soluta sit blanditiis. Qui numquam vitae est. Esse ut eum illo aut corrupti magni.', '343.00', 43.00, 1, 'computer-9.jpg', 1, '2023-03-15 13:54:20', '2023-03-15 13:54:20'),
(5, 'earum ea debitis animi porro animi', 'earum-ea-debitis-animi-porro-animi', 'Repellendus dolor omnis veniam quia alias aliquam iste. Enim doloremque et quis labore ipsam. Commodi quis odit nihil. Voluptatem rerum quia et consequuntur. Nisi est dolor et delectus dolore officiis totam. Libero nemo dolor magni possimus. Cum doloremque voluptatem praesentium et voluptate debitis. Dolorem assumenda id ullam fugiat. Accusantium maxime amet sapiente.', '314.00', 44.00, 1, 'computer-5.jpg', 1, '2023-03-15 13:54:20', '2023-03-15 13:54:20'),
(6, 'ab nesciunt corrupti officia consequatur temporibus', 'ab-nesciunt-corrupti-officia-consequatur-temporibus', 'Quibusdam sit illo soluta. Et repellat quibusdam a rem facere voluptatem dignissimos. Rerum delectus natus possimus impedit fugit suscipit. Incidunt id excepturi suscipit neque odio perspiciatis. Non placeat rem deleniti. Praesentium sit vel qui provident et. Et velit delectus soluta hic explicabo. Nesciunt iste repellendus qui voluptatem ducimus. Possimus accusantium eius nemo est quia cupiditate optio. Quia corporis a vero dolores omnis et.', '67.00', 12.00, 0, 'computer-4.jpg', 1, '2023-03-15 13:54:20', '2023-03-15 13:54:20'),
(7, 'illo hic amet et labore velit', 'illo-hic-amet-et-labore-velit', 'Eos sint hic magni ipsa illum eligendi esse est. Harum explicabo omnis ut at. Molestiae reiciendis aliquam occaecati nihil id aut in. Saepe omnis molestiae illum ut et quisquam. Omnis libero natus labore reiciendis. Alias a soluta nisi vel. Et cupiditate et non perferendis cupiditate ex. Vel tenetur unde quia aut. Recusandae animi quasi qui saepe voluptas. Sit rerum iste officiis laborum. Amet voluptatum et dicta molestiae quo ut. Saepe id assumenda qui nisi.', '171.00', 16.00, 0, 'computer-6.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(8, 'minima ipsa laboriosam hic error dolor', 'minima-ipsa-laboriosam-hic-error-dolor', 'Earum modi corrupti omnis qui rerum ipsam molestiae. Blanditiis sint dolores praesentium est accusantium quaerat. Repudiandae quidem nisi repudiandae et sed. Et eius quia dolorem non sunt. Maiores nobis voluptas cupiditate et et. Velit nemo quos iste debitis. Laborum nemo autem assumenda sequi.', '183.00', 38.00, 0, 'computer-8.jpg', 1, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(9, 'velit et quis aut commodi laborum', 'velit-et-quis-aut-commodi-laborum', 'Dolorem aspernatur consectetur autem pariatur. Impedit maiores rem similique. Velit id est qui saepe quaerat. Non id cumque sunt. Debitis rerum nesciunt odio omnis ea sit consequatur tempore. Cum et qui iste quos corrupti distinctio consequatur. Assumenda provident porro qui tempora aspernatur laborum. Beatae amet voluptas debitis. Velit voluptatem quia voluptas velit rerum animi fuga. Facere amet et maxime iure voluptas sequi et aut. Et ut ut sit ullam.', '212.00', 12.00, 1, 'computer-5.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(10, 'minima qui earum rerum animi molestiae', 'minima-qui-earum-rerum-animi-molestiae', 'Qui autem occaecati aut. Recusandae omnis ratione repudiandae. Totam deleniti voluptate et. Repudiandae saepe hic aliquid tempora quas. Enim ipsam error et quaerat. Consequatur in ipsam nulla necessitatibus. Expedita doloribus vero autem veritatis dolor. Voluptate iste ipsum ipsum tempora. Dolores temporibus animi perspiciatis sit at ea.', '462.00', 13.00, 1, 'computer-8.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(11, 'nisi est aliquid voluptatem voluptatem est', 'nisi-est-aliquid-voluptatem-voluptatem-est', 'Aliquid molestias nihil dolore optio quia. Sed tempora mollitia iste. Qui quod non veniam reprehenderit. Cum est in harum eos. Omnis consequatur ut voluptates culpa. Veniam reprehenderit et quod doloremque vero. Non voluptas ut rem iste temporibus. Perferendis ut sunt illo quasi nostrum. Ut delectus vitae cupiditate deserunt. Omnis officiis nisi eveniet voluptas. Sed ipsa ea atque numquam officiis esse et.', '387.00', 50.00, 1, 'computer-7.jpg', 1, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(12, 'itaque qui voluptas nisi enim sapiente', 'itaque-qui-voluptas-nisi-enim-sapiente', 'Commodi voluptas enim ea. Dolor quia minima nisi. Vel repellat est sit. Culpa nihil pariatur qui amet. Dolorum perferendis optio architecto qui. Quaerat sunt architecto nobis pariatur. Rerum qui optio at enim reprehenderit quia voluptatibus maiores. Beatae est accusantium iste ut nulla esse quaerat deleniti. Ut ut sapiente enim id. Sint asperiores quasi sint vel voluptatem necessitatibus delectus inventore. Voluptatum cum non molestiae possimus.', '452.00', 47.00, 0, 'computer-2.jpg', 1, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(13, 'a officia ipsum cupiditate omnis pariatur', 'a-officia-ipsum-cupiditate-omnis-pariatur', 'Aut doloribus voluptas ut voluptas rerum facilis ipsa enim. Laborum sit voluptatum dolores asperiores debitis. Assumenda assumenda molestias velit et sint sit esse. Enim quo voluptatum laborum. Dolores soluta dolores vel aut. Animi dicta rerum omnis voluptatem laudantium maiores sit. Cum aut voluptatem qui et dicta esse. Quas sint ipsam est unde quo rem. Deleniti vitae omnis quos provident et. Ut sed in qui.', '233.00', 50.00, 0, 'computer-3.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(14, 'autem repellendus enim est quae sit', 'autem-repellendus-enim-est-quae-sit', 'Ex dolore et nisi rem quia et exercitationem. Nam enim laboriosam ut alias ab natus. Quis rerum aut at quas est odit alias. Earum iste at nobis amet ut ipsum. Et a magni quia temporibus commodi temporibus tempore. Amet tempore illo odit soluta ut et doloribus occaecati. Est occaecati tempore sed dolor et ea quia. Cupiditate neque vitae recusandae cumque.', '488.00', 33.00, 0, 'computer-4.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(15, 'architecto non sapiente qui ratione voluptas', 'architecto-non-sapiente-qui-ratione-voluptas', 'Mollitia qui voluptas pariatur in animi excepturi tempore. Enim eligendi doloremque doloribus voluptas ut qui eum. Dicta et suscipit delectus dolore voluptates tenetur. Praesentium et sapiente tempore officia. At exercitationem occaecati at voluptatem nulla ratione ea. Earum voluptatibus delectus quia vero est amet vel. Excepturi modi tenetur corporis debitis natus.', '82.00', 48.00, 1, 'computer-1.jpg', 1, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(16, 'voluptatem a quo voluptatem cumque alias', 'voluptatem-a-quo-voluptatem-cumque-alias', 'Ipsam quis doloribus ducimus cumque. Vero illum velit incidunt dolores. Et aut at nobis ipsum voluptatem sit dolorum. Facere quisquam fugit explicabo aut. Laboriosam blanditiis qui dicta tenetur dignissimos accusamus ea. Nemo sint quod et. Ex vitae veniam quibusdam est ut quisquam est. Earum est quidem sint voluptates enim dignissimos. Soluta maiores ut rem. Temporibus nemo explicabo ut harum.', '444.00', 47.00, 0, 'computer-7.jpg', 3, '2023-03-15 13:54:21', '2023-03-15 13:54:21'),
(17, 'id omnis voluptatibus ut voluptatibus nihil', 'id-omnis-voluptatibus-ut-voluptatibus-nihil', 'Commodi esse rerum mollitia est nostrum temporibus nostrum. Et magni velit illo id voluptate. Voluptates qui ipsa aliquam. Voluptate illum ullam molestias. Ut sit molestiae architecto. Incidunt in eum quisquam fugit eveniet. Temporibus fuga porro at delectus. Ipsa sit eveniet rem voluptatum. Autem voluptatibus doloribus laborum nihil. Voluptatem possimus ut consequatur perspiciatis. Voluptatibus velit eveniet et assumenda quia autem qui. Et ea iusto nihil quam minus nam provident.', '209.00', 15.00, 0, 'watch-6.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(18, 'odit facilis ut quis totam quod', 'odit-facilis-ut-quis-totam-quod', 'Quo mollitia quam odio ipsa esse sed illum. Debitis sequi aut voluptas error vitae sit. Esse voluptates et expedita ea. Corporis et illo ut eum magni et sed itaque. Magni ratione adipisci quis non at praesentium totam. Voluptas error at vel sequi. Sit sunt voluptates enim est rerum sit. Animi qui eum et sequi in hic. Doloribus praesentium iusto at asperiores sint ut sed. Amet dolorem possimus ut officiis aut. Natus repudiandae ullam earum.', '188.00', 12.00, 0, 'watch-5.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(19, 'eius doloribus rerum soluta voluptas aut', 'eius-doloribus-rerum-soluta-voluptas-aut', 'Tenetur sint ipsum sunt ipsa corporis sunt quibusdam nostrum. Odit numquam perferendis et rerum. Ullam corporis saepe dolore earum beatae modi soluta sit. Ut aut ratione quia assumenda asperiores cum. Quod eum quae et perspiciatis unde perspiciatis qui doloremque. Dolor nihil et voluptate et vero deleniti. Est consequuntur sit voluptate animi. Cupiditate laboriosam ad quidem est architecto officia. Voluptatum nisi assumenda nostrum.', '130.00', 50.00, 0, 'watch-6.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(20, 'aspernatur eum delectus commodi cupiditate nihil', 'aspernatur-eum-delectus-commodi-cupiditate-nihil', 'Sint accusantium velit molestiae voluptas dolorem sapiente suscipit. Sed et velit vel non assumenda quae non. Nisi optio ea omnis enim quasi a aut. Nostrum debitis necessitatibus officiis veniam. Ea illo qui corporis quo. Non sed alias laborum nemo. Nihil sequi cum temporibus aliquam vero. Qui blanditiis sint rerum ad. Nisi nisi dolorem aut dolor. Consequatur et ad cumque.', '481.00', 47.00, 0, 'watch-7.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(21, 'aut temporibus repellendus praesentium quaerat architecto', 'aut-temporibus-repellendus-praesentium-quaerat-architecto', 'Corrupti magni ea et molestiae. Dolores minus libero doloribus voluptatem magni possimus. Aut dolorum laborum ipsum nulla. Nobis in vel facilis quae. Tempora ut voluptates necessitatibus. Harum ut voluptatibus tempore in et. Qui earum distinctio explicabo quos optio. Magni enim quod rerum eligendi sit non minus. Reiciendis natus aut nulla illo repellendus voluptatem. Itaque voluptatibus voluptatum aliquid fugiat numquam.', '329.00', 42.00, 1, 'watch-8.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(22, 'quod ducimus tempore id reiciendis dolorem', 'quod-ducimus-tempore-id-reiciendis-dolorem', 'Est autem unde debitis cum praesentium. Est nihil aut quo animi sint. Nihil rem suscipit et qui amet. Beatae consectetur deleniti voluptas quia voluptas maiores incidunt. Accusantium eius ut provident et illo fuga a. Vero occaecati nesciunt ad qui et quam. Laborum est enim et velit veritatis. Est illo ut at enim.', '134.00', 10.00, 0, 'watch-4.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(23, 'animi impedit at aut sint quo', 'animi-impedit-at-aut-sint-quo', 'Omnis qui dolores velit et molestiae. Quia quam unde quos suscipit perferendis voluptatem enim. Perspiciatis optio aliquam eligendi exercitationem dolorem. Saepe illo omnis deleniti optio in provident quo. Eius nulla in qui pariatur nobis minima illum ullam. Ab saepe nisi minima voluptatem molestiae tenetur repellendus. Illo recusandae molestiae rerum necessitatibus. Voluptate praesentium provident qui quo. Inventore inventore veritatis voluptates esse magnam culpa eveniet.', '206.00', 24.00, 0, 'watch-2.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(24, 'dolor et rem sit cupiditate fugiat', 'dolor-et-rem-sit-cupiditate-fugiat', 'Voluptas voluptatem possimus sed eum ipsa qui neque. Molestiae vero enim temporibus a sed et. Molestiae aliquam vero doloribus in similique quis. Fugiat officiis voluptas quia repellat aut consectetur modi. Est et ut quasi vitae inventore. Dolor sapiente et qui quae aspernatur quo in. Saepe at et eius quae animi voluptatibus sapiente. Quibusdam ex eligendi asperiores voluptatem quam ut asperiores.', '416.00', 46.00, 0, 'watch-1.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(25, 'aut fugit tempore quis doloremque velit', 'aut-fugit-tempore-quis-doloremque-velit', 'Necessitatibus repellat nisi ut. Non est dicta sunt ipsa sit rerum fugiat dolorum. Dolor voluptas nam consectetur et laborum omnis. Ut numquam odio dolores vitae. Fugit molestias deleniti et ipsum esse sed qui. Autem numquam optio ex ut quidem quisquam aliquid. Ea qui veniam quasi tempore totam commodi quisquam. Quo illum iusto rerum enim. Quia fuga repellendus laborum ut quia quibusdam. Dolor laborum placeat impedit optio hic doloremque in.', '430.00', 27.00, 0, 'watch-5.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(26, 'aut facilis omnis iusto cumque odio', 'aut-facilis-omnis-iusto-cumque-odio', 'Rerum iure recusandae odio qui ut. Ex aut libero quae inventore. In impedit dolorem repellat ea est ad quia. Qui qui veniam ducimus quisquam. Libero excepturi dolore qui. Ut velit non id voluptas nostrum non ea ab. Mollitia ut illum aperiam. Nam perspiciatis repellat dolorem et. Sit harum qui nihil animi. Quod laborum et tenetur eius esse maiores est. Rerum ut mollitia harum excepturi nihil voluptate. Consequatur reprehenderit molestiae corporis sint qui ut.', '36.00', 38.00, 0, 'watch-9.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(28, 'et commodi sit explicabo architecto qui', 'et-commodi-sit-explicabo-architecto-qui', 'Et laborum sed qui aut ut dolore. Quae incidunt distinctio vel est esse. Delectus ea aperiam accusantium porro in cupiditate. Autem rerum odio ipsam autem est non. Magnam cupiditate dolor soluta vero. Sit quis asperiores dicta debitis. Deleniti cumque sed cupiditate totam et corporis error possimus. Ad nulla temporibus eum sint qui ab. Veniam porro porro quidem incidunt. Enim magni veniam autem quia saepe.', '422.00', 30.00, 0, 'watch-10.jpg', 2, '2023-03-15 14:03:18', '2023-03-15 14:03:18'),
(30, 'eligendi voluptatum aut provident et ab', 'eligendi-voluptatum-aut-provident-et-ab', 'Provident consequuntur officia aut enim. Expedita ad rerum est adipisci. Atque libero voluptatem quia aspernatur veniam reiciendis sunt nesciunt. Quia quasi sit vel ut quaerat. Sequi magni laudantium est quos harum aliquid vero. Consectetur occaecati distinctio autem amet sit labore.', '162.00', 10.00, 1, 'watch-9.jpg', 2, '2023-03-15 14:03:19', '2023-03-15 14:03:19'),
(31, 'laudantium eos sapiente architecto nihil est', 'laudantium-eos-sapiente-architecto-nihil-est', 'Placeat nostrum accusantium debitis nihil libero. Aut ad maiores velit sed. Dolorem ut esse rerum nihil quia et. Vero quia unde magnam perspiciatis ut. Sunt perferendis dicta vel sunt. Soluta quia ut quae delectus assumenda est molestias. Et officiis possimus provident laboriosam optio totam. Temporibus ipsam sit sed molestiae itaque architecto sapiente. Et sunt ut repudiandae rem earum praesentium ratione. Quod quod perspiciatis sit qui ut quidem et aliquid.', '320.00', 10.00, 1, 'watch-3.jpg', 2, '2023-03-15 14:03:19', '2023-03-15 14:03:19'),
(32, 'fugiat velit voluptate veniam velit qui', 'fugiat-velit-voluptate-veniam-velit-qui', 'Asperiores harum quia nulla aut. Quaerat consequatur qui quia ut beatae quia vitae. Praesentium minus quia consectetur voluptatibus laudantium. Ad dicta et provident accusamus autem. Ipsum culpa non quo accusantium nihil. Eum est voluptas non voluptate ipsam cum rerum. Et odio inventore quasi repellendus aperiam. Quis fuga fugiat impedit quo. Dolore numquam error ut quia ducimus fugit ea. Autem dolor animi magni ut dolorem.', '57.00', 29.00, 1, 'phone-1.jpg', 4, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(33, 'rerum et eos et necessitatibus error', 'rerum-et-eos-et-necessitatibus-error', 'Sint et voluptatem explicabo aut quis consequatur consectetur libero. Qui similique ipsa ipsam. Quos eos repellendus perspiciatis quis corporis. Nulla ullam sint repellendus tempore fugiat expedita consequatur. Est magnam alias quasi labore expedita. Asperiores fuga et quis dolor. Eos dolores culpa veniam in. Minus voluptatibus voluptates et aperiam animi.', '75.00', 32.00, 1, 'phone-8.jpg', 15, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(34, 'provident exercitationem et impedit quidem et', 'provident-exercitationem-et-impedit-quidem-et', 'Neque voluptate esse temporibus voluptates. Sit maxime deleniti dolorem. Dolorem ut aut aliquid aut debitis amet voluptatem. Velit tempora fugiat odit corrupti corporis dolorem impedit. Eos aliquid aut pariatur eligendi vel est. Voluptatem et ut aut facere eveniet perspiciatis. Non ab temporibus non eligendi commodi corporis. Veritatis voluptas eligendi similique est.', '433.00', 49.00, 1, 'phone-8.jpg', 15, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(35, 'eos sed accusamus voluptatem doloribus animi', 'eos-sed-accusamus-voluptatem-doloribus-animi', 'Unde dolor adipisci impedit ullam quidem. Qui et veritatis cupiditate aliquam dolores magni. Incidunt eos nihil et quaerat voluptate quod maiores dignissimos. Ut ut aspernatur voluptatum deleniti. Sit dolor facilis est id quam quo eum. Aspernatur officiis nisi maxime labore magni eveniet temporibus adipisci. Vitae voluptas qui omnis non asperiores. Saepe ullam qui error adipisci maiores dolorum dolore.', '266.00', 26.00, 1, 'phone-4.jpg', 4, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(36, 'sunt labore magnam sint quibusdam quia', 'sunt-labore-magnam-sint-quibusdam-quia', 'Rem temporibus exercitationem laborum necessitatibus incidunt eius sit. Dicta perferendis asperiores vel nihil. Aut sapiente consectetur labore dolorem. Voluptatem praesentium numquam rerum enim. Dignissimos sed et quasi culpa sit sint magni. Deserunt et voluptas autem expedita porro magnam libero hic. Odit ipsa laudantium non explicabo aut recusandae iste. Quia odio occaecati in qui quidem.', '478.00', 25.00, 0, 'phone-8.jpg', 16, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(37, 'consequatur aperiam porro earum quaerat minus', 'consequatur-aperiam-porro-earum-quaerat-minus', 'Quo illo quia reiciendis saepe cupiditate reiciendis. Quo est unde corrupti saepe quia. Architecto consequatur excepturi molestiae quia voluptas. Aut voluptates ad nostrum quaerat nisi a sunt nostrum. Natus quia sint aut consequuntur incidunt. Alias a praesentium repudiandae laboriosam laboriosam aut. Voluptatem ut mollitia repellendus voluptas vel repellat. Quasi fugit at aliquid veniam. Et ut ipsam ex quisquam. Officia temporibus quisquam commodi ea deserunt et facere velit.', '158.00', 28.00, 1, 'phone-10.jpg', 4, '2023-03-15 14:18:51', '2023-03-15 14:18:51'),
(38, 'harum et est illum impedit porro', 'harum-et-est-illum-impedit-porro', 'Non delectus numquam voluptatem amet unde quidem quibusdam. Aut et natus dolores architecto. Doloribus labore quidem non est voluptates quia. Aspernatur sed aut amet aperiam ut modi. Qui doloribus autem consequatur nisi sint. Velit vel non nesciunt. Non delectus dolor quia dolorem accusamus dicta mollitia molestias. Consequatur incidunt blanditiis dicta soluta eveniet. Id quos distinctio libero doloremque quod. Rem accusantium quod ut occaecati. Possimus est nisi perferendis incidunt.', '324.00', 26.00, 0, 'phone-8.jpg', 15, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(39, 'deserunt vel eos aliquid et sit', 'deserunt-vel-eos-aliquid-et-sit', 'Optio incidunt aspernatur consequatur. Quae voluptatum eos vel quibusdam reiciendis. Et iure maiores voluptas quia. Totam ea beatae enim culpa ducimus repudiandae. Laboriosam ut laboriosam explicabo. Nulla quis sunt consequatur occaecati dicta officia. Fugiat veniam voluptas eos repellendus minus et blanditiis. Tenetur earum enim inventore officiis. Sit nulla sint consequatur voluptates sint et et. Architecto sint delectus sed cupiditate. Minus reprehenderit illo quasi temporibus.', '134.00', 19.00, 0, 'phone-10.jpg', 5, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(40, 'nemo officia nemo unde possimus inventore', 'nemo-officia-nemo-unde-possimus-inventore', 'Unde sit distinctio rerum nobis. Quidem modi doloremque itaque. Voluptatibus facere dolor soluta quidem. Rerum voluptas quasi fuga corporis deleniti voluptate. Aut ut ut assumenda eligendi eveniet itaque minima. Voluptates tenetur repudiandae sit vel culpa molestiae. Atque nesciunt eaque deleniti fuga eum autem. Eaque quos quaerat autem aspernatur sed. Qui odio ea et suscipit odit. Voluptates assumenda aut sed eveniet iure et animi. Vel omnis dolor consequuntur quis ea.', '225.00', 30.00, 1, 'phone-10.jpg', 5, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(41, 'est nihil quia minus sed eum', 'est-nihil-quia-minus-sed-eum', 'Quas quos sequi ratione. Omnis sit corporis in minus laborum dolores. Ea aliquid sint maiores enim doloremque sunt. Sit consequatur et qui consequatur. Molestias temporibus sequi assumenda omnis exercitationem vero. Voluptatum accusantium fugit dolorem quia alias nobis voluptatibus. Suscipit iusto eligendi amet ut. Commodi ipsa voluptas impedit temporibus. Molestias temporibus et eveniet reprehenderit aliquam.', '79.00', 33.00, 1, 'phone-7.jpg', 5, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(42, 'sequi dolore veniam iusto doloremque temporibus', 'sequi-dolore-veniam-iusto-doloremque-temporibus', 'Corrupti voluptatem nihil doloribus inventore vitae rerum. Qui rerum pariatur sint quibusdam. Asperiores harum quis unde et sed ea. Consequatur quod a ut repudiandae recusandae. Sed voluptatem impedit et est id. Voluptatem id mollitia blanditiis quos delectus. Id numquam libero quis eos. Molestiae autem voluptatem illo qui voluptas. Ut facilis nulla odit atque nam. Illum eos aut similique aut architecto et.', '192.00', 45.00, 0, 'phone-9.jpg', 16, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(43, 'sapiente et qui repellendus consequatur architecto', 'sapiente-et-qui-repellendus-consequatur-architecto', 'Voluptas voluptatem quos reprehenderit magni omnis expedita. Reprehenderit quos voluptatem quo velit ut. Neque nam amet distinctio tempora. Architecto veniam numquam tempora nihil eum ullam consequatur. Quia ullam sed ut sit et similique facere. Ab ut eligendi ducimus modi sapiente. Libero inventore molestiae aspernatur. Est doloribus voluptatem dolorem alias eveniet optio.', '240.00', 17.00, 0, 'phone-2.jpg', 6, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(44, 'accusamus maxime ea qui adipisci eum', 'accusamus-maxime-ea-qui-adipisci-eum', 'Ratione dolores saepe porro tenetur culpa beatae maiores. Aliquam distinctio in quo ut. Voluptates recusandae aut quia labore repellat. Et commodi numquam vero. Cum consequatur excepturi animi. Sint illo rerum impedit non laborum tenetur. Minus consequatur illum fugiat odio non ad eos. Et veniam ullam nihil qui. Delectus nostrum consequuntur optio commodi. Omnis delectus dignissimos omnis odit laborum non distinctio.', '369.00', 47.00, 1, 'phone-3.jpg', 6, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(45, 'sit doloremque accusantium deleniti id nobis', 'sit-doloremque-accusantium-deleniti-id-nobis', 'Eaque sed aliquid magnam placeat cumque consequatur. Dolorum aperiam esse quam vero error et ipsum. Nesciunt magni harum quaerat est qui. Corrupti sit aut voluptas ut rem in optio. Et praesentium ut placeat reprehenderit. Omnis sit et et reprehenderit eum similique et sed. Rerum sit voluptates atque nihil blanditiis eum. Quod enim accusantium ducimus et enim.', '142.00', 15.00, 1, 'phone-5.jpg', 4, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(46, 'provident ea enim impedit consequatur accusamus', 'provident-ea-enim-impedit-consequatur-accusamus', 'Accusamus est nemo dolorem ipsum qui omnis. Enim est voluptas consequatur earum quas. Dignissimos nihil id et illum. Dolor doloremque voluptas expedita officia cum voluptates qui. Quia voluptates blanditiis et ab nemo. Voluptatibus et veniam excepturi quidem illo. Non minus ipsum mollitia sequi. Odit est perferendis reprehenderit qui vitae amet. Itaque voluptatem veritatis amet quis. Exercitationem fuga ullam tempora quos.', '327.00', 38.00, 1, 'phone-6.jpg', 5, '2023-03-15 14:18:52', '2023-03-15 14:18:52'),
(47, 'provident voluptatum corporis aut nostrum voluptas', 'provident-voluptatum-corporis-aut-nostrum-voluptas', 'Totam fuga quia ratione enim in. Ab omnis est quo eos provident. Ea culpa et nostrum id labore dolor nam. Temporibus necessitatibus omnis voluptatem et. Dicta sint necessitatibus atque nam quisquam consequuntur illo facilis. Aut veritatis temporibus nostrum maxime est qui accusamus. Quidem illum eius velit quisquam animi nam laudantium. Laboriosam dolorem illum totam in tempora porro vero doloribus.', '277.00', 10.00, 0, 'mouse-5.jpg', 10, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(50, 'excepturi totam libero dolores dolor sit', 'excepturi-totam-libero-dolores-dolor-sit', 'Ratione ullam magni autem blanditiis alias. Sit voluptatem quod enim dolor expedita delectus. A expedita atque aut corrupti repellat. Ipsum est nam facere. Nemo voluptas nihil adipisci fugiat cumque asperiores. Aliquam et omnis natus sequi. Aut magni sunt et aut necessitatibus beatae et. Iste consequatur quo sunt sed. Voluptatibus omnis non et eum voluptas ratione. Rerum quam est omnis sed neque quasi. Culpa explicabo veritatis voluptatem maxime.', '242.00', 34.00, 1, 'mouse-1.jpg', 10, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(51, 'ut facere et sed aut earum', 'ut-facere-et-sed-aut-earum', 'Veritatis repudiandae perferendis dolor cupiditate ad. Quidem nihil consequatur ut facilis. Esse totam veritatis et. Cupiditate eum officia fugiat quia libero repudiandae aut. Error quis at error in quas ea. Facilis quisquam ipsum aliquam provident porro optio saepe. Reiciendis est quis soluta ut reiciendis nemo porro. Quo quaerat cumque explicabo ratione dolores et. Tempore ut ipsam quia. Repudiandae harum aspernatur reiciendis aliquam.', '181.00', 19.00, 1, 'mouse-5.jpg', 12, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(52, 'autem quidem consequatur sapiente maiores hic', 'autem-quidem-consequatur-sapiente-maiores-hic', 'Perferendis eaque ut et unde et. Ut eum saepe et ut. Suscipit molestiae quis ut officia voluptatum veritatis voluptatibus. Et quia qui totam provident et. Ut voluptates sapiente blanditiis id tenetur. Eligendi perspiciatis labore voluptatibus atque. Consequatur ut velit quis. Hic inventore eos eum quas expedita. Et id in similique ea voluptas corporis. Exercitationem neque omnis et qui animi qui et.', '287.00', 45.00, 1, 'mouse-2.jpg', 10, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(54, 'et et voluptatem laborum mollitia facere', 'et-et-voluptatem-laborum-mollitia-facere', 'Consequatur incidunt quas tenetur nihil fugiat rerum quos omnis. Aliquid libero et aliquam soluta est ut. Aliquam quidem fuga beatae tempora. Distinctio suscipit aut quo laudantium necessitatibus quia voluptatem iure. Harum deleniti sunt dolorem quia reprehenderit enim sed. Nesciunt repellendus reiciendis occaecati nulla iste modi. Rerum nisi voluptas consequatur cupiditate nesciunt nemo incidunt.', '480.00', 17.00, 0, 'mouse-3.jpg', 10, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(55, 'error veritatis voluptatem laudantium autem repudiandae', 'error-veritatis-voluptatem-laudantium-autem-repudiandae', 'Ut qui ab veniam occaecati est perspiciatis repudiandae ut. Voluptatem possimus consequatur consectetur harum qui. Error enim et placeat sint sequi. Totam voluptas et reiciendis saepe. Itaque quaerat et corrupti dignissimos quasi. Fugit odit error voluptate repudiandae. Dignissimos quis sit iusto non blanditiis. Ad rem voluptas iusto quae. Omnis et placeat consectetur atque voluptatem voluptates. Quos assumenda veniam et unde pariatur.', '331.00', 25.00, 1, 'mouse-1.jpg', 12, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(56, 'temporibus in possimus ab a iste', 'temporibus-in-possimus-ab-a-iste', 'Et facere cupiditate officia doloribus quis et sequi. Tempora doloribus exercitationem dolor iste. Tenetur maiores qui numquam et. Ex qui voluptatum quo quisquam atque. Voluptates alias vero deserunt tempore quo nesciunt nihil amet. Fugiat ex amet consequatur non. Nisi occaecati iusto consectetur sint ullam. Dolor voluptas ea ut omnis quis. Doloremque eius voluptatibus ullam similique.', '58.00', 44.00, 1, 'mouse-7.jpg', 10, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(58, 'placeat sapiente illum eum autem aut', 'placeat-sapiente-illum-eum-autem-aut', 'Eligendi ad sed dignissimos quia earum veniam. Asperiores veritatis est vel perferendis qui enim. Quae iure fugiat eveniet atque. Accusamus nulla molestiae est officiis sit id dolore vel. Itaque sed aut ducimus modi. Saepe vel commodi laudantium voluptatum sint eligendi officia. Ducimus dolor qui nulla beatae fugit eveniet. A rerum est sed reprehenderit sed aliquam reprehenderit. Sapiente et facilis voluptate est et et qui. Enim itaque recusandae ullam perspiciatis sapiente voluptas.', '317.00', 25.00, 0, 'mouse-3.jpg', 12, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(60, 'ratione maxime sequi minima et officia', 'ratione-maxime-sequi-minima-et-officia', 'Nihil fuga est odit quia id ut eos aperiam. Ut incidunt atque vero in occaecati exercitationem. Et omnis repudiandae fuga similique doloremque harum. Tempore occaecati accusamus asperiores nesciunt. Fuga autem voluptatem reiciendis sint tempora debitis. Nulla alias voluptas possimus aut quos quis. Quae ullam est quo excepturi qui. Error velit et illo. Repellendus qui magnam et sed. Nemo earum unde et laborum. Velit iste et molestiae quo ea dolores.', '82.00', 41.00, 1, 'mouse-2.jpg', 12, '2023-03-15 14:27:25', '2023-03-15 14:27:25'),
(61, 'officiis at cupiditate vel quos distinctio', 'officiis-at-cupiditate-vel-quos-distinctio', 'Voluptatum qui nostrum quod hic. Ducimus tempora vero iusto mollitia rerum voluptates nostrum. Et qui tempora accusantium eveniet rem autem voluptas. Culpa aut omnis dolorum. Blanditiis et numquam dolore. Qui aut sit maxime sed ut et vel. Eligendi id possimus fuga repellat enim voluptatibus et. Qui quis molestiae illo sit molestias molestias. Eos quia nostrum quasi rem vel nemo. Asperiores quia et ratione cupiditate in suscipit.', '500.00', 49.00, 0, 'mouse-8.jpg', 10, '2023-03-15 14:27:26', '2023-03-15 14:27:26'),
(62, 'iste corporis corrupti est dolorem sit', 'iste-corporis-corrupti-est-dolorem-sit', 'Iure iusto voluptates deserunt. Recusandae sint est hic et explicabo voluptatem. Soluta voluptates sed mollitia quis provident porro et. Incidunt ea temporibus ut harum assumenda ut. Accusantium voluptas voluptatem dolor dolore id sapiente. Velit sunt sint iure voluptatem. Modi omnis fuga magni labore quam rerum. Nesciunt dolorem dolore sed assumenda nam. Voluptatibus accusamus esse facere blanditiis voluptas maiores quia.', '442.00', 43.00, 1, 'keyboard-7.jpg', 17, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(63, 'ut cum enim rerum facilis dicta', 'ut-cum-enim-rerum-facilis-dicta', 'Dolorem et perferendis consequatur expedita est facere eos. Vel nihil tempora quia illum. Sapiente quia voluptatum quo odio. Dignissimos voluptate id unde laborum explicabo incidunt et voluptate. Ipsum hic aut quod officia voluptas. Est nam dolor sunt est. Neque deserunt et dolore in nesciunt nemo. Corporis aut aut aliquid facere quam et autem. Optio est officia consequatur ab. Rerum sunt fugiat ut enim delectus repudiandae.', '458.00', 28.00, 1, 'keyboard-4.jpg', 11, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(64, 'quas maiores nesciunt ut consequatur aut', 'quas-maiores-nesciunt-ut-consequatur-aut', 'Ab ea amet quas nostrum. Ducimus et eos aliquid vero beatae minima. Accusantium beatae consequatur non similique vero quibusdam. Velit ipsam quasi suscipit est ut veniam modi numquam. Nam neque ab nisi voluptatem. Nisi enim voluptas quia corrupti. Corporis neque dolorem sequi repellat. Eius quibusdam quia voluptate provident laborum. Magni possimus quia enim eligendi et sed quod nemo. Eum exercitationem vitae voluptas incidunt suscipit. Accusamus illo et sequi adipisci et.', '167.00', 13.00, 1, 'keyboard-8.jpg', 11, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(65, 'id ratione quia sequi rerum corrupti', 'id-ratione-quia-sequi-rerum-corrupti', 'Ducimus omnis voluptatum veritatis animi nisi modi sed. Non sunt tempore et enim rerum laboriosam. Molestias eos accusamus eius eum non et. Vitae deserunt quod ex mollitia ut commodi minus. Facilis sunt eum laboriosam qui distinctio similique sit. Hic natus magnam consequatur error. Placeat qui esse numquam eveniet. Eos culpa iste unde ut sunt. Et et est consequatur voluptatibus sunt. Vel est aspernatur non accusamus repudiandae vel ut. Qui quia illum minima sit.', '238.00', 21.00, 1, 'keyboard-6.jpg', 13, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(66, 'voluptatem aut quia modi et nam', 'voluptatem-aut-quia-modi-et-nam', 'Rerum consequatur ipsam dolorum atque est voluptatum. Est error dolore aut rem sit pariatur. Quae architecto dolore non sit voluptatibus. Ipsa placeat saepe nihil omnis praesentium deleniti distinctio sapiente. Et sint distinctio aut eos tenetur maiores alias assumenda. Quae delectus aperiam ea cum vel aut qui. Perspiciatis veritatis dolorum voluptatem modi.', '315.00', 43.00, 1, 'keyboard-9.jpg', 17, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(67, 'laborum sunt voluptatem esse reiciendis nobis', 'laborum-sunt-voluptatem-esse-reiciendis-nobis', 'Illum dolores nobis a sint libero ut. Qui nam sapiente quia est est dolores. Quaerat nostrum ducimus placeat. Inventore fugit sint itaque est odit dolorem mollitia. Quis maiores ut est qui animi dolorum. Esse fuga et qui nostrum nostrum voluptas. Repudiandae qui laboriosam quo quis eum et. Beatae ipsum corporis reiciendis. Ut velit eum est distinctio error numquam voluptatem. Architecto cumque ea at dolores sapiente unde.', '211.00', 49.00, 1, 'keyboard-1.jpg', 9, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(68, 'temporibus rerum laborum et sit veritatis', 'temporibus-rerum-laborum-et-sit-veritatis', 'Accusamus perspiciatis libero est eum maxime. Perferendis provident labore vel aut. Dolor error unde sed. Doloribus sit aut quae dolorum. Similique aut dolore sunt ipsam aut. Eos qui deleniti sunt. Non velit maxime illo vel. Dolor dolor nostrum fugit nemo. Tempora repellat libero ad et ut. Veritatis rerum sed tempore asperiores quod veniam. Occaecati aliquam sequi provident atque consequatur qui molestiae laboriosam. Sed explicabo id distinctio ut. Qui harum sed optio officiis.', '383.00', 38.00, 1, 'keyboard-2.jpg', 17, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(69, 'dolorem sit vero molestias pariatur debitis', 'dolorem-sit-vero-molestias-pariatur-debitis', 'Nobis non fuga provident eaque harum necessitatibus iste. Recusandae doloremque illum numquam minus. Consectetur delectus ipsa facilis voluptates. Nobis ut quo vero eaque et labore. Maxime reprehenderit et dolore dolorem impedit quis. Ex adipisci ipsam eaque suscipit laborum dolorem numquam. Ut odio recusandae nihil iure omnis itaque cumque. Quidem veniam minima reiciendis rerum iusto. Sed et minima qui consectetur dolore est voluptatem adipisci. Eum aut reiciendis eveniet repudiandae alias.', '120.00', 20.00, 0, 'keyboard-10.jpg', 11, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(70, 'assumenda a error voluptates corporis sed', 'assumenda-a-error-voluptates-corporis-sed', 'Neque ad quia repellendus qui ut. Sit quasi facilis sapiente veniam dolore asperiores ea. Excepturi rerum modi sed atque architecto. Nihil odit hic voluptas qui et temporibus. Quas laboriosam voluptate enim temporibus consequuntur. Deserunt facere perferendis et quasi minus. Earum similique corrupti facilis enim eos. Consectetur eum aut quasi pariatur asperiores et eius.', '184.00', 31.00, 0, 'keyboard-8.jpg', 13, '2023-03-15 14:28:00', '2023-03-15 14:28:00'),
(71, 'dolorum aperiam omnis laudantium qui quo', 'dolorum-aperiam-omnis-laudantium-qui-quo', 'Rerum laboriosam amet facere ratione ut. Odio quam rerum sit. Sapiente nihil rem adipisci. Id reiciendis qui voluptate. Laudantium minus voluptas quas. Quia voluptas aliquid non et qui. Dolores debitis tempora natus ea. Sed accusamus non qui. Laborum impedit modi sunt est. Harum sequi in earum consequatur. Laborum voluptas aut incidunt culpa saepe. Impedit est recusandae est libero sequi culpa distinctio. Velit accusantium iusto et inventore alias.', '487.00', 19.00, 1, 'keyboard-8.jpg', 14, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(72, 'ab cupiditate est explicabo sed facilis', 'ab-cupiditate-est-explicabo-sed-facilis', 'Non alias nemo aut nisi. Cumque et a cumque blanditiis facilis. Tenetur voluptas omnis odio a quis omnis. Rerum et ullam totam in est. Voluptate doloribus consequuntur sunt iste et optio sed. Qui voluptatem est sit ipsum accusantium. Consequuntur vel pariatur velit ratione. Omnis magni cupiditate sed illo quas. Ea non quo odio quis id quas. Nemo tenetur asperiores dolor commodi ex expedita aspernatur omnis. Tenetur ipsum fugit velit voluptatem dignissimos dolorem. Sint provident natus vel.', '370.00', 50.00, 1, 'keyboard-9.jpg', 14, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(73, 'et dignissimos animi est ut velit', 'et-dignissimos-animi-est-ut-velit', 'Nobis optio culpa sequi est ut voluptate. Omnis ut asperiores qui sed exercitationem. Ducimus sit vel quo alias reprehenderit iusto perspiciatis nulla. Itaque ex id fugit debitis sed pariatur. Nobis eveniet consectetur vel adipisci ut. Maiores voluptatibus quam harum quaerat. Doloribus et qui et consequatur similique mollitia. Dicta et maxime distinctio non sunt. Inventore sapiente odio et impedit ipsum. Aut et modi minus voluptate quidem molestias.', '234.00', 19.00, 0, 'keyboard-3.jpg', 14, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(74, 'maiores omnis qui explicabo incidunt officiis', 'maiores-omnis-qui-explicabo-incidunt-officiis', 'Aperiam omnis odit excepturi nihil. Ipsa quo nam quia quaerat accusamus culpa architecto cumque. Facilis et illum eius sint. Animi delectus dolorem sed est enim commodi. Et quas dolores perspiciatis aut reprehenderit. Et cupiditate eaque iste fugit distinctio velit omnis dolorum. Architecto quo quia maxime earum eum vel impedit. Quo aut odit eveniet quaerat facere odit maxime. Eos aut eos odio explicabo soluta.', '133.00', 36.00, 1, 'keyboard-5.jpg', 14, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(75, 'qui provident consequatur qui eligendi explicabo', 'qui-provident-consequatur-qui-eligendi-explicabo', 'Placeat qui ut aspernatur ut ullam et rerum. At explicabo quis eum illo doloremque consectetur sit. Ab officia et sequi. Non modi dignissimos nam consequatur iste. Quas quaerat perferendis deserunt voluptate cupiditate. Itaque aliquam error error rem id. Deleniti ab qui dicta tempora aspernatur tempore. Eum nemo cupiditate error repudiandae nisi quo ex amet. Et veritatis molestiae et. Totam totam tempore non eaque illum est recusandae autem. Ut consequuntur et quasi.', '460.00', 14.00, 0, 'keyboard-10.jpg', 13, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(76, 'magni vero neque ut vel exercitationem', 'magni-vero-neque-ut-vel-exercitationem', 'Consectetur nulla ut laudantium in. Qui qui nesciunt nobis. Et rerum hic iure quae sed. Amet et debitis consequatur ex suscipit. Non tempora ut eos minus ut incidunt eos. Omnis cum non dignissimos vero omnis. Doloremque et dolores dolorem at aut. Quo cumque impedit sit debitis. Magnam vitae doloribus et. Vero quam maiores quis sed quos. Ullam temporibus dignissimos et sed sit. Nihil et qui dolore sunt numquam. Fugiat distinctio in est. Sit quia et rerum.', '14.00', 44.00, 0, 'keyboard-3.jpg', 9, '2023-03-15 14:28:01', '2023-03-15 14:28:01'),
(86, 'Mouse Charging Dock for Razer Wireless Mouse Viper Ultimate Naga pro DeathAdder V2 Pro and Basilisk Ultimate Magnetic', 'mouse-charging-dock-for-razer-wireless-mouse-viper-ultimate-naga-pro-deathadder-v2-pro-and-basilisk-ultimate-magnetic', '【Compatibility】Designed to work with DeathAdder V2 Pro, Naga Pro, Viper Ultimate, and Basilisk Ultimate. Offers effortless, full integration with popular game titles and syncs.\n【Anti-Slip Gecko Feet】Anti-Slip Grip Tape - Self-Adhesive Design : Ensures better adhesion to surfaces for safe, long- term placement,the dock has a tacky underside that gives it an incredible amount of grip to ensure it never topples over,yet is gentle enough to not leave any sticky markings on your desk.\n【Unlimited charging and endless playing】Keep your game going with the mouse dock chroma -a wireless mouse charging dock.\n【More Flexible】Micro port used to connect the computer for receiver and charging requirements，Adapted to a variety of wireless mouse.\n【High Speed Wireless】Magnetic Dock with Charge Status For a connection faster than wired mice，For uninterrupted gameplay.', '17.00', 250.00, 1, '1679334094.jpg', 10, '2023-03-20 16:41:34', '2023-03-20 16:41:34');

-- --------------------------------------------------------

--
-- Table structure for table `shoppings`
--

CREATE TABLE `shoppings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `subprice` decimal(8,2) NOT NULL,
  `quantity` double(8,2) NOT NULL,
  `type` int(11) NOT NULL COMMENT '1 for cart and 0 for wishlist',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoppings`
--

INSERT INTO `shoppings` (`id`, `user_id`, `product_id`, `subprice`, `quantity`, `type`, `created_at`, `updated_at`) VALUES
(10, 6, 39, '134.00', 1.00, 1, '2023-03-26 03:02:10', '2023-03-26 03:02:10'),
(11, 6, 5, '628.00', 2.00, 1, '2023-03-26 03:02:15', '2023-03-26 06:29:15'),
(12, 6, 6, '67.00', 1.00, 1, '2023-03-26 03:02:18', '2023-03-26 03:02:18'),
(13, 6, 64, '167.00', 1.00, 1, '2023-03-26 03:02:21', '2023-03-26 03:02:21'),
(15, 6, 15, '164.00', 2.00, 1, '2023-03-26 03:19:37', '2023-03-26 05:34:20'),
(16, 6, 3, '92.00', 2.00, 1, '2023-03-26 03:19:44', '2023-03-26 06:17:45'),
(17, 6, 32, '57.00', 1.00, 1, '2023-03-26 03:19:47', '2023-03-26 03:19:47'),
(18, 6, 17, '418.00', 2.00, 1, '2023-03-26 03:20:42', '2023-03-26 03:25:23'),
(19, 6, 41, '79.00', 1.00, 1, '2023-03-26 05:05:49', '2023-03-26 05:05:49'),
(20, 6, 4, '1029.00', 3.00, 1, '2023-03-26 05:13:16', '2023-03-26 06:29:12'),
(21, 6, 36, '478.00', 1.00, 1, '2023-03-26 05:14:33', '2023-03-26 05:14:33'),
(22, 6, 16, '888.00', 2.00, 1, '2023-03-26 05:19:06', '2023-03-26 05:19:06'),
(23, 6, 7, '342.00', 2.00, 1, '2023-03-26 05:45:42', '2023-03-26 06:02:34'),
(24, 6, 35, '266.00', 1.00, 1, '2023-03-26 06:00:55', '2023-03-26 06:00:55'),
(25, 6, 52, '287.00', 1.00, 1, '2023-03-26 06:04:23', '2023-03-26 06:04:23'),
(26, 6, 11, '387.00', 1.00, 1, '2023-03-26 06:29:17', '2023-03-26 06:29:17'),
(27, 6, 71, '487.00', 1.00, 1, '2023-03-26 06:29:28', '2023-03-26 06:29:28');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcategory` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `subcategory`, `slug`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'autem repellat', 'autem-repellat', 1, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(2, 'minima laudantium', 'minima-laudantium', 2, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(3, 'est culpa', 'est-culpa', 1, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(4, 'Apple', 'apple', 3, '2023-03-15 13:44:35', '2023-03-26 05:50:54'),
(5, 'Samsung', 'samsung', 3, '2023-03-15 13:44:35', '2023-03-20 17:19:29'),
(6, 'Huawei', 'huawei', 3, '2023-03-15 13:44:35', '2023-03-26 05:51:20'),
(9, 'quia ea', 'quia-ea', 5, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(10, 'consectetur recusandae', 'consectetur-recusandae', 4, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(11, 'ipsam omnis', 'ipsam-omnis', 5, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(12, 'enim rerum', 'enim-rerum', 4, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(13, 'quidem ab', 'quidem-ab', 5, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(14, 'doloremque sunt', 'doloremque-sunt', 5, '2023-03-15 13:44:35', '2023-03-15 13:44:35'),
(15, 'Nokia', 'nokia', 3, '2023-03-15 13:44:35', '2023-03-26 05:52:56'),
(16, 'Sony', 'sony', 3, '2023-03-15 13:44:35', '2023-03-26 05:51:44'),
(17, 'quas est', 'quas-est', 5, '2023-03-15 13:44:35', '2023-03-15 13:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0' COMMENT '0 for users and 1 for admins',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Theresa Crist PhD', '0', 'nickolas.hodkiewicz@example.net', 'Tre', '2023-03-14 18:25:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q0QEb61j0s', '2023-03-14 18:25:15', '2023-03-14 18:25:15'),
(2, 'Dr. Kirstin Brown V', '0', 'pcarter@example.com', 'Simone', '2023-03-14 18:25:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nu6fr4jgrb', '2023-03-14 18:25:15', '2023-03-14 18:25:15'),
(3, 'Josh Farrell', '0', 'heidenreich.mathias@example.org', 'Carlee', '2023-03-14 18:25:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'xrzLb1Af9I', '2023-03-14 18:25:15', '2023-03-14 18:25:15'),
(4, 'Royal Ziemann', '0', 'dion.hills@example.com', 'Rosalinda', '2023-03-14 18:25:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2rco8qnZ3e', '2023-03-14 18:25:15', '2023-03-14 18:25:15'),
(5, 'Merlin Bednar', '0', 'uarmstrong@example.org', 'Emily', '2023-03-14 18:25:15', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FS0y6bj4sj', '2023-03-14 18:25:15', '2023-03-14 18:25:15'),
(6, 'Mohamed', '0', 'mohamed@gmail.com', NULL, NULL, '$2y$10$1e7MA09a.rtClHeyHLRBVexKkH87Mi4lDKJJ9OlNjsnyHPaz90vIq', 'mLraRzr9RHPkdMhuoPERfb9Bt55ozkor7FoWaAkq2axBq5IGz5Oyv0y9hjXx', '2023-03-14 18:53:10', '2023-03-14 18:53:10'),
(7, 'Mohammed Ameziane', '0', 'simo@gmail.com', NULL, NULL, '$2y$10$x2s8OHraoK4Mz2EGhiC5su.3WY7Oc/aMeqUcZg8BLXZ.kOhZ4FZjS', NULL, '2023-03-15 00:01:01', '2023-03-15 00:01:01'),
(8, 'Khaled', '0', 'khaled@gmail.com', NULL, NULL, '$2y$10$/bvMuJhuP780aaIga5Ihsu9IVq3RFYht2P9Muxtd.tVPQttuTuL8i', NULL, '2023-03-15 00:50:13', '2023-03-15 00:50:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`),
  ADD KEY `products_sub_category_id_foreign` (`sub_category_id`);

--
-- Indexes for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoppings_user_id_foreign` (`user_id`),
  ADD KEY `shoppings_product_id_foreign` (`product_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `shoppings`
--
ALTER TABLE `shoppings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_sub_category_id_foreign` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shoppings`
--
ALTER TABLE `shoppings`
  ADD CONSTRAINT `shoppings_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shoppings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
