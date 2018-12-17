-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 08:36 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `autosale`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fullname` varchar(225) NOT NULL,
  `admin_username` varchar(225) NOT NULL,
  `admin_email` varchar(225) NOT NULL,
  `admin_password` varchar(225) NOT NULL,
  `admin_gender` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_email`, `admin_password`, `admin_gender`) VALUES
(1, 'Mario Gotze', 'mario', 'mario@gmail.com', 'mariogotze', 'male'),
(2, 'adekunle kuzi', 'kuziworldwide', 'palmerkuzi@gmail.com', 'palmerkuzi', 'male'),
(3, 'Marvel Lobtana', 'lobaton', 'lobaton@yahoo.com', 'lobaton', 'male'),
(4, 'admin', 'admin', 'admin@admin.com', 'admin', 'male'),
(5, 'mumu samuel', 'samuel', 'samsmith@yahoo.com', 'samuel', 'male'),
(6, 'sylvia brian', 'sylvianus', 'sylvianus101@yahoo.com', 'sylvia', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `billing_info`
--

CREATE TABLE `billing_info` (
  `billing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `billing_add` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone_number` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `billing_info`
--

INSERT INTO `billing_info` (`billing_id`, `user_id`, `billing_add`, `postal_code`, `phone_number`) VALUES
(1, 1, 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rprod_id` int(11) NOT NULL,
  `nod` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `billing_add` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `rprod_id`, `nod`, `price`, `payment_method`, `billing_add`, `postal_code`, `phone_number`, `status`) VALUES
(5, 1, 3, 1, 18000, 'google', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(6, 1, 2, 3, 66000, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(7, 1, 2, 4, 88000, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(8, 1, 1, 1, 20000, 'paypal', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(9, 1, 3, 1, 18000, 'google', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(10, 3, 1, 7, 140000, 'master', 'no 234', 2345, '0907545y4w6', 'YES'),
(11, 1, 12, 2, 2600, 'master', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'NO'),
(12, 1, 3, 3, 3000, 'master', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(13, 4, 6, 4, 10000, 'visa', '12 back of shoprite street ikeja, lagos.', 100001, '2348066641913', 'NO');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 13, 1, 32150),
(3, 1, 61, 1, 26495),
(4, 1, 63, 2, 22820),
(5, 1, 62, 4, 18720);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `payment_method` varchar(225) NOT NULL,
  `billing_add` text NOT NULL,
  `postal_code` int(11) NOT NULL,
  `phone_number` varchar(225) NOT NULL,
  `status` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `quantity`, `price`, `payment_method`, `billing_add`, `postal_code`, `phone_number`, `status`) VALUES
(2, 1, 1, 3, 72000, 'visa', 'Jimon-eye Street Lagos, Lagos', 100001, '2348102903414', 'YES'),
(3, 1, 10, 2, 36000, 'paypal', 'Jimon-eye Street Lagos, Lagos', 100001, '2348102903414', 'YES'),
(4, 1, 9, 2, 64000, 'master', 'Jimon-eye Street Lagos, Lagos', 100001, '2348102903414', 'YES'),
(7, 1, 8, 3, 75000, 'master', 'Jimon-eye Street Lagos, Lagos', 100001, '2348102903414', 'YES'),
(8, 2, 9, 2, 64000, 'google', '7 owode labora', 100001, '2348029649888', 'YES'),
(9, 1, 9, 5, 160000, 'paypal', 'Jimon-eye Street Lagos, Lagos', 100001, '2348102903414', 'YES'),
(10, 1, 8, 1, 25000, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(11, 3, 35, 2, 58180, 'master', '112, dead view avenue', 100001, '2348066666666', 'YES'),
(12, 1, 13, 1, 32150, 'google', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(13, 1, 38, 2, 46660, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(14, 1, 57, 1, 17495, 'master', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(15, 1, 74, 1, 23365, 'master', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(16, 3, 19, 15, 568500, 'visa', 'gdsjkrij', 32526, '59857946o', 'YES'),
(17, 3, 36, 10, 340900, 'google', 'fdhajdgjkrjlkmr gdfhs', 243565, '34675843654436754', 'YES'),
(18, 1, 38, 1, 23330, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(19, 5, 3, 1, 32000, 'master', '123 precious street surulere lagos', 100001, '2348176272222', 'YES'),
(20, 1, 51, 1, 52395, 'visa', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES'),
(21, 1, 15, 1, 43775, 'google', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'NO'),
(22, 1, 39, 1, 19615, 'master', 'Jimon-eye Street Lagos, Lagos', 1000011, '2348102903414', 'YES');

-- --------------------------------------------------------

--
-- Table structure for table `p_brand`
--

CREATE TABLE `p_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(225) NOT NULL,
  `brand_model` int(11) NOT NULL,
  `brand_image` varchar(225) NOT NULL,
  `brand_description` text NOT NULL,
  `brand_price` int(225) NOT NULL,
  `brand_quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_brand`
--

INSERT INTO `p_brand` (`brand_id`, `brand_name`, `brand_model`, `brand_image`, `brand_description`, `brand_price`, `brand_quantity`) VALUES
(1, 'toyota camry', 1, 'toyota_camry.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 24000, 20),
(2, 'toyota corolla', 1, 'toyota_corolla.jpg', 'The feature-rich Corolla is an exceptional value, but the one feature it doesn’t offer is thrills. A 1.8-liter four-cylinder makes 132 hp—140 hp in the LE Eco model—and drives the front wheels through a six-speed manual or a CVT. A 6.1-inch touchscreen infotainment system with Bluetooth is standard but can be upgraded to a 7.0-inch unit with navigation. All Corollas get modern technology such as adaptive cruise control, lane-keeping assist, automatic high beams, and automated emergency braking. ', 20000, 10),
(3, 'toyota highlander ', 1, 'toyota_highlander.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 32000, 5),
(4, 'toyota mirai ', 1, 'toyota_mirai.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 60000, 56),
(5, 'toyota prius ', 1, 'toyota_prius.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 24000, 34),
(6, 'toyota sequoia ', 1, 'toyota_sequoia.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 47000, 12),
(7, 'toyota sienna ', 1, 'toyota_sienna.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 30000, 23),
(8, 'toyota tacoma ', 1, 'toyota_tacoma.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 25000, 8),
(9, 'toyota tundra', 1, 'toyota_tundra.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 32000, 19),
(10, 'toyota yaris ', 1, 'toyota_yaris.jpg', 'For the majority of people to whom a car is merely an appliance, the Camry meets their needs perfectly. Those seeking a zestier ride should look elsewhere. A 178-hp four-cylinder is standard, while a 268-hp V-6 offers some serious zip. Both get a six-speed automatic. A hybrid is EPA-rated for 38 mpg highway. The XSE offers a stiffer suspension and some extra styling bits, but its steering is numb, its braking and handling unexceptional. An all-new Camry will roll onto dealer lots this summer. ', 18000, 24),
(13, 'audi a3', 3, 'audi_a3.jpg', 'The bite-size A3 wraps up everything we love about Audis in a handsome, nice-handling package.', 32150, 15),
(14, 'audi a4', 3, 'audi_a4.jpg', 'The A4 is swift, silent, and sportyâ€”the standard by which its competitors are measured.', 35850, 15),
(15, 'audi a5', 3, 'audi_a5.jpg', 'The stylish and comfortable A5 is available as a coupe or convertible.', 43775, 20),
(16, 'audi a6', 3, 'audi_a6.jpg', 'Sharply creased bodywork and a refined cabin make the A6 a well-tailored option for discerning drivers.', 48550, 25),
(17, 'audi a7', 3, 'audi_a7.jpg', 'A fastback roofline gives the A7 both flair and hatchback practicality, while the luxury cabin pampers occupants.', 69750, 20),
(18, 'audi a8', 3, 'audi_a8.jpg', 'Audiâ€™s A8L is the pinnacle of German Ã¼ber-luxury sedans, with an understated yet impressive design.', 83450, 15),
(19, 'chevrolet camaro', 5, 'chevrolet_camaro.jpg', 'Gutsy engines, aggressive sheetmetal, and rear-wheel drive are essential for any muscle car, but the Camaro stirs in excellent handling and great steering, too.', 37900, 20),
(20, 'chevrolet city express', 5, 'chevrolet_city_express.jpg', 'Lurking behind the bow tie on the grille is a Nissan NV200, but thatâ€™s not all bad.', 23400, 15),
(21, 'chevrolet colorado', 5, 'chevrolet_colorado.jpg', 'The clever and capable Colorado offers nearly as much utility as full-size pickupsâ€”minus the lane-hogging size.', 20995, 15),
(22, 'chevrolet corvette', 5, 'chevrolet_corvette.jpg', 'The mighty Corvette truly competes with the worldâ€™s greatest sports cars, no excuses required.', 56445, 20),
(23, 'chevrolet cruze', 5, 'chevrolet_cruze.jpg', 'Already known to offer a big-car ride in a compact package, the Cruze is available as a hatchback, too.', 17850, 20),
(24, 'chevrolet equinox', 5, 'chevrolet_equinox.jpg', 'A quiet, practical cabin makes the Equinox a smart buy, but a well-tuned chassis makes it a desirable one.', 24525, 15),
(32, 'dodge grand cavaran', 11, 'dodge_grand_cavaran.jpg', 'If a no-nonsense family hauler is what youâ€™re after, there are few options better than the Grand Caravan', 27090, 15),
(33, 'dodge dart', 11, 'dodge_dart.jpg', 'While the Dart is uniquely styled, it is otherwise a rather disappointing offering.', 18090, 15),
(34, 'dodge journey', 11, 'dodge_journey.jpg', 'Practicality is the name of the game when creating a tolerable family transporter, and the Journey has it in spadesâ€”excitement, however, is another story.', 22290, 15),
(35, 'dodge charger', 11, 'dodge_charger.jpg', 'A muscle car for the family, the Charger offers the style and stance to intimidate more mainstream sedans.', 29090, 15),
(36, 'dodge challenger', 11, 'dodge_challenger.jpg', 'The Challenger is one big bruiser, with heft better suited to cruising or drag-racing at the strip than turning laps on a racetrack.', 34090, 15),
(37, 'dodge durango', 11, 'dodge_durango.jpg', 'The Durango remains big, brawny, and masculine in an era of soft, curvaceous crossoversâ€”and itâ€™s also not as trucklike as other large SUVs.', 31090, 15),
(38, 'honda accord', 4, 'honda_accord.jpg', 'The Accord delivers driving fun in a practical package; all models (except the hybrid) are 2017 10Best winners.', 23330, 15),
(39, 'honda civic', 4, 'honda_civic.jpg', 'The Civic exemplifies automotive excellence and blends fun with efficiency and practicality.', 19615, 15),
(40, 'honda clarity', 4, 'honda_clarity.jpg', 'Powered by either electricity, gasoline, or hydrogen, the five-seat Clarity sedan brings you the future today.', 59365, 15),
(41, 'honda fit', 4, 'honda_fit.jpg', 'A flexible interior, an efficient powertrain, and agreeable pricing make the Fit an easy recommendation.', 16965, 15),
(42, 'honda odyssey', 4, 'honda_odyssey.jpg', 'The Odyssey has charmed us for years with its unrivaled road manners, smooth powertrain, and spacious eight-seat interior.', 30790, 15),
(43, 'honda pilot', 4, 'honda_pilot.jpg', 'If a stylish, useful, and trouble-free ride is what youâ€™re after, wellâ€”ladies and gentlemen, this is your Pilot speaking.', 31685, 15),
(44, 'hyundai accent', 12, 'hyundai_accent.jpg', 'No need for excuses here: the Accent, with its distinctive design and fuel-sipping engine, is a fine choice for an economical car.', 15830, 15),
(45, 'hyundai azera', 12, 'hyundai_azera.jpg', 'From its quiet cabin and refined powertrain to its handsome yet mild styling, the Azera offers plenty to appreciate.', 34995, 15),
(46, 'hyundai elantra', 12, 'hyundai_elantra.jpg', 'Whether you want frugal or fast, thereâ€™s an Elantra for everyone.', 17985, 15),
(47, 'hyundai loniq', 12, 'hyundai_loniq.jpg', 'Sharing its underpinnings with the Kia Niro, the Hyundai Ioniq is a hybrid in many flavors.', 23035, 15),
(48, 'hyundai sonata', 12, 'hyundai_sonata.jpg', 'The Sonata features Genesis-inspired styling with a bit less flourish; itâ€™s contemporary, with powertrains to match.', 22435, 15),
(49, 'hyundai tucson', 12, 'hyundai_tucson.jpg', 'Named after an American desert town, styled in Germany, and built in South Korea, the Tucson is a globe-trotting go-getter.', 23595, 15),
(50, 'jaguar f-pace', 7, 'jaguar_f-pace.jpg', 'The F-Pace brings Jaguarâ€™s sexy styling and athletic moves to a crowded market and ends up in a compelling place.', 42985, 15),
(51, 'jaguar f-type', 7, 'jaguar_f-type.jpg', 'From its seductively long hood to its steeply raked windshield and wide rear haunches, the F-type is a stunner.', 52395, 15),
(52, 'jaguar x<span class=''cap''>e</span>', 7, 'jaguar_xe.jpg', 'With a seductive blend of beauty and performance, the XE says â€œluxuryâ€ with a very British accent.', 35895, 15),
(53, 'jaguar x<span class=''cap''>f</span>', 7, 'jaguar_xf.jpg', 'With a lithe chassis and muscular powertrains, the XF combines graceful moves with a powerful punch.', 49245, 15),
(54, 'jaguar x<span class=''cap''>j</span>', 7, 'jaguar_xj.jpg', 'As the only Brit in a segment ruled by Germans, the Jaguar XJ has a lot on its shouldersâ€”a weight it bears remarkably well.', 75395, 15),
(55, 'jaguar f-type r', 7, 'jaguar_f-type_r.jpg', 'As Jaguarâ€™s most powerful and athletic offering, the F-type R coupeâ€”and convertibleâ€”combine brute force with gorgeous sheetmetal.', 106395, 15),
(56, 'kia cadenza', 10, 'kia_cadenza.jpg', 'Kia continues to redefine the meaning of â€œnear luxury,â€ and the Cadenza is another example.', 32890, 15),
(57, 'kia forte', 10, 'kia_forte.jpg', 'More than just a budget box, the Forte offers lots of features at a pocket-pleasing price.', 17495, 15),
(58, 'kia niro', 10, 'kia_niro.jpg', 'Called an â€œun-hybrid,â€ the Niro combines a hybrid powertrain with a subcompact crossover for the best of both worlds.', 23785, 15),
(59, 'kia optima', 10, 'kia_optima.jpg', 'More than a pretty face, the Optima is a great value, thanks to its refined chassis and upscale cabin.', 23095, 15),
(60, 'kia rio', 10, 'kia_rio.jpg', 'The Rio is a perky and fuel-efficient sedan or five-door hatchback, and as a Kia, itâ€™s a great value.', 16390, 15),
(61, 'kia sorento', 10, 'kia_sorento.jpg', 'With utility and rugged good looks, the Sorento is a value-oriented ride for those seeking to avoid the minivan stigma.', 26495, 15),
(62, 'mazda 3', 6, 'mazda_3.jpg', 'Not many vehicles successfully combine style, dynamics, and value in a compact package, but the Mazda 3 does, which is why itâ€™s a 10Best winner.', 18720, 15),
(63, 'mazda 6', 6, 'mazda_6.jpg', 'If you think all family sedans are created equal, youâ€™re in for a surprise with the nimble and curvaceous Mazda 6.', 22820, 15),
(64, 'mazda c<span class=''cap''>x</span>-9', 6, 'mazda_cx-9.jpg', 'Putting zoom-zoom charisma into a three-row crossover is no easy feat, but Mazda does it with the CX-9â€”earning it a 2017 10Best award.', 32460, 15),
(65, 'mazda c<span class=''cap''>x</span>-3', 6, 'mazda_cx-3.jpg', 'The CX-3 is a fun and feisty runabout with a can-do attitude, offering taut handling paired with edgy styling.', 20900, 15),
(66, 'mazda c<span class=''cap''>x</span>-5', 6, 'mazda_cx-5.jpg', 'Mazdaâ€™s ethos is to blend sports-car know-how into every model, and the CX-5 is no exception.', 24985, 15),
(67, 'mazda m<span class=''cap''>x</span>-5 miata', 6, 'mazda_mx-5_miata.jpg', 'For pure driving bliss, the Miata is tops in our bookâ€”itâ€™s so good, itâ€™s a 10Best winner for 2017.', 25790, 15),
(68, 'mitsubishi lancer', 9, 'mitsubishi_lancer.jpg', 'With an inexpensive interior and less-than-thrilling driving chops, the Lancer leaves much to be desired.', 18630, 15),
(69, 'mitsubishi mirage', 9, 'mitsubishi_mirage.jpg', 'This basic four-door hatchback comes with a good warranty and a maximum fuel-economy rating of 43 mpg highway.', 13830, 15),
(70, 'mitsubishi mirage g4', 9, 'mitsubishi_mirage_g4.jpg', 'What the Mirage G4 offers over a used car is a great warranty and the peace of mind that comes with owning a new car.', 14830, 15),
(71, 'mitsubishi outlander', 9, 'mitsubishi_outlander.jpg', 'Despite its distinctive exterior, the Outlander lingers at the bottom of the crossover barrel.', 24390, 15),
(72, 'mitsubishi outlander sport', 9, 'mitsubishi_outlander_sport.jpg', 'With its angular looks, the Outlander Sport cuts a swath through the sameness of cookie-cutter crossovers.', 20690, 15),
(73, 'mitsubishi <span class=''low''>i</span>-<span class=''cap''>m</span><span class=''low''>i</span><span class=''cap''>ev</span>', 9, 'mitsubishi_i-miev.jpg', 'No, itâ€™s not a larger-than-life computer mouse; itâ€™s the i-MiEV, the least-expensive EV sold.', 23845, 15),
(74, 'nissan altima', 2, 'nissan_altima.jpg', 'Curvy, dramatic styling mimics bigger brother Maxima and gives the Altima an upscale vibe.', 23365, 15),
(75, 'nissan armada', 2, 'nissan_armada.jpg', 'As Nissanâ€™s double-duty SUV, the Armada can tow up to 8500 pounds and has space for eight.', 46095, 15),
(76, 'nissan frontier', 2, 'nissan_frontier.jpg', 'The old stone that is the Frontier keeps rollingâ€”its basic design dates to 2005, itâ€™s had few changes since 2009, and a replacement probably wonâ€™t arrive for a few more years.', 19330, 15),
(77, 'nissan juke', 2, 'nissan_juke.jpg', 'The Juke puts the â€œfunâ€ in â€œfunky,â€ making it perfect for those who want a spry and speedy little runabout that also stands out in traffic.', 21210, 15),
(78, 'nissan leaf', 2, 'nissan_leaf.jpg', 'The Leafâ€™s driving range and spacious cabin make it an affordable EV with everyday usability.', 31565, 15),
(79, 'nissan maxima', 2, 'nissan_maxima.jpg', 'Itâ€™s time to stop pressuring the Maxima to live up to its billing as a four-door sports car and accept it for what it is: a bargain-priced luxury car.', 33495, 15),
(80, 'volvo s60', 8, 'volvo_s60.jpg', 'Volvo blends sleek Swedish design with the latest in safety technology, proving you can be good-looking and smart.', 34945, 15),
(81, 'volvo s90', 8, 'volvo_s90.jpg', 'This svelte sedan is the XC90â€™s under-the-skin twin; as a Volvo, it mixes style with safety in a decidedly Swedish way.', 49745, 15),
(82, 'volvo v60', 8, 'volvo_v60.jpg', 'Handsome styling and a sloping roofline make the V60 more of a stylish hatchback than a conventional station wagon.', 37145, 15),
(83, 'volvo v90 cross country', 8, 'volvo_v90_cross_country.jpg', 'As the latest in a long line of Volvo wagons, the V90 combines style and practicality like few luxury cars can.', 56295, 15),
(84, 'volvo x<span class=''cap''>c</span>60', 8, 'volvo_xc60.jpg', 'A charming alternative to the Teutonic status quo, the XC60 is no sports car, but it delivers a supple ride, a smart cabin, and tons of safety tech.', 41945, 15),
(85, 'volvo xc90', 8, 'volvo_xc90.jpg', 'The XC90 is a handsome, square-jawed Swede striving to offer more efficiency and safety than its rivals, while adding a dose of Scandinavian flair.', 46745, 17);

-- --------------------------------------------------------

--
-- Table structure for table `p_model`
--

CREATE TABLE `p_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(225) NOT NULL,
  `model_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_model`
--

INSERT INTO `p_model` (`model_id`, `model_name`, `model_image`) VALUES
(1, 'toyota', 'toyota.png'),
(2, 'nissan', 'nissan.png'),
(3, 'audi', 'audi.png'),
(4, 'honda', 'honda.png'),
(5, 'chevrolet', 'chevrolet.png'),
(6, 'mazda', 'mazda.png'),
(7, 'jaguar', 'jaguar.png'),
(8, 'volvo', 'volvo.png'),
(9, 'mitsubishi', 'mitsubishi.png'),
(10, 'kia', 'kia.png'),
(11, 'dodge', 'dodge.png'),
(12, 'hyundai', 'hyundai.png');

-- --------------------------------------------------------

--
-- Table structure for table `rent_cat`
--

CREATE TABLE `rent_cat` (
  `rentcat_id` int(11) NOT NULL,
  `rentcat_name` varchar(225) NOT NULL,
  `rentcat_image` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rent_cat`
--

INSERT INTO `rent_cat` (`rentcat_id`, `rentcat_name`, `rentcat_image`) VALUES
(1, 'sedan', 'sedan.png'),
(4, 'hybrid and electric', 'hybrid_and_electric.png'),
(5, 'sport', 'sport.png'),
(6, 'luxury', 'luxury.png'),
(7, 'pickup truck', 'pickup_truck.png'),
(8, 'van and minivan', 'van_and_minivan.png'),
(9, 'hatchback', 'hatchback.png'),
(10, 'coupe', 'coupe.png'),
(11, 'station wagon', 'station_wagon.png'),
(12, 'convertible', 'convertible.png'),
(13, 'crossover', 'crossover.png');

-- --------------------------------------------------------

--
-- Table structure for table `r_cars`
--

CREATE TABLE `r_cars` (
  `rcar_id` int(11) NOT NULL,
  `rcar_name` varchar(225) NOT NULL,
  `rcat_id` int(11) NOT NULL,
  `rcar_img` varchar(225) NOT NULL,
  `rcar_desc` text NOT NULL,
  `rcar_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `r_cars`
--

INSERT INTO `r_cars` (`rcar_id`, `rcar_name`, `rcat_id`, `rcar_img`, `rcar_desc`, `rcar_price`) VALUES
(1, 'nissan z', 12, 'nissan_z.jpg', 'The iconic Z is a decent package of power and handling, but itï¿½s starting to look dated versus the competition.', 2000),
(2, 'mini cooper', 12, 'mini_cooper.jpg', 'Sun worshippers and Mini mavens continue to find this convertible irresistibleï¿½and can you blame them? Its attractions include a power top that folds flat in 18 seconds, an ï¿½Openometerï¿½ gauge that keeps track of how long youï¿½ve motored with the top down, the joy of unlimited headroom, and plenty of charisma.', 2200),
(3, 'fiat 124 spider ', 12, 'fiat_124_spider.jpg', 'Borrowing heavily from the looks of the Pininfarina-designed original, circa 1966, the 124 Spider is a stylish, if not exactly Italian, two-seat droptop.', 1000),
(4, 'Buick Verano', 6, 'Buick_Verano.jpg', 'Take Buickâ€™s serene, smooth-riding luxury and distill it into a compact size, and you get the Verano.', 5000),
(5, 'audi a3', 6, 'audi_a3.jpg', 'The bite-size A3 wraps up everything we love about Audis in a handsome, nice-handling package.', 2000),
(6, 'Infiniti QX30', 6, 'Infiniti_QX30.jpg', 'Crossovers continue to crowd showrooms across the nation, but few have styling as distinctive as the QX30s.', 2500),
(7, 'Honda Civic Si ', 10, 'Honda_Civic_Si_.jpg', 'The Civic Si puts the Si in sick with two sleek yet subdued models: a streamlined sedan and a wing-bearing coupe.', 2100),
(8, 'Kia Forte Koup ', 10, 'Kia_Forte_Koup_.jpg', 'The Forte coupeâ€”or Koup, in Kia-speakâ€”is sportier and more elegant than other Fortes; itâ€™s also well equipped and surprisingly refined.', 1000),
(9, 'Volkswagen Beetle', 10, 'Volkswagen_Beetle.jpg', 'Its shape is among the most distinctive on the road; surprisingly, the Beetle, offered as a coupe or a convertible, is as fun to drive as it looks.', 1100),
(10, 'Jeep Patriot ', 3, 'Jeep_Patriot_.jpg', 'Those seeking an affordable off-roader should check out the Patriotâ€”but move fast, as this is likely its last year on sale.', 2500),
(11, 'fait 500x', 3, 'fait_500x.jpg', 'Grown up but still cheeky, the 500X complements its minuscule sibling, the Fiat 500, by offering more space and all-weather capability while retaining its classic Italian style.', 1100),
(12, 'Chevrolet Trax ', 3, 'Chevrolet_Trax_.jpg', 'Despite a cool name, the Trax is an unadventurous choice in a segment with more exciting, fun-to-drive choices.', 1300),
(13, 'Chevrolet Spark ', 9, 'Chevrolet_Spark_.jpg', 'The Sparkâ€™s persona is less shocking than its name, but those seeking basic urban transportation will be happy.', 1100),
(14, 'Smart Fortwo ', 9, 'Smart_Fortwo_.jpg', 'The charming and nonconformist Fortwoâ€™s mission is to make motoring easy for urban dwellers with its maneuverability and compact shape.', 7000),
(15, 'Hyundai Accent ', 9, 'Hyundai_Accent_.jpg', 'No need for excuses here: the Accent, with its distinctive design and fuel-sipping engine, is a fine choice for an economical car.', 1120),
(16, 'Hyundai Ioniq ', 4, 'Hyundai_Ioniq_.jpg', 'Sharing its underpinnings with the Kia Niro, the Hyundai Ioniq is a hybrid in many flavors.', 1100),
(17, 'Toyota Prius V ', 4, 'Toyota_Prius_V_.jpg', 'Blending the usefulness of a station wagon and the fuel economy of a hybrid, the Prius V might be the ultimate utility vehicle.', 1200),
(18, 'Honda CR-Z ', 4, 'Honda_CR-Z_.jpg', 'The CR-Z is an ambitious attempt at making a sporty hybrid, but its performance doesnâ€™t match its adventurous styling.', 1000),
(19, 'nissan frontier', 7, 'nissan_frontier.jpg', 'The old stone that is the Frontier keeps rollingâ€”its basic design dates to 2005, itâ€™s had few changes since 2009, and a replacement probably wonâ€™t arrive for a few more years.', 1200),
(20, 'chevrolet colorado', 7, 'chevrolet_colorado.jpg', 'The clever and capable Colorado offers nearly as much utility as full-size pickupsâ€”minus the lane-hogging size.', 1200),
(21, 'toyota tacoma', 7, 'toyota_tacoma.jpg', 'The Tacomaâ€™s ruggedly handsome looks and available off-road gear almost redeem its tight interior and so-so fuel economy.', 1500),
(22, 'nissan versa', 1, 'nissan_versa.jpg', 'The Versa is built to be Americaâ€™s cheapest car, so if you want a cheap new car, here it is; if you like to drive, keep shopping.', 1000),
(23, 'mitsubishi mirage G4', 1, 'mitsubishi_mirage_G4.jpg', 'What the Mirage G4 offers over a used car is a great warranty and the peace of mind that comes with owning a new car.', 1000),
(24, 'Hyundai Accent', 1, 'Hyundai_Accent.jpg', 'No need for excuses here: the Accent, with its distinctive design and fuel-sipping engine, is a fine choice for an economical car.', 1000),
(25, 'nissan Z', 5, 'nissan_Z.jpg', 'The iconic Z is a decent package of power and handling, but itâ€™s starting to look dated versus the competition.', 1500),
(26, 'dodge challenger', 5, 'dodge_challenger.jpg', 'The Challenger is one big bruiser, with heft better suited to cruising or drag-racing at the strip than turning laps on a racetrack.', 1700),
(27, 'chevrolet camaro', 5, 'chevrolet_camaro.jpg', 'Gutsy engines, aggressive sheetmetal, and rear-wheel drive are essential for any muscle car, but the Camaro stirs in excellent handling and great steering, too.', 1800),
(28, 'Subaru Outback ', 11, 'Subaru_Outback_.jpg', 'It doesnâ€™t matter if itâ€™s tackling muddy tracks in the back country or shuttling people and cargo about town: The Outback is in its element.', 1500),
(29, 'Volvo V60', 11, 'Volvo_V60.jpg', 'Handsome styling and a sloping roofline make the V60 more of a stylish hatchback than a conventional station wagon.', 2000),
(30, 'Fiat 500L ', 11, 'Fiat_500L_.jpg', 'The 500L features styling thatâ€™s adorable to many but a bit too squee-worthy to others.', 1200),
(31, 'Nissan NV200 ', 8, 'Nissan_NV200_.jpg', 'Cargo vans arenâ€™t usually regarded as exciting vehicles, but to the hard-working men and women of America, a well-designed van can be critical.', 1500),
(32, 'Kia Sedona', 8, 'Kia_Sedona.jpg', 'Snazzy, sporty, and striking arenâ€™t words you associate with minivansâ€”but the ambitious folks at Kia have managed to bake a little of each into the Sedona.', 1200),
(33, 'Chrysler Pacifica ', 8, 'Chrysler_Pacifica_.jpg', 'The Pacifica arrives to reclaim Chryslerâ€™s minivan throneâ€”and a 2017 10Best award.', 1700);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(225) NOT NULL,
  `user_username` varchar(225) NOT NULL,
  `user_email` varchar(225) NOT NULL,
  `user_password` varchar(225) NOT NULL,
  `user_dob` date NOT NULL,
  `user_gender` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fullname`, `user_username`, `user_email`, `user_password`, `user_dob`, `user_gender`) VALUES
(1, 'Adekunle Palmer', 'kuzi4251', 'adekunlepalmer@yahoo.com', 'adekunle', '1998-02-05', 'male'),
(2, 'Emmanuel Akinjole', 'wizguyemma', 'akinjole@yahoo.com', 'emmanuel', '1997-05-20', 'male'),
(3, 'Taiwo Babatope Eniola', 'yungking', 'babatopeeniola@gmail.com', 'Timilehin', '1997-05-22', 'male'),
(4, 'sylvia brian', 'sylvianus', 'sylvianus101@yahoo.com', 'sylvia', '1997-03-13', 'female'),
(5, 'orimidu victor', 'vatopshegzy', 'vatopshegzy22@yahoo.com', 'victor', '1997-05-22', 'male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_info`
--
ALTER TABLE `billing_info`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `p_brand`
--
ALTER TABLE `p_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `p_model`
--
ALTER TABLE `p_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `rent_cat`
--
ALTER TABLE `rent_cat`
  ADD PRIMARY KEY (`rentcat_id`);

--
-- Indexes for table `r_cars`
--
ALTER TABLE `r_cars`
  ADD PRIMARY KEY (`rcar_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `billing_info`
--
ALTER TABLE `billing_info`
  MODIFY `billing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `p_brand`
--
ALTER TABLE `p_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;
--
-- AUTO_INCREMENT for table `p_model`
--
ALTER TABLE `p_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `rent_cat`
--
ALTER TABLE `rent_cat`
  MODIFY `rentcat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `r_cars`
--
ALTER TABLE `r_cars`
  MODIFY `rcar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
