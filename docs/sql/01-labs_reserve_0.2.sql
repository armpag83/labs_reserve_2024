-- Aggiunta "password" a docente

ALTER TABLE `docente` ADD `password` VARCHAR(32) NOT NULL AFTER `cognome`;

INSERT INTO `docente` (`codice_Docente`, `nome`, `cognome`, `password`) VALUES ('AA001', 'Armando', 'Pagliara', 'armpag83');