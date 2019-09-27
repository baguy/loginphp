CREATE DATABASE login;

USE login;

CREATE TABLE `login`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL unique,
  `remember_token` VARCHAR(100) NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NULL,
  `deleted_at` timestamp NULL,
  PRIMARY KEY (`id`));

INSERT INTO `usuarios` (`usuario`,`senha`,`email`) VALUES (
  'mayra','550693f4b3737c6168e7246bce48b99b','mayradbueno@gmail.com'
);

INSERT INTO `usuarios` (`usuario`,`senha`,`email`) VALUES (
  'jk','5f4dcc3b5aa765d61d8327deb882cf99','haru.no.kaze@gmail.com'
);


mayra / !1devpassword
jk    / password
