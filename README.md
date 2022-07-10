# Website Kantin Kejujuran
**Website Kantin Kejujuran** adalah sebuah website dinamik yang dibuat untuk menunjang pelaksanaan **Kantin Kejujuran** untuk siswa SD SEA Sentosa. Dalam pembuatannya, website ini menggunakan bahasa pemrograman **HTML**, **Javascript**, dan **CSS** beserta framework CSS berupa **Bootstrap** untuk membuat dan mengatur tampilan web supaya mudah digunakan dan responsif pada banyak perangkat. Website ini juga menggunakan bahasa pemrograman **PHP** dan **MySql** untuk mengatur bagian server dan database penyimpanan data siswa.

Website Kantin Kejujuran dijalankan pada server cloud milik **Heroku** dan menggunakan database milik **db4free**. Dengan demikian semua orang bisa mengakses website secara langsung dari internet. Untuk mengakses kode dan database dari website Kantin Kejujuran, silahkan kunjungi link berikut:

link kode github: [frz-cmpfst14-kantin-kejujuran](https://github.com/fairuz1/frz-cmpfst14-kantin-kejujuran)

link database: [db4Free.net](https://www.db4free.net/phpMyAdmin/) (**username**: fairuz1 **password**: compfestsea)

**proses login ke database memang memakan waktu yang sedikit lama dari server, jadi silahkan ditunggu saja. Setelah masuk ke database nantinya, penggunaan database tidak akan selama login**

## Kegunaan Website
Seperti kantin pada umumnya, Kantin Kejujuran merupakan kantin yang berada pada sebuah website. Namun, Kantin Kejujuran ini berbasis kejujuran dari semua siswa yang telah teregistrasi menjadi member di kantin ini. Dengan kata lain, kantin ini tidak memeiliki pemilik dan jika siswa ingin menjual atau membeli barang di kantin ini maka akan dilakukan sendiri sendiri dengan jujur.

Nantinya, semua uang hasil transaksi jual beli akan diletakan menjadi satu di sebuah **balance box** yang bisa diakses oleh semua siswa yang telah teregistrasi menjadi member di kantin tersebut. Sehingga semua member bisa mengambil uang hasil penjualan barang mereka pada balance box atau membayar barang yang mereka beli dengan menambah uang pada balance box.

Selain itu, terdapat banyak hal yang bisa dilakukan di website Kantin Kejujuran ini, Hal hal tersebut adalah seperti berikut:
- Registrasi untuk menjadi member
- Login dan logout
- Membeli dan menjual items
- Mengambil uang dan menambah uang pada balance box
- Mengurutkan barang berdasarkan tanggal atau nama

## Cara Menggunakan dan Mengakses Website
Untuk mengakses website Kantin Kejujuran Silahkan kunjungi laman web berikut pada browser masing masing:
https://frz-cmpfst14-kantin-kejujuran.herokuapp.com/

Setelah itu pengguna akan diarahkan ke laman website Kantin Kejujuran. Pada laman tersebut pengguna dapat melihat isi kanti kejujuran dengan menekan **Get Inside** pada bar navigasi. Namun karena pengguna tidak melakukan login, maka pengguna hanya dapat melihat lihat isi web saja. Untuk dapat melakukan aktivitas dan menggunakan kantin kejujuran, Pengguna perlu meregistrasi diri dahulu. 

- Registrasi
Registrasi dapat dilakukan pengguna dengan menekan **Register** pada bar navigasi. Kemudian pengguna akan diminta mengisi beebrapa data. Setelah mengisi data yang diminta, pengguna dapat menekan tombol submit untuk mengirim data pengguna. Data pengguna yang dikirim tersebut kemudian akan digunakan untuk melakukan login ke dalam Kantin Kejujuran. Jika Registrasi berhasil, maka pengguna akan dialihkan ke laman dengan tulisan "Congratulation" berlatar belakang warna hijau. Silahkan tekan "Click Here" untuk kembali ke laman sebelumnya dan melakukan login. Namun, jika gagal maka anda akan mendapatkan tulisan yang akan memandu anda supaya proses registrasi menjadi berhasil.

- login dan logout
Login dapat dilakukan dengan menekan tulisan **login** pada bar navigasi. Kemudian silahkan isi data yang sudah anda registrasikan sebelumnya. Jika login anda sukses, maka anda akan dialihkan ke dalam main page Kantin Kejujuran. Didalam main page tersebut, anda akan menemui nama anda pada bar navigasi dan tulisan hijau bagian pada kanan bawah layar anda. Namun jika login anda gagal, anda akan mendapatkan tulisan kuning dan anda juga tidak akan dialihkan ke main page Kantin Kejujuran.

Untuk melakukan **logout**, silahkan tekan nama anda pada bar navigasi. Kemudian pilih logout. Setelah itu anda akan dialihkan ke laman pertama Kantin Kejujuran dan session login anda telah berakhir. Silahkan lakukan login lagi untuk menggunakan Kantin Kejujuran sepenuhnya.

- Menjual items/barang
Untuk menjual barang, silahkan menekan nama anda pada bar navigasi lalu pilih **Sell Items**. Kamudian isi data data yang diperlukan untuk menjual barang dan tekan tombol "Sell items" untuk menjual items. Jika penjualan barang berhasil, maka anda akan mendapatkan tulisan hijau yang menyatakan bahwa produk anda telah terjual. Jika tidak berhasil, maka anda akan mendapatkan tulisan yang akan membantu anda menjual barang yang anda inginkan. Setelah itu anda dapat menekan "Click Here" untuk kembali ke main page Kantin Kejujuran untuk melihat barang yang sudah anda jual atau memprbaiki data mengenai barang yang akan anda jual.

- Membeli items/barang
Untuk membeli barang, siswa dapat langsung memilih barang yang ingin dibeli dan kemudian tinggal menekan tombol **BUY**. Lalu siswa akan diberikan sebuah konfirmasi untuk membeli barang. Jika barang telah terbeli, maka siswa akan mendapatkan tulisan hijau menyatakan barang sudah terbeli. Siswa kemudian bisa menekan "Click Here" untuk kembali ke main page dan membayar barang yang telah dibeli dengan menambahkan uang pada balance box.

- Mengambil uang dari balance box
Pengambilan uang hasil penjualan barang dapat dilakukan dengan menekan nama pengguna pada bar navigasi lalu pilih **Withdraw Balance**. Kemudian masukan nominal uang yang ingin dikeluarkan(dalam angka bukan huruf). Setelah itu jika sukses maka anda akan mendapatkan tulisan hijau yang menyatakan bahwa anda sukses mengeluarkan uang dari balance box. Pastikan bahwa uang yang anda ingin ambil tidak melebihi uang pada balance box supaya proses pengambilan uang tidak gagal. Selain itu, pastikan juga anda memasukan angka saja tanpa huruf ketika menspesifikasikan nominal uang yang akan ditarik.

- Menambah uang dari balance box
Untuk membayar atau menambah uang pada balance box, pengguna dapat menekan tombol **Balance Box** pada bagian akhir/paling bawah main page. Kemudian pengguna dapat menekan tombol **Add Balance** untuk menambah uang pada balance box. Pastikan nominal uang yang ingin ditambahkan dalam bentuk angka bukan huruf.

- Mengurutkan barang atau items
Untuk mengurutkan items berdasarkan tanggal atau nama items, pengguna tinggal menekan tulisan **Sort items by** dan memilih pilihan pengurutan yang diinginkan. Items kemudian akan terurut otomatis sesuai pilihan pengguna

## Credits
Semua gambar yang saya gunakan pada wensite ini didapatkan dari website https://unsplash.com/. Gambar bisa dicari pemiliknya dengan mencari nama produk pada gambar pada search bar atau mencari dengan kategori snacks, dirnks, foods pada search bar.
