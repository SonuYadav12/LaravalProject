-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2024 at 01:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `furnistyle_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Chairs', 'All types of chairs, from office to dining chairs.', '2024-11-12 15:53:20', '2024-11-12 15:53:20'),
(2, 'Tables', 'Wooden, glass, and metal tables for every occasion.', '2024-11-12 15:53:20', '2024-11-12 15:53:20'),
(3, 'Sofas', 'Comfortable sofas for your living room, available in various sizes and materials.', '2024-11-12 15:53:20', '2024-11-12 15:53:20'),
(4, 'Beds', 'Beds of different sizes and styles for a perfect sleep.', '2024-11-12 15:53:20', '2024-11-12 15:53:20'),
(5, 'Storage Units', 'Various types of storage units including wardrobes, cabinets, and more.', '2024-11-12 15:53:20', '2024-11-12 15:53:20'),
(6, 'Lighting', 'All types of lighting including lamps, chandeliers, and more.', '2024-11-12 15:53:20', '2024-11-12 15:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `response` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `message`, `response`, `created_at`, `updated_at`) VALUES
(7, 12, 'Actually my chandelier is broken i need asap replacement', 'We will contact you soon', '2024-11-13 04:16:18', '2024-11-13 17:49:55'),
(8, 12, 'Can you send a service man of yours to fix my bed?', NULL, '2024-11-13 04:16:37', '2024-11-13 04:16:37'),
(9, 12, 'Please look into the delivery matter asap.', NULL, '2024-11-13 04:17:07', '2024-11-13 04:17:07'),
(10, 13, 'Actually my chandelier is broken', NULL, '2024-11-13 04:19:55', '2024-11-13 04:19:55'),
(11, 12, 'I will buy soon', NULL, '2024-11-13 04:52:42', '2024-11-13 04:52:42'),
(12, 12, 'Please Help me', NULL, '2024-11-13 10:09:51', '2024-11-13 10:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_11_12_154613_create_categories_table', 1),
(5, '2024_11_12_154641_create_products_table', 1),
(6, '2024_11_12_154714_create_orders_table', 1),
(7, '2024_11_12_154727_create_order_items_table', 1),
(8, '2024_11_12_154742_create_reviews_table', 1),
(9, '2024_11_13_092619_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(1, 12, 500.00, 'Cancelled', '2024-11-13 10:51:53', '2024-11-13 18:23:19'),
(2, 12, 800.00, 'Delivered', '2024-11-13 10:55:44', '2024-11-13 18:23:52'),
(3, 12, 520.00, 'Pending', '2024-11-13 11:21:59', '2024-11-13 11:21:59'),
(4, 12, 1455.00, 'Pending', '2024-11-13 11:23:30', '2024-11-13 11:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 2, 250.00, '2024-11-13 10:51:53', '2024-11-13 10:51:53'),
(2, 2, 51, 2, 400.00, '2024-11-13 10:55:44', '2024-11-13 10:55:44'),
(3, 3, 10, 1, 120.00, '2024-11-13 11:21:59', '2024-11-13 11:21:59'),
(4, 3, 25, 1, 400.00, '2024-11-13 11:21:59', '2024-11-13 11:21:59'),
(5, 4, 3, 1, 35.00, '2024-11-13 11:23:30', '2024-11-13 11:23:30'),
(6, 4, 16, 1, 120.00, '2024-11-13 11:23:30', '2024-11-13 11:23:30'),
(7, 4, 17, 1, 450.00, '2024-11-13 11:23:30', '2024-11-13 11:23:30'),
(8, 4, 27, 1, 850.00, '2024-11-13 11:23:30', '2024-11-13 11:23:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `image_url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `description`, `price`, `stock`, `image_url`, `created_at`, `updated_at`) VALUES
(1, 1, 'Wooden Dining Chair', 'A stylish and durable wooden chair for dining rooms.', 120.00, 50, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484712/FurniStyle/qtdfou8ctfb6wh7dvrre.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(2, 1, 'Leather Office Chair', 'Ergonomic leather chair with adjustable height and lumbar support.', 250.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484820/FurniStyle/ayogdacvjpvzjpe4rdym.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(3, 1, 'Plastic Folding Chair', 'Lightweight and easy-to-store folding chair.', 35.00, 100, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484874/FurniStyle/j13hiwpgr4kcqvrbeonx.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(4, 1, 'Rocking Chair', 'Wooden rocking chair for relaxing in your living room.', 150.00, 40, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484910/FurniStyle/zqcqtkwzeko1f9tstf0p.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(5, 1, 'Armchair', 'Comfortable armchair with padded cushions for extra comfort.', 180.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484954/FurniStyle/n4uungyn7ia7zmuyvl8r.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(6, 1, 'Bar Stool', 'Stylish bar stool for kitchen and high tables.', 85.00, 50, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731484986/FurniStyle/xddh0ixtp4puud8wvmro.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(7, 1, 'Executive Chair', 'High-back executive chair for offices with adjustable features.', 350.00, 20, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485015/FurniStyle/uxekx6r1rgxvrugrtmac.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(8, 1, 'Dining Chair Set', 'Set of 4 wooden dining chairs.', 450.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485045/FurniStyle/xhwflnwlumtrekjg21nx.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(9, 1, 'Gaming Chair', 'Comfortable gaming chair with adjustable armrests.', 230.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485068/FurniStyle/t8ho8frrhxlon2kdzsjh.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(10, 1, 'Mesh Office Chair', 'Ergonomic mesh chair for office use.', 120.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485096/FurniStyle/fvp9i4xaovaywcspeqal.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(11, 2, 'Wooden Dining Table', 'A spacious wooden dining table for 6 people.', 500.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485185/FurniStyle/vmj7ufvvuwmskbwsemvf.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(12, 2, 'Glass Coffee Table', 'A sleek glass coffee table with metal legs.', 250.00, 20, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485227/FurniStyle/d90czrlshfqvnlqykrvz.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(13, 2, 'Round Dining Table', 'Round dining table, perfect for smaller dining areas.', 350.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485256/FurniStyle/wnxz1hnxjqro9dowojqq.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(14, 2, 'Wooden Coffee Table', 'Classic wooden coffee table for living rooms.', 200.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485290/FurniStyle/a8rh4zd3ttt7hdigqcc4.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(15, 2, 'Desk Table', 'Functional office desk with multiple compartments.', 180.00, 40, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485315/FurniStyle/zaeyrkp5utnodrhla9t6.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(16, 2, 'Folding Dining Table', 'Compact folding dining table for space-saving.', 120.00, 50, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485341/FurniStyle/sph6xqqltv7sjgkpqjkk.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(17, 2, 'Modern Glass Table', 'Contemporary glass table with a unique design.', 450.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485367/FurniStyle/gkgsvpotwtwvopfcfmef.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(18, 2, 'Rectangular Dining Table', 'Rectangular wooden dining table with sturdy legs.', 600.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485390/FurniStyle/b2hjnjkmbg2h11580lhm.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(19, 2, 'Wooden Side Table', 'Side table made from durable wood, great for living rooms.', 100.00, 40, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485421/FurniStyle/pu20mwi8chsq61n9zl5h.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(20, 2, 'Console Table', 'Slim and stylish console table for hallway or entryway.', 150.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485448/FurniStyle/ocwk1xwtdvragzfseemj.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(21, 3, 'Leather Sofa', 'Luxurious leather sofa with modern design.', 800.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485509/FurniStyle/ddw1z4sn2r6w1hnxrigx.png', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(22, 3, 'Fabric Sofa', 'Soft and comfortable fabric sofa for the living room.', 650.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485535/FurniStyle/ksbpzvfjwibxnmig9xiy.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(23, 3, 'Reclining Sofa', 'Sofa with reclining features for extra comfort.', 950.00, 5, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485563/FurniStyle/erspmfgcjazizpruramn.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(24, 3, 'Sectional Sofa', 'Spacious sectional sofa for large living rooms.', 1200.00, 8, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485584/FurniStyle/mvjeaenexfce9wrpimnx.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(25, 3, 'Loveseat Sofa', 'Small two-seater sofa, perfect for cozy spaces.', 400.00, 20, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485615/FurniStyle/tjvkayx5tvcjq29moqn4.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(26, 3, 'Sofa Bed', 'Convertible sofa that transforms into a bed for guests.', 700.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485635/FurniStyle/phdbhuysxh66ndmbpext.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(27, 3, 'Mid-Century Sofa', 'Mid-century style sofa with wooden legs and cushions.', 850.00, 12, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485659/FurniStyle/gc6276qh6gv8ww6tb4z3.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(28, 3, 'Chaise Lounge', 'Elegant chaise lounge for relaxation.', 600.00, 5, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485690/FurniStyle/xkzgddte4a0fb591qfwm.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(29, 3, 'Compact Sofa', 'Compact sofa for small apartments and rooms.', 400.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485713/FurniStyle/eqfmrpbicr5wlehrhmfu.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(30, 3, 'Convertible Sofa', 'Space-saving convertible sofa with storage.', 500.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485743/FurniStyle/vwqteavfaydu7wuzhyq4.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(31, 4, 'King Size Bed', 'King size bed with solid wood frame and comfortable mattress.', 1200.00, 8, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485821/FurniStyle/qrjprsrd6nwbvcuqzrld.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(32, 4, 'Queen Size Bed', 'Queen size bed with memory foam mattress.', 900.00, 12, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485831/FurniStyle/fmgec3wj5znbubfbtkbk.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(33, 4, 'Bunk Bed', 'Wooden bunk bed for kids room with safety rails.', 500.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485838/FurniStyle/y3uispgzvsdic3u9xkan.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(34, 4, 'Double Bed', 'Double bed with metal frame and modern design.', 650.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485852/FurniStyle/wl25r6o7zfhozx7ex4gx.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(35, 4, 'Sleigh Bed', 'Elegant sleigh bed with curved wooden frame.', 1000.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485860/FurniStyle/vlodnncaaby1uo192ou2.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(36, 4, 'Platform Bed', 'Platform bed with sleek design and storage drawers.', 700.00, 18, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485871/FurniStyle/bf6t9yptktduhsloudjv.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(37, 4, 'Trundle Bed', 'Trundle bed for space-saving, ideal for guest rooms.', 750.00, 8, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485894/FurniStyle/xnxordqtykhfsw87jb9d.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(38, 4, 'Daybed', 'Versatile daybed for lounging or sleeping.', 550.00, 12, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485903/FurniStyle/nquxjerahoykvdfw0ym9.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(39, 4, 'Adjustable Bed', 'Bed with adjustable frame and head support.', 1300.00, 6, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485917/FurniStyle/kr8i6uin5ecskl8nx7si.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(40, 4, 'Murphy Bed', 'Foldable Murphy bed for maximizing space in small rooms.', 1100.00, 5, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731485929/FurniStyle/tlpxefw0h2o9odqncjnd.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(41, 5, 'Wardrobe', 'Large wardrobe with multiple compartments and hanging space.', 400.00, 20, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486107/FurniStyle/boq35oe4tgsixlh28tq4.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(42, 5, 'Bookshelf', 'Wooden bookshelf for books and decorative items.', 150.00, 40, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486130/FurniStyle/ur0bduhpvuu1yrbcivx8.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(43, 5, 'Cabinet', 'Modern cabinet with glass doors for storage.', 200.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486143/FurniStyle/l3st6cowdvnm5dbmpbbu.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(44, 5, 'Storage Chest', 'Wooden storage chest with a vintage look.', 180.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486154/FurniStyle/dhaf6mdfcwcx3ddlzabd.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(45, 5, 'Closet Organizer', 'Closet organizer with shelves and hooks.', 75.00, 60, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486167/FurniStyle/tyqfdwdo7ldflfjjax3p.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(46, 5, 'Drawer Cabinet', 'Compact drawer cabinet for small office storage.', 120.00, 35, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486179/FurniStyle/wozfabv3c4hmxvhywcmf.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(47, 5, 'Shoe Rack', 'Shoe rack with multiple compartments for organizing footwear.', 50.00, 50, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486192/FurniStyle/c6pi0cbzejbh2kreryq5.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(48, 5, 'Chest of Drawers', 'Elegant chest of drawers for bedroom storage.', 250.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486204/FurniStyle/qt5ivje42ixgjqojtynj.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(49, 5, 'Bathroom Storage', 'Space-saving storage unit for bathroom essentials.', 90.00, 45, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486216/FurniStyle/aah8hmuceqnvyx9rmhy4.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(50, 5, 'File Cabinet', 'Heavy-duty file cabinet for office use.', 180.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486227/FurniStyle/bdv9quyxofh3rolnhxed.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(51, 6, 'Chandelier', 'Elegant crystal chandelier for living rooms or dining rooms.', 400.00, 10, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731486237/FurniStyle/tsloulxv4mgtfox1kbuu.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(52, 6, 'Table Lamp', 'Modern table lamp with adjustable light settings.', 60.00, 50, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487296/FurniStyle/hspzaauzjyv68eaabesa.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(53, 6, 'Floor Lamp', 'Tall standing floor lamp for brightening up any room.', 100.00, 30, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487308/FurniStyle/ipvphgn7aoufqdd6khao.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(54, 6, 'Pendant Light', 'Stylish pendant lighting for kitchen or dining room.', 80.00, 40, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487314/FurniStyle/rintyma3jvlauongxmv8.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(55, 6, 'Ceiling Fan with Light', 'Ceiling fan with built-in light for home cooling and lighting.', 150.00, 15, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487330/FurniStyle/xih4iutgwovez94w96gg.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(56, 6, 'Wall Sconce', 'Sconce wall light, perfect for hallways and bedrooms.', 75.00, 45, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487341/FurniStyle/wib4kncpdsbiq4paiyv0.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(57, 6, 'LED Strip Lights', 'Flexible LED strip lights for decorative lighting.', 50.00, 60, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487353/FurniStyle/qmespw0lywbrsjguywfi.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(58, 6, 'Outdoor Lanterns', 'Weather-resistant outdoor lanterns for patio lighting.', 120.00, 25, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487365/FurniStyle/k8p0jmdogzjlfo9ef0ix.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(59, 6, 'Night Lamp', 'Cute and functional night lamp for kids room.', 30.00, 100, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487394/FurniStyle/lbswvdx87vopnuttkrxf.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54'),
(60, 6, 'Recessed Ceiling Lights', 'Sleek and modern recessed ceiling lights for any room.', 200.00, 18, 'https://res.cloudinary.com/duajxyeqr/image/upload/v1731487395/FurniStyle/paxyv3cczago8ctyuenw.jpg', '2024-11-12 15:53:54', '2024-11-12 15:53:54');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL DEFAULT 0,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 5, 'Great product, highly recommend!', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(2, 2, 2, 4, 'Good quality, but could be a bit cheaper.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(3, 3, 3, 5, 'Absolutely love it! Worth every penny.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(4, 3, 4, 3, 'It\'s okay, but the color is not what I expected.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(5, 4, 5, 4, 'Decent, but a little too firm for my taste.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(6, 4, 6, 5, 'Amazing chair, very comfortable and stylish.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(7, 5, 7, 4, 'Good table, but I had trouble assembling it.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(8, 5, 8, 3, 'The material feels cheap, but it works for the price.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(9, 6, 9, 5, 'Fantastic product! Worth the investment!', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(10, 6, 10, 4, 'Pretty good, but the assembly instructions were unclear.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(11, 7, 11, 5, 'Very sturdy and easy to assemble. I\'m impressed.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(12, 7, 12, 4, 'Comfortable, but could use more cushion.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(13, 8, 13, 3, 'Looks great, but the quality isn\'t as expected.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(14, 8, 14, 5, 'Best purchase ever! Exactly what I was looking for.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(15, 9, 15, 4, 'Nice design, but the color didn\'t match the image.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(16, 9, 16, 3, 'It\'s functional, but the legs feel wobbly.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(17, 10, 17, 5, 'Perfect size and design for my home office!', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(18, 10, 18, 4, 'The chair is good, but it could use better armrests.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(19, 2, 19, 4, 'Pretty decent overall, would buy again.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(20, 3, 20, 3, 'Not the best, but it serves its purpose.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(21, 4, 21, 5, 'Excellent table. Perfect for my workspace.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(22, 5, 22, 4, 'Nice but a bit overpriced for what you get.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(23, 6, 23, 5, 'Sleek design, fits perfectly in my living room!', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(24, 7, 24, 4, 'Good quality, but delivery took too long.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(25, 8, 25, 3, 'Not bad, but I expected better quality.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(26, 9, 26, 5, 'Love it! Comfortable and stylish.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(27, 10, 27, 4, 'Great sofa, but I wish the cushions were firmer.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(28, 2, 28, 5, 'I am very satisfied with this product, highly recommend.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(29, 3, 29, 4, 'Solid product, but the delivery was delayed.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(30, 4, 30, 3, 'It\'s decent, but not as good as I expected.', '2024-11-12 15:54:27', '2024-11-12 15:54:27'),
(31, 12, 10, 2, 'bad quality', '2024-11-12 19:38:45', '2024-11-12 19:38:45'),
(32, 12, 1, 4, 'very durable', '2024-11-12 19:41:43', '2024-11-12 19:41:43'),
(33, 13, 11, 2, 'Not much durable. It started cracking from sides in just few days.', '2024-11-12 19:50:00', '2024-11-12 19:50:00'),
(34, 13, 8, 5, 'This was indeed a good product. Never expected this much.', '2024-11-12 20:02:21', '2024-11-12 20:02:21'),
(35, 12, 8, 2, 'Unfinished product', '2024-11-12 20:03:07', '2024-11-12 20:03:07'),
(36, 12, 41, 4, 'This is the best wardrobe anyone can but. Doors are so smooth. Been using it for 1 year straight and the quality doesn\'t degrade . So happy 😁😁😁😁', '2024-11-13 03:22:19', '2024-11-13 03:22:19'),
(37, 12, 51, 1, 'Very bad product. The bulbs in the chandelier got fused within a week...😢😢😢😢', '2024-11-13 03:23:44', '2024-11-13 03:23:44'),
(38, 12, 47, 4, 'good', '2024-11-13 04:51:41', '2024-11-13 04:51:41'),
(39, 12, 57, 5, 'very good product at a very reasonable price', '2024-11-13 09:47:17', '2024-11-13 09:47:17'),
(40, 12, 2, 3, 'Average chair with average looks', '2024-11-13 10:18:09', '2024-11-13 10:18:09');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('HUZKEDCuQSzxooyxbfNpARK8QKw5P4d3ShqGKLEf', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiOVczNHZrYUo3UEl4dVZyZUhlZXNsYW05WXdoZkxHWWJ2c3RydkpMVSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL3Byb2ZpbGUvcXVlcmllcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjEyO30=', 1731542446),
('kmmNpMa93KasavJd4mgNNFkczRHWLivZX5nFvO27', 12, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTjYxS3I3QTI5SDMyVFE0Z0xhQVV0cXFQNHZwbXkwTmZLdzRNdVhicSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyNzoiaHR0cDovLzEyNy4wLjAuMTo4MDAwL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTI7fQ==', 1731539560);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `role` enum('admin','customer') NOT NULL DEFAULT 'customer',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@example.com', NULL, '$2y$12$ny8B0xpxLJsOPl9RdSKrKub3iuZdOcYjtebMiYbvVuSD1i8g2FcSa', NULL, 'admin', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(2, 'John Doe', 'john.doe@example.com', NULL, '$2y$12$Ya2zMj7dmrNwjpLQd7oKuuAwC8bRZ3gDCg.zEVJX9gs1xrWWcZ2T.', '456 Main Road, City', 'customer', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(3, 'Jane Smith', 'jane.smith@example.com', NULL, '$2y$10$JwAt3LfUpwVmcgHpnfAjiKfi6Q97C8Jh9KkjJJxaIQbbI59g1/.A2', '789 Oak Street, City', 'customer', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(4, 'Mike Johnson', 'mike.johnson@example.com', NULL, '$2y$10$4Mz2s6rjIImrZevEzL7tDaDgRuH5pc0eWeF4kSlPfN9fGjwgybzQK', '321 Pine Avenue, City', 'customer', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(5, 'Sarah Williams', 'sarah.williams@example.com', NULL, '$2y$10$AuvflxgQb8gh1g7p1TwIkf.19YHkiv3cmM4I7V5sSzKbgXK0dpjj2', '987 Maple Drive, City', 'customer', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(6, 'David Brown', 'david.brown@example.com', NULL, '$2y$10$9Qq2W8sgz2fVKRE0N0lSYaM2EKpaU3rW24RIQbXij8uxMRj1gI9nG', '654 Birch Road, City', 'customer', NULL, '2024-11-12 15:52:22', '2024-11-12 15:52:22'),
(7, 'Alice Cooper', 'alice.cooper@example.com', NULL, '$2y$10$6lrHqZEdtwgptxo8rZtmQ/fGacbwQ9m4AseTLoBxsmJ0BxMjAP9Sa', '123 Rose Street, City', 'customer', NULL, '2024-11-12 15:52:39', '2024-11-12 15:52:39'),
(8, 'Bob Martin', 'bob.martin@example.com', NULL, '$2y$10$y5EoK5gNl9shR8gVxwQH1D2Lds/.T3rB2tJaqOovm5F7Q0M1OGqaC', '456 Lavender Lane, City', 'customer', NULL, '2024-11-12 15:52:39', '2024-11-12 15:52:39'),
(9, 'Cathy Thompson', 'cathy.thompson@example.com', NULL, '$2y$10$1kN0I.dYmS5TxrHDngThB.sYe9f1Mw8OG8Re2t2wW5/IKxnTfGb8S', '789 Pinehurst Drive, City', 'customer', NULL, '2024-11-12 15:52:39', '2024-11-12 15:52:39'),
(10, 'Daniel Lee', 'daniel.lee@example.com', NULL, '$2y$10$P9mf8dZTpm1IpmYoB1ZqSy5V5osCun98CqWZzmWwbM7df7Qmj7w5y', '101 Oakwood Avenue, City', 'customer', NULL, '2024-11-12 15:52:39', '2024-11-12 15:52:39'),
(12, 'Aryan Srivastava', 'aryansrivas123@gmail.com', NULL, '$2y$12$EDe2yv6fsEBGScszAhC3w.pZYz/btPWW7UIeUNkXGVS6CVaMgrt1y', '133/98,Mahaviran Lane,Mutthiganj,Prayragraj', 'customer', NULL, '2024-11-12 11:52:47', '2024-11-13 10:11:34'),
(13, 'Sahar Mukhtar', 'blink243@gmail.com', NULL, '$2y$12$L9C1GRBZn12HX/mUFf8KAe5OzoFvqWjSxM060qPaxqBQSUGebNNfe', NULL, 'customer', NULL, '2024-11-12 19:49:06', '2024-11-12 19:49:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
