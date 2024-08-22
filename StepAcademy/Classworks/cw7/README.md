
## Put the following code at the end of `C:\xampp\apache\conf\httpd.conf`

```
<VirtualHost *:80>
    DocumentRoot "C:\xampp\htdocs\PHP-Course\StepAcademy\Classworks\cw7\store\public_html"
    ServerName localhost
    ServerAlias localhost
    <Directory "C:\xampp\htdocs\PHP-Course\StepAcademy\Classworks\cw7\store\public_html">
        Options Indexes FollowSymLinks Includes ExecCGI
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```