-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2023-01-08 10:56:56
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `hotel_system`
--

-- --------------------------------------------------------

--
-- 資料表結構 `appointment`
--

CREATE TABLE `appointment` (
  `cus_acc` char(225) NOT NULL,
  `appointment_ID` char(225) NOT NULL,
  `appointment_date` date NOT NULL,
  `prices_sum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `appointment_details`
--

CREATE TABLE `appointment_details` (
  `appointment_details_ID` char(225) NOT NULL,
  `appointment_ID` char(225) NOT NULL,
  `hotal_ID` char(225) NOT NULL,
  `room_ID` char(225) NOT NULL,
  `check_in_date` date NOT NULL,
  `check_out_date` date NOT NULL,
  `room_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `customer`
--

CREATE TABLE `customer` (
  `username` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `account` char(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `hotel`
--

CREATE TABLE `hotel` (
  `hotel_ID` char(225) NOT NULL,
  `hotel_name` varchar(225) NOT NULL,
  `hotel_address` varchar(225) NOT NULL,
  `phonenum` varchar(225) NOT NULL,
  `hotel_picture` varchar(225) NOT NULL,
  `description` text NOT NULL,
  `hotel_city` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `hotel`
--

INSERT INTO `hotel` (`hotel_ID`, `hotel_name`, `hotel_address`, `phonenum`, `hotel_picture`, `description`, `hotel_city`) VALUES
('A0005', '凱莎琳庭園大飯店', '高雄市前金區文武三街145號', '886-7-2152158', 'https://taiwan.taiwanstay.net.tw/twpic/14921.jpg', '位於高雄市有名的餐飲, 購物, 觀光區內的凱莎琳商務大飯店提供優質的住宿，是商務和休閒旅行的熱門之選。 離市中心僅有2.2 km，旅客可以盡情享受市區內的迷人風景。', 'A'),
('B0001', '思源居民宿', '南投縣埔里鎮水頭里水頭路1號\r\n', '886-49-2927101', 'https://taiwan.taiwanstay.net.tw/twpic/15545.jpg', '思源居民宿提供住宿優惠，包含可免費取消和全額退款的房價。多肉祕境走路幾分鐘就到。此民宿提供免費的早餐、無線上網和停車。所有客房皆有有線電視和恆溫空調。', 'B'),
('C0006', '南國海岸渡假特色民宿', '屏東縣琉球鄉肚仔坪路8號', '886-8-8613830', 'https://taiwan.taiwanstay.net.tw/twpic/45462.jpg', '小琉球旅遊的新選擇，南國海岸讓小琉球民宿揚起濃濃拉丁風，彷彿置身加勒比海，到小琉球寫下美麗的冒險傳奇，讓您彷彿置身於國外的渡假。', 'C'),
('C0009', '瑚岩美術館民宿', '屏東縣琉球鄉中山路23號', '886-8-8611092', 'https://taiwan.taiwanstay.net.tw/twpic/6677.png', '台灣離島第一座美術舘，小琉球島嶼第一座美術舘，瑚岩美術舘 — 期待與您知性見面…', 'C'),
('D0010', '朝昔廬客棧民宿', '澎湖縣馬公市安宅里宅腳嶼200號', '886-6-9210750\r\n', 'https://taiwan.taiwanstay.net.tw/twpic/29233.jpg\r\n', '客棧主人本著對先人運用真材實料，以及融入老師傅心血和感情一刀一斧，純手工製作器物的著迷與熱愛於2007年7月12日創立 [朝昔廬]。朝昔廬古玩真藏不盡，與王口元廟厝述說無窮，就是本店朝昔廬的詮釋。朝昔加部首就是[廟厝]，因本店內外獨特的視覺空間都是運用古廟及古厝遺留下來的器物裝置而成，把先人遺留的寶貴文化資產透過巧思的營造，讓他的生命再延續，更融入生活裡面。人文飲食更具承襲澎湖人海風的堅持，料理出一道道令人懷念的滋味。而行腳住宿位於澎湖本島的中心點。靠近海邊潮間帶，房間寬敞舒適延伸寬大的露臺，180渡海景映入眼簾，讓人美不勝收。\r\n', 'D'),
('E0002', '凱旋新宿商旅', '臺東縣臺東市復興里福建路243號1-5樓', '886-89-311777', 'https://taiwan.taiwanstay.net.tw/twpic/9215.jpg', '台東凱旋新宿商旅，2010年全新裝潢，鄰台東市最熱鬧街區「中華路」僅不到1分鐘距離，絕佳方便的生活機能，也是以往來台東旅遊住宿的最佳選擇。', 'E'),
('E0003', '克卜勒民宿', '臺東縣鹿野鄉龍田村3鄰龍三路112巷20號\r\n', '886-89-551891', 'https://taiwan.taiwanstay.net.tw/twpic/78797.jpg\r\n', '整棟灰白、混凝土粉光的簡樸設計兩層樓建築客房內也是乾淨俐落的灰白牆面房內IKEA 家具的簡樸素雅風格加上落地窗外中央山脈的四季美景就是美麗的一幅畫希望能將這自然簡單的美好生活讓來到克卜勒民宿的旅人感到自在輕鬆、並悠遊其中', 'E'),
('F0008', '洛碁大飯店忠孝館\r\n', '臺北市大安區忠孝東路四段180號1樓、4樓至14樓\r\n', '886-2-27116869', 'https://taiwan.taiwanstay.net.tw/twpic/92202.jpg', '台北，國際交流的重要驛站，沈澱了各種文化基因，充滿了自由人文氣息，像是手上的咖啡，醇厚的令人嚮往。洛碁大飯店，第一個在台北市創立的大型連鎖飯店品牌，在捷運旁、熱鬧的西門町、台北車站、金融商圈等地，都能找到洛碁大飯店。堅持以平實的價格、多元的選擇及貼心的服務，提供每位旅客充電與休憩的地方，不論是您有意的安排或者偶然的巧遇，我們都期待您的來訪，一起在這美麗而多變的土地寫下屬於您的台北故事。', 'F'),
('G0004', '柴柴屋', '宜蘭縣五結鄉五結中路二段559巷5號', '886-3-9507195\r\n', 'https://taiwan.taiwanstay.net.tw/twpic/49546.jpg\r\n', '宜蘭~柴柴屋民宿, 位於羅東交流道下五分鐘處 我們來自北部，生活庸碌的感受 嚮往自然的主人_柯柯 & 峮峮 很久很久以前~就想來宜蘭了 。終於2014起~鼓起不怕輸的勇氣與自由... 2014起勇敢地踏上追夢的路上, 邀請你們一同生活玩樂在宜蘭 2015/2月新建的B&B 以簡約清新的方式讓您感受宜蘭氛圍。', 'G'),
('G0007', '轉角休閒民宿', '宜蘭縣五結鄉親河路一段222巷12號', '886-3-9509668', 'https://taiwan.taiwanstay.net.tw/twpic/102130.jpg', '在忙碌的人生旅程中為生活打拚的你~需面對不同的人生課題~人生之所以精彩，因為有許多轉角~每個轉角有的不同的人生與風景~轉角，新啟點~轉角,新風景~希望在轉角~「轉角」沒有華麗的外觀~但帶給你的是簡單、單純如家的感覺~去就是要讓你拋下平日繁忙、不開心與壓力~走入慢活人生~好好享受與朋友、家人間~最初的快樂大伙手牽手嘻笑~漫步在冬山河畔~留下不只是一張張美麗的照片~還有想起了最初擁抱的感動！想起了最初單純的快樂！想起了最初純擎的夢想！來(轉角)歇歇吧！ 那坐落在台北後花園冬山鄉利澤簡大橋旁的家， 讓你自由飛翔！這就是「轉角」~', 'G');

-- --------------------------------------------------------

--
-- 資料表結構 `room`
--

CREATE TABLE `room` (
  `hotel_ID` char(225) NOT NULL,
  `room_ID` char(225) NOT NULL,
  `room_name` varchar(225) NOT NULL,
  `room_type` varchar(225) NOT NULL,
  `room_picture` varchar(225) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `room`
--

INSERT INTO `room` (`hotel_ID`, `room_ID`, `room_name`, `room_type`, `room_picture`, `price`, `description`) VALUES
('A0005', 'A005_01', '商務雙人房', '雙人房', 'https://pix8.agoda.net/hotelImages/789/789505/789505_15010615170024322884.jpg?ca=13&ce=1', 1600, '洗浴用品\r\n風筒\r\n空調\r\n遮光窗簾\r\n電視\r\n瓶裝水\r\n書櫃\r\n冰箱'),
('B0001', 'B0001_01', '山景四人房', '四人房', 'https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/242318118.jpg?k=33aa2d80369794a9e855765f0b57bffd49ee2d9104f99c3e73722532de992503&o=', 1600, '衣櫃或衣櫥\r\n空調\r\n隔音\r\n電風扇\r\n冰箱\r\n餐桌\r\n沙發\r\n電視\r\n吊衣架'),
('C0006', 'C0006_01', '雙人房─哈瓦那', '雙人房', 'https://www.nanguo.com.tw/room/r2-1-2.jpg', 1905, '洗浴用品\r\n電視\r\n床上用品\r\n空調\r\n拖鞋\r\n冰箱'),
('C0009', 'C0009_01', '言中 - 雙人房', '雙人房', 'https://static.wixstatic.com/media/911f3a_8e39065dc1754b23b410253dc457bdfb.jpg/v1/fill/w_718,h_479,al_c,q_80,usm_0.66_1.00_0.01,enc_auto/911f3a_8e39065dc1754b23b410253dc457bdfb.jpg', 3200, '高樓層（樓梯）\r\n空調\r\n硬木或實木地板\r\n冰箱\r\n有線頻道\r\n陽台\r\n各間客房獨立空調'),
('D0010', 'D0010_01', '舞雲雙人房', '雙人房', 'https://penghu.fun-taiwan.com/Images/HousePhotos/203187.jpg', 2500, '空調設施\r\n盥洗用品\r\n無線網路\r\n電視\r\n電冰箱\r\n烤肉場地\r\n免費早餐'),
('E0002', 'E0002_01', '標準雙人房', '雙人房', 'https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/71827031.jpg?k=1955438e49a87beea987775ff0059bd7e25f26eb46fe1d9c7475565d75c6fad6&o=', 1800, '高樓層\r\n隔音\r\n一氧化碳偵測器\r\n餐桌\r\n書桌\r\n有線頻道\r\n吊衣架\r\n喚醒服務\r\n行政貴賓廳使用權\r\n各間客房獨立空調'),
('E0003', 'E0003_01', '星空房', '四人房', 'https://static.owlting.com/booking/image/h/c307b940-92f3-436d-a4ee-e596634d8043/images/RM5R4ow9sXjETmb47mR1JIJf8SMgBkqBkRTAMklb.jpeg', 2000, '景觀陽台\r\n桌椅組\r\n冷暖氣\r\n電扇\r\n液晶電視\r\n小冰箱\r\n快煮壺\r\n吹風機\r\n除霧鏡\r\n洗髮乳\r\n沐浴乳\r\n毛巾\r\n浴巾\r\n無線網路\r\n書籍'),
('F0008', 'F0008_01', '標準特大雙人床房－無窗', '雙人房', 'https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/231136817.jpg?k=3642986f23087e8aa9e30152e639d9018a3897c062cb44c31afb55e28677eb99&o=', 2914, '免費盥洗用品\r\n廁所\r\n浴缸或淋浴\r\n毛巾\r\n拖鞋\r\n吹風機\r\n衛生紙\r\n高樓層（有電梯）\r\n床單\r\n空調\r\n隔音\r\n電熱水壺\r\n清潔用品\r\n沙發\r\n書桌\r\n電視\r\n電話\r\n平面電視\r\n床邊插座\r\n吊衣架\r\n喚醒服務'),
('G0004', 'G0004_01', '201赤柴房', '雙人房', 'https://www.shibabnb.tw/images/room2_02.jpg', 1800, '衛生紙\r\n毛巾\r\n床單\r\n浴缸\r\n拖鞋\r\n私人衛浴\r\n廁所\r\n免費盥洗用品\r\n吹風機\r\n淋浴間\r\n平面電視\r\n有線頻道\r\n電視\r\n公共廚房\r\n餐桌\r\n清潔用品\r\n床邊插座\r\n吊衣架'),
('G0007', 'G0007_01', '雙人房－附陽台', '雙人房', 'https://t-cf.bstatic.com/xdata/images/hotel/max1024x768/171097306.jpg?k=c49c1f6d01f7912ebdcd444ec7de8a92f7ad6835636de3c94ff4d000e832f807&o=', 2700, '免費盥洗用品\r\n廁所\r\n浴缸或淋浴\r\n毛巾\r\n拖鞋\r\n吹風機\r\n衛生紙\r\n床單\r\n空調\r\n硬木或實木地板\r\n暖氣\r\n電風扇\r\n電熱水壺\r\n清潔用品\r\n電視\r\n平面電視\r\n有線頻道\r\n陽台\r\n露臺\r\n床邊插座\r\n吊衣架');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_ID`),
  ADD KEY `cus_acc` (`cus_acc`);

--
-- 資料表索引 `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD PRIMARY KEY (`appointment_details_ID`),
  ADD KEY `appointment_ID` (`appointment_ID`),
  ADD KEY `hotal_ID` (`hotal_ID`),
  ADD KEY `room_ID` (`room_ID`),
  ADD KEY `room_price` (`room_price`);

--
-- 資料表索引 `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`account`);

--
-- 資料表索引 `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`hotel_ID`);

--
-- 資料表索引 `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_ID`),
  ADD KEY `hotel_ID` (`hotel_ID`),
  ADD KEY `price` (`price`);

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`cus_acc`) REFERENCES `customer` (`account`);

--
-- 資料表的限制式 `appointment_details`
--
ALTER TABLE `appointment_details`
  ADD CONSTRAINT `appointment_details_ibfk_1` FOREIGN KEY (`appointment_ID`) REFERENCES `appointment` (`appointment_ID`),
  ADD CONSTRAINT `appointment_details_ibfk_2` FOREIGN KEY (`hotal_ID`) REFERENCES `hotel` (`hotel_ID`),
  ADD CONSTRAINT `appointment_details_ibfk_3` FOREIGN KEY (`room_ID`) REFERENCES `room` (`room_ID`),
  ADD CONSTRAINT `appointment_details_ibfk_4` FOREIGN KEY (`room_price`) REFERENCES `room` (`price`);

--
-- 資料表的限制式 `room`
--
ALTER TABLE `room`
  ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`hotel_ID`) REFERENCES `hotel` (`hotel_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
