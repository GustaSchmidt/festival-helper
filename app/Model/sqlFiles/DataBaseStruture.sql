CREATE SCHEMA fast_helper;
CREATE TABLE `fast_helper`.`horarios` 
    (`idHorario` int(11) NOT NULL, 
    `Pista` INT NOT NULL , `Artista` VARCHAR(100) NOT NULL , 
    `Estilo` VARCHAR(50) NOT NULL , 
    `HorarioInicio` TIME NOT NULL , 
    `HorarioFim` TIME NOT NULL ); 
ALTER TABLE `fast_helper`.`horarios` ADD PRIMARY KEY (`idHorario`);