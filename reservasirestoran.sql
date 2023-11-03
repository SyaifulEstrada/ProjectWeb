-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 14, 2023 at 04:20 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasirestoran`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `table_id`, `created_at`, `updated_at`) VALUES
(1, 'Eloy', '2', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(2, 'Magdalena', '3', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(3, 'Brooklyn', '9', '2023-02-13 07:19:20', '2023-02-13 07:19:20');

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
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_invoice` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ingredients_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`food_id`, `name`, `id_invoice`, `image`, `ingredients_name`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 'Cd', NULL, 'public/menus/rBHmOZ9ynE9Bgg4IkKCpojtwhlcATBV2uSuHjhs9.png', 'Plastik', 11, 100000, '2023-02-13 17:17:47', '2023-02-13 17:17:47');

--
-- Triggers `food_items`
--
DELIMITER $$
CREATE TRIGGER `price_store` AFTER INSERT ON `food_items` FOR EACH ROW BEGIN
            INSERT INTO menus VALUES (menu_id, new.price, new.food_id, new.created_at, new.updated_at);
          END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `ingredients`
--

CREATE TABLE `ingredients` (
  `ingredients_id` bigint(20) UNSIGNED NOT NULL,
  `ingredients_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kitchen_staff`
--

CREATE TABLE `kitchen_staff` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kitchen_staff`
--

INSERT INTO `kitchen_staff` (`user_id`, `name`, `gender`, `email`, `password`, `phone`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Adrain', 'voluptatem', 'Jayson@yahoo.com', 'password', '1155485787', 'enim', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(2, 'Kaitlyn', 'voluptate', 'Lawrence@gmail.com', 'password', '1375994911', 'nihil', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(3, 'Kareem', 'facere', 'Gayle@yahoo.com', 'password', '447576413', 'eum', '2023-02-13 07:19:20', '2023-02-13 07:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`menu_id`, `price`, `food_id`, `created_at`, `updated_at`) VALUES
(1, '100000.00', 1, '2023-02-13 17:17:47', '2023-02-13 17:17:47');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_01_13_012802_create_customers', 1),
(6, '2023_01_13_012803_create_kitchen_staff', 1),
(7, '2023_01_13_012805_create_orders', 1),
(8, '2023_01_13_012827_create_payments', 1),
(9, '2023_01_13_012838_create_reservations', 1),
(10, '2023_01_13_012901_create_food_items', 1),
(11, '2023_01_13_012902_create_menus', 1),
(12, '2023_01_13_012904_create_restaurant_staff', 1),
(13, '2023_01_17_093733_create_order_items', 1),
(14, '2023_01_17_093734_create_ingredients', 1),
(15, '2023_01_23_013307_create_insert_price_to_menus', 1),
(16, '2023_01_27_054524_create_insert_into_orders', 1),
(17, '2023_02_13_125723_create_reservation_payments_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, '2023-02-13 07:19:36', '2023-02-13 07:19:36'),
(2, 1, NULL, '2023-02-13 17:20:52', '2023-02-13 17:20:52'),
(3, 3, NULL, '2023-02-13 17:48:26', '2023-02-13 17:48:26'),
(4, 1, NULL, '2023-02-13 18:02:30', '2023-02-13 18:02:30');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `food_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` bigint(20) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `ingredients_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `food_id`, `quantity`, `unit_price`, `ingredients_name`, `customer_name`, `created_at`, `updated_at`) VALUES
(1, 1, 5, '50000.00', 'Plastik', 'Magdalena', '2023-02-13 17:18:14', '2023-02-13 17:18:14'),
(2, 1, 4, '60000.00', 'Plastik', 'Brooklyn', '2023-02-13 17:23:49', '2023-02-13 17:23:49'),
(1, 1, 1, '60000.00', 'Plastik', 'Eloy', '2023-02-13 17:25:11', '2023-02-13 17:25:11');

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `food_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id_invoice`, `order_id`, `payment_date`, `payment_amount`, `customer_name`, `food_id`, `created_at`, `updated_at`) VALUES
(1, 2, '2023-02-14', '60000.00', 'Brooklyn', 1, '2023-02-13 17:23:59', '2023-02-13 17:23:59'),
(2, 1, '2023-02-14', '60000.00', 'Eloy', 1, '2023-02-13 17:25:18', '2023-02-13 17:25:18'),
(3, 1, '2023-02-14', '60000.00', 'Eloy', 1, '2023-02-13 17:25:27', '2023-02-13 17:25:27');

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_guest` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `customer_id`, `date`, `time`, `no_of_guest`, `created_at`, `updated_at`) VALUES
(1, 3, '2023-02-13', '21:19', 3, '2023-02-13 07:19:36', '2023-02-13 07:19:36'),
(2, 1, '2023-02-14', '07:20', 1, '2023-02-13 17:20:52', '2023-02-13 17:20:52'),
(3, 3, '2023-02-15', '07:48', 3, '2023-02-13 17:48:26', '2023-02-13 17:48:26'),
(4, 1, '2023-02-14', '08:02', 1, '2023-02-13 18:02:30', '2023-02-13 18:02:30');

--
-- Triggers `reservations`
--
DELIMITER $$
CREATE TRIGGER `insert_into_orders` AFTER INSERT ON `reservations` FOR EACH ROW BEGIN
      INSERT INTO orders VALUES (order_id, new.customer_id, user_id, new.created_at, new.updated_at);
      END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation_payments`
--

CREATE TABLE `reservation_payments` (
  `id_invoice` bigint(20) UNSIGNED NOT NULL,
  `payment_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_amount` decimal(8,2) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_guest` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservation_payments`
--

INSERT INTO `reservation_payments` (`id_invoice`, `payment_date`, `payment_amount`, `customer_id`, `no_of_guest`, `created_at`, `updated_at`) VALUES
(1, '2023-02-13', '20000.00', 3, 9, '2023-02-13 07:31:55', '2023-02-13 07:31:55'),
(2, '2023-02-13', '20000.00', 3, 9, '2023-02-13 07:32:08', '2023-02-13 07:32:08'),
(3, '2023-02-14', '500000.00', 3, 9, '2023-02-13 17:22:34', '2023-02-13 17:22:34'),
(4, '2023-02-14', '50000.00', 3, 9, '2023-02-13 17:48:41', '2023-02-13 17:48:41'),
(5, '2023-02-14', '20000.00', 3, 9, '2023-02-13 18:02:56', '2023-02-13 18:02:56'),
(6, '2023-02-14', '20000.00', 3, 9, '2023-02-13 18:03:22', '2023-02-13 18:03:22'),
(7, '2023-02-14', '20000.00', 3, 9, '2023-02-13 18:04:31', '2023-02-13 18:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_staff`
--

CREATE TABLE `restaurant_staff` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `menu_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `restaurant_staff`
--

INSERT INTO `restaurant_staff` (`user_id`, `name`, `gender`, `email`, `password`, `phone`, `address`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 'Holly', 'dignissimos', 'Garnett@yahoo.com', 'password', '70531744', 'dignissimos', NULL, '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(2, 'Marian', 'ipsum', 'Jesus@yahoo.com', 'password', '1468741670', 'non', NULL, '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(3, 'Junior', 'ab', 'Idella@hotmail.com', 'password', '495418735', 'iusto', NULL, '2023-02-13 07:19:20', '2023-02-13 07:19:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Brooke', 'Amara@gmail.com', '2023-02-13 07:19:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ti1Wswnx5ZFOseYhePYqMRQyudVXBrFruEAaeekJVJnhzChAsTAHvdWm2fsB', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(2, 'Edmond', 'Katarina@gmail.com', '2023-02-13 07:19:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'subIz9dXXb', '2023-02-13 07:19:20', '2023-02-13 07:19:20'),
(3, 'Kameron', 'Hunter@gmail.com', '2023-02-13 07:19:20', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6SxH9aNXof', '2023-02-13 07:19:20', '2023-02-13 07:19:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`food_id`),
  ADD KEY `food_items_id_invoice_foreign` (`id_invoice`);

--
-- Indexes for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD PRIMARY KEY (`ingredients_id`),
  ADD KEY `ingredients_order_id_foreign` (`order_id`);

--
-- Indexes for table `kitchen_staff`
--
ALTER TABLE `kitchen_staff`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menus_food_id_foreign` (`food_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_food_id_foreign` (`food_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id_invoice`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `reservations_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  ADD PRIMARY KEY (`id_invoice`);

--
-- Indexes for table `restaurant_staff`
--
ALTER TABLE `restaurant_staff`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `restaurant_staff_menu_id_foreign` (`menu_id`);

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
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `food_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ingredients`
--
ALTER TABLE `ingredients`
  MODIFY `ingredients_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kitchen_staff`
--
ALTER TABLE `kitchen_staff`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `menu_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reservation_payments`
--
ALTER TABLE `reservation_payments`
  MODIFY `id_invoice` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `restaurant_staff`
--
ALTER TABLE `restaurant_staff`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `food_items_id_invoice_foreign` FOREIGN KEY (`id_invoice`) REFERENCES `payments` (`id_invoice`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ingredients`
--
ALTER TABLE `ingredients`
  ADD CONSTRAINT `ingredients_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order_items` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food_items` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `kitchen_staff` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_food_id_foreign` FOREIGN KEY (`food_id`) REFERENCES `food_items` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `restaurant_staff`
--
ALTER TABLE `restaurant_staff`
  ADD CONSTRAINT `restaurant_staff_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
