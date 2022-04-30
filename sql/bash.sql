create table filmtypesList(
filmtypesListId int auto_increment primary key,
chineseName varchar(20) not null,
englishName varchar(20) not null
);


create table country(
countryId int auto_increment primary key,
chineseName varchar(20) not null,
englishName varchar(20) not null
);


create table downLink(
downLinkId int auto_increment primary key,
filmsId int not null,
linkName varchar(255) not null,
linkType tinyint not null comment '1迅雷 2电驴 3磁力 4http',
downLink text,
createTime int not null,
updateTime int not null
);

#playAddr
create table bajiecaiji(
playAddrId int auto_increment primary key,
filmsId int not null,
playAddrName varchar(255) not null,
playAddr varchar(255) not null,
linkType tinyint not null comment '1.yun 2.m3u8',
createTime int not null,
updateTime int not null
);

create table downLinkType(
downLinkTypeId int auto_increment primary key,
downLinkTypeName varchar(50) not null
);



create table baiduCloud(
baiduCloudId int auto_increment primary key,
filmsId int not null,
baiduCloudLink varchar(255),
Password varchar(10)
);


create table filmtypes(
filmtypesId int auto_increment primary key,
filmsId int not null,
typeStatus tinyint not null comment "1喜剧 2动作 3爱情 4科幻 5动画 6悬疑 7惊悚 8恐怖 9犯罪 10冒险 11剧情 12战争 13奇幻 14传记 15其他"

);


create table films(
filmsId int auto_increment primary key,
filmsName varchar(255) not null,
tags SMALLINT not null,
countries SMALLINT not null comment "1大陆 2香港 3美国 4日本 5泰国 6韩国 7法国 8英国 9德国 10俄罗斯 11加拿大 12巴西 13丹麦 14意大利 15印度 16西班牙 17其他",
years int not null,
directors varchar(100),
stars text,
douban float not null,
filmLength varchar(50),
language varchar(255),
content text,
mainPicAddr varchar(255),
createTime int not null,
updateTime int not null,
isDel int not null default 0,
types SMALLINT not null default 400 comment "400电影 401电视剧 402综艺 403动漫"
);

create table videoType(
videoTypeId int auto_increment primary key,
filmsId int not null,
videoType varchar(30) not null comment '1电影 2剧集 3综艺 4动漫'
);

create table hot(
hotId int auto_increment primary key,
filmsId int not null,
filmsName varchar(255) not null,
videoType tinyint not null comment '1.热门 2.最新 3.欧美 4.华语 5.韩国 6.日本 7.经典 8.豆瓣高分 100.热门 101.美剧 102.英剧 103.韩剧 104.日剧 105.国产剧 106.港剧 107日本动画 108纪录片 109综艺',
createTime int not null,
updateTime int not null,
isDel int not null default 0
);


create table doubanTop(
doubanTopId int auto_increment primary key,
filmsId int not null,
filmsName varchar(255) not null,
createTime int not null,
updateTime int not null,
isDel int not null default 0
);


create table superHero(
superHeroId int auto_increment primary key,
filmsId int not null,
filmsName varchar(255) not null,
types tinyint not null comment "1marvel 2DC",
createTime int not null,
updateTime int not null,
isDel int not null default 0
);




https://www.piaohua.com/ 下载连接
http://cj.bajiecaiji.com 在线播放连接

1.热门 2.最新 3.欧美 4.华语 5.韩国 6.日本 7.经典 8.豆瓣高分 100.热门 101.美剧 102.英剧 103.韩剧 104.日剧 105.国产剧 106.港剧 107日本动画 108纪录片 109综艺
首页:
热门电影：1热门
最新电影：2最新
豆瓣高分：8豆瓣高分
热门欧美：3欧美
经典电影：7经典
热门美剧：101美剧
热门英剧：102英剧
热门韩剧：103韩剧
热门日剧：104日剧
热门港剧：106港剧
国产剧：105国产剧
热门日本动画：107日本动画
热门综艺片：109综艺片

电影:
热门电影：1热门
最新电影：2最新
豆瓣高分：8豆瓣高分
热门欧美：3欧美
热门华语：4华语
热门韩国：5韩国
热门日本：6日本
经典电影：7经典

连续剧:
热门：100热门
热门美剧：101美剧 
热门英剧：102英剧 
热门韩剧：103韩剧 
热门日剧：104日剧 
热门国剧：105国产剧 
热门港剧：106港剧








热度
封面
2分钟
4K











