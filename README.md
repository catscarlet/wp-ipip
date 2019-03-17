# WP-IPIP

**WP-IPIP** 是一款根据 IP 显示评论来源地址的插件。插件使用 IPIP.net 免费版数据库。

![wp-ipip snapshot](snap.png "wp-ipip snapshot, works with akisment and wp-useragent")

## 版本说明

- 0.1 版本支持 DAT 数据库
- 0.2 - 2.0.0 支持 DATAX 数据库
- 3.0.0 支持 IPDB 数据库

## 安装

### 手动安装

本插件未包含在 WordPress Plugin 仓库中，所以需要手动安装。

将文件复制到 WordPress 的插件目录下即可，文件应该在 `/wp-content/plugins/wp-ipip` 目录下。

项目主要文件结构：

```
Wordpress
└── wp-content
    └── plugins
        └── wp-ipip
            ├── Changelog_en.md
            ├── ipipdotnet
            │   ├── ipdb-php
            │   │   └── src
            │   │       └── ipip
            │   │           └── db
            │   │               ├── City.php
            │   │               └── Reader.php
            │   └── ipipfree.ipdb
            ├── js
            │   └── wp-ipip.js
            ├── wp-ipip-ipdbloader.php
            ├── wp-ipip-options.html
            ├── wp-ipip-options.php
            └── wp-ipip.php
```

### IPIP数据库安装和更新

IPIP 数据库文件路径：`{插件路径}/ipipdotnet/ipipfree.ipdb`，直接用新的数据库覆盖此文件即可。插件包中目前自带一份中文版数据库。

你可以在 IPIP 的官网下载最新版的数据库：<https://www.ipip.net/download.html>

### 更新

插件未在 WordPress 上保存任何数据，建议更新时删除旧插件并上传新文件。

### 卸载

插件未在 WordPress 上保存任何数据，直接删除插件目录。

## 注意事项

插件使用的数据库文件需要在运行时载入内存，整个插件会占用约 4M 左右的内存。如果出现评论页面无法正确载入，或载入后页面功能失效的问题，请检查您服务器的内存限制。按照以往经验，不加载其他插件的 4.3.X 版本启动后会使用约 28M 内存，如果您的服务器对 PHP 运行内存限制为 32M 或者更低的话，将无法正常使用本插件。

请先确认自己的 PHP 运行环境是否有类似限制。

## 兼容性

### PHP

至少 PHP5.3 以上版本

### akisment

如果用户在评论时未填写网站，则插件产生的定位地址文字上会出现 akisment 原本用于移除 URL 的删除按钮，并且当鼠标悬浮在定位地址上时会出现对 IPIP.net 地址的预览。

此问题正在解决中。

### wp-useragent

与插件 wp-useragent 兼容。

### 移动端

移动端未测试。

### 收费版

IPIP 收费版数据库未经测试。

## 链接

- IPIP, IPDB 格式官方解析代码：<https://github.com/ipipdotnet/ipdb-php>

## License

Apache License
