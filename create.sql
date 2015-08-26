
DROP SCHEMA bolsa ;

CREATE SCHEMA bolsa ;

USE bolsa;

CREATE TABLE usuarios (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    usuario VARCHAR(255),
    email VARCHAR(255),
    senha VARCHAR(255),    
    tipo INT,    
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_usuarios PRIMARY KEY (id)
);

CREATE TABLE alunos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    matricula VARCHAR(255),
    nome VARCHAR(255),
    descricao TEXT,
    filho_funcionario INT,
    ano_ingresso INT,
    usuario_id INTEGER,
    email VARCHAR(255),
    cpf VARCHAR(255),
    identidade VARCHAR(255),
    nascimento DATE,
    rua VARCHAR(255),
    numero INT,
    complemento VARCHAR(50),
    bairro VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(20),
    telefone VARCHAR(20),
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_alunos PRIMARY KEY (id),
    CONSTRAINT fk_alunos_usuarios FOREIGN KEY (usuario_id)
        REFERENCES usuarios (id)
);

CREATE TABLE bolsas (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),    
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_bolsas PRIMARY KEY (id)
);

CREATE TABLE perletivos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    ano VARCHAR(255),
    descricao TEXT,
    ativo BOOLEAN,
    minimo DOUBLE DEFAULT 0,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_perletivos PRIMARY KEY (id)
);

CREATE TABLE cursos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_cursos PRIMARY KEY (id)
);

CREATE TABLE turmas (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao TEXT,
    created DATETIME,    modified DATETIME,
    CONSTRAINT pk_turmas PRIMARY KEY (id)
);

CREATE TABLE escolaridades (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_escolaridades PRIMARY KEY (id)
);

CREATE TABLE empresas (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255),
    contratacao DATE,  
    rua VARCHAR(255),
    numero INT,
    complemento VARCHAR(50),
    bairro VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(20),
    telefone VARCHAR(20),
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_empresas PRIMARY KEY (id)
);

CREATE TABLE finperalunos (
    id INTEGER NOT NULL AUTO_INCREMENT,
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
    CONSTRAINT pk_situacao_financeiro_periodoletivo_alunos PRIMARY KEY (id),
    CONSTRAINT fk_situacao_financeiro_alunos FOREIGN KEY (aluno_id)
        REFERENCES alunos (id)  
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_situacao_financeiro_alunos_empresas FOREIGN KEY (empresa_id)
        REFERENCES empresas (id),
    CONSTRAINT fk_situacao_financeiro_alunos_turmas FOREIGN KEY (turma_id)
        REFERENCES turmas (id),
    CONSTRAINT fk_situacao_financeiro_alunos_cursos FOREIGN KEY (curso_id)
        REFERENCES cursos (id)
);

CREATE TABLE bolperalunos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    bolsa_id INTEGER,
    perletivo_id INTEGER,
    percentual_associal INT,
    percentual_comissao INT,
    finperaluno_id INTEGER,
    percentual INT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_bolsas_periodos_alunos PRIMARY KEY (id),
    CONSTRAINT fk_bolsas_periodos_alunos_bolsas FOREIGN KEY (bolsa_id)
        REFERENCES bolsas (id),
    CONSTRAINT fk_bolperalunos_situacao_financeiro_alunos FOREIGN KEY (finperaluno_id)
        REFERENCES finperalunos (id),
    CONSTRAINT fk_bolsas_periodos_alunos_perletivos FOREIGN KEY (perletivo_id)
        REFERENCES perletivos (id)
);

CREATE TABLE parentescos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_parentescos PRIMARY KEY (id)
);

CREATE TABLE familiares (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    trabalha BOOLEAN,
    empresa_id INTEGER,
    descricao TEXT,
    finperaluno_id INTEGER,
    escolaridade_id INTEGER,
    email VARCHAR(255),
    cpf VARCHAR(255),
    identidade VARCHAR(255),
    rua VARCHAR(255),
    numero INT,
    complemento VARCHAR(50),
    bairro VARCHAR(255),
    cidade VARCHAR(255),
    estado VARCHAR(255),
    cep VARCHAR(20),
    telefone VARCHAR(20),
    renda DOUBLE DEFAULT 0,
    nascimento DATE,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_familiares PRIMARY KEY (id),
    CONSTRAINT fk_familiares_situacao_financeiro_alunos FOREIGN KEY (finperaluno_id)
        REFERENCES finperalunos (id)  
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_familiares_empresas FOREIGN KEY (empresa_id)
        REFERENCES empresas (id),
    CONSTRAINT fk_familiares_escolaridades FOREIGN KEY (escolaridade_id)
        REFERENCES escolaridades (id)
);

CREATE TABLE gastos (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    valor DOUBLE,
    finperaluno_id INTEGER,
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_escolaridades PRIMARY KEY (id),
    CONSTRAINT fk_gastos_situacao_financeir_alunos FOREIGN KEY (finperaluno_id)
        REFERENCES finperalunos (id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE patrimonios (
    id INTEGER NOT NULL AUTO_INCREMENT,
    nome VARCHAR(255),
    valor DOUBLE,
    finperaluno_id INTEGER,
    familiar_id INTEGER,
    descricao TEXT,
    created DATETIME,
    modified DATETIME,
    CONSTRAINT pk_patrimonios PRIMARY KEY (id),
    CONSTRAINT fk_patrimonios_situacao_financeiro_alunos FOREIGN KEY (finperaluno_id)
        REFERENCES finperalunos (id)
        ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_patrimonios_familiares FOREIGN KEY (familiar_id)
        REFERENCES familiares (id)
        ON DELETE CASCADE ON UPDATE CASCADE
);