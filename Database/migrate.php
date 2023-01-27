<?php



$servername = "localhost";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password);
$sql = "CREATE DATABASE nevi_kooperatif";
if ($conn->query($sql) === TRUE) {
  echo "Database created successfully<br/>";
} else {
  echo "Error creating database: " . $conn->error;
}




$baglanti = new mysqli("localhost", "root", "", "nevi_kooperatif");

if ($baglanti->connect_errno > 0) {
    die("<b>Bağlantı Hatası:</b> " . $baglanti->connect_error);
}

$baglanti->set_charset("utf8");



//Members

$sorgu2 = $baglanti->query("CREATE TABLE members (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  company VARCHAR(255),
  address VARCHAR(255),
  gsm VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  description VARCHAR(10000),
  username VARCHAR(255) NOT NULL,
  password VARCHAR(255) NOT NULL,
  is_confirmed BOOLEAN,
  date DATETIME DEFAULT NOW()
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "Members Tablo başarıyla oluşturuldu.<br/>";


//MainMenu

$sorgu44 = $baglanti->query("CREATE TABLE main_menu (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  type VARCHAR(255) NOT NULL,
  is_active BOOLEAN,
  priority INT NOT NULL
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "MainMenu Tablo başarıyla oluşturuldu.<br/>";


//Pages

$sorgu3 = $baglanti->query("CREATE TABLE pages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  menu_id INT NOT NULL,
  title VARCHAR(255) NOT NULL,
  route_url VARCHAR(255) NOT NULL,
  is_active BOOLEAN,
  description LONGTEXT NOT NULL,
  image VARCHAR(255),
  priority INT NOT NULL,
  FOREIGN KEY (menu_id) REFERENCES main_menu(id) ON DELETE CASCADE
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "Pages Tablo başarıyla oluşturuldu.<br/>";





//ImageGroup

$sorgu6 = $baglanti->query("CREATE TABLE image_group (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "ImageGroup başarıyla oluşturuldu.<br/>";


//Images

$sorgu7 = $baglanti->query("CREATE TABLE images (
  id INT AUTO_INCREMENT PRIMARY KEY,
  description VARCHAR(255) NOT NULL,
  is_visible BOOLEAN,
  url VARCHAR(255) NOT NULL,
  group_id INT NOT NULL,
  FOREIGN KEY (group_id) REFERENCES image_group(id) ON DELETE CASCADE
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "Images Tablo başarıyla oluşturuldu.<br/>";


//MainSlider

$sorgu = $baglanti->query("CREATE TABLE main_slider (
  id INT AUTO_INCREMENT PRIMARY KEY,
  image VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  route_url VARCHAR(255),
  priority INT NOT NULL
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "MainSlider Tablo başarıyla oluşturuldu.<br/>";


//Contact

$sorgu4 = $baglanti->query("CREATE TABLE contact (
  id INT AUTO_INCREMENT PRIMARY KEY,
  gsm VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  address VARCHAR(255) NOT NULL,
  fax VARCHAR(255)
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "Contact Tablo başarıyla oluşturuldu.<br/>";


$query    = "INSERT into contact (gsm, email,address,fax)
                     VALUES ('+90-507-979-8134','example@gmail.com','Eskisehir/Odunpazari','902')";
$result   = mysqli_query($baglanti, $query);





//SocialLinks

$sorgu5 = $baglanti->query("CREATE TABLE social_links (
  id INT AUTO_INCREMENT PRIMARY KEY,
  facebook_url VARCHAR(255) NOT NULL,
  youtube_url VARCHAR(255) NOT NULL,
  twitter_url VARCHAR(255) NOT NULL,
  google_url VARCHAR(255) NOT NULL,
  instagram_url VARCHAR(255) NOT NULL
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "SocialLinks Tablo başarıyla oluşturuldu.<br/>";

$query    = "INSERT into social_links (facebook_url, youtube_url,twitter_url,google_url,instagram_url)
                     VALUES ('facebook.com','youtube.com','twitter.com','google.com','instagram.com')";
$result   = mysqli_query($baglanti, $query);
if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "SocialLinks Tablo başarıyla oluşturuldu.<br/>";



//News

$sorgu4 = $baglanti->query("CREATE TABLE news (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(255) NOT NULL,
  date DATETIME DEFAULT NOW(),
  image VARCHAR(255) NOT NULL,
  tags VARCHAR(255) NOT NULL,
  author INT NOT NULL,
  FOREIGN KEY (author) REFERENCES members(id) ON DELETE CASCADE
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "News Tablo başarıyla oluşturuldu.<br/>";



//Messages

$sorgu4 = $baglanti->query("CREATE TABLE messages (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  title VARCHAR(255) NOT NULL,
  description VARCHAR(500) NOT NULL,
  date DATETIME DEFAULT NOW()
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "Messages Tablo başarıyla oluşturuldu.<br/>";




//ManagementCouncil

$sorgu4 = $baglanti->query("CREATE TABLE management_council (
  id INT AUTO_INCREMENT PRIMARY KEY,
  full_name VARCHAR(255) NOT NULL,
  image VARCHAR(255) NOT NULL,
  degree VARCHAR(255) NOT NULL
)ENGINE=InnoDB,CHARACTER SET utf8 COLLATE utf8_turkish_ci");

if ($baglanti->errno > 0) {
    die("<b>Sorgu Hatası:</b> " . $baglanti->error);
}
echo "ManagementCouncil Tablo başarıyla oluşturuldu.<br/>";






$baglanti->close();

?>