# WP-IPIP

**WP-IPIP** 是一款根据 IP 显示评论来源地址的插件。

插件使用 IPIP 免费版数据库。

## 安装

### 手动安装

将文件复制到 WordPress 的插件目录下即可，文件应该在 `/wp-content/plugins/wp-ipip` 目录下。

### IPIP数据库安装

IPIP 数据库文件路径：`插件路径/17mon/php/17monipdb.dat`。插件包中目前自带 2017.01 中文版数据库。

目前支持免费版的中文版本和英文版本。手头没有收费版数据库，未进行开发。

## 使用

插件启用后，评论页面将会在 IP 下显示物理地址。IPIP 免费版精度支持到地级市。

## 注意事项

插件使用的数据库文件需要在运行时载入内存，整个插件会占用约 4M 左右的内存。按照以往经验，Wordpress 在运行时要占用 28M 左右的内存。如果您的服务器对 PHP 运行内存限制为 32M 或者更低的话，会出现评论页面无法正确载入，或载入后页面功能失效的问题。

请先确认自己的 PHP 运行环境是否有类似限制。

## 已知兼容性问题

### PHP

至少 PHP5.3 以上版本

### akisment

与 akisment 兼容

### wp-useragent

与插件 wp-useragent 曾存在兼容性问题。具体原因是因为 wp-useragent 并未使用 Wordpress 推荐的 filter & return 方式输出结果，并非本插件的问题。已在此版本中优化。

## 链接

IPIP官方解析代码-PHP：<https://github.com/17mon/php>
