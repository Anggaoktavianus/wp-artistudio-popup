📌 Deskripsi

Plugin ini adalah plugin WordPress yang menampilkan pop-up pada halaman tertentu menggunakan Custom Post Type (CPT) dan Custom Fields. Plugin ini menggunakan React.js untuk tampilan pop-up dan WordPress REST API untuk mengambil data pop-up dari backend.

🚀 Fitur

1.Menggunakan Object-Oriented Programming (OOP) dengan PHP Namespace, Trait, dan Interface.

2.Memanfaatkan Singleton Pattern untuk pengelolaan instance.

3.Menyediakan Custom Post Type (CPT) untuk mengelola pop-up tanpa plugin eksternal.

4.Frontend menggunakan React.js dan dihubungkan dengan backend melalui WordPress REST API.

5.API hanya dapat diakses oleh pengguna yang sudah login untuk keamanan.

⚙️ Instalasi

Clone repositori ini ke folder plugin WordPress:

git clone https://github.com/username/my-popup-plugin.git wp-content/plugins/my-popup-plugin

Aktifkan plugin dari dashboard WordPress:

Buka Dashboard → Plugins → My Pop-up Plugin → Activate

Flush Permalinks:

Masuk ke Settings → Permalinks → Klik Save Changes tanpa mengubah apa pun.

Jalankan build React untuk frontend:
cd wp-content/plugins/my-popup-plugin
npm install
npm run build
