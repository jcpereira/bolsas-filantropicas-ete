
CREATE SCHEMA bolsa ;

USE bolsa;

CREATE TABLE usuarios (
	id INTEGER NOT NULL auto_increment,
	nome VARCHAR(255),	
	usuario VARCHAR(255),
	senha VARCHAR(255),
        created DATETIME,
        modified DATETIME,
	CONSTRAINT chave_primaria_usuarios PRIMARY KEY (id)
);

CREATE TABLE alunos (
	id INTEGER NOT NULL auto_increment,	
	matricula VARCHAR(255),	
        nome VARCHAR(255),	
        descricao TEXT,
	filho_funcionario INT,        
        anoingresso INT,
        usuario_id INTEGER,
   email VARCHAR(255),
   cpf  VARCHAR(255),
   identidade VARCHAR(255),        
   nascimento DATE,           
   endereco  VARCHAR(255),
   numero INT,
   complemento  VARCHAR(50),
   bairro  VARCHAR(255),
   cidade VARCHAR(255),
   estado VARCHAR(255),
   cep  VARCHAR(20),
   telefone VARCHAR(20),
        created DATETIME,
        modified DATETIME,
        CONSTRAINT chave_primaria_alunos PRIMARY KEY (id),
        CONSTRAINT chave_estrangeira_alunos_usuarios FOREIGN KEY (usuario_id)
	REFERENCES usuarios (id)
);

CREATE TABLE bolsas (
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	
   descricao TEXT,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_bolsas PRIMARY KEY (id)
);

CREATE TABLE perletivos (
   id INTEGER NOT NULL auto_increment,
   ano VARCHAR(255),
   descricao TEXT,
   ativo BOOLEAN,
   minimo DOUBLE DEFAULT 0,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_perletivos PRIMARY KEY (id)
);

CREATE TABLE bolperalunos(
   id INTEGER NOT NULL auto_increment,
   bolsa_id INTEGER,
   perletivo_id INTEGER,
   percentual_associal INT,
   percentual_comissao INT,
   percentual INT,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_bolsas_periodos_alunos PRIMARY KEY (id),
   	CONSTRAINT chave_estrangeira_bolsas_periodos_alunos_bolsas FOREIGN KEY (bolsa_id)
		REFERENCES bolsas (id),
	CONSTRAINT chave_estrangeira_bolsas_periodos_alunos_perletivos FOREIGN KEY (perletivo_id)
		REFERENCES perletivos (id)
);

CREATE TABLE cursos(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	
   descricao TEXT,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_cursos PRIMARY KEY (id)
);

CREATE TABLE turmas (
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	
   descricao TEXT,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_turmas PRIMARY KEY (id)
);

CREATE TABLE escolaridades(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	   
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_escolaridades PRIMARY KEY (id)
);

CREATE TABLE empresas(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	           
        email VARCHAR(255),
        contratacao DATE,           
        endereco  VARCHAR(255),
        numero INT,
        complemento  VARCHAR(50),
        bairro  VARCHAR(255),
        cidade VARCHAR(255),
        estado VARCHAR(255),
        cep  VARCHAR(20),
        telefone VARCHAR(20),
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_empresas PRIMARY KEY (id)
);

CREATE TABLE finperalunos (
	id INTEGER NOT NULL auto_increment,   
	aluno_id INTEGER,	
	turma_id INTEGER,
	curso_id INTEGER,	
	empresa_id INTEGER,	
	serie INT,
	receita DOUBLE DEFAULT 0,
        membros INT,
        residencia VARCHAR(255),
        reside_com VARCHAR(255),
        valor_residencia DOUBLE DEFAULT 0,
        trabalha BOOLEAN,
        salario DOUBLE DEFAULT 0,
        transporte BOOLEAN,        
        cargo VARCHAR(20),
        comentario TEXT,	
        created DATETIME,
        modified DATETIME,
	CONSTRAINT chave_primaria_situacao_financeiro_periodoletivo_alunos PRIMARY KEY (id),
	CONSTRAINT chave_estrangeira_situacao_financeiro_periodoletivo_alunos_alunos FOREIGN KEY (aluno_id)
		REFERENCES alunos (id),	
	CONSTRAINT chave_estrangeira_situacao_financeiro_periodoletivo_alunos_empresas FOREIGN KEY (empresa_id)
		REFERENCES empresas (id),	
	CONSTRAINT chave_estrangeira_situacao_financeiro_periodoletivo_alunos_turmas FOREIGN KEY (turma_id)
		REFERENCES turmas (id),
	CONSTRAINT chave_estrangeira_situacao_financeiro_periodoletivo_alunos_cursos FOREIGN KEY (curso_id)
		REFERENCES cursos (id)
);

CREATE TABLE parentescos(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	   
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_parentescos PRIMARY KEY (id)
);

CREATE TABLE escolaridades(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	   
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_escolaridades PRIMARY KEY (id)
);

CREATE TABLE faminiares(
   id INTEGER NOT NULL auto_increment,
   nome VARCHAR(255),	
   trabalha BOOLEAN,
   empresa_id INTEGER,	
   descricao TEXT,
   aluno_id INTEGER,
   escolaridade_id INTEGER,
   email VARCHAR(255),
   cpf  VARCHAR(255),
   identidade VARCHAR(255),        
   nascimento DATE,           
   endereco  VARCHAR(255),
   numero INT,
   complemento  VARCHAR(50),
   bairro  VARCHAR(255),
   cidade VARCHAR(255),
   estado VARCHAR(255),
   cep  VARCHAR(20),
   telefone VARCHAR(20),
   renda DOUBLE DEFAULT 0,
   nascimento DATE,
   created DATETIME,
   modified DATETIME,
   CONSTRAINT chave_primaria_familiares PRIMARY KEY (id),
   CONSTRAINT chave_estrangeira_familiares_alunos FOREIGN KEY (aluno_id)
   REFERENCES alunos (id),
   CONSTRAINT chave_estrangeira_familiares_empresas FOREIGN KEY (empresa_id)
   REFERENCES empresas (id),	
   CONSTRAINT chave_estrangeira_familiares_escolaridades FOREIGN KEY (escolaridade_id)
   REFERENCES escolaridades (id)
);

