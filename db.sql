-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versi server:                 10.4.20-MariaDB - mariadb.org binary distribution
-- OS Server:                    Win64
-- HeidiSQL Versi:               12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- membuang struktur untuk table fida_book.books
CREATE TABLE IF NOT EXISTS `books` (
  `id_book` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `writer` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `preview` text NOT NULL,
  `img` varchar(50) NOT NULL,
  PRIMARY KEY (`id_book`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel fida_book.books: ~14 rows (lebih kurang)
INSERT INTO `books` (`id_book`, `title`, `writer`, `category`, `preview`, `img`) VALUES
	(1, 'Atomic Habits', 'James Clear', 'Self Improvement', 'Orang mengira ketika Anda ingin mengubah hidup, Anda perlu memikirkan hal-hal besar. Namun pakar kebiasaan terkenal kelas dunia James Clear telah menemukan sebuah cara lain. Ia tahu bahwa perubahan nyata berasal dari efek gabungan ratusan keputusan kecil dari mengerjakan dua push-up sehari, bangun lima menit lebih awal, sampai menahan sebentar hasrat untuk menelepon. Ia menyebut semua tadi atomic habits.', 'atomic.jpg'),
	(2, 'Berani Tidak Disukai', 'Ichiro Kishimi dan Fumitake Koga', 'Self Improvement', 'Membaca buku ini bisa mengubah hidup anda. Mengungkap rahasia mengeluarkan kekuatan terpendam yang memungkinkan Anda meraih kebahagiaan yang hakiki dan menjadi sosok yang Anda idam-idamkan. Aapakah kebahagiaan adalah sesuatu yang Anda pilih? Berani Tidak Disukai menyajikan jawabannya secara sederhana dan langsung.Berdasarkan teori Alfred Adler, satu dari tiga psikolog terkemuka abad kesembilan belas selain Freud dan Jung, buku ini mengikuti percakapan yang menggugah antara seorang filsuf dan seorang pemuda.', 'tidakdisukai.jpg'),
	(3, 'Whats So Wrong About Your Self Healing', 'Ardhi Mohamad', 'Self Improvement', 'Whats So Wrong With Your Self Healing merupakan sebuah buku motivasi yang menceritakan banyak permasalahan diri yang sering ditemukan pada manusia dewasa ini. Mulai dari awal kita membentuk sebuah pola pikir, tumbuh dewasa dan menghadapi sejumlah permasalahan.', 'healing.jpg'),
	(4, 'Psychology of Money', 'Morgan Housel', 'Self Improvement', 'Melalui buku ini, Morgan Housel ingin sekali menyampaikan bahwa pada dasarnya perilaku seseorang terhadap duit yang dimiliki sangat memengaruhi kondisi keuangan daripada pengetahuan tentang keuangan yang dimiliki oleh seseorang. Dengan kata lain, seseorang yang memiliki latar belakang pendidikan finansial tak menjamin mampu mengelola kondisi keuangan selama perilakunya gaya hidupnya sangat boros.', 'money.jpg'),
	(5, 'Sebuah Seni Untuk Bersikap Bodo Amat', 'Mark Manson', 'Self Improvement', 'Mark Manson memberikan banyak penjelasan menarik yang bisa membuka pola pikir kita dalam kehidupan. Dalam buku Sebuah Seni untuk Bersikap Bodo Amat, Mark Manson menjelaskan jika ada beberapa hal yang ternyata tidak perlu dipersoalkan dalam kehidupan.', 'seni.jpg'),
	(6, 'Filosofi Teras', 'Henry Manampiring', 'Self Improvement', '“Bukan hal atau peristiwa tertentu yang meresahkan kita, tapi persepsi akan hal-hal dan peristiwa tersebut.” (Epictetus, hal. 95)', 'teras.jpg'),
	(7, 'Maaf Tuhan, Aku Hampir Menyerah', 'alfialghazi', 'Religion', 'Buku Maaf Tuhan, Aku Hampir Menyerah secara tidak langsung mengajak kita agar selalu bahagia dengan selalu merasa cukup. Mengajak untuk selalu bersyukur, bertahan, serta bersabar dalam menghadapi musibah. Juga untuk cita-cita yang ingin dicapai, haruslah dibarengi dengan keberanian untuk memperjuangkan. Bahkan ketika impian itu dihadapkan dengan masalah, buku ini seperti mengingatkan bahwa pada titik inilah kita harus bertawakal kepada Allah.', 'maaf.jpg'),
	(8, 'Tuhan Ada di Hatimu', 'Husein Jafar Al-Hadar', 'Religion', 'Dimulai dengan prolog \'Tuhan ada di hatimu\', Habib Jafar mengajak kita untuk melihat hal-hal yang berada di sekitar kita sebagai tanda-tanda kehadiran dan kebesaran-Nya. Bumi ini sejatinya adalah masjid,  dimanapun kita bersujud dan menyebut nama-Nya di situlah Tuhan berada, tidak terbatas hanya pada bangunan yang kita sebut masjid.', 'hati.jpg'),
	(9, 'Unlimited You', 'Wirda Mansur', 'Religion', 'Unlimited You ini dikemas dengan sangat inspiratif, penuh dengan motivasi dan kata-kata positif. Ketika kalian membaca buku ini dalam keadaan terpuruk, rasanya seperti menemukan sebuah lentera dalam kegelapan, seolah kita menemukan ada banyak sekali harapan baik apabila kita mau mendekat kepada-Nya.', 'unlimited.jpg'),
	(10, 'Hujan', 'Tere Liye', 'Novel', 'Segala benda yang ada di novel ini seolah nyata dan terkesan akan ada di kehidupan ke depannya. Dalam hal ini, imajinasi liar dari para pembaca akan kembali bekerja. Kemudian, yang menjadi hal menarik lainnya adalah pada sampul belakang di novel ini pun tidak adanya sinopsis dan daftar isi. Hal tersebut yang justru menjadi daya pikat dan mengundang ketertarikan pembaca pada novel ini.', 'hujan.jpg'),
	(11, 'Bumi Cinta', 'Habiburrahman El Shirazy', 'Novel', 'Novel bumi cinta menggambarkan mengenai indahnya adab sehari-hari yang dicontohkan dalam agama Islam. Seperti adab bersaudara, adab pada guru, hingga adab ketika mimpi buruk digambarkan oleh Kang Abik sebagai penulis dengan teknik yang cukup dramatis. Selain berbicara mengenai Islam, Kang Abik pun menyinggung mengenai atheisme. Berbagai jenis atheisme seolah ditelanjangi serta ditunjukan kelemahannya oleh Kang Abik. selain itu, novel bumi cinta pun mengungkapkan mengenai kekejaman serta kekejian dari zionis Israel. Pembantaian Sabra serta Shatila digambarkan oleh Kang Abik dengan cukup jelas. Beberapa dialog dalam novel ini pun mengandung ajaran tauhid.', 'bumi.jpg'),
	(12, 'Pulang', 'Tere Liye', 'Novel', 'Sebuah kisah tentang perjalanan pulang, melalui pertarungan demi pertarungan, kesedihan demi kesedihan, untuk memeluk erat semua kebencian.', 'pulang.jpg'),
	(13, 'Pergi', 'Tere Liye', 'Novel', 'Mengisahkan tentang perjalanan hidup seorang anak muda yang bernama Agam dan sering disapa Bujang. Bujang adalah salah satu petinggi dari beberapa orang keluarga shadow economy. ia menempati posisi tertinggi dari keluarga Tong, yang diberi gelar Tauke Besar. Ia adalah pemimpin dari keluarga Tong dan memiliki kepribadian dan watak yang berbeda dari penerus sebelumnya.', 'pergi.jpg'),
	(14, 'Pulang-Pergi', 'Tere Liye', 'Novel', 'Dalam novel Pulang Pergi kisahnya melanjutkan seputar perjalanan hidup Bujang yang masih saja merasa bingung soal makna pulang dan pergi. Kisah pembuka diawali dengan Bujang yang mengunjungi pusara orang tuanya di lembah Talang.', 'pulper.jpg');

-- membuang struktur untuk table fida_book.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_book` int(11) DEFAULT NULL,
  `body` text DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `FK_comments_user` (`id_user`),
  KEY `FK_comments_books` (`id_book`),
  CONSTRAINT `FK_comments_books` FOREIGN KEY (`id_book`) REFERENCES `books` (`id_book`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_comments_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel fida_book.comments: ~0 rows (lebih kurang)

-- membuang struktur untuk table fida_book.user
CREATE TABLE IF NOT EXISTS `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Membuang data untuk tabel fida_book.user: ~1 rows (lebih kurang)
INSERT INTO `user` (`id_user`, `name`, `email`, `username`, `password`) VALUES
	(5, 'Anonymous', NULL, 'Anonymous', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
