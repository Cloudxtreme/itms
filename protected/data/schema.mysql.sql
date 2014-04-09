# Provider表  （资源提供商帐号， 如Linode, 阿里云, 万网等）
CREATE TABLE tbl_provider
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,             # 提供商名字: Linode, Aliyun, WanWang, xxxx
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

# Resource表（资源表，一个资源很可能是一台主机）

CREATE TABLE tbl_resource
(
    id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    type INTEGER NOT NULL, # 资源类型,  0-预留 1-VPS  2-托管主机  3-物理主机 4-云空间 5-域名 6-其他
    ip  VARCHAR(15) NOT NULL,  # ip地址
    location VARCHAR(128), # 资源位置
    login_user VARCHAR(128) NOT NULL,    #登录用户名 (默认 root 或 admistrator)
    login_pass VARCHAR(128) NOT NULL,   # 登录密码
    cores INTEGER NOT NULL,  #核数
    memory INTEGER NOT NULL,  # 内存大小, 单位M
    disk INTEGER NOT NULL,  #系统盘大小 ,  单位G
    data INTEGER NOT NULL,  #数据盘大小 , 单位G
    bandwidth_type INTEGER NOT NULL,  # 带宽类型：0-预留  1-限速  2-限量  
    bandwidth INTEGER NOT NULL,  #带宽数值， 单位M（限速）或 G（限量）
    create_time INTEGER, #资源起始时间
    expire_time INTEGER, # 资源失效时间
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
 
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('免费', 'ProviderPaymentType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('支付宝', 'ProviderPaymentType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('信用卡', 'ProviderPaymentType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('公司转账', 'ProviderPaymentType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('其他', 'ProviderPaymentType', 5, 5);
#  1-VPS  2-托管主机  3-物理主机 4-云空间 5-域名 6-其他
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('VPS', 'ResourceType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('托管主机', 'ResourceType', 2, 2);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('物理主机', 'ResourceType', 3, 3);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('云空间', 'ResourceType', 4, 4);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('域名', 'ResourceType', 5, 5);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('其他', 'ResourceType', 6, 6);

INSERT INTO tbl_lookup (name, type, code, position) VALUES ('限速', 'ResourceBandwidthType', 1, 1);
INSERT INTO tbl_lookup (name, type, code, position) VALUES ('限量', 'ResourceBandwidthType', 2, 2);

INSERT INTO tbl_user (username, password, email) VALUES('admin', 'adminpass', 'admin@itms.com');

