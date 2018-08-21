/**
 * What is AJAX?
 * AJAX is a httpRequest
 * 使用 JavaScript 即時與伺服器進行少量資料交換，來非同步局部更新網頁
 *
 * AJAX How to work
 * 1. 使用者在「瀏覽器」觸發一個事件，例如點擊按鈕
 * 2. 將上述獲的事件的同時，使用 JavaScript 的 XMLHttpRequest 物件，在背景對「Web 伺服器」發送一個 HTTP 請求，
 *    達到與「Web 伺服器」進行資料的非同步交換
 * 3. 將從「Web 伺服器」取得的資料，使用 JavaScript 操作 DOM，來實現動態局部更新「瀏覽器」的網頁內容
 *
 * 完整的 HTTP 流程
 * 1. 建立 TCP 連接
 * 2. 瀏覽器：向「Web 伺服器」發送請求命令
 * 3. 瀏覽器：發送請求表頭（headers）
 * 4. Web 伺服器：回應（response）
 * 5. Web 伺服器：發送回應（response）資訊
 * 6. Web 伺服器：向「瀏覽器」發送資料
 * 7. Web 伺服器：關閉 TCP 連接
 *
 * request method GET or POST
 * GET:
 * ?name=value&name2=value2 in url
 * POST:
 * name = value not in url
 *
 * construct of request
 * 1. http method ( GET or POST)
 * 2. target url
 * 3. optional: header
 * 4. optional: body
 *
 * http status code
 * 1xx：指示資訊。表示收到 Web 瀏覽器請求，正在進一步的處理中
 * 2xx：成功。表示請求已經被正確接收，並已經被理解和接受，例如：200 OK
 * 3xx：重新導向。表示請求沒有成功，必須採取進一步的動作以完成請求
 * 4xx：客戶端錯誤。表示客戶端提交的請求中有錯誤或者不能被完成，例如：404 NOT found，代表請求中引用的檔案不存在
 * 5xx：伺服器錯誤。表示伺服器不能完成請求的處理，儘管請求是正確的，例如：500 Internal Server Error，
 *      代表伺服器遇到了一個未曾預料的狀況，通常是伺服器的程式碼出錯
 */

// require jquery
command = '';
command += 'var newScript = document.createElement(\'script\');';
command += 'newScript.type = "text/javascript";';
command += 'newScript.src="/assets/js/jquery-3.3.1.js";';
command += 'newScript.charset="UTF-8";';
command += 'document.head.append(newScript);';
eval(command);
delete command;
document.getElementById('hiddenScript').replaceWith('');