-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Apr 2026 pada 03.31
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portal_berita_uts`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `views` int(11) DEFAULT 0,
  `penulis` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `isi`, `gambar`, `id_kategori`, `id_user`, `tanggal`, `views`, `penulis`) VALUES
(2, '\"Barcelona beruntung\" - Bintang Atletico Madrid kesal atas keputusan kartu merah saat pasukan Hansi Flick mencuri kemenangan di menit-menit akhir untuk memperlebar jarak di klasemen La Liga', 'Barcelona telah mengambil langkah besar menuju gelar La Liga setelah malam yang dramatis dan kontroversial di Metropolitano yang membuat mereka berhasil meraih kemenangan di menit-menit akhir atas Atlético Madrid. Hasil ini membuat tim asuhan Hansi Flick unggul tujuh poin di puncak klasemen, namun kiper Atlético, Juan Musso, tidak segan-segan menyampaikan kritiknya dalam penilaian pasca-pertandingan karena ia merasa jalannya pertandingan secara mendasar diubah oleh wasit, terutama terkait kartu merah yang diberikan kepada rekan setimnya.\r\n\r\nKejadian Menegangkan di Metropolitano\r\nPertandingan antara Atlético dan Barcelona awalnya diprediksi akan menjadi penentu perebutan gelar juara, namun pertandingan itu dengan cepat berubah menjadi perdebatan sengit seputar keputusan wasit. Meskipun Atlético sempat memimpin lebih dulu lewat gol Giuliano Simeone, momentum berubah setelah Marcus Rashford menyamakan kedudukan dan tuan rumah harus bermain dengan sepuluh orang akibat kartu merah yang diterima Nico Gonzalez. Saat skor 1-1, Gerard Martin diusir dari lapangan untuk Barca, namun keputusan tersebut secara mengejutkan dibatalkan setelah pemeriksaan VAR. Kekurangan jumlah pemain akhirnya berdampak ketika Robert Lewandowski mencetak gol pada menit ke-86 untuk memastikan kebangkitan tim raksasa Catalan tersebut.\r\n\r\nMusso mengkritik keras ketidakkonsistenan wasit\r\nMusso tidak segan-segan dalam penilaiannya pasca-pertandingan setelah dinobatkan sebagai MVP meski timnya kalah. Berbicara kepada DAZN, kiper asal Argentina itu mengungkapkan rasa frustrasinya: \"Kami bermain sangat baik di babak pertama. Kami bahkan bermain lebih baik lagi, menciptakan banyak peluang; itu adalah pertandingan yang menghibur dan menyenangkan. Kartu merah itu merugikan kami. Sangat sulit dalam sepak bola saat ini bermain dengan satu pemain kurang. Saya juga berpikir itu seharusnya kartu merah bagi mereka. Wasit jelas melihatnya di lapangan. Kemudian, itu terlihat di tayangan ulang. Itu bisa saja membuat pertandingan lebih adil. Tapi ya sudahlah, kami akan melangkah maju. Ini adalah pertandingan penting. Hal ini tidak mengguncang kepercayaan diri kami. Sebelas lawan sebelas, saya pikir kami lebih baik. Kami menciptakan banyak peluang dan menggerakkan bola dengan baik. Itu memberi kami kepercayaan diri.\"\r\n\r\nKeberuntungan Lewandowski di menit-menit akhir memastikan timnya meraih poin\r\nMomen penentu terjadi di menit-menit akhir ketika Lewandowski mencetak gol secara kebetulan, sebuah gol yang menurut Musso menggambarkan keseimbangan keberuntungan pada malam itu. Musso menanggapi kekecewaan di menit-menit akhir tersebut dengan mengatakan: \"Bola pantul jatuh tepat di depannya, dan tanpa disadari, dia mencetak gol. Mereka beruntung dengan gol kedua itu. Kami berusaha bertahan. Tim telah berjuang keras. Saya berusaha membela, semua usaha yang dilakukan para pemain karena dari luar terlihat luar biasa. Ketika kami kebobolan gol dengan cara apa pun, Anda merasa sedih. Saya menghargai dan memuji usaha tim, sebelas lawan sebelas dan juga saat bermain dengan satu pemain kurang.\"\r\n\r\n', 'Screenshot 2026-04-05 175306.png', 3, NULL, '2026-04-05 17:53:54', 6, 'MIFA'),
(3, 'Manchester City ke semifinal usai taklukan Liverpool 4-0', 'Manchester City melangkah ke semifinal setelah menghancurkan Liverpool dengan skor telak 4-0 dalam laga perempat final Piala FA 2025/26 di Stadion Etihad pada Sabtu.\r\n\r\nErling Haaland menjadi bintang kemenangan lewat torehan tiga golnya (hattrick), sementara Mohamed Salah gagal mencetak gol dari titik penalti.\r\n\r\nHasil ini memastikan Manchester City melangkah ke semifinal, sedangkan Liverpool harus tersingkir dari kompetisi, demikian yang dilansir laman resmi TheFA.\r\n\r\nSejak awal pertandingan, kedua tim langsung tampil dengan intensitas tinggi. Manchester City lebih dulu mengancam pada menit kedua melalui aksi individu Jeremy Doku, tetapi sepakannya masih melenceng tipis dari gawang Giorgi Mamardashvili.\r\n\r\nLiverpool mencoba membalas lewat Florian Wirtz, tetapi upayanya mampu diamankan oleh kiper City, James Trafford.\r\n\r\nPeluang emas sempat didapat Mohamed Salah pada menit ke-15, yang gagal dimaksimalkan setelah digagalkan Abdukodir Khusanov.\r\n\r\nKebuntuan akhirnya pecah pada menit ke-39 setelah wasit menunjuk titik putih akibat pelanggaran Virgil van Dijk terhadap Nico O’Reilly di kotak penalti. Erling Haaland yang maju sebagai eksekutor sukses membawa City unggul 1-0.\r\n\r\nMenjelang turun minum, tepatnya pada menit ke-45+2, Haaland kembali mencatatkan namanya di papan skor setelah memanfaatkan umpan matang dari Antoine Semenyo, membuat City unggul 2-0 saat jeda.\r\n\r\nMemasuki babak kedua, dominasi tuan rumah semakin terlihat. Pada menit ke-50, Semenyo memperlebar keunggulan menjadi 3-0 lewat sontekan yang mengecoh Mamardashvili.\r\n\r\nHanya berselang tujuh menit, Haaland melengkapi hattrick-nya sekaligus membawa Manchester City unggul 4-0 atas Liverpool.\r\n\r\nLiverpool sebenarnya memiliki kesempatan untuk memperkecil ketertinggalan pada menit ke-62 setelah Hugo Ekitike dilanggar Matheus Nunes di kotak penalti. Namun, Salah gagal menjalankan tugasnya setelah tendangannya berhasil ditepis James Trafford.\r\n\r\nTrafford kembali tampil gemilang di sisa waktu pertandingan dengan menggagalkan sejumlah peluang, termasuk dari Alexis Mac Allister, sehingga skor 4-0 untuk kemenangan Manchester City tetap bertahan hingga laga usai.\r\n\r\nSusunan Pemain\r\nManchester City (4-2-3-1): Trafford; Nunes, Khusanov, Guehi, O’Reilly; Rodri (Nico 63’), Bernardo Silva; Semenyo (Foden 72’), Doku (Savinho 63’), Cherki (Reijnders 72’); Haaland (Marmoush 78’)\r\n\r\nLiverpool (4-2-3-1): Mamardashvili; Gomez (Frimpong 63’), Konate, Van Dijk, Kerkez; Gravenberch (Mac Allister 68’), Jones; Salah (Chiesa 78’), Wirtz (Ngumoha 68’), Szoboszlai; Ekitike (Gakpo 68’)', 'Screenshot 2026-04-05 175708.png', 3, NULL, '2026-04-05 17:57:25', 7, 'Rizky'),
(4, 'Teknologi maju karena Generasi Z', 'Eks Gubernur Lembaga Ketahanan Nasional (Lemhannas) RI, Andi Widjajanto mengatakan kemajuan teknologi dan akses digital ditujukan agar generasi (Gen) Z terus berinovasi mengembangkan potensi diri, serta berkontribusi bagi kemajuan bangsa.\r\n\r\nHal itu disampaikan Andi Widjajanto saat menjadi pembicara pada hari kedua kegiatan Pengenalan Kehidupan Kampus bagi Mahasiswa Baru (PKKMB) Universitas Tarumanagara (Untar), di Kampus I Untar, Jakarta Kamis (14/8).\r\n\r\nDalam paparan berjudul “Bela Negara di Era Digital: Menjadi Agen Perubahan untuk Indonesia Emas 2025”, Andi menekankan kemajuan teknologi tidak boleh menjadi penghalang dalam menjaga kedaulatan negara. \r\n\r\nSebaliknya, teknologi perlu dimanfaatkan sebagai alat strategis dalam memperkuat ketahanan nasional.\r\n\r\nRektor Untar, Prof. Dr. Amad Sudiro, S.H., M.H., M.Kn., M.M., saat membuka acara, mengajak para mahasiswa untuk berani melangkah menuju keunggulan dengan keluar dari zona nyaman dan menjelajahi hal-hal baru.\r\n\r\n“Selama menempuh pendidikan di Untar, mahasiswa diharapkan menanamkan nilai integritas, profesionalisme, dan jiwa kewirausahaan. Jadilah pribadi yang terbuka untuk berkolaborasi, berani berinovasi, dan terus belajar agar dapat memberikan kontribusi terbaik bagi bangsa,” ujarnya.\r\n\r\nPKKMB tahun ini mengusung tema “Step into Greatness by Daring to Explore”, dan diikuti oleh mahasiswa baru dari delapan fakultas di lingkungan Untar. \r\n\r\n', 'Screenshot 2026-04-05 180044.png', 1, NULL, '2026-04-05 18:00:58', 6, 'MIFA'),
(5, 'Toleransi dan Pendidikan Karakter Jadi Fokus Penguatan Pendidikan', 'Menteri Pendidikan Dasar dan Menengah (Mendikdasmen), Abdul Mu’ti, menegaskan pentingnya penguatan karakter dan nilai toleransi dalam sistem pendidikan nasional. Hal tersebut disampaikan dalam sebuah pertemuan lintas tokoh agama yang diselenggarakan oleh Indonesian Conference on Religion and Peace (ICRP), di Jakarta, Senin (16/3).\r\n\r\nDalam kesempatan tersebut, Menteri Mu’ti menyampaikan bahwa Kementerian Pendidikan Dasar dan Menengah (Kemendikdasmen) tengah berupaya menjalankan amanah konstitusi untuk menghadirkan pendidikan bermutu bagi seluruh masyarakat Indonesia. Program tersebut sejalan dengan agenda pembangunan nasional untuk membentuk generasi Indonesia yang kuat dan berdaya saing.\r\n\r\n“Program kami adalah menghadirkan pendidikan bermutu untuk semua, sebagai bagian dari upaya mencerdaskan kehidupan bangsa,” ujarnya.\r\n\r\nMenurutnya, nilai toleransi menjadi bagian penting dalam kebijakan penguatan pendidikan karakter. Indonesia yang majemuk memerlukan generasi muda yang tidak hanya cerdas secara akademik, tetapi juga memiliki kesadaran kebangsaan serta sikap saling menghormati antaragama dan budaya.\r\n\r\nKarena itu, berbagai kegiatan lintas agama dan budaya juga didorong untuk menjadi bagian dari ekosistem pendidikan. Kegiatan tersebut dinilai dapat membangun pemahaman sejak dini bahwa keberagaman merupakan kekuatan bangsa.\r\n\r\n“Indonesia adalah rumah kita bersama. Karena itu anak-anak kita perlu memiliki jiwa keindonesiaan dan kesadaran bahwa mereka memiliki tanggung jawab untuk memajukan bangsa ini bersama-sama,” jelasnya.\r\n\r\nDalam menjalankan agenda tersebut, Kemendikdasmen juga membuka ruang kerja sama dengan berbagai lembaga pendidikan dari beragam latar belakang organisasi dan keagamaan. Menteri Mu’ti menyebut telah mengunjungi sejumlah sekolah dari berbagai komunitas pendidikan untuk memperkuat kolaborasi tersebut.Menurutnya, nilai toleransi menjadi bagian penting dalam kebijakan penguatan pendidikan karakter. Indonesia yang majemuk memerlukan generasi muda yang tidak hanya cerdas secara akademik, tetapi juga memiliki kesadaran kebangsaan serta sikap saling menghormati antaragama dan budaya.\r\n\r\nKarena itu, berbagai kegiatan lintas agama dan budaya juga didorong untuk menjadi bagian dari ekosistem pendidikan. Kegiatan tersebut dinilai dapat membangun pemahaman sejak dini bahwa keberagaman merupakan kekuatan bangsa.\r\n\r\n“Indonesia adalah rumah kita bersama. Karena itu anak-anak kita perlu memiliki jiwa keindonesiaan dan kesadaran bahwa mereka memiliki tanggung jawab untuk memajukan bangsa ini bersama-sama,” jelasnya.\r\n\r\nDalam menjalankan agenda tersebut, Kemendikdasmen juga membuka ruang kerja sama dengan berbagai lembaga pendidikan dari beragam latar belakang organisasi dan keagamaan. Menteri Mu’ti menyebut telah mengunjungi sejumlah sekolah dari berbagai komunitas pendidikan untuk memperkuat kolaborasi tersebut.\r\n\r\nBeberapa di antaranya termasuk sekolah yang dikelola komunitas internasional seperti Global Sevilla School, serta institusi pendidikan berbasis keagamaan seperti Kolese Van Lith di Magelang. Kunjungan tersebut menjadi bagian dari upaya mempererat hubungan dan memperkuat nilai inklusivitas dalam pendidikan.\r\n\r\nSelain itu, tradisi dialog lintas agama juga terus didorong sebagai sarana membangun saling pengertian. Lingkungan pendidikan dinilai menjadi ruang strategis untuk menanamkan nilai toleransi sekaligus memperkuat identitas kebangsaan.\r\n\r\nMelalui berbagai program tersebut, pemerintah berharap sistem pendidikan tidak hanya menghasilkan lulusan yang unggul secara akademik, tetapi juga memiliki karakter kuat, menjunjung tinggi keberagaman, serta mampu hidup berdampingan secara harmonis dalam masyarakat yang plural.\r\n\r\nDengan penguatan pendidikan karakter dan kolaborasi lintas komunitas, pendidikan diharapkan menjadi fondasi penting dalam membangun generasi Indonesia yang mampu menjaga persatuan sekaligus mendorong kemajuan bangsa.', 'Screenshot 2026-04-06 011338.png', 2, NULL, '2026-04-06 01:13:57', 0, 'FATTAH'),
(6, 'Pesona Park Bo Gum Tak Terbendung di Dunia Hiburan dengan \'Bogeummagical\'', 'Park Bo Gum menunjukkan pesonanya di dunia hiburan lewat program \'Bogeummagical\' dan \'Cantabile\'.\r\n\r\nPark Bo Gum terus menunjukkan pesonanya di dunia hiburan dengan berbagai proyek menarik. Setelah sukses menjadi pembawa acara di program musik KBS2 \'The Seasons - Park Bo Gum\'s Cantabile\' tahun lalu, tahun ini ia kembali mencuri perhatian lewat program realitas tvN \'Bogeummagical\'.\r\n\r\nDalam \'The Seasons - Park Bo Gum\'s Cantabile\', Park Bo Gum, yang menjadi MC pertama dari kalangan aktor, berhasil menarik perhatian banyak orang dengan kemampuannya dalam mengelola acara. Ia tidak hanya mengajak tamu untuk berinteraksi, tetapi juga menunjukkan bakat musiknya dengan bermain piano dan bernyanyi. Saat acara berakhir, ia menyampaikan pesan emosional yang meninggalkan kesan mendalam bagi para penonton.\r\n\r\nTahun ini, Park Bo Gum melanjutkan kariernya di dunia hiburan melalui \'Bogeummagical\'. Di program ini, ia berkolaborasi dengan Lee Sang Yi dan Kwak Dong Yeon untuk menjalankan sebuah barbershop di desa, menciptakan suasana hangat dan penuh kedekatan dengan penduduk setempat. Alih-alih misi yang mencolok, acara ini lebih berfokus pada interaksi dan berbagi cerita dengan masyarakat di sekitarnya, menciptakan pengalaman yang menenangkan bagi penonton.\r\n\r\nPark Bo Gum berhasil membuktikan bahwa ia bukan hanya berbakat dalam berakting, tetapi juga memiliki kemampuan luar biasa sebagai pembawa acara dan bintang program realitas. Melalui pendekatan yang tulus dan alami, ia semakin dekat dengan publik dan menunjukkan kualitas yang sangat dihargai dalam industri hiburan.\r\n\r\nDengan berbagai tantangan yang telah diambilnya, banyak penggemar yang tidak sabar menunggu apa yang akan dilakukan Park Bo Gum selanjutnya. Pesonanya yang tulus dan bakatnya yang beragam menjadikannya salah satu artis paling menonjol saat ini.', 'Screenshot 2026-04-06 011912.png', 4, NULL, '2026-04-06 01:21:38', 0, 'FADIL');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`) VALUES
(1, 'Teknologi', '2026-04-05 08:06:35'),
(2, 'Pendidikan', '2026-04-05 08:06:35'),
(3, 'Olahraga', '2026-04-05 08:06:35'),
(4, 'Hiburan', '2026-04-05 08:06:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','user') DEFAULT 'admin',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `role`, `created_at`) VALUES
(1, 'admin', '123456', 'admin', '2026-04-05 08:06:35');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_user`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
