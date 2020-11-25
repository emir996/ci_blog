-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 02:45 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `uploaded_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `file_name`, `post_id`, `uploaded_on`) VALUES
(104, 'blog123.jpg', 103, '2020-11-25 02:24:26'),
(105, 'someimage.jpg', 103, '2020-11-25 02:24:26'),
(106, 'download.jpg', 103, '2020-11-25 02:27:15'),
(107, 'personal-blog.jpg', 104, '2020-11-25 02:36:48'),
(108, 'someimage1.jpg', 104, '2020-11-25 02:36:48'),
(109, 'images.jpg', 105, '2020-11-25 02:37:32'),
(110, 'blog1231.jpg', 107, '2020-11-25 02:39:40'),
(111, 'personal-blog1.jpg', 107, '2020-11-25 02:39:40'),
(112, '1578366211820_6.png', 108, '2020-11-25 02:41:22'),
(113, 'personal-blog2.jpg', 108, '2020-11-25 02:41:22'),
(114, 'practice1.jpg', 108, '2020-11-25 02:41:22'),
(115, 'someimage2.jpg', 108, '2020-11-25 02:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `body`, `user_id`, `created_at`) VALUES
(103, 'Post two', 'post-two', '<p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.</p>\r\n', 1, '2020-11-25 01:24:26'),
(104, 'Post three', 'post-three', '<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.</p>\r\n', 1, '2020-11-25 01:36:48'),
(105, 'Some new post', 'some-new-post', '<p>Praesent at luctus eros. Nunc nisi odio, interdum ultricies viverra eget, dictum quis sapien. Vivamus hendrerit, leo sit amet dictum condimentum, lorem ex iaculis neque, quis ultricies ipsum libero sed leo. In consequat, purus quis facilisis tempor, nibh metus consectetur lacus, nec convallis nisl eros ac velit. Quisque scelerisque diam vitae aliquet iaculis. Donec non consectetur libero. Suspendisse rhoncus turpis non velit consequat, at lacinia est porttitor. Maecenas facilisis lacus magna, non bibendum nisi tempus ac. Quisque dolor turpis, porta a sapien nec, lobortis mattis nunc. In vel enim bibendum, auctor eros et, vestibulum magna.</p>\r\n', 1, '2020-11-25 01:37:32'),
(106, 'Blog post codeigniter', 'blog-post-codeigniter', '<p>In hac habitasse platea dictumst. Donec vel orci at elit gravida blandit. Suspendisse et lacus purus. Sed tempor non risus in suscipit. Fusce interdum, ante eu interdum commodo, tortor nulla pretium tellus, nec vehicula magna nulla bibendum ligula. Cras tortor libero, luctus nec facilisis nec, blandit vitae nisl. Mauris eget hendrerit nisi, quis varius risus. Nullam maximus quam sed erat tristique volutpat.</p>\r\n', 1, '2020-11-25 01:38:42'),
(107, 'PHP Web Developer', 'php-web-developer', '<p>Donec vitae blandit sapien. In viverra ligula quis metus venenatis, ultrices sagittis augue varius. Cras eu dolor auctor, imperdiet nulla non, interdum nunc. Praesent pharetra arcu eu sapien congue, ac vehicula odio venenatis. Phasellus et risus vel nunc porttitor porta. Mauris faucibus semper porttitor. Proin suscipit, turpis eu tincidunt viverra, libero velit tincidunt dolor, id aliquet turpis erat vel massa. Nulla facilisi. Aenean ac velit non lorem aliquet placerat et ac mauris. Vivamus vehicula, augue eget semper tempus, dui odio commodo urna, eget scelerisque felis dolor quis nisl. Vestibulum bibendum risus in augue lobortis placerat. Integer a dolor urna. Duis tortor magna, tempor vel facilisis id, ultricies sed risus</p>\r\n', 1, '2020-11-25 01:39:40'),
(108, 'Laravel blog post', 'laravel-blog-post', '<p>Donec vitae blandit sapien. In viverra ligula quis metus venenatis, ultrices sagittis augue varius. Cras eu dolor auctor, imperdiet nulla non, interdum nunc. Praesent pharetra arcu eu sapien congue, ac vehicula odio venenatis. Phasellus et risus vel nunc porttitor porta. Mauris faucibus semper porttitor. Proin suscipit, turpis eu tincidunt viverra, libero velit tincidunt dolor, id aliquet turpis erat vel massa. Nulla facilisi. Aenean ac velit non lorem aliquet placerat et ac mauris. Vivamus vehicula, augue eget semper tempus, dui odio commodo urna, eget scelerisque felis dolor quis nisl. Vestibulum bibendum risus in augue lobortis placerat. Integer a dolor urna. Duis tortor magna, tempor vel facilisis id, ultricies sed risus</p>\r\n', 1, '2020-11-25 01:41:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `zipcode` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `zipcode`, `email`, `username`, `password`, `register_date`) VALUES
(1, 'emir', '31300', 'emirdzin@gmail.com', 'emco', '1a1dc91c907325c69271ddf0c944bc72', '2020-11-23 00:40:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
