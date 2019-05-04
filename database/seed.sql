INSERT INTO users(`id`, `username`, `password`, `permission`, `photo_path`) VALUES
(1, "vader", "7d9b53f484b070d715252daf0a3f334b", "admin", "public/uploads/Darth_Vader.jpg"),
(2, "piett", "7d9b53f484b070d715252daf0a3f334b", "user", "public/uploads/AdmiralPiett.jpg");

INSERT INTO planets(`id`, `name`, `region`, `sector`, `system`, `inhabitant`, `city`) VALUES
(1, "Aargau", "Core Worlds", "Unknown", "Unknown", "Unknown", "Unknown"),
(2, "Alderaan", "Core Worlds", "Alderaan sector", "Alderaan system", "Humans", "Aldera"),
(3, "Naboo", "Mid Rim", "Chommell sector", "Naboo system", "Elders, Gungans, Humans (Naboo)", "Otoh Gunga (Gungan), Theed (Human)");

INSERT INTO destruction(`planet_id`, `date`, `status`, `description`) VALUES
(1, "3190-10-12", 1, "Complete destruction"),
(2, "3190-12-12", 3, "Partial destruction, some survivors!");