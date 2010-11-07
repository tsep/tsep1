<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate: 2005-09-09 12:00:27 +0200 (Fr, 09 Sep 2005) $

@lastedited $LastChangedBy: olaf $

$LastChangedRevision: 325 $
*/
$tsep_lng['above_values'] = <<<_P
Valores indicados
_P;

$tsep_lng['add'] = <<<_P
Adicionar
_P;

$tsep_lng['all'] = <<<_P
Todos
_P;

$tsep_lng['assigned_indexingprofiles'] = <<<_P
Nome do perfil de indexação
_P;

$tsep_lng['button_search'] = <<<_P
Pesquisar
_P;

$tsep_lng['click_here_to_open'] = <<<_P
Clique no link para abrir a página
_P;

$tsep_lng['close_this_window'] = <<<_P
Fechar janela
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Testar se o ficheiro realmente existe antes de mostrar os resultados? Se selecionada esta opção a sua a pesquisa será um pouco mais demorada, mas nos resultados apenas os arquivos existentes serão mostrados. Esteja ciente de que esta opção apenas funcionara se o php.ini estiver selecionado com allow_url_open! Talvez seja melhor você deixar esta opção não selecionada.
_P;

$tsep_lng['config_Color_1'] = <<<_P
A primeira cor alternativa (da linha)no caso de listas extensas.
_P;

$tsep_lng['config_Color_2'] = <<<_P
A segunda cor alternativa (da linha) no caso de listas extensas.
_P;

$tsep_lng['config_Date_Style'] = <<<_P
Como mostrar a data (estilo PHP, pode utilizar D, l, M & F). O resultado será o do idioma escolhido. Exemplos: Inglês: 'l, F d Y h:i a' Alemão: 'l, d. F Y, G:i'
_P;

$tsep_lng['config_dir_exclude'] = <<<_P
Insira os diretórios a serem excluídos:
_P;

$tsep_lng['config_dir_exclude_help'] = <<<_P
Este é o caminho relativo do diretório que vai ser excluído tendo em conta o seu ficheiro indexer.php Exemplo: ./pasta1/pasta3, Então a "pasta3" contém os diretórios e os arquivos que serão excluidos. Pode incluir mais entradas adicionando uma vírgula sem ser seguida de um espaço! "," e não ", "!
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
Ao realizar a pesquisa a sua versão do MySQL vai ser verificada, porque a versão 4.0.1 ou superior é necessária para pesquisa booleana. MySQL >=4.0.0 pesquisa booleana: Você pode utilizar operadores booleanos, MySQL , 4.0.0: todas as palavras que entram no campo de pesquisa devem estar na página. Apenas neste caso a página será mostrada na lista de resultados. Você quer notificar o usuário de que existe apenas uma versão antiga na base de dados e que não possibilidade de pesquisa booleana ? Nós recomendamos selecionar esta opção, de outra maneira isto pode confundir o usuário do porque não existir resultados.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Extensões de ficheiros a serem incluídos.
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
O indexer indexa ficheiros cujas extensões são dadas aqui ( utilise um vírgula separando cada uma ex.: HTM,HTML,PHP ).
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Insira os ficheiros a serem excluídos:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Este é o caminho relativo do ficheiro a ser excluído, em relação à raiz do site. Exemplo: /pasta1/pasta4/login.php, se http://www.seudominio.com/pasta1/pasta4/login.php deve ser excluído. Inclua múltiplas entradas adicionando "," mas não ", " (sem o espaço)
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Entre o nome completo do ficheiro .php da base de dados externa:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Este é o nome do ficheiro .php-script fora do TSEP, o qual fornece os ficheiros a serem indexados. Exemplo: crawler/spider.php - veja a documentação para mais detalhes
_P;

$tsep_lng['config_group_general'] = <<<_P
Geral
_P;

$tsep_lng['config_group_lists'] = <<<_P
Listas
_P;

$tsep_lng['config_group_lists_colors'] = <<<_P
Cores
_P;

$tsep_lng['config_group_lists_limits'] = <<<_P
Limites
_P;

$tsep_lng['config_group_logging'] = <<<_P
Registar no Log
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Interface do utilizador
_P;

$tsep_lng['config_group_visible2enduser_range'] = <<<_P
Limites
_P;

$tsep_lng['config_group_visible2enduser_results'] = <<<_P
Resultados
_P;

$tsep_lng['config_group_visible2enduser_searchsuggest'] = <<<_P
Pesquisa sugerida
_P;

$tsep_lng['config_group_visible2enduser_search'] = <<<_P
A pesquisar
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Diferença de horas entre o servidor e a hora local. Ajuste se necessário.
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Quantas sugestões de pesquisa devem ser mostradas (0 = off)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
A caixa de sugestão de pesquisa deve mostrar o número de páginas da pesquisa?
_P;

$tsep_lng['config_show_popular'] = <<<_P
A caixa de sugestão de pesquisa deve mostrar a popularidade da pesquisa?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Que método de cálculo para o número de páginas?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Quando iniciar a pesquisa:<br /> 1 = Usa os resultados da última pesquisa<br /> 2 = Calcula a média de todas as pesquisas<br /> 3 = Calcula o mínimo de todas as pesquisas<br /> 4 = Calcula o máximo de todas as pesquisas
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit'] = <<<_P
Quantos caracteres exibir após o primeiro hit?
_P;

$tsep_lng['config_How_Many_CharsAfter_Hit_help'] = <<<_P
O resultado da pesquisa será apenas uma parte do texto completo que foi indexado. Esta entrada define quando caracteres serão mostrados APÓS o primeiro hit.
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit'] = <<<_P
Quantos caracteres exibir antes do primeiro hit?
_P;

$tsep_lng['config_How_Many_CharsBefore_Hit_help'] = <<<_P
O resultado da pesquisa será apenas uma parte do texto completo que foi indexado. Esta entrada define quando caracteres serão mostrados ANTES do primeiro hit.
_P;

$tsep_lng['config_How_Many_Results'] = <<<_P
Se o utilizador não puder seleccionar o número de resultados a serem mostrados, então esse valor padrão será utilizado (o utilizador terá esta quantidade de resultados antes da página de navegação)
_P;

$tsep_lng['config_Logging_IP'] = <<<_P
Registar endereços IP?
_P;

$tsep_lng['config_Logging_result_links'] = <<<_P
Registar cliques dos resultados da pesquisa?
_P;

$tsep_lng['config_Logging_search_term'] = <<<_P
Registar termos de pesquisa?
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
palavra "maçã" but not "macintosh"
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
encontra páginas que contêm exactamente a frase "algumas palavras" (por exemplo, páginas que contêm "algumas palavras de sabedoria" but not "algumas palavras barulhentas").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Dicas para tirar o máximo do TSEP 
_P;

$tsep_lng['search_tips_help'] = <<<_P
abre a ajuda numa nova janela
_P;

$tsep_lng['search_tips_se1'] = <<<_P
maçã banana
_P;

$tsep_lng['search_tips_se2'] = <<<_P
+maçã +banana
_P;

$tsep_lng['search_tips_se3'] = <<<_P
+maçã macintosh
_P;

$tsep_lng['search_tips_se4'] = <<<_P
+maçã -macintosh
_P;

$tsep_lng['search_tips_se5'] = <<<_P
+maçã +(>bolo <tarte)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
maçã*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"algumas palavras"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Dicas de pesquisa
_P;

$tsep_lng['search_took'] = <<<_P
A pesquisar
_P;

$tsep_lng['seconds'] = <<<_P
segundos
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
separe vários valores ou definições com um virgula
_P;

$tsep_lng['show_it'] = <<<_P
Mostra
_P;

$tsep_lng['show_results_per_page'] = <<<_P
Mostra os resultados por página. Cada alteração actualiza a página com novos valores.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
/ página
_P;

$tsep_lng['to'] = <<<_P
para
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project (Projecto de motor de pesquisa)
_P;

$tsep_lng['type'] = <<<_P
tipo
_P;

$tsep_lng['update'] = <<<_P
Actualização
_P;

$tsep_lng['value_already_exists'] = <<<_P
Este valor já existe
_P;

$tsep_lng['value_for'] = <<<_P
valor para
_P;

$tsep_lng['version'] = <<<_P
Esta é a versão
_P;

$tsep_lng['warning'] = <<<_P
** Clique apenas uma vez no botão "Start Indexing" (Iniciar Indexação) e não feche o navegador enquanto a pesquisa não estiver finalizada. Não execute diversas instâ
_P;
