#初步安裝

1.安裝 Docker

2.將專案複製下來，執行該指令  
git clone git@github.com:mary79930/exchange.git

3.依據專案的 docker-compose.yml 設定檔去設置你的環境  
docker-compose up -d --build

4.設置完成後，即可輸入下列網址就可以看到貨幣轉換器專案產生  
http://localhost:8010/exchange

---

#單元測試使用方法

1.在 exchange 資料夾下，進入 php-laravel_other 的容器  
docker exec -it php-laravel_other bash

2.往上一層從/var/www/html#，移動至/var/www#  
cd ..

3.進入 exchange 資料夾底下  
cd exchange

4.即可進行單元測試  
php artisan test

提醒：如需跳出容器，可執行 exit 即可跳出
