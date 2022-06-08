CREATE TABLE categoria (
    id INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    descricao VARCHAR(150) NOT NULL
) ENGINE=InnoDB;

INSERT INTO categoria (descricao) VALUES 
("Mahnwa"),
("Manga"),
("Nacional"),
("Infantil"),
("Jovem"),
("Anime"),
("Quadrinhos Comics"),
("Quadrinhos Chineses");

CREATE TABLE cliente (
    codigo INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    endereco VARCHAR(50) NOT NULL,  
    telefone VARCHAR(15) NOT NULL,
    limite_cred decimal(10,2) NOT NULL,
    cidade VARCHAR(80) NOT NULL,
    email VARCHAR(100) NOT NULL,
    CPF VARCHAR(15) NOT NULL,
    estado char(2) NOT NULL
) ENGINE=InnoDB;

INSERT INTO 
cliente (
    nome,
    endereco,
    telefone,
    limite_cred,
    cidade,
    email,
    CPF,
    estado
) VALUES (
    'Fabio',
    'Rua Joana',
    '997456598',
    '200',
    'São Miguel Arcanjo',
    'fabio@gmail.com',
    '12354216895',
    'SP'
), 
(
    'Jaime',
    'Rua São Paulo',
    '997454598',
    '50',
    'Itapetininga',
    'jaime@gmail.com',
    '56898956356',
    'RJ'
),
(
    'Ataide',
    'Rua Fabio Antonela',
    '997896598',
    '100',
    'São Caetano',
    'ata@gmail.com',
    '12354986895',
    'RJ'
),
(
    'Bruno',
    'Rua Kuama',
    '997448598',
    '150',
    'Cotia',
    'bruno@gmail.com',
    '12354336895',
    'SP'
);

CREATE TABLE produtos (
    cod INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    preco decimal(10,2) NOT NULL,
    qtd_estoque INTEGER NOT NULL,
    unidade_medida char(3) NOT NULL,
    fk_categoria_id INTEGER NOT NULL REFERENCES categoria (id)
) ENGINE=InnoDB;

INSERT INTO produtos (
    nome,
    preco,
    qtd_estoque,
    unidade_medida,
    fk_categoria_id
) 
VALUES
("Hunter Hunter", 80, 20, 5, 2),
("Monica", 50, 10, 8, 3),
("Luluzinha", 50, 10, 20, 4),
("Dragon ball GT", 20, 10, 5, 6); 

CREATE TABLE itens_vendas (
    fk_produtos_cod INTEGER NOT NULL REFERENCES produtos (cod),
    fk_vendas_numero INTEGER NOT NULL REFERENCES vendas (numero),
    quant_vendida INTEGER NOT NULL,
    PRIMARY KEY (fk_produtos_cod,
    fk_vendas_numero)
) ENGINE=InnoDB;

CREATE TABLE vendas (
    numero INTEGER NOT NULL AUTO_INCREMENT
    PRIMARY KEY,
    data date NOT NULL,
    prazo_entrega VARCHAR(25) NOT NULL,
    cond_pagto VARCHAR(20) NOT NULL,
    fk_cliente_codigo INTEGER NOT NULL REFERENCES cliente (codigo),
    fk_vendedor_cod INTEGER NOT NULL REFERENCES vendedor (cod)
) ENGINE=InnoDB;

CREATE TABLE vendedor (
    cod INTEGER NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(80) NOT NULL,
    endereco VARCHAR(80) NOT NULL,
    cidade VARCHAR(80) NOT NULL,
    estado char(2) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    porc_comissao decimal(10,2) NOT NULL
) ENGINE=InnoDB;

INSERT INTO vendedor(
    nome,
    endereco,
    cidade,
    estado,
    telefone,
    porc_comissao
)
VALUES
("Pedro", "Chacara Bom Jesus", "São Miguel Arcanjo", "SP", "997857896", "20"),
("João", "Sitio Tio Paulo", "São Felipe", "RJ", "997885996", "90"),
("Flavia", "Chacara Bom Jesus", "São Miguel Arcanjo", "SP", "9986758485", "8"),
("Guta", "Chacara Leopoldo", "Curitiba", "Parana", "997859596", "18"),
("Lepoldina", "Fazenda São Luiz", "São Paulo", "SC", "997965265", "8");

CREATE VIEW venda_cli_ven AS
SELECT vn.cond_pagto as cond_pag,
vn.data as ven_data,
vn.prazo_entrega as prazo,
cli.nome as cliente_nome,
vd.nome as vendedor_nome,
vn.numero as venda_numero
FROM vendas vn join vendedor vd
on vd.cod = vn.fk_vendedor_cod
join cliente cli
on cli.codigo = vn.fk_cliente_codigo;


CREATE VIEW itens_vendas_produto AS
SELECT 
iv.fk_vendas_numero as id_venda
p.nome as p_nome,
p.preco as p_preco,
iv.quant_vendida as iv_qtd
 FROM itens_vendas iv JOIN produtos p
ON p.cod = iv.fk_produtos_cod;

CREATE VIEW filtro_produto AS 
SELECT
p.cod, p.nome, p.preco , p.qtd_estoque, p.unidade_medida, c.descricao AS categoria
FROM produtos p JOIN categoria c ON p.fk_categoria_id  = c.id;