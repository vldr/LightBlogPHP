![alt text](https://raw.githubusercontent.com/VladReinis/lightblog/master/assets/themes/default/images/logo.png "Title")

LightBlog
=========

Light weight blog system, super simple, super functional. 
Uses PHP, and MySQL PDO. <br>

Why would I use this?
=========
It's light weight, simple, and functional. I'm not saying you should choose this over anything but, if you need something simple and something that functions, in that case this will be perfect for you! 

You can get started easily but placing the all the files, configuring the information, and upload the SQL file.

Installation
=========

1. Firstly, you'll need to download the lightblog files, just click the 'Download Zip' on the side.
2. Next, upload the contents of the 'upload' folder in your web server and begin to open <code>assets/config/config.php</code>.
3. Upload the 'blog.sql' into your database.
4. Edit your default theme, company name, title of the pages, base url, accounts, and database information.
5. Create an Disqus account, and create a chat: https://disqus.com/websites/
6. Go to 'viewpost.php' and edit the 'CHANGETHIS_TO_YOUR_USERNAME' on line 35 to your Disqus username/chat.
7. Finally you'll be able to blog and do whatever you want! Enjoy!

How to add a admin user?
=========
The process is very simple:<br>
1. Open up: <code>assets/config/config.php</code>.<br>
2. Simply edit or add <code>, "username2" => "password2"</code> at the end of the array.<br>
3. Enjoy, theres also an example inside the file if you don't understand this.<br>

Disclaimer
=========
It was made by two guys for a community that wanted a blog system, we got some people who wanted the source code, and so we published it to github. <br>
That's why I uploaded it into github so fellow others can help out in the development and work out some bugs/glitches/exploits.

<hr>
### Developed by:<br>
vldr.xyz, and Seenko.IO
