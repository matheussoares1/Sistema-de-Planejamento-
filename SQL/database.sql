CREATE TABLE IF NOT EXISTS planejamento (
  id INT PRIMARY KEY AUTO_INCREMENT,
  serie VARCHAR(10) NOT NULL,
  TURMA VARCHAR(10) NOT NULL,
  data DATE NOT NULL,
  tema VARCHAR(255) NOT NULL,
  objetivos VARCHAR(255) NOT NULL,
  area_conhecimento VARCHAR(255) NOT NULL,
  disciplina VARCHAR(50) NOT NULL,
  competencias_ger VARCHAR(255) NOT NULL,
  competencias_esp TEXT(255) NOT NULL,
  habilidades VARCHAR(255) NOT NULL,
  objetos VARCHAR(255) NOT NULL,
  descricao VARCHAR(255) NOT NULL,
  recursos VARCHAR(255) NOT NULL,
  avaliacao VARCHAR(255) NOT NULL
  )
