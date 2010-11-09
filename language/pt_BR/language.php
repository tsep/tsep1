<?php

/* following will be filled automatically by SubVersion!

Do not change by hand!

$LastChangedDate$

@lastedited $LastChangedBy$

$LastChangedRevision$
*/
$tsep_lng['above_values'] = <<<_P
Valores acima
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

$tsep_lng['config_absPath'] = <<<_P
define o caminho absoluto para o TSEP, exemplo: se o arquivo search.php esta localizado em /home/www/php/tsepsearch/search.php ele deve aparecer como '/home/www/php/tsepsearch'
_P;

$tsep_lng['config_tmpPath'] = <<<_P
define o caminho absoluto para o diretório temporário do TSEP
_P;

$tsep_lng['config_check_file_exists'] = <<<_P
Testar se o arquivo realmente existe antes de mostrar os resultados? Se selecionada esta opção a sua pesquisa será um pouco mais demorada, mas nos resultados apenas os arquivos existentes serão mostrados. Esteja ciente de que esta opção apenas funcionara se o php.ini estiver selecionado com allow_url_open! Talvez seja melhor você deixar esta opção não selecionada.
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
Este é o caminho relativo do diretório(s) a ser excluído, com relação ao à raiz do site. Exemplo: /pasta1/pasta3, se os conteúdos (diretórios e arquivos) de http://www.seudominio.com/pasta1/pasta3  devem ser excluídos. Inclua múltiplas entradas adicionando "," mas não ", " (sem o espaço)
_P;

$tsep_lng['config_Display_Boolean_Search'] = <<<_P
Ao realizar a pesquisa a sua versão do MySQL vai ser verificada. A versão 4.0.1 ou superior é necessária para pesquisa booleana. Se MySQL >=4.0.0 pesquisa booleana: você pode utilizar operadores booleanos. Se MySQL < 4.0.0: todas as palavras que entram no campo de pesquisa devem estar na página (apenas neste caso a página será mostrada na lista de resultados). Você quer notificar o usuário de que existe apenas uma versão antiga na base de dados e que não possibilidade de pesquisa booleana? Nós recomendamos selecionar esta opção, de outra maneira isto pode confundir o usuário do porque não existem resultados.
_P;

$tsep_lng['config_ext_include'] = <<<_P
Extensões de arquivos a serem incluídos.
_P;

$tsep_lng['config_ext_include_help'] = <<<_P
O indexer indexa apenas arquivos cujas extensões são fornecidas aqui (utilize uma vírgula separando cada uma ex.: HTM,HTML,PHP).
_P;

$tsep_lng['config_file_exclude'] = <<<_P
Insira os arquivos a serem excluídos:
_P;

$tsep_lng['config_file_exclude_help'] = <<<_P
Este é o caminho do arquivo a ser excluído, com relação à sua raiz do site. Exemplo: /pasta1/pasta4/login.php, se http://www.seudominio.com/pasta1/pasta4/login.php deve ser excluído. Inclua múltiplas entradas adicionando "," mas não ", " (sem o espaço)
_P;

$tsep_lng['config_skip_symblinks'] = <<<_P
Ignore os links simbólicos
_P;

$tsep_lng['config_skip_symblinks_help'] = <<<_P
Define, se os links simbólicos devem ser ignorados quando pesquisando através do diretório de scan.
_P;

$tsep_lng['config_subdirs2index'] = <<<_P
Subdiretórios a serem indexados (deixa em branco para todos)
_P;

$tsep_lng['config_subdirs2index_help'] = <<<_P
Separe cada subdiretório por uma nova linha e/ou vírgula. Cada entrada é acrescentada ao 'caminho do diretório web'e usado para encontrar os arquivos.
_P;

$tsep_lng['config_fnExternalPhp'] = <<<_P
Entre o nome completo do arquivo .php da base de dados externa:
_P;

$tsep_lng['config_fnExternalPhp_help'] = <<<_P
Este é o nome do arquivo de .php-script fora do TSEP, o qual fornece os arquivos a serem indexados. Exemplo: crawler/spider.php - veja a documentação para detalhes
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
registrando no log
_P;

$tsep_lng['config_group_visible2enduser'] = <<<_P
Interface do usuário
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
Pesquisando
_P;

$tsep_lng['config_Hour_Difference'] = <<<_P
Horas de diferença entre o servidor e a hora local. Ajuste se necessário.
_P;

$tsep_lng['config_how_many_hints'] = <<<_P
Quantas sugestões de pesquisa devem ser mostradas (0 = off)?
_P;

$tsep_lng['config_show_nr_hits'] = <<<_P
A caixa de sugestão de pesquisa deve mostrar o número de páginas que retornaram em uma pesquisa?
_P;

$tsep_lng['config_show_popular'] = <<<_P
A caixa de sugestão de pesquisa deve mostrar a popularidade em uma pesquisa?
_P;

$tsep_lng['config_calc_hits_method'] = <<<_P
Que método de cálculo para o número de páginas?
_P;

$tsep_lng['config_calc_hits_method_help'] = <<<_P
Quando logar em uma pesquisa:<br /> 1 = Usa os resultados da última pesquisa<br /> 2 = Calcula a média de todas as pesquisas<br /> 3 = Calcula o mínimo de todas as pesquisas<br /> 4 = Calculao máximo de todas as pesquisas
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
Se o usuário não puder selecionar o número de resultados a serem mostrados, então este valor padrão será utilizado (o usuário terá esta quantidade de resultados antes da página de navegação)
_P;

$tsep_lng['config_How_Many_Sentences'] = <<<_P
Quantos hitblocks devem ser mostrados?
_P;

$tsep_lng['config_How_Many_Sentences_help'] = <<<_P
O resultado da pesquisa será apenas uma parte do texto completo que foi indexado. Esta entrada define o número máximo de  hitblocks a serem exibidos
_P;

$tsep_lng['config_internal_notes'] = <<<_P
Notas internas
_P;

$tsep_lng['config_internal_notes_help'] = <<<_P
Este campo pode ser usado para notas internas. Ele é visível apenas na área do admin!
_P;

$tsep_lng['config_Language'] = <<<_P
Em que língua você quer exibir o TSEP? Exemplo : Se você quiser Inglês selecione 'en', se quiser Alemão selecione 'de'.
_P;

$tsep_lng['config_listFilenamesOnly'] = <<<_P
Mostra apenas uma lista dos arquivos a serem indexados
_P;

$tsep_lng['config_listFilenamesOnly_help'] = <<<_P
O indexer não constrói um index, ele simplesmente lista todos os arquivos a serem indexados.<br>
Além de mostrar quais os diretórios que devem ser ignorados
_P;

$tsep_lng['config_Logging'] = <<<_P
Você quer registrar ?
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

$tsep_lng['config_max_hints'] = <<<_P
Número de termos de pesquisa marcados para cada sentença
_P;

$tsep_lng['config_max_hints_help'] = <<<_P
O número define a quantidade máxima de termos de pesquisa que cada sentença deve conter.
_P;

$tsep_lng['config_max_length'] = <<<_P
Tamanho máximo da sentença (em carácteres)
_P;

$tsep_lng['config_max_length_help'] = <<<_P
Sentenças com um número de carácteres maior que o número definido não vai ser mostrada.
_P;

$tsep_lng['config_maxRows_completeindex'] = <<<_P
Quantas entradas a serem mostradas no página completa do index em um único documento html? Esteja atendo que um número muito poderá fazer a página ser muito grande!
_P;

$tsep_lng['config_maxRows_indexoverview'] = <<<_P
Quantas entradas a serem mostradas no página de edição do index em um único documento html? Esteja atendo que um número muito poderá fazer a página ser muito grande!
_P;

$tsep_lng['config_maxRows_logview'] = <<<_P
Quantos registros você quer ver em uma página?
_P;

$tsep_lng['config_maxRows_Stopwords'] = <<<_P
Quantas stopwords você quer ver em uma página?
_P;

$tsep_lng['config_Numbers_Put'] = <<<_P
Mostrar o número de páginas na lista de hits?
_P;

$tsep_lng['config_Numbers_Put_After'] = <<<_P
Se mostrar o número de páginas na lista de hits, mostre isto após o número
_P;

$tsep_lng['config_Numbers_Put_Before'] = <<<_P
Se mostrar o número de páginas na lista de hits, mostre isto antes do número
_P;

$tsep_lng['config_Pagerank'] = <<<_P
Qual é o símbolo de rank da sua página. Exemplo: *. Você pode inserir algum HTML mas obrigatoriamente deve deixar de inserir alguns caracteres especiais. Exemplo: <�img src= "graphics/tsepranks-single.png" alt= "*"�>. Atenção: Tudo o que você inserir será mostrado tantas vezes quantas a palavra procurada for encontrada na página!
_P;

$tsep_lng['config_Pagerank_Number'] = <<<_P
Você quer mostrar o rank da pesquisa?
_P;

$tsep_lng['config_parmsExternalPhp'] = <<<_P
Entre o parâmetro a ser enviado para o datasupply-script:
_P;

$tsep_lng['config_parmsExternalPhp_help'] = <<<_P
Este parâmetro esta disponível para ser usado dentro da fonte externa de dados . Exemplo : Um arquivo-html, aond o crawler/spider deve iniciar sua pesquisa - veja documentação para detalhes
_P;

$tsep_lng['config_Path'] = <<<_P
Define o caminho do seu TSEP. Exemplo: se o arquivo search.php es localizado www.seudominio.com/php/tsepsearch/search.php ele deverá ser 'php/tsepsearch'
_P;

$tsep_lng['config_print_list_of_files'] = <<<_P
Mostra a lista dos arquivos indexados
_P;

$tsep_lng['config_searchViaExt'] = <<<_P
O indexador deve executar o datasupplier-script
_P;

$tsep_lng['config_searchViaExt_help'] = <<<_P
O indexador deve carregar o datasupplier-script para recuperar os arquivos a serem indexados (veja documentação para detalhes)
_P;

$tsep_lng['config_searchViaRead'] = <<<_P
O indexador deve encontrar arquivos através do directoryscan
_P;

$tsep_lng['config_searchViaRead_help'] = <<<_P
Diz ao indexador para coletar nomes de arquivos a serem indexados através do directoryscan, iniciando acima do diretório fornecido (modo clássico de pesquisa TSEP)
_P;

$tsep_lng['config_Show_Record_Change'] = <<<_P
O usuário pode definir quantos resultados a serem mostrados em uma página?
_P;

$tsep_lng['config_word_offset'] = <<<_P
Número de palavras mostradas antes/depois de cada termo de pesquisa
_P;

$tsep_lng['config_word_offset_help'] = <<<_P
O resultado da pesquisa será apenas parte do texto completo indexado. Esta entrada define quantas palavras serão mostradas antes e depois de cada hit.
_P;

$tsep_lng['config_Use_Debug_Print'] = <<<_P
apenas para programadores : utilizar a função debugprint()? (isto deve ser fora do uso habitual do TSEP)
_P;

$tsep_lng['config_XdirName'] = <<<_P
Diretório de início de indexação (opcional, relativo ou absoluto para o indexer.php):
_P;

$tsep_lng['config_XdirName_help'] = <<<_P
Uma definição de qual diretório iniciar a indexação é necessária<strong>apenas em casos especiais</strong>-normalmente,<strong>simplesmente deixe vazio</strong>!<br>
Você pode colocar algo como ../../ or www/htdocs/suaconta/
_P;

$tsep_lng['config_Xwebdir'] = <<<_P
Entre o caminho do diretório web *:
_P;

$tsep_lng['config_Xwebdir_help'] = <<<_P
Este é o caminho web que corresponde ao diretório dado acima. Exemplo:http://www.sitename.com/folder1/folder2. Se todos os arquivo de "http://www.sitename.com" devem ser indexados a entrada correta é "http://www.sitename.com"
_P;

$tsep_lng['configuration'] = <<<_P
Configuração
_P;

$tsep_lng['copyright'] = <<<_P
Copyright
_P;

$tsep_lng['create_new_index'] = <<<_P
Cria um novo índice
_P;

$tsep_lng['data_retrieved'] = <<<_P
Dados recuperados da base de dados em
_P;

$tsep_lng['day_friday'] = <<<_P
Sexta-feira
_P;

$tsep_lng['day_friday_short'] = <<<_P
Sex
_P;

$tsep_lng['day_monday'] = <<<_P
Segunda-feira
_P;

$tsep_lng['day_monday_short'] = <<<_P
Seg
_P;

$tsep_lng['day_saturday'] = <<<_P
Sábado
_P;

$tsep_lng['day_saturday_short'] = <<<_P
Sab
_P;

$tsep_lng['day_sunday'] = <<<_P
Domingo
_P;

$tsep_lng['day_sunday_short'] = <<<_P
Dom
_P;

$tsep_lng['day_thursday'] = <<<_P
Quinta-feira
_P;

$tsep_lng['day_thursday_short'] = <<<_P
Qui
_P;

$tsep_lng['day_tuesday'] = <<<_P
Terça-feira
_P;

$tsep_lng['day_tuesday_short'] = <<<_P
Ter
_P;

$tsep_lng['day_wednesday'] = <<<_P
Quarta-feira
_P;

$tsep_lng['day_wednesday_short'] = <<<_P
Qua
_P;

$tsep_lng['delete'] = <<<_P
deletar
_P;

$tsep_lng['delete_file'] = <<<_P
deleta o arquivo
_P;

$tsep_lng['transform'] = <<<_P
transforme
_P;

$tsep_lng['details'] = <<<_P
detalhes
_P;

$tsep_lng['directory'] = <<<_P
diretório
_P;

$tsep_lng['docorrectit'] = <<<_P
por favor CORRIJA este erro ANTES de continuar!
_P;

$tsep_lng['error_from_extscript'] = <<<_P
erro(s), ocasionados pelo scprit externo
_P;

$tsep_lng['filename'] = <<<_P
nome do arquivo
_P;

$tsep_lng['filter'] = <<<_P
filtro
_P;

$tsep_lng['forbidden_stopword'] = <<<_P
Atenção: das suas palavras de pesquisa as seguintes palavras à pedido do administrador não pudederam ser pesquisadas ou encontradas (informações mais detalhadas podem ser encontradas em "Dicas de Pesquisa"):
_P;

$tsep_lng['found_no_pages'] = <<<_P
Nenhuma página encontrada.
_P;

$tsep_lng['group_level_gap'] = <<<_P
definição do grupo de nível: nível de grupo tem de ser exatamente 1 maior que o o nível de grupo que o precedeu.
_P;

$tsep_lng['help'] = <<<_P
Ajuda
_P;

$tsep_lng['help_copyright'] = <<<_P
Abre uma nova janela e o leva até a página do TSEP em Sourceforge.net
_P;

$tsep_lng['help_del_indexedpage'] = <<<_P
Tem certeza de que quer deletar esta página do index (remover tudo sobre esta página do banco de dados)?
_P;

$tsep_lng['help_del_maxresult'] = <<<_P
Tem certeza de que quer deletar este resultado máximo?
_P;

$tsep_lng['help_del_stopword'] = <<<_P
Tem certeza de que quer deletar esta stopword?
_P;

$tsep_lng['help_first_page'] = <<<_P
ir para primeira página
_P;

$tsep_lng['help_last_page'] = <<<_P
i para a última página
_P;

$tsep_lng['help_next_page'] = <<<_P
ir para a próxima página
_P;

$tsep_lng['help_previous_page'] = <<<_P
ir para página anterior
_P;

$tsep_lng['if_problems_contact'] = <<<_P
Se você ainda tem problemas, ou não esta totalmente satisfeito com os resultados, por favor envie um e-mail sobre seu problema ou sugestão.
_P;

$tsep_lng['impossible_already_exists'] = <<<_P
impossível: este nome já existe
_P;

$tsep_lng['index_edit_date'] = <<<_P
Último Edição do Index 
_P;

$tsep_lng['index_edit_head'] = <<<_P
Edita os dados armazenados no index
_P;

$tsep_lng['index_edit_title'] = <<<_P
Edição do Index (detalhado)
_P;

$tsep_lng['editindex_last_edited'] = <<<_P
Data da última edição:
_P;

$tsep_lng['editindex_not_edited'] = <<<_P
Não editado
_P;

$tsep_lng['indexer_last_indexed'] = <<<_P
Data do último index:
_P;

$tsep_lng['editindex_not_indexed'] = <<<_P
Não indexado
_P;

$tsep_lng['index_overview_click_title'] = <<<_P
Clique aqui para editar os detalhes desta página.
_P;

$tsep_lng['index_overview_click_url'] = <<<_P
Clique aqui para exibir a página no navegador.
_P;

$tsep_lng['index_overview_head'] = <<<_P
Clique no título da página ou URL para abrir os detalhes da entrada.
_P;

$tsep_lng['index_overview_help'] = <<<_P
Dica: Usa a função pesquisar do seu browser para encontrar ainda mais rápido o que você esta procurando
_P;

$tsep_lng['index_overview_title'] = <<<_P
Index Overview(curto)
_P;

$tsep_lng['indexed_words'] = <<<_P
Ver completamente o index atual(pode ser muito grande!)
_P;

$tsep_lng['indexer_title'] = <<<_P
Indexador
_P;

$tsep_lng['indexing_in'] = <<<_P
Indexação feita em
_P;

$tsep_lng['indexing_on'] = <<<_P
Indexação feita em 
_P;

$tsep_lng['indexingprofile'] = <<<_P
Perfil do index
_P;

$tsep_lng['indexingprofile_unknown'] = <<<_P
perfil do index não existe: perfil do nome
_P;

$tsep_lng['info_from_extscript'] = <<<_P
informação(s), trazidas pelo script externo
_P;

$tsep_lng['intErr'] = <<<_P
erro interno
_P;

$tsep_lng['intErr_wrongfieldtype'] = <<<_P
erro no field_type-definition
_P;

$tsep_lng['is'] = <<<_P
é
_P;

$tsep_lng['logview_contents'] = <<<_P
Entrada
_P;

$tsep_lng['logview_head'] = <<<_P
Todos as entradas registradas são listadas abaixo
_P;

$tsep_lng['logview_ip'] = <<<_P
IP
_P;

$tsep_lng['logview_no_IP'] = <<<_P
no registrado
_P;

$tsep_lng['logview_time_of_entry'] = <<<_P
Data / Tempo
_P;

$tsep_lng['logview_title'] = <<<_P
Termos de pesquisa e Pageopenings
_P;

$tsep_lng['logview_type'] = <<<_P
Tipo de registro
_P;

$tsep_lng['logview_type_1'] = <<<_P
Termo de pesquisa
_P;

$tsep_lng['logview_type_2'] = <<<_P
Resultados de clique
_P;

$tsep_lng['logview_IPresolved'] = <<<_P
IP resolvido
_P;

$tsep_lng['logview_Stopwords'] = <<<_P
Stopwords
_P;

$tsep_lng['mandatory'] = <<<_P
* este campos é obrigatório! Por favor entre com um valor.
_P;

$tsep_lng['match_case'] = <<<_P
assunto encontrado
_P;

$tsep_lng['matches'] = <<<_P
resultados.
_P;

$tsep_lng['month_april'] = <<<_P
Abril
_P;

$tsep_lng['month_april_short'] = <<<_P
Abr
_P;

$tsep_lng['month_august'] = <<<_P
Agosto
_P;

$tsep_lng['month_august_short'] = <<<_P
Ago
_P;

$tsep_lng['month_december'] = <<<_P
Dezembro
_P;

$tsep_lng['month_december_short'] = <<<_P
Dez
_P;

$tsep_lng['month_february'] = <<<_P
Fevereiro
_P;

$tsep_lng['month_february_short'] = <<<_P
Fev
_P;

$tsep_lng['month_january'] = <<<_P
Janeiro
_P;

$tsep_lng['month_january_short'] = <<<_P
Jan
_P;

$tsep_lng['month_july'] = <<<_P
Julho
_P;

$tsep_lng['month_july_short'] = <<<_P
Jul
_P;

$tsep_lng['month_june'] = <<<_P
Junho
_P;

$tsep_lng['month_june_short'] = <<<_P
Jun
_P;

$tsep_lng['month_march'] = <<<_P
Março
_P;

$tsep_lng['month_march_short'] = <<<_P
Mar
_P;

$tsep_lng['month_may'] = <<<_P
Maio
_P;

$tsep_lng['month_may_short'] = <<<_P
Mai
_P;

$tsep_lng['month_november'] = <<<_P
Novembro
_P;

$tsep_lng['month_november_short'] = <<<_P
Nov
_P;

$tsep_lng['month_october'] = <<<_P
Outubro
_P;

$tsep_lng['month_october_short'] = <<<_P
Out
_P;

$tsep_lng['month_september'] = <<<_P
Setembro
_P;

$tsep_lng['month_september_short'] = <<<_P
Set
_P;

$tsep_lng['more_than_four'] = <<<_P
Por favor entre uma pesquisa com 4 ou mais caracteres.
_P;

$tsep_lng['mysql_boolean_warning'] = <<<_P
Atenção: Por causa de uma versão antiga da base de dados a pesquisa não utilizou operadorese booleanos. Todas as palavras que você pesquisou devem aparecer no documento para serem encontradas. Operadores de busca não serão utilizados.
_P;

$tsep_lng['name_already_exists'] = <<<_P
o nome já existe
_P;

$tsep_lng['name_is_empty'] = <<<_P
o nome esta vazio!
_P;

$tsep_lng['navigate_one_page_back'] = <<<_P
volta para página anterior
_P;

$tsep_lng['new_index_head'] = <<<_P
Um novo index foi criado!<br>
Abaixo esta uma lista dos arquivos que foram indexados
_P;

$tsep_lng['new_index_head_searching'] = <<<_P
Criando um novo index...<br />Por favor seja paciente...
_P;

$tsep_lng['new_window'] = <<<_P
(nova janela)
_P;

$tsep_lng['no_records'] = <<<_P
Sem resultados
_P;

$tsep_lng['none'] = <<<_P
nenhum
_P;

$tsep_lng['nothing'] = <<<_P
nada
_P;

$tsep_lng['of'] = <<<_P
de
_P;

$tsep_lng['old_index_head'] = <<<_P
Abaixo um lista dos arquivos (ANTIGOS) indexados atualmente na base de dados
_P;

$tsep_lng['only'] = <<<_P
Somente
_P;

$tsep_lng['only_one_value'] = <<<_P
somente um valor!
_P;

$tsep_lng['only_one_word'] = <<<_P
somente uma palavra !
_P;

$tsep_lng['page_file_size'] = <<<_P
Tamanho do arquivo da página:
_P;

$tsep_lng['page_indexed_metawords'] = <<<_P
Palavras de metatag indexadas:
_P;

$tsep_lng['page_indexed_words'] = <<<_P
Palavras indexadas:
_P;

$tsep_lng['page_nr_indexed_words'] = <<<_P
Palavras
_P;

$tsep_lng['page_number'] = <<<_P
Número da página:
_P;

$tsep_lng['page_rank'] = <<<_P
x encontrada
_P;

$tsep_lng['page_rank_help'] = <<<_P
Suas palavras pesquisadas foram encontradas na página com esta frequência
_P;

$tsep_lng['page_rank_real'] = <<<_P
Rank desta página (calculada pelo número de ocorrências da palavra pesquisa no documento)
_P;

$tsep_lng['page_title'] = <<<_P
Título da página:
_P;

$tsep_lng['page_url'] = <<<_P
URL da página:
_P;

$tsep_lng['pages_found'] = <<<_P
páginas foram encontradas.
_P;

$tsep_lng['pages_indexed'] = <<<_P
páginas indexadas
_P;

$tsep_lng['pages_not_to_be_indexed'] = <<<_P
páginas que NÃO serão indexadas
_P;

$tsep_lng['pages_to_be_indexed'] = <<<_P
páginas a serem indexadas
_P;

$tsep_lng['powered_by'] = <<<_P
powered by
_P;

$tsep_lng['protect_indexentry'] = <<<_P
proteger a entrada do index ( de ser refeito ou deletado pelo indexador):
_P;

$tsep_lng['protected_indexentry'] = <<<_P
Protegido da entrada do index
_P;

$tsep_lng['really_delete'] = <<<_P
quer mesmo deletar?
_P;

$tsep_lng['records'] = <<<_P
Registros
_P;

$tsep_lng['rename'] = <<<_P
renomear
_P;

$tsep_lng['results'] = <<<_P
Resultados
_P;

$tsep_lng['results_to_show_user'] = <<<_P
O usuário pode escolher entre os seguintes números de resultados a serem exibidos por página:
_P;

$tsep_lng['save'] = <<<_P
salvar
_P;

$tsep_lng['saveas'] = <<<_P
salvar como
_P;

$tsep_lng['search_tips'] = <<<_P
Dicas de Pesquisa
_P;

$tsep_lng['search_tips_desc'] = <<<_P
O mecanismo de busca TSEP por padrão pesquisa por todas as palavras solicitadas e mostra a página que contém todas as palavras pesquisadas. O número mínimo de caracteres para uma palavra ser pesquisada é 4. A seguir um exemplo de resultado de pesquisa booleana usada no TSEP.
_P;

$tsep_lng['search_tips_ex1'] = <<<_P
busca para a página que contêm ao menos uma destas palavras.
_P;

$tsep_lng['search_tips_ex2'] = <<<_P
busca para a página que contêm ambas as palavras.
_P;

$tsep_lng['search_tips_ex3'] = <<<_P
palavra "maça", melhor classificada se também contiver "macintosh".
_P;

$tsep_lng['search_tips_ex4'] = <<<_P
palavra "maçã" mas não "macintosh"
_P;

$tsep_lng['search_tips_ex5'] = <<<_P
"maça" e "torta", ou "maça" e "strudel"(em qualquer ordem) , mas classifica "torta de maça" melhor que "strudel de maça".
_P;

$tsep_lng['search_tips_ex6'] = <<<_P
"amor", "amores", "amora", and "amoreira". * representa zero ou mais caracteres e pode apenas ser colocado ao final de uma palavra de pesquisa.
_P;

$tsep_lng['search_tips_ex7'] = <<<_P
encontra páginas que contém exatamente a frase "algumas palavras" (por exemplo, páginas que contém "algumas palavras de sabedoria" mas não "algumas palavras rudes").
_P;

$tsep_lng['search_tips_head'] = <<<_P
Dicas para tirar o máximo do TSEP 
_P;

$tsep_lng['search_tips_help'] = <<<_P
abre a ajuda em uma nova janela
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
+maçã +(>torta <strudel)
_P;

$tsep_lng['search_tips_se6'] = <<<_P
amor*
_P;

$tsep_lng['search_tips_se7'] = <<<_P
"algumas palavras"
_P;

$tsep_lng['search_tips_title'] = <<<_P
Dicas de pesquisa
_P;

$tsep_lng['search_took'] = <<<_P
A pesquisa levou
_P;

$tsep_lng['search_what_are_stopwords'] = <<<_P
Uma palavra de pesquisa que é stopword não será pesquisada ou mostrada nos resultados. Além das stopwords a serem definidas pelo usuário existem outras pré-definidas pelo administrador. As stopwords definidas pelo administrador são:
_P;

$tsep_lng['searched_site_for'] = <<<_P
Pesquisado o site para
_P;

$tsep_lng['seconds'] = <<<_P
segundos
_P;

$tsep_lng['separate_values_by_comma'] = <<<_P
separe vários valores ou definições com uma vírgula
_P;

$tsep_lng['show_it'] = <<<_P
Mostra
_P;

$tsep_lng['show_results_per_page'] = <<<_P
Mostra os resultados por página. Cada alteração atualiza a página com novos valores.
_P;

$tsep_lng['show_x_results_per_page'] = <<<_P
/ página
_P;

$tsep_lng['sim_index_head'] = <<<_P
Arquivos a serem indexados.<br />Abaixo uma lista dos arquivos que serão indexados
_P;

$tsep_lng['sim_index_head_searching'] = <<<_P
Pesquisando arquivos...<br />Por favor seja paciente...
_P;

$tsep_lng['skip_cause_protected_indexentry'] = <<<_P
páginas que não serão indexadas (porque são protegidas de acordo com as entradas de index)
_P;

$tsep_lng['sort_asc'] = <<<_P
exibe A -> Z, mais velho -> mais novo
_P;

$tsep_lng['sort_desc'] = <<<_P
exibe Z -> A,  mais novo -> mais velho
_P;

$tsep_lng['start_indexing'] = <<<_P
Iniciar Indexação**
_P;

$tsep_lng['stopwords'] = <<<_P
Stopwords
_P;

$tsep_lng['stopwords_title'] = <<<_P
Stopwords
_P;

$tsep_lng['to'] = <<<_P
para
_P;

$tsep_lng['tsep'] = <<<_P
TSEP - The Search Engine Project
_P;

$tsep_lng['type'] = <<<_P
tipo
_P;

$tsep_lng['update'] = <<<_P
Atualizar
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
** Clique apenas uma vez no botão "Iniciar Indexação e não feche o navegador enquanto a pesquisa não estiver concluida. Não execute diversas instâncias deste indexador.
_P;

$tsep_lng['your_stopwords_head'] = <<<_P
Stopwords válidas <br />(não podem ser pesquisadas e não vão aparecer nos resultados)
_P;

$tsep_lng['config_force_http_fileparse'] = <<<_P
Forçar a análise via HTTP"
_P;

$tsep_lng['config_force_http_fileparse_help'] = <<<_P
Usando "Forçar a análise via HTTP" tem (pelo menos) duas vantagens: conteúdo-SSI é também é analisado e URLs fora do seu foco local também podem ser indexadas (ou seja, arquivos que não podem ser lidos diretamente via abertura local do arquivo). A desvantagem é que o processo de indexeção pode ser tornar extremamente lento!
_P;

$tsep_lng['error_while_parsing'] = <<<_P
Erro(s) na leitura ou na análise.
_P;

$tsep_lng['delete_indexingprofiles_info'] = <<<_P
***ATENÇÃO***:TODOS os indixes dependentes são deletatos também, se eles não estiverem relacionados também a outros perfis de index também.
_P;

$tsep_lng['config_group_indexer_paths'] = <<<_P
Caminhos
_P;

$tsep_lng['config_group_indexer_include_and_exclude'] = <<<_P
Incluir e excluir
_P;

$tsep_lng['config_group_indexer_external_datasupply'] = <<<_P
fonte de dados externa
_P;

$tsep_lng['config_group_indexer_indexing_mode'] = <<<_P
Modalidade de Indexação
_P;

$tsep_lng['config_group_indexer_indexing_modifiers'] = <<<_P
Modificadores de indexação
_P;

$tsep_lng['config_group_indexer_miscellaneous'] = <<<_P
Miscelânea
_P;

$tsep_lng['filter_filterbutton'] = <<<_P
Aplicar filtro
_P;

$tsep_lng['filter_filterbutton_Remove_Filter'] = <<<_P
Remover filtro
_P;

$tsep_lng['filter_logviewtype_all'] = <<<_P
Todos
_P;

$tsep_lng['filter_from'] = <<<_P
De:
_P;

$tsep_lng['filter_to'] = <<<_P
Para:
_P;

$tsep_lng['filter_date_format'] = <<<_P
YYYY-[M]M-[D]D
_P;

$tsep_lng['filter_time_format'] = <<<_P
HH:MM:SS
_P;

$tsep_lng['logviewstats_title'] = <<<_P
Termos de pesquisa e páginas abertas: Estatística
_P;

$tsep_lng['logviewstats_head'] = <<<_P
Logging de Estatística
_P;

$tsep_lng['logviewstats_groupTotals'] = <<<_P
Totais
_P;

$tsep_lng['logviewstats_groupDetails'] = <<<_P
Detalhes
_P;

$tsep_lng['logviewstats_groupTopX'] = <<<_P
Top
_P;

$tsep_lng['logviewstats_groupTopAll'] = <<<_P
Todas entradas
_P;

$tsep_lng['logviewstats_DomainUnresolved'] = <<<_P
Não resolvido
_P;

$tsep_lng['logviewstats_nrRecords'] = <<<_P
Registros de log
_P;

$tsep_lng['logviewstats_nrSetupEntries'] = <<<_P
Instala e atualiza
_P;

$tsep_lng['logviewstats_nrSearchQueries'] = <<<_P
Termos de pesquisa
_P;

$tsep_lng['logviewstats_nrClicks'] = <<<_P
Cliques de resultado
_P;

$tsep_lng['logviewstats_nrDomains'] = <<<_P
Domínios únicos
_P;

$tsep_lng['logviewstats_nrIPs'] = <<<_P
Endereços de IP únicos
_P;

$tsep_lng['logviewstats_nrSearchwords'] = <<<_P
Palavras de pesquisa únicas
_P;

$tsep_lng['logviewstats_nrStopwords'] = <<<_P
Stopwords únicas
_P;

$tsep_lng['logviewstats_topSearchqueries'] = <<<_P
Termos de pesquisa
_P;

$tsep_lng['logviewstats_topClicks'] = <<<_P
Cliques de resultados
_P;

$tsep_lng['logviewstats_topSearchwords'] = <<<_P
Palavras de pesquisa únicas
_P;

$tsep_lng['logviewstats_topStopwords'] = <<<_P
Stopwords únicas
_P;

$tsep_lng['logviewstats_topIPs'] = <<<_P
Endereços de IP únicos
_P;

$tsep_lng['logviewstats_topDomains'] = <<<_P
Domínios únicos
_P;

$tsep_lng['logviewstats_DrillDown'] = <<<_P
Clique aqui para visualizar todas as estatísticas desta subcategoria
_P;

$tsep_lng['error_indexer_is_running'] = <<<_P
O indexador ainda esta trabalhando(ou há algo de errado.<br />Por favor agurarde %d minutos e tente novamente.
_P;

$tsep_lng['warning_php_safe_mode_on'] = <<<_P
<b>Cuidado: o "safe_mode" do PHP esta "ON"</b><br /> O tempo máximo de execução configurado por você na configuração não vai funcionar neste sistema.<br /> PHP é configurado pelo administrador para ser interrompido após %d minutos.
_P;

$tsep_lng['page_additional_info'] = <<<_P
Informações adicionais:
_P;

$tsep_lng['ss_search_term'] = <<<_P
Pesquisa
_P;

$tsep_lng['ss_search_term_hover'] = <<<_P
Termos de pesquisa usados anteriormente
_P;

$tsep_lng['ss_popular'] = <<<_P
Pop
_P;

$tsep_lng['ss_popular_hover'] = <<<_P
Número de vezes que um termo é usado (popularidade)
_P;

$tsep_lng['ss_returned_pages'] = <<<_P
RP
_P;

$tsep_lng['ss_returned_pages_hover'] = <<<_P
Número de páginas obtidas pela pesquisa
_P;

$tsep_lng['error_index_nothing'] = <<<_P
Vazio (nada a ser indexado): �
_P;

$tsep_lng['error_empty_files'] = <<<_P
arquivos vazios (nada a ser indexado)
_P;

$tsep_lng['display_ranking'] = <<<_P
Mostra o ranking com símbolos
_P;

$tsep_lng['ranking_alt'] = <<<_P
Digite um texto alternativo para a imagem
_P;

$tsep_lng['ranking_comments'] = <<<_P
Comentários (internos apenas)
_P;

$tsep_lng['ranking_image_text'] = <<<_P
Por favor defina o arquivo da imagem
_P;

$tsep_lng['ranking_submit'] = <<<_P
Define o símbolo
_P;

$tsep_lng['ranking_delete'] = <<<_P
Deleta o símbolo
_P;

$tsep_lng['ranking_modify'] = <<<_P
@Mudar imagem





_P;

$tsep_lng['help_del_ranking'] = <<<_P
@Você tem certeza que quer deletar esta imagem?
_P;

$tsep_lng['alert_mod_ranking'] = <<<_P
@Você não pode modificar a porcentagem
_P;

$tsep_lng['help_mod_ranking'] = <<<_P
@Você tem certeza que quer mudar esta imagem?
_P;

$tsep_lng['ranking_range'] = <<<_P
Defina um passo para aparecer em porcentagem
_P;

$tsep_lng['ranking_image'] = <<<_P
imagem
_P;

$tsep_lng['ranking_url'] = <<<_P
mostrar (URL)
_P;

$tsep_lng['ranking_com'] = <<<_P
comentários
_P;

$tsep_lng['ranking_alt_attrib'] = <<<_P
atributo HTML ALT
_P;

$tsep_lng['ranking_percent'] = <<<_P
O passo em porcentagem
_P;

$tsep_lng['setup_Rollback_completed'] = <<<_P
Rollback realizado
_P;

$tsep_lng['setup_Unknown'] = <<<_P
Desconhecido
_P;

$tsep_lng['setup_Setup'] = <<<_P
Setup
_P;

$tsep_lng['setup_step1'] = <<<_P
1.Introdução
_P;

$tsep_lng['setup_step2'] = <<<_P
2.Setup do banco de dados
_P;

$tsep_lng['setup_step3'] = <<<_P
3.Verificação do sistema
_P;

$tsep_lng['setup_step4'] = <<<_P
4.Configuração
_P;

$tsep_lng['setup_step5'] = <<<_P
5.Instalação
_P;

$tsep_lng['setup_step6'] = <<<_P
7.Resumo
_P;

$tsep_lng['setup_step7'] = <<<_P
Feedback
_P;

$tsep_lng['setup_CancelButtonPressed'] = <<<_P
Você clicou no botão de cancelar, indicando que você quer interromper a instalação do <span class="tsep">TSEP</span>.<br /><br /> Porque você quer fazer istot? Você já se deu conta do que vai perder com isto? <span class="tsep">TSEP</span> é sem dúvida o melhor mecanismo de busca em toda a internet!!<br /><br /> Tudo bem... Faça com quiser! Mas preste atenção this:<br /><br /> Clicando no botão sair vai interromper a instalção e vai levá-lo para a página do <span class="tsep">TSEP</span> no SourceForge. Qualquer mudança que tenha sido feita no seu site <b>não</b> será desfeita!

_P;

$tsep_lng['setup_IwantToQuit'] = <<<_P
Eu estou seguro disto: Eu quero sair!
_P;

$tsep_lng['setup_Quit'] = <<<_P
Sair
_P;

$tsep_lng['setup_ContinueSetup'] = <<<_P
Continuar com o setup
_P;

$tsep_lng['setup_IwantToContinue'] = <<<_P
Desculpe! Mudei de idéia. Deixe-me continuar...
_P;

$tsep_lng['setup_ToPreviousStep'] = <<<_P
Leve-me para o passo anterior...
_P;

$tsep_lng['setup_Previous'] = <<<_P
Anterior
_P;

$tsep_lng['setup_Next'] = <<<_P
Próximo
_P;

$tsep_lng['setup_ToNextStep'] = <<<_P
Leve-me para o próximo passo...
_P;

$tsep_lng['setup_IWantToQuitInstalling'] = <<<_P
Eu quero interromper a instalação do TSEP.
_P;

$tsep_lng['setup_Cancel'] = <<<_P
Cancelar
_P;

$tsep_lng['select_language'] = <<<_P
Selecione sua língua-TSEP favorita
_P;

$tsep_lng['setup_ThanksForConsidering'] = <<<_P
Obrigado por considerar o uso do <span class="tsep">TSEP</span>.<br /><br /> Você esta instalando o <span class="tsep">TSEP</span>. Este instalador vai levá-lo através do processo de setup ou upgrade do <span class="tsep">TSEP</span>. No lado esquerdo da tela você verá os passos a serem seguidos antes da instalação ser finalizada. Você será capaz de acompanhar o progresso da instalação checando estes passo.<br /><br /> Nós tomamos o cuidado de selecionar as opcões padrão para você. Se esta é a sua primeira instalação, nós sugerimos que você aceite os valores padrões e familiarize-se com os mesmos para aprender como usar o <span class="tsep">TSEP</span>. Se você esta fazendo um upgrade de uma versão antiga do <span class="tsep">TSEP</span> o instalador reconhece suas opções antigas. Você será capaz de copiá-las ou aceitar a novo setup padrão.<br /><br /> Nós esperamos que o <span class="tsep">TSEP</span> seja uma valiosa ferramenta para o seu site.<br /> Caso você tenha algum comentário ou sugestão, por favor contate-nos através do Forum <a href="http://sourceforge.net/projects/tsep/" target="blank">SourceForge site</a>.<br /><br /> O Time <span class="tsep">TSEP</span> Team<br />
_P;

$tsep_lng['setup_DB_1'] = <<<_P
Por favor insira os dados que o <span class="tsep">TSEP</span> necessita para acessar o seu banco de dados e scripts.
_P;

$tsep_lng['setup_DB_2_Host'] = <<<_P
Servidor do banco de dados:
_P;

$tsep_lng['setup_DB_2_Host_Help'] = <<<_P
Digite a URL do servidor MySQL. Na maioria dos casos é \'localhost\'.<br /><br />Se você não sabe aceite o valor padrão.
_P;

$tsep_lng['setup_DB_3_Username'] = <<<_P
Nome do usuário do banco de dados
_P;

$tsep_lng['setup_DB_3_Username_Help'] = <<<_P
O nome do usuário que você usa para logar no MySQL.
_P;

$tsep_lng['setup_DB_4_Passwd'] = <<<_P
Senha do banco de dados:
_P;

$tsep_lng['setup_DB_4_Passwd_Help'] = <<<_P
A senha que você usa para o nome de usuário acima.
_P;

$tsep_lng['setup_DB_5_DBName'] = <<<_P
Nome do banco de dados:
_P;

$tsep_lng['setup_DB_5_DBName_Help'] = <<<_P
Qual é o nome do banco de dados que você criou para o TSEP?
_P;

$tsep_lng['setup_DB_6_ForceCreation'] = <<<_P
Força a criação do banco de dados:
_P;

$tsep_lng['setup_DB_6_ForceCreation_Help'] = <<<_P
Se você diz SIM o setup vai tentar criar um banco de dados para você.<br /><br />Se o banco de dados já existir o setup vai deixá-lo com esta e seguirá com a o processo.
_P;

$tsep_lng['setup_Yes'] = <<<_P
Sim
_P;

$tsep_lng['setup_No'] = <<<_P
Não
_P;

$tsep_lng['setup_DB_7_Prefix'] = <<<_P
Prefixo da tabela a ser usado:
_P;

$tsep_lng['setup_DB_7_Prefix_Help'] = <<<_P
Se o seu servido web permite apenas um banco de dados, você poderá ter certeza que o banco de dados será único acrescentando um prefixo aqui.<br /><br />Se você não sabe aceite o valor padrão.
_P;

$tsep_lng['setup_DB_8_TSEP_Root'] = <<<_P
Raiz do diretório <span class="tsep">TSEP</span> :
_P;

$tsep_lng['setup_DB_8_TSEP_Root_Help'] = <<<_P
Raiz do diretório TSEP, relativo à raiz do seu documento.<br /><br />Isto esta provavelmente correto. Se você não sabe o nome do diretório aceite o valor padrão.
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath'] = <<<_P
Caminho absoluto da raiz do diretório do <br /><span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_DB_9_TSEP_AbsPath_Help'] = <<<_P
Caminho absoluto para o diretório do TSEP.<br /><br />Se você não sabe o nome do diretório aceite o valor padrão.
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath'] = <<<_P
Caminho absoluto para diretório temporário do <br /><span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_DB_10_TSEP_TmpPath_Help'] = <<<_P
O caminho absoluto para diretório temporário do TSEP.<br /><br />Deve possuir permissão para gravar.
_P;

$tsep_lng['setup_UnknownDBHost'] = <<<_P
Você especificou um servidor de banco de dados inválido.<br />Por favor verifique esta informação e submeta novamente.
_P;

$tsep_lng['setup_NoDBAccess'] = <<<_P
Acesso ao banco de dados negado.<br />Isto significa que o nome do usuário e/ou a senha são inválidos.
_P;

$tsep_lng['setup_ConnectionDenied'] = <<<_P
Há um erro desconhecido ao tentar conectar ao MySQL<br />Você tem certeza de que a configuração do MySQL esta correta?<br />Os parâmetros abaixo estão corretos?
_P;

$tsep_lng['setup_DBNotExists'] = <<<_P
O banco de dados que você especificou não existe<br />e eu não posso criá-lo para você.
_P;

$tsep_lng['setup_DBNameWrong'] = <<<_P
O nome do banco de dados que você especificou não esta correto<br />(banco de dados inexistente).
_P;

$tsep_lng['setup_DBUnknownError'] = <<<_P
Há um erro desconhecido ao tentar conectar com a base de dados<br />Você tem certeza de que a configuração do MySQL esta correta?<br />Os parâmetros abaixo estão corretos?
_P;

$tsep_lng['setup_TSEPRootWrong'] = <<<_P
A raiz do diretório do TSEP não esta correta.
_P;

$tsep_lng['setup_TSEPAbsPathWrong'] = <<<_P
O caminho absoluto para a raiz do diretório do TSEP não esta correto.
_P;

$tsep_lng['setup_TSEPTmpPathWrong'] = <<<_P
O caminho absoluto para o diretório temporário do TSEP não existe ( mkdir() não é possível)
_P;

$tsep_lng['setup_TSEPTmpPathNotWritable'] = <<<_P
O caminho absoluto para o diretório temporário do TSEP: incapaz de gravar no diretório
_P;

$tsep_lng['setup_HTAccessNotFound'] = <<<_P
.htaccess não foi encontrado
_P;

$tsep_lng['setup_OK'] = <<<_P
ok
_P;

$tsep_lng['setup_NoProtectionFound'] = <<<_P
A cláusula de proteção não foi encontrada
_P;

$tsep_lng['setup_Global_1'] = <<<_P
<b>Importante:</b> Você precisa seguir este passo apenas se o setup não for capaz de escrever a conexão do banco de dados para o arquivo  "/include/global.php".<br />
_P;

$tsep_lng['setup_Global_2'] = <<<_P
Por favor siga corretamente os passos seguintes para corrigir o arquivo global.php atual.<br />
_P;

$tsep_lng['setup_Global_3'] = <<<_P
Copie os dados no frame a seguir.
_P;

$tsep_lng['setup_Global_3s1'] = <<<_P
Abra o arquivo "/include/global.php" no seu disco rígido.
_P;

$tsep_lng['setup_Global_3s21'] = <<<_P
Substitua o código entre os placeholders
_P;

$tsep_lng['setup_and'] = <<<_P
e
_P;

$tsep_lng['setup_Global_3s22'] = <<<_P
,assegure-se de que você não substituiu as linhas dos próprios placeholders mas apenas as linhas entre eles.
_P;

$tsep_lng['setup_Global_3s3'] = <<<_P
Salve o arquivo.
_P;

$tsep_lng['setup_Global_3s4'] = <<<_P
Faça o upload do arquivo para o diretório /include do seu website sobrescrevendo o arquivo antigo.
_P;

$tsep_lng['setup_Global_3s5'] = <<<_P
Clique no botão "Próximo" no final desta página.
_P;

$tsep_lng['setup_Global_4'] = <<<_P
Se tudo correu bem você será capaz de continuar com o setup e instalar corretamente o <span class="tsep">TSEP</span> .<br />
_P;

$tsep_lng['setup_patch_manually'] = <<<_P
corrigir manualmente
_P;

$tsep_lng['setup_patch_manually_help'] = <<<_P
Se o setup não salvou os dados da conexão, por favor clique aqui e siga as instruções.
_P;

$tsep_lng['setup_warning'] = <<<_P
cuidado
_P;

$tsep_lng['setup_SysChk_1'] = <<<_P
A verificação do sistema revelou a seguinte informação. Por favor verifique cuidadosamente e corrija aonde for necessário.<br />
_P;

$tsep_lng['setup_MySQL_version'] = <<<_P
Versão do MySQL:
_P;

$tsep_lng['setup_MySQL_version_Help'] = <<<_P
A versão do MySQL que você esta utilizando deve ser v3.23 ou superior, para usufruir de todas as características avançadas do TSEP.<br /><br />Se você quer tirar o máximo do TSEP utilize a versão 4.1 ou superior.<br /><br />Nós não podemos garatir um funcionamento apropriado com versões mais antigas.
_P;

$tsep_lng['setup_PHP_version'] = <<<_P
Versão do PHP:
_P;

$tsep_lng['setup_PHP_version_Help'] = <<<_P
TSEP foi testado com as versões 4.2 e superiores do PHP.<br /><br />Nós não podemos garatir um funcionamento apropriado com versões mais antigas.
_P;

$tsep_lng['setup_TSEP_oldver'] = <<<_P
Versão antiga do <span class="tsep">TSEP</span> :
_P;

$tsep_lng['setup_TSEP_oldver_Help'] = <<<_P
Isto é apenas uma informação.<br/><br/>Mostra a versão TSEP que você esta atualizando (se presente).
_P;

$tsep_lng['setup_TSEP_newver'] = <<<_P
Versão nova do <span class="tsep">TSEP</span> :
_P;

$tsep_lng['setup_TSEP_newver_Help'] = <<<_P
Isto é apenas uma informação.<br/><br/>Mostra a versão do TSEP que você esta instalando agora.
_P;

$tsep_lng['setup_DB_Config_File'] = <<<_P
Arquivo de config do banco de dados:
_P;

$tsep_lng['setup_DB_Config_File_Help_1'] = <<<_P
O arquivo que contém os dados da conexão devem permitir gravar para que o setup funcione corretamente.
_P;

$tsep_lng['setup_DB_Config_File_Help_2'] = <<<_P
Por favor chmod o arquivo \'include/global.php\' para \'666\'.<br /><br />Se o arquivo não permitir gravar você deve continuar clicando no PRÓXIMO. Setup tentará configurar as propriedados do arquivo para gravar.<br /><br />Se ele falhar você deve usar o link de download para obter as configurações corretas. Por favor siga as instruções da página de download.
_P;

$tsep_lng['setup_DB_Config_File_Writable'] = <<<_P
Gravável
_P;

$tsep_lng['setup_DB_Config_File_UnWritable'] = <<<_P
Não gravável
_P;

$tsep_lng['setup_PHPSafeMode'] = <<<_P
Modo de segurança do PHP
_P;

$tsep_lng['setup_PHPSafeMode_Help'] = <<<_P
Se o safe_mode do PHP estiver <b>ON</b> algumas propriedades do TSEP podem não funcionar.<br /><br />Isto não é crítico. Se você não tem uma boa razão para mudar a configuração, simplesmente deixe como esta.
_P;

$tsep_lng['setup_On'] = <<<_P
On
_P;

$tsep_lng['setup_Off'] = <<<_P
Off
_P;

$tsep_lng['setup_Admin_area_security'] = <<<_P
Área de segurança do Admin:
_P;

$tsep_lng['setup_Admin_area_security_Help'] = <<<_P
Você deve proteger a área do admin com uma senha usando o arquivo <i>.htaccess</i> (se você estiver usando o Apache).<br /><br />Se você não protegeu a área do admin qualquer pessoa poderá mudar as suas configurações.
_P;

$tsep_lng['setup_Protected'] = <<<_P
Protegido
_P;

$tsep_lng['setup_Include_dir_security'] = <<<_P
Inclui um diretório de segurança:
_P;

$tsep_lng['setup_Include_dir_security_Help'] = <<<_P
Você deve proteger o diretório include usando o arquivo <i>.htaccess</i> (se você estiver usando o Apache).<br /><br />Não proteger o diretório do include é um risco porque o seu nome de usuário e senha estão armazenados aqui.
_P;

$tsep_lng['setup_DBcfgUnwriteable'] = <<<_P
O arquivo config do banco de dados não é gravável.<br />Por favor clique >corrigir manualmente< para resolver o problema.
_P;

$tsep_lng['setup_UpdateOrFresh'] = <<<_P
Setup necessita sua decisão nas questões a seguir. Estas configurações determinam o que será copiado da versão antiga para a nova versão(se aplicável)<br />
_P;

$tsep_lng['setup_Fresh'] = <<<_P
Instalação nova (com os valores padrões):
_P;

$tsep_lng['setup_Fresh_Help'] = <<<_P
Se você deseja instalar uma nova cópia do TSEP com apenas os valores padrões, escolhar esta opção para <b>SIM</b>. Setup ignorará qualquer configuração, perfil, etc. e instalará um TSEP novinho em folha.
_P;

$tsep_lng['setup_Update'] = <<<_P
Atualizado da versão antiga:
_P;

$tsep_lng['setup_Update_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar suas configurações selecione <b>SIM</b>. Neste caso o prefixo da tabela da versão antiga e da versão nova devem ser iguais.<br /><br />Se você esta instalando uma nova versão do TSEP ou se você não quer sobrescrever as tabelas antigas você deve selecionar <b>NÃO</b>. Certifique-se que o prefixo da tabela é único!
_P;

$tsep_lng['setup_CopyOld'] = <<<_P
Copia a configuração antiga:
_P;

$tsep_lng['setup_CopyOld_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar suas antigas <u>configurações</u> selecione <b>SIM</b>.<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_CopyOldProfiles'] = <<<_P
Copia os perfis antigos:
_P;

$tsep_lng['setup_CopyOldProfiles_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar seus antigos <u>perfis</u> selecione <b>SIM</b>.<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_CopyOldIndexes'] = <<<_P
Copia os indexes antigos:
_P;

$tsep_lng['setup_CopyOldIndexes_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar seus antigos <u>indexes</u> selecione <b>SIM</b>.<br /><br />Se você quer copiar os indexes você tem de copias os perfis também!<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_CopyOldStopwords'] = <<<_P
Copia as stopwords antigas:
_P;

$tsep_lng['setup_CopyOldStopwords_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar suas antigas <u>stopwords</u> selecione <b>SIM</b>.<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_CopyOldLogs'] = <<<_P
Copia os logs antigos:
_P;

$tsep_lng['setup_CopyOldLogs_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar seus antigos <u>logs</u> selecione <b>SIM</b>.<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_CopyOldRankSymbols'] = <<<_P
Copia os rank symbols antigos:
_P;

$tsep_lng['setup_CopyOldRankSymbols_Help'] = <<<_P
Se você esta atualizando o TSEP e quer preservar seus antigos <u>rank symbols</u> selecione <b>SIM</b>.<br /><br />Funciona apenas se o \'<i>Atualizar</i>\' estiver em SIM.
_P;

$tsep_lng['setup_IndicateNoUpdate'] = <<<_P
Você indicou que não quer fazer uma atualização do sistema antigo<br />mas você espeficou um prefixo de tabela que é o mesmo do que já esta em uso.

_P;

$tsep_lng['setup_IndicateUpdate'] = <<<_P
Você indicou que quer fazer uma atualização do sistema antigo<br />mas você espeficou um prefixo de tabela que é diferente do que já esta em uso.
_P;

$tsep_lng['setup_Fatal_Error'] = <<<_P
Erro fatal:
_P;

$tsep_lng['setup_Saving_old_tables'] = <<<_P
Salvando as tabelas antigas
_P;

$tsep_lng['setup_Can_not_open'] = <<<_P
Não pode abrir
_P;

$tsep_lng['setup_Can_not_write_to'] = <<<_P
Não pode gravar
_P;

$tsep_lng['setup_Copying_settings'] = <<<_P
Copiando as configurações
_P;

$tsep_lng['setup_Copying_indexes'] = <<<_P
Copiando os indexes
_P;

$tsep_lng['setup_Copying_profile2index_links'] = <<<_P
Copiando os links perfil-para-index
_P;

$tsep_lng['setup_Copying_profiles'] = <<<_P
Copiando os perfis
_P;

$tsep_lng['setup_Copying_log_entries'] = <<<_P
Copiando os logs de entrada
_P;

$tsep_lng['setup_Copying_log_hits'] = <<<_P
Copiando os logs de hit
_P;

$tsep_lng['setup_Copying_stopwords'] = <<<_P
Copiando as stopwords`
_P;

$tsep_lng['setup_Copying_rank_symbols'] = <<<_P
Copiando os rank symbols
_P;

$tsep_lng['setup_Congratulations'] = <<<_P
Parabéns! A instalação foi realizada com sucesso.
_P;

$tsep_lng['setup_Continue2Summary'] = <<<_P
Por favor continue até a tela de resumo.
_P;

$tsep_lng['setup_PerformingInstallOfVer'] = <<<_P
Setup esta realizando a instalação do <span class=\"tsep\">TSEP</span> versão
_P;

$tsep_lng['setup_DoNotInterrupt'] = <<<_P
Por favor não interrompa o este processo: se você interromper vai ocasionar um erro na configuração.<br />
_P;

$tsep_lng['setup_Progress'] = <<<_P
Progresso:
_P;

$tsep_lng['setup_Deleting_old_tables'] = <<<_P
Deletando as tabelas antigas
_P;

$tsep_lng['setup_Creating_new_tables'] = <<<_P
Criando as novas tabelas
_P;

$tsep_lng['setup_Populating_new_tables'] = <<<_P
Preenchendo as novas tabelas
_P;

$tsep_lng['setup_FinishedInstalling'] = <<<_P
Você terminou a instalação do <span class="tsep">TSEP</span> versão
_P;

$tsep_lng['setup_Summary_of_installation'] = <<<_P
Resumo da instalação
_P;

$tsep_lng['setup_Settings'] = <<<_P
Configurações:
_P;

$tsep_lng['setup_records_copied'] = <<<_P
registros copiados
_P;

$tsep_lng['setup_records_copied_Zero'] = <<<_P
0 arquivos copiados
_P;

$tsep_lng['setup_Not_selected_for_update'] = <<<_P
Não selecionado para update
_P;

$tsep_lng['setup_Profiles'] = <<<_P
Perfis:
_P;

$tsep_lng['setup_Indexes'] = <<<_P
Indexes:
_P;

$tsep_lng['setup_Stopwords'] = <<<_P
Stopwords:
_P;

$tsep_lng['setup_Logs'] = <<<_P
Logs:
_P;

$tsep_lng['setup_Ranksymbols'] = <<<_P
Rank symbols:
_P;

$tsep_lng['setup_Important'] = <<<_P
Importante:
_P;

$tsep_lng['setup_Important_Delete'] = <<<_P
Por favor lembre-se de <u>proteger</u> a <u>área do admin</u> e <u>o diretório include</u> se é que você não fez isto ainda. Também <u>delete</u> o arquivo <u>/admin/setup.php</u> de forma que sua configuração não possa ser modificada por hackers mal intencionados.
_P;

$tsep_lng['setup_TakeMe2Config'] = <<<_P
Leve me para a configuração...
_P;

$tsep_lng['setup_Finish'] = <<<_P
Fim
_P;

$tsep_lng['setup_Steps_1'] = <<<_P
Introdução
_P;

$tsep_lng['setup_Steps_2'] = <<<_P
Configuração do banco de dados
_P;

$tsep_lng['setup_Steps_3'] = <<<_P
Análise do sistema
_P;

$tsep_lng['setup_Steps_4'] = <<<_P
Configuração
_P;

$tsep_lng['setup_Steps_5'] = <<<_P
Instalação
_P;

$tsep_lng['setup_Steps_6'] = <<<_P
Resumo
_P;

$tsep_lng['setup_Steps_7'] = <<<_P
Feedback
_P;

$tsep_lng['setup_NoURL2Preview'] = <<<_P
Sem URL para ser mostrada
_P;

$tsep_lng['setup_BeforeFinish'] = <<<_P
Antes de você terminar
_P;

$tsep_lng['setup_BeforeCancel'] = <<<_P
Antes de você cancelar
_P;

$tsep_lng['setup_cancelText1'] = <<<_P
Nós adorariamos receber alguns dados estatísticos. Os dados envio dos dados é opcional e totalmente anônimo. A lista abaixo mostra os dados que gostaríamos de receber. Você pode selecionar quais os dados a serem enviados, ou pode simplesmente decidir por não enviar dado algum.
_P;

$tsep_lng['setup_cancelText2'] = <<<_P
Escolhendo enviar os dados você estará ajudando no desenvolvimento do TSEP, e será transferido para o www.tsep.info aonde os dados são submetidos ao banco de dados.
_P;

$tsep_lng['setup_finishText1'] = <<<_P
Nós gostaríamos receber algum dado estatístico anônimo. O envio de dados é completamente anônimo e opcional. A lista a seguir mostra os dados que gostaríamos de coletar. Você pode selecionar qual dado quer enviar, ou decidir não enviar dado algum.
_P;

$tsep_lng['setup_finishText2'] = <<<_P
Você pode escolher os dados a serem submetidos e desta maneira ajudar no desenvolvimento do TSEP. Primeiramente você será transferido para <a href=\"http://www.tsep.info\" target=\"blank\">www.tsep.info</a>, aonde os dados devem ser submetidos. Depois você será levado automaticamente para a tela de configuração do seu siteweb para começar a trabalhar com o <span class=\"tsep\">TSEP</span>.<br />
_P;

$tsep_lng['setup_finishText3'] = <<<_P
Observe que se você decidir enviar os dados a sua URL será transmitida mesmo que você selecione não submeter. Isto é porque nós precisamos saber para onde enviar após escrever os dados estatísticos. Neste caso sua URL não será logada!
_P;

$tsep_lng['setup_finishText4'] = <<<_P
Se você decidir não enviar dado algum, você será automaticamente levado à tela de configuração sem conectar à página do <span class=\"tsep\">TSEP</span> homepage.<br />Em amos os casos a próxima tela à qual você será levado é a tela de configuração da instalação do <span class=\"tsep\">TSEP</span>
_P;

$tsep_lng['setup_Let_TSEP_Team_know'] = <<<_P
Isto nos permitirá saber que você instalou o TSEP com sucesso.
_P;

$tsep_lng['setup_Let_TSEP_Team_know_Help'] = <<<_P
Isto nos permitirá saber que você instalou o TSEP com sucesso.
_P;

$tsep_lng['setup_Let_TSEP_Team_know2'] = <<<_P
Deixe-nos saber porque você cancelou a instalação do <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_Let_TSEP_Team_know2_Help'] = <<<_P
Isto nos permitirá saber que você cancelou a instalação do TSEP.
_P;

$tsep_lng['setup_NewVersion'] = <<<_P
Versão nova do <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_NewVersion_Help'] = <<<_P
Esta é a versão do TSEP que você acabou de instalar.
_P;

$tsep_lng['setup_OldVersion'] = <<<_P
Versão antiga do <span class="tsep">TSEP</span>:
_P;

$tsep_lng['setup_OldVersion_Help'] = <<<_P
A versão do TSEP que você acaba de substituir(se aplicável).
_P;

$tsep_lng['setup_Referer'] = <<<_P
Log sua referência:
_P;

$tsep_lng['setup_Referer_Help'] = <<<_P
O domínio do seu siteweb. Nós gostaríamos de gravar e se possível fazer um screenshot do seu site em ação.<br /><br />Observe que se você selecionar qualquer outra opção a sua URL será transmitida para nosso site. Isto não significa que nós tenhamos logado. Se você selecionar a opção <b>NO</b> nós <b>não</b> a armazenaremos em nossa base de dados.
_P;

$tsep_lng['setup_NewsLetter'] = <<<_P
Se inscrever na nossa newsletter:
_P;

$tsep_lng['setup_NewsLetter_Help'] = <<<_P
Se você deseja se inscrever na nossa newsletter para se manter atualizado sobre as novidade do TSEP basta colocar seu endereço de e-mail aqui.<br /><br/>Se você não estiver interessado basta deixar este campo em branco.<br /><br />Nota: Para se desinscrever vá até nosso site. Este campo funciona apenas para inscrições.
_P;

$tsep_lng['setup_Comment'] = <<<_P
Comentários:
_P;

$tsep_lng['setup_Comment_Help'] = <<<_P
Se você tem algo a acrescentar que possa nos ajuda, por favor coloque seu comentário aqui.
_P;

$tsep_lng['setup_Why_Aborted'] = <<<_P
Motivo para cancelar:
_P;

$tsep_lng['setup_Why_Aborted_Help'] = <<<_P
Nós sinceramente gostaríamos de saber porque você cancelou a instalação. Seus comentários nos ajudarão a adaptar o TSEP para satisfazer suas necessidades.
_P;

$tsep_lng['setup_URLPreview'] = <<<_P
A URL que enviaremos:
_P;

$tsep_lng['setup_JavaScriptEnabled'] = <<<_P
O JavaScript deve estar funcionando para que este preview funcione.
_P;

$tsep_lng['indexer_started_indexer'] = <<<_P
Iniciador do index.
_P;

$tsep_lng['indexer_started_searching'] = <<<_P
Pesquisando arquivos...
_P;

$tsep_lng['indexer_started_building'] = <<<_P
Construindo o index (para %d arquivos)...
_P;

$tsep_lng['XdirName_wrongpath'] = <<<_P
O diretório de início do index não existe: <b>%s</b>
_P;

$tsep_lng['contentimgs'] = <<<_P
ImagensIndice
_P;

$tsep_lng['contentimg'] = <<<_P
IndiceImagem
_P;

$tsep_lng['contentimgs_not_used'] = <<<_P
IndiceImagens
_P;

$tsep_lng['contentimg_defaultimage'] = <<<_P
IndiceImagem (imagem padrão usada)
_P;

$tsep_lng['contentimg_url_assoc_image'] = <<<_P
IndiceImagem (imagem associada à página)
_P;

$tsep_lng['contentimg_filelists'] = <<<_P
Lista de arquivos IndiceImagem
_P;

$tsep_lng['contentimg_filelist'] = <<<_P
Listas de arquivos IndiceImagem
_P;

$tsep_lng['contentimg_filelists_descr'] = <<<_P
Escolha uma ação em uma das listas de arquivo de indexador de IndiceImagem existente:<br /> - clique com o botão esquerdo no nome do link para ver o arquivo(abrirá em uma nova janela)</br> - clique com o botão direito no nome do link para salvar (download) o arquivo para uma ação posterir<br /> - delete este arquivo<br /> - transforme o arquivo 
_P;

$tsep_lng['contentimg_filelist_rebuild'] = <<<_P
Cria manualmente a lista de arquivo IndiceImagem, para as páginas atualmente indexadas
_P;

$tsep_lng['contentimg_filelist_autobuild'] = <<<_P
automaticamente criado pelo indexador
_P;

$tsep_lng['contentimg_filelist_manuallybuilt'] = <<<_P
manualmente criado(perfil-indexação '%s', para '%d'
_P;

$tsep_lng['for_iprofile'] = <<<_P
para o perfil de indexação
_P;

$tsep_lng['all_pages'] = <<<_P
todas as páginas
_P;

$tsep_lng['pages_having_no_contentimg'] = <<<_P
páginas que não possuem ConteúdoImagem
_P;

$tsep_lng['currently_experimental'] = <<<_P
(atualmente EXPERIMENTAL)
_P;

$tsep_lng['modified_created'] = <<<_P
modificado/criado em
_P;

$tsep_lng['configure'] = <<<_P
Configure
_P;

$tsep_lng['name'] = <<<_P
Nome
_P;

$tsep_lng['manage'] = <<<_P
Gerencie
_P;

$tsep_lng['comment'] = <<<_P
comente
_P;

$tsep_lng['upload'] = <<<_P
Upload
_P;

$tsep_lng['upload_complete'] = <<<_P
Upload concluído!
_P;

$tsep_lng['delete_complete'] = <<<_P
Arquivo deletado com sucesso!
_P;

$tsep_lng['err_deleting_file'] = <<<_P
Falha ao deletar arquivo!
_P;

$tsep_lng['err_fopen_append'] = <<<_P
Erro ao abrir arquivo adicionado: %s
_P;

$tsep_lng['err_fwrite'] = <<<_P
Erro gravando arquivo %s
_P;

$tsep_lng['stat_indexer_wrote_contentimg'] = <<<_P
%s registro gravado para a lista de arquivo de ConteúdoImagem %s
_P;

$tsep_lng['stat_indexer_nowrite_contentimg'] = <<<_P
Nada foi gravado para a list de arquivo de ConteúdoImagen: %s
_P;

$tsep_lng['back'] = <<<_P
voltar
_P;

$tsep_lng['contentimg_filelistTF'] = <<<_P
Transformação da lista de arquivo de ConteúdoImagem %d
_P;

$tsep_lng['close'] = <<<_P
fechar
_P;

$tsep_lng['run'] = <<<_P
Executar
_P;

$tsep_lng['destdirectory_does_not_exist'] = <<<_P
Diretório de destino inexistente
_P;

$tsep_lng['directory_does_not_exist'] = <<<_P
Diretório inexistente
_P;

$tsep_lng['file_does_not_exist'] = <<<_P
Arquivo inexistente
_P;

$tsep_lng['not_defined_in_databse'] = <<<_P
%s não definida (vazio) no banco de dados
_P;

$tsep_lng['err_upload_err_ini_size'] = <<<_P
Tamanho do arquivo php.ini excede a definição do tamanho máximo de arquivo para upload do %s 
_P;

$tsep_lng['err_upload_err_form_size'] = <<<_P
Tamanho do arquivo excede o tamanho máximo do arquivo do %d
_P;

$tsep_lng['err_upload_err_partial'] = <<<_P
Upload imcompleto do arquivo
_P;

$tsep_lng['err_upload_err_no_file'] = <<<_P
Upload não realizado
_P;

$tsep_lng['err_upload_err_undefined'] = <<<_P
Upload concluído com erro no número %d
_P;

$tsep_lng['err_upload_mimetype'] = <<<_P
Mimetype errado do arquivo de upload: %s
_P;

$tsep_lng['err_upload_zerosize'] = <<<_P
Tamanho do arquivo que sofreu upload = 0 (provável erro no nome do arquivo)
_P;

$tsep_lng['err_upload_moving_tmpfile'] = <<<_P
Erro no upload enquanto movia o arquivo temporário (possívelmente o diretório de destino não tem permissão de gravação)
_P;

$tsep_lng['destinationfile'] = <<<_P
Arquivodestino
_P;

$tsep_lng['send_this_file'] = <<<_P
Envie este arquivo
_P;

$tsep_lng['delete_this_file'] = <<<_P
Delete este arquivo
_P;

$tsep_lng['wrong_fileext'] = <<<_P
Extensão de arquivo errada:%s
_P;

$tsep_lng['fileext_mismatch'] = <<<_P
Extensão de arquivo %s fornecida ao envés do %s
_P;

$tsep_lng['config_group_configcontentimg_basicdefs'] = <<<_P
Definições básicas
_P;

$tsep_lng['config_configcontentimg_mode'] = <<<_P
Utilize o IndiceImages
_P;

$tsep_lng['config_configcontentimg_mode_help'] = <<<_P
Mude on/OFF para utilizar o IndiceImagens na sua instalação do TSEP. Mudando para OFF, NÃO REMOVE QUALQUER ARQUIVO DE IMAGEM!
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_paths'] = <<<_P
Caminhos
_P;

$tsep_lng['config_group_configcontentimg_basicdefs_image'] = <<<_P
Imagens
_P;

$tsep_lng['config_configcontentimg_webpath'] = <<<_P
Caminho-Imagem para o Acesso-Web
_P;

$tsep_lng['config_configcontentimg_webpath_help'] = <<<_P
Caminho para imagem absoluto, aonde o IndiceImagens pode ser encontrando enquanto mostra a página resultados (equivalente ao caminho-imagem para o Acesso-PHPscript)
_P;

$tsep_lng['config_configcontentimg_abspath'] = <<<_P
Caminho-Imagens para o Acesso-PHPscript
_P;

$tsep_lng['config_configcontentimg_abspath_help'] = <<<_P
Caminho absoluto (físico) para o diretório-imagem, que estará acessível via script-php (equivalente ao caminho-imagem para Acesso-Web)
_P;

$tsep_lng['config_configcontentimg_webpath_flists'] = <<<_P
Caminho raiz para a Lista de Arquivo IndiceImagem para Acesso-Web
_P;

$tsep_lng['config_configcontentimg_webpath_flists_help'] = <<<_P
Caminho absoluto para o diretório, aonde o arquivo da lista do ImagemIndice e transformações são gerados para. O arquivo modelo da lista de Transformação do ImagemIndice deve estar localizado em subdiretório chamado 'transformation_templates'. Mais sobre Lista de arquivo de ImagemIndice - e - configuração da transformação a seguir.
_P;

$tsep_lng['config_configcontentimg_abspath_flists'] = <<<_P
Raiz do caminho para a Lista do Arquivo de ImagemIndice para o PHPscript-Acess
_P;

$tsep_lng['config_configcontentimg_abspath_flists_help'] = <<<_P
Caminho absoluto para o diretório, aonde o arquivo da lista do ImagemIndice e transformações são gerados para. O arquivo modelo da lista de Transformação do ImagemIndice deve estar localizado em subdiretório chamado 'transformation_templates'. Mais sobre Lista de arquivo de ImagemIndice - e - configuração da transformação a seguir.
_P;

$tsep_lng['config_configcontentimg_imageext'] = <<<_P
Extensão do nome do arquivo de imagem (<b>não modifique</b>, se a imagem já existe!)
_P;

$tsep_lng['config_configcontentimg_imageext_help'] = <<<_P
Preferencialmente utilize '.jpeg', '.jpg' or '.png'. NÃO MODIFIQUE, se as imagens já existirem, porque estas imagens não serão mais encontradas!!
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage'] = <<<_P
Imagem padrão
_P;

$tsep_lng['config_configcontentimg_FnDefaultImage_help'] = <<<_P
Esta imagem é usada, se o IndiceImagens deve ser mostrado, mas nehuma imagem foi definida para a página encontrada. Se você definir a imagem padrão, mas próximo de captar a 'imagem padrão' você ver o nome do arquivo de imagem ao envés de da imagem em si, é porque o nome do arquivo e/ou diretório estão errados.
_P;

$tsep_lng['config_configcontentimg_maxX'] = <<<_P
largura máxima a ser exibida
_P;

$tsep_lng['config_configcontentimg_maxX_help'] = <<<_P
Define a largura máxima a ser exibida em pixel do IndiceImagem. Para manter a relação, a largura real usada pode ser menor( dependendo da geometria da imagem e da altura máxima definida). Imagens que são menores que a largura e/ou alturas máximas a serem exibidas não serão modificadas.
_P;

$tsep_lng['config_configcontentimg_maxY'] = <<<_P
altura máxima a ser exibida
_P;

$tsep_lng['config_configcontentimg_maxY_help'] = <<<_P
Define a altura máxima a ser exibida em pixel do IndiceImagem. Para manter a relação, a altura real usada pode ser menor( dependendo da geometria da imagem e da altura máxima definida). Imagens que são menores que a largura e/ou alturas máximas a serem exibidas não serão modificadas.
_P;

$tsep_lng['config_group_configcontentimg_indexer'] = <<<_P
Configurações do Indexador
_P;

$tsep_lng['config_configcontentimg_create_flists'] = <<<_P
O indexador deve criar a lista de arquivos IndiceImagem
_P;

$tsep_lng['config_configcontentimg_create_flists_help'] = <<<_P
Se esta opção não estiver selecionada, o indexador não criará a lista de Arquivo de IndiceImagem. ATENÇÃO: também [e possível criar a lista de Arquivo de IndiceImagem manualmente.
_P;

$tsep_lng['config_configcontentimg_having_no_contentimg'] = <<<_P
Apenas para páginas que possuem o IndiceImagem

_P;

$tsep_lng['config_configcontentimg_having_no_contentimg_help'] = <<<_P
Apenas uma entrada para a lista de arquivo de IndiceImagem é gravada, se não existir IndiceImagem para a página indexada.
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans'] = <<<_P
Automaticamente executa a transformação
_P;

$tsep_lng['config_configcontentimg_autorun_flisttrans_help'] = <<<_P
Se esta opção  estiver selecionada, transformação é executado automaticamente após a indexação. ( o 'indexador deve criar a lista de arquivos IndiceImagem' também deve estar selecionado!)
_P;

$tsep_lng['config_group_configcontentimg_extdefs'] = <<<_P
Definiçõe extendidas
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flists'] = <<<_P
Listas de arquivo de IndiceImagem
_P;

$tsep_lng['config_group_configcontentimg_extdefs_fliststrans'] = <<<_P
Tranformações
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans1'] = <<<_P
Transformação 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename'] = <<<_P
Nome do arquivo modelo
_P;

$tsep_lng['config_configcontentimg_flisttrans1_template_filename_help'] = <<<_P
Nome do arquivo de modelo a ser usado para a transformação 1 ( este nome é usado como parte do nome de arquivo de saída) CUIDADO: a extensão do nome do arquivo é usado como a extensão do nome de arquivo de saída da transformação também! Isto significa que se não for definido corretamente, os arquivos de transformação 1 não mostrarão o Arquivo de Índice de Imagem listado abaixo.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active'] = <<<_P
Ativo
_P;

$tsep_lng['config_configcontentimg_flisttrans1_active_help'] = <<<_P
Se transformação for excutada, a transformação 1 será incluida. ( se ambas transformação 1 e 2 não estiverem ativas - nenhuma transformação será feita)
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes'] = <<<_P
Notas internas para Transformação 1
_P;

$tsep_lng['config_configcontentimg_flisttrans1_internal_notes_help'] = <<<_P
O campo Ative Este pode ser usado como anotação interna.
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment'] = <<<_P
A linha de comentário inicia com
_P;

$tsep_lng['config_configcontentimg_flisttrans1_comment_help'] = <<<_P
Define uma string a ser usada como 'prefixo' para a linha de comentário (exemplo: use '#'para transformação através do shellscript ou 'REM' para transformação através do DOS-Batchfiles)
_P;

$tsep_lng['config_group_configcontentimg_extdefs_flisttrans2'] = <<<_P
Transformação 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename'] = <<<_P
Nome de arquivo do modelo
_P;

$tsep_lng['config_configcontentimg_flisttrans2_template_filename_help'] = <<<_P
Nome do arquivo de modelo a ser usado para a transformação 2 ( este nome é usado como parte do nome de arquivo de saída) CUIDADO: a extensão do nome do arquivo é usado como a extensão do nome de arquivo de saída da transformação também! Isto significa que se não for definido corretamente, os arquivos de transformação 2 não mostrarão o Arquivo de Índice de Imagem listado abaixo.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active'] = <<<_P
Ative
_P;

$tsep_lng['config_configcontentimg_flisttrans2_active_help'] = <<<_P
Se transformação for excutada, a transformação 2 será incluida. ( se ambas transformação 1 e 2 não estiverem ativas - nenhuma transformação será feita)
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes'] = <<<_P
Notas internas para Transformação 2
_P;

$tsep_lng['config_configcontentimg_flisttrans2_internal_notes_help'] = <<<_P
O campo Ative Este pode ser usado como anotação interna.
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment'] = <<<_P
Linha de comentário inicia com
_P;

$tsep_lng['config_configcontentimg_flisttrans2_comment_help'] = <<<_P
Defina a strig a se usada como 'prefixo' para as linhas de comentário ( exemplo: use '#'para transformação através do shellscript ou 'REM' para transformação através do DOS-Batchfiles)
_P;

$tsep_lng['stopwords_GetStop'] = <<<_P
Obtenha Stopwords
_P;

$tsep_lng['stopwords_GetStop_Info'] = <<<_P
Entre o número de stopwords a serem pesquisadas.
_P;

$tsep_lng['stopwords_NewStopwords'] = <<<_P
Stopwords adicionadas:
_P;

$tsep_lng['stopwords_RetreiveNew'] = <<<_P
(Recupera as novas stopwords apenas)
_P;

$tsep_lng['stopwords_Occurrences'] = <<<_P
Ocorrências
_P;

?>
