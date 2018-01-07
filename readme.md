# CI-Beam

**CI-Beam** atau *CodeIgniter Beam* adalah sebuah *bootstrap* bagi framework CodeIgniter yang menyediakan berbagai 
komponen dan library standard bagi aplikasi berbasis web.

## Instalasi
Pastikan [Composer](https://getcomposer.org) dan [Bower](https://bower.io) telah terinstall di komputer kamu, sebelum 
menggunakan CI-Beam.

Lakukan langkah-langkah berikut untuk melakukan instalasi CI-Beam:

1. Download CI-Beam ke direktori tujuan.
2. Pindah ke direktori CI-Beam.
3. Jalankan `composer install`.
4. Pindah ke direktori `assets`.
5. Jalankan `bower update`.

# Codeigniter CRUD Generator 1.4 by harviacode.com
About :
Codeigniter CRUD Generator is a simple tool to auto generate model, controller and view from your table. This tool will boost your writing code. This CRUD generator will make a complete CRUD operation, pagination, search, form*, form validation, export to excel and export to word. This CRUD Generator using bootstrap 3 style. You still need to modify the result code for more customization.

*generate textarea and text input only

Please visit and like harviacode.com for more info and PHP tutorials.

Preparation before using this CRUD Generator (Important) :
On application/config/autoload.php, load database library, session library and url helper.
On application/config/config.php, set $config['base_url'] = 'http://localhost/yourprojectname', $config['index_page'] = '', $config['url_suffix'] = '.html' and $config['encryption_key'] = 'randomstring'
On application/config/database.php, set hostname, username, password and database
How to use this CRUD Generator :
Simply put 'harviacode' folder, 'asset' folder and .htaccess file into your project root folder.
Open http://localhost/yourprojectname/harviacode.
Select table and push generate button.
OR

watch video on https://youtu.be/OHZ7hhRLUZM

FAQ :
Select table show no data. Make sure you have correct database configuration on application/config/database.php and load database library on autoload.
Error chmod on mac and linux. Please change your application folder and harviacode folder chmod to 777
Error 404 when click Create, Read, Update, Delete or Next Page. Make sure your mod_rewrite is active and you can access http://localhost/yourproject/welcome. The problem is on htaccess. Still have problem? please go to google and search how to remove index.php codeigniter.
Error cannot Read, Update, Delete. Make sure your table have primary key.

https://bitbucket.org/harviacode/codeigniter-crud-generator/src


