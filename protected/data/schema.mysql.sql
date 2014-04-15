# 确保插入的中文是utf8
set names utf8;
# Provider表  （资源提供商帐号， 如Linode, 阿里云, 万网等）
CREATE TABLE tbl_provider
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,             # 提供商名字: Linode, Aliyun, WanWang, xxxx
    type INTEGER NOT NULL DEFAULT 0,   # 提供商类型,0-预留 1-主机 2-域名 3-CDN 4-第三方统计
    login_user VARCHAR(128) NOT NULL,      # 登录用户名
    login_pass VARCHAR(128) NOT NULL,       # 登录密码
    login_url  VARCHAR(256) NOT NULL,        #登录URL
    admin_user VARCHAR(128),           # 管理用户名， 有的提供商有单独的管理界面，例如buyvm
    admin_pass VARCHAR(128),          # 管理密码
    admin_url     VARCHAR(256),          # 管理URL
    payment_type INTEGER NOT NULL, # 付费类型：0-预留 1-免费  2-支付宝  3-信用卡  4-公司转账 5-其他
    payment_info TEXT    # 付费相关信息：例如发票抬头，发票开具情况
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# 用户表
CREATE TABLE tbl_user
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(128) NOT NULL,
    password VARCHAR(128) NOT NULL,
    email VARCHAR(128) NOT NULL,
    profile TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# Host表（主机资源表)
CREATE TABLE tbl_host
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type INTEGER NOT NULL, # 资源类型,  0-预留 1-VPS  2-托管主机  3-物理主机
    ip  VARCHAR(15) NOT NULL,  # ip地址
    location VARCHAR(128), # 资源位置
    login_user VARCHAR(128) NOT NULL,    #登录用户名 (默认 root 或 admistrator)
    login_pass VARCHAR(128) NOT NULL,   # 登录密码
    cores INTEGER NOT NULL DEFAULT 1,  #核数
    memory INTEGER NOT NULL DEFAULT 512,  # 内存大小, 单位M
    disk INTEGER NOT NULL DEFAULT 10,  #系统盘大小 ,  单位G
    data INTEGER NOT NULL DEFAULT 0,  #数据盘大小 , 单位G
    os INTEGER NOT NULL DEFAULT 1,  # 操作系统: 0-预留 1-CentOS 2-Windows ...
    osver VARCHAR(128) NOT NULL DEFAULT "64bit", #操作系统版本
    bandwidth_type INTEGER NOT NULL DEFAULT 1,  # 带宽类型：0-预留  1-不限 2-限速  2-限量  
    bandwidth INTEGER NOT NULL DEFAULT 0,  #带宽数值， 单位M（限速）或 G（限量）
    create_time DATE, #资源起始时间
    expire_time DATE, # 资源失效时间
    owner_id  INTEGER NOT NULL,   # 归属用户（责任人）
    provider_id INTEGER NOT NULL,    # 归属于哪个提供商
    price INTEGER NOT NULL DEFAULT 0, # 年费(RMB)
    memo TEXT,  # 相关补充信息
    CONSTRAINT FK_host_owner FOREIGN KEY (owner_id)
        REFERENCES tbl_user (id) ON DELETE RESTRICT ON UPDATE RESTRICT,   #外键限制，限制不能轻易删除provider
    CONSTRAINT FK_host_provider FOREIGN KEY (provider_id)
        REFERENCES tbl_provider (id) ON DELETE RESTRICT ON UPDATE RESTRICT   #外键限制，限制不能轻易删除provider
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
 
# 域名表
CREATE TABLE tbl_domain
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(128) NOT NULL,  # 域名
    dns VARCHAR(128),  #解析DNS
    beian VARCHAR(128), #备案号
    create_time DATE, #资源起始时间
    expire_time DATE, # 资源失效时间
    owner_id  INTEGER NOT NULL,   # 归属用户（责任人）
    provider_id INTEGER NOT NULL,    # 归属于哪个提供商
    price INTEGER NOT NULL DEFAULT 0, # 年费
    memo TEXT,  # 相关补充信息
    CONSTRAINT FK_domain_owner FOREIGN KEY (owner_id)
        REFERENCES tbl_user (id) ON DELETE RESTRICT ON UPDATE RESTRICT,   #外键限制，限制不能轻易删除provider
    CONSTRAINT FK_domain_provider FOREIGN KEY (provider_id)
        REFERENCES tbl_provider (id) ON DELETE RESTRICT ON UPDATE RESTRICT   #外键限制，限制不能轻易删除provider
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# CDN
CREATE TABLE tbl_cdn
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(128) NOT NULL,  # 空间名
    quota INTEGER NOT NULL DEFAULT 0, #配额 
    create_time DATE, #资源起始时间
    expire_time DATE, # 资源失效时间
    owner_id  INTEGER NOT NULL,   # 归属用户（责任人）
    provider_id INTEGER NOT NULL,    # 归属于哪个提供商
    price INTEGER NOT NULL DEFAULT 0, # 年费
    memo TEXT,  # 相关补充信息
    CONSTRAINT FK_cdn_owner FOREIGN KEY (owner_id)
        REFERENCES tbl_user (id) ON DELETE RESTRICT ON UPDATE RESTRICT,   #外键限制，限制不能轻易删除provider
    CONSTRAINT FK_cdn_provider FOREIGN KEY (provider_id)
        REFERENCES tbl_provider (id) ON DELETE RESTRICT ON UPDATE RESTRICT   #外键限制，限制不能轻易删除provider
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# 第三方统计
CREATE TABLE tbl_stat
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name  VARCHAR(128) NOT NULL,  # 站点名称
    siteid VARCHAR(128) NOT NULL, # 站点ID
    view_pass VARCHAR(128) NOT NULL, #查看密码
    owner_id  INTEGER NOT NULL,   # 归属用户（责任人）
    provider_id INTEGER NOT NULL,    # 归属于哪个提供商
    memo TEXT,  # 相关补充信息
    CONSTRAINT FK_resource_owner FOREIGN KEY (owner_id)
        REFERENCES tbl_user (id) ON DELETE RESTRICT ON UPDATE RESTRICT,   #外键限制，限制不能轻易删除provider
    CONSTRAINT FK_resource_provider FOREIGN KEY (provider_id)
        REFERENCES tbl_provider (id) ON DELETE RESTRICT ON UPDATE RESTRICT   #外键限制，限制不能轻易删除provider
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

# 术语对照表
CREATE TABLE tbl_lookup
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    code INTEGER NOT NULL,
    type VARCHAR(128) NOT NULL,
    position INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('主机', 'ProviderType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('域名', 'ProviderType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('CDN', 'ProviderType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('第三方统计', 'ProviderType', 4, 4);
 
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('免费', 'ProviderPaymentType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('支付宝', 'ProviderPaymentType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('信用卡', 'ProviderPaymentType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('公司转账', 'ProviderPaymentType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('其他', 'ProviderPaymentType', 5, 5);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('VPS', 'HostType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('托管主机', 'HostType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('物理主机', 'HostType', 3, 3);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('不限', 'HostBandwidthType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('限速', 'HostBandwidthType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('限量', 'HostBandwidthType', 3, 3);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('CentOS', 'HostOS', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Windows', 'HostOS', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Ubuntu', 'HostOS', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Debian', 'HostOS', 4, 4);

INSERT INTO tbl_user (username, password, email) VALUES('admin', 'adminpass', 'admin@itms.com');

