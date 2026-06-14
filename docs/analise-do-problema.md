O sistema deste projeto foi desenvolvido pensando em atender a rede Raizes do Nordeste, levando em consideração todos os pontos envolvendo seu rápido crescimento e necessidade de agilidade, tanto no dia a dia, quanto na implementação do sistema. Para que seja possível atender a toda a rede, é necessário centralizar pedidos realizados por diferentes canais, controle total de estoque, registro de pagamentos e rastreabilidade das operações.

Multicanais:
Com o cenário onde diversos pedidos serão realizados por diferentes canais, e em grande quantidade, o projeto permite a distinção e rastreabilidade da origem de cada pedido.
O atribuito responsável, é o atributo canal_pedido na entidade Pedido, este campo permite o registro de origem de cada solicitação, seja por aplicativo, site, atendimento presencial ou até mesmo totem de atendimento.

Pagamentos:
A implementação do sistema de pagamentos Mock esta presente para validação do fluxo completo de pedidos, desta maneira tornando possível validar a resposta de cada item do processo. Quando um pagamento é solicitado, o sistema registra a transação, associa o pagamento ao pedido correspondente e altera seu status para "PAGO".

LGPD:
O sistema foi desenvolvido considerando princípios básicos da Lei Geral de Proteção de Dados, especialmente os conceitos de minimização e proteção das informações armazenadas, não solicitando ao usuário qualquer informação que não seja necessária e justificável.
O armazenamento de senhas são protegidos com mecanismos de hash fornecidos pelo framework Laravel, reduzindo os riscos associados ao vazamento de informações sensíveis.
Por fim, a autenticação baseada em JWT garante que apenas usuários autorizados possam acessar os recursos protegidos da API, contribuindo para a confidencialidade e integridade dos dados.

Tecnologias escolhidas e o motivo técnico por trás da escolha.

Laravel:
Laravel foi escolhido por sua estrutura madura para desenvolvimento de APIs REST, oferecendo recursos nativos para roteamento, validações, migrations, autenticação, tratamento de exceções e integração com bancos relacionais. Esta escolha permitiu grande agilidade no desenvolvimento do projeto sem comprometer a organização da aplicação, trazendo padronização e contribuindo com uma entrega mais ágil.

PostgreSQL:
PostgreSQL é um banco de dados relacional robusto e cada vez mais utilizado em ambientes corporativos graças a sua confiabilidade e uso de padrões SQL bem conhecidos pelo mercado, facilitando no suporte e implementação em cada detalhe. É um banco de dados gratuito, que também possui suporte a relacionamentos complexos, o que o torna adequado para aplicações como a requisitada para rede Raízes do Nordeste.

JWT:
A autenticação é realizada com JWT, por permitir uma arquitetura stateless, onde cada requisição carrega suas próprias credenciais através de um token assinado. Isso reduz a dependência de sessões no servidor, auxiliando no volume de requisições que seriam enviadas para banco. Por fim, JWT é amplamente utilizado em APIs modernas.

Eloquent ORM:
A utilização de Eloquent ORM foi feita para simplificar a manipulação dos dados, permitindo representar tabelas do banco através de modelos orientados a objetos e facilitando o gerenciamento relacional entre entidades.

Migrations:
As migrations foram utilizadas com o objetivo de versionar a estrutura do banco de dados através de código, desta forma, podemos reproduzir o ambiente em diferentes máquinas, facilitando todo o processo de manutenção do projeto.

Paginação:
A paginação foi implementada para reduzir a quantidade de registros retornados em cada requisição, melhorando desempenho e escalabilidade da API.

Filtro por Query Parameters:
A utilização dos filtros por Query Parameters se dá pois permite consultas mais específicas e também reduz o volume de dados trafegados, tornando a API mais flexível para diferentes cenários de uso.



//VER SOBRE EXCLUSÃO DOS DADOS NA LGPD - E TAMBEM VER USERS ESTAR EM INGLES E O RESTANTE DO BANCO EM PT-BR

//Explicação para pedidos_items existir:
A entidade PedidoItem foi utilizada para representar a relação entre pedidos e produtos, permitindo que um único pedido contenha múltiplos produtos com quantidades e preços independentes. Essa abordagem evita redundância de dados e facilita o cálculo do valor total dos pedidos.
