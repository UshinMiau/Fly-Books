CREATE DATABASE  IF NOT EXISTS `fly_books` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `fly_books`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: fly_books
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book` (
  `id_book` int NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `author` varchar(70) NOT NULL,
  `name_who_posted` varchar(70) NOT NULL,
  `date_posted` date NOT NULL,
  `description` text NOT NULL,
  `name_book_cover` varchar(70) NOT NULL,
  `name_book_pdf` varchar(70) NOT NULL,
  PRIMARY KEY (`id_book`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (6,'A Bíblia Satânica','Anton LaVey','Fly Books','2022-05-30','Aqui está um livro controverso desde seu nascimento. Muitos dizem que o autor, Anton Lavey (1930 – 1997), fundador da Church Of Satan (Igreja Satanista), se aproveitou do sucesso do filme O Bebê de Rosemary (1968) para publicar sua bíblia do diabo, que ainda trazia um Baphomet estilizado na capa toda negra.\r\nA história, entretanto, não se apega a acusações de oportunismo e o fato é que a publicação de LaVey foi reeditada por mais de trinta vezes, e forma a base do satanismo difundido pela Church Of Satan, que possui adeptos como Marilyn Manson e King Diamond.\r\nA filosofia básica da doutrina ali presente eleva o homem-deus, a rendição aos desejos da carne e a ideia de que o ódio é tão importante ao ser humano quanto o o amor, sendo os dois sentimentos indissociáveis.\r\nDiferentemente da impressão que temos, o culto de LaVey não prega o louvor à forma cristã de Satanás, colocado como inimigo de Deus. No contexto “laveyniano” a palavra Satã representa uma oposição aos princípios cristãos da busca no amor incondicional e a total liberdade do sentimento de culpa tão inerente aos que seguem uma religião monoteísta, cujos dogmas são contrários à natureza animalesca do homem.\r\nEm resumo, o Satã de LaVey considera as leis de caridade de Jesus como uma grande farsa, não pede adoração e determina que cada um viva de acordo com sua própria lei.\r\nApesar de toda a diversidade religiosa presente nestas obras, em sua maioria, elas são como cartilhas de boa conduta e elevação espiritual em lugar do enaltecimento dos gozos terrenos e carnais. Um dos últimos compêndios a entrar no rol de livros sagrados versa exatamente ao contrário deste fluxo “do bem” e da ética moral se sobrepondo ao mal e à imoralidade. Estou falando da Bíblia Satânica.','A Bíblia Satânica.png','A Bíblia Satânica.pdf'),(19,'A Arte da Guerra','Sun Tzu','Fly Books','2022-05-31','A arte da guerra: o milenar tratado hoje é uma fonte de inspiração sobre estratégia e liderança para grandes conquistas.\r\nEste livro é a reunião dos ensinamentos escritos por Sun Tzu (544a.C.-496a.C.) há mais de 2 mil anos. Nele, o legendário general aliou filosofia, sabedoria oriental e conhecimento bélico para formular o mais célebre tratado sobre estratégia jamais escrito. A arte da guerra atravessou séculos como uma referência para alcançar sucesso nas mais variadas conquistas. Generais americanos afirmam que utilizaram a técnica de Sun Tzu no Iraque, assim como Mao Tsé Tung também referiu as técnicas expostas em A arte da Guerra na sua grande marcha para a conquista do poder na China.\r\nPor outro lado, é recorrente a citação do livro em grandes desafios empresariais ou esportivos. Especialistas demonstram que a utilização filosófica e estratégica dos escritos de Sun Tzu na própria história da China foi fundamental para viabilizar o enorme salto dado pelo país para tornar-se uma grande potência mundial.\r\nAbaixo, alguns ensinamentos de Sun Tzu:\r\n“Por mais crítica que seja a situação e as circunstâncias em que te encontrares, não te desesperes. Nas ocasiões em que tudo inspira temor, nada deves temer. Quando estiveres cercado de todos os perigos, não deves temer nenhum. Quando estiveres sem nenhum recurso, deves contar com todos. Quando fores surpreendido, surpreende o inimigo.”\r\n“Não adies o momento do combate, nem esperes que tuas armas se enferrujem e o fio de tuas espadas se embote. A vitória é o principal objetivo da guerra.”','A Arte da Guerra.png','A Arte da Guerra.pdf'),(20,'A Revolução dos Bichos','George Orwell','Fly Books','2022-05-31','Verdadeiro clássico moderno, concebido por um dos mais influentes escritores do século XX, A revolução dos bichos é uma fábula sobre o poder. Narra a insurreição dos animais de uma granja contra seus donos. Progressivamente, porém, a revolução degenera numa tirania ainda mais opressiva que a dos humanos.\r\nEscrita em plena Segunda Guerra Mundial e publicada em 1945 depois de ter sido rejeitada por várias editoras, essa pequena narrativa causou desconforto ao satirizar ferozmente a ditadura stalinista numa época em que os soviéticos ainda eram aliados do Ocidente na luta contra o eixo nazifascista. De fato, são claras as referências: o despótico Napoleão seria Stálin, o banido Bola-de-Neve seria Trotsky, e os eventos políticos - expurgos, instituição de um estado policial, deturpação tendenciosa da História - mimetizam os que estavam em curso na União Soviética. Com o acirramento da Guerra Fria, as mesmas razões que causaram constrangimento na época de sua publicação levaram A revolução dos bichos a ser amplamente usada pelo Ocidente nas décadas seguintes como arma ideológica contra o comunismo. O próprio Orwell, adepto do socialismo e inimigo de qualquer forma de manipulação política, sentiu-se incomodado com a utilização de sua fábula como panfleto. Depois das profundas transformações políticas que mudaram a fisionomia do planeta nas últimas décadas, a pequena obra-prima de Orwell pode ser vista sem o viés ideológico reducionista. Mais de sessenta anos depois de escrita, ela mantém o viço e o brilho de uma alegoria perene sobre as fraquezas humanas que levam à corrosão dos grandes projetos de revolução política. É irônico que o escritor, para fazer esse retrato cruel da humanidade, tenha recorrido aos animais como personagens. De certo modo, a inteligência política que humaniza seus bichos é a mesma que animaliza os homens. Escrito com perfeito domínio da narrativa, atenção às minúcias e extraordinária capacidade de criação de personagens e situações, A revolução dos bichos combina de maneira feliz duas ricas tradições literárias: a das fábulas morais, que remontam a Esopo, e a da sátira política, que teve talvez em Jonathan Swift seu representante máximo. \"A melhor sátira já escrita sobre a face negra da história moderna.\" Malcolm Bradbury \"Um livro para todos os tipos de leitor, seu brilho ainda intacto depois de sessenta anos.\" Ruth Rendell.','A Revolução dos Bichos.png','A Revolução dos Bichos.pdf'),(21,'O Alienista','Machado de Assis','Fly Books','2022-05-31','O alienista é um clássico literário sobre a psiquê. Qual é o limite entre a loucura e a sanidade? Até onde a ciência é capaz de desvendar a mente humana? Essas são as questões centrais desta obra publicada originalmente como folhetim na revista A Estação. O conto apresenta Simão Bacamarte, estudioso ilustrado, que, para aprender mais sobre a psiquiatria, convence a cidade de Itaguaí a fundar um hospício. Logo a instituição fica repleta de lunáticos locais e das vilas vizinhas. O cientista passa, então, a identificar a demência recôndita em cada cidadão de Itaguaí, encarcerando-os um a um no manicômio e levando o terror à cidade. O barbeiro Canjica arregimenta os insatisfeitos para derrubar o hospício da Casa Verde e se instauram a paranoia e a revolta no povoado, antes pacato. O alienista foi adaptado para o cinema em 1970 e para uma minissérie na TV em 1993. Em 2008, a obra chegou às histórias em quadrinhos e, em 2014, ao teatro. Um livro divertido, que traz o melhor da ironia machadiana. Esta edição tem texto integral e traz notas explicativas para os termos não usuais, para facilitar a compreensão da obra.','O Alienista.png','O Alienista.pdf'),(22,'Paraíso Perdido','John Milton','Fly Books','2022-05-31','Após serem expulsos do Paraíso, os anjos planejam sua vingança nas chamas do Inferno. Impedidos de atacar diretamente o céu, decidem confrontar a criação divina: o homem. “Mais vale reinar no Inferno do que servir no Céu.”Há 350 anos, o conflito entre Deus e Satã narrado em PARAÍSO PERDIDO, obra-prima de John Milton, virou um marco na literatura. Seus dez mil versos sobre a criação do mundo, a tentação e o desejo por redenção receberam reconhecimento instantâneo e serviram de inspiração para peças de teatro, músicas, pinturas e livros, ecoando na obra de mestres como Mary Shelley, C.S. Lewis e Neil Gaiman.Milton criou seu épico mergulhado nas trevas de uma cegueira repentina. Entre as angústias reais do luto após a perda de sua segunda mulher e de sua filha mais nova, além da culpa religiosa enraizada na sua formação, Milton também precisou rever sua vida e a relação distante com a família.Determinado a não deixar a perda da visão e o sofrimento provocado pela gota afetarem seu ofício, ditou PARAÍSO PERDIDO do começo ao fim para ajudantes, amigos e até mesmo suas filhas. Fruto de um árduo trabalho e reflexo da perseverança do autor, o poema levou cerca de cinco anos para ser concebido, e foi publicado em 1667 em sua primeira versão. Milton morreu em 1674, o mesmo ano em que foi lançada a edição definitiva de seu clássico.Agora, a obra colossal foi reimaginada pelo premiado quadrinista e ilustrador espanhol Pablo Auladell. Com seu traço sombrio, quase desolado, o tributo captura o lirismo de Milton para quem ainda não teve o prazer de ler os cantos originais. Ao mesmo tempo, complementa a experiência do leitor, dando ainda mais vida ao texto. Assim como o poema ganhou notoriedade pela beleza de suas palavras, a graphic novel conquista pelas imagens, retratando a comple622ade e tragédia de uma história atemporal com um toque pessoal, mas que respeita totalmente o texto original de John Milton.Por seu belíssimo trabalho em PARAÍSO PERDIDO, Auladell ganhou o grande Premio Nacional de Cómic, da Espanha. O quadrinista já transformou clássicos em obras-primas dos quadrinhos: por suas mãos já passaram os livros de Mark Twain, As Aventuras de Tom Sawyer e As Aventuras de Huckleberry Finn.PARAÍSO PERDIDO deixou sua marca em artistas de várias gerações e também foi fonte de inspiração para o escritor Andrew Pyper, primeiro autor best-seller da DarkSide® Books. A epopeia inglesa é objeto de estudo de David Ullman, protagonista de O Demonologista. No universo DarkSide®, tudo está conectado.Agora, a graphic novel inspirada na grande obra de Milton chega para fazer parte da linha DarkSide® Graphic Novel numa edição que deixaria Adão em apuros, com capa dura, bordas douradas e todo aquele cuidado que os fãs merecem.Já fica aqui a recomendação para você abrir espaço na estante para este clássico, pois PARAÍSO PERDIDO não pode faltar na sua coleção. Sabemos que ninguém resiste a um combate entre o bem e o mal. Chegou a hora da redenção.','Paraíso Perdido.png','Paraíso Perdido.pdf'),(23,'O Jardim Secreto','Frances Burnett','Fly Books','2022-05-31','As histórias mais mágicas são capazes de atravessar as barreiras do tempo e encantar leitores de diferentes gerações. Em 1911, Frances Hodgson Burnett presenteou o mundo com O Jardim Secreto, uma história doce e delicada sobre o poder transformador da magia, da natureza e da amizade. Mais de cem anos depois, a DarkSide® Books encontrou a chave para o jardim e agora convida os leitores brasileiros a mergulharem neste emocionante clássico da literatura infantojuvenil. O Jardim Secreto conta a história de Mary Lennox, uma menina solitária que perde os pais em um surto de cólera na Índia e, como consequência, é enviada para uma mansão em Yorkshire para morar com seu tio misterioso. Cheia de incertezas diante da nova realidade cinzenta da Inglaterra, ela encontra consolo na natureza ao seu redor. E, quando descobre a existência de um jardim secreto nos terrenos da mansão e encontra a chave perdida, um mundo mágico se descortina diante de seus olhos. A menina e a natureza desabrocham juntas, em um percurso repleto de companheiros improváveis e amigos para vida inteira. Em uma de suas obras mais aclamadas, Frances Hodgson Burnett toca o coração dos leitores de todas as idades ao contar a história de Mary, uma menina rabugenta e desagradável; Dickon, um garoto doce e amigo dos animais; e Colin, um menino mimado e apavorado com a vida. E ela o faz com tanta maestria que o livro já ganhou inúmeras adaptações para o cinema e a tv, entre elas a versão da bbc, que estreou em janeiro de 1975, e o filme de 1993, dirigido por Agnieszka Holland e com Maggie Smith e Kate Maberly no elenco. Lírico e inesquecível, O Jardim Secreto é um livro que fascina crianças e adultos, inspirando a todos com sua receita secreta para vencer obstáculos, superar desafios e encontrar dentro de nossas essências um lugar onde a esperança sempre floresce. Fábulas Dark | Só os insetos sabem o caminho de casa A DarkSide® Books vai cair na toca do coelho, atravessar o túnel de árvores e redescobrir jardins secretos que ainda estão florescendo para uma nova geração de leitores. A marca Fábulas Dark vai trazer histórias surpreendentes que atravessaram gerações e se expandiram do mundo das palavras para todos os formatos e manifestações artísticas. Edições únicas e de puro encantamento. Viva a experiência dark no nosso mundo de fábulas.','O Jardim Secreto.png','O Jardim Secreto.pdf'),(24,'O Menino Maluquinho','Ziraldo Alves Pinto','Fly Books','2022-05-31','O Menino Maluquinho é uma série de histórias em quadrinhos brasileira criada pelo desenhista e cartunista Ziraldo. A revista foi baseada no livro infantil de mesmo nome publicado em 1980, que se tornou um fenômeno durante os anos de 1990 e 2000. As histórias em quadrinhos foram publicados pela Abril e Globo, de 1989 até 2007.\r\nO livro original que inspirou a revista se tornou um sucesso, tendo vendido até dezembro de 2005 mais de dois milhões e meio de exemplares, sendo conhecido por inúmeras crianças, servindo de inspiração para peças teatrais, filmes, óperas e séries de TV.\r\nEla apresenta as histórias e invenções de uma criança alegre e sapeca, \"maluquinho\". São cartuns e atividades que descrevem liricamente o sabor da infância.','O Menino Maluquinho.png','O Menino Maluquinho.pdf'),(25,'Alice País Das Maravilhas','Lewis Carroll','Fly Books','2022-05-31','Uma menina, um coelho e uma história capazes de fazer qualquer um de nós voltar a sonhar. Alice é despertada de um leve sono ao pé de uma árvore por um coelho peculiar. Uma criatura alva e falante com roupas engraçadas, que consulta seu relógio e reclama do próprio atraso. Curiosa como toda criança, Alice segue o animal até cair em um buraco sem fim que mudou para sempre a literatura infantil. Mais de 150 anos depois, Alice no País das Maravilhas continua repleto de ensinamentos para aqueles que ousaram seguir o Coelho Branco até sua toca.\r\nA DarkSide® Books deu a cartada que seus leitores tanto pediram.\r\nO novo selo editorial Fábulas Dark chega em grande estilo. Alice no País das Maravilhas tem nova tradução da pesquisadora Marcia Heloisa ― já conhecida dos darksiders por seu trabalho com Drácula e os dois volumes dedicados a Edgar Allan Poe ― , além do poema narrativo “Fantasmagoria”, de 1869, traduzido por Leandro Durazzo.\r\nPara os leitores que não abrem mão dos clássicos, a Classic Edition apresenta as ilustrações originais de John Tenniel para a primeira edição de 1865, além de um projeto gráfico que remete à época de lançamento da obra.\r\nUm clássico literário, uma obra que sobrevive à passagem do tempo, e que enriquece suas possibilidades de leitura. Alice no País das Maravilhas é uma leitura que encanta crianças com sua trama, arrebata entusiastas da linguagem com seus jogos de palavras, chama a atenção dos fãs do psicodélico por seus personagens, entre tantos outros interesses que as aventuras da pequena Alice atraem. A obra que se tornou mais forte de geração em geração agora encontra lugar no coração dos leitores da DarkSide® Books. Edições impecáveis, de fã para fã.','Alice País Das Maravilhas.png','Alice País Das Maravilhas.pdf'),(26,'A Lenda do Cavaleiro sem Cabeça','Irving Washington','Fly Books','2022-05-31','The Legend of Sleepy Hollow (traduzido como A Lenda do Cavaleiro sem Cabeça (título em Portugal) ou A Lenda da Caverna Adormecida (título no Brasil)) é um conto de Washington Irving incluído na coleção The Sketch Book of Geoffrey Crayon, Gent., escrita enquanto o autor vivia em Birmingham, Inglaterra. A primeira publicação foi em 1820. Ao lado da história de Rip Van Winkle, A Lenda do Cavaleiro sem Cabeça é um dos contos mais antigos de ficção norte-americana que é lido até hoje. A história se passa por volta de 1790 no assentamento americano-holandes de Tarrytown, New York (O autor escreveu \"Tarry Town\"), num lugar chamado Sleepy Hollow. Ichabod Crane, um magro, esguio e extremamente supersticioso professor de Connecticut, compete com o valentão Abraham \"Brom Bones\" Van Brunt pela mão da jovem de dezoito anos Katrina Van Tassel, filha única do rico fazendeiro Baltus Van Tassel. Quando Crane sai de uma festa na casa dos Van Tassel numa noite de outono, é perseguido pelo \"Cavaleiro sem Cabeça\", um suposto fantasma de um soldado hessiano (germânico) que teve a cabeça arrancada por uma bala de canhão durante uma \"batalha sem nome\" da Revolução Americana. O fantasma \"cavalga até o local da batalha numa procura noturna pela sua cabeça\". Ichabod desaparece misteriosamente da cidade, deixando Katrina se casar com Brom Bones. A natureza do Cavaleiro sem Cabeça é deixada em aberto, embora haja indícios de que seja na verdade Brom Bones disfarçado.','A Lenda do Cavaleiro sem Cabeça.png','A Lenda do Cavaleiro sem Cabeça.pdf'),(27,'O Corvo Em Quadrinhos','Luciano Irrthum','Fly Books','2022-05-31','O célebre poema O Corvo (The Raven), do escritor norte-americano Edgar Allan Poe (1809-1849) – um dos precursores da literatura de ficção científica e fantástica em âmbito mundial –, ganhou nova versão em HQ em 2009, ano em que se completou 200 anos de nascimento de seu autor. Publicado pela primeira vez em 1945, já na maturidade de Poe e próximo de sua morte precoce, aos 40 anos de idade, o poema, admirado pela linguagem musical e pelo conteúdo metafísico, recebeu traduções de grandes expoentes da literatura, como Baudelaire, Mallarmè, Fernando Pessoa e Machado de Assis. Nesta versão da coleção Clássicos em quadrinhos, O Corvo renasce das mãos do quadrinista Luciano Irrthum, que expressa sua reverência pela obra imprimindo-lhe o lirismo, a força e a visceralidade de seu traço.','O Corvo Em Quadrinhos.png','O Corvo Em Quadrinhos.pdf');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_request`
--

DROP TABLE IF EXISTS `book_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `book_request` (
  `id_book_request` int NOT NULL AUTO_INCREMENT,
  `title` varchar(70) NOT NULL,
  `author` varchar(70) NOT NULL,
  PRIMARY KEY (`id_book_request`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_request`
--

LOCK TABLES `book_request` WRITE;
/*!40000 ALTER TABLE `book_request` DISABLE KEYS */;
/*!40000 ALTER TABLE `book_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `id_client` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `birth_date` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(72) NOT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (2,'Client Root','6666-06-06','clientRoot@gmail.com','$2y$10$AGHsiOAVwPWYAp62FVDmOeBfA8WCp.88OSmAvRCheog9DzbTPkoK.');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `login` varchar(60) NOT NULL,
  `password` varchar(72) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Fly Books','FlyBooks1!','$2y$10$n.XTQss3itGp6ko9xmQ5/.TAsY9RI2S6q64hSYyOpmcX1uckyYtWe');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-31  0:09:22
