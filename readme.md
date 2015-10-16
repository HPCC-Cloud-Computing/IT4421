###Hướng dẫn sử dụng git:
##1. Download and install laravel
git clone https://github.com/cloudcomputinghust/IT4421.git

cd IT4421/

composer install

##2. Setting remote:
git remote add origin https://github.com/cloudcomputinghust/IT4421.git


##3. Pull code ve(update code tu git ve):

git pull origin master

##4. Push:
git add 		(add file can push)

git commit -m "your name: giai thich update cai gi"         
//ví dụ: git commit -m "Bình: update class UserController"

git push -u origin master            
//(chắc chắn phải có -u, để check xem code của bạn đã là code mới nhất chưa, nếu chưa thì git pull nhé)


###Huong dan su dung Migrate:
##1. Sau khi clone code or pull code ve, tao moi database:

php artisan migrate

##2. Neu da ton tai database truoc do, refesh database de cap nhat thay doi:

php artisan migrate:refresh

###Huong dan chạy Seeder:

##1. Điều kiện: đã có cơ sở dữ liệu phía trên, chưa có dữ liệu gì cả
##2. Chạy lệnh để tạo cơ sở dữ liệu mẫu trong thư mục /path/to/IT4421/

php artisan db:seed






































