# WP-IPIP

**WP-IPIP** 是一款根据 IP 显示评论来源地址的插件。插件使用 IPIP.net 免费版数据库。

## 安装

### 手动安装

本插件未包含在 WordPress Plugin 仓库中，所以需要手动安装。

将文件复制到 WordPress 的插件目录下即可，文件应该在 `/wp-content/plugins/wp-ipip` 目录下。

结构：

```
└── wp-content
    └── plugins
        └── wp-ipip
            ├── 17mon
            │   └── php
            │       ├── 17monipdb.datx
            │       ├── IP4datx.class.php
            │       └── readme.txt
            ├── Changelog.md
            ├── js
            │   └── wp-ipip.js
            ├── README.md
            ├── wp-ipip-options.html
            ├── wp-ipip-options.php
            └── wp-ipip.php
```

### IPIP数据库安装和更新

IPIP 数据库文件路径：`{插件路径}/17mon/php/17monipdb.datx`，直接用新的数据库覆盖此文件即可。插件包中目前自带一份中文版数据库。

你可以在IPIP的官网下载最新版的数据库：<https://www.ipip.net/download.html>

**注意：根据 IPIP.net 2018 年 3 月 发布的数据库信息，未来的格式支持中不再支持 DAT 格式。**

**所以从 0.2.0 版本开始，插件将仅支持 DATX 版本的数据库。对于英文版和一些有特殊情况而使用 DAT 格式的用户，请继续使用 0.1.X 版本。**

### 更新

插件未在 WordPress 上保存任何数据，所以建议更新时删除旧插件并上传新文件。

### 卸载

插件未在 WordPress 上保存任何数据，所以可以直接删除。

## 使用

插件启用后，将会在评论页面将会在 IP 下显示物理地址。

IPIP 免费版精度支持到地级市。

本插件不支持 IPIP 收费版数据库。

## 注意事项

插件使用的数据库文件需要在运行时载入内存，整个插件会占用约 4M 左右的内存。按照经验，Wordpress 在运行时要占用 28M 左右的内存。如果您的服务器对 PHP 运行内存限制为 32M 或者更低的话，会出现评论页面无法正确载入，或载入后页面功能失效的问题。

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
