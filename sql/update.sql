CREATE TABLE `li_user_collects` (
  `id`       INT(10) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `goods_id` INT UNSIGNED     NOT NULL,
  `users_id` INT UNSIGNED     NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  FOREIGN KEY (`goods_id`) REFERENCES li_goods(`id`) ON DELETE CASCADE  ON UPDATE CASCADE ,
  FOREIGN KEY (`users_id`) REFERENCES li_users(`id`) ON DELETE CASCADE  ON UPDATE CASCADE
)