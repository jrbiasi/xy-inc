# xy-inc

Sistema desenvolvido em PHP, utiliza o banco de dados MySQL {PDO}.

Para realizar teste local deve ter instalado um servidor PHP (Wamp, Xampp) e banco de Dados MySQL.

# Instalação / Configuração

  Após realizar o download do código realize a descompactação e copie a pasta httdocs para a raiz do(Wamp/Xampp).

Execute o comando abaixo para criar o banco e a tabela do sistema ou utilize os arquivos dentro da pasta "DB":

```sql

CREATE SCHEMA IF NOT EXISTS `pois` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;

CREATE TABLE IF NOT EXISTS `pois`.`lista_pois` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `cor_x` INT(10) UNSIGNED NOT NULL,
  `cor_y` INT(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8
COLLATE = utf8_general_ci;
```
O nome do usuario do MySQL deve ser root e a senha deve está vazia.

#Executar / Testar

O sistema possui 3 serviços que são executado atravez de chamada http e retorna em string.

##1-Cadastrar POIs
  Para realizar o cadastro de um POI basta digitar o endereço do sistema seguido por "cadastro" e os valores, por exemplo:
```groovy
http://localhost/cadastro/Lanchonete:27:12
```
Lanchonete:27:12 = nome do POI, coordenada  X e coordenada Y.
Se o cadastro ocorrer tudo ok, será retornado uma mensagem de exito, caso contrario uma mensagem de erro.

##2-Listar POIs
  Para listar basta digitar "listar", por exemplo:
```groovy  
http://localhost/listar
```
Retorno: Lanchonete (x=27, y=12)
		 Pub (x=12, y=8)
##3-Listar POIs por Proximidade
  Para executar basta digitar "proxi" seguido dos valores, por exemplo:
```groovy
http://localhost/proxi/27:12:10
```
27:12:10 = coordenada  X, coordenada Y e distância máxima.

Retorno: Lanchonete 
		 Pub
