      DROP DATABASE IF EXISTS sysprefbd;
create DATABASE sysprefbd;

use sysprefbd;

-- ### acesso ###
DROP TABLE IF EXISTS acesso;
CREATE TABLE acesso(
      id_usuario     SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      username       VARCHAR(15),
      userpass       VARCHAR(15),
      nome           VARCHAR(50),
      sobrenome      VARCHAR(50),
      matricula      INT,
      data_nasc      DATE,
      email          VARCHAR(100),
      PRIMARY KEY (id_usuario)
);

-- ### acesso-adm ###
DROP TABLE IF EXISTS acessoADM;
CREATE TABLE acessoADM(
      id_adm         SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      username       VARCHAR(15),
      userpass       VARCHAR(15),
      nivel          INT,
      PRIMARY KEY (id_adm)
);

-- ### atendimentos ###
DROP TABLE IF EXISTS atendimentos;
CREATE TABLE atendimentos(

      id_atendimentos SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      num_doc         VARCHAR(20),
      alt_por         VARCHAR(50),
      data_alt        TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
      data_lanc       DATE,
      documento       VARCHAR(50),

      nome            VARCHAR(250),
      cpf             CHAR(20),
      rg              CHAR(20),
      tel             CHAR(20),
      cel             CHAR(20),
      endereco        VARCHAR(250),
      numero          INT,
      complemento     VARCHAR(100),
      bairro          VARCHAR(100),
      cep             CHAR(10),
      cidade          VARCHAR(100),
      estado          VARCHAR(100),

      n_cad           CHAR(16),
      n_carne         CHAR(20),
      rua             VARCHAR(250),
      numero_r        INT,
      lote            VARCHAR(50),
      quadra          VARCHAR(50),
      bairro_r        VARCHAR(100),
      proprietario    VARCHAR(250),

      conf_alvara     VARCHAR(9),
      projeto_numero  VARCHAR(20),
      data_aprov      DATE,
      emitida_em      DATE,
      const_fase1     NUMERIC(14,2),
      const_add       NUMERIC(14,2),
      area_const      NUMERIC(14,2),
      area_aprov      NUMERIC(14,2),
      area_destruida  NUMERIC(14,2),
      area_no_carne   NUMERIC(14,2),
      lado_construcao VARCHAR(50),
      menu            VARCHAR(2),
      motivo          VARCHAR(55),
      desde           INT(4),
      cad_1           VARCHAR(16),
      cad_2           VARCHAR(16),  
      cad_3           VARCHAR(16),
      cad_4           VARCHAR(16),
      cad_5           VARCHAR(16),
      obs             VARCHAR(500),
      check_box1      VARCHAR(2),
      check_box2      VARCHAR(2),
      check_box3      VARCHAR(2),

      alterar_para    VARCHAR(100),
      cpf_t           CHAR(20),
      rg_t            CHAR(20),
      end_t           VARCHAR(250),
      numero_t        INT,
      bairro_t        VARCHAR(50),
      cep_t           CHAR(10),
      cidade_t        VARCHAR(50),
      estado_t        VARCHAR(50),

      endCompleto     VARCHAR(350),

      ano             INT(4),

      rua_antiga      VARCHAR(250),
      rua_atual       VARCHAR(250),
      bairro_x        VARCHAR(100),

    PRIMARY KEY (id_atendimentos)
);

-- ### Requerente-e-imovel ###
DROP TABLE IF EXISTS requerente;
CREATE TABLE requerente(
      id_Requerente SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
      nome          VARCHAR(100),
      cpf           CHAR(20),
      rg            CHAR(20),
      tel           CHAR(20),
      cel           CHAR(20),
      endereco      VARCHAR(250),
      numero        INT,
      complemento   VARCHAR(100),    
      bairro        VARCHAR(50),
      cep           CHAR(10),
      cidade        VARCHAR(100),
      estado        VARCHAR(100),
      PRIMARY KEY (id_Requerente)
);

DROP TABLE IF EXISTS imovel;
CREATE TABLE imovel(
     id_imovel       SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
     n_cad           CHAR(20),
     rua             VARCHAR(250),
     numero          INT,
     lote            VARCHAR(50),
     quadra          VARCHAR(50),
     bairro          VARCHAR(100),
     proprietario    VARCHAR(100),
    PRIMARY KEY (id_imovel)
);

-- ### status ###
DROP TABLE IF EXISTS serverStatus;
CREATE TABLE serverStatus(
    id_status   SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    resposta    VARCHAR(9),

    PRIMARY KEY(id_status)
);

-- ### status ###
DROP TABLE IF EXISTS AtendimentoFinal;
CREATE TABLE AtendimentoFinal(
    id_final   SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    registro   VARCHAR(20),

    PRIMARY KEY(id_final)
);

INSERT INTO acessoADM (username,userpass,nivel) VALUES ('admin','sysprefnci',1);

INSERT INTO acesso (username,userpass,nome,sobrenome,matricula,data_nasc,email) VALUES ('teste','teste','USER_TESTE','TESTADOR','95175382','99/99/9999','teste@teste.com.br');

INSERT INTO AtendimentoFinal (registro) VALUES ('0');

INSERT INTO serverStatus (resposta) VALUES ('Conectado');

INSERT INTO requerente (nome,cpf,rg,tel,cel,endereco,numero,complemento,bairro,cep,cidade,estado) VALUES ('Testador do sistema','111.111.111-11','22.222.222-2','(33) 3333-3333','(44) 4 4444-4444','Endereço do testador','55555','Complemento do testador','Bairro do testador','66.666-666','Cidade do testador','UF do testador');

INSERT INTO imovel (n_cad,rua,numero,lote,quadra,bairro,proprietario) VALUES ('77.7777.7777.777','Rua do teste','88888','Lote do teste','Quadra do teste','Bairro do teste','Proprietário teste');