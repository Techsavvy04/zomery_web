<?php
$sql = ["DROP TABLE IF EXISTS `thanhdieuloveday`;",
        "CREATE TABLE `comments` (
          `comment_id` int(11) NOT NULL,
          `noidung` text DEFAULT NULL,
         `ngaybinhluan` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
          `hovaten` varchar(255) NOT NULL,
          `taikhoan` varchar(255) NOT NULL,
          `avatar` varchar(255) NOT NULL,
          `tichxanh` varchar(255) NOT NULL,
          `ip` varchar(255) NOT NULL,
          `vitri` varchar(255) NOT NULL,
          `device` varchar(255) NOT NULL,
          `browser` varchar(255) NOT NULL,
          `device_icon` varchar(255) NOT NULL,
          `browser_name` varchar(255) NOT NULL,
          `role` varchar(255) NOT NULL,
          `banned` int(11) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        CREATE TABLE `love_setting` (
          `id` int(11) NOT NULL,
          `tenban` varchar(255) NOT NULL,
          `tennguoiay` varchar(255) NOT NULL,
          `cunghoangdao_boy` varchar(255) DEFAULT NULL,
          `avatarboy` varchar(255) DEFAULT NULL,
          `ngayhenho` varchar(255) DEFAULT NULL,
          `cunghoangdao_girl` varchar(255) NOT NULL,
          `avatargirl` varchar(255) NOT NULL,
          `themerela` varchar(255) NOT NULL,
          `effect_fall` varchar(255) NOT NULL,
          `music` varchar(500) NOT NULL,
          `titlelove` varchar(255) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        INSERT INTO `love_setting` (`id`, `tenban`, `tennguoiay`, `cunghoangdao_boy`, `avatarboy`, `ngayhenho`, `cunghoangdao_girl`, `avatargirl`, `themerela`, `effect_fall`, `music`, `titlelove`) VALUES
        (1, 'Thanh Diệu', 'Phương Trang', 'Cung Song Tử', 'https://i.imgur.com/7SaQ7tZ.png', '10-11-2023', 'Cung Cự Giải', 'https://i.pinimg.com/564x/0e/c3/e4/0ec3e4be8567cab86dd4c3300f8dcad3.jpg', '0', 'traitimroi', 'https://files.catbox.moe/f5o7qw.mp3', 'Chúng ta đã cùng nhau trải qua bao thăng trầm');
        CREATE TABLE `setting` (
          `id` int(11) NOT NULL,
          `title` varchar(255) NOT NULL,
          `description` varchar(255) NOT NULL,
          `blackip` varchar(500) DEFAULT NULL,
          `keywords` varchar(255) NOT NULL,
          `logo` varchar(255) NOT NULL,
          `user_cmt` int(11) NOT NULL,
          `footer` varchar(255) NOT NULL,
          `author` varchar(255) NOT NULL,
          `background` varchar(500) NOT NULL,
          `timebanned` datetime DEFAULT NULL,
          `mode_timelove` varchar(255) NOT NULL,
          `modal_title` varchar(255) NOT NULL DEFAULT '0',
          `modal_on_off` varchar(255) NOT NULL DEFAULT 'off',
          `modal_content` varchar(255) NOT NULL,
          `baotri` varchar(11) NOT NULL DEFAULT 'off'
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        INSERT INTO `setting` (`id`, `title`, `description`, `blackip`, `keywords`, `logo`, `user_cmt`, `footer`, `author`, `background`, `timebanned`, `mode_timelove`, `modal_title`, `modal_on_off`, `modal_content`, `baotri`) VALUES
        (1, 'ThanhDieu 💞 Phương Trang', 'Điếm ngày yêu - lưu trữ kĩ niệm của tôi với người yêu', '', 'Love.thanhdieu.com,Love day thanhdieu, ThanhDieu. Com, thanhdieu. com, thanhdieu.com, Thanh diệu, Vương Thanh Diệu, ThanhDieuTV, thanh diệu tv, github wusthanhdieu, web thanh diệu', 'https://i.imgur.com/wecpW56.png', 1, 'ThanhDieu 💞 Phương Trang', 'ThanhDieuTv', '', NULL, 'lich3', 'THÔNG BÁO', 'off', '', 'off');
        CREATE TABLE `users` (
          `id` int(11) NOT NULL,
          `taikhoan` varchar(50) NOT NULL,
          `matkhau` varchar(255) NOT NULL,
          `hovaten` varchar(255) NOT NULL,
          `ngaythamgia` date NOT NULL,
          `role` varchar(50) NOT NULL,
          `cookie` varchar(255) NOT NULL,
          `ip` varchar(15) NOT NULL,
          `banned` int(11) NOT NULL,
          `verify_tick` varchar(255) NOT NULL,
          `avatar` varchar(500) NOT NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
        INSERT INTO `users` (`id`, `taikhoan`, `matkhau`, `hovaten`, `ngaythamgia`, `role`, `cookie`, `ip`, `banned`, `verify_tick`, `avatar`) VALUES
        (1, 'admin', '123456', 'Vương Thanh Diệu', '2023-12-18', 'admin', '', '::1', 0, '<img class=\"verify_tick\" src=\"./static/img/verified.png\">', 'https://i.imgur.com/jVJihzJ.png');
        ALTER TABLE `comments`
          ADD PRIMARY KEY (`comment_id`);
        ALTER TABLE `love_setting`
          ADD PRIMARY KEY (`id`);
        ALTER TABLE `setting`
          ADD PRIMARY KEY (`id`);
        ALTER TABLE `users`
          ADD PRIMARY KEY (`id`),
          ADD UNIQUE KEY `taikhoan` (`taikhoan`);
        ALTER TABLE `comments`
          MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;
        
        ALTER TABLE `love_setting`
          MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
        
        ALTER TABLE `setting`
          MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
        
        ALTER TABLE `users`
          MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
        COMMIT;        
        "
    ];