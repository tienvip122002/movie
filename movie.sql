-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 10, 2023 lúc 04:55 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `movie`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `status`, `slug`) VALUES
(10, 'Phim mới', 'ok chưae', 1, 'phim-moi'),
(11, 'phim ảo', 'dđ', 1, 'phim-ao'),
(12, 'phim mĩ', 'êffef', 1, 'phim-mi'),
(13, 'phim 18', 'ngon vái lúa', 1, 'phim-18'),
(16, 'Phim chiếu rạp', 'phim dò rỉ từ rạp', 1, 'phim-chieu-rap'),
(17, 'Phim lẻ', 'phim cho ai', 1, 'phim-le');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `title`, `description`, `status`, `slug`) VALUES
(6, 'Việt Nam', 'vn', 1, 'viet-nam'),
(7, 'China', 'rác', 1, 'china'),
(8, 'Hàn rea', 'xinh', 1, 'han-rea'),
(9, 'Thái dúi', 'chuyển giới', 1, 'thai-dui');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `episodes`
--

CREATE TABLE `episodes` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `link_movie` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `episode` int(11) NOT NULL,
  `updated_at` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `episodes`
--

INSERT INTO `episodes` (`id`, `movie_id`, `link_movie`, `episode`, `updated_at`, `created_at`) VALUES
(5, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/JXFSbRi5zMY?si=kUa5uXw0wnTjVVk3\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 1, '2023-11-06 17:31:49', '2023-11-06 17:31:49'),
(6, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uQBnBnupn-M?si=FFr4p8PAF0TZguHw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 2, '2023-11-06 17:32:47', '2023-11-06 17:32:47'),
(7, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/uQBnBnupn-M?si=FFr4p8PAF0TZguHw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 3, '2023-11-06 17:33:02', '2023-11-06 17:33:02'),
(8, 19, '<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/a9VYxNj8Pew?si=TvV3TIdu3ffYqlhK\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', 4, '2023-11-07 16:09:24', '2023-11-07 16:09:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `genres`
--

INSERT INTO `genres` (`id`, `title`, `description`, `status`, `slug`) VALUES
(1, 'siêu nhân', 'vái ò', 1, 'sieu-nhan'),
(11, 'hành động', 'hay lắm', 1, 'hanh-dong'),
(12, 'võ thuật', 'hay kinh', 1, 'vo-thuat');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `status` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phimhot` int(11) NOT NULL,
  `name_eng` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `resolution` int(11) NOT NULL DEFAULT 0,
  `phude` int(11) NOT NULL DEFAULT 0,
  `ngaytao` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `ngaycapnhat` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `year` varchar(20) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `movie_time` varchar(50) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `tags` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `topview` int(11) DEFAULT NULL,
  `season` int(11) NOT NULL DEFAULT 0,
  `trailer` varchar(200) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `sotap` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `movies`
--

INSERT INTO `movies` (`id`, `title`, `description`, `status`, `image`, `category_id`, `genre_id`, `country_id`, `slug`, `phimhot`, `name_eng`, `resolution`, `phude`, `ngaytao`, `ngaycapnhat`, `year`, `movie_time`, `tags`, `topview`, `season`, `trailer`, `sotap`) VALUES
(9, 'yor edfe', 'êfefefe', 1, 'chat-gpt-la-gi-tat-tan-tat-nhung-dieu-can-biet-ve-chat-gpt6446.jpg', 10, 1, 6, 'yor-edfe', 1, 'spy X family', 0, 0, NULL, '2023-10-17 02:51:06', NULL, NULL, NULL, 1, 0, NULL, 1),
(10, 'haha', 'dưdw', 1, 'z4772223131037_d7cf92e07ed784b476ecfa293dc112465718.jpg', 10, 11, 6, 'haha', 1, 'show me', 0, 0, NULL, '2023-10-11 16:15:15', '2022', NULL, NULL, 2, 0, NULL, 1),
(11, 'phim siêu anh hùng vn', 'Tôi là Captain America đây. Cuộc sống của anh dạo này thế nào rồi? Cho tôi gửi lời hỏi thăm sức khỏe tới anh và các bạn của anh nhé. Mọi người vẫn khỏe cả chứ? Tôi rất ngưỡng mộ anh và cả những người bạn của anh lắm đó! Tôi thì vẫn rất khỏe, thậm chí đang tràn đầy nhiệt huyết vì tôi vừa được giao một sứ mệnh mới: đó là làm cho tất cả các con đường trên thế giới trở nên an toàn hơn cho trẻ em. Bây giờ tôi thông báo cho anh thêm một tin vui là chiếc khiên của tôi đã được nâng cấp một cách hoàn hảo, giờ đầy không một vũ khí nào có thể phá hủy được chiếc khiên này của tôi nữa rồi. Với sức mạnh này, tôi cũng có thể đảm bảo trật tự an toàn giao thông. Đây cũng là nhiệm vụ mới và đối với tôi đây là một nhiệm vụ đặc biệt quan trọng. Bằng quyết tâm của mình, tôi sẽ truyền cảm hứng cho những người khác tham gia cùng tôi trong sứ mệnh này và vượt qua mọi trở ngại có thể phát sinh trong quá trình thực hiện.', 1, 'Screenshot 2023-08-22 0008259242.png', 10, 11, 6, 'phim-sieu-anh-hung-vn', 1, 'supperman', 1, 0, NULL, '2023-10-11 16:15:30', '2019', NULL, NULL, 0, 5, NULL, 1),
(12, 'phim bố già', 'Bộ phim Bố già kể xoay quanh một xóm nghèo có bộ tứ nhiều chuyện Giàu - Sang - Phú - Quý, nhưng nhân vật chính là ông Ba Sang (do Trấn Thành thủ vai) và cậu con trai cứng đầu của mình tên là Quắn (do Tuấn Trần thủ vai).', 1, 'bo-gia-quoc-te-jpeg-3870-16190802213910.jpg', 10, 11, 6, 'phim-bo-gia', 1, 'Bo Gia', 4, 1, NULL, '2023-10-13 02:08:43', '1992', '133 phút', 'Bố Già vietsub, Bố Già vietsub, Bố Già vietsub, Bố Già vietsub Bố Già vietsub Bố Già vietsub Bố Già ,vietsub Bố Già vietsub Bố Già vietsub Bố Già ,vietsub Bố ,Già vietsub, Bố Già vietsub Bố Già v,ietsub Bố Già vietsub, Bố Già vietsub Bố Già ,vietsub Bố', 0, 1, 'hktzirCnJmQ', 1),
(13, 'êfefêff', 'oyota FJ Cruiser là dòng xe địa hình có kiểu dáng thiết kế khác biệt hoàn toàn với phong cách các thành viên còn lại của hãng xe Nhật Bản, giống G-Class của Mercedes-Benz hay Defender của Land Rover. Vào thời điểm 2007-2010, Toyota FJ Cruiser được nhiều người chơi xe ưa thích nhờ vẻ ngoài hầm hố và có phần lạ mắt. Tuy vậy đến năm 2014', 1, 'Nitro_Wallpaper_5000x28135513.jpg', 10, 11, 6, 'efefeff', 1, 'coffeechill', 0, 0, '2023-10-13 02:01:52', '2023-10-13 02:16:03', NULL, NULL, 'oyota FJ Cruiser là dòng xe địa hình có kiểu dáng thiết kế khác biệt hoàn toàn với phong cách các thành viên còn lại của hãng xe Nhật Bản, giống G-Class của Mercedes-Benz hay Defender của Land Rover. Vào thời điểm 2007-2010, Toyota FJ Cruiser được nhiều người chơi xe ưa thích nhờ vẻ ngoài hầm hố và có phần lạ mắt. Tuy vậy đến năm 2014', NULL, 0, 'F_muWc2rCOU', 1),
(15, 'RUNNING MAN', 'Running Man là show nằm trong chương trình New Sunday của đài SBS được VIETSUB, cùng với Heroes (Kara Nicole, IU, Narsha, Lee Jin…) được phát sóng tiếp theo sau đó. Đây là show “hành động đô thị” mới lạ chưa từng có, đánh dấu sự trở lại của MC quốc dân Yu Jae-suk sau khi anh rời chương trình Good Sunday’s Family Outing vào tháng 2/2010. Xem Running Man, đảm bảo các bạn sẽ phải cười lăn cười bò vì sự hài hước của các thành viên, cũng như những nhiệm vụ oái ăm mà họ phải chịu đựng trong suốt chương trình.', 1, '9934735213.png', 10, 11, 6, 'running-man', 1, 'RUNNING MAN', 0, 0, '2023-10-16 14:23:13', '2023-10-16 15:34:23', NULL, '133 phút', 'Running Man là show nằm trong chương trình New Sunday của đài SBS được VIETSUB, cùng với Heroes (Kara Nicole, IU, Narsha, Lee Jin…) được phát sóng tiếp theo sau đó. Đây là show “hành động đô thị” mới lạ chưa từng có, đánh dấu sự trở lại của MC quốc dân Yu Jae-suk sau khi anh rời chương trình Good Sunday’s Family Outing vào tháng 2/2010. Xem Running Man, đảm bảo các bạn sẽ phải cười lăn cười bò vì sự hài hước của các thành viên, cũng như những nhiệm vụ oái ăm mà họ phải chịu đựng trong suốt chương trình.', NULL, 0, NULL, 1),
(16, 'HỔ HẠC YÊU SƯ LỤC', 'Hổ Hạc Yêu Sư Lục kể về góc nhìn của Hổ Tử và Hiểu Hiên về một nhóm thanh thiếu niên, vì ước mơ, vì tình yêu và trách nhiệm, trong nước mắt và tiếng cười để giải tỏa , vượt qua khó khăn giải cứu thiên hạ. Cô bé mồ côi trên núi lạc quan và vui vẻ Hổ Tử đã vô tình nuốt chửng chí dương bảo vật xích châu. Cô còn gặp Kỳ Hiểu Hiên đội trưởng của quỷ vương triều lạnh lùng nghiêm nghị yêu sạch sẽ. Hai người trẻ với những tính cách rất khác nhau buộc phải đi chung con đường vì một viên xích châu, không những vậy họ còn quen với Triệu Hinh Đồng, Vương Vũ Thiên, Sơn Trà và những người khác. Bọn họ lúc đầu ghét bỏ phòng bị nhau đến bị thu hút bởi sự khác biệt và chớp nhoáng của nhau. Ở một phen trải qua nguy hiểm họ trở nên thân thiết hơn, để bảo hộ Hổ Tử, Kỳ Hiểu Hiên đã bị vào nhà giam. Để cứu Hiểu Hiên, Hổ Tử cùng các bạn cùng nhau tham gia chọn lựa, kết quả là họ đã tiết lộ âm mưu lớn của Quốc Ngự Yêu Sư và tìm ra chân tướng cuộc chiến giữa các yêu quái cách đây năm trăm năm. Bị áp chế năm trăm năm yêu quân rục rịch, ý đồ hủy diệt nhân gian. Ngay khi tham vọng của thế giới loài người và yêu quái sắp mang đến một thảm họa cho thế giới, một nhóm thanh niên đầy nhiệt huyết với ước mơ sẽ không ngần ngại hy sinh thân mình để giải cứu thế giới.', 1, 'png-clipart-sheep-lamb-and-mutton-cuteness-mild-cartoon-sheep-cartoon-character-white56.png', 10, 11, 6, 'ho-hac-yeu-su-luc', 1, 'HỔ HẠC YÊU SƯ LỤC', 0, 0, '2023-10-16 15:10:56', '2023-10-16 15:10:56', NULL, '1h:30\':22s', 'Hổ Hạc Yêu Sư Lục kể về góc nhìn của Hổ Tử và Hiểu Hiên về một nhóm thanh thiếu niên, vì ước mơ, vì tình yêu và trách nhiệm, trong nước mắt và tiếng cười để giải tỏa , vượt qua khó khăn giải cứu thiên hạ. Cô bé mồ côi trên núi lạc quan và vui vẻ Hổ Tử đã vô tình nuốt chửng chí dương bảo vật xích châu. Cô còn gặp Kỳ Hiểu Hiên đội trưởng của quỷ vương triều lạnh lùng nghiêm nghị yêu sạch sẽ. Hai người trẻ với những tính cách rất khác nhau buộc phải đi chung con đường vì một viên xích châu, không những vậy họ còn quen với Triệu Hinh Đồng, Vương Vũ Thiên, Sơn Trà và những người khác. Bọn họ lúc đầu ghét bỏ phòng bị nhau đến bị thu hút bởi sự khác biệt và chớp nhoáng của nhau. Ở một phen trải qua nguy hiểm họ trở nên thân thiết hơn, để bảo hộ Hổ Tử, Kỳ Hiểu Hiên đã bị vào nhà giam. Để cứu Hiểu Hiên, Hổ Tử cùng các bạn cùng nhau tham gia chọn lựa, kết quả là họ đã tiết lộ âm mưu lớn của Quốc Ngự Yêu Sư và tìm ra chân tướng cuộc chiến giữa các yêu quái cách đây năm trăm năm. Bị áp chế năm trăm năm yêu quân rục rịch, ý đồ hủy diệt nhân gian. Ngay khi tham vọng của thế giới loài người và yêu quái sắp mang đến một thảm họa cho thế giới, một nhóm thanh niên đầy nhiệt huyết với ước mơ sẽ không ngần ngại hy sinh thân mình để giải cứu thế giới.', NULL, 0, NULL, 1),
(17, 'HỔ HẠC YÊU SƯ LỤCcc', 'd', 1, 'aaaaa3847.jpg', 10, 1, 6, 'ho-hac-yeu-su-luccc', 1, 'HỔ HẠC YÊU SƯ LỤCss', 0, 0, '2023-10-16 15:36:49', '2023-10-17 02:40:52', NULL, '133 phút', 'd', NULL, 0, NULL, 1),
(19, 'cô yor', 'cococcccc', 1, '838907337.png', 16, 1, 6, 'co-yor', 0, 'tiến phạm', 0, 0, '2023-10-17 02:51:51', '2023-11-10 16:02:59', NULL, '133 phút', 'ccccccccccccc', NULL, 0, NULL, 15);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `movie_genre`
--

CREATE TABLE `movie_genre` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `movie_genre`
--

INSERT INTO `movie_genre` (`id`, `movie_id`, `genre_id`) VALUES
(1, 16, 11),
(2, 16, 12),
(3, 16, 1),
(5, 15, 12),
(6, 15, 1),
(14, 9, 11),
(15, 17, 1),
(16, 17, 11),
(17, 17, 12),
(23, 19, 11),
(24, 19, 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
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
-- Cấu trúc bảng cho bảng `users`
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
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$uuPs.mTYOWJd5NbOzu12Te9nNfgLIt8qCGUAwN6DbmntZVcenbO8y', '4Y3hoNMduDuibv24VfAdWiyhnNik0HeOUhiZPyXyV0v46saLKSTeCreIWUA3', '2023-10-06 02:19:20', '2023-10-06 02:19:20');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `episodes`
--
ALTER TABLE `episodes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  ADD PRIMARY KEY (`id`),
  ADD KEY `genre_id` (`genre_id`),
  ADD KEY `genre_id_2` (`genre_id`),
  ADD KEY `movie_id` (`movie_id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `episodes`
--
ALTER TABLE `episodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `movie_genre`
--
ALTER TABLE `movie_genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
