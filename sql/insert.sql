SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';


-- -----------------------------------------------------
-- Schema cabinet_of_ministers
-- -----------------------------------------------------

USE `cabinet_of_ministers` ;

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`cabmin`
-- -----------------------------------------------------

INSERT INTO `cabinet_of_ministers`.`cabmin` (title, size, created_date)
VALUES ('Cabinet of Ministers',10, CURRENT_TIMESTAMP);

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`cabmin_powers`
-- -----------------------------------------------------

INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'Economic Development');
INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'Human Capital Development');
INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'National Security and Defense');
INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'Corruption');
INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'Rule of Law and Combating');
INSERT INTO `cabinet_of_ministers`.`cabmin_powers` (cabmin_id, name) VALUES (1,'Good Governance');

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`user`
-- -----------------------------------------------------

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Denys_Shmyhal@gov.ua', 'Denys', 'Shmyhal', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Serhii_Marchenko@gov.ua', 'Serhii', 'Marchenko', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Denys_Maliuska@gov.ua', 'Denys', 'Maliuska', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Oksen_Lisovyi@gov.ua', 'Oksen', 'Lisovyi', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Ihor_Klymenko@gov.ua', 'Ihor', 'Klymenko', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Oksana_Zholnovych@gov.ua', 'Oksana', 'Zholnovych', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

INSERT INTO `cabinet_of_ministers`.`user` (email, first_name,last_name,phone, address1, address2,political_affiliation,birth_date)
VALUES ('Oleksandr_Tkachenko@gov.ua', 'Oleksandr', 'Tkachenko', '+380975566555', 'Kyiv', 'str. Yaroslaviv Val, 18', 'Minister of Ukraine', '1980-11-19');

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`minister`
-- -----------------------------------------------------
INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (1, 'Minister', 'Minister of Environmental Protection and Natural Resources of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (2, 'Minister', 'Minister of Agrarian Policy and Food of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (3, 'Minister', 'Minister of Social Policy of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (4, 'Minister', 'Minister for Strategic Industries of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (5, 'Minister', 'Minister of Internal Affairs of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (6, 'Minister', 'Minister of the Cabinet of Ministers of Ukraine', '2022-11-11', NULL, 1);

INSERT INTO `cabinet_of_ministers`.`minister` (user_id, title, description, appointed_date, finished_date, cabmin_id)
VALUES (7, 'Minister', 'Minister of Foreign Affairs of Ukraine', '2022-11-11', NULL, 1);

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`committee`
-- -----------------------------------------------------

INSERT INTO `cabinet_of_ministers`.`committee` (cabmin_id, title, description, created_date)
VALUES (1, 'Minister', 'Government Committee on Economic, Financial Policy, Fuel and Energy Complex, Strategic Industries, Development of Communities and Territories and Infrastructure', '2023-02-11');


-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`ministry`
-- -----------------------------------------------------

INSERT INTO `cabinet_of_ministers`.`ministry` (minister_id, title, description, budget)
VALUES (1, 'Ministry of Energy of Ukraine', 'Ministry of Energy of Ukraine', '345678');

INSERT INTO `cabinet_of_ministers`.`ministry` (minister_id, title, description, budget)
VALUES (2, 'Ministry of Healthcare of Ukraine', 'Ministry of Healthcare of Ukraine', '345678');

INSERT INTO `cabinet_of_ministers`.`ministry` (minister_id, title, description, budget)
VALUES (3, 'Ministry of Education and Science of Ukraine', 'Ministry of Education and Science of Ukraine', '345678');

INSERT INTO `cabinet_of_ministers`.`ministry` (minister_id, title, description, budget)
VALUES (4, 'Ministry of Finance of Ukraine', 'Ministry of Finance of Ukraine', '345678');

INSERT INTO `cabinet_of_ministers`.`ministry` (minister_id, title, description, budget)
VALUES (5, 'Ministry of Environmental Protection', 'Ministry of Environmental Protection and Natural Resources of Ukraine', '345678');

-- -----------------------------------------------------
-- Table `cabinet_of_ministers`.`legislation`
-- -----------------------------------------------------


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
