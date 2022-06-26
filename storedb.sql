-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 05:19 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `details` text NOT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `size`, `quantity`, `image`, `details`, `store_id`) VALUES
(1, 'T-shirt', 50, 'medium', 15, 'IMG-6138cf98a0fc15.73320536.jpg', 'Get custom designed United American Patriot clothing. Defend Our Defenders. Wrongful Imprisonment. Support American Patriots.', 1),
(2, 'T-shirt', 90, 'large', 100, 'IMG-6138cfbf48fdf4.50303169.jpg', 'All of Our Products Support The World Peace Connection Nonprofit Organization. The Coolest Non-Profit Merch in The World', 1),
(3, 'T-shirt', 88, 'X-Large', 20, 'IMG-6138cfe69582b6.11674282.jpg', 'A T-shirt, or tee shirt, is a style of fabric shirt named after the T shape of its body and sleeves. ', 1),
(4, 'T-shirt', 60, 'Small', 74, 'IMG-6138d01b3b1ab8.13134853.jpg', 'it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.', 1),
(5, 'T-shirt', 55, 'XX-Large', 11, 'IMG-6138d058c8f8f7.09346093.png', 'We look at how to write a detailed product description to elevate your campaign and to tell the story of your T-shirt design.', 1),
(6, 'Kids', 44, 'Small', 200, 'IMG-6138d0d1361dc6.83083889.jpg', 'We found the best t-shirts for kids that strike a balance between function and fashion by asking stylish parents to share their favorite', 2),
(7, 'Kids', 100, 'Small', 20, 'IMG-6138d0f7e55855.86042197.jpg', 'Kids t-shirt, toddler t-shirt. This funny llama pun shirt is adorable for tired moms and cute toddlers. Funny teacher gift, silly stocking stuffer for moms', 2),
(8, 'dress', 500, 'medium', 10, 'IMG-6138d15bbc8a21.12183363.jpg', 'A dress (also known as a frock or a gown) is a garment traditionally worn by women or girls consisting of a skirt with an attached bodice (or a matching bodice giving the effect of a one-piece garment).', 3),
(9, 'dress', 900, 'large', 15, 'IMG-6138d1892fb9d8.44597668.jpg', 'Dress is the general term for a garment: a black dress. Costume is used of the style of dress appropriate to some occasion, purpose, period, or character.', 3),
(10, 'dress', 60, 'large', 20, 'IMG-6138d1b5a160f5.51031782.jpg', 'I took the 5 most popular dresses at the time of writing and set out to write descriptions at least 200 words long. ', 3),
(11, 'T-shirt', 90, 'large', 5, 'IMG-6138d1f60367a8.26200704.jpg', 'it has short sleeves and a round neckline, known as a crew neck, which lacks a collar. T-shirts are generally made of a stretchy, light and inexpensive fabric and are easy to clean.', 4),
(12, 'T-shirt', 90, 'medium', 5, 'IMG-6138d2367baff2.71921466.jpg', 'A product description is copy on a product page that explains why someone ... Clothing type (t-shirt, skirt, dress); ', 5),
(13, 'T-shirt', 60, 'Small', 100, 'IMG-6138d255147b30.50294530.jpg', 'Fashion infographic : Dress Description - InfographicNow.com | Your Number One Source For daily infographics & visual creativity.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `location`, `description`, `image`, `user_id`) VALUES
(1, 'Bella Bella Boutique', 'beqaa', 'This shop has wide collection of pajamas, women and men clothes Underwear and linens.\r\nBella Bella Boutique has a good customer service and is ethical in doing business ', 'store1.jfif', 1),
(2, 'Boutique de Paris', 'Paris', 'Store looks amazing. Current cash back promo on the entire store is awesome. Price quality ratio is unbeatable.', 'store2.jpg', 2),
(3, 'Milana', 'ROMA', 'Milana is a luxury retail concept store. Our pioneering way of thinking combined with our innovative and eccentric manner of fashion have contributed in creating this unique and artistic environment.', 'store3.jfif', 3),
(4, 'Bend the Trend', 'Dubai', 'At last, a boutique that supplies dresses that no one else will be wearing. Fab quality dresses, delivery on time, beautifully wrapped. Excellent service.', 'store4.jfif', 4),
(5, 'Sunflower', 'Doha', 'Fashionable womenswear chain; some stores also include menswear, plus-sizes and maternity clothing.', 'store5.jfif', 5);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `is_seller` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `gender`, `is_seller`) VALUES
(1, 'Bella', 'Bella', 'bella@gmail.com', 'fb04ca5cbf3712ba3889d11fb68e52e761935382ade7468bd46d034fba81a39c', 1, 1),
(2, 'des', 'paris', 'paris@gmail.com', '248997b85071660596a31e818b0a6f796816876333c4ec6e46b43d98e7347007', 0, 1),
(3, 'milana', 'milana', 'milana@gmail.com', 'e1233d90d58483aaa43e6b42cc7760342f7dfe8bbde175a6d81b0721c58a62bb', 1, 1),
(4, 'bend', 'trend', 'bend@gmail.com', '186917dc7f28828d97f56ca4eef159b11a573af1a6ad60b057688acbc1d52bec', 1, 1),
(5, 'sun', 'flower', 'sun@gmail.com', '30108c4c21bbf2a0e7445efb1724c2abdb8aafa65ec8333cfef61fb5b7140804', 1, 1),
(6, 'Ammar', 'Zaarour', 'ammar@gmail.com', '9ea1d3fe655108e0bf9389f99b90828f690c00d19e6cc0d8a8d01d9d696b47af', 1, 0),
(7, 'Rayan', 'Zaarour', 'rayan@gmail.com', '42b37523205ec56efb2e6e272dc3ec7c5067ca99b042a9467810069affec7532', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_buy_products`
--

CREATE TABLE `users_buy_products` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_buy_products`
--

INSERT INTO `users_buy_products` (`user_id`, `product_id`) VALUES
(7, 12),
(7, 2),
(6, 5),
(6, 11),
(6, 3),
(6, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
