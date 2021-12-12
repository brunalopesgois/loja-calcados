/* Vers�o SQLite */

CREATE TABLE lote (
id INTEGER PRIMARY KEY NOT NULL,
data_fabricacao TEXT,
produtos_fabricados INTEGER
);

CREATE TABLE vendedor (
id INTEGER PRIMARY KEY NOT NULL,
nome TEXT,
num_vendas INTEGER
);

CREATE TABLE produto (
id INTEGER PRIMARY KEY NOT NULL,
nome TEXT,
lote_id INTEGER NOT NULL,
cor TEXT,
descricao TEXT,
FOREIGN KEY(lote_id) REFERENCES lote (id)
);

CREATE TABLE pedido (
id INTEGER PRIMARY KEY NOT NULL,
cliente_cpf TEXT NOT NULL,
vendedor_id INTEGER NOT NULL,
valor_total NUMERIC,
FOREIGN KEY(cliente_cpf) REFERENCES cliente (cpf),
FOREIGN KEY(vendedor_id) REFERENCES vendedor (id)
);

CREATE TABLE produto_pedido (
id INTEGER PRIMARY KEY NOT NULL,
produto_id INTEGER NOT NULL,
pedido_id INTEGER NOT NULL,
FOREIGN KEY (produto_id) REFERENCES produto (id),
FOREIGN KEY (pedido_id) REFERENCES pedido (id)
);

CREATE TABLE cliente (
cpf TEXT PRIMARY KEY NOT NULL,
nome TEXT,
data_nascimento TEXT
);
