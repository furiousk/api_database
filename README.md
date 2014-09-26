api_database
============

Lib de manipulação de banco de dados e mapeamento de entidade em PHP + PDO.

Este projeto está em andamento e trata-se de um app que faz de forma automática o mapeamento das entidades do banco de dados,
O objetivo é agilizar o processo de manipulação de banco de dados, pois uma vez referênciando o mesmo no arquivo .ini, basta
instanciar o objeto Mapping, setar os nomes das pastas onde serão armazenados os MODELOS e os DAOS, chamar o metodo de 
mapeamento e pronto, teremos os modelos (Pojos) e os daos de todas as tabelas do banco apontado no arquivo de configuração.

=====================Aplicando========================

1- Vá até a pasta /api_database/Config/config.ini e aponte para o banco de dados desejado
2- Instancie o obj Mapping passando como parametro o caminho do arquivo config.ini 
3- Com o obj instanciado chame o metodo setFolderVos passando como parametro o nome da pasta onde ficará os arquivos modelos das tabelas do banco.
4- Agora chame o metodo setFolderDao passando desta vez o nome da pasta para os arquivos DAO
5- Para finalizar chame o metodo mappEntity, o mesmo irá escrever os arquivos retornando um array com 2 posições, cada uma delas
traz um array descrevendo o comportamento no momento da criação dos arquivos

Obs: Os modelos trazem por padrao propriedades que sao espelhos dos campos das tabelas do banco em questao, e metodos getters e setters.
Os arquivos DAOs trazem metodos como: insert( passando o modelo da tabela com todos as propriedades setadas, menos o ID )

EX: 
$cliente = new cliente(); 
$cliente->setNome("Bruno"); 
$clienteDao = new clienteDao();
$clienteDao->insert( $cliente );

update( Passando o modelo da tabela com todos as propriedades setadas com os valorer a serem atualizado e o ID que receberá a modificação )

EX: 
$cliente = new cliente(); 
$cliente->setId(1); 
$cliente->setNome("Bruno Alves"); 
$clienteDao = new clienteDao();
$clienteDao->update( $cliente );

getById( Passando o valor int referente ao ID que será consultado )
Este metodo retorna um objeto modelo já instânciado e setado com os valores da consulta.

EX: 
$clienteDao = new clienteDao();
$cliente = $clienteDao->getById( 1 );
echo $cliente->getNome();

$saida->//Bruno Alves

getAll( Este metodo nao recebe parametro )
Retorna um array de objetos modelo com todas as linhas da tabela em questao

Ex:
$clienteDao = new clienteDao();
$cliente = $clienteDao->getAll();
echo $cliente[0]->getNome();

$saida->//Bruno Alves

custonQuery( Este metodo recebe uma query string para consultas avançadas )
Retorna um array multi-dimensional contendo linhas da consulta.

Ex:
$clienteDao = new clienteDao();
$cliente = $clienteDao->custonQuery("select * from clientes");
echo $cliente[0][1];

$saida->//Bruno Alves


Desenvolvedor: Bruno Diogenes Alves.
